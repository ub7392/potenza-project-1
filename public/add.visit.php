<?php
$conn = mysql_connect("localhost", "root", "root", "project1");

if (!$conn) {
  die("Connection failed: ".$conn->error);
}?>

<p><body><b>Add a new state</b></body></p>
<form method="post" action="">
  <p>
    <label for="state_name">New state to add: </label>
    <input type="text" name="state_name">
  </p>
  <input type="submit" name="submit" value="Submit">
</form>



<form action = 'index.php' method = 'post'>
  <input type = 'submit' value = 'Return to Index page' class = 'button'/>
</form>
<?php

//need people id to add to visits table for specific person
//takes in submitted state and uses states table to look for state id
  /*if($_POST)
  {
    $conn = mysqli_connect("localhost", "root", "root");
    $database=project1;
    $use = "USE ".$database;
    mysqli_query($use);

    if (!$conn) {
      die("Connection failed: ".mysql_error());
    }

    $first_name = mysqli_real_escape_string($_Post, ['first_name']);
    $last_name = mysqli_real_escape_string($_Post, ['last_name']);
    $state = mysqli_real_escape_string($_Post, ['state']);

    $person_id = "SELECT
                  people.id
                  FROM people
                  WHERE people.first_name=$first_name && people.last_name=$last_name;";
    $state_id ="SELECT
                  states.id
                  FROM states
                  WHERE states.state_name=$state;";

    $query = "
    INSERT INTO visits
      (id, person_id, state_id)
      values(NULL, '$person_id', '$state_id');";

      if(mysqli_query($query)){
        echo "Records added successfully!;";
      }else{
        echo "Error: ".mysql_error();
      }*/
?>
