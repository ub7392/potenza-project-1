<p><body><b>Add a New Person</b></body></p>
<form method="post" action= "">
  <p>
    <label>First Name: </label>
    <input type="text" name="firstname">
  </p>
  <p>
    <label>Last Name: </label>
    <input type="text" name="lastname">
  </p>
  <p>
    <label>Favorite food: </label>
    <input type="text" name="favoritefood">
  </p>
  <input type="submit" name="submit" value="Submit">
</form>

<?php
$conn = mysql_connect('localhost', 'root', 'root', 'project1');
mysql_select_db('project1');

if (!$conn) {
  die("Connection failed: ".$conn->error);
}

//takes in the input from the form
$first_name = $_POST['firstname'];
$last_name =  $_POST['lastname'];
$favorite_food = $_POST['favoritefood'];

//inserts into the people table
$sql = "INSERT INTO people
        (id, first_name, last_name, favorite_food)
        VALUES(NULL, '$first_name', '$last_name', '$favorite_food')";

if (isset($_POST['submit'])){
  if(mysql_query($sql)){
      echo("Person added added!");
  }else{
      echo("Error adding state: ".mysql_error());
  }
}
?>

<p>
<form action = 'add.visit.php' method = 'post'>
  <input type = 'submit' value = 'Add a visit' class = 'button'/>
</form>
</p>

<p>
<form action = 'index.php' method = 'post'>
<input type = 'submit' value = 'Go back to Index page' class = 'button'/>
</form>
</p>
