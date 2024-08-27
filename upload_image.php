<?php
session_start();
$servername = "localhost";
$username = "Admin";
$password = "12Admin@@";
$dbname = "paylodb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){ // Check if form is submitted
    $userId = $_POST['userId'];
    $fileName = $_FILES['profile_picture']['name'];
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowFormat = array('jpg','jpeg','png','gif');
    $tmpName = $_FILES['profile_picture']['tmp_name'];

    // Retrieve the username from the database
    $stmt = $conn->prepare("SELECT phone FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($username);
    $stmt->fetch();
    $stmt->close();

    if (!$username) {
        die("User not found.");
    }

    // Rename the file to the username
    $newFileName = $username . '.' . $extension;
    $destination = 'userProfilePictures/' . $newFileName;
    $now = time();
    $uploaded = date('Y-m-d H:i:s', $now);

    if(in_array($extension, $allowFormat)){
       if (move_uploaded_file($tmpName, $destination)) {
           // Use prepared statements to avoid SQL injection
           $stmt = $conn->prepare("INSERT INTO images(user_id, image, image_type, uploaded_at, directory) VALUES (?, ?, ?,?, ?)");
           $stmt->bind_param("issss", $userId, $newFileName, $extension, $uploaded, $destination);

           if($stmt->execute()){
             if (isset($_SESSION['id'])) {
               $_SESSION['profilePix'] = $destination;
             }
               echo "success";
               header('LOCATION: profile.php');
           } else {
               echo 'error';
           }
           $stmt->close();
       } else {
           echo 'failed to move the file';
       }
    } else {
        echo 'file type not allowed';
    }
}
$conn->close();
?>
