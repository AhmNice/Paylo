let regex = /(?=(.*[a-zA-Z]){3,})(?=(.*\d){2,})(?=(.*[^a-zA-Z\d]){2,})/
let username = 'U';
// console.log(regex.test(username));

function check(username){
    return
regex.test(username);
}
if(!check(username)){
    console.log("working")
}else{
    console.log("failed")
};
if(!check(username)){
    console.log("working")
}else{
    console.log("failed")
}