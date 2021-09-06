<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package   DeWIS
 * @author    Frank Hoppe
 * @license   GNU/LGPL
 * @copyright Frank Hoppe 2014
 */

namespace Schachbulle\ContaoMitgliederverwaltungBundle\Modules;

class TitelNormenLast extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_titelnormen_liste';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### MITGLIEDERVERWALTUNG - LETZTE TITEL UND NORMEN ###';
			$objTemplate->title = $this->name;
			$objTemplate->id = $this->id;

			return $objTemplate->parse();
		}

		return parent::generate(); // Weitermachen mit dem Modul
	}

	/**
	 * Generate the module
	 */
	protected function compile()
	{

		// Aktive Mitglieder laden
		$objMembers = \Database::getInstance()->prepare('SELECT * FROM tl_mitgliederverwaltung WHERE published = ?')
		                                      ->execute(1);

		// Aktuelle Titel und Normen suchen
		$daten = array();
		$mindate = date('Ymd', strtotime($this->mitgliederverwaltung_zeitraum)); // Nur Normen/Titel eines bestimmten Zeitraums
		$maxdate = date('Ymd'); // Heutiges Datum setzen
		
		if($objMembers->numRows)
		{
			while($objMembers->next())
			{
				$normen = unserialize($objMembers->normen);
				if(is_array($normen))
				{
					foreach($normen as $norm)
					{
						if($norm['date'] >= $mindate && $norm['date'] <= $maxdate)
						{
							// Aktuelle Norm gefunden, wurde ein Titel damit erreicht?
							if($objMembers->{$norm['title'].'_title'} && $objMembers->{$norm['title'].'_date'} == $norm['date'])
							{
								$daten[$norm['date']] = $objMembers->vorname.' '.$objMembers->nachname.' wurde der Titel '.$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_titel'][$norm['title']].' verliehen.';
							}
							else
							{
								$daten[$norm['date']] = $objMembers->vorname.' '.$objMembers->nachname.' hat eine Norm für den Titel '.$GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_titel'][$norm['title']].' erreicht.';
							}

						}
					}
				}
	
			}
		}

		// Daten abwärts sortieren
		krsort($daten);
		// Nur die Anzahl der gewünschten Daten zurückgeben
		$daten = array_splice($daten, 0, $this->mitgliederverwaltung_anzahl);

		$this->Template->daten = $daten;

	}

}
