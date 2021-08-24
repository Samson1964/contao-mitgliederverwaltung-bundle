<?php

namespace Schachbulle\ContaoMitgliederverwaltungBundle\Classes;

/**
 * Class Import
  */
class Import extends \Backend
{

	function __construct()
	{
	}

	/**
	 * Importiert eine Mitgliederliste
	 */
	public function run()
	{

		if(\Input::get('key') != 'import')
		{
			// Beenden, wenn der Parameter nicht übereinstimmt
			return '';
		}

		// Objekt BackendUser importieren
		$this->import('BackendUser','User');
		$class = $this->User->uploader;

		// See #4086
		if (!class_exists($class))
		{
			$class = 'FileUpload';
		}

		$objUploader = new $class();

		// Formular wurde abgeschickt, Wortliste importieren
		if (\Input::post('FORM_SUBMIT') == 'tl_mitgliederverwaltung_import')
		{
			$arrUploaded = $objUploader->uploadTo('system/tmp');

			if(empty($arrUploaded))
			{
				\Message::addError($GLOBALS['TL_LANG']['ERR']['all_fields']);
				$this->reload();
			}

			$this->import('Database');

			foreach ($arrUploaded as $txtFile)
			{
				$objFile = new \File($txtFile, true);

				if ($objFile->extension != 'csv')
				{
					\Message::addError(sprintf($GLOBALS['TL_LANG']['ERR']['filetype'], $objFile->extension));
					continue;
				}

				log_message('Importiere Datei: '.$txtFile,'mitgliederverwaltung.log');
				$resFile = $objFile->handle;
				$record_count = 0;
				$neu_count = 0;
				$update_count = 0;
				$kopf = array();
				$start = microtime(true);

				while(!feof($resFile))
				{
					$zeile = trim(fgets($resFile));
					$spalte = explode(';', $zeile);
					if($record_count == 0)
					{
						// Kopfzeile auslesen
						$kopf = $spalte;
						log_message('Lese Kopfzeile '.$record_count.': '.$zeile,'mitgliederverwaltung.log');
					}
					else
					{
						log_message('Importiere Datenzeile '.$record_count.': '.$zeile,'mitgliederverwaltung.log');
						// Datensatz auslesen
						$set = array();
						$mitgliedsdaten = array();
						for($x = 0; $x < count($spalte); $x++)
						{
							switch($kopf[$x])
							{
								case 'mitgliednr':
									$set['memberId'] = $spalte[$x]; break;
								case 'vorname':
									$set['vorname'] = $spalte[$x]; break;
								case 'nachname':
									$set['nachname'] = $spalte[$x]; break;
								case 'strasse':
									$set['strasse'] = $spalte[$x]; break;
								case 'plz':
									$set['plz'] = $spalte[$x]; break;
								case 'ort':
									$set['ort'] = $spalte[$x]; break;
								case 'mitgliedbeginn':
									$mitgliedsdaten[0]['from'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'mitgliedende':
									$mitgliedsdaten[0]['to'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'status':
									$mitgliedsdaten[0]['status'] = $spalte[$x]; break;
								case 'email':
									$set['email1'] = $spalte[$x]; break;
								case 'gm_title':
									$set['gm_title'] = $spalte[$x]; break;
								case 'im_title':
									$set['im_title'] = $spalte[$x]; break;
								case 'wgm_title':
									$set['wgm_title'] = $spalte[$x]; break;
								case 'fm_title':
									$set['fm_title'] = $spalte[$x]; break;
								case 'wim_title':
									$set['wim_title'] = $spalte[$x]; break;
								case 'cm_title':
									$set['cm_title'] = $spalte[$x]; break;
								case 'wfm_title':
									$set['wfm_title'] = $spalte[$x]; break;
								case 'wcm_title':
									$set['wcm_title'] = $spalte[$x]; break;
								case 'fgm_title':
									$set['fgm_title'] = $spalte[$x]; break;
								case 'sim_title':
									$set['sim_title'] = $spalte[$x]; break;
								case 'fim_title':
									$set['fim_title'] = $spalte[$x]; break;
								case 'ccm_title':
									$set['ccm_title'] = $spalte[$x]; break;
								case 'lgm_title':
									$set['lgm_title'] = $spalte[$x]; break;
								case 'cce_title':
									$set['cce_title'] = $spalte[$x]; break;
								case 'lim_title':
									$set['lim_title'] = $spalte[$x]; break;
								case 'gm_date':
									$set['gm_date'] =\Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'im_date':
									$set['im_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'wgm_date':
									$set['wgm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'fm_date':
									$set['fm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'wim_date':
									$set['wim_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'cm_date':
									$set['cm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'wfm_date':
									$set['wfm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'wcm_date':
									$set['wcm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'fgm_date':
									$set['fgm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'sim_date':
									$set['sim_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'fim_date':
									$set['fim_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'ccm_date':
									$set['ccm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'lgm_date':
									$set['lgm_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'cce_date':
									$set['cce_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'lim_date':
									$set['lim_date'] = \Schachbulle\ContaoHelperBundle\Classes\Helper::putDate($spalte[$x]); break;
								case 'aktiv':
									$set['published'] = $spalte[$x]; break;
								default:
							}
						}

						// Mitgliedsdaten konvertieren
						if($mitgliedsdaten[0]['from'])
						{
							$set['memberships'] = serialize($mitgliedsdaten);
						}

						// Import/Update nur vornehmen, wenn Mitgliedsnummer vorhanden ist
						if($set['memberId'])
						{
							// Nach Mitgliedsnummer suchen
							$objResult = \Database::getInstance()->prepare("SELECT * FROM tl_mitgliederverwaltung WHERE memberId = ?")
							                                     ->execute($set['memberId']);
							
							if($objResult->numRows)
							{
								log_message('Set-Array Update:','mitgliederverwaltung.log');
								log_message(print_r($set,true),'mitgliederverwaltung.log');
								// Mitglied bereits vorhanden, dann überschreiben
								$objUpdate = \Database::getInstance()->prepare("UPDATE tl_mitgliederverwaltung %s WHERE id = ?")
								                                     ->set($set)
								                                     ->execute($objResult->id);
								$update_count++;
							}
							else
							{
								log_message('Set-Array Insert:','mitgliederverwaltung.log');
								log_message(print_r($set,true),'mitgliederverwaltung.log');
								// Neues Mitglied
								$objInsert = \Database::getInstance()->prepare("INSERT INTO tl_mitgliederverwaltung %s")
								                                     ->set($set)
								                                     ->execute();
								$neu_count++;
							}
						}
					}
					$record_count++;
				}

				$dauer = sprintf('%f0.4', microtime(true) - $start);
				\System::log('Mitgliederimport aus Datei '.$objFile->name.' - '.($neu_count+$update_count).' Datensätze - '.$neu_count.' neu, '.$update_count.' überschrieben - Dauer: '.$dauer.'s', __METHOD__, TL_GENERAL);
			}

			// Cookie setzen und zurückkehren zur Adressenliste (key=import aus URL entfernen)
			\System::setCookie('BE_PAGE_OFFSET', 0, 0);
			$this->redirect(str_replace('&key=import', '', \Environment::get('request')));
		}

		// Return form
		return '
<div class="content">
<div id="tl_buttons">
<a href="'.ampersand(str_replace('&key=import', '', \Environment::get('request'))).'" class="header_back" title="'.specialchars($GLOBALS['TL_LANG']['MSC']['backBTTitle']).'" accesskey="b">'.$GLOBALS['TL_LANG']['MSC']['backBT'].'</a>
</div>

<h2 class="sub_headline">'.$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_import']['headline'].'</h2>
<p style="margin: 18px;">'.$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_import']['format'].'</div>
'.\Message::generate().'
<form action="'.ampersand(\Environment::get('request'), true).'" id="tl_wortliste_import" class="tl_form" method="post" enctype="multipart/form-data">
<div class="tl_formbody_edit">
<input type="hidden" name="FORM_SUBMIT" value="tl_mitgliederverwaltung_import">
<input type="hidden" name="REQUEST_TOKEN" value="'.REQUEST_TOKEN.'">

<div class="widget">
  <h3>'.$GLOBALS['TL_LANG']['MSC']['source'][0].'</h3>'.$objUploader->generateMarkup().(isset($GLOBALS['TL_LANG']['MSC']['source'][1]) ? '
  <p class="tl_help tl_tip">'.$GLOBALS['TL_LANG']['MSC']['source'][1].'</p>' : '').'
</div>

</div>

<div class="tl_formbody_submit">

<div class="tl_submit_container">
  <input type="submit" name="save" id="save" class="tl_submit" accesskey="s" value="'.specialchars($GLOBALS['TL_LANG']['MSC']['tw_import'][0]).'">
</div>

</div>
</form>
</div>';

	}

	public function is_utf8($str)
	{
	    $strlen = strlen($str);
	    for ($i = 0; $i < $strlen; $i++) {
	        $ord = ord($str[$i]);
	        if ($ord < 0x80) continue; // 0bbbbbbb
	        elseif (($ord & 0xE0) === 0xC0 && $ord > 0xC1) $n = 1; // 110bbbbb (exkl C0-C1)
	        elseif (($ord & 0xF0) === 0xE0) $n = 2; // 1110bbbb
	        elseif (($ord & 0xF8) === 0xF0 && $ord < 0xF5) $n = 3; // 11110bbb (exkl F5-FF)
	        else return false; // ungültiges UTF-8-Zeichen
	        for ($c=0; $c<$n; $c++) // $n Folgebytes? // 10bbbbbb
	            if (++$i === $strlen || (ord($str[$i]) & 0xC0) !== 0x80)
	                return false; // ungültiges UTF-8-Zeichen
	    }
	    return true; // kein ungültiges UTF-8-Zeichen gefunden
	}

}
