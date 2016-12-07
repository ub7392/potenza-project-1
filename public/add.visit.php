<p><body><b>Add a Visit</b></body></p>

<?php
$conn = mysql_connect("localhost", "root", "root", "project1");
mysql_select_db('project1');

if (!$conn) {
  die("Connection failed: ".$conn->error);
}

//drop down to select name to add a visit to
echo '<form action = "" method = "POST">';

echo '<select name = "selecting_person">';
  echo '<option value = " "> '.' ---Please select a person--- '.'</option>';
  $query = mysql_query("SELECT * FROM people");
  while($r=mysql_fetch_array($query)){
    echo '<option value='.$r[id].'>'.$r['first_name']." ".$r['last_name'].'</option>';
  }
echo '</select>';

//drop down to select the list of states available to choose from
echo '<select name = "selecting_state">';
  echo '<option value = " "> '.' ---Please select a state--- '.'</option>';
  $query1 = mysql_query("SELECT * FROM states");
  while($row=mysql_fetch_array($query1)){
    echo '<option value='.$row[id].'>'.$row['state_name'].'</option>';
  }
?>

<input type = 'submit' value = 'Submit' class = 'button' name='submit'/>
</select>
</form>

<?php
//if the submit button is pressed, it will add the state
if (isset($_POST['submit'])){
  //taking in the info from the drop down list
  $personid = $_POST['selecting_person'];
  $stateid = $_POST['selecting_state'];

  //inserts into visits table
  $sql = "INSERT INTO visits
          (id, person_id, state_id)
          VALUES(NULL, '".$personid."', '".$stateid."')";

  if(mysql_query($sql) == TRUE){
  echo("State added!");
}else{
  echo("Error adding state: ".mysql_error());
}}
?>

<p>
<form action = 'add.people.php' method = 'POST'>
  <input type = 'submit' value = 'Add person' class = 'button'/>
</form></p>

<p>
<form action = 'index.php' method = 'post'>
  <input type = 'submit' value = 'Return to Index page' class = 'button'/>
</form>
</p>
