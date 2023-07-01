<?php
ob_start(); 
session_start();
include('control.php');
$get_data=new data();
$tt="CHOGIAOHANG";
$update=$get_data->update_donhang($_GET["id"],$tt);
if($update){
    ?> <script>
location.href = 'hoadon.php';
</script>
<?php
}
else
echo"<script> alert('Không thành công')</script>";

?>