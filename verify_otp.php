<?php
session_start();
header('Content-Type: application/json');

$host = 'localhost';
$username = 'Admin';
$password = '12Admin@@';
$dbname = 'paylodb';

// Create connection
$connection = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    http_response_code(500);
    echo json_encode(array("error" => "Connection failed: " . $connection->connect_error));
    exit();
}

// Get JSON input
$input = file_get_contents("php://input");
$data = json_decode($input, true);

// Validate input
if (!isset($data['otp'])) {
    http_response_code(400);
    echo json_encode(array("error" => "Invalid input"));
    exit();
}

$otp = $data['otp'];
$otp_hash = hash('sha256', $otp);

if (!preg_match('/^\d{6}$/', $otp)) {
    http_response_code(400);
    echo json_encode(array("error" => "Invalid OTP format"));
    exit();
}

// Verify OTP
$sql = $connection->prepare("SELECT phone_number, expires_at FROM otps_storage WHERE otp_hash = ? ORDER BY created_at DESC LIMIT 1");
$sql->bind_param("s", $otp_hash);
$sql->execute();
$sql->store_result();

if ($sql->num_rows > 0) {
    $sql->bind_result($phone_number, $expires_at);
    $sql->fetch();

    if (new DateTime() > new DateTime($expires_at)) {
        http_response_code(400);
        echo json_encode(array("error" => "OTP has expired"));
    } else {
        $user_query = $connection->prepare("SELECT * FROM users WHERE phone = ?");
        $user_query->bind_param("s", $phone_number);
        $user_query->execute();
        $result = $user_query->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            $_SESSION['id'] = $user['id'];
            $_SESSION['FirstName'] = $user['firstName'];
            $_SESSION['surName'] = $user['surName'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['phone_number'] = $user['phone'];
          $query_profile_pic =$connection->prepare('SELECT * FROM images WHERE user_id =?');
          $query_profile_pic->bind_param('s',$user['id']);
          $query_profile_pic->execute();
          $picture = $query_profile_pic->get_result();
          if ($picture->num_rows > 0) {
                $userPic = $picture->fetch_assoc();
                if ($userPic['directory']!='') {
                    $_SESSION['profilePix']=$userPic['directory'];
                }else{
                    $_SESSION['profilePix']='images/user.png';
                }
          }
            echo json_encode(array("success" => true));
        } else {
            http_response_code(404);
            echo json_encode(array("error" => "User not found"));
        }

        $user_query->close();
    }
} else {
    // OTP is invalid
    http_response_code(401);
    echo json_encode(array("error" => "Invalid OTP"));
}

// Close the statement and the database connection
$sql->close();
$connection->close();
?>
