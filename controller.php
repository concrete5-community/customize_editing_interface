<?php
namespace Concrete\Package\CustomizeEditingInterface;

use Config;
use Core;
use Concrete\Package\CustomizeEditingInterface\StyleOverride;
use Events;
use SinglePage;
// when using "protected $pkgAutoloaderMapCoreExtensions = true;"
// - this maps anything within the \Concrete\Package\PackageName\Src namespace to src\Concrete
// - "Src" is removed from the namespace
// - the StyleOverride.php file is moved from ..\src\StyleOverride.php to ..\src\Concrete\StyleOverride.php
// packages\customize_editing_interface\src\Concrete\StyleOverride.php
//
// this is the default namespace and path:
// namespace Concrete\Package\CustomizeEditingInterface\Src;
// use Concrete\Package\CustomizeEditingInterface\Src\StyleOverride;

class Controller extends \Concrete\Core\Package\Package
{
    protected $pkgHandle = 'customize_editing_interface';
    protected $appVersionRequired = '5.7.5.2';
    protected $pkgVersion = '1.0.1';
    // - required to use HelpServiceProvider
    // - maps src to src\Concrete
    protected $pkgAutoloaderMapCoreExtensions = true;

    public function getPackageName()
    {
        return t('Customize Editing Interface');
    }

    public function getPackageDescription()
    {
        return t('Customize the concrete5 editing interface.');
    }

    public function install()
    {
        // get the parent (Package) static install() method
        // - save as $pkg
        $pkg = parent::install();

        // add Customize Editing Interface single page
        $sp = SinglePage::add('/dashboard/system/basics/customize_editing_interface', $pkg);
        if (is_object($sp)) {
            // set the names of dashboard pages and allow them to be translated
            $sp->update(array('cName' => t('Customize Editing Interface')));
        }
        // add Export Settings single page
        $sp = SinglePage::add('/dashboard/system/basics/customize_editing_interface/export_settings', $pkg);
        if (is_object($sp)) {
            // set the names of dashboard pages and allow them to be translated
            $sp->update(array('cName' => t('Export Settings')));
        }
        // add Import Settings single page
        $sp = SinglePage::add('/dashboard/system/basics/customize_editing_interface/import_settings', $pkg);
        if (is_object($sp)) {
            // set the names of dashboard pages and allow them to be translated
            $sp->update(array('cName' => t('Import Settings')));
        }
    }

    // run prior to any URL-based methods
    public function on_start()
    {
        // register the help guide
        // instanceof Concrete\Core\Application\Application
        $app = Core::make('app');
        $provider = new \Concrete\Package\CustomizeEditingInterface\Help\HelpServiceProvider($app);
        $provider->register();

        // if customSettings is enabled, create the first event listener for general overrides and the StyleOverride object
        if (Config::get('customize_editing_interface.customSettings')) {
            // create a new StyleOverride object
            $styleOverride = new StyleOverride();
            // add event listener
            // - the event name is "on_before_render"
            // - the listener is the StyleOverride object's generalOverride() method
            Events::addListener('on_before_render', array($styleOverride, 'generalOverride'));
            // if wcag2Compliant is checked, create the second event listener for WCAG 2.0 overrides
            if (Config::get('customize_editing_interface.wcag2Compliant')) {
                // add event listener
                // - the event name is "on_before_render"
                // - the listener is the StyleOverride object's wcag2Override() method
                Events::addListener('on_before_render', array($styleOverride, 'wcag2Override'));
            }
        }
    }
}
