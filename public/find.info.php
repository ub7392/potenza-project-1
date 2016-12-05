
<p><body><b>Information</b></body></p>

<?php

$conn = mysql_connect("localhost", "root", "root", "project1");

if (!$conn) {
  die("Connection failed: ".$conn->error);
}
//grabs first name, last name, favorite food, and the state they have visited
$result = "SELECT
            people.first_name,
            people.last_name,
            people.favorite_food,
            states.state_name
          FROM people
          INNER JOIN visits ON visits.person_id = people.id
          INNER JOIN states ON state.id = visits.state_id";

echo "<table border = '1'>
<tr>
<th> First Name </th>
<th> Last Name </th>
<th> Favorite Food </th>
<th> States Visited </th>
</tr>";

while($row = mysql_fetch_array($result))
{
  echo "<tr>";
  echo "<td>".$row['first_name']."</td>";
  echo "<td>".$row['last_name']."</td>";
  echo "<td>".$row['favorite_food']."</td>";
  echo "<td>".$row['state_name']."</td>";
  echo "</tr>";
}
echo "</table>";
?>


<p>
<form action = 'add.visit.php' method = 'post'>
  <input type = 'submit' value = 'Add a new state' class = 'button'/>
</form>
</p>

<p>
<form action = 'index.php' method = 'post'>
  <input type = 'submit' value = 'Return to Index page' class = 'button'/>
</form>
</p>
