#
# Table structure for table 'tx_chsammelstellen_plz'
#
CREATE TABLE tx_chsammelstellen_plz (
	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) DEFAULT '0' NOT NULL,
	crdate int(11) DEFAULT '0' NOT NULL,
	cruser_id int(11) DEFAULT '0' NOT NULL,
	deleted tinyint(4) DEFAULT '0' NOT NULL,
	hidden tinyint(4) DEFAULT '0' NOT NULL,
	plz varchar(10) DEFAULT '' NOT NULL,
	ortsname varchar(50) DEFAULT '' NOT NULL,
	ansprechpartner varchar(20) DEFAULT '' NOT NULL,
	telefon varchar(30) DEFAULT '' NOT NULL,
	homepage varchar(50) DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
	KEY parent (pid)
);

CREATE TABLE tx_chsammelstellen_quadtree (
	uid int(11) DEFAULT '0' NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	plz varchar(6)  DEFAULT '' NOT NULL,
 	ortsname varchar(255)  DEFAULT '' NOT NULL,	
	laengengrad varchar(255)  DEFAULT '' NOT NULL,
	breitengrad varchar(255)  DEFAULT '' NOT NULL,
	quadtree varchar(30)  DEFAULT '' NOT NULL,
	
	PRIMARY KEY (uid),
);