<?php
//ket noi csdl
$host = DB_HOST;
$port = DB_PORT;
$dbname = DB_NAME;
$username = DB_USERNAME;
$password = DB_PASSWORD;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // cai dat che do tra ve du lieu
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $err) {
    debug("Connected failed: " . $err->getMessage());
}
