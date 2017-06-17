<?php
namespace Concrete\Package\CustomizeEditingInterface;
// when using "protected $pkgAutoloaderMapCoreExtensions = true;"
// - this maps anything within the \Concrete\Package\PackageName\Src namespace to src\Concrete
// - "Src" is removed from the namespace
// - the StyleOverride.php file is moved from ..\src\StyleOverride.php to ..\src\Concrete\StyleOverride.php
// packages\customize_editing_interface\src\Concrete\StyleOverride.php
//
// this is the default namespace and path:
// namespace Concrete\Package\CustomizeEditingInterface\Src;
// packages\customize_editing_interface\src\StyleOverride.php

use Concrete\Package\CustomizeEditingInterface\Controller\SinglePage\Dashboard\System\Basics\CustomizeEditingInterface;
use Config;
use Page;
use View;

class StyleOverride
{
    // convert RGB colors to RGBA
    private function rgbConvert($rgb, $transparency)
    {
        // Example: RGB format
        // rgb(128, 208, 236)
        preg_match('/(\d{1,3}), (\d{1,3}), (\d{1,3})/', $rgb, $rgbValue);
        $rgba = "rgba($rgbValue[1], $rgbValue[2], $rgbValue[3], $transparency)";
        return $rgba;
    }

    public function generalOverride($view)
    {
        // These styles apply if "Custom Settings" is enabled:
        // - Block Outline Width - for hover and select outlines
        // - Area Blocks Outline Hover and Selected Color
        // - Global Area Blocks Outline Hover and Selected Color
        // - Empty Areas Outline Hover and Selected Color
        // - Empty Global Areas Outline Hover and Selected Color
        // - Areas Drag Indicator Color
        // - Global Areas Drag Indicator Color
        // - Area Blocks Selected Background Color
        // - Global Area Blocks Selected Background Color
        // - Empty Areas Selected Background Color
        // - Empty Global Areas Selected Background Color

        // These styles apply if "Custom Settings" is enabled and "Always show block outlines while in edit mode" is checked:
        // - Block Outline Style
        // - Block Outline Width - for hover, select, and default outlines
        // - Areas Blocks Outline Color - default outlines
        // - Global Area Blocks Outline Color - default outlines
        // * block outlines will lay on top of area outlines
        // * the default block outline color is on top of the hover and selected color, so they will not be visible if the default outline style is solid

        // These styles apply if "Custom Settings" is enabled and "Always show area outlines while in edit mode" is checked:
        // - Area Outline Style
        // - Area Outline Width
        // - Areas Outline Color
        // - Global Areas Outline Color
        // - Empty Areas Outline Color
        // - Empty Global Areas Outline Color

        // These styles apply if "Custom Settings" is enabled and "Show block and empty area background hover color" is checked:
        // - Area Blocks Background Hover Color
        // - Global Area Blocks Background Hover Color
        // - Empty Areas Background Hover Color
        // - Empty Global Areas Background Hover Color

        // use the $configSubKeyList array and loop through it
        foreach (CustomizeEditingInterface::getConfigSubKeyList() as $subKey) {
            // skip the "presets" sub key
            // - presets aren't used for creating or controlling CSS styles
            if ($subKey != 'presets') {
                // use each subkey to make the config key
                $configKey = 'customize_editing_interface.' . $subKey;
                // use the config key to get the config value
                // use the subkey to make a variable name
                ${$subKey} = Config::get($configKey);
            }
        }

        /*Rows*/
        $oneRow = <<<EOD
        /*1 BLOCK ICON PER ROW*/

        /**
         * Blocks Label and Block Clipboard Stacks drop down
         */

        /*move labels to the left*/
        div.ccm-panel-header-accordion nav li>a, div.ccm-panel-header-accordion nav span {
            padding: 18px 15px 18px 10px;
        }

        /**
         * Search
         */

        /*move magnifying glass more to the left*/
        div.ccm-panel-header-search i.fa-search {
            left: 10px;
        }

        /*reduce the left padding of the search input to move it left*/
        div.ccm-panel-header-search input {
            padding: 20px 20px 20px 30px;
        }

        /**
         * Block Icons
         */

        /*reduce the left and right padding of the container that holds the block icons*/
        div.ccm-panel-content-inner {
            padding: 20px 10px 40px 10px;
        }

        /*remove float on row li*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li {
            float: none;
            margin: 0px 0px 5px 0px;
        }

        /*reduce the height*/
        a.ccm-panel-add-block-draggable-block-type {
            height: 38px;
            width: 100%;
            border-radius: 0px;
        }

        a.ccm-panel-add-block-draggable-block-type img {
            width: 24px;
            height: auto;
            position: absolute;
            top: 6px;
            left: 10px;
            margin-top: 0px;
        }

        a.ccm-panel-add-block-draggable-block-type span {
            right: 0px;
            top: 0px;
            left: auto;
            width: 239px;
            height: 100%;
            font-size: 15px;
            line-height: 15px;
            border-top-right-radius: 4px;
            border-bottom-left-radius: 0px;
        }

        a.ccm-block-edit-drag, a.ccm-panel-add-block-draggable-block-type-dragger {
            width: 100%;
            height: 38px;
        }
EOD;

        $threeRows = <<<EOD
        /*3 BLOCK ICONS PER ROW*/

        /**
         * Blocks Label and Block Clipboard Stacks drop down
         */

        /*move labels to the left*/
        div.ccm-panel-header-accordion nav li>a, div.ccm-panel-header-accordion nav span {
            padding: 18px 15px 18px 10px;
        }

        /**
         * Search
         */

        /*move magnifying glass more to the left*/
        div.ccm-panel-header-search i.fa-search {
            left: 10px;
        }

        /*reduce the left padding of the search input to move it left*/
        div.ccm-panel-header-search input {
            padding: 20px 20px 20px 30px;
        }

        /**
         * Block Icons
         */

        /*reduce the left and right padding of the container that holds the block icons*/
        div.ccm-panel-content-inner {
            padding: 20px 10px 40px 10px;
        }

        /*reduce the right and bottom margin*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li {
            margin: 0px 6px 6px 0px;
        }

        /*remove the right margin on every third block icon in each section*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li:nth-child(3n) {
            margin-right: 0px;
        }

        /*add margin to the last block item in each section*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li:last-child {
            margin-bottom: 10px;
        }
EOD;

        $fourRows = <<<EOD
        /*4 BLOCK ICONS PER ROW*/

        /**
        * Blocks Label and Block Clipboard Stacks drop down
        */

        /*move labels to the left*/
        div.ccm-panel-header-accordion nav li>a, div.ccm-panel-header-accordion nav span {
          padding: 18px 15px 18px 10px;
        }

        /**
        * Search
        */

        /*move magnifying glass more to the left*/
        div.ccm-panel-header-search i.fa-search {
          left: 10px;
        }

        /*reduce the left padding of the search input to move it left*/
        div.ccm-panel-header-search input {
          padding: 20px 20px 20px 30px;
        }

        /**
        * Block Icons
        */

        /*reduce the left and right padding of the container that holds the block icons*/
        div.ccm-panel-content-inner {
          padding: 20px 10px 40px 10px;
        }

        /*reduce the height and width*/
        a.ccm-panel-add-block-draggable-block-type {
          height: 86px;
          width: 66px;
        }

        /*reduce margin top for the image*/
        a.ccm-panel-add-block-draggable-block-type img {
          margin-top: 5px;
        }

        /*reduce the right and bottom margin*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li {
          margin: 0px 6px 6px 0px;
        }

        /*remove the right margin on every fourth block icon in each section*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li:nth-child(4n) {
          margin-right: 0px;
        }

        a.ccm-panel-add-block-draggable-block-type span {
          padding-top: 6px;
          white-space: normal;
          height: 48px;
        }

        /*reduce the width*/
        a.ccm-block-edit-drag, a.ccm-panel-add-block-draggable-block-type-dragger {
          width: 66px;
        }

        /*add margin to the last block item in each section*/
        div#ccm-panel-add-block div.ccm-panel-add-block-set ul li:last-child {
          margin-bottom: 10px;
        }
EOD;
        /*End Rows*/

