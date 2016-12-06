<html>
<body>
<title>Project 1</title>
<?php
  require "init.php";

  $conn = mysql_connect('localhost', 'root', 'root', 'project1');

  if (!$conn) {
    die("Connection failed: ".$conn->error);
  }

?>

<p><body><b>Project 1</b></body></p>
<p> Select a person to find more about </p>

<?php
//creates dropdown list of first name and last name
echo '<form action = "find.info.php" method = "POST">';
echo '<select name = "person select">';
echo '<option value = " "> '.' ---Please select--- '.'</option>';

$query = mysql_query("SELECT id, first_name, last_name FROM 'people'");
while($r=mysql_fetch_array($query, $conn)){
  echo '<option value=' .$r['first_name']. ' ' .$r['last_name']. '</option>';
}
?>
<input type = 'submit' value = 'Submit' class = 'button'/>
</select>
</form>


<p> If you would like to add a new person or to add a new visit, press the button below</p>
<p>
<form action = 'add.people.php' method = 'POST'>
  <input type = 'submit' value = 'Add person/visit' class = 'button'/>
</form></p>


</body>
</html>
