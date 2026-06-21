<?php
session_start();

if (!isset($_SESSION["user_id"]))
{
    header("Location: login.php");
    exit();
}

$page = "manage";

require_once("../include/settings.php");

$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn)
{
    die("Database connection failed: " . mysqli_connect_error());
}

/* UPDATE STATUS */
if (isset($_POST["update_status"]))
{
    $eoi = (int)$_POST["eoi"];
    $status = mysqli_real_escape_string($conn, $_POST["status"]);

    $sql = "
        UPDATE eoi
        SET status='$status'
        WHERE EOInumber=$eoi
    ";

    mysqli_query($conn, $sql);
}

/* DELETE EOIs BY JOB REFERENCE */
if (isset($_POST["delete_eoi"]))
{
    $ref = mysqli_real_escape_string(
        $conn,
        $_POST["delete_ref"]
    );

    $sql = "
        DELETE FROM eoi
        WHERE job_reference='$ref'
    ";

    mysqli_query($conn, $sql);
}

/* SEARCH */

$sql = "SELECT * FROM eoi WHERE 1=1";

/* Search by Job Reference */
if (!empty($_POST["ref_number"]))
{
    $ref = mysqli_real_escape_string(
        $conn,
        $_POST["ref_number"]
    );

    $sql .= " AND job_reference='$ref'";
}

/* Search by First Name */
if (!empty($_POST["fname"]))
{
    $fname = mysqli_real_escape_string(
        $conn,
        $_POST["fname"]
    );

    $sql .= " AND first_name LIKE '%$fname%'";
}

/* Search by Last Name */
if (!empty($_POST["lname"]))
{
    $lname = mysqli_real_escape_string(
        $conn,
        $_POST["lname"]
    );

    $sql .= " AND last_name LIKE '%$lname%'";
}

/* SORTING */

$allowed_sort = [
    "EOInumber",
    "job_reference",
    "first_name",
    "last_name",
    "status"
];

$sort = "EOInumber";

if (
    isset($_POST["sort"]) &&
    in_array($_POST["sort"], $allowed_sort)
)
{
    $sort = $_POST["sort"];
}

$sql .= " ORDER BY $sort";

$result = mysqli_query($conn, $sql);

include("../include/header.inc");
include("../include/nav.inc");
?>

<main class="manage-page">

<h1>Expression of Interest Management</h1>

<p>
Welcome,
<strong><?php echo $_SESSION["username"]; ?></strong>
|
<a href="logout.php">Logout</a>
</p>

<!-- Search Form -->

<form method="post">

    <input
        type="text"
        name="ref_number"
        placeholder="Job Reference">

    <input
        type="text"
        name="fname"
        placeholder="First Name">

    <input
        type="text"
        name="lname"
        placeholder="Last Name">

    <select name="sort">
        <option value="EOInumber">EOI Number</option>
        <option value="job_reference">Job Reference</option>
        <option value="first_name">First Name</option>
        <option value="last_name">Last Name</option>
        <option value="status">Status</option>
    </select>

    <button type="submit">
        Search
    </button>

</form>

<br>

<!-- Delete by Job Reference -->

<form method="post">

    <input
        type="text"
        name="delete_ref"
        placeholder="Job Reference To Delete"
        required>

    <button
        type="submit"
        name="delete_eoi">
        Delete EOIs
    </button>

</form>

<br>

<table border="1" cellpadding="5">

<tr>
    <th>EOI Number</th>
    <th>Job Reference</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Status</th>
    <th>Update Status</th>
</tr>

<?php
if ($result && mysqli_num_rows($result) > 0)
{
    while ($row = mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row["EOInumber"]; ?></td>

<td><?php echo $row["job_reference"]; ?></td>

<td><?php echo $row["first_name"]; ?></td>

<td><?php echo $row["last_name"]; ?></td>

<td><?php echo $row["email"]; ?></td>

<td><?php echo $row["phone"]; ?></td>

<td><?php echo $row["status"]; ?></td>

<td>

<form method="post">

<input
    type="hidden"
    name="eoi"
    value="<?php echo $row["EOInumber"]; ?>">

<select name="status">
    <option value="New">New</option>
    <option value="Current">Current</option>
    <option value="Final">Final</option>
</select>

<button
    type="submit"
    name="update_status">
    Update
</button>

</form>

</td>

</tr>

<?php
    }
}
else
{
?>

<tr>
    <td colspan="8">
        No EOIs found.
    </td>
</tr>

<?php
}
?>

</table>

</main>

<?php
include("../include/footer.inc");
mysqli_close($conn);
?>