        /*Settings*/
        $showAreaNamesStyle = <<<EOD
        /*always show area names*/
        div.ccm-area-footer {
            opacity: 1 !important;
        }
EOD;
        /*End Settings*/

        /*Outline Colors*/
        // $showBlockOutlines = <<<EOD
        $showBlockOutlinesStyle = <<<EOD
        /*outline for area blocks*/
        .ccm-block-cover {
            outline: $blockOutlineWidth $blockOutlineStyle $blockOutlineColorArea;
            outline-offset: -1px;
        }
        .ccm-panel-add-block-set .ccm-block-cover {
            outline: none;
        }
        /*outline for global area blocks*/
        .ccm-global-area .ccm-block-cover {
            outline: $blockOutlineWidth $blockOutlineStyle $blockOutlineColorGlobalArea;
            outline-offset: -1px;
        }
EOD;

        $showAreaOutlinesStyle = <<<EOD
        /*outline for non-global areas*/
        div.ccm-area:not(.ccm-global-area)  {
            outline: $areaOutlineWidth $areaOutlineStyle $areaOutlineColor !important;
        }
        /*area name outline*/
        div.ccm-area.ccm-area-highlight>div.ccm-area-footer div.ccm-area-footer-handle {
            border-left: 1px solid $areaOutlineColor;
            border-bottom: 1px solid $areaOutlineColor;
            border-right: 1px solid $areaOutlineColor;
        }
EOD;

