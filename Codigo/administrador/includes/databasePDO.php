<?php
include "";

function connect() {
    $hostname = '192.168.1.64';
    $name = 'test';
    $user = 'debianDB';
    $password = 'debianDB';
    return new PDO('mysql:host='.$hostname.';dbname='.$name, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}

?>