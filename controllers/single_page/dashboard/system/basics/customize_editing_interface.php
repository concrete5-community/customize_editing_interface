<?php
namespace Concrete\Package\CustomizeEditingInterface\Controller\SinglePage\Dashboard\System\Basics;

use \Concrete\Core\Page\Controller\DashboardPageController;
use Config;

class CustomizeEditingInterface extends DashboardPageController
{
    // there are 32 config subkeys
    protected static $configSubKeyList = array(
        'customSettings', 'presets', 'iconsPerRow', 'showAreaNames', 'showBlockOutlines', 'showAreaOutlines',
        'showBlockBackgroundHoverColor', 'wcag2Compliant', 'blockOutlineStyle', 'areaOutlineStyle', 'blockOutlineWidth',
        'areaOutlineWidth', 'blockOutlineColorArea', 'blockOutlineColorGlobalArea', 'blockOutlineHoverColorArea',
        'blockOutlineHoverColorGlobalArea', 'areaOutlineColor', 'globalAreaOutlineColor', 'emptyAreaOutlineColor',
        'emptyGlobalAreaOutlineColor', 'dragAreaIndicatorColor', 'dragGlobalAreaIndicatorColor', 'emptyAreaOutlineHoverColor',
        'emptyGlobalAreaOutlineHoverColor', 'selectedBlockBackgroundColor', 'selectedBlockBackgroundColorGlobal',
        'emptyAreaSelectedBackgroundColor', 'emptyGlobalAreaSelectedBackgroundColor', 'blockBackgroundHoverColor',
        'blockBackgroundHoverColorGlobal', 'emptyAreaBackgroundHoverColor', 'emptyGlobalAreaBackgroundHoverColor'
    );

    // default values used for reset
    protected $default_preset = array(
        'presets' => '0', 'iconsPerRow' => '2', 'showAreaNames' => 0, 'showBlockOutlines' => 0, 'showAreaOutlines' => 0,
        'showBlockBackgroundHoverColor' => 0, 'wcag2Compliant' => 0, 'blockOutlineStyle' => 'solid', 'areaOutlineStyle' => 'solid',
        'blockOutlineWidth' => '1px', 'areaOutlineWidth' => '1px', 'blockOutlineColorArea' => 'rgb(89, 236, 89)',
        'blockOutlineColorGlobalArea' => 'rgb(128, 208, 236)', 'blockOutlineHoverColorArea' => 'rgb(34,199,53)',
        'blockOutlineHoverColorGlobalArea' => 'rgb(88,169,196)', 'areaOutlineColor' => 'rgb(89,236,89)', 'globalAreaOutlineColor' => 'rgb(128,208,236)',
        'emptyAreaOutlineColor' => 'rgb(89,236,89)', 'emptyGlobalAreaOutlineColor' => 'rgb(128,208,236)', 'dragAreaIndicatorColor' => 'rgb(89, 236, 89)',
        'dragGlobalAreaIndicatorColor' => 'rgb(128, 208, 236)', 'emptyAreaOutlineHoverColor' => 'rgb(34,199,53)',
        'emptyGlobalAreaOutlineHoverColor' => 'rgb(88,169,196)', 'selectedBlockBackgroundColor' => 'rgb(147,244,147)',
        'selectedBlockBackgroundColorGlobal' => 'rgb(170,224,244)', 'emptyAreaSelectedBackgroundColor' => 'rgb(255,255,204)',
        'emptyGlobalAreaSelectedBackgroundColor' => 'rgb(255,255,204)', 'blockBackgroundHoverColor' => 'rgb(147, 244, 147)',
        'blockBackgroundHoverColorGlobal' => 'rgb(170, 224, 244)', 'emptyAreaBackgroundHoverColor' => 'rgb(255, 255, 204)',
        'emptyGlobalAreaBackgroundHoverColor' => 'rgb(255, 255, 204)'
    );