        $globalAreaOutlineColorStyle = <<<EOD
        /*outline for global areas*/
        .ccm-global-area {
            /*box-shadow: 0px 0px 0px $areaOutlineWidth $globalAreaOutlineColor;*/
            outline: $areaOutlineWidth $areaOutlineStyle $globalAreaOutlineColor !important;
            /*outline-offset: 1px !important;*/
        }
        /*global area name outline*/
        div.ccm-area.ccm-area-highlight.ccm-global-area-highlight>div.ccm-area-footer div.ccm-area-footer-handle {
            border-left: 1px solid $globalAreaOutlineColor;
            border-bottom: 1px solid $globalAreaOutlineColor;
            border-right: 1px solid $globalAreaOutlineColor;
        }
EOD;

        $dragAreaIndicatorColorStyle = <<<EOD
        /*outline for drag area and drag highlight indicator*/
        div.ccm-area-drag-area {
            outline-color: {$this->rgbConvert($dragAreaIndicatorColor, '0.5')};
        }
EOD;

        $dragGlobalAreaIndicatorColorStyle = <<<EOD
        /*outline for drag global area and drag highlight indicator*/
        div.ccm-global-area>.ccm-area-block-list>div.ccm-area-drag-area {
            outline-color: {$this->rgbConvert($dragGlobalAreaIndicatorColor, '0.5')};
        }
EOD;

        $emptyAreaOutlineColorStyle = <<<EOD
        /*outline empty area*/
        .ccm-area[data-total-blocks="0"]:not(.ccm-global-area) {
            outline: $blockOutlineWidth $areaOutlineStyle $emptyAreaOutlineColor !important;
        }
EOD;

        $emptyGlobalAreaOutlineColorStyle = <<<EOD
        /*outline empty global area*/
        .ccm-global-area[data-total-blocks="0"] {
            outline: $blockOutlineWidth $areaOutlineStyle $emptyGlobalAreaOutlineColor !important;
        }
EOD;

        $blockOutlineHoverColorAreaStyle = <<<EOD
        /*outline hover color for blocks in areas*/
        /*outline color for selected blocks in areas*/
        div.ccm-block-edit.ccm-menu-item-hover,
        div.ccm-block-edit.ccm-block-highlight {
            outline: $blockOutlineWidth solid $blockOutlineHoverColorArea !important;
        }
EOD;

        $blockOutlineHoverColorGlobalAreaStyle = <<<EOD
        /*outline hover color for blocks in global areas*/
        /*outline color for selected blocks in global areas*/
        div.ccm-global-area div.ccm-block-edit.ccm-menu-item-hover,
        div.ccm-global-area div.ccm-block-edit.ccm-block-highlight {
            outline: $blockOutlineWidth solid $blockOutlineHoverColorGlobalArea !important;
        }
EOD;

        $emptyAreaOutlineHoverColorStyle = <<<EOD
        /*outline hover color for empty areas*/
        /*outline color for empty areas on select*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover,
        div.ccm-area[data-total-blocks="0"].ccm-area-highlight {
            outline: $blockOutlineWidth solid $emptyAreaOutlineHoverColor !important;
        }
        .ccm-area[data-total-blocks="0"].ccm-area-highlight>div.ccm-area-footer div.ccm-area-footer-handle {
            border-left: 1px solid $emptyAreaOutlineHoverColor;
            border-bottom: 1px solid $emptyAreaOutlineHoverColor;
            border-right: 1px solid $emptyAreaOutlineHoverColor;
        }
        /*hover empty area name outline*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover div.ccm-area-footer-handle {
            border-color: $emptyAreaOutlineHoverColor;
        }
EOD;

        $emptyGlobalAreaOutlineHoverColorStyle = <<<EOD
        /*outline hover color for empty global areas*/
        /*outline color for empty global areas on select*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover.ccm-global-area,
        div.ccm-area[data-total-blocks="0"].ccm-area-highlight.ccm-global-area-highlight {
            outline-color: $emptyGlobalAreaOutlineHoverColor !important;
        }
        /*hover empty global area name outline*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover.ccm-global-area div.ccm-area-footer-handle {
            border-color: $emptyGlobalAreaOutlineHoverColor;
        }
        /*selected empty global area name outline*/
        div.ccm-area.ccm-area-highlight.ccm-global-area-highlight>div.ccm-area-footer div.ccm-area-footer-handle {
            border-left: 1px solid $emptyGlobalAreaOutlineHoverColor !important;
            border-bottom: 1px solid $emptyGlobalAreaOutlineHoverColor !important;
            border-right: 1px solid $emptyGlobalAreaOutlineHoverColor !important;
        }
EOD;
        /*End Outline Colors*/

