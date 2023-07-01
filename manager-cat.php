<!DOCTYPE html>
<?php
ob_start();
session_start();
if(empty($_SESSION["email"])){
  header('location:login.php');
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
                            <a class="nav-link dropdown-toggle" href="" role="button" style="color: var(--main-color-1);" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <ul class="dropdown-menu mt-3 p-2 fade">
                              <li><a class="dropdown-item text-dark " href="manager-dog.php">CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-cat.php">MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-food-dog.php">ĐỒ ĂN CHO CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manafer-food-cat.php">ĐỒ ĂN CHO MÈO</a></li>
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
                            <a class="nav-link" href="admin_blog.php">BLOG</a>
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
          <div class="main d-flex justify-content-center mb-5">
             
            <div class="main-right mb-5">
              <div class="list-customer">
                
                <div class="container p-3">
                  <h4 class="text-dark text-center">DANH SÁCH SẢN PHẨM-THÚ CƯNG CHÓ || <a href="admin_pet_choadd.php" id="t">Thêm thú cưng</a></h4>
                  <input class="form-control mt-5 mb-3" id="myInput" type="text" placeholder="Tìm kiếm thú cưng">
                  <br>
                  <table class="table table-bordered table-striped .table-responsive">
                    <thead class="table-dark">
                    <tr>
                        <th>Mã sản phẩm</th>
                        <th>Tên thú cưng</th>
                        <th>Chủng loại</th>
                        <th>Đơn giá</th>
                        <th>Kiểu lông</th>
                        <th>Màu sắc</th>
                        <th>Mức độ rụng lông</th>
                        <th>Mức độ phổ biến</th>
                        <th>Vẻ ngoài</th>
                        <th>Thông tin</th>
                        <th>Ảnh 1</th>
                        <th>Ảnh 2</th>
                        <th>Trạng thái</th>
                        <th colspan="3">Thao tác</th>
                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php
                      include("control.php");
                      $get_data=new data();
                      $get=$get_data->get_allcat();
                      foreach($get as $se){
                      ?>
                      <tr>
                        <td><?php echo $se["id_dv"] ?></td>
                        <td><?php echo $se["Tenthucung"] ?></td>                      
                        <td><?php $loai=$get_data->get_tenchungloai($se["Machungloai"]);foreach ($loai as $lo){echo $lo["Tenchungloai"];}?></td>
                        <td><?php echo $se["Dongia"] ?></td>
                        <td><?php echo $se["Kieulong"] ?></td>
                        <td><?php echo $se["Mausac"] ?></td>
                        <td><?php echo $se["Mucdorunglong"] ?></td>
                        <td><?php echo $se["Mucdophobien"] ?></td>
                        <td><?php echo $se["Vengoai"] ?></td>
                        <td align="justify"><?php echo $se["Thongtinthem"] ?></td>
                        <td><img src="img/<?php echo $se['Anh1'] ?>" alt="" width="100px"></td>
                        <td><img src="img/<?php echo $se['Anh2'] ?>" alt="" width="100px"></td>
                        <td><?php echo $se["Trangthai"] ?></td>
                        <td><a href="updatecat.php?id=<?php echo $se["id_dv"] ?>">Sửa</a></td>
                        <td><a href="deletecat.php?id=<?php echo $se["id_dv"]?>" onclick="return (confirm('Xóa thú cưng?'))">Xóa</a></td>
                      </tr>
                      <?php } ?>
                      
                    </tbody>
                  </table>
                </div>
                <script>
                $(document).ready(function(){
                  $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#myTable tr").filter(function() {
                      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                  });
                });
                </script>
              </div>
            </div>
          </div>
        <!-- -------------------------------------footer-------------------------- -->
        <div id="footer" class="mt-5">
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
        </div>
    </div>
</body>
</html>