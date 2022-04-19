
async function login(){
    
    var usuario = document.getElementById('user').value;
    var password = document.getElementById('pwd').value;
    
    console.log(usuario);
    console.log(password);
    
} 

/*
** FUNCION QUE BLOQUEA EL BOTON BACK DEL NAVEGADOR
*/
function nobackbutton(){

    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    
    window.onhashchange = function(){
        window.location.hash = "no-back-button";
    }
    
}
