<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/power-plugin-compiler>
 * <https://en.michaeluno.jp/power-plugin>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class PowerPlugin_AdminPageFramework_PageLoadInfo_post_type extends PowerPlugin_AdminPageFramework_PageLoadInfo_Base {
    private static $_oInstance;
    private static $aClassNames = array();
    public static function instantiate($oProp, $oMsg)
    {
        if (in_array($oProp->sClassName, self::$aClassNames)) {
            return self::$_oInstance;
        }
        self::$aClassNames[] = $oProp->sClassName;
        self::$_oInstance = new PowerPlugin_AdminPageFramework_PageLoadInfo_post_type($oProp, $oMsg);
        return self::$_oInstance;
    }
    public function _replyToSetPageLoadInfoInFooter()
    {
        if (isset($_GET[ 'page' ]) && $_GET[ 'page' ]) {
            return;
        }
        if (PowerPlugin_AdminPageFramework_WPUtility::getCurrentPostType() == $this->oProp->sPostType || PowerPlugin_AdminPageFramework_WPUtility::isPostDefinitionPage($this->oProp->sPostType) || PowerPlugin_AdminPageFramework_WPUtility::isCustomTaxonomyPage($this->oProp->sPostType)) {
            add_filter('update_footer', array( $this, '_replyToGetPageLoadInfo' ), 999);
        }
    }
}
