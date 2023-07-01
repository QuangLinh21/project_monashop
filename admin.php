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
                          <a class="nav-link" href="admin.php" style="color: var(--main-color-1);">KHÁCH HÀNG</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown">SẢN PHẨM</a>
                            <ul class="dropdown-menu mt-3 p-2 fade">
                              <li><a class="dropdown-item text-dark " href="manager-dog.php">CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-cat.php">MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="manager-food-dog.php">ĐỒ ĂN CHO CHÓ</a></li>
                              <li><a class="dropdown-item text-dark" href="manafer-food-cat.php">ĐỒ ĂN CHO MÈO</a></li>
                              <li><a class="dropdown-item text-dark" href="manafer-pk.php">PHỤ KIỆN</a></li>
                              
                            </ul>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="khohang.php">KHO HÀNG</a>
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
                            <a class="nav-link" href="admin_contact.php">CONTACT</a>
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
                  <h4 class="text-dark text-center">DANH SÁCH KHÁCH HÀNG || <a href="admin_customer_add.php" id="t">Thêm khách hàng</a></h4>
                  <input class="form-control mt-5 mb-3" id="myInput" type="text" placeholder="Tìm kiếm khách hàng">
                  <br>
                  <table class="table table-bordered table-striped .table-responsive">
                    <thead class="table-dark">
                      <tr>
                        <th>Mã khách hàng</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>SĐT</th>
                        <th>Giới tính</th>
                        <th>Ngày sinh</th>
                        <th colspan="2">Thao tác</th>
                      </tr>
                      <?php 
                      include("control.php");
                      $get_data=new data();
                      $select_user=$get_data->select_user();
                      foreach($select_user as $se){
                      ?>

                    </thead>
                    <tbody id="myTable">
                      <tr>
                        <td><?php echo $se['id_kh']?></td>
                        <td><?php echo $se['Hoten']?></td>
                        <td><?php echo $se['Email']?></td>
                        <td><?php echo $se['Diachi']?></td>                        
                        <td><?php echo $se['Sodienthoai']?></td>
                        <td><?php echo $se['Gioitinh']?></td>
                        <td><?php echo $se['Ngaysinh']?></td>
                        <td><a href="admin_customer_edit.php?edit=<?php echo $se['id_kh']?>"><i class="fa fa-home text-primary " style="font-size:24px"></i></a></td>
                        <td><a href="admin_customer_delete.php?delete=<?php echo $se['id_kh']?>" onclick="return (confirm('Xóa thú cưng?'))"><i class="fa fa-minus-square text-danger mt-1" style="font-size:20px"></i></a></td>
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
        <div id="footer" class="mt-5">
            <div class=" ft text-center">
                 <p>Sản phẩm của Phuong&Linh PDU - Hotline hỗ trợ : 0123456789</p>
            </div>
        </div>
    </div>
</body>
</html>