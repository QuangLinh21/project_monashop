<!DOCTYPE html>
<?php
ob_start();
session_start();
include("control.php");
$get_data=new data();
if(!empty($_SESSION["email"])&&!empty($_SESSION["pass"])){
  $getdata=$get_data->login_user($_SESSION["email"],$_SESSION["pass"]);
  foreach($getdata as $sel){
      $_SESSION["hoten"]=$sel["Hoten"];
      $id_kh=$sel["id_kh"];
  }

}
else {?> <script>
  alert('Đăng nhập để xem gio hàng của bạn');
  location.href = 'index1.php';
  //document.getElementById("Btn").click();


</script>
<?php }?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/cart.css">
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
                        <li ><a  href="#"><i class="fa fa-search" ></i></a>
                            <ul class="search">
                                <li>
                                    <form action="" method="get">
                                        <input type="search" name="txtsearch" placeholder="Tìm kiếm ....">
                                        <input type="submit" name="btm" value="Search">
                                    </form>
                                    <?php
                                    if(isset($_POST["txtsearch"])){
                                      ?>
                                      <script>
                                      location.href = "search.php?search=<?php echo $_POST['txt_search'];?>";
                                      </script>
                                    <?php
                                    }
                                    ?>     
                                </li>
                            </ul>
                        </li>
                        <?php if(empty ($_SESSION["email"])){?>
                        
                        <?php } 
                            else{
                            
                            ?>
                            <li><?php echo $_SESSION["hoten"]?></li>
                            <li><a href="logout.php" class="text-white">Đăng xuất</a></li> 
                            <?php }?>
                        <li><a  href="cart.php"><i class="fa fa-shopping-cart" ></i></a></li>
                    </ul>
                </div>
            </nav>
              
        </div>
        <!-- --------------------------------body--------------------------------- -->
        <div id="body">
          <div class="container p-5 cart">
            <h3 class="text-center  mt-3 mb-5 text-dark">Lịch sử mua hàng</h3>
            <form action="" method="post">
              <table class="table text-dark ">
                <tr>
                  <th>MÃ ĐƠN HÀNG</th>
                  <th>ĐỊA CHỈ GIAO HÀNG</th>
                  <th>TỔNG TIỀN</th>
                  <th>NGÀY ĐẶT</th>
                  
                  <th>TRẠNG THÁI</th>
                  <th>THAO TÁC</th>
                </tr>
                <?php
                $get_dh=$get_data->get_donhanguser($id_kh);
                foreach($get_dh as $se){
                 ?>
                <tr>
                        <td><?php echo $se['id_hd']?></td>
                        
                        <td><?php echo $se['Diachi_giaohang']?></td>
                        <td><?php echo $se['Tongtien']?></td>                        
                        <td><?php echo $se['Ngayxuat']?></td>
                        <td><?php echo $se['Trangthai']?></td>
                        <td><a href="user_ctdonhang.php?id=<?php echo $se['id_hd']?>"> Chi tiết</a></td>
                </tr>
                <?php
                }
                ?>                
              </table>
              <div class="d-flex justify-content-end link mt-5" >
                <a href="index1.php" class="me-5">Tiếp tục xem sản phẩm</a>
                <a href="cart.php">Quay lại</a>
               
                
              </div>
            </form>
          </div>
        </div>

        <!---------------------------------------footer-------------------------- -->
        <div id="footer">
            <div class="container-fluid ft">
                <div class="row">
                    <div class="col-sm-3 left">
                        <h2>ĐIỀU HƯỚNG</h2>
                        <ul class="list-unstyled">
                            <li><a  href="">Trang chủ</a></li>
                            <li><a  href="">Về chúng tôi</a></li>
                            <li><a  href="">Sản phẩm</a></li>
                            <li><a  href="">Điểm tin hữu ích</a></li>
                            <li><a  href="">Liên hệ</a></li>
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
                            <li><a  href=""><i class="fa icon fa-map-marker"></i>  Đại học Phương Đông<br> số 4 Ngõ Chùa Hưng Ký – Minh Khai <br> Hai Bà Trưng – Hà Nội</a></li>
                            <li><a  href=""><i class="fa icon fa-volume-control-phone" ></i> 02436241394 hoặc 0936738889</a></li>
                            <li><a  href=""><i class="fa icon fa-envelope-o" ></i> ict.dhphuongdong@gmail.com</a></li>
                            <li><a  href=""><i class="fa icon fa-facebook-square" ></i> facebook.com/cntt.phuongdong</a></li>
                            <li><a  href=""><i class="fa icon fa-globe" ></i> cntt.phuongdong.edu.vn
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>