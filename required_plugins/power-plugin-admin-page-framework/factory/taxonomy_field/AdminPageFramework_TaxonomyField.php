<?php
/*
 * Admin Page Framework v3.9.1 by Michael Uno
 * Compiled with Admin Page Framework Compiler <https://github.com/michaeluno/power-plugin-compiler>
 * <https://en.michaeluno.jp/power-plugin>
 * Copyright (c) 2013-2022, Michael Uno; Licensed under MIT <https://opensource.org/licenses/MIT>
 */

abstract class PowerPlugin_AdminPageFramework_TaxonomyField extends PowerPlugin_AdminPageFramework_TaxonomyField_Controller {
    protected $_sStructureType = 'taxonomy_field';
    public function __construct($asTaxonomySlug, $sOptionKey='', $sCapability='manage_options', $sTextDomain='power-plugin')
    {
        if (empty($asTaxonomySlug)) {
            return;
        }
        $_sPropertyClassName = isset($this->aSubClassNames[ 'oProp' ]) ? $this->aSubClassNames[ 'oProp' ] : 'PowerPlugin_AdminPageFramework_Property_' . $this->_sStructureType;
        $this->oProp = new $_sPropertyClassName($this, get_class($this), $sCapability, $sTextDomain, $this->_sStructureType);
        $this->oProp->aTaxonomySlugs = ( array ) $asTaxonomySlug;
        $this->oProp->sOptionKey = $sOptionKey ? $sOptionKey : $this->oProp->sClassName;
        parent::__construct($this->oProp);
    }
}
