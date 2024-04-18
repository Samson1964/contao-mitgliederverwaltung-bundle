<?php

/**
 * Backend-Modul: Übersetzungen im Eingabeformular
 */
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['buchung_legend'] = 'Buchung';
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['betrag'] = array('Betrag', 'Positiven (Haben-Buchung) oder negativen Betrag (Soll-Buchung) eingeben');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['datum'] = array('Datum', 'Buchungsdatum im Format TT.MM.JJJJ');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['art'] = array('Art', 'Art der Buchung');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['verwendungszweck'] = array('Verwendungszweck', 'Verwendungszweck, Turniername oder Turnierkennzeichen');

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['turnier_legend'] = 'Zugeordnetes Turnier';
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['turnier'] = array('Turnier wählen', 'Der Buchung ein Turnier zuordnen, um das Nenngeld zu übernehmen.');

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['comment_legend'] = 'Kommentar';
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['comment'] = array('Kommentar', 'Interner Kommentar');

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['publish_legend'] = 'Aktivieren';
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['published'] = array('Aktiv', 'Aktivieren oder deaktivieren Sie hier die Buchung');

/**
 * Buttons für Operationen
 */

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['new'] = array('Neue Buchung', 'Neue Buchung anlegen');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['edit'] = array('Buchung bearbeiten', 'Buchung %s bearbeiten');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['copy'] = array('Buchung kopieren', 'Buchung %s kopieren');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['delete'] = array('Buchung löschen', 'Buchung %s löschen');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['toggle'] = array('Buchung aktivieren/deaktivieren', 'Buchung %s aktivieren/deaktivieren');
$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['show'] = array('Buchungsdetails anzeigen', 'Details der Buchung %s anzeigen');

/**
 * Buttons für globale Operationen
 */

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['import'] = array('Globaler Import', 'Neue Buchungen für alle Mitglieder importieren');

$GLOBALS['TL_LANG']['tl_mitgliederverwaltung_konto']['art_options'] = array
(
	//''  => '-',
	'b' => 'Beitrag',
	'g' => 'Guthaben',
	'n' => 'BdF-Turnier',
	'i' => 'ICCF-Turnier',
);
