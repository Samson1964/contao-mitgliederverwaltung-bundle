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

class TitelNormen extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_titelnormen';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### MITGLIEDERVERWALTUNG - TITEL UND NORMEN ###';
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
				$normen = unserialize($objMembers->normen); // Normen extrahieren
				// Normen-Markierung erstellen, wird benötigt um für Titel benutzte Normen zu kennzeichnen
				if(is_array($normen))
				{
					for($x = 0; $x < count($normen); $x++)
					{
						$normen[$x]['markiert'] = false;
					}
				}

				// Titel der Reihe nach abfragen
				foreach($GLOBALS['TL_LANG']['tl_mitgliederverwaltung']['normen_titel'] as $titel => $titelname)
				{
					// Normen dieses Titels suchen und merken
					$aktuelleNorm = array(); // Nimmt die Daten der aktuellen Norm auf (Turniername, Link)
					$aktuellerAbstand = 99999; // Zeitlichen Abstand vom Titeldatum zum Normdatum resetten

					if($objMembers->{$titel.'_title'})
					{
						// Titel aktiv, jetzt Normen prüfen, die dazu gehören
						if(is_array($normen))
						{
							for($x = 0; $x < count($normen); $x++)
							{
								if($normen[$x]['date'] >= $mindate && $normen[$x]['date'] <= $maxdate && $normen[$x]['title'] == $titel)
								{
									// Normdatum innerhalb des Zeitfensters und Normtitel entspricht erreichtem Titel
									// Zeitlichen Abstand berechnen und Daten neu setzen, wenn Abstand kleiner ist
									$abstand = $objMembers->{$titel.'_date'} - $normen[$x]['date'];
									if($abstand < $aktuellerAbstand)
									{
										$aktuellerAbstand = $abstand;
										$aktuelleNorm = array
										(
											'turnier'     => $normen[$x]['tournament'],
											'link'        => $normen[$x]['url'],
										);
									}
									$normen[$x]['markiert'] = true;
                				}
                			}
                			// Alle Titelnormen geprüft, jetzt Daten zuweisen
							$daten[$titel]['titel'][] = array
							(
								'nachname'    => $objMembers->nachname,
								'vorname'     => $objMembers->vorname,
								'name'        => $objMembers->vorname.' '.$objMembers->nachname,
								'norm'        => $titel,
								'datum'       => \Schachbulle\ContaoHelperBundle\Classes\Helper::getDate($objMembers->{$titel.'_date'}),
								'turnier'     => $aktuelleNorm['turnier'],
								'link'        => $aktuelleNorm['link'],
								'turnierlink' => $aktuelleNorm['link'] ? '<a href="'.$aktuelleNorm['link'].'" target="_blank">'.$aktuelleNorm['turnier'].'</a>' : $aktuelleNorm['turnier'],
							);
                		}
					}
				}
				
				// Restliche (nicht markierte) Normen eintragen
				if(is_array($normen))
				{
					for($x = 0; $x < count($normen); $x++)
					{
						if(!$normen[$x]['markiert'])
						{
							$daten[$normen[$x]['title']]['norm'][] = array
							(
								'nachname'    => $objMembers->nachname,
								'vorname'     => $objMembers->vorname,
								'name'        => $objMembers->vorname.' '.$objMembers->nachname,
								'norm'        => $normen[$x]['title'],
								'datum'       => \Schachbulle\ContaoHelperBundle\Classes\Helper::getDate($normen[$x]['date']),
								'turnier'     => $normen[$x]['tournament'],
								'link'        => $normen[$x]['url'],
								'turnierlink' => $normen[$x]['url'] ? '<a href="'.$normen[$x]['url'].'" target="_blank">'.$normen[$x]['tournament'].'</a>' : $normen[$x]['tournament'],
							);
						}
					}
				}
			}
		}
		$this->Template->daten = $daten;

	}

}
