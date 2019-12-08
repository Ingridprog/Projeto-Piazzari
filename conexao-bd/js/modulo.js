function validarEntrada(caracter, typeBlock)
{
    var tipo = typeBlock;
    //console.log(caracter);
    //charCode - converte o caracter digitado em ascii
    
    //Serve para padronizar a conversão em ascoo em todas as versões de navegadres. Os que são baseadas em janela ou não 
    if(window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which;
    if(tipo == "numeric"){
        // valida apenas a digitação de letras    
        if(asc >=48 && asc <=57)
            return false; // cancela o evento da tecla digitada    
    }else if(tipo == "string"){
       if(asc < 48 || asc > 57)
           return false;
    } 
}

function mascaraFone(obj, caracter)
{
    if (validarEntrada(caracter, "string")==false)
    {
        return false;   
    }    
    else{
        var input = obj.value;
        var id = obj.id;
        var resultado = input;

        if(input.length ==0)
            resultado = "(";
        else if (input.length == 4)
            resultado += ") ";
        else if (input.length == 10)
            resultado += "-";
        else if(input.length == 15)
            return false;

        document.getElementById(id).value = resultado; 
        
        }
}

//Mascara CPF
function mascaraCpf(objeto, caracter){
    if(validarEntrada(caracter, 'numeric')==false)
        return false;
    else
    {
        var input = objeto.value;
        var id = objeto.id;
        var resultado = input;

        if(input.length == 3)
            resultado += ".";
        else if(input.length == 7)
            resultado += ".";
        else if(input.length == 11)
            resultado += "-";

        document.getElementById(id).value = resultado;
    }
        
}