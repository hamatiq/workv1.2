<?php

$q = intval($_GET['q']);
$dbhost = 'todo2.cjdks7jqac0y.us-east-2.rds.amazonaws.com'; // Your MySQL database hostname on Amazon EC2 (Should be same as mine unless you changed it)
$dbuser = 'aaauto'; // Your MySQL database username on Amazon EC2 (Should be same as mine unless you changed it)
$dbpass = 'Sawsan.123'; // Your MySQL database password on Amazon EC2 (Remember this otherwise you will not be able to access your database)
$dbname = 'todo'; //The name of your MySQL database (Should be same as mine unless you changed it


$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}

$orderby = '';
if ($q == 4){
    $orderby = '(initial_cost+expenses) ASC';
}
if ($q == 3){
    $orderby = 'make ASC';
}
else if ($q == 2){
    $orderby = 'year ASC';
}
else{
    $orderby = 'stock ASC';
}


$query = "SELECT * FROM car ORDER BY $orderby";
$result = $mysqli->query($query);
while($row = $result->fetch_assoc()){
    // print_r($row);
    $cost = $row['expences']+$row['cost'];
    print"<tr>
    <td width='7.33%'> ".$row['stock']."</td>
    <td width='7.33%'>".$row['year']."</td>
    <td width='8.33%'>".$row['make']."</td>
    <td width='10.33%'>".$row['model']."</td>
    <td width='6.33%'>".$row['color']."</td>
    <td width='7.33%'>".$row['milage']."</td>
    <td width='8.33%'>".$cost."</td>
    <td width='16.7%'>".$row['vin']."</td>
    ";
    $date = strtotime($row['inspection']);
    $month2 = $date - strtotime('-2 month');

    if (($date - strtotime('-2 month'))>0){
        print" <td width='10.33%'>".date("m/j/y",$date)."</td>";
    }
    else {
        print" <td width='10.33%'><form action='updateins.php'>
        <input style='font-size:12px; width:120px;' placeholder='".date("m/j/y",$date)."' type='text' onfocus=\"(this.type='date')(this.placeholder='')\" onblur=\"(this.type='text')\" onchange=\"this.form.submit()\" id='date'>
        <input type='hidden' name='stock' value=".$row['stock'].">
    </form></td>";
    }
    if ($row['title'] == true){
        print" <td width='6.33%'><input type='checkbox' checked onclick='return false'></td>";
    }
    else {
        print"<td width='6.33%'><form action='updatetitle.php'>
        <input type='checkbox' onchange='this.form.submit()'>
        <input type='hidden' name='stock' value=".$row['stock'].">
        </form>
        </td>";
    }if ($row['pictures'] == true){
        print" <td width='4.165%'><input type='checkbox' checked onclick='return false'></td>";
    }
    else {
        print" <td width='4.165%'><form action='updatepic.php'>
        <input type='checkbox' onchange='this.form.submit()'>
        <input type='hidden' name='stock' value=".$row['stock'].">
        </form></td>";
    }
    print"<th width='3%' onclick='showjobs(this)'><button type=\"button\" class=\"btn btn-outline-info\">&#x21CA;</button></th>
    </tr>";
}
// Close the result set
$result->close();
// Close the database connection
$mysqli->close();
?>