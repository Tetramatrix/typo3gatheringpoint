# TYPO3 Extension Manager dump 1.1
#
# Host: localhost    Database: amici
#--------------------------------------------------------


#
# Table structure for table "tx_chsammelstellen_plz"
#
DROP TABLE IF EXISTS tx_chsammelstellen_plz;
CREATE TABLE tx_chsammelstellen_plz (
  uid int(11) NOT NULL auto_increment,
  pid int(11) NOT NULL default '0',
  tstamp int(11) NOT NULL default '0',
  crdate int(11) NOT NULL default '0',
  cruser_id int(11) NOT NULL default '0',
  deleted tinyint(4) NOT NULL default '0',
  hidden tinyint(4) NOT NULL default '0',
  plz varchar(10) NOT NULL default '',
  ortsname varchar(50) NOT NULL default '',
  ansprechpartner varchar(20) NOT NULL default '',
  telefon varchar(30) NOT NULL default '',
  homepage varchar(50) NOT NULL default '',
  quadtree varchar(30) NOT NULL default '',
  PRIMARY KEY (uid),
  KEY parent (pid)
);


INSERT INTO tx_chsammelstellen_plz VALUES ('1', '1314', '0', '0', '0', '0', '0', 'plz', 'ort', 'ansprechpartner', 'tel', '', '');



