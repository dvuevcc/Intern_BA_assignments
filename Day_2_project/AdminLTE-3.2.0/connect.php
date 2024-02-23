<?php


// Get the form data
$name = $_POST['name'];
$father_name = $_POST['father_name'];
$mother_name = $_POST['mother_name'];
$dob = $_POST['dob'];
$dob = date("Y-m-d", strtotime($dob));
$gender = $_POST['gender'];
$degree = $_POST['degree'];
$degree_name = $_POST['degree_name'];
$admission_session = $_POST['admission_session'];
$reg_id = $_POST['reg_id'];
$batch = $_POST['batch'];
$passing_year = $_POST['passing_year'];
$graduating_session = $_POST['graduating_session'];
$cgpa = $_POST['cgpa'] ?? '';
$permanent_address = $_POST['permanent_address'];
$present_address = $_POST['present_address'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$profession = $_POST['profession'];
$office_address = $_POST['office_address'];
$transportation = $_POST['transportation'];
$alternatives = $_POST['alternatives'];
$is_draft = isset($_POST['is_draft']) ? 1 : 0;

$target_dir = "uploads/";
$passport_photo = $target_dir . basename($_FILES["passport_photo"]["name"]);
$bank_receipt = $target_dir . basename($_FILES["bank_receipt"]["name"]);

if ($_FILES["passport_photo"]["error"] === UPLOAD_ERR_OK && $_FILES["bank_receipt"]["error"] === UPLOAD_ERR_OK) {
// Move the uploaded files to the target directory
move_uploaded_file($_FILES["passport_photo"]["tmp_name"], $passport_photo);
move_uploaded_file($_FILES["bank_receipt"]["tmp_name"], $bank_receipt);


    // Database connection details
    $servername = "127.0.0.1:3307";
    $username = "root";
    $password = "";
    $dbname = "convocation";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO convocation_form (name, father_name, mother_name, dob, gender, degree, degree_name, admission_session, reg_id, batch, passing_year, graduating_session, cgpa, permanent_address, present_address, email, mobile, profession, office_address, transportation, alternatives, passport_photo, bank_receipt, is_draft) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssssssssssssssss", $name, $father_name, $mother_name, $dob, $gender, $degree, $degree_name, $admission_session, $reg_id, $batch, $passing_year, $graduating_session, $cgpa, $permanent_address, $present_address, $email, $mobile, $profession, $office_address, $transportation, $alternatives, $passport_photo, $bank_receipt, $is_draft);

    // Set parameters and execute
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and the database connection
    $stmt->close();
    $conn->close();
}
?>