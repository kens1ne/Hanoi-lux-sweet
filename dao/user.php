<?php

    function insert_user($name, $username, $phone, $email, $password) {
        $sql = "insert into user (name, username, phone, email, password) value ('$name', '$username', '$phone', '$email', '$password')";
        pdo_execute($sql);
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