<?php

namespace Schachbulle\ContaoMitgliederverwaltungBundle\ContentElements;

class Zusagen extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_mitgliederverwaltung_zusagen';

	/**
	 * Generate the module
	 */
	protected function compile()
	{

		// Person aus Datenbank laden, wenn ID übergeben wurde
		if($this->spielerregister_id)
		{
			$objRecords = $this->Database->prepare("SELECT * FROM tl_mitgliederverwaltung_applications WHERE pid=?")
			                             ->execute($this->mvturnierverwaltung_id);

			// Datensätze gefunden
			if($objRecords->numRows)
			{

				// Daten aus tl_content in das Template schreiben
				$this->Template->name          = $objPerson->firstname1.' '.$objPerson->surname1;
				$this->Template->lebensdaten   = $objPerson->hideLifedata ? '' : \Schachbulle\ContaoSpielerregisterBundle\Klassen\Helper::getLebensdaten($objPerson->birthday, $objPerson->birthplace, $objPerson->death, $objPerson->deathday, $objPerson->deathplace);
				$this->Template->kurzinfo      = $objPerson->shortinfo;
				$this->Template->langinfo      = $objPerson->longinfo;


			}
		}

		return;

	}

}