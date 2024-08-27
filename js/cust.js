const P_Add = document.getElementById('P_Add'),
 P_Num = document.getElementById('P_Num'),
ccdetails = document.querySelector('.ccdetails'),
ccdetails2 = document.getElementById('ccdetails')
P_Add.addEventListener('click',()=>{
    if(P_Add.classList.contains('active')){
        P_Add.classList.remove('active')
        ccdetails.style.display="none"
    }else{
        P_Add.classList.add('active')
        ccdetails.style.display="block"
    }
})
P_Num.addEventListener('click',()=>{
    if(P_Num.classList.contains('active')){
        P_Num.classList.remove('active')
        ccdetails2.style.display="none"
    }else{
        P_Num.classList.add('active')
        ccdetails2.style.display="block"
    }
})