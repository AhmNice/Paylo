<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="container">
        <div class="blur"></div>
        <div class="form_container">
            <div class="top">
                <div class="logo"><img src="images/PAYLO2.png" alt="Logo"></div>
            </div>
            <form id="phoneForm" onsubmit="verifyPhoneNumber(event)">
                <input type="tel" id="phone" placeholder="Enter Phone Number" >
                <div class="btn">
                    <button type="submit">Login</button>
                    <span>Don't have an account? <a href="signup.php">Create account</a></span>
                </div>
            </form>
        </div>
    </div>
     <script src="js/login.js"></script>
   
</body>
</html>
