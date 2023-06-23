<?php
include "config.php";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if(mysqli_connect_errno()) {
    die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
    );
}
$book_id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');
$sql = "SELECT * FROM tbl_12_books WHERE id = $book_id LIMIT 0,1";
$result = $connection->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Books</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<h1>Gal's books store</h1>
    <div id="book-details">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='book-details'>";
                echo "<img src='" . $row["img_url"] . "' alt='" . $row["name"] . "'>";
                echo "<h2>" . $row["name"] . "</h2>";
                echo "<h3> Author : " . $row["author"] . "</h3>";
                echo "<img src='" . $row["img_url2"] . "' alt='" . $row["name"] . "'>";
                echo "<p>Price: " . $row["price"] . " $</p>";
                echo "<p>Category: " . $row["category"] . "</p>";
                echo "<a id='beck' href='index.php'>Back to Book List</a>";
                echo "</div>";
            }
        } else {
            echo "No book found.";
        }
        $connection->close();
        ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