        /*Background Colors*/
        $selectedBlockBackgroundColorStyle = <<<EOD
        /*background color select color for blocks*/
        div#ccm-menu-highlighter.ccm-block-highlight {
            background: $selectedBlockBackgroundColor;
            opacity: .4;
        }
EOD;

        $selectedBlockBackgroundColorGlobalStyle = <<<EOD
        /*background color for global area blocks*/
        div#ccm-menu-highlighter.ccm-block-highlight.ccm-global-area-block-highlight {
            background: $selectedBlockBackgroundColorGlobal;
        }
EOD;

        $emptyAreaSelectedBackgroundColorStyle = <<<EOD
        /*background color for empty areas*/
        div#ccm-menu-highlighter.ccm-area-highlight {
            background: $emptyAreaSelectedBackgroundColor;
            opacity: 0.2;
        }
EOD;

        $emptyGlobalAreaSelectedBackgroundColorStyle = <<<EOD
        /*background color for empty global areas*/
        div#ccm-menu-highlighter.ccm-area-highlight.ccm-global-area-highlight {
            background: $emptyGlobalAreaSelectedBackgroundColor;
        }
EOD;
        /*End Background Colors*/

        /*Background Hover Colors*/
        $blockBackgroundHoverColorStyle = <<<EOD
        /*background hover color for blocks in areas*/
        div.ccm-block-edit.ccm-menu-item-hover {
            background: {$this->rgbConvert($blockBackgroundHoverColor, '0.5')};
            -webkit-transition: background .5s;
                transition: background .5s;
        }
EOD;

        $blockBackgroundHoverColorGlobalStyle = <<<EOD
        /*background hover color for blocks in global areas*/
        div.ccm-global-area div.ccm-block-edit.ccm-menu-item-hover {
            background: {$this->rgbConvert($blockBackgroundHoverColorGlobal, '0.5')};
            -webkit-transition: background .5s;
                transition: background .5s;
        }
EOD;

        $emptyAreaBackgroundHoverColorStyle = <<<EOD
        /*background hover color for empty areas*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover {
            background: $emptyAreaBackgroundHoverColor;
            background: {$this->rgbConvert($emptyAreaBackgroundHoverColor, '0.5')};
            -webkit-transition: background .5s;
                transition: background .5s;
        }
EOD;

        $emptyGlobalAreaBackgroundHoverColorStyle = <<<EOD
        /*background hover color for empty global areas*/
        div.ccm-area[data-total-blocks="0"].ccm-menu-item-hover.ccm-global-area {
            background: {$this->rgbConvert($emptyGlobalAreaBackgroundHoverColor, '0.5')};
            -webkit-transition: background .5s;
                transition: background .5s;
        }
