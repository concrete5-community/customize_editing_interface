<?php
namespace Concrete\Package\CustomizeEditingInterface\Controller\SinglePage\Dashboard\System\Basics\CustomizeEditingInterface;

use Concrete\Core\Page\Controller\DashboardPageController;
use Concrete\Package\CustomizeEditingInterface\Controller\SinglePage\Dashboard\System\Basics\CustomizeEditingInterface;
use Config;

class ExportSettings extends DashboardPageController
{
    public function export()
    {
        // this validates the hash - a specific time, user, and action
        // http://www.concrete5.org/api/class-Concrete.Core.Validation.CSRF.Token.html
        // adds an encrypted token to the page, then checks for that encrypted token when handling input from that page, validating that the input is genuine
        // - used when a block or dashboard page takes input and acts on that input, perhaps making a change to the database
        // - helps determine if a form or ajax submission has genuinely come from your block or page view and not from a malicious party
        // http://www.concrete5.org/documentation/how-tos/developers/use-tokens-to-secure-transactions/
        if ($this->token->validate('export')) {
            // - set the content type to the text/csv mime type
            header('Content-type: text/csv');
            // no-cache - don't cache the file
            // no-store - don't store the response
            // must-revalidate - revalidate a cached asset on following requests
            header('Cache-Control: no-cache, no-store, must-revalidate');
            // "Pragma: no-cache" is interpreted as "Cache-Control: no-cache"
            // Pragma is used by older browsers
            header('Pragma: no-cache');
            // a new file must created each time
            header('Expires: 0');
            // force the content of the page to be downloaded as a file (otherwise it is displayed in the browser)
            header('Content-Disposition: attachment; filename="customize_editing_interface_settings_'. date('m-d-Y') .'.csv"');

            // fopen() opens a file or URL - binds the resource, specified by filename, to a stream
            // - w - create a write-only output buffer
            $output = fopen('php://output', 'w');

            // use the $configSubKeyList array to create the column headers using fputcsv()
            fputcsv($output, CustomizeEditingInterface::getConfigSubKeyList());

            // use the $configSubKeyList array and loop through it
            foreach (CustomizeEditingInterface::getConfigSubKeyList() as $subKey) {
                // use the subkey to make the corresponding config key
                $configKey = 'customize_editing_interface.' . $subKey;
                // use the config key to get the saved value
                // - add the value to the $data array, using the current $subKey as the associative array key
                $data[$subKey] = Config::get($configKey);
            }

            // use PHP's fputcsv function to ensure CSV formatting
            // formats a line passed as a fields array as CSV and writes it to the specified file
            // - the first parameter is the file opened
            // - the second parameter is an array of fields
            // fputcsv() doesn't appear to be required to ouput a CSV, but does handle the comma separation and end of line formatting
            // - comma separated values could be echoed to the page and would still work, but that requires adding the commas and ending the line each time
            // fputcsv($output, $data);
            fputcsv($output, $data);

            // close the file
            fclose($output);

            // end the script
            exit();
        } else {
            // if the token doesn't validate, display an error message
            $this->error->add(t('Invalid CSRF token. Please refresh and try again.'));
        }
    }
}
