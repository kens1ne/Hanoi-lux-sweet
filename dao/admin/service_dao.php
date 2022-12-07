<?php
// hàm thêm mới dịch vụ vào bảng loại phòng trong databasse
function insert_service($name, $description,$image,$price)
{
    $sql = "insert into service_list(name, description,image, price)
    value('$name','$description','$image' ,'$price')";
    pdo_execute($sql);
}
// hàm xóa 
function delete_service($id)
{
    $sql = "delete from service_list where id=" . $id;
    pdo_execute($sql);
}
// hàm loadall
function service_list()
{        
    $sql="SELECT * FROM service_list";
    $listservice=pdo_query($sql);
    return $listservice;
}
// hàm load một sản phẩm trong danh sách phòng trong database
function loadOne_service($id)
{
    $sql = "select * from service_list where id=" . $id;
    $service = pdo_query_one($sql);
    return $service;
}
// hàm update một sản phẩm trong danh sách hàng hóa trong database
function  update_service($id,$name, $description,$image,$price)
{    
    $sql = "update service_list set name=?, description=?,image=?,price= ?where id=?";
    pdo_execute($sql,$name,$description,$image,$price,$id);
}
?>