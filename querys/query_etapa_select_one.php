<?php 
if(!empty($_REQUEST['etapa_id'])) {
    $etapa_id = htmlspecialchars($_REQUEST['etapa_id']);

    $sql = "SELECT * FROM etapes WHERE etapa_id = $etapa_id"; 

$result = mysqli_query($conn,$sql);
$etapa = mysqli_fetch_assoc($result);

}

?>