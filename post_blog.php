<?php
include('control.php');
$get_data=new data();
$post=$get_data->post_blog($_GET['post']);
if($post){
    echo"<script> alert('post thành công')</script>";
}
else
{
	echo"<script> alert('post không thành công')</script>";
}
header('location:admin_blog.php');
?>