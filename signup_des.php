<?php
$host = 'localhost';
$username = 'Admin';
$password = '12Admin@@';
$dbname = 'paylodb';

// Create connection
$connection = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if data is received from the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from form
    $firstname = $_POST['Fname'];
    $lastname = $_POST['Surname'];
    $dob = $_POST['DoB'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Debugging: Display received data
    echo "Received data: <br>";
    echo "First Name: $firstname <br>";
    echo "Surname: $lastname <br>";
    echo "Date of Birth: $dob <br>";
    echo "Phone: $phone <br>";
    echo "Email: $email <br>";

    // SQL query to insert data into the database
    $sql = "INSERT INTO users (firstname, surname, dateOfBirth, email, phone) VALUES ('$firstname', '$lastname', '$dob', '$email', '$phone')";

    // Debugging: Display SQL query
    echo "SQL Query: $sql <br>";

    $res = mysqli_query($connection, $sql);

    if (!$res) {
        die("Error: " . mysqli_error($connection));
    } else {
        echo "New record created successfully";
    }
    
}

// Close the database connection
mysqli_close($connection);
?>
