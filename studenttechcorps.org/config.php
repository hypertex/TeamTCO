<?php  /// Moodle Configuration File 

unset($CFG);

$CFG->dbtype    = 'mysql';
$CFG->dbhost    = 'mysql400.ixwebhosting.com';
$CFG->dbname    = 'saingsh_stcmoo';
$CFG->dbuser    = 'saingsh_tcoh';
$CFG->dbpass    = 'umi74shi93wd';
$CFG->dbpersist =  false;
$CFG->prefix    = 'mdl_';

$CFG->wwwroot   = 'http://studenttechcorps.org/moodle';
$CFG->dirroot   = '/hsphere/local/home/saingshin/studenttechcorps.org/moodle';
$CFG->dataroot  = '/hsphere/local/home/saingshin/moodledata';
$CFG->admin     = 'admin';

$CFG->directorypermissions = 00777;  // try 02777 on a server in Safe Mode

require_once("$CFG->dirroot/lib/setup.php");
// MAKE SURE WHEN YOU EDIT THIS FILE THAT THERE ARE NO SPACES, BLANK LINES,
// RETURNS, OR ANYTHING ELSE AFTER THE TWO CHARACTERS ON THE NEXT LINE.
?>