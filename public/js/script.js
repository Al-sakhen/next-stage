let alert= document.querySelector('.alert');

if(alert){
    setTimeout(function(){
        alert.remove();
    }, 2500);
}
