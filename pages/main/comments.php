<?php
    session_start();
    include('../../admin/config/config.php');

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        if (isset($_POST['send'])) {
            $id_user = $user['id_user'];
            $id_place = $_GET['idplace'];
            $sql = "SELECT * FROM places WHERE id_place='$id_place' LIMIT 1";    
            $query = mysqli_query($mysqli, $sql);
            $comment = $_POST['comment'];
            $date = date('Y-m-d');
            mysqli_query($mysqli, "INSERT INTO comments(id_user,id_place,content,date) VALUES ('$id_user','$id_place','$comment','$date')");
            echo "<script> window.location.href='../../index.php?action=diadiemxanh&query=chitiet&id=$id_place' </script>";
        } else {
            $id = $_GET['idcomment'];
            $sql = "SELECT * FROM comments WHERE id_comment='$id' LIMIT 1";
            $query = mysqli_query($mysqli, $sql);
            mysqli_query($mysqli,"DELETE FROM comments WHERE id_comment='$id'");
            echo "<script> window.location.href='../../index.php?action=diadiemxanh&query=chitiet&id=$_GET[idplace]' </script>";
        }
    }
?>