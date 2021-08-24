<?php

$GLOBALS["BE_MOD"]["accounts"]["mitgliederverwaltung"] = array(
	"tables"         => array('tl_mitgliederverwaltung'),
	"icon"           => "bundles/contaomitgliederverwaltung/images/icon.png",
	'import'         => array('Schachbulle\ContaoMitgliederverwaltungBundle\Classes\Import', 'run'),
);

/**
 * Frontend-Module
 */
//$GLOBALS['FE_MOD']['adressen'] = array
//(
//	'adressen_wertungsreferenten' => 'Schachbulle\ContaoAdressenBundle\Modules\Wertungsreferenten',
//	'adressen_suche'              => 'Schachbulle\ContaoAdressenBundle\Classes\Suche',
//);  

/**
 * Inhaltselemente
 */
 
//$GLOBALS['TL_CTE']['includes']['adressen'] = 'Schachbulle\ContaoAdressenBundle\ContentElements\Adresse';
