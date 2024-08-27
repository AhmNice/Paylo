const profileOverlay = document.querySelector('.profileOverlay'),
closeBtn= document.querySelector('.close'),
edit = document.getElementById('edit'),
uploadBtn = document.getElementById('uploadBtn')
let profileImg = document.getElementById('profilePix'),
pix = document.getElementById('pix')
closeBtn.addEventListener('click',()=>{
    if(profileOverlay.classList.contains('active')){
        profileOverlay.classList.remove('active')
    }
})
edit.addEventListener('click',()=>{
    profileOverlay.classList.add('active')
})



async function fetchUserData() {
    return new Promise((resolve, reject) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_user.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    let user = JSON.parse(xhr.responseText);
                    resolve(user);
                } else {
                    reject('Error');
                }
            }
        };
        xhr.send();
    });
}

async function main() {
    let user;
    try {
        user = await fetchUserData();
    } catch (error) {
        console.log('error while fetching:', error);
    }
    const user_id = document.getElementById('user_id');
    const username = document.getElementById('name');
    const accountID = document.getElementById('account_id');
    const email = document.getElementById('email');
    user_id.value = parseInt(user.user.id);

    username.innerText = `${user.user.FirstName} ${user.user.surName}`;
    accountID.innerText = `${user.user.phone_number}`;
    email.innerText= `${user.user.email}`
    var src =`${user.user.profilePix}`;
    profileImg.src = src;
    console.log(user);
}

main();
async function uploadProfile(){
    const form = document.getElementById('uploadForm');
    const formData = new FormData(form);

    try {
        const response = await fetch('upload_image.php', {
            method: 'POST',
            body: formData
        });

        const result = await response.json();
        if (response.ok) {
            console.log('Image uploaded successfully:', result);
            alert('Image uploaded successfully');
        } else {
            console.error('Error uploading image:', result);
            alert('Error uploading image');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error uploading image');
    }
}


uploadBtn.addEventListener('click',()=>{
    const file = pix.files[0]
    const reader = new FileReader();
    reader.onload=(e)=>{
        profileImg.src=e.target.result;
    };
    reader.readAsDataURL(file);
    profileOverlay.classList.remove('active');

    uploadProfile();
});
