<?php
session_start();
include("control.php");
$get_data=new data();
if(empty($_SESSION["email"])||empty($_SESSION["pass"])){ echo 1;
?> 
<script>

location.href = 'login.php';
</script>
<?php }
else{

              $id_dv=$_GET["id"];
              $id_kh=$_GET["idkh"];
              $soluong=$_GET["sl"];
              $maloai=$_GET["maloai"];
              $dongia=$_GET["dg"];
              $insert_giohang=$get_data->insert_giohang($id_kh, $id_dv, $maloai, $soluong,$dongia);
              if($insert_giohang){?>

                <script>
                location.href = 'cart.php';
                </script>
                <?php
              }
              else{?>

                <script>
                alert("Không thành công, liên hệ hotline để được hỗ trợ!");
                </script>
                <?php

              }
    }
              ?>