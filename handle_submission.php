<?php
    header('Content-Type: application/json');

    $host ="localhost";
    $username="Admin";
    $password ="12Admin@@";
    $dbname="paylodb";

    //create connection
    $connection =mysqli_connect($host,$username,$password,$dbname);
    //check connection
    if (mysqli_connect_errno()) {
        die('connection failed:'.$connection->connect_error);
    }

    $input = file_get_contents('php://input');
    $data = json_decode($input, true);

    //validating
    if (!isset($data['phone']) || !isset($data['otp_num'])) {
        http_response_code(400);
        echo "Invalid input";
        exit();
    }

    $phone = $data['phone'];
    $otp = $data['otp_num'];
    $otp_hash = hash('sha256', $otp);
    $now = time();
    $created_at =date('Y-m-d H:i:s',$now);
    $end_time = strtotime('+5 minutes');
    $expires =date('Y-m-d H:i:s', $end_time);

    if (!preg_match('/^\d{11}$/', $phone) || !preg_match('/^\d{6}$/',$otp)) {
       http_response_code(400);
       echo 'Invalid phone or OTP format';
       exit();
    }

    $sql = $connection->prepare("INSERT INTO otps_storage (phone_number, otp_hash,created_at,expires_at)"."VALUES (?,?,?,?)");
    $sql->bind_param('ssss',$phone,$otp_hash,$created_at,$expires);
    if($sql->execute()){
        echo 'success';
    }else{
        http_response_code(500);
        echo "Error:".$sql->error;
    }
    $sql->close();
?>