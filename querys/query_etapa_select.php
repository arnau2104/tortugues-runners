<?php 

$sql = "SELECT * FROM etapes ORDER BY data_inici ASC"; //ordenam les etapes per ordre de data d'inici

$result = mysqli_query($conn,$sql);
$etapes = mysqli_fetch_all($result,MYSQLI_ASSOC);

?>
