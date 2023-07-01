<?php
   include('control.php');
   $get_data=new data();
   $delete=$get_data->delete_blog($_GET['delete']);
   if ($delete){
       header("location:admin_blog.php");
   }
   else
   echo"<script> alert('Can not delete');</script>";
?>