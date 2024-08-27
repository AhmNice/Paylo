const states = document.getElementById('state');
const lgas = document.getElementById('lga');

let data = []

//  function fetchState(){
//     fetch('json/nigeria-state.json')
//     .then(response => response.json())
//     .then(result =>{
//         data = result;
//         datas = result;
//         datas.forEach(data => {
//             let option = document.createElement('option');
//             option.value=`${data.state}`;
//             option.innerText = `${data.state}`
//             states.appendChild(option); 
//         });
//     })
// }
//***** *** populating the local government *******
// states.addEventListener('change',()=>{
//     function getLga(state,keyword){
//         return state.filter()
//     }
//     console.log(states.value)
// })
// fetchState();
async function fetchStates(){
    try{
        response = await fetch('json/nigeria-state.json')
        if(!response.ok){
            throw new Error ('cant fetch file from source')
        }
        data = await response.json();
        data.forEach(data => {
            let option = document.createElement('option');
                    option.value=`${data.state}`;
                    option.innerText = `${data.state}`
                    states.appendChild(option); 
        });
        states.addEventListener('change',()=>{
            let selected = states.value;
            lgas.innerHTML='';
            const selectedState = data.find(item => item.state === selected)
            console.log(selectedState);
            if(selectedState){
               selectedState.lgas.forEach(lga=>{
                let optionLga = document.createElement('option');
                optionLga.value=lga;
                optionLga.innerText=lga;
                lgas.appendChild(optionLga)
               })
            }else{
                console.log('dd');
            }
        });
    }catch{
        console.log('something went wrong while fetching data')
    }
}

fetchStates()
