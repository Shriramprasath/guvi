<?php
// Connect to MySQL database
require '../vendor/autoload.php';
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test1';
$conn = mysqli_connect($host, $user, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['name'];
$password = $_POST['pas'];
// Insert data into MySQL table
$sql = "INSERT INTO user (name, password) VALUES ('$name', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "User registered successfully in MySQL database.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


// these are done to insert data into database into mongodb


// 
$client = new MongoDB\Client("mongodb+srv://shriramprasathvu20it:123456@cluster0.0oqdsyr.mongodb.net/?retryWrites=true&w=majority");
$guvidb = $client->selectCollection('db2','guvi');

$user = array(
    'college'=> $_POST['clg'],
    'email'=> $_POST['em'],
    'dob'=> $_POST['dob'],
    'phoneno' => $_POST['ph']
    
);

$guvidb->insertOne($user);


mysqli_close($conn);

?>

