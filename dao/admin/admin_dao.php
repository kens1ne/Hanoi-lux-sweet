<?php
function check_admin($user, $pass) {
    $sql =  "SELECT * FROM `admin` WHERE `username` = '$user' AND `password` = '$pass'";
    $user = pdo_query_one($sql);
    return $user;
}