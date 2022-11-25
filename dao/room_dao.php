<?php

function rooms_list(){
    $query = "SELECT rooms.*, GROUP_CONCAT(storage_room.image) AS image FROM rooms INNER JOIN storage_room ON rooms.id = storage_room.id_room GROUP BY storage_room.id_room";
    return pdo_query($query);
}


?>