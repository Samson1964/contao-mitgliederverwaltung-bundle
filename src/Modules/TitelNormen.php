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
		$mindate = date('Ymd', strtotime('-2 months')); // Nur Normen/Titel der letzten 2 Monate
		if($objMembers->numRows)
		{
			while($objMembers->next())
			{
				$normen = unserialize($objMembers->normen);
				if(is_array($normen))
				{
					foreach($normen as $norm)
					{
						if($norm['date'] >= $mindate)
						{
							// Aktuelle Norm gefunden, wurde ein Titel damit erreicht?
							$title = '_title';
							if($objMembers->{$norm['title'].'_title'} && $objMembers->{$norm['title'].'_date'} == $norm['date'])
							{
								$titel = 'titel';
							}
							else
							{
								$titel = 'norm';
							}

							// Daten zuweisen
							$daten[$norm['title']][$titel][] = array
							(
								'nachname'    => $objMembers->nachname,
								'vorname'     => $objMembers->vorname,
								'name'        => $objMembers->vorname.' '.$objMembers->nachname,
								'norm'        => $norm['title'],
								'datum'       => \Schachbulle\ContaoHelperBundle\Classes\Helper::getDate($norm['date']),
								'turnier'     => $norm['tournament'],
								'link'        => $norm['url'],
								'turnierlink' => $norm['url'] ? '<a href="'.$norm['url'].'" target="_blank">'.$norm['tournament'].'</a>' : $norm['tournament'],
							);
							
						}
					}
				}
	
			}
		}
		$this->Template->daten = $daten;

	}

}
