<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up page</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
       .formClass.denger input{
                border: 1px solid hsl(4, 69%, 50%);
                background-color:  hsla(3, 52%, 78%, 0.719);
                color: black;
            }
            .formClass{
                display: flex;
                flex-direction: column;
                width: 100%;
            }
            span{
                display: none;
            }
        .formClass.denger span{
            color: hsl(4, 69%, 50%);
            font-size: 12px;
            display: block;
        }
    </style>
    <script>
        let users = [];

        function fetchData() {
            return new Promise((resolve, reject) => {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "fetch_users.php", true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            users = JSON.parse(xhr.responseText);
                            resolve();
                        } else {
                            reject('Failed to fetch users');
                        }
                    }
                };
                xhr.send();
            });
        }

        async function validateForm() {
            var isValid = true;
            var form = document.getElementById('signup');
            var inputs = form.querySelectorAll('input');

            // Ensure users data is fetched
            await fetchData();

            inputs.forEach(function(input) {
                if (input.value === '') {
                    input.closest('.formClass').classList.add('denger')
                    input.nextElementSibling.innerText ="feild can't be empty"
                    isValid = false;
                }
            });

            var email = document.getElementById('email');
            var phone_number = document.getElementById('phone');

            users.forEach(user => {
                if (user.phone == phone_number.value) {
                   phone_number.closest('.formClass').classList.add('denger')
                   phone_number.nextElementSibling.innerText='Phone number already exist'
                    isValid = false;
                } else if (user.email == email.value ) {
                    email.closest('.formClass').classList.add('denger')
                    email.nextElementSibling.innerText='Phone number already exist'
                    isValid = false;
                }
            });

            return isValid;
        }

        async function submitForm(event) {
            event.preventDefault();

            // Form validations
            if (!await validateForm()) {
                return;
            }

            var formData = new FormData(document.getElementById('signup'));
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'signup_des.php', true);

            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        window.location.href='redirection.html';
                    } else {
                        alert('Submission failed. Please try again.');
                    }
                    document.querySelector('button[name="submit"]').disabled = false;
                }
            };

            document.querySelector('button[name="submit"]').disabled = true;
            xhr.send(formData);
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="blur"></div>
        <div class="form_container">
            <div class="top">
                <div class="logo"><img src="images/PAYLO2.png" alt="Logo"></div>
            </div>
            <form id="signup" onsubmit="submitForm(event)">
                <div class="formClass">
                    <input type="text" id="Fname" name="Fname" placeholder="Enter First Name">
                    <span id="span"></span>
                </div>
               <div class="formClass">
                   <input type="text" id="Surname" name="Surname" placeholder="Enter Surname">
                    <span id="span"></span>
                </div>
              <div class="formClass">
                     <input type="date" id="DoB" name="DoB" placeholder="Enter Date of Birth">
                    <span id="span"></span>
                </div>
                <div class="formClass">
                    <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number">
                    <span id="span"></span>
                </div>
                <div class="formClass">
                    <input type="email" id="email" name="email" placeholder="Enter Email Address" class="">
                    <span id="span">email already exist</span>
                </div>
                <div class="btn">
                    <button name="submit">Sign Up</button>
                    <span style="display: block;">Already have an account? <a href="login.php"> Login</a></span>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
