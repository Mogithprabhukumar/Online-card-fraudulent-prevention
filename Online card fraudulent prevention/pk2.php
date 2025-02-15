<?php
  // Replace with your database name

// Create a connection to the database
$conn = mysqli_connect('localhost:3306','root','','iss');

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else
{ 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comkey = $_POST["commonKey"];
    $cvvno= $_POST["cvv"];
    $enCVV= $_POST["encCVV"];
    $keyU= $_POST["keyUse"];
    // You can perform any additional validation or checks here

    // Insert data into the database
    $sql = "UPDATE details SET commonKey='$comkey' WHERE cvv='$cvvno'";
    $sql1= "UPDATE details SET encrycvv='$enCVV' WHERE cvv='$cvvno'";
    $sql2 = "UPDATE details SET keyused='$keyused' WHERE cvv='$cvvno'";
    if ($conn->query($sql) === TRUE && $conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE) {
        echo '<script>alert("User registered successfully 1");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}

// Handle form submission


// Close the database connection
$conn->close();
?>
