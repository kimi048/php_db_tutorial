<?
include "db.php";

$email = "";
$password = "";
$userid = "";
$user = false;

if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
  $user_id = $_GET["user_id"];
  $findUserQuery = "SELECT * FROM users WHERE id = '$user_id'";
  $result = mysqli_query($DB, $findUserQuery);
  $row = mysqli_fetch_assoc($result);
  // print_r($row);
  $email = $row["user_email"];
  $password = $row["user_password"];
  $userid = $row["id"];
  if($email && $password){
    $user = true;
  }else{
    $user = false;
  }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $email = $_POST["user_email"];
  $password = $_POST["user_password"];
  $id = $_POST["id"];

  $query = "UPDATE users SET ";
  $query .= "user_email = '$email', ";
  $query .= "user_password = '$password' ";
  $query .= "WHERE id = $id";

  $result = mysqli_query($DB, $query);
  if(!$result){
    die("FAILS REQUEST ".mysqli_error($DB));
  }else{
    echo "SUCCESS";
  }

}

function getUsersId(){
  global $DB;
    $query = "SELECT * FROM users";
    $result = mysqli_query($DB, $query);
    while($row = mysqli_fetch_assoc($result)){
      echo '<option value="'.$row['id'].'">'.$row["id"].'</option>';
    }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
  </head>
  <body>
    <form method="GET">
      <div class="row">
        <div class="twelve columns">
          <select name="user_id">
            <option disable selected>Select a user</option>
            <? getUsersId(); ?>
          </select>
          
        </div>
      </div>
      
      <input type="submit" class="button-primary" value="submit">
    </form>
    <?php if($user){ ?>
    <form method="POST">
      <div class="row">
        <div class="twelve columns">
          <label for="email">Email</label>
          <input type="text" placeholder="Enter your email" name="user_email" value="<?= $email; ?>">
        </div>
      </div>
      <div class="row">
        <div class="twelve columns">
          <label for="password">Password</label>
          <input type="password" placeholder="Enter your password" name="user_password" value="<?= $password; ?>">
        </div>
      </div>
      <input type="hidden" name="id" value="<?= $userid; ?>">
      <input type="submit" class="button-primary" value="submit">
    </form>
    <?php } ?>
  </body>
</html>