<?php

$stock = intval($_GET['stock']);
$dbhost = 'todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com'; // Your MySQL database hostname on Amazon EC2 (Should be same as mine unless you changed it)
$dbuser = 'aaauto'; // Your MySQL database username on Amazon EC2 (Should be same as mine unless you changed it)
$dbpass = 'Sawsan.123'; // Your MySQL database password on Amazon EC2 (Remember this otherwise you will not be able to access your database)
$dbname = 'todo'; //The name of your MySQL database (Should be same as mine unless you changed it


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$query = "SELECT * FROM job where stock = $stock ORDER BY date_added";
$result = $mysqli->query($query);;

while($row = $result->fetch_assoc()){
    print"
    <tr>
      <td width='40%' > ".$row['description']."</td>
      <th width='30%'>";
  
      if ($row['part_ordered'] == true){
        print $row['part_cost']."   <input type='checkbox' checked onclick='return false'>";
      }
      else{
        print"<form action='part.php' method='post'>
          <input type='text'class='form-control' placeholder='part cost'>
          <input type='submit'class=\"btn btn-success\" value='submit'>
        </form>";
      }
      print" </th>
        <th width='30%'>
          <form action='jobdone.php' method='post'>
            <input type='text' class='form-control' name = 'cost' placeholder='labor cost'>
            <input type='hidden' name ='id' value=".$row['id'].">
            <input type='submit'class=\"btn btn-success\" value='submit'>
          </form>
        </th>
      </tr>";
}
        

// Close the result set
$result->close();
// Close the database connection
$mysqli->close();
?>