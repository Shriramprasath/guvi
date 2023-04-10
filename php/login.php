<?php
require '../vendor/autoload.php';// it is used for loading the reddis library
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
// $name=$_POST['name'];
// $pass=$_POST['pas']; 
// $sql="SELECT * from user WHERE name='$username' and password='$password'";
// $ans=mysqli_query($conn,$sql);
// $count=mysqli_num_rows($ans);
// if($count ==1){
//   echo "Your login credentials are successful";
// }
// else{
//   echo "Try again with proper credentials";
// }
// if ($_SERVER['REQUEST_METHOD'] == 'GET') {

//   $client = new MongoDB\Client("mongodb+srv://shriramprasathvu20it:123456@cluster0.0oqdsyr.mongodb.net/?retryWrites=true&w=majority");
//   $collection = $client->guvi->user;
//   $search = $collection->find([
//       'name'=>$name
//   ]);
//   $data = array(); 
//   foreach ($search as $document) {
//       $data[] = $document;
//   }
//   $json =  json_encode($data);
// }
// exit;
if(isset($_POST['name']) && isset($_POST['pas']))
{

  $name1 = $_POST['name'];
  $pass = $_POST['pas'];

  if(empty($name1))
  {
          header("Location: login.php?error=username is required");
          exit();
  }// if there is no detail in the variable
  else if(empty($pas))
  {
      header("Location: login.php?error=password is required");
      exit();
  }
  else
  {
      $sql = "SELECT * FROM user WHERE name='$name1' AND password='$pass'";
      $result = mysqli_query($conn, $sql);
      $redis = new Predis\Client();// connecting to reddis and used with php so called as predis-a flexible and feature-complete Redis client library 
      $tempdata = $redis->get($name);
     
      if(mysqli_num_rows($result)===1)
      {
          $row = mysqli_fetch_assoc($result);
          if($row['name']===$name1 && $row['password']===$pass)
          {
             
              echo 'You are a verifed user and you have been logged in';
              while($row=$result->fetch_assoc()){
                $t=$row['name'].''.$row['password'].'<br/>';
              }
              $redis->set('data',json_encode($t));
              $res=[
                "msg"=>"successful",
                "status"=>"200",
                "user"=>$result,

              ];
              exit(); 
          }
          else
          {
              echo 'No, you are not a verifed user and you have not logged in';
              // header("Location: login.html?error=incorrect username or password");
          exit();
          }
      }
      else
      {
          echo 'No Results found';
          // header("Location: login.html?error=incorrect username or password");
      exit();
      }
  }
}
else
{
  header("Location: login.html");
  exit();
} 
$conn->close();
?> 
