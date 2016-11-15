<?php
namespace Concrete\Package\CustomizeEditingInterface\Controller\SinglePage\Dashboard\System\Basics\CustomizeEditingInterface;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;

class ImportSettings extends DashboardPageController
{

    public function import_file()
    {
        // this validates the hash - a specific time, user, and action
        // http://www.concrete5.org/api/class-Concrete.Core.Validation.CSRF.Token.html
        // adds an encrypted token to the page, then checks for that encrypted token when handling input from that page, validating that the input is genuine
        // - used when a block or dashboard page takes input and acts on that input, perhaps making a change to the database
        // - helps determine if a form or ajax submission has genuinely come from your block or page view and not from a malicious party
        // http://www.concrete5.org/documentation/how-tos/developers/use-tokens-to-secure-transactions/
        if ($this->token->validate('import_file')) {
            // get the global file permissions object
            $fp = \FilePermissions::getGlobal();
            // does the current user have permission to add files
            if ($fp->canAddFiles()) {

                // E_PHP_FILE_ERROR_DEFAULT
                // PHP error constants - these match those founds in $_FILES[$field]['error] if it exists.
                // - value of 0 (no error, the file uploaded successfully)
                // http://php.net/manual/en/features.file-upload.errors.php
                $error = \Concrete\Core\File\Importer::E_PHP_FILE_ERROR_DEFAULT;

                // check that the file was set and the file was uploaded using POST
                if (isset($_FILES['csv_file']) && is_uploaded_file($_FILES['csv_file']['tmp_name'])) {

                    // get the temporary filename of the uploaded file from the $_FILES superglobal
                    $temp_filename = $_FILES['csv_file']['tmp_name'];
                    // get the original filename of the uploaded file from the $_FILES superglobal
                    $filename = $_FILES['csv_file']['name'];
                    // create a new file Importer object
                    $importer = new \Concrete\Core\File\Importer();
                    // import the file into the file manager using import()
                    // - import() uses the temporary filename and original filename
                    // http://www.concrete5.org/api/class-Concrete.Core.File.Importer.html#_import
                    $importedFile = $importer->import($temp_filename, $filename);

                        // check that $importedFile is an object
                        if (is_object($importedFile)) {
                            // call the save_to_config() method and pass $importedFile as the parameter
                            $this->save_to_config($importedFile);

                            // if there are no errors from save_to_config()
                            // - show "Settings Imported" message
                            if (!$this->error->has()) {
                                $this->set('message', t('Settings Imported'));
                            }

                        } else {
                            // the value of $importedFile will be the returned error code from the $import() method
                            $error = $importedFile;
                            // use the getErrorMessage() method to translate that code into a human-readable error string and send it to the page template
                            // http://www.concrete5.org/api/class-Concrete.Core.File.Importer.html#_getErrorMessage
                            $this->error->add(\Concrete\Core\File\Importer::getErrorMessage($error));
                        }

                // the file was set only
                // - the error code in the error segment of the $_FILES array is set to $error
                } else if (isset($_FILES['csv_file'])) {
                    $error = $_FILES['csv_file']['error'];
                    // use the getErrorMessage() method to translate that code into a human-readable error string and send it to the page template
                    // http://www.concrete5.org/api/class-Concrete.Core.File.Importer.html#_getErrorMessage
                    $this->error->add(\Concrete\Core\File\Importer::getErrorMessage($error));
                }

            } else {
                // if the current user does not have permission to add files to the file manager
                $this->error->add(t('You do not have permission to add files to the file manager.'));
            }

        } else {
            // if the token doesn't validate, the error message is set with an array of validation error messages
            $this->set('error', array($this->token->getErrorMessage()));
        }
    }

    protected function save_to_config($importedFile)
    {
        // before opening the file, check that it has a valid mime type
        // - 'text/csv'
        // - 'application/vnd.ms-excel'
        // - 'text/x-comma-separated-values'
        // - 'text/plain'
        $mimeType = $importedFile->getMimetype();

        if ($mimeType == 'text/x-comma-separated-values' || $mimeType == 'text/csv' || $mimeType == 'application/vnd.ms-excel' || $mimeType == 'text/plain') {
            // fopen($filename, $mode)
            // - binds the resource, specified by filename, to a stream
            // - opens a file or URL
            // - r - create a read-only output buffer
            // getURL()
            // - returns a full URL to the file on disk
            $handle = fopen($importedFile->getURL(), 'r');
            // if $handle is an open file
            if ($handle !== false) {
                // fgetcsv($handle, $length, $delimiter)
                // - parses a line from an open file, checking for CSV fields
                // - the maximum length of a line is 1000 characters
                // - the field delimiter/separator is a comma

                // on the first loop
                // - the first line of the opened file is read for CSV data and assigned to $row
                // - the first line of a valid settings file will be the keys
                // on the second loop
                // - the second line of the opened file is read for CSV data and assigned to $row
                // - the second line of a valid settings file will be the values
                while (($row = fgetcsv($handle, 1000, ',')) !== false) {
                    // record the number of loops
                    // - each loop through is one line in the CSV file
                    ++$i;
                    // if $header is false, the header has not been created yet
                    // - the first row will become the header
                    if (!$header) {
                        $header = $row;
                    } else {
                        // the number of elements in the header and row must match
                        // array_combine(): Both parameters should have an equal number of elements
                        // - this is the fatal error if the number of elements don't match
                        if (count($header) == count($row)) {
                            // if the file has no more than 2 lines
                            if ($i <= 2) {
                                // combine the $header array of subkeys with the $row array of values into an associative array
                                $associativeArraySettings = array_combine($header, $row);

                                // loop through the array of subkeys and values
                                foreach ($associativeArraySettings as $subKey => $value) {
                                    // use the $subKey to make the corresponding config key
                                    $configKey = 'customize_editing_interface.' . $subKey;
                                    // save the values to the config using the $configKey
                                    Config::save($configKey, $value);
                                }
                            } else {
                                // if the file has more than 2 lines
                                $this->error->add(t('Error: the file has more than 2 lines'));
                            }

                        } else {
                            // if the number of header columns and row columns don't match
                            $this->error->add(t('Error: the header and row column count must be the same'));
                        }

                    }
                }

                // close the file
                fclose($handle);
            }

        } else {
            // if the uploaded file isn't a CSV file
            $this->error->add(t('Error: the settings file must be a .csv file'));
        }
    }

}
