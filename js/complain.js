const textfield = document.querySelector('.textinput'),
sendBtn = document.querySelector('.send'),
userReply = document.querySelector('.userReply'),
complain = document.querySelector('.complain'),
complaintSect=document.querySelector('.complaintSect')

sendBtn.addEventListener('click', (e)=>{
   e.preventDefault();
   if(textfield.value!=0){
    let userReply = document.createElement('div')
    let complain = document.createElement('div')
    let userimg = document.createElement('img')
    complain.className="complain"
    userReply.className="userReply"
    userimg.src="images/user.png"

    complain.innerText=textfield.value;
    complaintSect.appendChild(userReply)
    userReply.append(complain);
    userReply.appendChild(userimg);
    textfield.value=''
   }
})