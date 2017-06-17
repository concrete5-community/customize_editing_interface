<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<style>
/*keep the guide text clear of the close button*/
.tour-container {
    padding-top: 6px;
}
[name="action"].tour-highlight {
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
[name="action"].tour-highlight:hover {
    color: #fff !important;
    background-color: #3276b1 !important;
    border-color: #285e8e !important;
    background-image: none !important;
    filter: none !important;
}
</style>

<!-- action() is a form helper -->
<!-- the form helper action('export') sets the form action to:
http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/export -->
<!-- on submit, the page opens to http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/export and the controller method export() is called -->
<!--
Example:
<form method="post" id="site-form" action="http://localhost/concrete5/index.php/dashboard/system/basics/customize_editing_interface/import_settings/export" enctype="multipart/form-data">
-->
<form method="post" action="<?php echo $controller->action('export'); ?>">

    <!-- TOKEN -->
    <!-- this token will be checked in the export() method in the single page controller -->
    <?php echo $this->controller->token->output('export'); ?>

    <div class="form-group">
        <button class="btn btn-primary" type="submit" name="action" value="export"><?php echo t('Export Settings'); ?></button>
    </div>
</form>
<br>

<div class="alert alert-info">
    <?php echo t('A copy of the current settings will be exported as a downloadable .csv file. This file can be imported to restore settings at a later time.'); ?>
</div>

<!-- Help Guide -->
<script>
$(function() {
    var steps = [{
        content: '<p><?php echo t('Click this button to export your settings.'); ?></p>',
        highlightTarget: true,
        nextButton: true,
        target: $('[name="action"]'),
        my: 'left center',
        at: 'right center'
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
