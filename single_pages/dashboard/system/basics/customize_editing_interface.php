<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<?php
// because of a conflict in function naming between jQuery UI and Button.js
// - jQuery UI must be loaded before Button.js
// - if not, Button.js doesn't work
//
// getInstance()
// - get one instance of the view object using the singleton pattern
// - requireAsset() is called on the view instance
// - this controls the asset ordering in the page for these two assets
View::getInstance()->requireAsset('javascript', 'jquery/ui');
View::getInstance()->requireAsset('javascript', 'bootstrap/button');
?>

<style>
/*70px is the minimum width to contain the full width of the color pickers*/
.ccm-ui .table.bs-table-style-override tbody tr td {
    width: 70px;
}
.ccm-ui .table > tbody > tr:first-child th {
    border-top: none;
}
.ccm-ui .table > tbody > tr:first-child td {
    border-top: none;
}
.ccm-ui .table.bs-table-style-override {
    margin-bottom: 0px;
}
/*keep the guide text clear of the close button*/
.tour-container {
    padding-top: 6px;
}
/*Enabled button*/
label.tour-highlight {
    background-color: #D6E6EE !important;
    background-image: -webkit-linear-gradient(top, #d6e6ee 0, #b8dcee 100%) !important;
    background-image: linear-gradient(to bottom, #d6e6ee 0, #b8dcee 100%) !important;
    background-repeat: repeat-x !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd6e6ee', endColorstr='#ffb8dcee', GradientType=0) !important;
    color: #136CC0 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
}
/*Enabled button*/
label.tour-highlight:hover {
    background-color: transparent !important;
    background-image: none !important;
    filter: none !important;
    color: black !important;
}
#presets.tour-highlight {
    border-radius: 4px;
    border: 1px solid #66afe9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
.icons-per-row.tour-highlight label,
.block-outline-style.tour-highlight label,
.area-outline-style.tour-highlight label,
.block-outline-width.tour-highlight label,
.area-outline-width.tour-highlight label {
    border-top: 1px solid #66afe9 !important;
    border-bottom: 1px solid #66afe9 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
}
.icons-per-row.tour-highlight label:first-child,
.block-outline-style.tour-highlight label:first-child,
.area-outline-style.tour-highlight label:first-child,
.block-outline-width.tour-highlight label:first-child,
.area-outline-width.tour-highlight label:first-child {
    border-left: 1px solid #66afe9 !important;
}
.icons-per-row.tour-highlight label:last-child,
.block-outline-style.tour-highlight label:last-child,
.area-outline-style.tour-highlight label:last-child,
.block-outline-width.tour-highlight label:last-child,
.area-outline-width.tour-highlight label:last-child {
    border-right: 1px solid #66afe9 !important;
}
input[type=checkbox].tour-highlight {
    outline: 1px solid #66afe9;
}
/*tabs*/
[data-tab="outline-styles-colors"].tour-highlight,
[data-tab="background-colors"].tour-highlight {
    background-color: #D6E6EE ;
    background-image: -webkit-linear-gradient(top, #d6e6ee 0, #b8dcee 100%) ;
    background-image: linear-gradient(to bottom, #d6e6ee 0, #b8dcee 100%) ;
    background-repeat: repeat-x ;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd6e6ee', endColorstr='#ffb8dcee', GradientType=0) ;
    border: 1px solid #66afe9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
/*tabs hover*/
[data-tab="outline-styles-colors"].tour-highlight:hover,
[data-tab="background-colors"].tour-highlight:hover {
    background-image: none;
    filter: none;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    border-color: #eee #eee #ddd;
    background-color: #eee;
}
/*color pickers*/
.ccm-widget-colorpicker.tour-highlight {
    border: 1px solid #66afe9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
/*Reset button*/
button[type="submit"][value="reset"].tour-highlight {
    background-color: #D6E6EE !important;
    background-image: -webkit-linear-gradient(top, #d6e6ee 0, #b8dcee 100%) !important;
    background-image: linear-gradient(to bottom, #d6e6ee 0, #b8dcee 100%) !important;
    background-repeat: repeat-x !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffd6e6ee', endColorstr='#ffb8dcee', GradientType=0) !important;
    color: #136CC0 !important;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6) !important;
    border-color: #adadad !important;
}
button[type="submit"][value="reset"].tour-highlight:hover {
    color: #fff !important;
    background-color: #d2322d !important;
    border-color: #ac2925 !important;
    background-image: none !important;
    filter: none !important;
}
</style>

<!-- action() is a form helper -->
<!-- the form helper action('reset') sets the form action to:
http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/reset
-->
<!-- on submit, the page opens to http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/reset and the controller method reset() is called -->
<!--
Example:
<form method="post" action="http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/reset">
-->
<form method="post" action="<?php echo $controller->action('reset'); ?>">

    <!-- TOKEN -->
    <!-- this token will be checked in the reset() method in the single page controller -->
    <?php echo $this->controller->token->output('reset'); ?>
    <!-- Example -->
    <!-- <input type="hidden" name="ccm_token" value="1472786110:c69ce9d1f40b937c509fc0fff790a78a"> -->


    <!-- Reset to Defaults Settings button -->
    <div class="ccm-dashboard-header-buttons btn-group">
        <button class="btn btn-danger" type="submit" name="action" value="reset"><?php echo t('Reset to Add-On Default Settings'); ?></button>
    </div>

</form>

<!-- action() is a form helper -->
<!-- the form helper action('save_settings') sets the form action to:
http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/save_settings
-->
<!-- on submit, the page opens to http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/save_settings and the controller method save_settings() is called -->
<!--
Example:
<form method="post" id="site-form" action="http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/save_settings">
-->
<form method="post" id="site-form" action="<?php echo $this->action('save_settings'); ?>">

    <!-- TOKEN -->
    <!-- this token will be checked in the save_settings() method in the single page controller -->
    <?php echo $this->controller->token->output('save_settings'); ?>
    <!-- Example -->
    <!-- <input type="hidden" name="ccm_token" value="1472786110:c69ce9d1f40b937c509fc0fff790a78a"> -->

    <!-- Custom Settings -->
    <label class="control-label"><?php echo t('Custom Settings'); ?></label>
    <br>
    <div class="btn-group" data-toggle="buttons">
        <label class="customSettingsOn btn btn-default <?php if ($customSettings) { echo 'active'; } ?>">
            <input type="radio" name="customSettings" id="customSettings1" value="1" autocomplete="off" <?php if ($customSettings) { echo 'checked'; } ?>><?php echo t('Enabled'); ?>
        </label>
        <label class="customSettingsOff btn btn-default <?php if (!$customSettings) { echo 'active'; } ?>">
            <input type="radio" name="customSettings" id="customSettings2" value="0" autocomplete="off" <?php if (!$customSettings) { echo 'checked'; } ?>><?php echo t('Disabled'); ?>
        </label>
    </div>
    <br>
    <br>

    <div class="tab-container">
        <?php
        echo Core::make('helper/concrete/ui')->tabs(array(
            array('basic-options', t('Basic Options'), true),
            array('outline-styles-colors', t('Outline Styles and Colors')),
            array('background-colors', t('Background Colors'))
        ));
        ?>

            <div id="ccm-tab-content-basic-options" class="ccm-tab-content">

                <!-- SETTINGS -->

                <!-- Presets -->
                <div class="form-group">
                    <?php echo $form->label('presets', t('Presets')); ?>
                    <?php echo $form->select('presets', array(0 => t('No Preset'), 'enhanced_preset' => t('5.7 Enhanced'), 'retro' => t('5.6 Retro')), $presets, array('style' => 'width: 200px;')); ?>
                </div>

                <div class="preset-visibility">

                    <div class="form-group">
                        <!-- Add Content Block Icons Per Row -->
                        <label class="control-label"><?php echo t('Add Content Block Icons Per Row'); ?></label>
                        <br>
                        <div class="btn-group icons-per-row" data-toggle="buttons">
                            <label class="btn btn-default <?php if ($iconsPerRow == 1) { echo 'active'; } ?>">
                                <input type="radio" name="iconsPerRow" id="iconsPerRow1" value="1" autocomplete="off" <?php if ($iconsPerRow == 1) { echo 'checked'; } ?>><?php echo t('1'); ?>
                            </label>
                            <label class="btn btn-default <?php if ($iconsPerRow == 2 || $iconsPerRow == null) { echo 'active'; } ?>">
                                <input type="radio" name="iconsPerRow" id="iconsPerRow2" value="2" autocomplete="off" <?php if ($iconsPerRow == 2 || $iconsPerRow == null) { echo 'checked'; } ?>><?php echo t('2'); ?>
                            </label>
                            <label class="btn btn-default <?php if ($iconsPerRow == 3) { echo 'active'; } ?>">
                                <input type="radio" name="iconsPerRow" id="iconsPerRow3" value="3" autocomplete="off" <?php if ($iconsPerRow == 3) { echo 'checked'; } ?>><?php echo t('3'); ?>
                            </label>
                            <label class="btn btn-default <?php if ($iconsPerRow == 4) { echo 'active'; } ?>">
                                <input type="radio" name="iconsPerRow" id="iconsPerRow4" value="4" autocomplete="off" <?php if ($iconsPerRow == 4) { echo 'checked'; } ?>><?php echo t('4'); ?>
                            </label>
                        </div>
                    </div>
           <!--          <br>
                    <br>
 -->
                    <!-- Always Show Area Names -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <?php
                            echo $form->checkbox('showAreaNames', 1, $showAreaNames);
                            echo t('Always show area names while in edit mode');
                            ?>
                            </label>
                        </div>
                    </div>

                    <!-- Always Show Block Outlines -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <?php
                            echo $form->checkbox('showBlockOutlines', 1, $showBlockOutlines);
                            echo t('Always show block outlines while in edit mode');
                            ?>
                            </label>
                        </div>
                    </div>

                    <!-- Always Show Area Outlines -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <?php
                            echo $form->checkbox('showAreaOutlines', 1, $showAreaOutlines);
                            echo t('Always show area outlines while in edit mode');
                            ?>
                            </label>
                        </div>
                    </div>

                    <!-- Show Block and Empty Area Background Hover Color -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <?php
                            echo $form->checkbox('showBlockBackgroundHoverColor', 1, $showBlockBackgroundHoverColor);
                            echo t('Show block and empty area background hover color');
                            ?>
                            </label>
                        </div>
                    </div>

                    <!-- WCAG 2.0 Compliant Color Contrast -->
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                            <?php
                            echo $form->checkbox('wcag2Compliant', 1, $wcag2Compliant);
                            echo t('WCAG 2.0 compliant color contrast');
                            ?>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- END SETTINGS -->

            </div>

            <div id="ccm-tab-content-outline-styles-colors" class="ccm-tab-content">

                <!-- OUTLINE OPTIONS -->

                <!-- Block Outline Style -->
                <label class="control-label"><?php echo t('Block Outline Style'); ?></label>
                <br>
                <div class="btn-group block-outline-style" data-toggle="buttons">
                    <label class="btn btn-default <?php if ($blockOutlineStyle == 'dashed') { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineStyle" id="blockOutlineStyle1" value="dashed" autocomplete="off" <?php if ($blockOutlineStyle == 'dashed') { echo 'checked'; } ?>><?php echo t('Dashed'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($blockOutlineStyle == 'dotted') { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineStyle" id="blockOutlineStyle2" value="dotted" autocomplete="off" <?php if ($blockOutlineStyle == 'dotted') { echo 'checked'; } ?>><?php echo t('Dotted'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($blockOutlineStyle == 'solid' || $blockOutlineStyle == null) { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineStyle" id="blockOutlineStyle3" value="solid" autocomplete="off" <?php if ($blockOutlineStyle == 'solid' || $blockOutlineStyle == null) { echo 'checked'; } ?>><?php echo t('Solid'); ?>
                    </label>
                </div>
                <br>
                <br>

                <!-- Area Outline Style -->
                <label class="control-label"><?php echo t('Area Outline Style'); ?></label>
                <br>
                <div class="btn-group area-outline-style" data-toggle="buttons">
                    <label class="btn btn-default <?php if ($areaOutlineStyle == 'dashed') { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineStyle" id="areaOutlineStyle1" value="dashed" autocomplete="off" <?php if ($areaOutlineStyle == 'dashed') { echo 'checked'; } ?>><?php echo t('Dashed'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($areaOutlineStyle == 'dotted') { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineStyle" id="areaOutlineStyle2" value="dotted" autocomplete="off" <?php if ($areaOutlineStyle == 'dotted') { echo 'checked'; } ?>><?php echo t('Dotted'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($areaOutlineStyle == 'solid' || $areaOutlineStyle == null) { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineStyle" id="areaOutlineStyle3" value="solid" autocomplete="off" <?php if ($areaOutlineStyle == 'solid' || $areaOutlineStyle == null) { echo 'checked'; } ?>><?php echo t('Solid'); ?>
                    </label>
                </div>
                <br>
                <br>

                <!-- Block Outline Width -->
                <label class="control-label"><?php echo t('Block Outline Width'); ?></label>
                <br>
                <div class="btn-group block-outline-width" data-toggle="buttons">
                    <label class="btn btn-default <?php if ($blockOutlineWidth == '1px' || $blockOutlineWidth == null) { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineWidth" id="blockOutlineWidth1" value="1px" autocomplete="off" <?php if ($blockOutlineWidth == '1px' || $blockOutlineWidth == null) { echo 'checked'; } ?>><?php echo t('1px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($blockOutlineWidth == '2px') { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineWidth" id="blockOutlineWidth2" value="2px" autocomplete="off" <?php if ($blockOutlineWidth == '2px') { echo 'checked'; } ?>><?php echo t('2px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($blockOutlineWidth == '3px') { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineWidth" id="blockOutlineWidth3" value="3px" autocomplete="off" <?php if ($blockOutlineWidth == '3px') { echo 'checked'; } ?>><?php echo t('3px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($blockOutlineWidth == '4px') { echo 'active'; } ?>">
                        <input type="radio" name="blockOutlineWidth" id="blockOutlineWidth4" value="4px" autocomplete="off" <?php if ($blockOutlineWidth == '4px') { echo 'checked'; } ?>><?php echo t('4px'); ?>
                    </label>
                </div>
                <br>
                <br>

                <!-- Area Outline Width -->
                <label class="control-label"><?php echo t('Area Outline Width'); ?></label>
                <br>
                <div class="btn-group area-outline-width" data-toggle="buttons">
                    <label class="btn btn-default <?php if ($areaOutlineWidth == '1px' || $areaOutlineWidth == null) { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineWidth" id="areaOutlineWidth1" value="1px" autocomplete="off" <?php if ($areaOutlineWidth == '1px' || $areaOutlineWidth == null) { echo 'checked'; } ?>><?php echo t('1px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($areaOutlineWidth == '2px') { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineWidth" id="areaOutlineWidth2" value="2px" autocomplete="off" <?php if ($areaOutlineWidth == '2px') { echo 'checked'; } ?>><?php echo t('2px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($areaOutlineWidth == '3px') { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineWidth" id="areaOutlineWidth3" value="3px" autocomplete="off" <?php if ($areaOutlineWidth == '3px') { echo 'checked'; } ?>><?php echo t('3px'); ?>
                    </label>
                    <label class="btn btn-default <?php if ($areaOutlineWidth == '4px') { echo 'active'; } ?>">
                        <input type="radio" name="areaOutlineWidth" id="areaOutlineWidth4" value="4px" autocomplete="off" <?php if ($areaOutlineWidth == '4px') { echo 'checked'; } ?>><?php echo t('4px'); ?>
                    </label>
                </div>
                <br>
                <br>

                <!-- END OUTLINE OPTIONS -->

                <!-- OUTLINE COLORS -->

                <!-- Area Blocks -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Area Blocks'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Outline Color - Area -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockOutlineColorArea', $blockOutlineColorArea ? $blockOutlineColorArea : 'rgb(89, 236, 89)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Block Outline Hover Color - Area -->
                                    <th><?php echo t('Outline Hover and Selected Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockOutlineHoverColorArea', $blockOutlineHoverColorArea ? $blockOutlineHoverColorArea : 'rgb(34,199,53)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Global Area Blocks -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Global Area Blocks'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Outline Color - Global -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockOutlineColorGlobalArea', $blockOutlineColorGlobalArea ? $blockOutlineColorGlobalArea : 'rgb(128, 208, 236)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Block Outline Hover Color Global -->
                                    <th><?php echo t('Outline Hover and Selected Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockOutlineHoverColorGlobalArea', $blockOutlineHoverColorGlobalArea ? $blockOutlineHoverColorGlobalArea : 'rgb(88,169,196)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Area Outline Color -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('areaOutlineColor', $areaOutlineColor ? $areaOutlineColor : 'rgb(89,236,89)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Drag Area Indicator Color -->
                                    <th><?php echo t('Drag Indicator Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('dragAreaIndicatorColor', $dragAreaIndicatorColor ? $dragAreaIndicatorColor : 'rgb(89, 236, 89)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Global Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Global Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Global Area Outline Color -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('globalAreaOutlineColor', $globalAreaOutlineColor ? $globalAreaOutlineColor : 'rgb(128,208,236)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Drag Global Area Indicator Color -->
                                    <th><?php echo t('Drag Indicator Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('dragGlobalAreaIndicatorColor', $dragGlobalAreaIndicatorColor ? $dragGlobalAreaIndicatorColor : 'rgb(128, 208, 236)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Empty Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Empty Area Outline Color -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyAreaOutlineColor', $emptyAreaOutlineColor ? $emptyAreaOutlineColor : 'rgb(89,236,89)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Empty Area Outline Hover Color -->
                                    <th><?php echo t('Outline Hover and Selected Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyAreaOutlineHoverColor', $emptyAreaOutlineHoverColor ? $emptyAreaOutlineHoverColor : 'rgb(34,199,53)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty Global Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Empty Global Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Empty Global Area Outline Color -->
                                    <th><?php echo t('Outline Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyGlobalAreaOutlineColor', $emptyGlobalAreaOutlineColor ? $emptyGlobalAreaOutlineColor : 'rgb(128,208,236)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Empty Global Area Outline Hover Color -->
                                    <th><?php echo t('Outline Hover and Selected Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyGlobalAreaOutlineHoverColor', $emptyGlobalAreaOutlineHoverColor ? $emptyGlobalAreaOutlineHoverColor : 'rgb(88,169,196)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- END OUTLINE COLORS -->

            </div>

            <div id="ccm-tab-content-background-colors" class="ccm-tab-content">

                <!-- BACKGROUND COLORS -->

                <!-- Area Blocks -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Area Blocks'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Background Hover Color -->
                                    <th><?php echo t('Background Hover Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockBackgroundHoverColor', $blockBackgroundHoverColor ? $blockBackgroundHoverColor : 'rgb(147, 244, 147)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Selected Block Background Hover Color -->
                                    <th><?php echo t('Selected Background Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('selectedBlockBackgroundColor', $selectedBlockBackgroundColor ? $selectedBlockBackgroundColor : 'rgb(147,244,147)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Global Area Blocks -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Global Area Blocks'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Background Hover Color Global -->
                                    <th><?php echo t('Background Hover Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('blockBackgroundHoverColorGlobal', $blockBackgroundHoverColorGlobal ? $blockBackgroundHoverColorGlobal : 'rgb(170, 224, 244)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Selected Block Background Color Global -->
                                    <th><?php echo t('Selected Background Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('selectedBlockBackgroundColorGlobal', $selectedBlockBackgroundColorGlobal ? $selectedBlockBackgroundColorGlobal : 'rgb(170,224,244)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Empty Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Background Hover Color Empty -->
                                    <th><?php echo t('Background Hover Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyAreaBackgroundHoverColor', $emptyAreaBackgroundHoverColor ? $emptyAreaBackgroundHoverColor : 'rgb(255, 255, 204)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Empty Area Background Color -->
                                    <th><?php echo t('Selected Background Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyAreaSelectedBackgroundColor', $emptyAreaSelectedBackgroundColor ? $emptyAreaSelectedBackgroundColor : 'rgb(255,255,204)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty Global Areas -->
                <div class="panel panel-default">
                    <div class="panel-heading"><?php echo t('Empty Global Areas'); ?></div>
                    <div class="panel-body">
                        <table class="table bs-table-style-override">
                            <tbody>
                                <tr>
                                    <!-- Block Background Hover Color Empty Global -->
                                    <th><?php echo t('Background Hover Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyGlobalAreaBackgroundHoverColor', $emptyGlobalAreaBackgroundHoverColor ? $emptyGlobalAreaBackgroundHoverColor : 'rgb(255, 255, 204)');
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <!-- Empty Global Area Background Color -->
                                    <th><?php echo t('Selected Background Color'); ?></th>
                                    <td>
                                        <?php
                                        $color = Core::make('helper/form/color');
                                        $color->output('emptyGlobalAreaSelectedBackgroundColor', $emptyGlobalAreaSelectedBackgroundColor ? $emptyGlobalAreaSelectedBackgroundColor : 'rgb(255,255,204)');
                                        ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- END BACKGROUND COLORS -->

            </div>
    </div>

    <div class="ccm-dashboard-form-actions-wrapper">
        <div class="ccm-dashboard-form-actions">
            <button class="pull-right btn btn-primary" type="submit"><?php echo t('Save'); ?></button>
        </div>
    </div>

</form>

<script>
$(document).ready(function() {
    // hide all settings when disabled

    // set initial visibility
    if ($('label.active [id^="customSettings"]').val() === '0') {
        $('.tab-container').css('visibility', 'hidden');
    }

    $('input[name="customSettings"]').change(function() {
        if ($(this).val() === '1') {
            $('.tab-container').css('visibility', 'visible');
        } else {
            $('.tab-container').css('visibility', 'hidden');
        }
    });

    // hide basic options, outlines and colors, and background colors if a preset is chosen

    // set initial visibility
    if ($('#presets').val() !== '0') {
        $('.preset-visibility, [data-tab="background-colors"], [data-tab="outline-styles-colors"]').css('visibility', 'hidden');
    }

    $('#presets').change(function() {
        if ($(this).val() !== '0') {
            $('.preset-visibility, [data-tab="background-colors"], [data-tab="outline-styles-colors"]').css('visibility', 'hidden');
        } else {
            $('.preset-visibility, [data-tab="background-colors"], [data-tab="outline-styles-colors"]').css('visibility', 'visible');
        }
    });

});
</script>

<!-- Help Guide -->
<script>
$(function() {
    var steps = [{
        content: '<p><?php echo t('This add-on is disabled by default, so the first thing you need to do is click this button to enable it.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.customSettingsOn'),
        my: 'top left',
        at: 'bottom center',
        bind: ['onClick'],
        setup: function (tour, options) {
           $('.customSettingsOn').on('click', this.onClick);
        },
        teardown: function (tour, options) {
           $('.customSettingsOn').off('click', this.onClick);
        },
        onClick: function (tour) {
           tour.next();
        }
    }, {
        content: '<p><?php echo t('The quickest way to get started is using a preset. 5.7 Enhanced makes a few changes to text contrast, outlines, hover backgrounds, and block icon rows. 5.6 Retro offers a look similar to concrete5 version 5.6. Using a preset will disable other settings.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('[name="presets"]'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('This sets the number of horizontal block icons per row in the Add Content Blocks panel. The default is 2.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.icons-per-row'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('This will always show area name tabs while in edit mode. For best results, use with "Always show area outlines while in edit mode". The tabs will always be on top of everything else on the page.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#showAreaNames'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t("This will always show block outlines while in edit mode, even when blocks aren\'t hovered."); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#showBlockOutlines'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t("This will always show area outlines while in edit mode, even when blocks and areas aren\'t hovered."); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#showAreaOutlines'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('This will give blocks and empty areas a background color when they are hovered.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#showBlockBackgroundHoverColor'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('WCAG 2.0 compliant color contrast makes text and icons easier to read for people with visual impairments or if you are using a low contrast device.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#wcag2Compliant'),
        my: 'left center',
        at: 'right center'
    },
    // Outline Styles and Colors
    {
        content: '<p><?php echo t('Click on this tab to explore the outline style and color options.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('[data-tab="outline-styles-colors"]'),
        my: 'bottom center',
        at: 'top center'
    }, {
        content: '<p><?php echo t('Choose between dashed, dotted, and solid for the block outlines style. The default style is solid.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.block-outline-style'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('Choose between dashed, dotted, and solid for the area outlines style. The default style is solid.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.area-outline-style'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('Choose the outline width of block outlines. The default width is 1px.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.block-outline-width'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('Choose the outline width of area outlines. The default width is 1px.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('.area-outline-width'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('This is the color of area block outlines when "Always show block outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockOutlineColorArea + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the hover and selected color of area block outlines.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockOutlineHoverColorArea + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the color of global area block outlines when "Always show block outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockOutlineColorGlobalArea + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the hover and selected color of global area block outlines.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockOutlineHoverColorGlobalArea + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the color of area outlines when "Always show area outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-areaOutlineColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the drag indicator color for areas. The drag indicators show where blocks can be added.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-dragAreaIndicatorColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the color of global area outlines when "Always show area outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-globalAreaOutlineColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the drag indicator color for global areas. The drag indicators show where blocks can be added.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-dragGlobalAreaIndicatorColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the color of empty area outlines when "Always show area outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyAreaOutlineColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the hover and selected color of empty area outlines.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyAreaOutlineHoverColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the color of empty global area outlines when "Always show area outlines while in edit mode" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaOutlineColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the hover and selected color of empty global area outlines.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaOutlineHoverColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('The next step requires scrolling to the top of the page.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaOutlineHoverColor + .ccm-widget-colorpicker'),
        my: 'right center',
        at: 'left center'
    },
    // Background Colors
    {
        content: '<p><?php echo t('Click on this tab to explore the background color options.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('[data-tab="background-colors"]'),
        my: 'bottom center',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the background hover color of area blocks when "Show block and empty area background hover color" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockBackgroundHoverColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the selected background color of area blocks.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-selectedBlockBackgroundColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the background hover color of global area blocks when "Show block and empty area background hover color" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-blockBackgroundHoverColorGlobal + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the selected background color of global area blocks.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-selectedBlockBackgroundColorGlobal + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the background hover color of empty areas when "Show block and empty area background hover color" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyAreaBackgroundHoverColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the selected background color of empty areas.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyAreaSelectedBackgroundColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the background hover color of empty global areas when "Show block and empty area background hover color" is checked.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaBackgroundHoverColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('This is the selected background color of empty global areas.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaSelectedBackgroundColor + .ccm-widget-colorpicker'),
        my: 'bottom right',
        at: 'top center'
    }, {
        content: '<p><?php echo t('The next step requires scrolling to the top of the page.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('#ccm-colorpicker-emptyGlobalAreaSelectedBackgroundColor + .ccm-widget-colorpicker'),
        my: 'right center',
        at: 'left center'
    }, {
        content: '<p><?php echo t('This button will reset all the settings to their add-on defaults. The only thing it will not reset is whether the add-on is enabled or disabled.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('button[type="submit"][value="reset"]'),
        my: 'right center',
        at: 'left center'
    }];

    var tour = new Tourist.Tour({
        steps: steps,
        tipClass: 'Bootstrap',
        tipOptions: { showEffect: 'slidein' }
    });

    tour.on('start', function() {
        ConcreteHelpLauncher.close();
    });

    // "help-guide" is defined in register()
    // packages\customize_editing_interface\src\Concrete\Help\HelpServiceProvider.php
    ConcreteHelpGuideManager.register('help-guide', tour);
});
</script>
