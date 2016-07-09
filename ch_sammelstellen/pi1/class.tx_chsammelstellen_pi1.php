<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Chi Hoang <info@chihoang.de>
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
require_once(PATH_tslib.'class.tslib_pibase.php');

/**
 * Plugin 'Sammelstellen' for the 'ch_sammelstellen' extension.
 *
 * @author	Chi Hoang <info@chihoang.de>
 * @package	TYPO3
 * @subpackage	tx_chsammelstellen
 */
class tx_chsammelstellen_pi1 extends tslib_pibase {
	var $prefixId      = 'tx_chsammelstellen_pi1';		// Same as class name
	var $scriptRelPath = 'pi1/class.tx_chsammelstellen_pi1.php';	// Path to this script relative to the extension dir.
	var $extKey        = 'ch_sammelstellen';	// The extension key.
	
	/**
	 * The main method of the PlugIn
	 *
	 * @param	string		$content: The PlugIn content
	 * @param	array		$conf: The PlugIn configuration
	 * @return	The content that is displayed on the website
	 */
	function main($content, $conf) {
	
		$this->conf = $conf;
		$this->pi_setPiVarDefaults();
		$this->pi_loadLL();
		$this->pi_USER_INT_obj = 1;	// Configuring so caching is not expected. This value means that no cHash params are ever set. We do this, because it's a USER_INT object!
		
		$content = '
					<h3>Liste der Sammelstellen:</h3>
					<form action="'.$this->pi_getPageLink($GLOBALS['TSFE']->id).'" method="POST">
						<input type="hidden" name="'.$this->prefixId.'[view]" value="list">
						<input type="text" name="'.$this->prefixId.'[input_field]" value="'.htmlspecialchars($this->piVars['input_field']).'">
						<input type="submit" name="'.$this->prefixId.'[submit_button]" value="'.htmlspecialchars($this->pi_getLL('submit_button_label')).'">
					</form>';


			// _POST Params
		$getParams = t3lib_div::_POST();  
		
		switch ( $getParams['tx_chsammelstellen_pi1']['view'] ) {
            
			case "list": 
		
				if ( intval ( $getParams['tx_chsammelstellen_pi1']['input_field'] ) ) {
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery (  		'plz, quadtree',
																			'tx_chsammelstellen_quadtree',
																			'plz ="'. $getParams['tx_chsammelstellen_pi1']['input_field'] . '"'
																	);
					echo $GLOBALS['TYPO3_DB']->sql_error();        
					$row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
					$tree = $row ["quadtree"];
					
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery (  	'plz, quadtree',
																		'tx_chsammelstellen_quadtree',
																		'quadtree LIKE "'. substr( $tree, 0, 8) . '%"'
																);
					echo $GLOBALS['TYPO3_DB']->sql_error();        
					while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
						$umkreis [$row ["plz"] ] = $row ["quadtree"];
					}
					
					$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery (  	'uid, plz, ortsname, ansprechpartner, telefon, quadtree',
																		'tx_chsammelstellen_plz',
																		'plz IN ('. implode(",", array_keys($umkreis) ). ')' );
					echo $GLOBALS['TYPO3_DB']->sql_error(); 
					while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
						$tabelle[ $row ['uid'] ] [ ] = $row;
					}
					
					foreach ( $tabelle as $key => $row ) {
						foreach ( $row as $uid => $data ) {
							$cache [ ] = "<tr><td>" . $data [ "plz" ] . "</td><td>" . utf8_decode ( $data [ "ortsname" ] ). "</td><td>" . utf8_decode ( $data [ "ansprechpartner" ]  ). "</td><td>" . $data [ "telefon" ] . "</td><tr>";
						}
					}
						
					$content .= "<table><tr><td><b>Postleitzahl</b></td><td><b>Sammelstelle</b></td><td><b>Ansprechpartner</b></td><td><b>Telefon-Nr.</b></td></tr>" . implode ( "", $cache ) . "</table>";	
					
				} else {
				
					$content .= "Keine Sammelstellen gefunden!";
				}
				
				break;
				
			default: 
				break;
		}
	
		return $this->pi_wrapInBaseClass($content);
	}
}



if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_sammelstellen/pi1/class.tx_chsammelstellen_pi1.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/ch_sammelstellen/pi1/class.tx_chsammelstellen_pi1.php']);
}

?>