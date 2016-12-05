<p><body><b>Add a new person</b></body></p>
<form method="post" action= "">
  <p>
    <label>First Name: </label>
    <input type="text" name="firstname" id="firstname">
  </p>
  <p>
    <label>Last Name: </label>
    <input type="text" name="lastname" id="lastname">
  </p>
  <p>
    <label>Favorite food: </label>
    <input type="text" name="favoritefood" id="favoritefood">
  </p>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST['submit']))
{
$conn = mysql_connect("localhost", "root", "root", "project1");

if (!$conn) {
  die("Connection failed: ".$conn->error);
}

$first_name = $_POST['firstname'];
$last_name =  $_POST['lastname'];
$favorite_food = $_POST['favoritefood'];

$sql = "INSERT INTO project1.people
        (id, first_name, last_name, favorite_food)
        VALUES(NULL, $first_name, $last_name, $favorite_food)";
mysql_query($sql);
}
?>

<form action = 'index.php' method = 'post'>
<input type = 'submit' value = 'Go back to Index page' class = 'button'/>
</form>
