<?php
// Set header type konten.
header("Content-Type: application/json; charset=UTF-8");

// Deklarasi variable keyword buah.
$kata_kunci = $_GET["kata_kunci"];

include_once 'dbconfig.php';
// Query ke database.


$query = "SELECT * FROM company WHERE kata_kunci LIKE '%$kata_kunci%' ORDER BY kata_kunci DESC";
            $crud->auto($query);


?>