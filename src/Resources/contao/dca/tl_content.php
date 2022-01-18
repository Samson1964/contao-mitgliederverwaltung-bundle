<?php

/**
 * Paletten
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['mitgliederverwaltung_zusagen'] = '{type_legend},type,headline;{mvturnierverwaltung_legend},mvturnierverwaltung_id;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},cssID;{invisible_legend:hide},invisible,start,stop';

/**
 * Felder
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['mvturnierverwaltung_id'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['mvturnierverwaltung_id'],
	'exclude'                 => true,
	'options_callback'        => array('tl_content_mitgliederverwaltungX', 'getTournaments'),
	'inputType'               => 'select',
	'eval'                    => array
	(
		'mandatory'           => true,
		'multiple'            => false,
		'chosen'              => true,
		'submitOnChange'      => false,
		'includeBlankOption'  => false,
		'tl_class'            => 'long',
	),
	'sql'                     => "int(10) unsigned NOT NULL default '0'"
);

/*****************************************
 * Klasse tl_content_mitgliederverwaltung
 *****************************************/

class tl_content_mitgliederverwaltungX extends \Backend
{

	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

	/**
	 * Liefert die Liste der registrierten Turniere zurück
	 */
	public static function getTournaments()
	{
		$objRegister = \Database::getInstance()->prepare("SELECT * FROM tl_mitgliederverwaltung_tournaments ORDER BY date DESC ")
		                                       ->execute();
		$array = array();
		while($objRegister->next())
		{
			$array[$objRegister->id] = $objRegister->titel . ' [Start: ' . date('d.m.Y', $objRegister->date) . ']';
		}
		return $array;
	}


}
