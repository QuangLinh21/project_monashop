<!DOCTYPE html>
<?php
session_start();
include("control.php");
$get_data=new data();
if(!empty($_SESSION["email"])&&!empty($_SESSION["pass"])){
  $getdata=$get_data->login_user($_SESSION["email"],$_SESSION["pass"]);
  foreach($getdata as $sel){
      $id_kh=$sel["id_kh"];
      $_SESSION["hoten"]=$sel["Hoten"];
      $hoten=$sel["Hoten"];
      $email=$sel["Email"];
      $diachi=$sel["Diachi"];
      $sdt=$sel["Sodienthoai"];
  }

}
else {?> <script>

location.href = 'login.php';
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
<style>
  .pay-right .pay-right-main input{
    background: var(--main-color-3);
    padding: 10px;
    width: 150px;
    border: none;
    color: var(--color-3);
}
.pay-right .pay-right-main input:hover{
    background: var(--main-color-3hover);
}
.add-address{
    background: var(--main-color-1);
    padding:15px 10px;
    width: 150px;
    height:20px;
    text-decoration:none;
    border: none;
    color: var(--color-3);
    margin-top:20px;
}
.add-address:hover{
  color:azure;
  background:#25928c;
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
                        <li ><a  href="#"><i class="fa fa-search" ></i></a>
                            <ul class="search">
                                <li>
                                <form action="search.php" method="post">
                                        <input type="search" name="txtsearch" placeholder="Tìm kiếm ....">
                                        <input type="submit" name="sub_serch" value="Search">
                                    </form> 
                                </li>
                            </ul>
                        </li>
                        <li class="lii"><button  type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user-circle-o text-white" ></i>
                        </button>
                        <?php if(empty ($_SESSION["email"])){?>
                        <div class="modal mt-5 p-5 account fade" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-dark">Đăng Nhập || <span><a href="register.php"  class="text-info">Đăng ký</a></span></h4>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                          
                                <!-- Modal body -->
                                <div class="modal-body">
                                  <form action="" method="post">
                                    <div class="mb-3 mt-3 text-dark">
                                        <label for="email" class="mb-1"><b>Tên đăng nhập</b></label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter username" name="email">
                                      </div>
                                      <div class="mb-3 text-dark">
                                        <label for="pwd" class="mb-1"><b>Mật khẩu</b></label>
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                                      </div>
                                    <div class="text-dark">
                                        <input type="submit" class="btn me-3 mb-3 p-2" value="Đăng Nhập">
                                        <input type="checkbox" class="form-check-input mt-2" name="" id=""> <span>Ghi nhớ đăng nhập</span>
                                    </div>
                                    <div class="mb-3">
                                        <a href="forgetpass.php" class="text-dark ">Quên mật khẩu</a>
                                    </div>
                                  </form>
                                  <?php
    if(isset($_POST["sub_dangnhap"])){
      if(empty($_POST["txtemail"])||empty($_POST["txtpass"]))
      {
      echo("<script>alert('Không được để trống');</script>");
      }
  else
  {
    $login=$get_data->login($_POST["txtemail"],$_POST["txtpass"]);
    if ($login==1)
    {
        $_SESSION["email"]=$_POST["txtemail"];
        $_SESSION["pass"]=$_POST["txtpass"];//khoi tao session co ten la user
        $get=$get_data->login_user($_POST["txtemail"],$_POST["txtpass"]);
        foreach($get as $se){
            $lv=$se["quyen"];
            $_SESSION["quyen"]=$se["quyen"];
            $_SESSION["hoten"]=$se["Hoten"];
        }
            //header("location:admin_login.php");}
            
        if($lv==0)
        {?>
         <script>

            location.href = 'index1.php';
            </script>
        <?php
        //	header("location:user_login.php");
        }
        else{?>
          <script>
            //alert("lv".$lv);
          location.href = 'admin.php';
          </script>
      <?php
      }
        //echo("<script>alert('login thanh cong!!!');</script>");
    }
  
    else
    echo("<script>alert('login that bai!!!');</script>");   
    
  }
  
}

?>	
                                </div>
                          
                              </div>
                            </div>                                                       
                        </li>
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
          <div class="container-fluid">
            <div class="row text-dark p-3 pay">
              <div class="col-md-7 pay-left p-5">
                <form action="" method="post">
                <h5 class="mb-3">CHỌN ĐỊA CHỈ GIAO HÀNG</h5>
                  <table class="table mb-3">
                    <tr>
                      <th>Chọn địa chỉ</th>
                      <th>Họ tên</th>
                      <th>Số điện thoại</th>
                      <th>Địa chỉ</th>
                    </tr>
                    <?php 
                    $get_address=$get_data->get_diachigiaohang($id_kh);
                    foreach($get_address as $d){
                    ?>
                    <tr>
                    <td><input type="radio" class="form-check-input" name="txtdiachi" value="<?php echo $d["Hoten"]."-".$d["Sodienthoai"]."-".$d["Diachi_giaohang"]?>"></td>
                    <td><?php echo $d["Hoten"]?></td>
                    <td><?php echo $d["Sodienthoai"]?></td>
                    <td><?php echo $d["Diachi_giaohang"]?></td>
                    </tr>
                    <?php } ?>
                  </table>
                  <a href="user_address.php" class="add-address mt-3">Thêm địa chỉ giao hàng khác</a>
                  
                
              </div>
              <div class="col-md-5 pay-right p-5">
                <div class="pay-right-main p-4">
                  <h5>ĐƠN HÀNG CỦA BẠN</h5>
                  
                    <table class="table">
                      <tr>
                        <td><b>SẢN PHẨM</b></td>
                        <td><b>THÀNH TIỀN</b></td>
                      </tr>
                      <?php 
                      $get_cart=$get_data->get_cart($id_kh);
                      foreach($get_cart as $p){
                       ?>
                      <tr>
                        <td><?php echo $p["Tenthucung"]." * ".$p["Soluong"] ?> <span class="soluong"></span></td>
                        <td><b><?php echo $p["Tong"]?> </b></td>
                      </tr>
                      <?php } 
                      $Sum=$get_data->sumcart($id_kh);
                      foreach($Sum as $s){
                        $sum_cart=$s["Tong"];
                      }
                      ?>
                      <tr>
                        <td><b>Giao hàng</b></td>
                        <td><b>Miễn phí giao hàng</b></td>
                      </tr>
                      <tr>
                        <td><b>Tổng thanh toán</b></td>
                        <td><b><?php echo $sum_cart; ?></b></td>
                      </tr>
                    </table>
                    <p>Khi nhận hàng quý khách vui lòng kiểm tra kỹ đơn hàng trước khi nhận để đảm bảo tránh các vấn đề sai sót và không phát sinh thêm phí dịch vụ khác <br> <b>Xin trân thành cảm ơn sự ủng hộ của quý khách!</b></p>
                    <input type="submit" class="mt-3" value="Thanh toán" name="sub_pay">
                  
                </div>
                
              </div>
              </form>
                  <?php if(isset($_POST["sub_pay"])){
                    
                    $diachi=$_POST["txtdiachi"];
                    $rs=$get_data->insert_donhang($id_kh,$diachi,$sum_cart);
                    $insert=$get_data->insert_ctdonhang($rs,$id_kh);
                    $get_cart=$get_data->get_cart($id_kh);
                    foreach($get_cart as $insert){
                      if($insert["Maloai"]=="CHO"){
                       $update=$get_data->mua_cho($insert["id_sp"]); 
                      }
                      else{
                        if($insert["Maloai"]=="MEO"){
                          $update=$get_data->mua_meo($insert["id_sp"]); 
                        }
                        else{
                          $update=$get_data->mua_sanpham($insert["Soluong"],$insert["id_sp"]);
                        }
                      }
                    }
                    $delete=$get_data->delete_giohang($id_kh);
                    
                    if($delete){?>
                             <script>
                            
                             location.href = 'user_donhang.php';
                             </script>
                    <?php

                    }
                    else ?>
                    <script>
                    //alert('Liên hệ hotline!');
                    </script>
                    <?php
                  } ?>
            </div>
          </div>
        </div>

        <!-- -------------------------------------footer-------------------------- -->
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