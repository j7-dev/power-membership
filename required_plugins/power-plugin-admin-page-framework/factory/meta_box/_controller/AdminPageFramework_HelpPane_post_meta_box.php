<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/power-plugin-compiler>
 * <https://en.michaeluno.jp/power-plugin>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

class PowerPlugin_AdminPageFramework_HelpPane_post_meta_box extends PowerPlugin_AdminPageFramework_HelpPane_Base {
    public function _replyToRegisterHelpTabText()
    {
        if (! $this->oProp->oCaller->isInThePage()) {
            return false;
        }
        $this->_setHelpTab($this->oProp->sMetaBoxID, $this->oProp->sTitle, $this->oProp->aHelpTabText, $this->oProp->aHelpTabTextSide);
    }
}
