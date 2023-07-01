<!DOCTYPE html>
<?php
ob_start();
session_start();
include("control.php");
$get_data = new data();
if (!empty($_SESSION["email"]) && !empty($_SESSION["pass"])) {
    $getdata = $get_data->login_user($_SESSION["email"], $_SESSION["pass"]);
    foreach ($getdata as $sel) {
        $idkh = $sel["id_kh"];
        $_SESSION["hoten"] = $sel["Hoten"];
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/product.css">
    <link rel="stylesheet" href="style/product-item.css">
    <title>Document</title>
</head>
<style>
    .chose form a,
    .chose-1 a {
        text-decoration: none;
        background: #e8598f;
        padding: 15px;
        color: var(--color-3);
        margin-left: 10px;
    }

    .chose form a:hover {
        background: #a73963;
    }

    .add-address {
        text-align: justify;
    }
</style>

<body>
    <div class="content">
        <div id="header">
            <nav class=" container-fluid p-2 navbar-expand-sm navbar-dark bg-dark d-flex align-items-center justify-content-between">
                <div class="ms-3">
                    <a class="navbar-brand" href="index1.php">
                        <img src="images/logo.png" alt="">
                    </a>
                </div>
                <div class=" menu-1">
                    <div class="collapse navbar-collapse" id="mynavbar">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="intro.php">GIỚI THIỆU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="dog.php">CHÓ CẢNH</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="cat.php">MÈO CẢNH</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="food.php" role="button" data-bs-toggle="dropdown">ĐỒ ĂN</a>
                                <ul class="dropdown-menu mt-3 p-2 fade">
                                    <li><a class="dropdown-item text-dark " href="food-dog.php">Đồ ăn cho chó</a></li>
                                    <li><a class="dropdown-item text-dark" href="food-cat.php">Đồ ăn cho mèo</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pk.php">PHỤ KIỆN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.php">LIÊN HỆ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="blog.php">BLOG</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="menu-2 me-3">
                    <ul class="navbar-nav me-auto menu-22">
                        <li><a href="#"><i class="fa fa-search"></i></a>
                            <ul class="search">
                                <li>
                                    <form action="" method="get">
                                        <input type="search" name="txtsearch" placeholder="Tìm kiếm ....">
                                        <input type="submit" name="btm" value="Search">
                                    </form>

                                </li>
                            </ul>
                        </li>
                        <li class="lii"><button id="Btn" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user-circle-o text-white"></i>
                            </button>

                            <?php if (empty($_SESSION["email"])) { ?>
                                <div class="modal mt-5 p-5 account fade" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title text-dark">Đăng Nhập || <span><a href="register.php" class="text-info">Đăng ký</a></span></h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body">
                                                <form action="" method="post">
                                                    <div class="mb-3 mt-3 text-dark">
                                                        <label for="email" class="mb-1"><b>Email</b></label>
                                                        <input type="email" name="txtemail" class="form-control" id="email" placeholder="Nhập email của bạn" name="email">
                                                    </div>
                                                    <div class="mb-3 text-dark">
                                                        <label for="pwd" class="mb-1"><b>Mật khẩu</b></label>
                                                        <input type="password" name="txtpass" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pswd">
                                                    </div>
                                                    <div class="text-dark">
                                                        <input type="submit" class="btn me-3 mb-3 p-2" name="sub_dangnhap" value="Đăng Nhập">
                                                        <input type="checkbox" class="form-check-input mt-2" name="" id="">
                                                        <span>Ghi nhớ đăng nhập</span>
                                                    </div>
                                                    <div class="mb-3">
                                                        <a href="forgetpass.php" class="text-dark ">Quên mật khẩu</a>
                                                    </div>
                                                </form>
                                                <?php
                                                if (isset($_POST["sub_dangnhap"])) {
                                                    if (empty($_POST["txtemail"]) || empty($_POST["txtpass"])) {
                                                        echo ("<script>alert('Không được để trống');</script>");
                                                    } else {
                                                        $login = $get_data->login($_POST["txtemail"], $_POST["txtpass"]);
                                                        if ($login == 1) {
                                                            $_SESSION["email"] = $_POST["txtemail"];
                                                            $_SESSION["pass"] = $_POST["txtpass"]; //khoi tao session co ten la user
                                                            $get = $get_data->login_user($_POST["txtemail"], $_POST["txtpass"]);
                                                            foreach ($get as $se) {
                                                                $lv = $se["quyen"];
                                                                $_SESSION["quyen"] = $se["quyen"];
                                                                $_SESSION["hoten"] = $se["Hoten"];
                                                            }
                                                            //header("location:admin_login.php");}

                                                            if ($lv == 0) { ?>
                                                                <script>
                                                                    location.href = 'index1.php';
                                                                </script>
                                                            <?php
                                                                //	header("location:user_login.php");
                                                            } else { ?>
                                                                <script>
                                                                    //alert("lv".$lv);
                                                                    location.href = 'admin.php';
                                                                </script>
                                                <?php
                                                            }
                                                            //echo("<script>alert('login thanh cong!!!');</script>");
                                                        } else
                                                            echo ("<script>alert('login that bai!!!');</script>");
                                                    }
                                                }

                                                ?>
                                            </div>

                                        </div>
                                    </div>
                        </li>
                    <?php } else {

                    ?>
                        <li><?php echo $_SESSION["hoten"] ?></li>
                        <li><a href="logout.php">Đăng xuất</a></li>
                    <?php } ?>
                    <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </nav>

        </div>
        <!-- --------------------------------body--------------------------------- -->
        <div id="body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="category">
                            <div class="first-category text-dark mt-3">
                                <p class="title-2"><b>SẢN PHẨM</b></p>
                                <div class="type p-2">
                                    <?php $sanpham = $get_data->get_sp();
                                    foreach ($sanpham as $sp) {
                                    ?>

                                        <div class="type-of">
                                            <div class="type-img">
                                                <a href=""><img src="img/<?php echo $sp["Hinhanh"] ?>" alt=""></a>
                                            </div>
                                            <div class="type-des">
                                                <a href="product-item.php?id=<?php echo $sp['id_sp']; ?> &maloai=<?php echo $sp['Maloaisanpham']; ?>"><?php echo $sp["Tensanpham"] ?></a>
                                                <p><?php echo $sp["Dongiaban"] ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-9 p-2">
                        <div class="product container-fluid mt-5 pb-5">
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="type-img">
                                        <?php
                                        $id_dv = $_GET['id'];
                                        $maloai = $_GET['maloai'];
                                        if ($maloai == "MEO") {
                                            $get_info = $get_data->get_infomeo($_GET['id']);
                                            foreach ($get_info as $se_if) {
                                        ?>
                                                <img src="img/<?php echo $se_if["Anh1"] ?>" alt="" id="img-main" width="250px" height="500px">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="first-select1 text-dark">

                                        <h3 class="name-product title-2 mt-3"><?php echo $se_if["Tenthucung"] ?></h3>
                                        <h3 class="price mt-2"><b>Giá:</b> <?php echo $se_if["Dongia"] ?></h3>
                                        <p class="description mt-2"><?php echo $se_if["Maloai"] ?></p>
                                        <div class="chose-1">
                                            <?php if (!empty($idkh)) { ?>
                                                <a href="themgiohang.php?id=<?php echo $se_if["id_dv"] ?> &maloai=<?php echo $se_if["Maloai"] ?> &idkh=<?php echo $idkh; ?> &sl=1 &dg=<?php echo $se_if["Dongia"] ?>">Thêm
                                                    vào giỏ hàng</a>
                                            <?php } else { ?>
                                                <a href="login.php?page=1"> Đăng nhập để mua hàng</a>
                                            <?php } ?>
                                        </div>
                                        <p class="description mt-4" style="text-align: justify;">
                                            <?php echo $se_if["Thongtinthem"] ?></p>

                                    </div>
                                </div>
                                <div class="img-product mt-3 mb-5">
                                    <ul class="d-flex">
                                        <li><img src="img/<?php echo $se_if["Anh1"] ?>" alt="" onclick="changeImg('img-one')" id="img-one" width="210px" height="130px"></li>
                                        <li><img src="img/<?php echo $se_if["Anh2"] ?>" alt="" onclick="changeImg('img-two')" id="img-two" width="210px" height="130px"></li>
                                    </ul>
                                </div>
                            </div>
                            <?php }
                                        } else {
                                            if ($maloai == "CHO") {
                                                $get_info = $get_data->get_infocho($_GET['id']);
                                                foreach ($get_info as $se_if) {

                            ?>
                                ?>
                                <img src="img/<?php echo $se_if["Anh1"] ?>" alt="" id="img-main" width="250px" height="500px">
                        </div>
                    </div>
                    <div class="col-sm-6 p-2 pe-3">
                        <div class="first-select1 text-dark">

                            <h3 class="name-product title-2 mt-3"><?php echo $se_if["Tenthucung"] ?></h3>
                            <h3 class="price mt-2"><b>Giá:</b> <?php echo $se_if["Dongia"] ?></h3>
                            <p class="description mt-2"><?php echo $se_if["Mucdichnuoi"] ?></p>
                            <div class="chose">
                                <form action="" method="post">
                                    <input type="number" name="quantity" min="1" max="10" value="1" id="">
                                    <?php if (!empty($idkh)) { ?>
                                        <a href="themgiohang.php?id=<?php echo $se_if["id_dv"] ?> &maloai=<?php echo $se_if["Maloai"] ?> &idkh=<?php echo $idkh; ?> &sl=1 &dg=<?php echo $se_if["Dongia"] ?>">Thêm
                                            vào giỏ hàng</a>
                                    <?php } else { ?>
                                        <a href="login.php?page=1"> Đăng nhập để mua hàng</a>
                                    <?php } ?>
                                </form>
                            </div>
                            <p class="description mt-4" style="text-align: justify;">
                                <?php echo $se_if["Thongtinthem"] ?></p>

                        </div>
                    </div>
                    <div class="img-product mt-3 mb-5">
                        <ul class="d-flex">
                            <li><img src="img/<?php echo $se_if["Anh1"] ?>" alt="" onclick="changeImg('img-one')" id="img-one" width="210px" height="130px"></li>
                            <li><img src="img/<?php echo $se_if["Anh2"] ?>" alt="" onclick="changeImg('img-two')" id="img-two" width="210px" height="130px"></li>
                        </ul>
                    </div>
                </div>
            <?php

                                                }
                                            } else {
                                                $get_info = $get_data->get_sanpham($_GET['id']);
                                                foreach ($get_info as $se_if) {

            ?>
                <img src="img/<?php echo $se_if["Hinhanh"] ?>" alt="" id="img-main" width="250px" height="500px">
            </div>
        </div>
        <div class="col-sm-6 p-2 pe-3">
            <div class="first-select1 text-dark">
                <span><a href="index1.php">TRANG CHỦ</a> || <a href="pk.php"><?php echo $se_if["Tenloaisanpham"] ?></a></span>
                <h3 class="name-product title-2 mt-3"><?php echo $se_if["Tensanpham"] ?></h3>
                <h3 class="price mt-2"><b>Giá:</b> <?php echo $se_if["Dongiaban"] ?></h3>
                <div class="chose">
                    <form action="" method="post">
                        <input type="number" name="quantity" min="1" max="10" value="1" id="">
                        <?php
                                                    if ($se_if["Soluong"] > 0) {
                                                        if (!empty($idkh)) { ?>
                                <a href="themgiohang.php?id=<?php echo $se_if["id_sp"] ?> &maloai=<?php echo $se_if["Maloai"] ?> &idkh=<?php echo $idkh; ?> &sl=1 &dg=<?php echo $se_if["Dongiaban"] ?>">Thêm
                                    vào giỏ hàng</a>
                            <?php } else { ?>
                                <a href="login.php?page=1"> Đăng nhập để mua hàng</a>
                            <?php }
                                                    } else { ?>
                            <a href="login.php?page=1"> Tạm hết hàng</a>
                        <?php } ?>

                    </form>
                    <p class="description mt-4" style="text-align: justify;"><?php echo $se_if["Mota"] ?></p>
                </div>


            </div>
        </div>
    </div>
<?php

                                                }
                                            }
                                        } ?>
</div>
<div class="container mt-5 list-op">
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#home">Mô tả</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu1">Đánh giá</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#menu2">Chính sách bảo hành</a>
        </li>
    </ul>
    <div class="tab-content text-dark">
        <div id="home" class="container tab-pane active"><br>
            <p class="discription-item">
            </p>
        </div>
        <div id="menu1" class="container tab-pane fade"><br>
            <h3>Đánh giá của bạn</h3>
            <div class="bl-comment">
                <form action="" method="post">
                    <div class="cmt">
                        <label for="comment" class="mb-2"><b>Đánh giá của ban *</b></label> <br>
                        <textarea name="comment" id="comment" cols="90" rows="5"></textarea>
                    </div>
                    <div class="info d-flex mt-3">
                        <div class="me-5">
                            <label for="name" class="mb-2"><b>Tên *</b></label> <br>
                            <input type="text" name="name" id="name">
                        </div>
                        <div>
                            <label for="name" class="mb-2"><b>Email *</b></label> <br>
                            <input type="email" name="name" id="name">
                        </div>
                    </div>
                    <div class="send mt-5">
                        <input type="submit" value="Gửi">
                    </div>
                </form>
            </div>
        </div>
        <div id="menu2" class="container tab-pane fade"><br>
            <p>
                Khi nhận hàng thú cưng sẽ đi kèm các giấy tờ liên quan đến giấy khai sinh,chủng loại, xuất sứ, các
                mũi đã được tiêm
            </p>
        </div>
    </div>
</div>

</div>
</div>
</div>
</div>
<script src="./script/main.js"></script>

<!-- -------------------------------------footer-------------------------- -->
<div id="footer">
    <div class="container-fluid ft">
        <div class="row">
            <div class="col-sm-3 left">
                <h2>ĐIỀU HƯỚNG</h2>
                <ul class="list-unstyled">
                    <li><a href="">Trang chủ</a></li>
                    <li><a href="">Về chúng tôi</a></li>
                    <li><a href="">Sản phẩm</a></li>
                    <li><a href="">Điểm tin hữu ích</a></li>
                    <li><a href="">Liên hệ</a></li>
                </ul>
            </div>
            <div class="col-sm-6 center align-center">
                <div class="logo-1 text-center mb-5">
                    <img src="images/logo.png" alt="">
                </div>
                <div class="text-center">
                    <form action="" method="get">
                        <input type="email" name="" id="" placeholder="Enter your mail">
                        <input type="submit" value="Gửi">
                    </form>
                </div>

            </div>
            <div class="col-sm-3 right ">
                <h2>Thông tin liên hệ</h2>
                <ul class="list-unstyled">
                    <li><a href=""><i class="fa icon fa-map-marker"></i> Đại học Phương Đông<br> số 4 Ngõ Chùa Hưng
                            Ký – Minh Khai <br> Hai Bà Trưng – Hà Nội</a></li>
                    <li><a href=""><i class="fa icon fa-volume-control-phone"></i> 02436241394 hoặc 0936738889</a>
                    </li>
                    <li><a href=""><i class="fa icon fa-envelope-o"></i> ict.dhphuongdong@gmail.com</a></li>
                    <li><a href=""><i class="fa icon fa-facebook-square"></i> facebook.com/cntt.phuongdong</a></li>
                    <li><a href=""><i class="fa icon fa-globe"></i> cntt.phuongdong.edu.vn
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</body>

</html>