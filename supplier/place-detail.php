<?php
$sql_place = "SELECT * FROM places WHERE places.id_place='$_GET[id]'";
$query_place = mysqli_query($mysqli, $sql_place);
$sql_images = "SELECT * FROM images WHERE id_place='$_GET[id]'";
$query_images = mysqli_query($mysqli, $sql_images);
$sql_criteria = "SELECT * FROM places,criterias WHERE places.id_place=criterias.id_place AND places.id_place='$_GET[id]'";
$query_criteria = mysqli_query($mysqli, $sql_criteria);
?>

<section>
    <div class="category">
        <ul class="category-list">
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=outstanding" class="category-link">
                    <i class="fa-solid fa-fire"></i>
                    <span>Nổi bật</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=coffee" class="category-link">
                    <i class="fa-solid fa-mug-hot"></i>
                    <span>Quán Cafe</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=restaurant" class="category-link">
                    <i class="fa-solid fa-utensils"></i>
                    <span>Nhà hàng</span>
                </a>
            </li>
            <li class="category-item">
                <a href="index.php?action=diadiemxanh&query=travel" class="category-link">
                    <i class="fa-solid fa-umbrella-beach"></i>
                    <span>Khu du lịch</span>
                </a>
            </li>
        </ul>
    </div>
    <?php
    while ($row = mysqli_fetch_array($query_place)) {
    ?>
        <div class="place-detail">
            <h3 class="heading"><span>địa điểm xanh</span> của bạn</h3>
            <div class="place-detail-heading">
                <h3 class="place-detail-name" style="color: #717375;"><?php echo $row['placeName'] ?></h3>
                <div>
                    <a href="index.php?action=supplier&query=place-update&idplace=<?php echo $row['id_place'] ?>" class="btn btn-success btn-icon-split" name="browse">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text font-weight-bold">Cập Nhật Địa Điểm</span>
                    </a>
                    <a href="./supplier/handle.php?idplace=<?php echo $row['id_place'] ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                        <span class="text font-weight-bold">Xoá Địa Điểm</span>
                    </a>
                </div>
            </div>
            <div class="address">
                <i class="fa-solid fa-location-dot"></i>
                <p class="place-detail-address"><?php echo $row['address'] ?></p>
            </div>
            <div class="action">
                <div class="rating">
                    <span><?php echo $row['star'] ?></span>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <span class="status">
                    <?php if ($row['status'] == 0) { ?>
                        Đang hoạt động
                    <?php } else { ?>
                        Đã đóng cửa
                    <?php } ?>
                </span>
            </div>
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
                    <img src="./supplier/uploads/<?php echo $row['image'] ?>" alt="">
                </div>
                <?php
                foreach ($query_images as $key => $value) {
                ?>
                    <div>
                        <img src="./supplier/uploads/<?php echo $value['image'] ?>" alt="">
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="description">
                <h4>Mô tả</h4>
                <p><?php echo $row['description'] ?></p>
            </div>
            <div class="criterias-detail">
                <h4>Tiêu chí</h4>
                <div class="criterias">
                    <?php
                    foreach ($query_criteria as $key => $value) {
                    ?>
                        <div class="criteria">
                            <i class="fas fa-check"></i>
                            <p><?php echo $value['criteria'] ?></p>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</section>