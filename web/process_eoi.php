<?php

require_once("./../include/settings.php");

/* Block direct URL access */
if (
    $_SERVER["REQUEST_METHOD"] != "POST" ||
    !isset($_POST["jobref"]) ||
    !isset($_POST["firstname"]) ||
    !isset($_POST["lastname"])
) {
    header("Location: apply.php");
    exit();
}

/* Sanitise function */
function sanitise_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/* Collect data */
$jobref = sanitise_input($_POST["jobref"] ?? "");
$firstname = sanitise_input($_POST["firstname"] ?? "");
$lastname = sanitise_input($_POST["lastname"] ?? "");
$dob = sanitise_input($_POST["dob"] ?? "");
$gender = sanitise_input($_POST["gender"] ?? "");
$street = sanitise_input($_POST["street"] ?? "");
$suburb = sanitise_input($_POST["suburb"] ?? "");
$state = sanitise_input($_POST["state"] ?? "");
$postcode = sanitise_input($_POST["postcode"] ?? "");
$email = sanitise_input($_POST["email"] ?? "");
$phone = sanitise_input($_POST["phone"] ?? "");
$position = sanitise_input($_POST["position"] ?? "");
$otherskills = sanitise_input($_POST["otherskills"] ?? "");

$skills = "";

if (isset($_POST["skills"])) {
    $skills = implode(", ", $_POST["skills"]);
}

/* Validation */
$errors = [];

/* Job Reference */
if (!preg_match("/^[A-Za-z0-9]{5}$/", $jobref)) {
    $errors[] = "Invalid Job Reference Number";
}

/* First Name */
if (!preg_match("/^[A-Za-z]{1,20}$/", $firstname)) {
    $errors[] = "Invalid First Name";
}

/* Last Name */
if (!preg_match("/^[A-Za-z]{1,20}$/", $lastname)) {
    $errors[] = "Invalid Last Name";
}

/* DOB */
if (!preg_match("/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/[0-9]{4}$/", $dob)) {
    $errors[] = "Invalid Date of Birth";
}

/* Email */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email";
}

/* Phone */
if (!preg_match("/^[0-9]{8,12}$/", $phone)) {
    $errors[] = "Invalid Phone Number";
}

/* Postcode */
if (!preg_match("/^[0-9]{4}$/", $postcode)) {
    $errors[] = "Invalid Postcode";
}

/* Required Fields */
if (
    empty($gender) ||
    empty($street) ||
    empty($suburb) ||
    empty($state) ||
    empty($position)
) {
    $errors[] = "All required fields must be completed";
}

/* Show Validation Errors */
if (!empty($errors)) {

    echo "<h2>Validation Errors</h2>";

    foreach ($errors as $error) {
        echo "<p>$error</p>";
    }

    echo '<p><a href="apply.php">Go Back</a></p>';
    exit();
}

/* Convert DOB from DD/MM/YYYY to YYYY-MM-DD */
$dateParts = explode("/", $dob);

if (count($dateParts) == 3) {
    $dob = $dateParts[2] . "-" . $dateParts[1] . "-" . $dateParts[0];
}

/* Database Connection */
$host = "localhost";
$user = "root";
$password = "";
$database = "HealthDepartment";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

/* Insert Record */
$sql = "INSERT INTO eoi
(
    job_reference,
    first_name,
    last_name,
    dob,
    gender,
    street,
    suburb,
    state,
    postcode,
    email,
    phone,
    position,
    skills,
    other_skills
)
VALUES
(
    '$jobref',
    '$firstname',
    '$lastname',
    '$dob',
    '$gender',
    '$street',
    '$suburb',
    '$state',
    '$postcode',
    '$email',
    '$phone',
    '$position',
    '$skills',
    '$otherskills'
)";

$result = mysqli_query($conn, $sql);

if ($result) {

    $eoiNumber = mysqli_insert_id($conn);

    echo "<h1>Application Submitted Successfully</h1>";
    echo "<p>Your EOI Number is:</p>";
    echo "<h2>$eoiNumber</h2>";

} else {

    echo "<h2>Database Error</h2>";
    echo "<p>" . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);

?>
