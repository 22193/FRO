<?php

  ini_set('display_errors', 1);
  error_reporting(E_ALL ^ E_NOTICE);

?>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = strval($_GET['q']);// q wordt vanaf de cliet aan php gegeven

$con = mysqli_connect('localhost','root','root','22193_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"w3c_ajax_demo");
//$sql="SELECT * FROM w3c_ajax_demo WHERE FirstName = '".$q."'";

$sql="SELECT * FROM w3c_ajax_demo WHERE FirstName LIKE '$q%' OR LastName LIKE '$q%' OR Hometown LIKE '$q%' OR Job LIKE '$q%'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>
<th>Job</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['FirstName'] . "</td>";
    echo "<td>" . $row['LastName'] . "</td>";
    echo "<td>" . $row['Age'] . "</td>";
    echo "<td>" . $row['Hometown'] . "</td>";
    echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>
