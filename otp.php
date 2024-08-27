<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <div class="blur"></div>
        <div class="form_container">
            <div class="top">
                <div class="logo"><img src="images/PAYLO2.png" alt="Logo"></div>
            </div>
            <form id="otpForm" onsubmit="sendOTP(event)">
                <input type="tel" id="otp" name="otp" placeholder="Enter OTP" required pattern="[0-9]{6}">
                <button type="submit">Confirm</button>
                <div id="message" class="message"></div>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        async function sendOTP(event) {
            event.preventDefault();
            const otp = document.getElementById('otp').value;
            const messageElement = document.getElementById('message');

            messageElement.textContent = 'Verifying...';

            try {
                const response = await fetch('verify_otp.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ otp: otp })
                });

                const result = await response.json();

                if (response.ok) {
                    if (result.success) {
                        window.location.href = "index.php";
                    } else {
                        messageElement.textContent = 'Invalid OTP. Please try again.';
                    }
                } else {
                    messageElement.textContent = 'An error occurred while verifying the OTP.';
                }
            } catch (error) {
                messageElement.textContent = 'An error occurred. Please try again.';
            }
        }
    </script>
</body>
</html>
