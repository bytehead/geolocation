<?php

if (!defined('TL_ROOT'))
    die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  MEN AT WORK 2011-2012
 * @package    GeoProtection
 * @license    GNU/LGPL
 * @filesource
 */
class ModuleGeolocation extends Module
{

    /**
     * Template
     * @var string
     */
    protected $strTemplate = '';

    public function generate()
    {
        if (TL_MODE == 'FE')
        {
            $GLOBALS['TL_JAVASCRIPT'][] = "system/modules/geolocation/html/js/choosen/chosen.min.js";
            $GLOBALS['TL_JAVASCRIPT'][] = "system/modules/geolocation/html/js/geolocation.js";
            $GLOBALS['TL_CSS'][]        = "system/modules/geolocation/html/js/choosen/chosen.css";
        }

        // Change template
        $this->strTemplate = $this->geo_template;

        // Call parent
        return parent::generate();
    }

    protected function compile()
    {
        // Add Location obeject        
        $this->Template->UserGeolocation = Geolocation::getInstance()->getUserGeolocation();
    }

}

?>