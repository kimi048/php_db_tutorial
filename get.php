<?
include "db.php";
$query = "SELECT * FROM users";
$result = mysqli_query($DB, $query);



// print_r($row);
?>
<html>
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/skeleton/2.0.4/skeleton.css">
  </head>
  <body>
    <?
      // while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
      while($row = mysqli_fetch_assoc($result)){
        // print_r($row);
    ?>
    <div class="row">
      <div class="six columns">
        <div>id: <?= $row["id"]; ?></div>
        <div>Email: <?= $row["user_email"]; ?></div>
        <div>Password: <?= $row["user_password"]; ?></div>
      </div>
    </div>
    <br/>
    <?
      }
    ?>
  </body>
</html>