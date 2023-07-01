<!DOCTYPE html>
<?php
session_start();
include("control.php");
$get_data = new data();
if (!empty($_SESSION["email"]) && !empty($_SESSION["pass"])) {
    $getdata = $get_data->login_user($_SESSION["email"], $_SESSION["pass"]);
    foreach ($getdata as $sel) {
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
    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>

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
                                <a class="nav-link dropdown-toggle" href="food.php" role="button" data-bs-toggle="dropdown">THỨC ĂN</a>
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
                                    <form action="search.php" method="post">
                                        <input type="search" name="txtsearch" placeholder="Tìm kiếm ....">
                                        <input type="submit" name="sub_serch" value="Search">
                                    </form>
                                </li>
                            </ul>
                        </li>

                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </nav>

        </div>
        <!-- --------------------------------body--------------------------------- -->
        <div id="body-contact">
            <img src="./images/bg-contact.jpg" alt="">
            <div class="container">
                <div class="row d-flex flex-wrap">
                    <div class="col-sm-6 p-4 mt-5 mb-4 ct-left">
                        <h2 class="text-center mb-3">MONA Shop</h2>
                        <p>MONA shop là chuỗi pet shop thú cưng Đồ dùng cho chó – Đồ dùng cho mèo tại Hà Nội, TP.HCM, Đà Nẵng và Hải Phòng với hệ thống nhiều chi nhánh cửa hàng thú cưng chuyên cung cấp đồ dùng, quần áo, thức ăn, sữa tắm, chuồng, vòng cổ xích và các phụ kiện cho Chó cảnh, Mèo cảnh, Cá cảnh.</p>
                        <p>Mọi đóng góp của khách hàng sẽ là động lực và tiêu chuẩn giúp chúng tôi hoàn thiện và phát triển hơn. Xin trân thành cảm ơn! </p>

                    </div>
                    <div class="col-sm-6 p-4 mt-5 mb-4 ct-right">
                        <h2 class="text-center mb-4">ĐĂNG NHẬP || <a href="register.php">ĐĂNG KÝ</a></h2>
                        <form action="" method="post">
                            <div class="mb-3 mt-3 text-dark">
                                <label for="email" class="mb-1"><b>Tên đăng nhập</b></label>
                                <input type="email" class="form-control" id="email" focus placeholder="Enter username" name="txtemail">
                            </div>
                            <div class="mb-3 text-dark">
                                <label for="pwd" class="mb-1"><b>Mật khẩu</b></label>
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="txtpass">
                            </div>
                            <div class="text-dark">
                                <input type="submit" class="btn me-3 mb-3 p-2" name="sub_dangnhap" value="Đăng Nhập">
                                <input type="checkbox" class="form-check-input mt-2" name="" id=""> <span>Ghi nhớ đăng nhập</span>
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
                                    $_SESSION["pass"] = $_POST["txtpass"];
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
        </div>


        <!-- -------------------------------------footer-------------------------- -->
        <div id="footer">
            <div class="container-fluid ft">
                <div class="row flex-wrap d-flex">
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
                        <div class="logo-1 text-center mb-3 text-white">
                            <img src="images/logo.png" alt="">
                            <p class="mt-3">Nơi gửi gắm niềm tin về vẻ đẹp thú cưng</p>
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
                            <li><a href=""><i class="fa icon fa-map-marker"></i> Đại học Phương Đông<br> số 4 Ngõ Chùa Hưng Ký – Minh Khai <br> Hai Bà Trưng – Hà Nội</a></li>
                            <li><a href=""><i class="fa icon fa-volume-control-phone"></i> 02436241394 hoặc 0936738889</a></li>
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