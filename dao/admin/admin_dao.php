<?php
function check_admin($user, $pass) {
    $sql =  "SELECT * FROM `admin` WHERE `username` = '$user' AND `password` = '$pass'";
    $user = pdo_query_one($sql);
    return $user;
}
function user_list(){
    $sql =  "SELECT * FROM `user`";
    $user = pdo_query($sql);
    return $user;
}