var flag = 0;  
function selects(){
    
    var ele=document.querySelectorAll(".form-check-input, .box-chk"); 
    if(flag!=0){
        for(var i=0; i<ele.length; i++){  
            if(ele[i].type=='checkbox'){
                ele[i].checked=false; 
            }            
        }
        flag = flag-1;       
    }else{
        for(var i=0; i<ele.length; i++){ 
            if(ele[i].type=='checkbox'){
                ele[i].checked=true;             
            }   
        } 
        flag = flag+1; 
    }  
}   

function validarChar(texto1, texto2){
    if(texto1.length > 120){
        alert('El nombre excede los 120 caracteres permitidos.');
        var salida = false;
    }   
    if(texto2.length > 500){
        alert('La descripción excede los 500 caracteres permitidos.');
        var salida = false;
    }
    if((texto1.length >=0 && texto1.length <=120) && (texto2.length>=0 && texto2.length<=500)){
        var salida = true;     
    }
    if((texto1.length == 0 && texto2.length == 0) || (((texto1 == "" || texto1 == " ") && (texto2 == "" || texto2 == " ")))){
        alert('Por favor, verifique que las casillas contengan datos válidos.');
        var salida = false;
    }

    return salida;
}

function verificarFecha(fechaInicial, fechaFinal) {
    const dia = 1;
    const feIni = new Date(document.getElementById("#"+fechaInicial).value);
    const feFin = new Date(document.getElementById("#"+fechaFinal).value);
    feIni.setDate(feIni.getDate() + dia);
    feFin.setDate(feFin.getDate() + dia);
    if (feFin < feIni) {
        alert("La fecha final no puede ser antes de la fecha inicial");
        return false
    }
}

function validarForm(char, fecha){
    if(fecha == true && char == true){
        return true;
    }else{
        return false;
    }
}


/* CÓDIGO OBSOLETO
const elemento1 = document.querySelector("#divactividad");
const elemento2 = document.querySelector("#divinicio");
const elemento3 = document.querySelector("#divconfig");
const elemento4 = document.querySelector("#divperfil");
const elemento5 = document.querySelector("#divchat");

function cambiarDisplay1(){
    if(elemento1.className === "div-ocultas"){
        elemento1.className = "div-inicio";
        elemento2.className = "div-ocultas";
        elemento3.className = "div-ocultas";
        elemento4.className = "div-ocultas";
        elemento5.className = "div-ocultas";
    }
}

function cambiarDisplay2(){
    if(elemento2.className === "div-ocultas"){
        elemento2.className = "div-inicio";
        elemento1.className = "div-ocultas";
        elemento3.className = "div-ocultas";
        elemento4.className = "div-ocultas";
        elemento5.className = "div-ocultas";
    }
}

function cambiarDisplay3(){
    if(elemento3.className === "div-ocultas"){
        elemento3.className = "div-inicio";
        elemento2.className = "div-ocultas";
        elemento1.className = "div-ocultas";
        elemento4.className = "div-ocultas";
        elemento5.className = "div-ocultas";
    }
}

function cambiarDisplay4(){
    if(elemento4.className === "div-ocultas"){
        elemento4.className = "div-inicio";
        elemento2.className = "div-ocultas";
        elemento3.className = "div-ocultas";
        elemento1.className = "div-ocultas";
        elemento5.className = "div-ocultas";
    }
}

function cambiarDisplay5(){
    if(elemento5.className === "div-ocultas"){
        elemento5.className = "div-inicio";
        elemento2.className = "div-ocultas";
        elemento3.className = "div-ocultas";
        elemento4.className = "div-ocultas";
        elemento1.className = "div-ocultas";
    }
} */