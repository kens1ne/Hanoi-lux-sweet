<?php
// phần câu lệnh SQL trang tài khoản của trang chủ
// hàm thêm mới khách hàng vào bảng khách hàng trong databasse
function insert_user($name, $username, $password,$email, $phone,$address)
{
    $sql = "insert into user(name, username, password,  email, phone, address) value('$name', '$username', '$password', '$email', '$phone','$address')";
    pdo_execute($sql);
}
// hàm cập nhật thông tin khách hàng vào bảng khách hàng trong databasse
function update_user($id, $name, $username, $password,$email, $phone,$address)
{
        $sql = "update user set  name='" . $name . "', username='" . $username . "', email='" . $email . "', phone='" . $phone . "',address='" . $address . "' where id=" . $id;

    pdo_execute($sql);
}
//------------------------------------------------
// hàm check thông tin đăng nhập có giống trong database hay không
// function ckeckuser($makh, $pass)
// {
//     $sql = "select * from khach_hang where ma_kh='" . $makh . "' and mat_khau='" . $pass . "' ";
//     $khachhang = pdo_query_one($sql);
//     return $khachhang;
// }
// //------------------------------------------------
// // hàm check thông tin quên mật khẩu và đưa mật khẩu ng dùng lên
// function checkpass($makh, $email)
// {
//     $sql = "select * from khach_hang where ma_kh='" . $makh . "' and email='" . $email . "' ";
//     $khachhang = pdo_query_one($sql);
//     return $khachhang;
// }
// //------------------------------------------------
// // hàm update thông tin tài khoản ở trang chủ
// function  update_tk_kh($id, $makh, $pass, $hoten, $hinh, $email)
// {
//     if ($hinh != "") {
//         $sql = "update khach_hang set ma_kh='" . $makh . "',mat_khau='" . $pass . "', ho_ten='" . $hoten . "', hinh='" . $hinh . "',email='" . $email . "' where id=" . $id;
//     } else {
//         $sql = "update khach_hang set ma_kh='" . $makh . "',mat_khau='" . $pass . "', ho_ten='" . $hoten . "', email='" . $email . "' where id=" . $id;
//     }

//     pdo_execute($sql);
// }
//------------------------------------------------
// ------------------------------------------------
//phần câu lệnh hàm SQL trang admin quản lý khách hàng
// hàm load tất cả danh sách hàng hóa trong database
function loadAll_user()
{
    $sql = "select * from user";
    $list_user = pdo_query($sql);
    return $list_user;
}
// ------------------------------------------------

// hàm thêm mới khách hàng vào bảng khách hàng trong databasse
// function insert_kh($makh, $pass, $hoten, $kichhoat,  $hinh, $email, $vaitro)
// {
//     $sql = "insert into khach_hang(ma_kh, mat_khau, ho_ten, kich_hoat, hinh, email, vai_tro) value('$makh', '$pass', '$hoten', '$kichhoat', '$hinh', '$email', '$vaitro')";
//     pdo_execute($sql);
// }
// //------------------------------------------------

// hàm load 1 thông tin khách hàng trong bảng khách hàng của databasse lên ô để sửa thông tin
function loadone_user($id)
{
    $sql = "select * from user where id=" . $id;
    $user = pdo_query_one($sql);
    return $user;
}
//------------------------------------------------



//------------------------------------------------
// hàm xóa 1 khách hàng trong databasse
function delete_user($id)
{
    $sql = "delete from user where id=" . $id;
    pdo_execute($sql);
}
//------------------------------------------------
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>