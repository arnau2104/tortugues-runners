<?php 

include ($_SERVER['DOCUMENT_ROOT'] . '/tortugues-runners-web/db_connection/db_connection.php');

$sql = "SELECT * FROM etapes ORDER BY data_inici ASC"; //ordenam les etapes per ordre de data d'inici

$result = mysqli_query($conn,$sql);
$etapes = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
