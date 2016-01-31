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
$UpdateQuery = "UPDATE apartment SET address='$_POST[address]', 
sub_address='$_POST[sub_address]', number_of_rooms='$_POST[number_of_rooms]', price='$_POST[price]'
WHERE address='$_POST[hidden1]' AND sub_address='$_POST[hidden2]'";               
$result = mysqli_query($dbc, $UpdateQuery);
		if($result){
			echo 'Apartment Updated';
		}
		else{
			echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
		}
};

if(isset($_POST['delete'])){
$DeleteQuery = "DELETE FROM apartment WHERE address='$_POST[hidden1]' AND sub_address='$_POST[hidden2]'";          
$result = mysqli_query($dbc, $DeleteQuery);
		if($result){
			echo 'Apartment Deleted';
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
	if(empty($_POST['unumber_of_rooms'])){
        $data_missing[] = 'Number of Rooms';
    }
	if(empty($_POST['uprice'])){
        $data_missing[] = 'Price';
    } 
    if(empty($data_missing)){
        $AddQuery = "INSERT INTO apartment (address, sub_address, number_of_rooms, price) VALUES 
					('$_POST[uaddress]','$_POST[usub_address]','$_POST[unumber_of_rooms]', 
					'$_POST[uprice]')";         
		$result = mysqli_query($dbc, $AddQuery);
		if($result){
			echo 'Apartment Entered';
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



$sql = "SELECT * FROM apartment";
$myData = mysqli_query($dbc, $sql);
echo "<table border=1>
<tr>
<th>Address</th>
<th>Sub Address</th>
<th>Number of Rooms</th>
<th>Price</th>

</tr>";

while($record = mysqli_fetch_array($myData)){
echo "<form action=apartment.php method=post>";
echo "<tr >";
echo "<td >" . "<input type=text name=address size=50 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=text name=sub_address value='" . $record['sub_address'] . "' </td>";
echo "<td>" . "<input type=text name=number_of_rooms size=20 value='" . $record['number_of_rooms'] . "' </td>";
echo "<td>" . "<input type=text name=price value='" . $record['price'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden1 size=0 value='" . $record['address'] . "' </td>";
echo "<td>" . "<input type=hidden name=hidden2 size=0 value='" . $record['sub_address'] . "' </td>";
echo "<td>" . "<input type=submit name=update value=update" . " </td>";
echo "<td>" . "<input type=submit name=delete value=delete" . " </td>";
echo "</tr>";
echo "</form>";
}

echo "<form action=apartment.php method=post>";
echo "<tr>";
echo "<td><input type=text size=50 name=uaddress></td>";
echo "<td><input type=text name=usub_address></td>";
echo "<td><input type=text size=20 name=unumber_of_rooms></td>";
echo "<td><input type=text name=uprice></td>";
echo "<td>" . "<input type=submit name=add value=add" . " </td>";
echo "</form>";
echo "</table>";
mysqli_close($dbc);

?>

</body>
</html>