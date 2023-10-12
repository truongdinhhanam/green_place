<?php
    include('../../config/config.php');

    $id_user = $_POST['iduser'];
    $type = $_POST['type'];
    $placeName = $_POST['placeName'];
    $address = $_POST['address'];
    $desc = $_POST['desc'];
    $criterias = $_POST['criterias'];
    $image = $_FILES['image'];
    $images = $_FILES['images'];
    if (isset($_POST['browse'])) {
        $sql_browse = "INSERT INTO places(placeName,address,image,description,id_place_type,id_user) VALUES('$placeName','$address','$image','$desc','$type','$id_user')";
        mysqli_query($mysqli,$sql_browse);
        $id_place = mysqli_insert_id($mysqli);
        foreach ($images as $key => $value) {
            mysqli_query($mysqli,"INSERT INTO images(id_place,image) VALUES('$id_place','$value')");
        }
        foreach ($criterias as $key => $value) {
            mysqli_query($mysqli,"INSERT INTO criterias(criteria,id_place) VALUES('$value','$id_place')");
        }
        header("Location:../../index.php?action=duyetdiadiemxanh&query=xem");
    }
    else {
        $idbrowse = $_GET['idbrowse'];
        $sql = "SELECT * FROM browses WHERE id_browse='$idbrowse' LIMIT 1";    
        $query = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($query)) {
            unlink('../supplier/uploads/'.$row['image']);
        }
        mysqli_query($mysqli,"DELETE FROM browse_img WHERE id_browse='$idbrowse'");
        mysqli_query($mysqli,"DELETE FROM browse_crt WHERE id_browse='$idbrowse'");
        $sql_delete = "DELETE FROM browses WHERE id_browse='$idbrowse'";
        mysqli_query($mysqli,$sql_delete);
        $img = mysqli_query($mysqli,"SELECT * FROM browse_img WHERE id_browse='$idbrowse'");
        while ($row_img = mysqli_fetch_array($img)) {
            unlink('../supplier/uploads/'.$row_img['img']);
        }
        header('Location:../../index.php?action=duyetdiadiemxanh&query=xem');
    }
?>