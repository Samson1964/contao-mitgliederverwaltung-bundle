<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package News
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Table tl_mitgliederverwaltung_applications
 */
$GLOBALS['TL_DCA']['tl_mitgliederverwaltung_applications'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_mitgliederverwaltung',
		'switchToEdit'                => true,
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id'            => 'primary',
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'fields'                  => array('id'),
			'flag'                    => 3,
			'headerFields'            => array('nachname', 'vorname'),
			'panelLayout'             => 'filter;sort;search,limit',
			'child_record_callback'   => array('tl_mitgliederverwaltung_applications', 'listTournaments'),
			'disableGrouping'         => true
		),
		'label' => array
		(
			'fields'                  => array('tournament'),
			'format'                  => '%s',
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif',
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
				//'button_callback'     => array('tl_mitgliederverwaltung_applications', 'copyArchive')
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"',
				//'button_callback'     => array('tl_mitgliederverwaltung_applications', 'deleteArchive')
			),
			'toggle' => array
			(
				'label'                => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['toggle'],
				'attributes'           => 'onclick="Backend.getScrollOffset()"',
				'haste_ajax_operation' => array
				(
					'field'            => 'published',
					'options'          => array
					(
						array('value' => '', 'icon' => 'invisible.svg'),
						array('value' => '1', 'icon' => 'visible.svg'),
					),
				),
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'default'                     => '{application_legend},tournament,applicationDate;{promise_legend},state,promiseDate,comment;{publish_legend},published'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'search'                  => true,
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'pid' => array
		(
			'foreignKey'              => 'tl_mitgliederverwaltung.nachname',
			'sql'                     => "int(10) unsigned NOT NULL default '0'",
			'relation'                => array('type'=>'belongsTo', 'load'=>'eager')
		),
		'tstamp' => array
		(
			'sorting'                 => true,
			'flag'                    => 6,
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'tournament' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['tournament'],
			'exclude'                 => true,
			'search'                  => true,
			'filter'                  => true,
			'sorting'                 => true,
			'inputType'               => 'select',
			'options_callback'        => array('tl_mitgliederverwaltung_applications', 'getTournaments'),
			'eval'                    => array('doNotCopy'=>true, 'chosen'=>true, 'mandatory'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'applicationDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['applicationDate'],
			'default'                 => time(),
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 6,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>true, 'doNotCopy'=>true, 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
			'load_callback' => array
			(
				array('tl_mitgliederverwaltung_applications', 'loadDate')
			),
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'state' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['state'],
			'exclude'                 => true,
			'inputType'               => 'radio',
			'default'                 => 0,
			'options'                 => array('0', '1', '2'),
			'eval'                    => array('tl_class'=>'w50'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['state_options'],
			'sql'                     => "varchar(1) NOT NULL default '0'"
		),
		'promiseDate' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['promiseDate'],
			'exclude'                 => true,
			'filter'                  => true,
			'sorting'                 => true,
			'flag'                    => 6,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'date', 'mandatory'=>false, 'doNotCopy'=>true, 'datepicker'=>true, 'tl_class'=>'clr w50 wizard'),
			'load_callback' => array
			(
				array('tl_mitgliederverwaltung_applications', 'loadDate')
			),
			'sql'                     => "int(10) unsigned NOT NULL default 0"
		),
		'comment' => array
		(
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array
			(
				'tl_class'            => 'w50 noresize',
			),
			'sql'                     => "text NULL"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_applications']['published'],
			'inputType'               => 'checkbox',
			'default'                 => 1,
			'filter'                  => true,
			'eval'                    => array('tl_class' => 'w50','isBoolean' => true),
			'sql'                     => "char(1) NOT NULL default '1'"
		),
	)
);


/**
 * Class tl_mitgliederverwaltung_applications
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2005-2014
 * @author     Leo Feyer <https://contao.org>
 * @package    News
 */
class tl_mitgliederverwaltung_applications extends Backend
{

	var $turniere = array();
	
	/**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');

		$objTurniere = $this->Database->prepare("SELECT * FROM tl_mitgliederverwaltung_tournaments")
		                              ->execute();

		if($objTurniere->numRows)
		{
			while($objTurniere->next())
			{
				$this->turniere[$objTurniere->id] = $objTurniere->titel;
			}
		}

	}

	/**
	 * Datensätze auflisten
	 * @param array
	 * @return string
	 */
	public function listTournaments($arrRow)
	{
		// Status
		if($arrRow['state'] == 0) $temp = '<b>'.$this->turniere[$arrRow['tournament']].'</b>';
		elseif($arrRow['state'] == 1) $temp = '<b style="color:green">'.$this->turniere[$arrRow['tournament']].'</b>';
		else $temp = '<b style="color:red">'.$this->turniere[$arrRow['tournament']].'</b>';
		// Bewerbungsdatum
		$temp .= ' - Bewerbung am: <b>'.date('d.m.Y', $arrRow['applicationDate']).'</b>';
		// Status
		if($arrRow['state'] == 0) $temp .= ' - ohne Entscheidung';
		elseif($arrRow['state'] == 1) $temp .= ' - <span style="color:green">Zusage</span>';
		else $temp .= ' - <span style="color:red">Absage</span>';
		// Datum
		if($arrRow['promiseDate']) $temp .= ' am <b>'.date('d.m.Y', $arrRow['promiseDate']).'</b>';
		return $temp;
	}

	/**
	 * Set the timestamp to 00:00:00 (see #26)
	 *
	 * @param integer $value
	 *
	 * @return integer
	 */
	public function loadDate($value)
	{
		if($value) return strtotime(date('Y-m-d', $value) . ' 00:00:00');
		else return '';
	}

	public function getTournaments(DataContainer $dc)
	{
		return $this->turniere;
	}
}