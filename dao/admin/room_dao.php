<?php
function room_list(){
    $query = "SELECT rooms.*, category.name as category_name, GROUP_CONCAT(storage_room.image) AS image FROM rooms 
    INNER JOIN storage_room ON rooms.id = storage_room.id_room 
    INNER JOIN category ON rooms.id_cate=category.id 
    GROUP BY storage_room.id_room";
    return pdo_query($query);
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