
function voltar(){
    document.getElementById("back").addEventListener("click", function(){
        history.back();
    });
}

window.addEventListener("load", voltar);