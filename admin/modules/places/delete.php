<?php
    include('../../config/config.php');
    
    $idplace = $_GET['idplace'];
    $sql_delete = "DELETE FROM places WHERE id_place='$idplace'";
    mysqli_query($mysqli,$sql_delete);
    header('Location:../../index.php?action=quanlydiadiemxanh&query=xem');
?>