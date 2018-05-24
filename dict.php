<!DOCTYPE html>
<html>

<style>
* {box-sizing: border-box;}

body {
  margin: 0;
  font-family: Arial;
}

.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
</head>
<body>

<div class="topnav">
  <a class="active" href="start.html">Home</a>
  <a class="active" href="#home">Search</a>
  <a href="Add.php">Add</a>
 
  <div class="search-container">
    <form action="#" method="post">
      <input type="text" placeholder="Search.." name="search" id="word" value="word">
      <input type="text" placeholder="Search.." name="searchfield" id="word1" value="field">
      <input type="submit" name="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>

<div style="padding-left:16px">
  <h2>MEANING:</h2>
<?php

$conn = new mysqli('localhost','root','','jargons');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$word=$_POST["search"];
$word1=$_POST["searchfield"];
$sql = "SELECT meaning FROM jargons where words like '$word' and field like '$word1'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["meaning"];
    }
} else {
    echo "0 results";
}
$conn->close();
?>  
</div>
</html>

