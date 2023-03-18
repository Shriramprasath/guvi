
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="test1";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }
// else echo"Success shri";
$name=$_POST['name'];
$pass=$_POST['pas']; 
// $sql="SELECT * from user WHERE name='$username' and password='$password'";
// $ans=mysqli_query($conn,$sql);
// $count=mysqli_num_rows($ans);
// if($count ==1){
//   echo "Your login credentials are successful";
// }
// else{
//   echo "Try again with proper credentials";
// }
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

  $client = new MongoDB\Client("mongodb+srv://shriramprasathvu20it:123456@cluster0.0oqdsyr.mongodb.net/?retryWrites=true&w=majority");
  $collection = $client->guvi->user;
  $search = $collection->find([
      'name'=>$name
  ]);
  $data = array(); 
  foreach ($search as $document) {
      $data[] = $document;
  }
  $json =  json_encode($data);
}
exit;
$conn->close();
?> 