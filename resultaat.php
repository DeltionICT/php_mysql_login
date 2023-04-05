<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "mijndb";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)) {
   $users[] = [
      'password' => $row['password'],
      'login' => $row['login']
   ];
}



    // $users = [
    //     [
    //         "password" => "123",
    //         "login" => "jan"
    //     ],
    //     [
    //         "password" => "456",
    //         "login" => "kees"
    //     ],
    //     [
    //         "password" => "789",
    //         "login" => "truus"
    //     ]
    // ];
 
  $toegang = false;

  foreach($users as $user) {
    if($_POST['pass'] == $user['password'] && $_POST['login'] == $user['login']) {
            $toegang = true;
      }
  }

  if($toegang) {
    echo "Yes, je mag binnen";
  } else {
    header("Location: index.php");
  }
