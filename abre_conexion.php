<?php
$link= mysql_connect('localhost','root','');
if(!$link){
    die ('no pudo conectarse: '.mysql_error());
}
$dbseleccionada = mysql_select_db('biblio',$link);
?>