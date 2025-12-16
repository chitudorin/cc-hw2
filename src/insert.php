<?php

$servername = getenv("DBSERVER");
$username = getenv("DBUSER");
$password = getenv("DBPASS");
$dbname = getenv("DBNAME");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}


$item = mysqli_real_escape_string($conn, $_POST['item']);


$sql = "INSERT INTO items (name) 
        VALUES ('$item')";
if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