    // 5.7 Enhanced preset
    protected $enhanced_preset = array(
        'presets' => 'enhanced_preset', 'iconsPerRow' => '3', 'showAreaNames' => 0, 'showBlockOutlines' => 0, 'showAreaOutlines' => 1,
        'showBlockBackgroundHoverColor' => 1, 'wcag2Compliant' => 1, 'blockOutlineStyle' => 'solid', 'areaOutlineStyle' => 'solid',
        'blockOutlineWidth' => '2px', 'areaOutlineWidth' => '2px', 'blockOutlineColorArea' => 'rgb(89, 236, 89)',
        'blockOutlineColorGlobalArea' => 'rgb(128, 208, 236)', 'blockOutlineHoverColorArea' => 'rgb(34,199,53)',
        'blockOutlineHoverColorGlobalArea' => 'rgb(88,169,196)', 'areaOutlineColor' => 'rgb(89,236,89)', 'globalAreaOutlineColor' => 'rgb(128,208,236)',
        'emptyAreaOutlineColor' => 'rgb(89,236,89)', 'emptyGlobalAreaOutlineColor' => 'rgb(128,208,236)', 'dragAreaIndicatorColor' => 'rgb(89, 236, 89)',
        'dragGlobalAreaIndicatorColor' => 'rgb(128, 208, 236)', 'emptyAreaOutlineHoverColor' => 'rgb(34,199,53)',
        'emptyGlobalAreaOutlineHoverColor' => 'rgb(88,169,196)', 'selectedBlockBackgroundColor' => 'rgb(147,244,147)',
        'selectedBlockBackgroundColorGlobal' => 'rgb(170,224,244)', 'emptyAreaSelectedBackgroundColor' => 'rgb(255,255,204)',
        'emptyGlobalAreaSelectedBackgroundColor' => 'rgb(255,255,204)', 'blockBackgroundHoverColor' => 'rgb(147, 244, 147)',
        'blockBackgroundHoverColorGlobal' => 'rgb(170, 224, 244)', 'emptyAreaBackgroundHoverColor' => 'rgb(255, 255, 204)',
        'emptyGlobalAreaBackgroundHoverColor' => 'rgb(255, 255, 204)'
    );

    // 5.6 Retro preset
    protected $retro = array(
        'presets' => 'retro', 'iconsPerRow' => '3', 'showAreaNames' => 0, 'showBlockOutlines' => 1, 'showAreaOutlines' => 0,
        'showBlockBackgroundHoverColor' => 1, 'wcag2Compliant' => 1, 'blockOutlineStyle' => 'dotted', 'areaOutlineStyle' => 'dotted',
        'blockOutlineWidth' => '2px', 'areaOutlineWidth' => '2px', 'blockOutlineColorArea' => 'rgb(255, 0, 0)', 'blockOutlineColorGlobalArea' => 'rgb(255, 0, 0)',
        'blockOutlineHoverColorArea' => 'rgb(114, 114, 114)', 'blockOutlineHoverColorGlobalArea' => 'rgb(114, 114, 114)',
        'areaOutlineColor' => 'rgb(89,236,89)', 'globalAreaOutlineColor' => 'rgb(128,208,236)', 'emptyAreaOutlineColor' => 'rgb(89,236,89)',
        'emptyGlobalAreaOutlineColor' => 'rgb(128,208,236)', 'dragAreaIndicatorColor' => 'rgb(255, 0, 0)',
        'dragGlobalAreaIndicatorColor' => 'rgb(255, 0, 0)', 'emptyAreaOutlineHoverColor' => 'rgb(114, 114, 114)',
        'emptyGlobalAreaOutlineHoverColor' => 'rgb(114, 114, 114)', 'selectedBlockBackgroundColor' => 'rgb(174, 174, 174)',
        'selectedBlockBackgroundColorGlobal' => 'rgb(174, 174, 174)', 'emptyAreaSelectedBackgroundColor' => 'rgb(174, 174, 174)',
        'emptyGlobalAreaSelectedBackgroundColor' => 'rgb(174, 174, 174)', 'blockBackgroundHoverColor' => 'rgb(174, 174, 174)',
        'blockBackgroundHoverColorGlobal' => 'rgb(174, 174, 174)', 'emptyAreaBackgroundHoverColor' => 'rgb(174, 174, 174)',
        'emptyGlobalAreaBackgroundHoverColor' => 'rgb(174, 174, 174)',
    );

    // this is used to get the static $configSubKeyList property
    public function getConfigSubKeyList()
    {
        return self::$configSubKeyList;
    }

    public function view()
    {
        // get the $configSubKeyList array
        // - loop through it to get the current config values
        // - set the values, so they are available in view for the dashboard form
        foreach (self::$configSubKeyList as $subKey) {
            // use the subkey to make the corresponding config key
            // Example:
            // customize_editing_interface.iconsPerRow
            $configKey = 'customize_editing_interface.' . $subKey;
            // using the config key, get the value
            // - set the $subKey value for that specific config key
            $this->set($subKey, Config::get($configKey));
        }
    }

