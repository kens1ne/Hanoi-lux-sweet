<?php
function room_list(){
    $query = "SELECT rooms.*, category.name as category_name, GROUP_CONCAT(storage_room.image) AS image FROM rooms 
    INNER JOIN storage_room ON rooms.id = storage_room.id_room 
    INNER JOIN category ON rooms.id_cate=category.id 
    WHERE rooms.status < 3
    GROUP BY storage_room.id_room";
    return pdo_query($query);
}
function room_info($id){
    $query = "SELECT rooms.*, category.name as category_name, GROUP_CONCAT(storage_room.image) AS image FROM rooms 
    INNER JOIN storage_room ON rooms.id = storage_room.id_room 
    INNER JOIN category ON rooms.id_cate=category.id 
    WHERE rooms.id = $id
    GROUP BY storage_room.id_room";
    return pdo_query_one($query);
}
function insert_room($name, $price, $description, $address, $quantity, $category){
    $sql = "INSERT INTO `rooms`(`name`, `price`, `description`, `address`, `quantity_people`, `status`, `id_cate`) 
    VALUES ('$name', '$price', '$description', '$address', '$quantity', 1, $category)";
    return pdo_execute($sql);
}
function insert_service_room($id_service, $id_room) {
    $sql = "INSERT INTO `service`(`id_service`, `id_room`) VALUES ($id_service, $id_room)";
    return pdo_execute($sql);
}
function insert_image($id_room, $image) {
    $sql = "INSERT INTO `storage_room`(`id_room`, `image`) VALUES ($id_room, '$image')";
    return pdo_execute($sql);
}
function remove_image($id_room) {
    $sql = "DELETE FROM `storage_room` WHERE `id_room`=$id_room";
    return pdo_execute($sql);
}
function update_room($id_room, $name, $price, $description, $address, $quantity, $category, $status){
    $sql = "UPDATE `rooms` SET 
    `name`='$name',
    `price`=$price,
    `description`='$description',
    `address`='$address',
    `quantity_people`=$quantity,
    `status`=$status,
    `id_cate`=$category 
    WHERE `id`=$id_room";
    return pdo_execute($sql);
}
function delete_room($id_room){
    $sql = "UPDATE `rooms` SET `status`= 3 WHERE `id`=$id_room";
    return pdo_execute($sql);
}
function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;

    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }

    closedir($dir_handle);
    rmdir($dirname);
    return true;
}