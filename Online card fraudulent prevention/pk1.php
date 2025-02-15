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
    $cardno = $_POST["cardNumber"];
    $crdname = $_POST["cardName"];
    $cvvno= $_POST["cvv"];

    // You can perform any additional validation or checks here

    // Insert data into the database
    $sql = "INSERT INTO details (cardno,crdname,cvv) VALUES  ('$cardno', '$crdname','$cvvno')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("User registered successfully.");';
        echo 'window.location="symmEnc.html";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
}

// Handle form submission


// Close the database connection
$conn->close();
?>
