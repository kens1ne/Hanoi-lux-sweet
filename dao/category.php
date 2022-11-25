<?php
// function category_remove_by_id($cate_id){
//     $query = "delete from categories where id = ?";
//     pdo_execute($query, $cate_id);
// }
//Thêm danh mục
function insert_cate($name, $description) {
    $sql = "INSERT INTO category(name , description) values('$name',' $description')"; // Viết câu lệnh sql
    pdo_execute($sql); //Thực thi câu lệnh sql
}
//Xóa danh mục
function delete_cate($id) {
    $sql="DELETE FROM category WHERE id=".$id;
    pdo_execute($sql);
}
//Load danh sách
function loadall() {
    $sql="SELECT * FROM category";
    $listcate=pdo_query($sql);
    return $listcate;
}
//Sửa danh mục
function loadone($id) {
    $sql="select * from category where id=".$id;
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_cate($id, $name, $description) {
    $sql = "update category set name='".$name."',description=' ". $description." ' where id=".$id;
    pdo_execute($sql);
}
?>