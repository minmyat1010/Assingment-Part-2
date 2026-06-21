<?php

require_once("../include/settings.php");

$conn = mysqli_connect($host,$user,$pwd,$sql_db);

$hashedPassword = password_hash("Admin", PASSWORD_DEFAULT);

$sql = "
INSERT INTO users(username,password)
VALUES('Admin','$hashedPassword')
";

if(mysqli_query($conn,$sql))
{
    echo "Admin account created";
}
else
{
    echo mysqli_error($conn);
}
?>