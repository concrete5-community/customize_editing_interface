<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<style>
/*keep the guide text clear of the close button*/
.tour-container {
    padding-top: 6px;
}
[name="csv_file"].tour-highlight {
    border-radius: 4px;
    border: 1px solid #66afe9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102, 175, 233, 0.6);
}
[name="upload"].tour-highlight {
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
[name="upload"].tour-highlight:hover {
    color: #fff !important;
    background-color: #3276b1 !important;
    border-color: #285e8e !important;
    background-image: none !important;
    filter: none !important;
}
</style>

<!-- action() is a form helper -->
<!-- the form helper action('import_file') sets the form action to:
http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/import_file -->
<!-- on submit, the page opens to http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/import_file and the controller method import_file() is called -->
<!--
Example:
<form method="post" id="site-form" action="http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/import_file" enctype="multipart/form-data">
-->

<!-- enctype attribute specifies how the form-data should be encoded when submitting it to the server -->
<!-- enctype attributes are only used if the form method is post -->
<!--
enctype attribute values:
1. application/x-www-form-urlencoded
- Default. All characters are encoded before sent (spaces are converted to "+" symbols, and special characters are converted to ASCII HEX values)
2. multipart/form-data
- No characters are encoded. This value is required when you are using forms that have a file upload control
3. text/plain
- Spaces are converted to "+" symbols, but no special characters are encoded
-->
<form method="post" id="site-form" action="<?php echo $this->action('import_file'); ?>" enctype="multipart/form-data">

    <!-- TOKEN -->
    <!-- this token will be checked in the import_file() method in the single page controller -->
    <?php echo $this->controller->token->output('import_file'); ?>

    <div class="form-group">
        <label class="control-label"><?php echo t('Upload Settings File'); ?></label>
        <input type="file" name="csv_file">
        <br>
        <button type="submit" name="upload" class="btn btn-primary"><?php echo t('Upload'); ?></button>
    </div>

</form>

<div class="alert alert-info">
    <?php echo t('Restore exported settings by uploading the settings file that was created by this add-on. The exported settings file will have a filename of customize_editing_interface_settings_MM-DD-YYYY.csv.'); ?>
</div>

<!-- Help Guide -->
<script>
$(function() {
    var steps = [{
        content: '<p><?php echo t('Select your settings file.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('[name="csv_file"]'),
        my: 'left center',
        at: 'right center'
    }, {
        content: '<p><?php echo t('Click the upload button to import the file.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        closeButton: true,
        target: $('[name="upload"]'),
        my: 'top left',
        at: 'bottom center'
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
