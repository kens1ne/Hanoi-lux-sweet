<?php
const DBNAME = "duan";
const DBUSER = "root";
const DBPASS = "";
const DBCHARSET = "utf8";
const DBHOST = "127.0.0.1";

// tạo kết nối từ project php sang mysql
function getConnect(){
    $connect = new PDO("mysql:host=" . DBHOST 
                        . ";dbname=" . DBNAME 
                        . ";charset=" . DBCHARSET,
                        DBUSER,
                        DBPASS
            );
    return $connect;
}
function pdo_query($sql){
    // select * from users where email = ? or role_id = ?
    $args = func_get_args();
    $args = array_slice($args, 1);
    
    $conn = getConnect();
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(count($data) > 0){
        return $data;
    }

    return [];

}


function pdo_query_one($sql){
    // select * from users where email = ? or role_id = ?
    $args = func_get_args();
    $args = array_slice($args, 1);
    
    $conn = getConnect();
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(is_array($data) && count($data) > 0){
        return $data;
    }
    return null;

}


function pdo_execute($sql){

    $args = func_get_args();
    $args = array_slice($args, 1);
    
    $conn = getConnect();
    
    $stmt = $conn->prepare($sql);
    $stmt->execute($args);
    $lastId =  $conn->lastInsertId();
    return $lastId;
}
?>