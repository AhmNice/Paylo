const healthPayType = document.getElementById("healthPayType");
const others = document.querySelector(".others");
healthPayType.addEventListener('change', ()=>{
    if(healthPayType.value=="others"){
        others.classList.remove('hide')
    }else{
        others.classList.add('hide');
    }
})
