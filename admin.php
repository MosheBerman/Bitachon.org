<?php

/* ---------------------------------------------
/	File: admin.php
/
/
/	Created By: Moshe Berman
/
/	On: October 12, 2010
/
/	Last Edited on: October 13, 2010
/
/	Contains: Administrative page for Bitachon.org
/
/ ------------------------------------------- */

include(dirname(__FILE__).'/connection.php');

$link = mysql_connect($connection_server, $connection_user, $connection_password);

if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);

?>