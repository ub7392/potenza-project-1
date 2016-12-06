<p><body><b>Add a State</b></body></p>

<?php
$conn = mysql_connect("localhost", "root", "root", "project1");

if (!$conn) {
  die("Connection failed: ".$conn->error);
}

//drop down to select name to add a visit to
echo '<form action = "" method = "POST">';

echo '<select name = "selecting person">';
  echo '<option value = " "> '.' ---Please select a person--- '.'</option>';
  $query = mysql_query("SELECT * FROM people");
  while($r=mysql_fetch_array($query)){
    echo '<option value='.$r['first_name'].' '.$r['last_name'].'</option>';
  }
echo '</select>';

//drop down to select the list of states available to choose from
echo '<select name = "selecting state">';
  echo '<option value = " "> '.' ---Please select a state--- '.'</option>';
  $query1 = mysql_query("SELECT * FROM states");
  while($row=mysql_fetch_array($query1)){
    echo '<option value>'.$row['state_name'].'</option>';
  }
?>


<input type = 'submit' value = 'Submit' class = 'button' name='submit'/>
</select>
</form>

<?php
//taking in the info from the drop down list
$first_name = $_POST['firstname'];
$last_name =  $_POST['lastname'];
$favorite_food = $_POST['favoritefood'];
$state_name = $_POST['statename'];

//grabbing personid from people table depending on first and last name
$personid = "SELECT
              people.id
              FROM people
              WHERE people.first_name=$first_name && people.last_name=$last_name";

$person_id = mysql_query($personid);

//grabbing statesid from states table depending on the state name chosen
$stateid ="SELECT
            states.id
            FROM states
            WHERE states.state_name=$state";

$state_id = mysql_query($stateid);

//inserts into visits table
$sql = "INSERT INTO visits
        (id, person_id, state_id)
        VALUES(NULL, '$person_id', '$state_id')";

if (isset($_POST['submit'])){
if(mysql_query($sql))
{
  echo("State added!");
}else{
  echo("Error adding state: ".mysql_error());
}}
?>

<p>
<form action = 'index.php' method = 'post'>
  <input type = 'submit' value = 'Return to Index page' class = 'button'/>
</form>
</p>
