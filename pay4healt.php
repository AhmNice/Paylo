<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAY4HEALTH</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
       <div class="content">
            <div class="header">
                <a href="index.php"><img src="images/icons8-left-50.png" alt="_back"></a>
            </div>
            <div class=" sect2">
                <img src="images/PAYLO2.png" alt="_back">
                <h3>PAY4HEALTH</h3>
            </div>
<br>
            <section class="form">
                <form action="#" id="form">
                     <div class="formClass">
                         <input type="text" placeholder="Hospital/Clinic Name" id="clinicName" style="text-align: center;">
                     </div>
     
                     <div class="formClass">
                         <input type="text" placeholder="Hospital/Clinic Address" id="clinicAddress" style="text-align: center;">
                     </div>
                     <div class="formClass">
                         <input type="text" placeholder="Doctor's Name" id="docName" style="text-align: center;">
                     </div>
                     <div class="formClass">
                         <input type="text" placeholder="Account" id="docAccount" style="text-align: center;">
                     </div>
     
                     <div class="formClass">
                        <select name="healthPayType" id="healthPayType" style="text-align: center;">
                             <option value="">-- Type of Treatment --</option>
                             <option value="Operation">Operation</option>
                             <option value="ChildBirth">Child birth</option>
                             <option value="others">others</option>
                        </select>
                     </div>

                     <div class="formClass  others hide" >
                        <input type="text" name="others" id="others" placeholder="please specify"  style="text-align: center;">
                     </div>

                     <div class="state">
                        <div class="formClass">
                            <select name="state" id="state">
                                <option value="">--State --</option>
                            </select>
                        </div>

                        <div class="formClass">
                            <select name="lga" id="lga">
                                <option value="">--LGA--</option>
                            </select></div>
                     </div>

                     <div class="set">
                        <div class="ngn">NGN</div>
                        <div class="formClass"><input type="tel" id="amount4healt" placeholder="Amount"></div>
                     </div>
     
                     <button style="background-color:green ;">Submit</button>
                </form>
            </section>

            <div class="navigation">
                 <a href="index.html"><div class="navlist"><img src="images/icons8-home-50.png" alt=""></div></a>
               <a href="trans.html"> <div class="navlist"><img src="images/icons8-transaction-30.png" alt=""></div></a>
                <a href="notification.html"><div class="navlist"><img src="images/icons8-notification-bell-50.png" alt=""></div></a>
                <a href="settings.html"><div class="navlist"><img src="images/icons8-settings-50.png" alt=""></div></a>
            </div>
        </div>


    <script src="js/script2.js"></script>
    <script src="js/healt.js"></script>
    </body>