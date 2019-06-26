<?php
$dbhost = 'todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com'; // Your MySQL database hostname on Amazon EC2 (Should be same as mine unless you changed it)
$dbuser = 'aaauto'; // Your MySQL database username on Amazon EC2 (Should be same as mine unless you changed it)
$dbpass = 'Sawsan.123'; // Your MySQL database password on Amazon EC2 (Remember this otherwise you will not be able to access your database)
$dbname = 'todo'; //The name of your MySQL database (Should be same as mine unless you changed it


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
else{
    $query = "SELECT * FROM job where id = ".$_POST['id'];
    // print $query."<br>";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    // print_r ($row);  

    $cost = $row['part_cost']+$_POST['cost'];
    $query = "insert into job_done (id,stock,description,cost,date_finished)
    VALUES(".$row['id'].",".$row['stock'].",\"".$row['description']."\",$cost, NOW());";

    $result = $mysqli->query($query);
    

    $query = "delete FROM job where id = ".$_POST['id'];
    $result = $mysqli->query($query);

    print $result;
    // print $query;

    // Close the database connection;
    $mysqli->close();

    header("Location: index.php");
}


?>