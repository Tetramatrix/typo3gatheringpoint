<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}
$TCA['tx_chsammelstellen_plz'] = array (
	'ctrl' => array (
		'title'     => 'LLL:EXT:ch_sammelstellen/locallang_db.xml:tx_chsammelstellen_plz',		
		'label'     => 'ortsname',	
		'tstamp'    => 'tstamp',
		'crdate'    => 'crdate',
		'cruser_id' => 'cruser_id',
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
		'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'icon_tx_chsammelstellen_plz.gif',
	),
);


t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key';


t3lib_extMgm::addPlugin(array(
	'LLL:EXT:ch_sammelstellen/locallang_db.xml:tt_content.list_type_pi1',
	$_EXTKEY . '_pi1',
	t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif'
),'list_type');


if (TYPO3_MODE == 'BE') {
	$TBE_MODULES_EXT['xMOD_db_new_content_el']['addElClasses']['tx_chsammelstellen_pi1_wizicon'] = t3lib_extMgm::extPath($_EXTKEY).'pi1/class.tx_chsammelstellen_pi1_wizicon.php';
}
?>