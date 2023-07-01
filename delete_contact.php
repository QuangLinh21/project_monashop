<?php
    include ("control.php");
    $get_data=new data();
    $delete=$get_data->delete_contact($_GET['delete']);
    if ($delete){
        header("location:admin_contact.php");
    }
    else
    echo"<script> alert('Lỗi xin thử lại');</script>";
?>