<?php
include "config.php";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Book Store</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Gal's books store</h1>
    <select id="category-select" onchange="updateBookList(this.value)">
        <option value="">All Books</option>
    </select>
    <div id="book-list">
    </div>
    <?php
        $connection->close();
    ?>  
    <script src="js/script.js"></script>
</body>
</html>
