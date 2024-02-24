<?php
// Establish a connection to your MySQL database
$mysqli = new mysqli("localhost", "root", "", "nominee_information");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Prepare and bind the SQL statement
$stmt = $mysqli->prepare("INSERT INTO nominee_table (name, relation, nid_birth, mobile) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $relation, $nid_birth, $mobile);

// Insert each row from the dataArray
foreach ($_POST['data'] as $data) {
    $name = $data['name'];
    $relation = $data['relation'];
    $nid_birth = $data['nid_birth'];
    $mobile = $data['mobile'];
    $stmt->execute();
}

// Close the statement and the connection
$stmt->close();
$mysqli->close();

echo "Data inserted successfully";
?>
