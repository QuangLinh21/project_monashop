<?php
ob_start(); 
session_start();
include('control.php');
$get_data=new data();
$delete=$get_data->delete_user($_GET['delete']);
echo $_GET['delete'];
echo $delete;
if($delete){
    ?> <script>
location.href = 'admin.php';
</script>
<?php
}
else
echo"<script> alert('Không thành công')</script>";

?>