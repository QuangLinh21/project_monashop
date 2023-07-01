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
                          <a class="nav-link" href="intro.php" style="color: var(--main-color-1);">KHÁCH HÀNG</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <ul class="dropdown-menu mt-3 p-2 fade">
                              <li><a class="dropdown-item text-dark " href="food-dog.php">CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="food-cat.php">MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="food-dog.php">ĐỒ ĂN CHO CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="food-cat.php">ĐỒ ĂN CHO MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="pk.php">PHỤ KIỆN</a></li>
                              
                            </ul>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">KHO HÀNG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">HÓA ĐƠN</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">DOANH THU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_blog.php">BLOG</a>
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
                  <h4 class="text-dark text-center">Sửa thông tin khách hàng || <a href="admin.php">Quay lại</a></h4>
                  <?php
                        $select_user=$get_data->get_user($_GET["edit"]);
                        foreach($select_user as $se){
                            $email=$se['Email'];
                        ?>
                  <br>
                  <form action="" method="post" class="form-info text-dark me-5">
                    <table>
                        <tr>
                            <td><label for="hoten" class="">Họ tên khách</label></td>
                            <td><input type="text" class="me-3" name="txtHoten"  id="" placeholder="Họ và Tên" value="<?php echo $se['Hoten'] ?>"></td>
                        </tr>
                        <tr>
                          <td><label for="email" class="">Email</label></td>
                          <td><input type="email" name="txtEmail" id="" placeholder="Email" value="<?php echo $se['Email'] ?>"></td>
                      </tr>
                      
                    <tr>
                      <td><label for="sdt" class="">Số điện thoại</label></td>
                      <td><input type="text" name="txtSodienthoai" id="" placeholder="Số điện thoại" value="<?php echo $se['Sodienthoai'] ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="gioitinh" class="">Giới tính</label></td>
                      <td>
                        <div>
                          <input type="radio" name="txtGioitinh" id="" value="Nam" <?php if($se['Gioitinh']=="Nam") echo 'Checked';?>> Nam 
                                <input type="radio" name="txtGioitinh" id="" value="Nữ" <?php if($se['Gioitinh']=="Nữ") echo 'Checked';?>> Nữ
                        </div>
                    </td>
                    <tr>
                      <td><label for="ngaysinh" class="">Ngày sinh</label></td>
                      <td><input type="date" name="txtNgaysinh" id="" placeholder="Ngày sinh" value="<?php echo $se['Ngaysinh'] ?>"></td>
                    </tr>
                    <tr>
                      <td><label for="diachi" class="">Địa chỉ</label></td>
                      <td><textarea name="txtDiachi" id="" cols="58" rows="5" placeholder="Địa chỉ"><?php echo $se['Diachi'] ?></textarea></td>
                    </tr>
                        <tr>
                            <td colspan="2" >
                            <input type="submit" name="btnUpdate" class=" sd text-right" value="Sửa">
                            </td>
                        </tr>
                        
                        
                    </table>
                    <?php } ?>
                  </form>
                  <?php
                        if(isset($_POST["btnUpdate"])){
                            echo $_POST["txtDiachi"];
                            
                            if($email!=$_POST["txtEmail"]){
                            $check_mail=$get_data->check_email($_POST["txtEmail"]);
                            if($check_mail>0){
                                echo"<script> alert('Email này đã đăng ký')</script>";	
                            }
                            else{
    
                                $date=date_format(date_create($_POST['txtNgaysinh']),"Y/m/d");
                                $update=$get_data->update_user($_GET['edit'],$_POST['txtHoten'],$_POST['txtEmail'],$_POST['txtDiachi'],$_POST['txtSodienthoai'],$_POST['txtGioitinh'],$date);
                                if($update){
                                    ?> <script>
                                location.href = 'admin.php';
                                </script>
                                <?php
                                }
                                
                                else
                                echo"<script> alert('Không thành công')</script>";
                                
                            }
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
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
            </div>
        </div>
        
    </div>
</body>
</html>