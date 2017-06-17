<?php
namespace Concrete\Package\CustomizeEditingInterface\Help;

use Concrete\Core\Foundation\Service\Provider;

class HelpServiceProvider extends Provider
{
    public function register()
    {
        $this->app['help/dashboard']->registerMessageString('/dashboard/system/basics/customize_editing_interface', [t('Give me the deluxe introduction tour'), 'help-guide']);
        $this->app['help/dashboard']->registerMessageString('/dashboard/system/basics/customize_editing_interface/import_settings', [t('Give me the deluxe introduction tour'), 'help-guide']);
        $this->app['help/dashboard']->registerMessageString('/dashboard/system/basics/customize_editing_interface/export_settings', [t('Give me the deluxe introduction tour'), 'help-guide']);
    }
}
