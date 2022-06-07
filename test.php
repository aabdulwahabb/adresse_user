<?php
        //connection
$conn = new \PDO('mysql:host=localhost;dbname=adresseuser', 'sail', 'password');

//open the database
$sql = "SELECT * FROM userrechte";

$modulearr = array();
$actionsarr = array();

foreach ($conn->query($sql) as $feld)
{
    $modul_name = $feld->module;
    $action_name = $feld->action;

        array_push($actionsarr, $action_name);
        $modulearr[$modul_name] = array($actionsarr);
}

?>
