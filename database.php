<?php

$dbname = "product_crud";
$dbuser = "root";
$dbpass = "";

$pdo = new PDO("mysql:host=localhost;port=8111;dbname=$dbname",$dbuser,$dbpass);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);