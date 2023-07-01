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
                          <a class="nav-link" href="#">HÓA ĐƠN</a>
                        </li>
                       
                        <li class="nav-item">
                            <a class="nav-link" href="#">DOANH THU</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_blog.php" style="color: var(--main-color-1);">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin_contact.php">LIÊN HỆ</a>
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
                  <?php
                        $select_user=$get_data->select_fullblog($_GET["edit"]);
                        foreach($select_user as $se){
                            $email=$se['Email'];
                        ?>
                  <br>
                  <form action="" method="post" class="form-info text-dark me-5">
                    <table>
                        
                        <tr>
                          <td><label for="tenblog" class="">Tên blog</label></td>
                          <td>
                            <textarea name="txtTen_blog" id="tenblog" cols="58" rows="5" placeholder="Tên"><?php echo $se['Ten_blog'] ?></textarea>
                          </td>
                      </tr>
                      <tr>
                          <td><label for="tomtat" class="">Tóm tắt</label></td>
                          <td>
                            <textarea name="txts_blog" id="tomtat" cols="58" rows="5" placeholder="Tóm tắt"><?php echo $se['s_blog'] ?></textarea>
                          </td>
                      </tr>
                      <tr>
                          <td><label for="noidung" class="">Nội dung</label></td>
                          <td>
                            <textarea name="txtl_blog" id="noidung" cols="58" rows="5" placeholder="Nội dung"><?php echo $se['l_blog'] ?></textarea>
                          </td>
                      </tr>
                      
                    <tr>
                      <td><label for="ngaydang" class="">Ngày Đăng</label></td>
                      <td><input type="date" name="txtNgaydang" id="" placeholder="Ngày đăng" value="<?php echo $se['Ngaydang'] ?>"></td>
                    </tr>
                    <tr>
                            <td><label for="anh">Ảnh</label></td>
                            <td><input type="file" name="txtFile" id="anh" value="<?php echo $se['Anh'] ?>"></td>
                    </tr>
                    
                        <tr>
                            <td colspan="2" >
                            <input type="submit" name="btnsua" class=" sd text-right" value="Sửa">
                            </td>
                        </tr>
                        
                        
                    </table>
                    <?php } ?>
                  </form>
                  <?php
                        if(isset($_POST["btnUpdate"])){
                          
                                $update=$get_data->update_user($_GET['edit'],$_POST['txtTen_blog'],$_POST['txts_blog'],$_POST['txtl_blog'],$_POST['txtNgaydang'],$_POST['txtAnh']);
                                if($update){
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