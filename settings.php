<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>settings</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="wrapper">
                <div class="wrapper2">
            <div class="header">
                <img src="images/icons8-left-50.png" alt="_back">
            </div>

            <div class=" sect2">
                <img src="images/PAYLO2.png" alt="_back">
                <h3>SETTINGS</h3>
            </div>

            <div class="settingList">
                <a href="profile.php"><div class="lists"><img src="images/icons8-user-50.png" alt="">Profile</div></a>
                <div class="lists"><img src="images/icons8-support-24.png" alt="">Support</div>
                <a href="complaint.html"><div class="lists"><img src="images/icons8-complaint-24.png" alt="">Complaint</div></a>
                <a href="notification.html"><div class="lists"><img src="images/icons8-notification-50.png" alt="">Notification</div></a>
                <div class="lists"><img src="images/icons8-rate-30.png" alt="">Rate us</div>
                <div class="lists" id="log"><img src="images/icons8-logout-30.png" alt="">Log out</div>
            </div>
            </div>
</div>
        <div class="navigation">
             <a href="index.php"><div class="navlist"><img src="images/icons8-home-50.png" alt=""></div></a>
               <a href="trans.html"> <div class="navlist"><img src="images/icons8-transaction-30.png" alt=""></div></a>
                <a href="notification.html"><div class="navlist"><img src="images/icons8-notification-bell-50.png" alt=""></div></a>
                <a href="settings.php"><div class="navlist"><img src="images/icons8-settings-50.png" alt=""></div></a>
        </div>
    </div>
    <script type="text/javascript">
        var logout = document.getElementById('log');
        logout.addEventListener('click',()=>{
            window.location.href='control/logout.php'
        })
    </script>
</body>
</html>