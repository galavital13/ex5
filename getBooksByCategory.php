<?php
include "config.php";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}
$category = isset($_GET['category']) ? $_GET['category'] : '';
$sql = "SELECT id, name, author, img_url FROM tbl_12_books";
if ($category != '') {
    $sql .= " WHERE category = '$category'";
}
$result = $connection->query($sql);
$books = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $books[] = $row;
    }
}
echo json_encode(array('books' => $books));
$connection->close();
?>
