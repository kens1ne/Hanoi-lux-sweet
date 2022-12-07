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

// hàm load tất cả danh sách hàng hóa trong database
function loadAll_user()
{
    $sql = "select * from user";
    $list_user = pdo_query($sql);
    return $list_user;
}

// hàm load 1 thông tin khách hàng trong bảng khách hàng của databasse lên ô để sửa thông tin
function loadone_user($id)
{
    $sql = "select * from user where id=" . $id;
    $user = pdo_query_one($sql);
    return $user;
}
//------------------------------------------------
function check_user($user, $pass) {
    $sql =  "select * from user where username='" . $user . "' and password='" . $pass . "'";
    $user = pdo_query_one($sql);
    return $user;

}


//------------------------------------------------
// hàm xóa 1 khách hàng trong databasse
function delete_user($id)
{
    $sql = "delete from user where id=" . $id;
    pdo_execute($sql);
}
//------------------------------------------------
?>