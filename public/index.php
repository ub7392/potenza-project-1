<html>
<body>
<title>Project 1</title>

<p><body><b>Project 1</b></body></p>
<p> Select a person to find more about </p>

<?php
require "init.php";

$conn = mysql_connect('localhost', 'root', 'root', 'project1');
mysql_select_db('project1');

if (!$conn) {
  die("Connection failed: ".$conn->error);
}
//creates dropdown list of first name and last name
echo '<form action = "" method = "POST">';
echo '<select name = "selecting_person">';
  echo '<option value = " "> '.' ---Please select a person--- '.'</option>';
  $query = mysql_query("SELECT id, first_name, last_name FROM people");
  while($r=mysql_fetch_array($query)){
    echo '<option value= '.$r[id].' >'.$r['first_name']." ".$r['last_name'].'</option>';
  }
echo '</select>';
?>
<input type = 'submit' name = 'submit' value = 'Submit' class = 'button'/>
</form>

<?php

if(isset($_POST['submit'])){
  $id = $_POST['selecting_person'];

  //grabs first name, last name, favorite food
  $result = "SELECT
              first_name,
              last_name,
              favorite_food
            FROM people
            WHERE id = '".$id."' ";

  //grabs state name
  $result2 = "SELECT
            states.state_name
            FROM people
            INNER JOIN visits ON visits.person_id = people.id
            INNER JOIN states ON states.id = visits.state_id
            WHERE people.id = '".$id."' ";

  $find = mysql_query($result);
  $find2 = mysql_query($result2);
  $row = mysql_fetch_array($find);

//displays selected person
  echo "<table border = '1'>
  <tr>
  <th>   Person Selected:   </th>
  </tr>";

  echo "<tr>";
  echo "<td>".$row['first_name']." ".$row['last_name']."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br>";

//displays favorite food
  echo "<table border = '1'>
  <tr>
  <th>   Favorite Food:   </th>
  </tr>";

  echo "<tr>";
  echo "<td>".$row['favorite_food']."</td>";
  echo "</tr>";
  echo "</table>";
  echo "<br>";

//displays states visited
  echo "<table border = '1'>
  <tr>
  <th>   State(s) Visited:   </th>
  </tr>";

//outputs the information wanted in the table
  while($row2 = mysql_fetch_array($find2))
  {
    echo "<tr>";
    echo "<td>".$row2['state_name']."</td>";
    echo "</tr>";
  }
  echo "</table>";
}
?>

<p> If you would like to add a new person or to add a new visit, press the button below</p>
<p>
<form action = 'add.people.php' method = 'POST'>
  <input type = 'submit' value = 'Add person/visit' class = 'button'/>
</form></p>


</body>
</html>
