<!DOCTYPE html>
<?php
ob_start(); 
session_start();
include("control.php");
$get_data=new data();


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
    <link rel="stylesheet" href="style/manager.css">
    <title>Document</title>
    
</head>
<body>
    <div class="content">
        <div id="header">
        <nav class=" container-fluid p-2 navbar-expand-sm navbar-dark bg-dark d-flex align-items-center justify-content-around">
                <div class="ms-3">
                  <a class="navbar-brand" href="index1.php">
                    <img src="images/logo.png" alt="">
                  </a>
                </div>
                <div class=" menu-1">
                    <div class="collapse navbar-collapse" id="mynavbar">
                      <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                          <a class="nav-link" href="intro.php">KHÁCH HÀNG</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <ul class="dropdown-menu mt-3 p-2 fade">
                              <li><a class="dropdown-item text-dark " href="food-dog.php">CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="food-cat.php">MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="food-dog.php">ĐỒ ĂN CHO CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="food-cat.php">ĐỒ ĂN CHO MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="manafer-pk.php">PHỤ KIỆN</a></li>
                              
                            </ul>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">KHO HÀNG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="hoadon.php">HÓA ĐƠN</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="admin_doanhthu.php">DOANH THU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_blog.php" style="color: var(--main-color-1);">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_contact">LIÊN HỆ</a>
                        </li>
                        
                      </ul>
                    </div>
                </div>
               
            </nav>
              
        </div>
        <!-- --------------------------------body--------------------------------- -->
          <div class="main d-flex justify-content-center">
             
            <div class="main-right">
              <div class="list-customer">
                <div class="container p-3 ms-5">
                  <h4 class="text-dark text-center">Thêm mới blog || <a href="admin_blog.php">Quay lại</a></h4>
                  <br>
                  <form action="" enctype="multipart/form-data" method="post" class="form-info text-dark me-5">
                    <table>
                        
                        <tr>
                          <td><label for="tenblog" class="">Tên blog</label></td>
                          <td>
                            <textarea name="txtTen_blog" id="tenblog" cols="58" rows="5" placeholder="Tên"></textarea>
                          </td>
                      </tr>
                      <tr>
                          <td><label for="tomtat" class="">Tóm tắt</label></td>
                          <td>
                            <textarea name="txts_blog" id="tomtat" cols="58" rows="5" placeholder="Tóm tắt"></textarea>
                          </td>
                      </tr>
                      <tr>
                          <td><label for="noidung" class="">Nội dung</label></td>
                          <td>
                            <textarea name="txtl_blog" id="noidung" cols="58" rows="5" placeholder="Nội dung"></textarea>
                          </td>
                      </tr>
                    <tr>
                            <td><label for="anh">Ảnh</label></td>
                            <td><input type="file" name="txtFile" id="anh" ></td>
                    </tr>
                    
                        <tr>
                            <td colspan="2" >
                            <input type="submit" name="btnThem" class=" sd text-right" value="Thêm">
                            </td>
                        </tr>
                        
                        
                    </table>
                  </form>
                  <?php
                 if(isset($_POST["btnThem"])){
                      move_uploaded_file($_FILES['txtFile']['tmp_name'],"img/". $_FILES['txtFile']['name']);
                      $insert=$get_data->add_blog($_POST['txtTen_blog'],$_POST['txts_blog'],$_POST['txtl_blog'],$_FILES['txtFile']['name']);
                    
                      if($insert){
                        ?> <script>
                        location.href = 'admin_blog.php';
                      </script>
                      <?php
                  
                      }
                      else
                      echo"<script> alert('Không thành công')</script>";
              	
			                  }

                          
                        
                        ?>
                </div>
                
              </div>
            </div>
          </div>
        <!-- -------------------------------------footer-------------------------- -->
        <div id="footer">
            <div class="container-fluid ft">
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
            </div>
        </div>
        
    </div>
</body>
</html>