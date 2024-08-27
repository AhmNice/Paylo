<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>settings</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

        <div class="content">
            <div class="wrapper">
                <div class="wrapper2">
                    <div class="header">
                        <a href="index.html"><img src="images/icons8-left-50.png" alt="_back"></a>
                    </div>
        
                    <div class=" sect2">
                        <img src="images/PAYLO2.png" alt="_back">
                        <h3>PROFILE</h3>
                    </div>
            <div class="profileSection">
                <div class="profileHead">
                    <div class="profilePic">
                        <img src="images/user.png" alt="" id="profilePix">
                        <div class="edit"><img src="images/icons8-camera-50.png" alt="" id="edit"></div>
                    </div>
                </div>
                <section class="profileOverlay">
                    <div class="close"><img src="images/icons8-multiply-30.png" alt="" ></div>
                    <section class="profileImage">
                        <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                            <input type="file" id="pix" name="profile_picture">
                            <input type="hidden" name="userId" id="user_id" value="">
                            <button class="Upload" id="uploadBtn" name="submit">Upload</button>
                        </form>
                    </section>
                </section>
                <section class="proDetials">
                    <div class="proList">
                        <div class="def">
                           <p class="bold">Fulname:</p><p id="name" class="name">Thamos Party</p>
                        </div>
                        <img src="images/icons8-edit-30.png" alt="" id="eit">
                    </div>

                    <div class="proList">
                        <div class="def">
                           <p class="bold">Username:</p><p id="name" class="name">ThamosParty125</p>
                        </div>
                        <img src="images/icons8-edit-30.png" alt="" id="eit">
                    </div>

                    <div class="proList">
                        <div class="def">
                           <p class="bold">Account ID:</p><p id="account_id" class="name" >y1568rtlo</p>
                        </div>
                        <img src="images/icons8-edit-30.png" alt="" id="eit">
                    </div>
 

                    <div class="proList">
                        <div class="def">
                           <p class="bold">Address:</p><p id="name" class="name">Canmal No12</p>
                        </div>
                        <img src="images/icons8-edit-30.png" alt="" id="eit">
                    </div>

                    <div class="proList">
                        <div class="def">
                           <p class="bold">Email:</p><p id="email" class="name">talk2calman245@gmail.com</p>
                        </div>
                        <img src="images/icons8-edit-30.png" alt="" id="eit">
                    </div>


                    
                </section>
            </div>
</div>


            <div class="navigation">
 <a href="index.php"><div class="navlist"><img src="images/icons8-home-50.png" alt=""></div></a>
               <a href="trans.php"> <div class="navlist"><img src="images/icons8-transaction-30.png" alt=""></div></a>
                <a href="notification.php"><div class="navlist"><img src="images/icons8-notification-bell-50.png" alt=""></div></a>
                <a href="settings.php"><div class="navlist"><img src="images/icons8-settings-50.png" alt=""></div></a>
            </div>
        </div>
    <script src="js/profile.js"></script>
</body>
</html>