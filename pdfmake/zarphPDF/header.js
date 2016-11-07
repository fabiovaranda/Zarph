//header apenas com logotipo para aparecer a partir da 2ª página
var minimalHeader = function(currentPage){    
    return currentPage > 1 ? {
        style: 'header',
        table: {
            widths: ['*', '33%'],
            body:[
                    [
                        {text: '', alignment: 'center'},
                        {image: imagesURI[0].dataURI, width: imagesURI[0].width, alignment: 'right'}
                    ]
            ]
        },
        layout: 'noBorders' //bottomLineInTable*/
    } : null;
}

//informações da empresa na vertical
var headerVertical = function() {    
    return {
        style: 'header1Table',    
        table: {
            widths: ['*', '33%'],
            body:[
                    [
                        {
                            stack: [
                                {text:company.nome},
                                {text:company.morada},
                                {text:company.codPostal},
                                {text:company.telefone},
                                {text:company.email},
                                {text:company.site},
                                {text:"NIF " + company.nif},
                                {text:"Capital Social " + company.capSocial},
                                {text:company.crc} //margem que define o espaço até à linha horizontal
                            ]
                        },
                        {
                            stack: [
                                {image: imagesURI[0].dataURI, width: (imagesURI[0].width* 1.6), alignment: 'right'}
                            ]
                        }
                        
                    ]
            ]
        },
        layout: bottomLineInTable
    } 
}

//informações da empresa na horizontal 
var headerHorizontal = function() {   
    return {
        style: 'header1Table',           
        table: {
            widths: ['*', '33%'],
            body:[
                    [
                        {
                            stack: [
                                {text:company.nome},
                                {text:company.morada + " " + company.codPostal},
                                {text:company.telefone + " | " + company.email + " | " + company.site},
                                {text:"NIF " + company.nif + " | Capital Social " + company.capSocial + " | " +company.crc, margin: [0,0,0,0]}
                            ]
                        },
                        {
                            stack: [
                                {image: imagesURI[0].dataURI, width: imagesURI[0].width, margin: [0,0,0,0], alignment:'right'}
                            ]
                        }
                        
                    ]
            ]
        },
        layout: bottomLineInTable
    }
}

//cabeçalho para carta que recebe matriz de objetos {key,value} para tabela do lado esquerdo e objeto com dados do destinatário
//destinatario {empresa,nome,morada,codPostal}
var headerToLetter = function(matriz, destinatario){

        var corpo = [];

        var contaCols = matriz[0].length;
        var colWidth = (100/contaCols).toString()+"%";
        var colsWidths = [];
        for(var i=0; i<contaCols; i++) colsWidths[i] = colWidth;

        for(var l=0;l<matriz.length;l++){
            var linha = [];
            var linha2 = [];
            for(var c=0; c<matriz[l].length;c++){
                linha[c] = {text:matriz[l][c].key, style:'columnHeader2'};                
                linha2[c] = {text:matriz[l][c].value, alignment:'center'};
            }   
            corpo[l*2] = linha;
            corpo[l*2+1] = linha2;
        }
            
        var tb1 = {
            table:{
                headerRows:1,
                widths: colsWidths,
                body: corpo
            }, layout: 'noBorders'
        }

       return { 
           style: 'tableAfterHeader2',
            table:{
                widths: ['40%', '10%','*'],
                body:[
                    [tb1,'', {text:destinatario.empresa + "\n" + destinatario.nome+ "\n" + destinatario.morada + "\n" + destinatario.codPostal, alignment: 'left', fontSize:10}]
                ]
            },
            layout: 'noBorders'
       }
}

//tabela com n colunas e linhas
var headerTable = function(matrix){
    
    var corpo = [];

    var colWidths = (100 / matrix[0].length).toString() + "%";
    var colsWidths = [];
    for(var i = 0; i<matrix[0].length;i++)
        colsWidths[i] = colWidths; 
    
    for(var l = 0; l < matrix.length; l++){
        var aux = []
        for(var c = 0; c < matrix[l].length; c++){
            if (c%2 == 0)
                aux[c] = {text:matrix[l][c], style:'afterHeader5ColNames'};
            else 
                aux[c] = {text:matrix[l][c], style:'afterHeader5Values'};
        }
        corpo[l] = aux;
    }

    return {
        style: 'tableAfterHeader2',
        table:{
            headerRows:0,
            widths: colsWidths, //['20%', '20%', '15%', '10%', '20%', '*'],
            body: corpo
        }, layout: horizontalLinesInTable
    }
}

//devolve tabela com n colunas e 2 linhas || Recebe um array de objetos
//exemplo: [{key:'Reference', value:'xxx'}, {key:'Sequencial Number', value:'xxx'}, {key:'Total Value', value:'xxx'}];
var twoLinesTable = function(matrix){
    var corpo = [];
    var linha1 = [];
    var linha2 = [];
    for(var l=0; l<matrix.length; l++){
        linha1[l] = matrix[l].key;
        linha2[l] = matrix[l].value; 
    }
    corpo[0] = linha1;
    corpo[1] = linha2;
    
    //cálculo da largura de cada coluna da tabela 
    var colWidth = (100/matrix.length).toString() + "%";
    var colsWidths = [];
    for(var i = 0;i<matrix.length;i++)
        colsWidths[i] = colWidth;

    return { 
        style: 'tableAfterHeader',
        table:{
            widths: colsWidths, //['33%', '*', '33%'],
            body: corpo
        },
        layout: middleLineInTable
    }
}