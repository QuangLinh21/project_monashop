<!DOCTYPE html>
<?php
ob_start();
session_start();
if(empty($_SESSION["email"])){
  header('location:login.php');
}
$id_cat=$_GET["id"];
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
                          <a class="nav-link" href="admin.php">KHÁCH HÀNG</a>
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
                            <a class="nav-link" href="blog.php">BLOG</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">QUẢNG CÁO</a>
                        </li>
                        
                      </ul>
                    </div>
                </div>
            </nav>
              
        </div>
        <!-- --------------------------------body--------------------------------- -->
        <div class="main d-flex justify-content-center">
             <?php 
             include('control.php');
            $get_data=new data();
             $update=$get_data->get_infomeo($id_cat); 
             foreach($update as $cat){
                $anh1=$cat["Anh1"];
                $anh2=$cat["Anh2"];
             ?>
            <div class="main-right">
              <div class="list-customer">
                <div class="container p-3 ms-5">
                  <h4 class="text-dark text-center"><?php echo $cat["id_dv"] ?> || <a href="admin.php">Quay lại</a></h4>
                  <br>
                  <form action="" enctype="multipart/form-data" method="post" class="form-info text-dark me-5">
                    <table>
                        <tr>
                            <td><label for="ten">Tên thú nuôi</label</td>
                            <td><input type="text" name="txtTen" id="ten" value="<?php echo $cat["Tenthucung"] ?>" ></td>
                        </tr>
                        <tr>
                            <td><label for="tenloai">Tên chủng loại</label></td>
                            <td> 
                                    <select name="txtTenchungloai" id="maloai">
                                    <?php 
                                    $maloai="MEO";
                                    $loai=$get_data->get_chungloai($maloai);
                                    foreach($loai as $se){
                                        ?>
                                        <option value="<?php echo $se['Machungloai'] ?>" <?php if($se["Machungloai"]==$cat["Machungloai"]) echo"selected"; ?>><?php echo $se['Tenchungloai'] ?></option>
    
                                                      <?php }?>
                         </select>  
                            </td>
                        </tr>
                        <tr>
                            <td><label for="kieulong">Kiểu lông</label></td>
                            <td>
                                <select name="txtKieulong" id="">
                                    <
                                    <option value="Dài" <?php if($cat["Kieulong"]=="Dài") echo "selected"; ?>>Dài</option>
                                    <option value="Ngắn" <?php if($cat["Kieulong"]=="Ngắn") echo "selected"; ?>>Ngắn</option>
                                    <option value="Không lông" <?php if($cat["Kieulong"]=="Không lông") echo "selected"; ?>>Không lông</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="long">Màu sắc</label></td>
                            <td>
                                <select name="txtMausac" id="">
                                    
                                    <option value="Một màu" <?php if($cat["Mausac"]=="Một màu") echo "selected"; ?>>Một màu</option>
                                    <option value="Nhiều Màu" <?php if($cat["Mausac"]=="Nhiều màu") echo "selected"; ?>>Nhiều màu</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="phobien">Độ phổ biến</label></td>
                            <td>
                                <select name="txtPhobien" id="">
                                    <option value="Rộng" <?php if($cat["Mucdophobien"]=="Rộng") echo "selected"; ?>>Rộng</option>
                                    <option value="Trung bình" <?php if($cat["Mucdophobien"]=="Trung bình") echo "selected"; ?>>Trung bình</option>
                                    <option value="Hiếm" <?php if($cat["Mucdophobien"]=="Hiếm") echo "selected"; ?>>Hiếm</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="dỏunglong">Mức độ rụng lông</label></td>
                            <td>
                                <select name="txtDorunglong" id="">
                                    
                                    <option value="Ít" <?php if($cat["Mucdorunglong"]=="Ít") echo "selected"; ?>>Ít</option>
                                    <option value="Trung bình" <?php if($cat["Mucdorunglong"]=="Trung bình") echo "selected"; ?>>Trung bình</option>
                                    <option value="Nhiều" <?php if($cat["Mucdorunglong"]=="Nhiều") echo "selected"; ?>>Nhiều</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="vengoai">Vẻ ngoài</label></td>
                            <td>
                                <select name="txtVengoai" id="">
                                    
                                    <option value="Quý tộc" <?php if($cat["Vengoai"]=="Quý tộc") echo "selected"; ?>>Quý tộc</option>
                                    <option value="Đáng yêu" <?php if($cat["Vengoai"]=="Đáng yêu") echo "selected"; ?>>Đáng yêu</option>
                                    <option value="Độc lạ" <?php if($cat["Vengoai"]=="Độc lạ") echo "selected"; ?>>Độc lạ</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="mota">Mô tả</label></td>
                            <td><textarea name="txtMota" id="" cols="57.5" rows="5" ><?php echo $cat["Thongtinthem"]?></textarea></td>
                        </tr>
                        <tr>
                            <td><label for="gia">Giá</label></td>
                            <td><input type="text" name="txtDongia" id="gia" value="<?php echo $cat["Dongia"]?>"></td>
                        </tr>
                        
                            
                        <tr>
                            <td><label for="anh1">Ảnh 1</label></td>
                            <td><img src="img/<?php echo $cat['Anh1'] ?>" alt="" width="300px" height="250px" class="me-3"><input type="file" name="txtFile1" id="anh1" ></td>
                        </tr>
                        <tr>
                            <td><label for="anh2">Ảnh 2</label></td>
                            <td><img src="img/<?php echo $cat['Anh2'] ?>" alt="" width="300px" height="250px" class="me-3"> <input type="file" name="txtFile2" id="anh2" ></td>
                        
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <input type="submit" name="btnSua" class=" sd text-right" value="Gửi">
                            </td>
                        </tr>
                        
                        
                    </table>
                    <?php } ?>
                  </form>
                  <?php
                 if(isset($_POST["btnSua"])){
                    move_uploaded_file($_FILES['txtFile1']['tmp_name'],"img/". $_FILES['txtFile1']['name']);
                    move_uploaded_file($_FILES['txtFile2']['tmp_name'],"img/". $_FILES['txtFile2']['name']);

                     if (empty($_FILES['txtFile1']['name'])){
                        $_FILES['txtFile1']['name']=$anh1;
                    }
                    
                    if (empty($_FILES['txtFile2']['name'])){
                        $_FILES['txtFile2']['name']=$anh2;
                    } 
                      $update=$get_data->update_meo($id_cat,$_POST['txtTen'],$maloai,$_POST['txtTenchungloai'],$_POST['txtDongia'],$_POST['txtKieulong'],$_POST['txtMausac'],$_POST['txtDorunglong'],$_POST['txtVengoai'],$_POST['txtPhobien'],$_POST['txtMota'],$_FILES['txtFile1']['name'],$_FILES['txtFile2']['name']);
                  
                      if($update){
                        ?> <script>
                        location.href = 'manager-cat.php';
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
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
        </div>
    </div>
</body>
</html>