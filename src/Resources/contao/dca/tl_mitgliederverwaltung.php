<?php

/**
 * Tabelle tl_mitgliederverwaltung
 */
$GLOBALS['TL_DCA']['tl_mitgliederverwaltung'] = array
(

	// Konfiguration
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_mitgliederverwaltung_applications', 'tl_mitgliederverwaltung_konto'),
		'enableVersioning'            => true,
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		),
	),

	// Datensätze auflisten
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 2,
			'fields'                  => array('nachname','vorname'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;sort,search,limit',
		),
		'label' => array
		(
			// Das Feld aktiv wird vom label_callback überschrieben
			'fields'                  => array('memberId','nachname','vorname','birthday','plz','ort'),
			'showColumns'             => true,
			'format'                  => '%s',
			'label_callback'          => array('tl_mitgliederverwaltung', 'listMembers')
		),
		'global_operations' => array
		(
			'import' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['import'],
				'href'                => 'key=import',
				'icon'                => 'bundles/contaomitgliederverwaltung/images/import.png'
			),
			'tournaments' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['tournaments'],
				'href'                => 'table=tl_mitgliederverwaltung_tournaments',
				'icon'                => 'bundles/contaomitgliederverwaltung/images/tournament.png'
			),
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
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif',
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'applications' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['applications'],
				'href'                => 'table=tl_mitgliederverwaltung_applications',
				'icon'                => 'bundles/contaomitgliederverwaltung/images/application.png'
			),
			'konto' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['konto'],
				'href'                => 'table=tl_mitgliederverwaltung_konto',
				'icon'                => 'bundles/contaomitgliederverwaltung/images/euro.png'
			),
			'toggle' => array
			(
				'label'                => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['toggle'],
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
				'label'               => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif',
				'attributes'          => 'style="margin-right:3px"'
			),
		)
	),

	// Paletten
	'palettes' => array
	(
		'__selector__'                => array('death', 'fgm_title', 'sim_title', 'fim_title', 'ccm_title', 'lgm_title', 'cce_title', 'lim_title', 'gm_title', 'im_title', 'wgm_title', 'fm_title', 'wim_title', 'cm_title', 'wfm_title', 'wcm_title', 'honor_25', 'honor_40', 'honor_50', 'honor_60', 'honor_70', 'honor_president', 'honor_member'),
		'default'                     => '{person_legend},nachname,vorname,titel;{live_legend},birthday,birthplace,sex,death;{adresse_legend:hide},plz,ort,strasse;{telefon_legend:hide},telefon1,telefon2;{email_legend:hide},email1,email2;{memberships_legend},memberId,memberInternationalId,memberships;{iccf_legend},fgm_title,sim_title,fim_title,ccm_title,lgm_title,cce_title,lim_title;{fide_legend:hide},gm_title,im_title,wgm_title,fm_title,wim_title,cm_title,wfm_title,wcm_title;{normen_legend},normen;{honors_legend},honor_25,honor_40,honor_50,honor_60,honor_70,honor_president,honor_member;{bank_legend:hide},inhaber,iban,bic;{info_legend:hide},info;{publish_legend},published'
	),

	// Subpalettes
	'subpalettes' => array
	(
		'death'                       => 'deathday,deathplace',
		'fgm_title'                   => 'fgm_date',
		'sim_title'                   => 'sim_date',
		'fim_title'                   => 'fim_date',
		'ccm_title'                   => 'ccm_date',
		'lgm_title'                   => 'lgm_date',
		'cce_title'                   => 'cce_date',
		'lim_title'                   => 'lim_date',
		'gm_title'                    => 'gm_date',
		'im_title'                    => 'im_date',
		'wgm_title'                   => 'wgm_date',
		'fm_title'                    => 'fm_date',
		'wim_title'                   => 'wim_date',
		'cm_title'                    => 'cm_date',
		'wfm_title'                   => 'wfm_date',
		'wcm_title'                   => 'wcm_date',
		'honor_25'                    => 'honor_25_date',
		'honor_40'                    => 'honor_40_date',
		'honor_50'                    => 'honor_50_date',
		'honor_60'                    => 'honor_60_date',
		'honor_70'                    => 'honor_70_date',
		'honor_president'             => 'honor_president_date',
		'honor_member'                => 'honor_member_date',
	),

	// Felder
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['tstamp'],
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'nachname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['nachname'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'vorname' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['vorname'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'titel' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['titel'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => false,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'birthday' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['birthday'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => true,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'birthplace' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['birthplace'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'sex' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['sex'],
			'exclude'                 => true,
			'inputType'               => 'select',
			'options'                 => $GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['sex_options'],
			'eval'                    => array
			(
				'includeBlankOption'  => true,
				'mandatory'           => false, 
				'tl_class'            => 'w50'
			),
			'sql'                     => "varchar(1) NOT NULL default ''"
		),
		'death' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['death'],
			'inputType'               => 'checkbox',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'clr'
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'deathday' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['deathday'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => true,
			'flag'                    => 12,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'deathplace' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['deathplace'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'plz' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['plz'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'ort' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['ort'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'strasse' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['strasse'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'telefon1' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['telefon1'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'telefon2' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['telefon2'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>64, 'tl_class'=>'w50'),
			'sql'                     => "varchar(64) NOT NULL default ''"
		),
		'email1' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['email1'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50', 'rgxp'=>'email'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'email2' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['email2'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50', 'rgxp'=>'email'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'memberId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['memberId'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array
			(
				'mandatory'           => true,
				'maxlength'           => 20,
				'tl_class'            => 'w50',
				'unique'              => true,
			),
			'sql'                     => "varchar(20) NOT NULL default ''"
		),
		'memberInternationalId' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['memberInternationalId'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'filter'                  => true,
			'search'                  => true,
			'eval'                    => array
			(
				'mandatory'           => false,
				'maxlength'           => 20,
				'tl_class'            => 'w50',
			),
			'sql'                     => "varchar(20) NOT NULL default ''"
		),
		'memberships' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['memberships'],
			'exclude'                 => true,
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'tl_class'            => 'clr',
				'buttonPos'           => 'top',
				'columnFields'        => array
				(
					'from' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['membership_from'],
						'exclude'                 => true,
						'search'                  => false,
						'sorting'                 => true,
						'flag'                    => 12,
						'inputType'               => 'text',
						'eval'                    => array
						(
							'maxlength'           => 10,
							'style'               => 'width: 200px',
							'rgxp'                => 'alnum'
						),
						'load_callback'           => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
						),
						'save_callback' => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
						),
					),
					'to' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['membership_to'],
						'exclude'                 => true,
						'search'                  => false,
						'sorting'                 => true,
						'flag'                    => 12,
						'inputType'               => 'text',
						'eval'                    => array
						(
							'maxlength'           => 10,
							'style'               => 'width: 200px',
							'rgxp'                => 'alnum'
						),
						'load_callback'           => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
						),
						'save_callback' => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
						),
					),
					'status' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['membership_status'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval'                  => array
						(
							'style'             => 'width: 300px',
						),
					),
				)
			),
			'sql'                   => "blob NULL"
		),
		'fgm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fgm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'fgm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fgm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'sim_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['sim_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'sim_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['sim_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'fim_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fim_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'fim_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fim_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'ccm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['ccm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'ccm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['ccm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'lgm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['lgm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'lgm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['lgm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'cce_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['cce_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'cce_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['cce_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'lim_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['lim_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'lim_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['lim_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'gm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['gm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'gm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['gm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'im_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['im_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'im_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['im_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'wgm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wgm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'wgm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wgm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'fm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'fm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['fm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'wim_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wim_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'wim_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wim_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'cm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['cm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'cm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['cm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'wfm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wfm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'wfm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wfm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'wcm_title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wcm_title'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'wcm_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['wcm_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_25' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_25'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_25_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_25_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_40' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_40'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_40_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_40_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_50' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_50'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_50_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_50_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_60' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_60'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_60_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_60_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_70' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_70'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_70_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_70_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_president' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_president'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_president_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_president_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'honor_member' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_member'],
			'inputType'               => 'checkbox',
			'default'                 => '',
			'filter'                  => true,
			'eval'                    => array
			(
				'submitOnChange'      => true,
				'tl_class'            => 'w50 clr',
				'isBoolean'           => true
			),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'honor_member_date' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['honor_member_date'],
			'exclude'                 => true,
			'search'                  => false,
			'sorting'                 => false,
			'flag'                    => 11,
			'inputType'               => 'text',
			'eval'                    => array
			(
				'maxlength'           => 10,
				'tl_class'            => 'w50 clr',
				'rgxp'                => 'alnum'
			),
			'load_callback'           => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
			),
			'save_callback' => array
			(
				array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
			),
			'sql'                     => "int(8) unsigned NOT NULL default '0'"
		),
		'normen' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen'],
			'exclude'                 => true,
			'inputType'               => 'multiColumnWizard',
			'eval'                    => array
			(
				'tl_class'            => 'clr',
				'buttonPos'           => 'top',
				'columnFields'        => array
				(
					'title' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_title'],
						'exclude'                 => true,
						'search'                  => false,
						'sorting'                 => true,
						'flag'                    => 12,
						'inputType'               => 'select',
						'options'                 => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_title_options'],
						'eval'                    => array
						(
							'includeBlankOption'  => true,
							'style'               => 'width: 280px',
						),
					),
					'date' => array
					(
						'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_date'],
						'exclude'                 => true,
						'search'                  => false,
						'sorting'                 => true,
						'flag'                    => 12,
						'inputType'               => 'text',
						'eval'                    => array
						(
							'maxlength'           => 10,
							'style'               => 'width: 130px',
							'rgxp'                => 'alnum'
						),
						'load_callback'           => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'getDate')
						),
						'save_callback' => array
						(
							array('\Schachbulle\ContaoHelperBundle\Classes\Helper', 'putDate')
						),
					),
					'tournament' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_tournament'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval'                  => array
						(
							'style'             => 'width: 240px',
						),
					),
					'url' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_url'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval'                  => array
						(
							'style'             => 'width: 240px',
						),
					),
				)
			),
			'sql'                   => "blob NULL"
		),
		'inhaber' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['inhaber'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>255, 'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'iban' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['iban'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>22, 'tl_class'=>'w50 clr'),
			'sql'                     => "varchar(22) NOT NULL default ''"
		),
		'bic' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['bic'],
			'inputType'               => 'text',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'maxlength'=>11, 'tl_class'=>'w50'),
			'sql'                     => "varchar(11) NOT NULL default ''"
		),
		'info' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['info'],
			'inputType'               => 'textarea',
			'exclude'                 => true,
			'sorting'                 => true,
			'flag'                    => 1,
			'search'                  => true,
			'eval'                    => array('mandatory'=>false, 'tl_class'=>'long'),
			'sql'                     => "text NULL"
		),
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'default'                 => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>false),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	)
);

/**
 * Class tl_member_aktivicon
 */
class tl_mitgliederverwaltung extends \Backend
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
	 * Datensätze auflisten
	 * @param array
	 * @return string
	 */
	public function listMembers($row, $label, Contao\DataContainer $dc, $args)
	{
		//echo "<pre>";
		//print_r($row);
		//echo "</pre>";
		$args[3] = \Schachbulle\ContaoSpielerregisterBundle\Klassen\Helper::getDate($args[3]); // Geburtstag von JJJJMMTT umwandeln in TT.MM.JJJJ

		// Datensatz komplett zurückgeben
		return $args;
	}

}
