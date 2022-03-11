<?php
/**
 * @copyright   Copyright (C) 2010-2021 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

namespace Combodo\iTop\Application\Helper;

/**
 * Helper for date and time management.
 *
 * @since 3.1.0
 */
class DateTimeHelper
{
	/**
	 * Create a date and time format generated from configuration format according to connected user language localisation.
	 * Configuration format parameter name: `date_and_time_format`
	 *
	 * @return DateTimeFormat
	 */
    static public function GetDateTimeFormat()
    {
	    $aFormats = \MetaModel::GetConfig()->Get('date_and_time_format');
	    $sLang = \Dict::GetUserLanguage();
	    $sDateFormat = isset($aFormats[$sLang]['date']) ? $aFormats[$sLang]['date'] : (isset($aFormats['default']['date']) ? $aFormats['default']['date'] : 'Y-m-d');
	    $sTimeFormat = isset($aFormats[$sLang]['time']) ? $aFormats[$sLang]['time'] : (isset($aFormats['default']['time']) ? $aFormats['default']['time'] : 'H:i:s');
	    $sDateAndTimeFormat = isset($aFormats[$sLang]['date_time']) ? $aFormats[$sLang]['date_time'] : (isset($aFormats['default']['date_time']) ? $aFormats['default']['date_time'] : '$date $time');
	    $sFullFormat = str_replace(array('$date', '$time'), array($sDateFormat, $sTimeFormat), $sDateAndTimeFormat);
	    return new \DateTimeFormat($sFullFormat);
    }
}