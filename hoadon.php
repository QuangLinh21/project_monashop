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
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <ul class="dropdown-menu mt-3 p-2 fade">
                              <li><a class="dropdown-item text-dark " href="manager-dog.php">CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-cat.php">MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-food-dog.php">ĐỒ ĂN CHO CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manafer-food-cat.php">ĐỒ ĂN CHO MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="pk.php">PHỤ KIỆN</a></li>
                              
                            </ul>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">KHO HÀNG</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="hoadon.php" style="color: var(--main-color-1);">HÓA ĐƠN</a>
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
          <div class="main d-flex justify-content-center">
             
            <div class="main-right">
              <div class="list-customer">
                
                <div class="container p-3">
                  <h4 class="text-dark text-center">DANH SÁCH ĐƠN HÀNG || <a href="admin_customer_add.php" id="t">Thêm đơn hàng</a></h4>
                  <input class="form-control mt-5 mb-3" id="myInput" type="text" placeholder="Tìm kiếm khách hàng">
                  <br>
                  <table class="table table-bordered table-striped .table-responsive">
                    <thead class="table-dark">
                      <tr>
                        <th>Mã đơn hàng</th>
                        <th>Mã khách hàng</th>
                        <th>Địa chỉ giao hàng</th>
                        <th>Tổng tiền</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th colspan="3">Thao tác</th>
                      </tr>
                      <?php 
                      include("control.php");
                      $get_data=new data();
                      $select=$get_data->get_donhang();
                      foreach($select as $se){
                      ?>

                    </thead>
                    <tbody id="myTable">
                      <tr>
                        <td><?php echo $se['id_hd']?></td>
                        <td><?php echo $se['id_kh']?></td>
                        <td><?php echo $se['Diachi_giaohang']?></td>
                        <td><?php echo $se['Tongtien']?></td>                        
                        <td><?php echo $se['Ngayxuat']?></td>
                        <td><?php echo $se['Trangthai']?></td>
                        <td><a href="ct_donhang.php?id=<?php echo $se['id_hd']?>"> Chi tiết</a></td>
                        <td><a href="admin_customer_edit.php?edit=<?php echo $se['id_kh']?>"><i class="fa fa-home text-primary " style="font-size:24px"></i></a></td>
                        <td><a href="admin_customer_delete.php?delete=<?php echo $se['id_kh']?>"><i class="fa fa-minus-square text-danger mt-1" style="font-size:20px" onclick="return (confirm('Xóa?'))"></i></a></td>
                      </tr>
                      
                      <?php
                      }
                      ?>
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
        <div id="footer">
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
        </div>
    </div>
</body>
</html>