<?
include "db.php";

$username = "";
$password = "";
$userid = "";
$user = false;

if(isset($_GET["user_id"]) && !empty($_GET["user_id"])){
  $user_id = $_GET["user_id"];
  $findUserQuery = "SELECT * FROM users WHERE id = '$user_id'";
  $result = mysqli_query($DB, $findUserQuery);
  $row = mysqli_fetch_assoc($result);
  print_r($row);
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
  </body>
</html>