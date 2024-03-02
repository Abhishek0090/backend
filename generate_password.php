<?php
    $pwd = "bluepen52";
    var_dump($pwd);
    $hash = password_hash($pwd, PASSWORD_DEFAULT);
    var_dump($hash);
?>