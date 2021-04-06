<?php

require_once './app/Connection.php';

function home_base_url(){   

$base_url = (isset($_SERVER['HTTPS']) &&
$_SERVER['HTTPS']!='off') ? 'https://' : 'http://';
$tmpURL = dirname(__FILE__);
$tmpURL = str_replace(chr(92),'/',$tmpURL);
$tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
$tmpURL = ltrim($tmpURL,'/');
$tmpURL = rtrim($tmpURL, '/');
return $_SERVER['DOCUMENT_ROOT']."/menu2"; 
}
 
function DB() {
        try {            
            $conn = new PDO("mysql:host=".connect::$connect["host"].";dbname=".connect::$connect["database"]."",connect::$connect["user"],connect::$connect["password"]);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (PDOException $e) {
            echo "Connection failed: ".$e->getMessage();
        }
}