    public function settings_saved()
    {
        // show "Settings Saved" message
        $this->set('message', t('Settings Saved'));
        // call the view() method
        // - this will read the config values and set the form values
        $this->view();
    }

    public function save_settings()
    {
        // this validates the hash - a specific time, user, and action
        // http://www.concrete5.org/api/class-Concrete.Core.Validation.CSRF.Token.html
        // adds an encrypted token to the page, then checks for that encrypted token when handling input from that page, validating that the input is genuine
        // - used when a block or dashboard page takes input and acts on that input, perhaps making a change to the database
        // - helps determine if a form or ajax submission has genuinely come from your block or page view and not from a malicious party
        // http://www.concrete5.org/documentation/how-tos/developers/use-tokens-to-secure-transactions/
        if ($this->token->validate('save_settings')) {
            // isPost()
            // - $_SERVER['REQUEST_METHOD'] == 'POST'
            // - checks to see if the server request method was POST
            // Namespace: Concrete\Core\Http
            // Located at src/Http/Request.php
            if ($this->isPost()) {

                // if a preset has been selected, "presets" will be true
                if ($this->post('presets')) {
                    // get the presets key from the $_POST array
                    // - assign the value to $preset
                    $preset = $this->post('presets');

                    // $this->$preset will be a preset array
                    // - loop through it
                    foreach ($this->$preset as $subKey => $value) {
                        // use the $subKey to make the corresponding configkey
                        $configKey = 'customize_editing_interface.' . $subKey;
                        // save the value to the configkey
                        Config::save($configKey, $value);
                    }

                    // presets don't set a value for customSettings
                    // - if a preset is selected, customSettings is saved independently
                    Config::save('customize_editing_interface.customSettings', $this->post('customSettings'));
                } else {
                    // array of subkeys for form items that are checkboxes
                    $checkboxItems = array('showAreaNames', 'showBlockOutlines', 'showAreaOutlines', 'showBlockBackgroundHoverColor', 'wcag2Compliant');

                    // loop through the $configSubKeyList array
                    foreach (self::$configSubKeyList as $subKey) {
                        // use the $subKey to make the corresponding config key
                        $configKey = 'customize_editing_interface.' . $subKey;

                        // subkeys with checkboxes have to be handled differently
                        // - they have no default value
                        // if the current $subKey is in the $checkboxItems array
                        // - if a subkey is set in the $_POST array, assign a value of 1
                        // - if a subkey is not set in the $_POST array, assign a value of 0
                        if (in_array($subKey, $checkboxItems)) {
                            Config::save($configKey, isset($_POST[$subKey]) ? 1 : 0);
                        } else {
                            // for non-checkbox form items
                            // - use the subKey to get the value from the $_POST array
                            // - save the value to the configkey
                            Config::save($configKey, $this->post($subKey));
                        }
                    }

                }

                // when done, redirect the page
                $this->redirect('/dashboard/system/basics/customize_editing_interface','settings_saved');
            }
        } else {
            // if the token doesn't validate, the error message is set with an array of validation error messages
            $this->set('error', array($this->token->getErrorMessage()));
        }
    }

    public function settings_reset()
    {
        // show "Settings Reset" message
        $this->set('message', t('Settings Reset'));
        // call the view() method
        // - this will read the config values and set the form values
        $this->view();
    }

    public function reset()
    {
        // reset() does not change customSettings
        // - customSettings is not part of the default_preset array

        // this validates the hash - a specific time, user, and action
        // http://www.concrete5.org/api/class-Concrete.Core.Validation.CSRF.Token.html
        // adds an encrypted token to the page, then checks for that encrypted token when handling input from that page, validating that the input is genuine
        // - used when a block or dashboard page takes input and acts on that input, perhaps making a change to the database
        // - helps determine if a form or ajax submission has genuinely come from your block or page view and not from a malicious party
        // http://www.concrete5.org/documentation/how-tos/developers/use-tokens-to-secure-transactions/
        if ($this->token->validate('reset')) {
            // loop through the default_preset array of subkeys and reset values
            foreach ($this->default_preset as $subKey => $value) {
                // use the subkey to make the corresponding configkey
                $configKey =  'customize_editing_interface.' . $subKey;
                // save the reset values to the config
                Config::save($configKey, $value);
            }

            // when done, redirect the page
            $this->redirect('/dashboard/system/basics/customize_editing_interface','settings_reset');
        } else {
            // if the token doesn't validate, the error message is set with an array of validation error messages
            $this->set('error', array($this->token->getErrorMessage()));
        }
    }

}