const actualBal = document.querySelector('.actualBal');
        const bonusBal = document.querySelector('.bonusBal');
        const acBal = document.querySelector('.acBal')
        const bonBal = document.querySelector('.bonBal')
        const closed = document.getElementById('closed')
        const acBalCheck = document.getElementById('acBalCheck');
        actualBal.addEventListener('click',()=>{
           if(acBalCheck.checked){
            actualBal.classList.add('closed');
            bonusBal.classList.add('closed')
            
           }else{
            actualBal.classList.remove('closed');
            bonusBal.classList.remove('closed');
           }
        });


async function getLoggedInUser() {
        return new Promise((resolve, reject) => {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_user.php', true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    try {
                        var user = JSON.parse(xhr.responseText);
                        resolve(user);
                    } catch (error) {
                        reject('Failed to parse user data');
                    }
                } else {
                    reject('Cannot fetch user data!');
                    setTimeout(function() {
                        window.location.href = "login.php";
                        // alert('You are not logged in, please login');
                    }, 50);
                }
            }
        };
        xhr.send();
    });
}

async function main() {
    let user;
    try {
        user = await getLoggedInUser();

    } catch (error) {
        // alert('Failed to fetch your data, please try again later');
        return;
        window.location.href='login.php'
    }
        const username = document.getElementById('username');
        const userid = document.getElementById('userid');
        const userIcon = document.getElementById('userIcon');


    function hideID(id) {
        return id.toString().replace(/(?<=\d{3})\d{5}/g, '***');
    }
        let id =user.user.phone_number
        userid.innerText = hideID(id);

        username.innerText = `${user.user.FirstName} ${user.user.surName}`
        var src =`${user.user.profilePix}`;
        userIcon.src =src;
        console.log(src);
}

main();
// console.log('ddd'