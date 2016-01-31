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
$UpdateQuery = "UPDATE tenant SET name='$_POST[name]', 
landlord='$_POST[landlord]', budget_contribution='$_POST[budget_contribution]',
address='$_POST[address]',sub_address='$_POST[sub_address]'
WHERE name='$_POST[hidden]'";               
$result = mysqli_query($dbc, $UpdateQuery);
		if($result){
			echo 'Tenant Updated';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM tenant WHERE name='$_POST[hidden]'";          
$result = mysqli_query($dbc, $DeleteQuery);
		if($result){
			echo 'Tenant Deleted';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['add'])){
$data_missing = array();
    if(empty($_POST['uname'])){
        $data_missing[] = 'Name';
    } 
    if(empty($_POST['ulandlord'])){
        $data_missing[] = 'Landlord';
    } 
	if(empty($_POST['uaddress'])){
        $data_missing[] = 'Address';
    }
	if(empty($_POST['usub_address'])){
        $data_missing[] = 'Sub Address';
    } 
    if(empty($data_missing)){
        $AddQuery = "INSERT INTO tenant (name, landlord, budget_contribution, address, sub_address) VALUES 
					('$_POST[uname]','$_POST[ulandlord]','$_POST[ubudget_contribution]', 
					'$_POST[uaddress]', '$_POST[usub_address]')";         
		$result = mysqli_query($dbc, $AddQuery);
		if($result){
			echo 'Tenant Entered';
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



$sql = "SELECT * FROM tenant";
$myData = mysqli_query($dbc, $sql);
echo "<table border=1>
<tr>
<th>Name</th>
<th>Landlord</th>
<th>Budget Contribution</th>
<th>Address</th>
<th>Sub Address</th>

</tr>";

while($record = mysqli_fetch_array($myData)){
echo "<form action=tenant.php method=post>";
echo "<tr >";
echo "<td>" . "<input type=text name=name size=20 value='" . $record['name'] . "' </td>";
echo "<td>" . "<input type=text name=landlord value='" . $record['landlord'] . "' </td>";
echo "<td>" . "<input type=text name=budget_contribution value='" . $record['budget_contribution'] . "' </td>";
echo "<td >" . "<input type=text name=address size=50 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=text name=sub_address value='" . $record['sub_address'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden size=0 value='" . $record['name'] . "' </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "<form action=tenant.php method=post>";
echo "<tr>";
echo "<td><input type=text size=20 name=uname></td>";
echo "<td><input type=text name=ulandlord></td>";
echo "<td><input type=text name=ubudget_contribution></td>";
echo "<td><input type=text size=50 name=uaddress></td>";
echo "<td><input type=text name=usub_address></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
mysqli_close($dbc);

?>

</body>
</html>