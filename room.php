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
$UpdateQuery = "UPDATE rooms SET address='$_POST[address]', 
sub_address='$_POST[sub_address]', tenant_name='$_POST[tenant_name]', 
features='$_POST[features]', type='$_POST[type]'
WHERE address='$_POST[hidden1]' AND sub_address='$_POST[hidden2]' 
AND tenant_name='$_POST[hidden3]' AND type='$_POST[hidden4]'";               
$result = mysqli_query($dbc, $UpdateQuery);
		if($result){
			echo 'Room Updated';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM rooms WHERE address='$_POST[hidden1]' AND sub_address='$_POST[hidden2]' 
AND tenant_name='$_POST[hidden3]' AND type='$_POST[hidden4]'";         
$result = mysqli_query($dbc, $DeleteQuery);
		if($result){
			echo 'Room Deleted';
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
    if(empty($_POST['usub_address'])){
        $data_missing[] = 'Sub Address';
    } 
	if(empty($_POST['utype'])){
        $data_missing[] = 'Type';
    } 
    if(empty($data_missing)){
        $AddQuery = "INSERT INTO rooms (address, sub_address, tenant_name, features, type) VALUES 
					('$_POST[uaddress]','$_POST[usub_address]','$_POST[utenant_name]', '$_POST[ufeatures]', '$_POST[utype]')";   
		$result = mysqli_query($dbc, $AddQuery);
		if($result){
			echo 'Room Entered';
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



$sql = "SELECT * FROM rooms";
$myData = mysqli_query($dbc, $sql);
echo "<table border=1>
<tr>
<th>Type</th>
<th>Features</th>
<th>Address</th>
<th>Sub Address</th>
<th>Tenant Name</th>
</tr>";

while($record = mysqli_fetch_array($myData)){
echo "<form action=room.php method=post>";
echo "<tr >";
echo "<td>" . "<input type=text name=type value='" . $record['type'] . "' </td>";
echo "<td>" . "<input type=text name=features size=50 value='" . $record['features'] . "' </td>";
echo "<td >" . "<input type=text name=address size=50 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=text name=sub_address value='" . $record['sub_address'] . "' </td>";
echo "<td>" . "<input type=text name=tenant_name value='" . $record['tenant_name'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden1 size=0 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden2 size=0 value='" . $record['sub_address'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden3 size=0 value='" . $record['tenant_name'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden4 size=0 value='" . $record['type'] . "' </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "<form action=room.php method=post>";
echo "<tr>";
echo "<td><input type=text name=utype></td>";
echo "<td><input type=text size=50 name=ufeatures></td>";
echo "<td><input type=text size=50 name=uaddress></td>";
echo "<td><input type=text name=usub_address></td>";
echo "<td><input type=text name=utenant_name></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
mysqli_close($dbc);

?>

</body>
</html>