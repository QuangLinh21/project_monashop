<?php
ob_start(); 
session_start();
include('control.php');
$get_data=new data();
$delete=$get_data->delete_cat($_GET['id']);
if($delete){
    ?> <script>
location.href = 'manager-cat.php';
</script>
<?php
}
else
echo"<script> alert('Không thành công')</script>";

?>