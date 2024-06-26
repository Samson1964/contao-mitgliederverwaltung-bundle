<?php

$GLOBALS['BE_MOD']['accounts']['mitgliederverwaltung'] = array(
	'tables'            => array('tl_mitgliederverwaltung', 'tl_mitgliederverwaltung_applications', 'tl_mitgliederverwaltung_tournaments', 'tl_mitgliederverwaltung_konto'),
	'icon'              => 'bundles/contaomitgliederverwaltung/images/members.png',
	'import'            => array('Schachbulle\ContaoMitgliederverwaltungBundle\Classes\Import', 'run'),
	'importTournaments' => array('Schachbulle\ContaoMitgliederverwaltungBundle\Classes\ImportTournaments', 'run'),
	'importBuchungen'   => array('Schachbulle\ContaoMitgliederverwaltungBundle\Classes\ImportBuchungen', 'run'),
);

/**
 * Frontend-Module
 */
$GLOBALS['FE_MOD']['mitgliederverwaltung'] = array
(
	'mitgliederverwaltung_titelnormen'       => 'Schachbulle\ContaoMitgliederverwaltungBundle\Modules\TitelNormen',
	'mitgliederverwaltung_titelnormen_liste' => 'Schachbulle\ContaoMitgliederverwaltungBundle\Modules\TitelNormenLast',
);  

/**
 * Inhaltselemente
 */

$GLOBALS['TL_CTE']['correspondence_chess']['mitgliederverwaltung_zusagen'] = 'Schachbulle\ContaoMitgliederverwaltungBundle\ContentElements\Zusagen';
