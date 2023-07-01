<!DOCTYPE html>
<?php
$maloai="CHO";
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
                              <li><a class="dropdown-item text-dark " href="food-dog.php" style="color: var(--main-color-1);">CHÓ</a></li>
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
                  <h4 class="text-dark text-center">THÊM SẢN PHẨM || <a href="admin.html">Quay lại</a></h4>
                  <br>
                  <form action="" enctype="multipart/form-data" method="post" class="form-info text-dark me-5">
                    <table>
                        <tr>
                            <td><label for="id" class="">ID</label></td>
                            <td><input type="text" name="txtId" id="id" ></td>
                        </tr>
                        <tr>
                            <td><label for="ten">Tên sản phẩm</label</td>
                            <td><input type="text" name="txtTen" id="ten" ></td>
                        </tr>
                        <tr>
                            <td><label for="tenloai">Tên loại</label></td>
                            <td> 
                                    <select name="txtTenloai" id="maloai">
                                    <?php include('control.php');
                                    $get_data=new data();
                                    $loai=$get_data->select_loaisanpham();
                                    foreach($loai as $se){
                                    ?>
                                    <option value="<?php echo $se['Maloaisanpham'] ?>"><?php echo $se['Tenloaisanpham'] ?></option>

							                      <?php }?>
                         </select>  
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mota">Nơi sản xuất</label></td>
                            <td><input type="text" name="txtNoisanxuat"></td>
                        </tr>
                        <tr>
                            <td><label for="mota">Mô tả</label></td>
                            <td><textarea name="txtMota" id="" cols="57.5" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="gia">Giá</label></td>
                            <td><input type="text" name="txtDongia" id="gia" ></td>
                        </tr>
                        
                            
                        <tr>
                            <td><label for="anh1">Hình ảnh</label></td>
                            <td><input type="file" name="txtFile" id="anh" ></td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <input type="submit" name="btn_Them" class=" sd text-right" value="Gửi">
                            </td>
                        </tr>
                        
                        
                    </table>
                  </form>
                  <?php
                            if(isset($_POST["btn_Them"])){
                              $check_id=$get_data->check_id_sp($_POST["txtId"]);
                              if($check_id>0){
                                echo"<script> alert('Mã sản phẩm đã tồn tại')</script>";	
                              }
                              else{
                                move_uploaded_file($_FILES['txtFile']['tmp_name'],"img/". $_FILES['txtFile']['name']);
                                $insert=$get_data->add_sanpham($_POST['txtId'],$_POST['txtTen'],$_POST['txtMota'],$_POST['txtNoisanxuat'],$_POST['txtTenloai'],$_FILES['txtFile']['name'],$_POST['txtDongia']);
                               
                                if($insert){
                                    $in=$get_data->insert_khosanpham($_POST["txtId"]);
                                    if($in){
                                  ?> <script>
                                  location.href = 'manager-product.php';
                                  </script>
                                   <?php
                            
                                    }
                                }
                              else
                              echo"<script> alert('Không thành công')</script>";
                                
                                
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
                <div class="row">
                <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
                </div>
            </div>
        </div>
        
    </div>
</body>
</html>