<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_chsammelstellen_plz'] = array (
	'ctrl' => $TCA['tx_chsammelstellen_plz']['ctrl'],
	'interface' => array (
		'showRecordFieldList' => 'hidden,plz,ortsname,ansprechpartner,telefon,homepage'
	),
	'feInterface' => $TCA['tx_chsammelstellen_plz']['feInterface'],
	'columns' => array (
		'hidden' => array (		
			'exclude' => 1,
			'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config'  => array (
				'type'    => 'check',
				'default' => '0'
			)
		),
		'plz' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz.plz',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'max' => '10',	
				'eval' => 'trim',
			)
		),
		'ortsname' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz.ortsname',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'max' => '50',	
				'eval' => 'trim',
			)
		),
		'ansprechpartner' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz.ansprechpartner',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'max' => '20',	
				'eval' => 'trim',
			)
		),
		'telefon' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz.telefon',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'max' => '30',	
				'eval' => 'trim',
			)
		),
		'homepage' => array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz.homepage',		
			'config' => array (
				'type' => 'input',	
				'size' => '30',	
				'max' => '50',	
				'eval' => 'trim',
			)
		),
	),
	'types' => array (
		'0' => array('showitem' => 'hidden;;1;;1-1-1, plz, ortsname, ansprechpartner, telefon, homepage')
	),
	'palettes' => array (
		'1' => array('showitem' => '')
	)
);
?>