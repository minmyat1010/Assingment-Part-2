<?php
$page = 'manage';
session_start();

if(!isset($_SESSION["user_id"]))
{
    header("Location: manage.php");
    exit();
}

require_once("settings.php");

$conn = mysqli_connect($host,$user,$pwd,$sql_db);

if(!$conn)
{
    die("Database connection failed.");
}

/* UPDATE STATUS */
if(isset($_POST["update_status"]))
{
    $eoi = (int)$_POST["eoi"];
    $status = $_POST["status"];

    mysqli_query(
        $conn,
        "UPDATE eoi
         SET status='$status'
         WHERE EOInumber=$eoi"
    );
}

/* DELETE BY REFERENCE */
if(isset($_POST["delete_eoi"]))
{
    $ref = mysqli_real_escape_string(
        $conn,
        $_POST["delete_ref"]
    );

    mysqli_query(
        $conn,
        "DELETE FROM eoi
         WHERE ref_number='$ref'"
    );
}

/* BUILD SEARCH QUERY */

$sql = "SELECT * FROM eoi WHERE 1=1";

if(!empty($_POST["ref_number"]))
{
    $ref = mysqli_real_escape_string(
        $conn,
        $_POST["ref_number"]
    );

    $sql .= " AND ref_number='$ref'";
}

if(!empty($_POST["fname"]))
{
    $fname = mysqli_real_escape_string(
        $conn,
        $_POST["fname"]
    );

    $sql .= " AND fname='$fname'";
}

if(!empty($_POST["lname"]))
{
    $lname = mysqli_real_escape_string(
        $conn,
        $_POST["lname"]
    );

    $sql .= " AND lname='$lname'";
}

$allowed_sort = [
    "EOInumber",
    "ref_number",
    "fname",
    "lname",
    "status"
];

$sort = "EOInumber";

if(isset($_POST["sort"]) &&
   in_array($_POST["sort"],$allowed_sort))
{
    $sort = $_POST["sort"];
}

$sql .= " ORDER BY $sort";

$result = mysqli_query($conn,$sql);

include("header.inc");
include("nav.inc");
?>

<main class="manage-page">
<h1>Expression of Interest Management</h1>
<form method="post" class="manage-search">
<input type="text"
       name="ref_number"
       placeholder="Job Reference">

<input type="text"
       name="fname"
       placeholder="First Name">

<input type="text"
       name="lname"
       placeholder="Last Name">

<select name="sort">
    <option value="EOInumber">EOI Number</option>
    <option value="ref_number">Job Reference</option>
    <option value="fname">First Name</option>
    <option value="lname">Last Name</option>
    <option value="status">Status</option>
</select>

<button type="submit">
    Search
</button>

</form>

<form method="post" class="delete-form">
<input type="text"
       name="delete_ref"
       placeholder="Reference To Delete">

<button type="submit"
        name="delete_eoi">
    Delete EOIs
</button>

</form>

<div class="manage-table-wrapper">

<table class="manage-table">

<tr>
    <th>EOI</th>
    <th>Reference</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Update</th>
</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

<td><?= $row["EOInumber"] ?></td>

<td><?= $row["ref_number"] ?></td>

<td>
<?= $row["fname"] ?>
<?= $row["lname"] ?>
</td>

<td><?= $row["email"] ?></td>

<td><?= $row["phone"] ?></td>

<td><?= $row["status"] ?></td>

<td>

<form method="post">

<input type="hidden"
name="eoi"
value="<?= $row["EOInumber"] ?>">

<select name="status">

<option value="New">New</option>
<option value="Current">Current</option>
<option value="Final">Final</option>

</select>

<button type="submit"
     name="update_status">
Update </button>

</form>
</td>
</tr>

<?php
}
?>

</table>
</div>
</main>

<?php include("footer.inc"); ?>