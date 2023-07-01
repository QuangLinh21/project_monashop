<!DOCTYPE html>
<?php
ob_start();
session_start();
if (empty($_SESSION["email"])) {
  header('location:login.php');
}
$id = $_GET["id"];
include("control.php");
$get_data = new data();
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

      <div class="main-right">
        <div class="list-customer">

          <div class="container p-3">
            <h4 class="text-dark text-center">CHI TIẾT ĐƠN HÀNG <?php echo $id; ?> || <a href="admin_customer_add.php" id="t">Thêm đơn hàng</a></h4>
            <?php $select = $get_data->get_donhangid($id);
            foreach ($select as $se) {
            ?>
              <span class="text-dark text-center">
                Mã khách đặt hàng:<?php echo $se['id_kh'] ?><br>
                Địa chỉ giao hàng:<?php echo $se['Diachi_giaohang'] ?><br>
                Tổng tiền:<?php echo $se['Tongtien'] ?><br>
                Ngày đặt:<?php echo $se['Ngayxuat']; ?><br>
                <?php if ($se['Trangthai'] == "CHOXUATHANG") { ?>
                  <a href="xuathang.php?id=<?php echo $se['id_hd'] ?>" onclick="return (confirm('Xuất hàng?'))" class='post'>Xuất hàng</a> <br>
                  <a href="huydonhang.php?id=<?php echo $se['id_hd'] ?>" onclick="return (confirm('Hủy đơn hàng?'))">Hủy đơn hàng</a>
              <?php
                } else echo $se["Trangthai"];
              }
              ?>
              </span>
              <input class="form-control mt-5 mb-3" id="myInput" type="text" placeholder="Tìm kiếm sản phẩm">
              <br>
              <table class="table table-bordered table-striped .table-responsive">
                <thead class="table-dark">
                  <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th> Thành tiền </th>

                  </tr>
                  <?php

                  $select = $get_data->get_chitiet($id);
                  foreach ($select as $se) {
                  ?>

                </thead>
                <tbody id="myTable">
                  <tr>
                    <td><?php echo $se['id_sp'] ?></td>
                    <td><?php echo $se['Tenthucung'] ?></td>
                    <td><?php echo $se['Anh1'] ?></td>
                    <td><?php echo $se['Soluong'] ?></td>
                    <td><?php echo $se['Dongia'] ?></td>
                    <td><?php echo $se['Tong'] ?></td>
                  </tr>

                <?php
                  }
                ?>
                </tbody>
              </table>
          </div>

          <script>
            $(document).ready(function() {
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