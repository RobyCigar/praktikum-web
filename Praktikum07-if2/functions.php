<?php
function validate($data)
{
    global $conn;
    $data = trim($data); // " String   " -> "String"
    $data = mysqli_real_escape_string($conn, $data); 
    $data = htmlspecialchars($data); // "<a>Link</a>" -> "&lt;a&gt;Link&lt;/a&gt;"
    return $data;
}
?>