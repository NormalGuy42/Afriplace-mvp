var string = "230.000.000";
var unit = 'GNF'
var newString = string.split('.').join("");
var price = parseInt(newString);

let likes = 20;
if(likes == '20'){
    console.log(typeof likes);
}
if(likes === 20){
    console.log('Yay');
}else{
    console.log('Nay');
}