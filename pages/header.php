<?php
$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : [];
if (isset($_GET['dangxuat']) && $_GET['dangxuat'] == 1) {
    unset($_SESSION['user']);
    header('Location:index.php');
}
?>

<div class="header">
    <div class="header__navbar">
        <div class="header__logo">
            <a href="index.php" class="header__logo-link">
                <img src="./css/img/logo.png" alt="" class="header__logo-img">
            </a>
        </div>

        <form method="POST" action="index.php?action=search&query=timkiem">
            <div class="search-box">
                <input class="search-text" type="text" placeholder="Search..." name="tukhoa">
                <button class="search-btn" name="timkiem">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>

        <ul class="header__navbar-list">
            <li class="header__navbar-item">
                <a href="index.php" class="header__navbar-item-link">
                    <i class="fa-solid fa-house header__navbar-icon"></i>
                    Trang chủ
                </a>
            </li>
            <?php
            if (isset($user['name'])) {
            ?>
                <li class="header__navbar-item">
                    <a href="index.php?action=supplier&query=register" class="header__navbar-item-link">
                        <i class="fas fa-fw fa-user-tie header__navbar-icon"></i>
                        Trở thành nhà cung cấp
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="#" class="header__navbar-item-link">
                        <i class="fa-solid fa-user header__navbar-icon"></i>
                        <?php echo $user['name'] ?>
                    </a>
                    <ul class="header__navbar-subnav">
                        <li class="header__subnav-item">
                            <a href="index.php?action=profile&query=xem" class="header__subnav-item-link">
                                <i class="fa-solid fa-user-check header__navbar-icon"></i>
                                Thông tin cá nhân
                            </a>
                        </li>
                        <?php
                        if ($user['id_role'] == 1) {
                        ?>
                            <li class="header__subnav-item">
                                <a href="index.php?action=supplier&query=places" class="header__subnav-item-link">
                                    <i class="fa-solid fa-tree header__navbar-icon"></i>
                                    Địa điểm xanh của bạn
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="header__subnav-item logout">
                            <a href="index.php?dangxuat=1" class="header__subnav-item-link">
                                <i class="fa-solid fa-right-from-bracket header__navbar-icon"></i>
                                Đăng xuất
                            </a>
                        </li>
                    </ul>
                </li>
            <?php
            } else {
            ?>
                <li class="header__navbar-item">
                    <a href="login.php" class="header__navbar-item-link">
                        <i class="fa-solid fa-right-to-bracket header__navbar-icon"></i>
                        Đăng nhập
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="login.php" class="header__navbar-item-link">
                        <i class="fa-solid fa-pen-to-square header__navbar-icon"></i>
                        Đăng ký
                    </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</div>