EOD;
        /*End Background Hover Colors*/

        /*Add General Styles*/

        // get the current page object
        $c = Page::getCurrentPage();

        // getInstance()
        // - get one instance of the view object using the singleton pattern
        $v = View::getInstance();

        // things to check before adding styles
        // - that $c is an object and the page is in edit mode
        if (is_object($c) && $c->isEditMode()) {
            /*Empty Area/Global Area Background Color*/
            $v->addFooterItem("<style>$emptyAreaSelectedBackgroundColorStyle</style>");
            $v->addFooterItem("<style>$emptyGlobalAreaSelectedBackgroundColorStyle</style>");

            /*Selected Block Background Color*/
            $v->addFooterItem("<style>$selectedBlockBackgroundColorStyle</style>");
            $v->addFooterItem("<style>$selectedBlockBackgroundColorGlobalStyle</style>");

            /*Block Outline Hover Color Area/Global Area*/
            $v->addFooterItem("<style>$blockOutlineHoverColorAreaStyle</style>");
            $v->addFooterItem("<style>$blockOutlineHoverColorGlobalAreaStyle</style>");

            /*Empty Area/Global Area Outline Hover Color*/
            $v->addFooterItem("<style>$emptyAreaOutlineHoverColorStyle</style>");
            $v->addFooterItem("<style>$emptyGlobalAreaOutlineHoverColorStyle</style>");

            /*Drag Area/Global Area Indicator Color*/
            $v->addFooterItem("<style>$dragAreaIndicatorColorStyle</style>");
            $v->addFooterItem("<style>$dragGlobalAreaIndicatorColorStyle</style>");

            /*Icons Per Row*/
            switch ($iconsPerRow) {
                case 1:
                    $v->addFooterItem("<style>$oneRow</style>");
                    break;
                case 3:
                    $v->addFooterItem("<style>$threeRows</style>");
                    break;
                case 4:
                    $v->addFooterItem("<style>$fourRows</style>");
                    break;
            }

            /*Show Area Names*/
            if ($showAreaNames) {
                $v->addFooterItem("<style>$showAreaNamesStyle</style>");
            }

            /*Show Block Outlines*/
            if ($showBlockOutlines) {
                $v->addFooterItem("<style>$showBlockOutlinesStyle</style>");
            }

            /*Show Area Outlines*/
            if ($showAreaOutlines) {
                $v->addFooterItem("<style>$showAreaOutlinesStyle</style>");
                $v->addFooterItem("<style>$globalAreaOutlineColorStyle</style>");
                $v->addFooterItem("<style>$emptyAreaOutlineColorStyle</style>");
                $v->addFooterItem("<style>$emptyGlobalAreaOutlineColorStyle</style>");
            }

            /*Show Block Background Hover Color*/
            if ($showBlockBackgroundHoverColor) {
                $v->addFooterItem("<style>$blockBackgroundHoverColorStyle</style>");
                $v->addFooterItem("<style>$blockBackgroundHoverColorGlobalStyle</style>");
                $v->addFooterItem("<style>$emptyAreaBackgroundHoverColorStyle</style>");
                $v->addFooterItem("<style>$emptyGlobalAreaBackgroundHoverColorStyle</style>");
            }
        }
    }

    public function wcag2Override($view)
    {
        // These styles apply if "Custom Settings" is enabled and "Enable WCAG 2.0 compliant color contrast" is checked:
        // - WCAG 2.0 compliant color contrast

        /*WCAG 2.0 contrast accessible text and controls*/
        $wcag2CompliantStyle = <<<EOD

        /* Edit Toolbar */

        /*edit toolbar text and icons
        compliant color: #575757
        background color: #FEFEFE
        CSS:*/
        div#ccm-toolbar>ul>li>a {
            color: #575757;
        }

        /* Page Settings Panels */

        /*page settings > section text
        compliant color: #ACBAD4
        background color: #2a2c30

        CSS:*/
        div#ccm-panel-page menu li a, div#ccm-panel-compose-page menu li a {
            color: #ACBAD4;
        }

        /*CSS change to compliment compliant color:
        background-color: #18191B;*/

        div#ccm-panel-page menu li a:hover, div#ccm-panel-compose-page menu li a:hover {
            background-color: #18191B;
        }

        /*page settings button (active) text and icon
        compliant color: #0E4883
        background color: #E4E4E4

        CSS:*/
        div#ccm-toolbar>ul>li>a.ccm-launch-panel-active, div#ccm-toolbar>ul>li>a.ccm-launch-panel-active:hover {
            color: #0E4883;
        }

        /*page settings back arrow
        compliant color: #AAACB3
        background color: #202226

        CSS:*/
        div#ccm-panel-page a.ccm-panel-back, div#ccm-panel-compose-page a.ccm-panel-back {
            color: #AAACB3;
        }

        /*page settings > devices > device text
        compliant color: #A5B8C0
        background color: #272a2e

        CSS:*/
        div.ccm-menu-device-set .ccm-panel-devicelist-device>a {
            color: #A5B8C0 !important;
        }

        /*CSS change to compliment compliant color:
        background-color: #18191B;*/

        div.ccm-menu-device-set .ccm-panel-devicelist-device>a:hover {
            background-color: #18191B;
        }

        /*page settings > versions > version text
        compliant color: #AEC2DA
        background color: #303136

        CSS:*/
        #ccm-panel-page #ccm-panel-page-versions table td {
            color: #AEC2DA;
        }

        /*page settings > versions > checkbox
        compliant border color: #C0C0C0
        background color: #303136

        CSS:*/
        div#ccm-panel-page input.ccm-flat-checkbox {
            border: 1px solid #C0C0C0;
        }

        /*page settings > versions > "delete" text
        compliant color: #B9BDD7
        background color: #303136

        CSS:*/
        #ccm-panel-page #ccm-panel-page-versions table thead th button.disabled {
            color: #B9BDD7;
        }

        /*page settings > versions > "newer/older" text
        compliant color: #BEC0C8
        compliant border color: #BEC0C8
        background color: #303136

        CSS:*/
        div#ccm-panel-page .pager li a {
            color: #BEC0C8;
            border: 1px solid #BEC0C8;
        }

        /*CSS change to compliment compliant color:*/
        div#ccm-panel-page .pager li a:hover {
            background: #151619;
        }

        /*page settings > versions > menu arrow
        compliant color: #A8BAD2
        background color: #2b2c31

        CSS:*/
        #ccm-panel-page #ccm-panel-page-versions table td a.ccm-panel-page-versions-version-menu {
            color: #A8BAD2;

        }

        /*page settings > attributes > attribute text
        compliant color: #A5B8C0
        background color: #272a2e

        CSS:*/
        #ccm-panel-page section#ccm-menu-page-attributes ul li a {
            color: #A5B8C0;
        }

        /*CSS change to compliment compliant color:
        background-color: #18191B;*/

        #ccm-panel-page section#ccm-menu-page-attributes ul li a:hover {
            background-color: #18191B;
        }

        /*page settings > attributes > magnifying glass
        compliant color: #C5C5C5
        background color: #333539

        CSS:*/
        div.ccm-panel-header-search i.fa-search {
            color: #C5C5C5;
        }

        /*page settings > attributes > search placeholder text
        compliant color: #C5C5C5
        background color: #333539

        CSS:*/
        #ccm-panel-header-search-input::-webkit-input-placeholder {
           color: #C5C5C5 !important;
        }

        #ccm-panel-header-search-input:-moz-placeholder {
           color: #C5C5C5 !important;
        }

        #ccm-panel-header-search-input::-moz-placeholder {
           color: #C5C5C5 !important;
        }

        #ccm-panel-header-search-input:-ms-input-placeholder {
           color: #C5C5C5 !important;
        }

        /*page settings > design> "page template", "theme",  template text
        compliant color: #89989A
        background color: #000

        CSS:*/
        div#ccm-panel-page .list-group .list-group-item {
            color: #89989A;
        }

        /*page settings > design > "page template", checkbox border
        compliant color: #A6A6A6
        background color: #171C22

        CSS:*/
        div#ccm-panel-page input.ccm-flat-radio {
            border: 1px solid #A6A6A6;
        }

        /*page settings > design> "customize" text
        compliant color: #E6E6E6
        background color: #0f41ac

        CSS:*/
        div#ccm-panel-page-design-themes div.ccm-page-design-theme-thumbnail.list-group-item.ccm-page-design-theme-thumbnail-selected>span>i span.ccm-page-design-theme-customize a {
            color: #E6E6E6;
        }

        /*page settings > design> "expand/collapse" text
        compliant color: #A8A9B1
        background color: #171C22

        CSS:*/
        div#ccm-panel-page .list-group .list-group-item.list-group-item-collapse, div#ccm-panel-compose-page .list-group .list-group-item.list-group-item-collapse {
            color: #A8A9B1;
        }

        /*page settings > design> "expand/collapse" arrow open
        compliant border-color: #AEAEAE
        background color: #171C22

        CSS:*/
        div#ccm-panel-page .list-group.ccm-panel-list-group-item-expanded a.list-group-item-collapse span:after, div#ccm-panel-compose-page .list-group.ccm-panel-list-group-item-expanded a.list-group-item-collapse span:after {
            border-color: transparent transparent #AEAEAE transparent;
        }

        /*page settings > design> "expand/collapse" arrow open
        compliant border-color: #A5A7AE
        background color: #171C22

        CSS:*/
        div#ccm-panel-page .list-group .list-group-item.list-group-item-collapse span:after, div#ccm-panel-compose-page .list-group .list-group-item.list-group-item-collapse span:after {
            border-color: #A5A7AE transparent transparent transparent;

        }

        /*page settings > design> customize theme > section text
        compliant color: #A4ADCA
        background color: #202225

        CSS:*/
        #ccm-panel-page-design-customize div.ccm-panel-page-design-customize-style-set h5 {
            color: #A4ADCA;
        }

        /*page settings > design> customize theme > section down arrow
        compliant border-color: #AEAEAE
        background color: #202225

        CSS:*/
        #ccm-panel-page-design-customize div.ccm-panel-page-design-customize-style-set h5.ccm-panel-page-design-customize-style-set-collapse:after {
            border-color: #AEAEAE transparent transparent transparent;
            border-width: 6px 6px 0px 6px;
            border-style: solid;
        }
        /**** border-width is broken, it should be:
        border-width: 6px 6px 0px 6px;*/

        /*page settings > design> customize theme > section up arrow
        compliant border-color: #AEAEAE
        background color: #202225

        CSS:*/
        #ccm-panel-page-design-customize div.ccm-panel-page-design-customize-style-set h5.ccm-panel-page-design-customize-style-set-expand:after {
            border-color: transparent transparent #AEAEAE transparent;
            border-width: 0px 6px 6px 6px;
            border-style: solid;
        }
        /**** border-width is broken, it should be:
        border-width: 6px 6px 0px 6px;*/

        /*page settings > design> customize theme > section item text
        compliant color: #ACB8D4
        background color: #2A2C30

        CSS:*/
        #ccm-panel-page-design-customize div.ccm-panel-page-design-customize-style-set ul li {
            color: #ACB8D4;
        }

        /* Add Content Panels */

        /*add content > dropdown text
        compliant color: #9FB2B8
        background color: #202226

        CSS:*/
        div#ccm-panel-add-block div.ccm-panel-header-accordion nav span {
            color: #9FB2B8;
        }

        /*add content > dropdown arrow
        compliant color: #9CAFB6
        background color: #202226

        CSS:*/
        div#ccm-panel-add-block div.ccm-panel-header-accordion nav ul.ccm-panel-header-accordion-dropdown:after {
            border-color: #9CAFB6 transparent;
        }

        /*** magnifying glass CSS is covered by page_setting_panels.css*/

        /*add content > block > search placeholder text
        compliant color: #C5C5C5
        background color: #333539

        CSS:*/
        div.ccm-panel-header-search input::-webkit-input-placeholder {
           color: #C5C5C5 !important;
        }

        div.ccm-panel-header-search input:-moz-placeholder {
           color: #C5C5C5 !important;
        }

        div.ccm-panel-header-search input::-moz-placeholder {
           color: #C5C5C5 !important;
        }

        div.ccm-panel-header-search input:-ms-input-placeholder {
           color: #C5C5C5 !important;
        }

        /*add content > clipboard > block name
        compliant color: #97A4BB
        background color: #0F1825

        CSS:*/
        div#ccm-panel-add-clipboard-block-list>div.ccm-panel-add-clipboard-block-item div.block-name {
            color: #97A4BB;
        }

        /*add content > clipboard > blocks
        compliant color: #BDC5DA
        background color: #343639

        CSS:*/
        div#ccm-panel-add-clipboard-block-list>div.ccm-panel-add-clipboard-block-item div.blocks {
            color: #BDC5DA;
        }

        /*add content > stacks > stack name
        compliant color: #97A4BB
        background color: #0f1825

        CSS:*/
        div#ccm-panel-add-block-stack-list>div.ccm-panel-add-block-stack-item>div.stack-name {
          color: #97A4BB;
        }

        /*add content > stacks > block count
        compliant color: #97B6DF
        background color: #202834

        CSS:*/
        div#ccm-panel-add-block-stack-list>div.ccm-panel-add-block-stack-item div.blocks>div.block-count {
            color: #97B6DF;
        }

        /*add content > stacks > block name
        compliant color: #A2A7C8
        background color: #1c1e21

        CSS:*/
        div#ccm-panel-add-block-stack-list>div.ccm-panel-add-block-stack-item div.blocks>div.block>div.block-name {
            color: #A2A7C8;
        }


        /*v8.2*/

        /*center the checkin (save/publish/schedule)*/
        div#ccm-panel-check-in form#ccm-check-in {
            /* width: auto; */
            margin-left: 30px;
            margin-right: 30px;
        }

        /*help blocks*/
        .ccm-ui .help-block {
            color: #545454;
        }

        /*schedule page timezone text*/
        #ccm-check-in-schedule-wrapper .help-block {
            color: #929292;
        }

        /*page settings > attributes > Page ID*/
        div#ccm-panel-detail-page-attributes div.ccm-panel-detail-content span.ccm-detail-page-attributes-id {
            color: #525252;
        }

        /*page settings > versions > info icon*/
        #ccm-panel-page #ccm-panel-page-versions table td a {
            color: #B9C4E1;
        }

        /*search results header*/
        table.ccm-search-results-table thead th a {
            color: #666666;
        }
        table.ccm-search-results-table thead th {
            color: #666666;
        }
        table.ccm-search-results-table thead th.ccm-results-list-active-sort-desc a, table.ccm-search-results-table thead th.ccm-results-list-active-sort-asc a {
            color: #000;
        }

        /*search results text*/
        table.ccm-search-results-table tbody td {
            color: #525252;
        }

        /*advanced search text*/
        div.ccm-header-search-form form a.ccm-header-launch-advanced-search {
            color: #4F4F4F;
        }

        /*search navigation text*/
        ul.ccm-header-search-navigation a {
            color: #666666;
        }
        ul.ccm-header-search-navigation a:focus, ul.ccm-header-search-navigation a:hover {
            color: #000;
        }

        /*fancy tree*/
        span.fancytree-title {
            color: #4D4D4D;
        }

        /*tab text*/
        div.ccm-ui ul.nav-tabs>li>a {
            color: #575757;
        }

        /*welcome date*/
        .ccm-ui nav.ccm-dashboard-desktop-navbar.navbar p.navbar-text {
            color: #9BBED4 !important;
        }

        /*welcome nav bar text*/
        .ccm-ui .navbar-default form .navbar-nav>li>a {
            color: #B6B6B6;
        }

        /*welcome - latest text*/
        div#ccm-block-desktop-site-activity-legend h6 {
            color: #545454;
        }

        /*welcome - featured theme text*/
        div.ccm-block-desktop-featured-theme h6 {
            color: #575757;
        }

        /*welcome - tutorials/news from concrete5.org text*/
        body.ccm-dashboard-desktop div.ccm-block-rss-displayer-wrapper div.ccm-block-rss-displayer h5 {
            color: #575757;
        }

        /*welcome - news from concrete5.org date*/
        .ccm-block-rss-displayer-item-date {
            color: #575757;
        }

        /*welcome - featured add-on text*/
        div.ccm-block-desktop-featured-addon div.ccm-block-desktop-featured-addon-inner h6 {
            color: #575757;
        }

        /*welcome - marketplace deal of the day text*/
        body.ccm-dashboard-desktop div.ccm-block-dashboard-newsflow-latest-wrapper div.ccm-block-dashboard-newsflow-latest h6 {
            color: #575757;
        }

        /*welcome - latest form name/date*/
        div.ccm-block-desktop-latest-form {
            color: #fff;
        }

        /*welcome text*/
        div.ccm-dashboard-desktop-flex .row,
        div.ccm-dashboard-desktop-flex .row>div[class*='col-'] {
            color: #575757;
        }

        /*dashboard side panel text*/
        div#ccm-panel-dashboard menu li a, div#ccm-panel-dashboard ul.nav li a {
            color: #395E88;
        }
        div#ccm-panel-dashboard menu li.nav-selected>a,
        div#ccm-panel-dashboard ul.nav li.nav-selected>a {
            color: #000000;
        }

        /*dashboard link color*/
        .ccm-ui a {
            color: #3889C0;
        }
        .ccm-ui a:hover, .ccm-ui a:focus {
            color: #1e608c;
        }

        /*search results breadcrumb*/
        div.ccm-search-results-breadcrumb ol.breadcrumb>li a {
            color: #6E6E6E;
        }
        div.ccm-search-results-breadcrumb ol.breadcrumb>li>a:hover,
        div.ccm-search-results-breadcrumb ol.breadcrumb>li>a:focus {
            color: #000;
        }
        .ccm-ui .breadcrumb>.active {
            color: #6E6E6E;
        }

        /*stack/area navbar text*/
        .ccm-ui .navbar-default .navbar-nav>li>a {
            color: #6E6E6E;
        }
        .ccm-ui .navbar-default .navbar-nav>li>a:hover,
        .ccm-ui .navbar-default .navbar-nav>li>a:focus {
            color: #000000;
        }

        /*search fields*/
        div.ccm-search-fields-row div.form-group label.control-label {
            color: #575757;
        }
EOD;
        /*END WCAG 2.0 contrast accessible text and controls*/

        /*Add WCAG 2.0 Styles*/

        // get the current page object
        $c = Page::getCurrentPage();

        // getInstance()
        // - get one instance of the view object using the singleton pattern
        $v = View::getInstance();

        // check that $c is an object before adding the WCAG 2.0 override styles
        if (is_object($c)) {
            // get the permissions for the current page
            $cp = new \Permissions($c);
            // if the permissions allow for the toolbar to be viewed, add the styles
            if ($cp->canViewToolbar()) {
                $v->addFooterItem("<style>$wcag2CompliantStyle</style>");
            }
        }
    }
}
