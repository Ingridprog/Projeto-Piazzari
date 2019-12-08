function validarEntrada(caracter, typeBlock)
{
    var tipo = typeBlock;
    
    //Serve para padronizar a conversão em ascoo em todas as versões de navegadres. Os que são baseadas em janela ou não 
    if(window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which;
    if(tipo == "numeric"){
        // valida apenas a digitação de letras    
        if(asc >=48 && asc <=57)
            return false;    
    }else if(tipo == "string"){
       // valida apenas a digitação de números
       if(asc < 48 || asc > 57)
           return false;
    } 
}

//Função que formata o telefone e o celular
function mascaraFone(obj, caracter)
{
   // valida a entrada 
    if (validarEntrada(caracter, "string")==false)
    {
        return false;   
    }    
    else{
       //variaveis 
        var input = obj.value;
        var id = obj.id;
        var resultado = input;
       
       //mascara 
        if(input.length ==0)
            resultado = "(";
        else if (input.length == 4)
            resultado += ") ";
        else if (input.length == 10)
            resultado += "-";
        else if(input.length == 15)
            return false;
       
       // envia para o html
        document.getElementById(id).value = resultado; 
        
        }
}

//Mascara CPF
function mascaraCpf(objeto, caracter){

    //valida entrada
    if(validarEntrada(caracter, 'string')==false)
        return false;
    else
    {
        //variaveis
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

//Mascara CPF
function mascaraData(objeto, caracter){

    //valida entrada
    if(validarEntrada(caracter, 'string')==false)
        return false;
    else
    {
        //variaveis
        var input = objeto.value;
        var id = objeto.id;
        var resultado = input;

        if(input.length == 2)
            resultado += "/";
        else if(input.length == 5)
            resultado += "/";

        document.getElementById(id).value = resultado;
    }
        
}


	