<?php 
include ($_SERVER['DOCUMENT_ROOT'] . '/tortugues-runners-web/db_connection/db_connection.php');

if(isset($_POST['submit'])) {
    $etapa_id = htmlspecialchars($_POST['etapa_id']);

    $sql = "SELECT * FROM etapes WHERE etapa_id = $etapa_id"; 

$result = mysqli_query($conn,$sql);
$etapa = mysqli_fetch_assoc($result);

}

?>