<?php
ob_start(); 
session_start();
include('control.php');
$get_data=new data();
$delete=$get_data->delete_dog($_GET['id']);
if($delete){
    ?> <script>
location.href = 'manager-dog.php';
</script>
<?php
}
else
echo"<script> alert('Không thành công')</script>";

?>