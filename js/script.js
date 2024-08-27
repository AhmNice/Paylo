const method = document.getElementById('method');
const amount = document.getElementById('amount');
const card = document.querySelector('.location_card');
const amount_bal = document.getElementById('amount_bal');
const genBtn = document.getElementById('generate');
const form = document.getElementById('form'),
methodTitle = document.getElementById('methodTitle'),
generateBD = document.getElementById('generateBD')
var method3 ="BankDeposit";
var  method1 ="BankTransfer";
var method2 ="DebitCard"
var method4 ="BranchDeposit"
const nameT = document.getElementById('name'),
number = document.getElementById('number'),
acName = document.getElementById('acName');


function showCard(){
    if(method.value === method1|| method.value === method3 
        ||method.value=== method4){
        if(amount.value.length >= 4 ){
            card.classList.remove('hide')
            genBtn.classList.add('hide')
            generateBD.classList.add('hide')
            // amount.disabled = true;
        }
    }
    amount_bal.innerText = amount.value;
    
    
}
form.addEventListener('submit', function(event){
    event.preventDefault()
})
genBtn.addEventListener('click',()=>{
    showCard();
})
amount.addEventListener('keyup', ()=>{
    amount_bal.innerText = amount.value;
})
generateBD.addEventListener('click', ()=>{
    showCard();
})

method.addEventListener('change',()=>{
const bankTF =document.querySelector('.bankTF'),
bankTFbtn = document.getElementById('bankTFbtn'),
Branch = document.querySelector('.Branch'),
cardTFbtn = document.getElementById('cardTFbtn')
    switch(method.value){
        case 'BankTransfer': 
            bankTF.classList.remove('hide');
            Branch.classList.add('hide');
            bankTFbtn.classList.remove('hide')
            cardTFbtn.classList.add('hide')
            bankTFbtn.innerText ="I have Transfered The Money";
            if(card.classList.contains('hide')){
                genBtn.classList.remove('hide')
            }else{
                genBtn.classList.add('hide')
            }
        break;
        case 'DebitCard': 
            // debit.classList.remove('hide');
            bankTF.classList.add('hide');
            Branch.classList.add('hide');
            bankTFbtn.classList.add('hide')
            cardTFbtn.classList.remove('hide')
            card.classList.add('hide')
        break;
        case 'BankDeposit':
            bankTF.classList.remove('hide');
            Branch.classList.add('hide');
            bankTFbtn.classList.remove('hide')
            cardTFbtn.classList.add('hide')
            methodTitle.innerText = "Bank Deposit"
            nameT.innerText = "Bank Name:";
            acName.innerText = "Account Number:"
            number.innerText= "Account Name:"
            if(card.classList.contains('hide')){
                genBtn.classList.remove('hide')
            }else{
                genBtn.classList.add('hide')
            }
            break;        
        case 'BranchDeposit' : 
            generateBD.classList.remove('hide');
            bankTFbtn.classList.remove('hide');
            cardTFbtn.classList.add('hide');
            bankTF.classList.add('hide');
            bankTFbtn.innerText ="I have Deposited The Money";
            // Branch.classList.remove('hide');
            if(card.classList.contains('hide')){
                Branch.classList.remove('hide')
            }else{
                Branch.classList.add('hide');
            }
            methodTitle.innerText = "Branch Deposit";
            nameT.innerText = "Branch Name:";
            acName.innerText = "Branch Address:"
            number.innerText= "Account ID:"
        break;
    }

})
