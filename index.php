<?

$serverName = "localhost";
$serverUsername = "root";
$serverPassword = "";

// echo "db-basics";
if(isset($_POST["user_email"]) && isset($_POST["user_password"])){
  if(!empty($_POST["user_email"]) && !empty($_POST["user_password"])){
    // echo "user";
    $email = $_POST["user_email"];
    $password = $_POST["user_password"];

    // echo $email."<br>";
    // echo $password."<br>";

    //initial way
    // $DB = mysqli_connect($serverName, $serverUsername, $serverPassword);
    // if(!$DB){
    //   die("Failed".mysqli_connect_error());
    // }else{
    //   echo "success!!";
    // }
    // mysqli_close($DB);

    //oop way
    $DB = new mysqli($serverName, $serverUsername, $serverPassword);
    if($DB->connect_error){
      die("Failed".$DB->connect_error);
    }else{
      echo "success!!";
    }

  }
}

?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
  </head>
  <body>
    <form method="POST">
      <div class="row">
        <div class="twelve columns">
          <label for="email">Email</label>
          <input type="text" placeholder="Enter your email" name="user_email">
        </div>
      </div>
      <div class="row">
        <div class="twelve columns">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter your password" name="user_password">
        </div>
      </div>
      <input type="submit" class="button-primary" value="submit">
    </form>
  </body>
</html>