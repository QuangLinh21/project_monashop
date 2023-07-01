<?php
include('connect.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
class data
{
    //register
    public function add_acc($ho_ten, $mail, $dia_chi, $so_dt, $gioi_tinh, $ngay_sinh, $quyen, $pass_word)
    {
        global $conn;
        //$quyen=0;
        $sql = "insert into user (Hoten,Email,Diachi,Sodienthoai,Gioitinh,Ngaysinh,quyen,Password)
        values('$ho_ten','$mail','$dia_chi','$so_dt','$gioi_tinh','$ngay_sinh',$quyen,'$pass_word')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function check_email($email)
    { //kiemtra email da ton tai chua?
        global $conn;
        $sql = "select*from user where Email='$email'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }
    public function get_user($id_kh)
    { //lay kh theo id_kh
        global $conn;
        $sql = "select*from user where id_kh='$id_kh'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function login_user($email, $pass)
    { //login with email and password from user
        global $conn;
        $sql = "select*from user where Email='$email' and Password='$pass'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_user($id, $ho_ten, $mail, $dia_chi, $so_dt, $gioi_tinh, $ngay_sinh)
    { //Update thong tin theo id_kh
        global $conn;
        $sql = "update user set  Hoten='$ho_ten',Email='$mail',Diachi='$dia_chi',Sodienthoai='$so_dt', Gioitinh='$gioi_tinh',
         Ngaysinh='$ngay_sinh' where id_kh='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_user($id)
    { //Xoa kh theo id_kh
        global $conn;
        $sql = "delete from user where id_kh=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function login($email, $pass)
    { //login with email and password from user
        global $conn;
        $sql = "select*from user where Email='$email' and Password='$pass'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }

    public function update_pass($id_regt, $pass)
    {
        global $conn;
        $sql = "update register set password='$pass' where id_regt=$id_regt";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_pass($email)
    {
        global $conn;
        $sql = "select password from register where email='$email'";
        $run = mysqli_query($conn, $sql);
        $kq = mysqli_fetch_array($run);
        return $kq;
    }
    public function get_name($email)
    {
        global $conn;
        $sql = "select Fullname from register where email='$email'";
        $run = mysqli_query($conn, $sql);
        $kq = mysqli_fetch_array($run);
        return $kq;
    }
    public function select_user()
    {
        global $conn;
        $sql = "select *from user";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //sanpham
    public function check_id_sp($id)
    {
        global $conn;
        $sql = "select*from sanpham where id_sp='$id'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }
    public function add_sanpham($id, $tensp, $mota, $noisx, $maloai, $hinhanh, $dongia)
    {
        global $conn;
        $sql = "insert into sanpham (id_sp,Tensanpham,Mota,Noisanxuat,Maloaisanpham,Hinhanh,Dongiaban)
        values('$id','$tensp','$mota','$noisx','$maloai','$hinhanh','$dongia')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function sendMail($username, $password, $address, $subject, $body, $altbody)
    {


        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $username;
        $mail->Password = $password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
        $mail->SMTPAuth   = true;    // enable SMTP authentication
        $mail->setFrom($username);
        $mail->addAddress($address);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = $altbody;
        if (!$mail->Send()) {
            return 0;
        } else {
            return 1;
        }
    }
    //subject
    public function select_loaisanpham()
    {
        global $conn;
        $sql = "SELECT*from loaisanpham";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_tenloaisanpham($id)
    {
        global $conn;
        $sql = "SELECT*from loaisanpham where Maloaisanpham='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    //contact
    public function contact($name, $email)
    {
        global $conn;
        $sql = "insert into contact(name,email) values('$name','$email')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function check_contact($email)
    { //email da ton tai o bang contact chua
        global $conn;
        $sql = "select*from contact where email='$email'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }
    public function select_contact()
    {
        global $conn;
        $sql = "select*from contact";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function check_idmeo($id)
    { //check idmeo da ton tai chua
        global $conn;
        $sql = "select*from thucung_meo where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }
    public function insert_meo($id_dv, $Tenthucung, $Maloai, $Machungloai, $Dongia, $Kieulong, $Mausac, $Mucdorunglong, $Mucdophobien, $Vengoai, $Thongtinthem, $Anh1, $Anh2,$trangthai)
    {
        global $conn;
        $sql = "INSERT INTO thucung_meo(id_dv, Tenthucung, Maloai, Machungloai, Dongia, Kieulong, Mausac, Mucdorunglong, Mucdophobien, Vengoai, Thongtinthem, Anh1, Anh2,Trangthai) 
    VALUES ('$id_dv', '$Tenthucung', '$Maloai', '$Machungloai', $Dongia, '$Kieulong', '$Mausac', '$Mucdorunglong', '$Mucdophobien', '$Vengoai', '$Thongtinthem', '$Anh1', '$Anh2','$trangthai')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function check_idcho($id)
    { //check idcho
        global $conn;
        $sql = "select*from thucung_cho where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }

    public function get_cho()
    {
        global $conn;
        $sql = "select*from thucung_cho where Trangthai='Còn hàng'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_cho10()
    {
        global $conn;
        $sql = "select*from thucung_cho where Trangthai='Còn hàng' LIMIT 10";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_alldog()
    {
        global $conn;
        $sql = "select*from thucung_cho";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_allcat()
    {
        global $conn;
        $sql = "select*from thucung_meo";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_meo()
    {
        global $conn;
        $sql = "select*from thucung_meo where Trangthai='Còn hàng'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_meo10()
    {
        global $conn;
        $sql = "select*from thucung_meo where Trangthai='Còn hàng' LIMIT 10";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    public function get_info($id)
    {
        global $conn;
        $sql = "SELECT*from thucung_meo WHERE id_dv = '$id'
    UNION
    SELECT*from thucung_cho WHERE id_dv = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_infocho($id)
    {
        global $conn;
        $sql = "SELECT*from thucung_cho where id_dv = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_infomeo($id)
    {
        global $conn;
        $sql = "SELECT*from thucung_meo WHERE id_dv = '$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_cho($id_dv, $Tenthucung, $Maloai, $Machungloai, $Kieulong, $Mucdichnuoi, $Kichthuoc, $Dongia, $Mucdophobien, $Thongtinthem, $Anh1, $Anh2,$trangthai)
    {
        global $conn;
        $sql = "INSERT INTO thucung_cho(id_dv, Tenthucung, Maloai, Machungloai, Kieulong, Mucdichnuoi, Kichthuoc, Dongia, Mucdophobien, Thongtinthem, Anh1, Anh2,Trangthai) 
    VALUES ('$id_dv', '$Tenthucung', '$Maloai', '$Machungloai', '$Kieulong', '$Mucdichnuoi', '$Kichthuoc', '$Dongia', '$Mucdophobien', '$Thongtinthem', '$Anh1', '$Anh2','$trangthai')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_cho($id_dv, $Tenthucung, $Maloai, $Machungloai, $Kieulong, $Mucdichnuoi, $Kichthuoc, $Dongia, $Mucdophobien, $Thongtinthem, $Anh1, $Anh2)
    {
        global $conn;
        $sql = "update thucung_cho set Tenthucung='$Tenthucung',Maloai='$Maloai',Machungloai='$Machungloai',Kieulong='$Kieulong',
    Dongia=$Dongia,Mucdophobien='$Mucdophobien', Thongtinthem='$Thongtinthem', Anh1='$Anh1',Anh2= '$Anh2' where id_dv='$id_dv'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_meo($id_dv, $Tenthucung, $Maloai, $Machungloai, $Dongia, $Kieulong, $Mausac, $Mucdorunglong, $Mucdophobien, $Vengoai, $Thongtinthem, $Anh1, $Anh2)
    {
        global $conn;
        $sql = "update thucung_meo set Tenthucung='$Tenthucung',Maloai='$Maloai',Machungloai='$Machungloai',Kieulong='$Kieulong',Mausac='$Mausac',Mucdorunglong='$Mucdorunglong',Vengoai='$Vengoai',
    Dongia=$Dongia,Mucdophobien='$Mucdophobien', Thongtinthem='$Thongtinthem', Anh1='$Anh1',Anh2= '$Anh2' where id_dv='$id_dv'";
        $run = mysqli_query($conn, $sql);
        echo $sql;
        return $run;
    }
    public function get_chungloai($maloai)
    {
        global $conn;
        $sql = "select * from chungloai where Maloai='$maloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_tenchungloai($machungloai)
    {
        global $conn;
        $sql = "select * from chungloai where Machungloai='$machungloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_loai()
    {
        global $conn;
        $sql = "select * from loaithucung";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_dog($id)
    {
        global $conn;
        $sql = "delete from thucung_cho where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_cat($id)
    {
        global $conn;
        $sql = "delete from thucung_meo where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function chotheoloai($machungloai)
    {
        global $conn;
        $sql = "select*from thucung_cho  where Machungloai='$machungloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function meotheoloai($machungloai)
    {
        global $conn;
        $sql = "select*from thucung_meo  where Machungloai='$machungloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //gio hang
    public function insert_giohang($id_kh, $id_sp, $Maloai, $Soluong, $dongia)
    {
        global $conn;
        $sql = "INSERT INTO giohang(id_kh, id_sp, Maloai, Soluong,Dongia) VALUES ('$id_kh','$id_sp','$Maloai',$Soluong,$dongia)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_cart($id)
    {
        global $conn;
        $sql = "SELECT id_kh,id_sp,Tenthucung,thucung_meo.Maloai,Anh1,Soluong,giohang.Dongia,Soluong*giohang.Dongia as Tong from giohang,thucung_meo WHERE thucung_meo.id_dv=giohang.id_sp and id_kh='$id'
    Union all
    SELECT id_kh,id_sp,Tenthucung,thucung_cho.Maloai,Anh1,Soluong,giohang.Dongia,Soluong*giohang.Dongia as Tong from giohang,thucung_cho WHERE thucung_cho.id_dv=giohang.id_sp and id_kh='$id'
    union all
    SELECT id_kh,giohang.id_sp,Tensanpham,Maloaisanpham,Hinhanh,Soluong,giohang.Dongia,Soluong*giohang.Dongia as Tong from giohang,sanpham WHERE sanpham.id_sp=giohang.id_sp and id_kh='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function search($ten)
    {
        global $conn;
        $sql = "SELECT id_dv,Tenthucung,Anh1,Dongia,Maloai from thucung_meo WHERE Tenthucung like '%$ten%'
    Union all
    SELECT id_dv,Tenthucung,Anh1,Dongia,Maloai from thucung_cho WHERE Tenthucung like '%$ten%'
    union all
    SELECT id_sp,Tensanpham,Hinhanh,Dongiaban,Maloaisanpham from sanpham  WHERE Tensanpham like '%$ten%'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function count_search($ten)
    {
        global $conn;
        $sql = "SELECT id_dv,Tenthucung,Anh1,Dongia,Maloai from thucung_meo WHERE Tenthucung like '%$ten%'
        Union all
        SELECT id_dv,Tenthucung,Anh1,Dongia,Maloai from thucung_cho WHERE Tenthucung like '%$ten%'
        union all
        SELECT id_sp,Tensanpham,Hinhanh,Dongiaban,Maloaisanpham from sanpham  WHERE Tensanpham like '%$ten%'";
        $run = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($run);
        return $count;
    }
    public function sumcart($id)
    {
        global $conn;
        $sql = "SELECT Sum(Soluong*Dongia) as Tong
    from giohang
    WHERE id_kh=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_cart($id_kh, $id_sp)
    {
        global $conn;
        $sql = "delete from giohang where id_kh='$id_kh' and id_sp='$id_sp'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_donhang($id_kh, $diachi, $tongtien)
    {
        global $conn;
        $sql = "INSERT INTO donhang(id_kh,Diachi_giaohang,Tongtien,Trangthai)
    VALUES ($id_kh,'$diachi',$tongtien,'CHOXUATHANG')";
        $run = mysqli_query($conn, $sql);
        $rs = mysqli_insert_id($conn);
        return $rs;
    }

    public function get_chitiet($id)
    {
        global $conn;
        $sql = "SELECT id_sp,Tenthucung,Anh1,chitiet_donhang.Soluong,chitiet_donhang.Dongia,chitiet_donhang.Soluong*chitiet_donhang.Dongia as Tong from chitiet_donhang,thucung_meo WHERE thucung_meo.id_dv=chitiet_donhang.id_sp and id_hd=$id
    Union all
SELECT id_sp,Tenthucung,Anh1,chitiet_donhang.Soluong,chitiet_donhang.Dongia,chitiet_donhang.Soluong*chitiet_donhang.Dongia as Tong from chitiet_donhang,thucung_cho WHERE thucung_cho.id_dv=chitiet_donhang.id_sp and id_hd=$id
    Union all
SELECT chitiet_donhang.id_sp,Tensanpham,Hinhanh,chitiet_donhang.Soluong,chitiet_donhang.Dongia,chitiet_donhang.Soluong*chitiet_donhang.Dongia as Tong from chitiet_donhang,sanpham WHERE sanpham.id_sp=chitiet_donhang.id_sp and id_hd=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_diachigiaohang($id_kh)
    {
        global $conn;
        $sql = "Select*from diachi_giaohang where id_kh=$id_kh";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_giohang($id_kh)
    {
        global $conn;
        $sql = "delete from giohang where id_kh=$id_kh";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_ctdonhang($id_hd, $id_kh)
    {
        global $conn;
        $sql = "INSERT INTO chitiet_donhang(id_hd,id_kh,id_sp,Soluong,Maloai,Dongia)
        SELECT $id_hd,id_kh,id_sp,Soluong,Maloai,Dongia
        FROM giohang
        WHERE id_kh=$id_kh";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //donhang
    public function get_donhang()
    {
        global $conn;
        $sql = "Select*from donhang";
        $run = mysqli_query($conn, $sql);
        return $run;
    }


    public function get_donhangid($id)
    {
        global $conn;
        $sql = "Select*from donhang where id_hd=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_donhanguser($id)
    {
        global $conn;
        $sql = "Select*from donhang where id_kh=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_donhang($id, $tt)
    {
        global $conn;
        $sql = "update donhang set Trangthai='$tt' where id_hd=$id";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function doanhthu()
    {
        global $conn;
        $sql = "Select*from donhang where Trangthai='DANHAN'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function tongdoanhthu()
    {
        global $conn;
        $sql = "Select sum(Tongtien) from donhang where Trangthai='DANHAN'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //diachigiaohang
    public function insert_diachi($id, $hoten, $sdt, $diachi)
    {
        global $conn;
        $sql = "INSERT INTO diachi_giaohang(id_kh, Hoten, Sodienthoai, Diachi_giaohang)
     VALUES ($id,'$hoten','$sdt','$diachi')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    //  ---------------------------blog------------------------
    public function select_blogad()
    {
        global $conn;
        $sql = "select * from blog";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_blog($quyen)
    {
        global $conn;
        $sql = "select * from blog where quyen='1'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_fullblog($id_blog)
    {
        global $conn;
        $sql = "select * from blog where id_blog='$id_blog'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function post_blog($id_blog)
    {
        global $conn;
        $sql = "update blog set quyen='1' where id_blog='$id_blog'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function un_blog($id_blog)
    {
        global $conn;
        $sql = "update blog set quyen='0' where id_blog='$id_blog'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_blog($id_blog)
    {
        global $conn;
        $sql = "delete from blog where id_blog='$id_blog'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function add_blog($Ten_blog, $s_blog, $l_blog, $Anh)
    {
        global $conn;
        $sql = "insert into blog(Ten_blog,s_blog,l_blog,Anh)
            values('$Ten_blog','$s_blog','$l_blog','$Anh')";
        $run = mysqli_query($conn, $sql);
        return $sql;
    }
    public function update_blog($Ten_blog, $s_blog, $l_blog, $Ngaydang, $Anh, $id_blog)
    {
        global $conn;
        $sql = "update blog set
            Ten_blog='$Ten_blog',s_blog='$s_blog',l_blog='$l_blog',Ngaydang='$Ngaydang',Anh='$Anh' where id_blog='$id_blog'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //sanpham

    public function get_phukien()
    {
        global $conn;
        $sql = "select*from sanpham";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_phukien10()
    {
        global $conn;
        $sql = "select*from sanpham LIMIT 10";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_sp()
    {
        global $conn;
        $sql = "SELECT * FROM sanpham
        LIMIT 8";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function sanpham($ma)
    {
        global $conn;
        $sql = "select*from sanpham where Maloaisanpham='$ma'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_sanpham($id)
    {
        global $conn;
        $sql = "select*from sanpham,khosanpham,loaisanpham 
        WHERE loaisanpham.Maloaisanpham=sanpham.Maloaisanpham 
        and sanpham.id_sp=khosanpham.id_sp  and khosanpham.id_sp='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function get_tenloaisp($ma)
    {
        global $conn;
        $sql = "select*from loaisanpham where Maloaisanpham='$ma'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // ------------------------contact-------------------
    public function in_contact($Hoten, $Email, $Sodt, $Loinhan)
    {
        global $conn;
        $sql = "insert into lienhe (Hoten,Email,Sodt,Loinhan) 
    values('$Hoten','$Email','$Sodt','$Loinhan')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function se_contact()
    {
        global $conn;
        $sql = "select * from lienhe";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_contact($id_lh)
    {
        global $conn;
        $sql = "delete from lienhe where id_lh='$id_lh'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function select_food_dog()
    {
        global $conn;
        $sql = "select * from sanpham where Maloaisanpham='FOOD_DOG'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_food_cat()
    {
        global $conn;
        $sql = "select * from sanpham where Maloaisanpham='FOOD_CAT'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_pk()
    {
        global $conn;
        $sql = "select * from sanpham where Maloaisanpham='PK'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    //Khosanpham
    public function select_khosanpham()
    {
        global $conn;
        $sql = "select * from khosanpham,sanpham where sanpham.id_sp=khosanpham.id_sp";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_khosanpham($id)
    {
        global $conn;
        $sql = "insert into khosanpham(id_sp) values('$id')";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function tonkho_cho(){
        global $conn;
        $sql="select thucung_cho.Machungloai,Tenchungloai,COUNT(*) as Soluong  from thucung_cho,chungloai 
        WHERE chungloai.Machungloai=thucung_cho.Machungloai GROUP by Machungloai,Tenchungloai";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function tonkho_meo(){
        global $conn;
        $sql="select thucung_meo.Machungloai,Tenchungloai,COUNT(*) as Soluong  from thucung_meo,chungloai 
        WHERE chungloai.Machungloai=thucung_meo.Machungloai and Trangthai='Còn hàng' GROUP by Machungloai,Tenchungloai";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function tonkho_meotheoloai($maloai){
        global $conn;
        $sql="select*from thucung_meo,chungloai where chungloai.Machungloai=thucung_meo.Machungloai and Trangthai='Còn hàng' 
        and thucung_meo.Machungloai='$maloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function tonkho_chotheoloai($maloai){
        global $conn;
        $sql="select*from thucung_cho,chungloai where chungloai.Machungloai=thucung_cho.Machungloai and Trangthai='Còn hàng' 
        and thucung_cho.Machungloai='$maloai'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_nhaphang($id,$soluong,$dongia){
        global $conn;
        $sql="insert into nhaphang(id_sp,Soluong,Dongianhap) values('$id',$soluong,$dongia)";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function update_soluong_sanpham($soluong,$id){
        global $conn;
        $sql="update khosanpham set Soluong=Soluong+$soluong where id_sp='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function mua_sanpham($soluong,$id){
        global $conn;
        $sql="update khosanpham set Soluong=Soluong-$soluong where id_sp='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function mua_cho($id){
        global $conn;
        $sql="update thucung_cho set Trangthai='Đã bán' where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    public function mua_meo($id){
        global $conn;
        $sql="update thucung_meo set Trangthai='Đã bán' where id_dv='$id'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
}