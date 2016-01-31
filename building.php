<html>
<head>
</head>
<body>
<?php
$dbc = mysqli_connect("localhost","root","", "apartments");
if (!$dbc){
die("Can not connect: " . mysql_error());
}


if(isset($_POST['update'])){
$UpdateQuery = "UPDATE building SET address='$_POST[address]', 
community_features='$_POST[community_features]', price_of_utilities='$_POST[price_of_utilities]'
WHERE address='$_POST[hidden]'";               
$result = mysqli_query($dbc, $UpdateQuery);
		if($result){
			echo 'Building Updated';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM building WHERE address='$_POST[hidden]'";          
$result = mysqli_query($dbc, $DeleteQuery);
		if($result){
			echo 'Building Deleted';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['add'])){
$data_missing = array();
    if(empty($_POST['uaddress'])){
        $data_missing[] = 'Address';
    } 
    if(empty($_POST['uprice_of_utilities'])){
        $data_missing[] = 'Price of Utilities';
    } 
    if(empty($data_missing)){
        $AddQuery = "INSERT INTO building (address, community_features, price_of_utilities) VALUES 
					('$_POST[uaddress]','$_POST[ucommunity_features]','$_POST[uprice_of_utilities]')";         
		$result = mysqli_query($dbc, $AddQuery);
		if($result){
			echo 'Building Entered';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
    } else {
        echo 'You need to enter the following data<br />';
        foreach($data_missing as $missing){
            echo "$missing<br />";
        }
    }
};



$sql = "SELECT * FROM building";
$myData = mysqli_query($dbc, $sql);
echo "<table border=1>
<tr>
<th>Address</th>
<th>Community Features</th>
<th>Price Of Utilities</th>
</tr>";

while($record = mysqli_fetch_array($myData)){
echo "<form action=building.php method=post>";
echo "<tr >";
echo "<td >" . "<input type=text name=address size=50 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=text name=community_features size=40 value='" . $record['community_features'] . "' </td>";
echo "<td>" . "<input type=text name=price_of_utilities value='" . $record['price_of_utilities'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden size=0 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "<form action=building.php method=post>";
echo "<tr>";
echo "<td><input type=text size=50 name=uaddress></td>";
echo "<td><input type=text size=40 name=ucommunity_features></td>";
echo "<td><input type=text name=uprice_of_utilities></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
mysqli_close($dbc);

?>

</body>
</html>