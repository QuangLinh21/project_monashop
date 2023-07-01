<!DOCTYPE html>
<?php
session_start();
include("control.php");
$get_data=new data();
if(!empty($_SESSION["email"])&&!empty($_SESSION["pass"])){
  $getdata=$get_data->login_user($_SESSION["email"],$_SESSION["pass"]);
  foreach($getdata as $sel){
      $_SESSION["hoten"]=$sel["Hoten"];
  }

}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                        <input type="submit" name="btm" value="Tìm kiếm">
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
                        <li class="lii"><button id="Btn" type="button" class="btn" data-bs-toggle="modal" data-bs-target="#myModal"><i class="fa fa-user-circle-o text-white" ></i>
                        </button>
                        
                        <?php if(empty ($_SESSION["email"])){?>
                        <div class="modal mt-5 p-5 account fade" id="myModal">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-dark">Đăng Nhập || <span><a href="register.php"  class="text-info">Đăng ký</a></span></h4>
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
                        <li><a href="cart.php"><i class="fa fa-shopping-cart" name="btn_cart" ></i></a></li>
                       
                    </ul>
                </div>
            </nav>
        </div>
        <div id="demo" class="carousel slide" data-bs-ride="carousel">

          <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/benner2.png" alt="New York" class="d-block" style="width:100% ; height: 600px;">
            </div>
            <div class="carousel-item">
              <img src="images/benner5.jpg" alt="Los Angeles" class="d-block" style="width:100%; height: 600px;">
            </div>
            <div class="carousel-item">
              <img src="images/pr.jpg" alt="Chicago" class="d-block" style="width:100% ; height: 600px;">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
  <!-- ----------------------------------------------------------------------------- -->
        <div class="container-fluid discount">
          <div class="row p-5">
            <div class=" d-flex col-sm-3 text-center  align-items-center">
              <i class="fa fa-rocket me-3" ></i>
                <span><b>FREE SHIPPING </b> <br> Order Over $150</span>
            </div>
              <div class=" b1 p-2 d-flex col-sm-3 text-center align-items-center">
                <i class="fa fa-money me-3" ></i>
                <span> <b>15% DISCOUNT</b> <br> For first order</span>
              </div>
              <div class=" b2 p-2 d-flex col-sm-3 text-center align-items-center">
                <i class="fa fa-credit-card me-3" ></i> 
                <span> <b>SECURE PAYMENT</b> <br> Confirmed</span>
              </div>
              <div class="b3 p-2 d-flex col-sm-3 text-center align-items-center ">
                <i class="fa fa-gift me-3" ></i> <span><b> AWESOME GIFT</b><br>Every Month</span> 
              </div>
          </div>
        </div>
        
  <!-- --------------------------------body--------------------------------- -->
  <div id="body" class="mt-5">
  <div class="product cat container-fluid mt-5">
              <h2 class="title text-dark text-center">Chó Cảnh</h2>
              <div class="menu-product d-flex flex-wrap justify-content-around">
              <?php
                        
                        $getdog=$get_data->get_cho10();
                        foreach($getdog as $se_dog){

                        ?>
                    <div class="item-product text-center mb-5">
                      <a href="product-item.php?id=<?php echo $se_dog['id_dv'];?>&maloai=<?php echo $se_dog['Maloai']?>" class="more" style={text-decoration:none;color:black;}>
                      <div class="images-item">
                        <img src="img/<?php echo $se_dog['Anh1'] ?>" alt="" width=" 300px" height= "350px">
                      </div>
                      <div class="title-item">
                      <p class="item-kind">Chó cảnh <br></p>
                        <p class="item-kind"><?php echo $se_dog['Tenthucung']."-".$se_dog['id_dv'] ?><br></p>
                       
                      </div>
                      <div class="price-item mb-2">
                        <span class="price"><b>Giá: <?php echo $se_dog['Dongia'] ?> đ</b></span>
                        
                      </div>
                      </a>
                    </div>
                    <?php
                        }
                    ?> 
                
              </div>
              <div class="xt mt-3 text-center"><a href="dog.php" class="btn btn-primary"> Xem thêm</a></div>
            </div>
            <!-- --------------------------cat---------------------------------- -->
            <div class="pr">
              <img src="images/penner-2.jpg" alt="">
            </div>
            <div class="product cat container-fluid mt-5">
              <h2 class="title text-dark text-center">Mèo Cảnh</h2>
              <div class="menu-product d-flex flex-wrap justify-content-around">
              <?php
                        
                        $getcat=$get_data->get_meo10();
                        foreach($getcat as $se_cat){

                        ?>
                    <div class="item-product text-center mb-5">
                    <a href="product-item.php?id=<?php echo $se_cat['id_dv'];?> &maloai=<?php echo $se_cat['Maloai'];?>" class="more">
                      <div class="images-item">
                        <img src="img/<?php echo $se_cat['Anh1'] ?>" alt="">
                      </div>
                      <div class="title-item ">
                      <p class="item-kind">Mèo cảnh <br></p>
                        <p class="item-kind"><?php echo $se_cat['Tenthucung']."-".$se_cat['id_dv'] ?><br></p>
                       
                      </div>
                      <div class="price-item mb-2">
                        <span class="price"><b>Giá: <?php echo $se_cat['Dongia'] ?> đ</b></span>
                        
                      </div>
                      </a>
                    </div>
                    <?php
                        }
                    ?> 
                
              </div>
              <div class="xt mt-3 text-center"><a href="cat.php" class="btn btn-primary"> Xem thêm</a></div>
            </div>

            <!-- ---------------------------------food----------------------------- -->
            <div class="pr-1 d-flex mt-5">
              <img src="images/pr-2.jpg" alt="">
              <img src="images/pr-3.jpg" alt="">
            </div>
            <div class="product cat container-fluid mt-5">
              <h2 class="title text-dark text-center">Đồ ăn và phụ kiện</h2>
              <div class="menu-product d-flex flex-wrap justify-content-around">
                <?php $get_pk=$get_data->get_phukien10();
                foreach($get_pk as $pk){
                  $tensp=$get_data->get_tenloaisp($pk["Maloaisanpham"]);
                  foreach($tensp as $ten){ $tenloaisp=$ten["Tenloaisanpham"];}
                 ?>
                <div class="item-product text-center mb-5">
                <a href="product-item.php?id=<?php echo $pk['id_sp'];?> &maloai=<?php echo $pk['Maloaisanpham'];?>" class="more">
                  <div class="images-item">
                    <img src="img/<?php echo $pk["Hinhanh"] ?>" alt="">
                  </div>
                  <div class="title-item">
                    <p class="item-kind"><?php echo $tenloaisp; ?> <br></p>
                   <p class="item-name"><b><?php echo $pk["Tensanpham"] ?></b></p>
                  </div>
                  <div class="price-item mb-1">
                    <span class="price"><b>Giá: <?php echo $pk["Dongiaban"] ?> đ</b></span>
                  </div>
                </a>
                </div>
                <?php } ?>
                
                
              </div>
              <div class="xt mt-3 text-center"><a href="pk.php" class="btn btn-primary"> Xem thêm</a></div>
            </div>
            
        </div>
        
  <!-- -------------------------------------footer---------------------------------- -->
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