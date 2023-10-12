<?php
$sql_browse = "SELECT * FROM browses,place_types,users WHERE browses.id_place_type=place_types.id_place_type AND browses.id_user=users.id_user AND browses.id_browse='$_GET[id]'";
$query_browse = mysqli_query($mysqli, $sql_browse);
$sql_images = "SELECT * FROM browse_img WHERE id_browse='$_GET[id]'";
$query_images = mysqli_query($mysqli, $sql_images);
$sql_criteria = "SELECT * FROM browses,browse_crt WHERE browses.id_browse=browse_crt.id_browse AND browses.id_browse='$_GET[id]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
?>

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Chi Tiết Duyệt Địa Điểm Xanh</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <form method="POST" action="./modules/places/handle.php?idbrowse=<?php echo $row['id_browse'] ?>" enctype="multipart/form-data">
                <?php
                while ($row = mysqli_fetch_array($query_browse)) {
                ?>
                    <div class="action">
                        <h3 class="font-weight-bold text-primary"><?php echo $row['placeName'] ?></h3>
                        <div>
                            <button class="btn btn-success btn-icon-split" name="browse">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text font-weight-bold">Duyệt Địa Điểm</span>
                            </button>
                            <a href="./modules/places/handle.php?idbrowse=<?php echo $row['id_browse'] ?>" class="btn btn-warning btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text font-weight-bold">Chưa Đủ Điều Kiện</span>
                            </a>
                        </div>
                    </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Nhà cung cấp</h4>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td name="iduser" style="display: none;"><?php echo $row['id_user'] ?></td>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['username'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['address'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Địa điểm xanh</h4>
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Loại địa điểm</th>
                        <th>Tên địa điểm</th>
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td name="type"><?php echo $row['type'] ?></td>
                        <td name="placeName"><?php echo $row['placeName'] ?></td>
                        <td name="address"><?php echo $row['address'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Hình ảnh</h4>
            <div class="img-place">
                <div class="main">
                    <span class="control prev">
                        <i class="fas fa-fw fa-angle-left"></i>
                    </span>
                    <span class="control next">
                        <i class="fas fa-fw fa-angle-right"></i>
                    </span>
                    <div class="img-wrap">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="list-img">
                    <div>
                        <img src="../supplier/uploads/<?php echo $row['image'] ?>" alt="" name="image">
                    </div>
                    <?php
                    foreach ($query_images as $key => $value) {
                    ?>
                        <div>
                            <img src="../supplier/uploads/<?php echo $value['img'] ?>" alt="" name="images[]">
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Mô tả</h4>
            <p name="desc"><?php echo $row['description'] ?></p>
        <?php
                }
        ?>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <h4 class="font-weight-bold text-secondary">Tiêu chí</h4>
            <div class="criterias">
                <?php
                foreach ($query_criteria as $key => $value) {
                ?>
                    <div class="criteria">
                        <i class="fas fa-check"></i>
                        <p name="criterias[]"><?php echo $value['criteria'] ?></p>
                    </div>
                <?php
                }
                ?>
                </form>
            </div>
        </div>
    </div>
</div>