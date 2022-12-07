<?php
function room_list(){
    $query = "SELECT rooms.*, category.name as category_name, GROUP_CONCAT(storage_room.image) AS image FROM rooms 
    INNER JOIN storage_room ON rooms.id = storage_room.id_room 
    INNER JOIN category ON rooms.id_cate=category.id GROUP BY storage_room.id_room";
    return pdo_query($query);
}