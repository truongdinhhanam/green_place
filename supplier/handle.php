<?php
    session_start();
    include('../admin/config/config.php');
    
    $placeName = $_POST['placeName'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    $desc = $_POST['desc'];
    $criterias = $_POST['criteria'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $image_time = time().'_'.$image;
    if (isset($_FILES['images'])) {
        $files = $_FILES['images'];
        $file_names = $files['name'];
        foreach ($file_names as $key => $value) {
            move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
        }
    }

    if (isset($_SESSION['user'])) {
        $user = $_SESSION['user'];
        $id_user = $user['id_user'];
        if (isset($_POST['register'])) {
            $sql_register = "INSERT INTO browses(placeName,address,image,description,id_place_type,id_user) VALUES('$placeName','$address','$image_time','$desc','$type','$id_user')";
            mysqli_query($mysqli,$sql_register);
            move_uploaded_file($image_tmp,'uploads/'.$image_time);
            $id_browse = mysqli_insert_id($mysqli);
            foreach ($file_names as $key => $value) {
                mysqli_query($mysqli,"INSERT INTO browse_img(id_browse,img) VALUES('$id_browse','$value')");
            }
            foreach ($criterias as $key => $value) {
                mysqli_query($mysqli,"INSERT INTO browse_crt(criteria,id_browse) VALUES('$value','$id_browse')");
            }
            $alert = "<script>alert('Đăng ký xét duyệt địa điểm thành công')</script>";
            echo $alert;
            echo "<script> window.location.href='../index.php?action=register&query=supplier' </script>";
        } 
        else if (isset($_POST['update'])) {
            if ($image!='') {
                move_uploaded_file($image_tmp,'uploads/'.$image_time);
                $sql = "SELECT * FROM places WHERE id_place = '$_GET[idplace]' LIMIT 1";    
                $query = mysqli_query($mysqli, $sql);
                while ($row = mysqli_fetch_array($query)) {
                    unlink('./uploads/'.$row['image']);
                }
                $sql_update = "UPDATE places SET placeName='$placeName', image='$image_time', description='$desc' WHERE id_place='$_GET[idplace]'";
            } else {
                $sql_update = "UPDATE places SET placeName='$placeName', description='$desc' WHERE id_place='$_GET[idplace]'";
            }
            mysqli_query($mysqli,$sql_update);
            if (!empty($file_names[0])) {
                $images = mysqli_query($mysqli,"SELECT * FROM images WHERE id_place='$_GET[idplace]'");
                while ($row_img = mysqli_fetch_array($images)) {
                    unlink('./uploads/'.$row_img['image']);
                }
                mysqli_query($mysqli,"DELETE FROM images WHERE id_place='$_GET[idplace]'");
                foreach ($file_names as $key => $value) {
                    move_uploaded_file($files['tmp_name'][$key],'uploads/'.$value);
                }
                foreach ($file_names as $key => $value) {
                    mysqli_query($mysqli,"INSERT INTO images(id_place,image) VALUES('$_GET[idplace]','$value')");
                }
            }
            $alert = "<script>alert('Cập nhật địa điểm thành công')</script>";
            echo $alert;
            echo "<script> window.location.href='../index.php?action=supplier&query=place-detail&id=$_GET[idplace]' </script>";
        }
        else {
            $sql = "SELECT * FROM places WHERE id_place='$_GET[idplace]' LIMIT 1";    
            $query = mysqli_query($mysqli, $sql);
            while ($row = mysqli_fetch_array($query)) {
                unlink('./uploads/'.$row['image']);
            }
            mysqli_query($mysqli,"DELETE FROM images WHERE id_place='$_GET[idplace]'");
            mysqli_query($mysqli,"DELETE FROM criterias WHERE id_place='$_GET[idplace]'");
            $sql_delete = "DELETE FROM places WHERE id_place='$_GET[idplace]'";
            mysqli_query($mysqli,$sql_delete);
            $images = mysqli_query($mysqli,"SELECT * FROM images WHERE id_place='$_GET[idplace]'");
            while ($row_img = mysqli_fetch_array($images)) {
                unlink('./uploads/'.$row_img['image']);
            }
            
            $alert = "<script>alert('Xoá địa điểm thành công')</script>";
            echo $alert;
            echo "<script> window.location.href='../index.php?action=supplier&query=places' </script>";
        }
    }
?>