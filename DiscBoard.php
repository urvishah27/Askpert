<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" method="post">
		<input type="text" name="Qno">
		<input type="text" name="Question">
		<input type="submit" name="submit">
	</form>
	
<?php

$conn = new mysqli('localhost','root','','disc');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$no=$_POST["Qno"];
$word=$_POST["Question"];
$sql = "insert into disc values ('$word','$no')";
$result = $conn->query($sql);
$sql1="select * from disc";
$result1=$conn->query($sql1);
if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        echo $row["ques"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>  
</body>
</html>