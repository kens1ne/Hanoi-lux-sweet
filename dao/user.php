<?php
    function insert_user($name, $user, $pass)
    {
        $sql = "insert into user(name, username, password) value('$name', '$user', '$pass')";
        pdo_execute($sql);
    }

    function check_user($user, $pass) {
        $sql =  "select * from user where username='" . $user . "' and password='" . $pass . "'";
        $user = pdo_query_one($sql);
        return $user;

    }

?>