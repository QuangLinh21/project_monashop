<!DOCTYPE html>
<?php
ob_start();
session_start();
if(empty($_SESSION["email"])){
  header('location:login.php');
}
$id_dog=$_GET["id"];
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
             $getif=$get_data->get_infocho($id_dog); 
             foreach($getif as $dog){
                $anh1=$dog["Anh1"];
                $anh2=$dog["Anh2"];
             ?>
             <div class="main-right">
               <div class="list-customer">
                 <div class="container p-3 ms-5">
                   <h4 class="text-dark text-center"><?php echo $dog["id_dv"] ?> || <a href="admin.html">Quay lại</a></h4>
                   <br>
                   <form action="" enctype="multipart/form-data" method="post" class="form-info text-dark me-5">
                     <table>
                         <tr>
                             <td><label for="ten">Tên thú nuôi</label</td>
                             <td><input type="text" name="txtTen" id="ten" value="<?php echo $dog["Tenthucung"] ?>"></td>
                         </tr>
                         <tr>
                             <td><label for="tenloai">Tên chủng loại</label></td>
                             <td> 
                                     <select name="txtTenchungloai" id="maloai">
                                     <?php 
                                     $maloai="CHO";
                                     $loai=$get_data->get_chungloai($maloai);
                                     foreach($loai as $se){
                                     ?>
                                        <option value="<?php echo $se['Machungloai'] ?>" <?php if($se["Machungloai"]==$dog["Machungloai"]) echo"selected"; ?>><?php echo $se['Tenchungloai'] ?></option>
 
                                                   <?php }?>
                          </select>  
                             </td>
                         </tr>
                         <tr>
                             <td><label for="kichthuoc">Kích Thước</label></td>
                             <td>
                                 <select name="txtKichthuoc" id="">
                                     <option value="Nhỏ" <?php if($dog["Kichthuoc"]=="Nhỏ") echo "selected"; ?>>Nhỏ</option>
                                     <option value="Trung Bình"  <?php if($dog["Kichthuoc"]=="Trung bình") echo "selected"; ?>>Trung bình</option>
                                     <option value="Lớn"  <?php if($dog["Kichthuoc"]=="Lớn") echo "selected"; ?>>Lớn</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><label for="long">Kiểu lông</label></td>
                             <td>
                                 <select name="txtKieulong" id="long">
                                     <option value="Ngắn"  <?php if($dog["Kieulong"]=="Ngắn") echo "selected"; ?>>Ngắn</option>
                                     <option value="Dài" <?php if($dog["Kieulong"]=="Dài") echo "selected"; ?>>Dài</option>
                                     <option value="Xoăn" <?php if($dog["Kieulong"]=="Xoăn") echo "selected"; ?>>Xoăn</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><label for="phobien">Độ phổ biến</label></td>
                             <td>
                                 <select name="txtPhobien" id="">                                     
                                     <option value="Cao" <?php if($dog["Mucdophobien"]=="Cao") echo "selected"; ?>>Cao</option>
                                     <option value="Trung bình"  <?php if($dog["Mucdophobien"]=="Trung bình") echo "selected"; ?>>Trung bình</option>
                                     <option value="Thấp"  <?php if($dog["Mucdophobien"]=="Thấp") echo "selected"; ?>>Thấp</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><label for="mucdich">Mục đích nuôi</label></td>
                             <td>
                                 <select name="txtMucdich" id="">                                     
                                     <option value="Làm cảnh, bầu bạn"  <?php if($dog["Mucdichnuoi"]=="Làm cảnh, bầu bạn") echo "selected"; ?>>Làm cảnh & bầu bạn</option>
                                     <option value="Canh gác, bảo vệ" <?php if($dog["Mucdichnuoi"]=="Canh gác, bảo vệ") echo "selected"; ?>>Canh gác, bảo vệ</option>
                                 </select>
                             </td>
                         </tr>
                         <tr>
                             <td><label for="mota">Mô tả</label></td>
                             <td><textarea name="txtMota" id="" cols="57.5" rows="5"><?php echo $dog["Thongtinthem"]?></textarea></td>
                         </tr>
                         <tr>
                             <td><label for="gia">Giá</label></td>
                             <td><input type="text" name="txtDongia" id="gia" value="<?php echo $dog["Dongia"]?>" ></td>
                         </tr>
                         
                             
                         <tr>
                             <td><label for="anh1">Ảnh 1</label></td>
                             <td><img src="img/<?php echo $dog['Anh1'] ?>" alt="" width="300px" height="250px" class="me-3"><input type="file" name="txtFile1" id="anh1" ></td>
                         </tr>
                         <tr>
                             <td><label for="anh2">Ảnh 2</label></td>
                             <td><img src="img/<?php echo $dog['Anh2'] ?>" alt="" width="300px" height="250px" class="me-3"><input type="file" name="txtFile2" id="anh2" ></td>
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
                      $update=$get_data->update_cho($id_dog,$_POST['txtTen'],$maloai,$_POST['txtTenchungloai'],$_POST['txtKieulong'],$_POST['txtMucdich'],$_POST['txtKichthuoc'],$_POST['txtDongia'],$_POST['txtPhobien'],$_POST['txtMota'],$_FILES['txtFile1']['name'],$_FILES['txtFile2']['name']);
                  
                      if($update){
                        ?> <script>
                        location.href = 'manager-dog.php';
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