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

//tabela com n linhas e n colunas
var body1 = function(maxLinesPerPage = 34){
    var corpo = [];

    var lines = 0;
    for(var l = 0; l<50; l++){
        var aux = [];
        if (l == 0)
            for(var c = 0; c<6; c++)            
                aux[c] = {text: 'Col'+c, style:'columnHeader'};            
        else{
            if (l % 2 == 0)
                for(var c = 0; c<6; c++)            
                    aux[c] = {text: 'Затвори', alignment: 'left'};
            else 
                for(var c = 0; c<6; c++)            
                    aux[c] = {text: 'Затвори', style: 'oddRow'};
        }   
        corpo[l] = aux;
        lines++;
    }
    
    var maxLinesWithoutFooter = 52;

    console.log((lines % maxLinesWithoutFooter))
    if ( (lines % maxLinesWithoutFooter) >= maxLinesPerPage ){ //máximo de linhas por página -> 34
        return {
            style: 'bodyTable',
            table: {
                headerRows:1,
                widths: ['10%','20%','20%','20%','20%','10%'],
                body: corpo
            },
            layout: borders,
            pageBreak:'after'
        } 
    }else{
        return {
            style: 'bodyTable',
            table: {
                headerRows:1,
                widths: ['10%','20%','20%','20%','20%','10%'],
                body: corpo
            },
            layout: borders
        } 
    }
}

//corpo com listagem do lado esquerdo e imagem do lado direito
var body2 = function(){
    var corpo = [];

    var lines = 0;
    var ll = 20;
    for(var l = 0; l< ll; l++){
        var aux = [];
        if (l == 0)
            for(var c = 0; c<2; c++){
                if ( c == 0 )
                    aux[c] = {text: 'Col'+c, style:'columnHeader'};
                else
                    aux[c] = {image: imagesURI[1].dataURI, width: imagesURI[1].width, alignment: 'center', rowSpan:ll};
            }            
        else{
            if (l % 2 == 0)
                for(var c = 0; c<1; c++)            
                    aux[c] = {text: 'Затвори', alignment: 'left'};
            else 
                for(var c = 0; c<1; c++)            
                    aux[c] = {text: 'Затвори', style: 'oddRow'};
            aux[1] = '';
        }   
        corpo[l] = aux;
        lines++;
    }
        
    if ( (lines % 52) >= 34 ){ //máximo de linhas por página -> 34
        return {
            style: 'bodyTable',
            table: {
                headerRows:1,
                widths: ['50%','*'],
                body: corpo
            },
            layout: borders,
            pageBreak:'after'
        } 
    }else{
        return {
            style: 'bodyTable',
            table: {
                headerRows:1,       
                widths: ['50%','*'],         
                body: corpo
            },
            layout: borders
        } 
    }
}

//listagem  com campo - valor 
var body3 = function(title='', matrix, widthPercentage){
    var corpo = [];
    
    var numCols = matrix[0].length;
    var widthColumns = (widthPercentage/numCols).toString() + "%";    
    var widthsCols = [];
    for (var w = 0; w<8; w++)
        widthsCols[w] = widthColumns;    
    
   
    
    for(var l = 0; l < matrix.length; l++){
        var aux = [];
        for (var c = 0; c < matrix[l].length; c++){
            if ( c == 0  || l == 0)
                aux[c] = {text: matrix[l][c], style:'columnHeader'};
            else
                aux[c] = {text: matrix[l][c], alignment:'center'};
        }
        corpo[l] = aux;
    }
    
    if ( title != "" ) title =  {text: title, fontSize:10};
    
    return {
        stack: [
            title,
            {
                style: 'body3Table',
                table: {
                    headerRows:1,       
                    widths: widthsCols,         
                    body: corpo
                },
                layout: horizontalLinesInTable
            }
        ]
    }
}

//tabela com titulo na primeira linha, subtitulo na 2ª linha e valores na 3ª linha 
var body4 = function(title, matrix, widthPercentage){
    var corpo = [];
    
    var numCols = matrix[0].length;
    var widthColumns = (widthPercentage/numCols).toString() + "%";    
    var widthsCols = [];
    for (var w = 0; w<numCols; w++)
        widthsCols[w] = widthColumns;    
    
    var temTitulo = 0;
    if ( title != "" ){
        corpo[corpo.length] = [{text: title, style:'columnHeader', colSpan: numCols}, '', ''];
        temTitulo = 1;
    }
    
     
    for(var l = 0; l < matrix.length; l++){
        var aux = [];
        for (var c = 0; c < matrix[l].length; c++)
            aux[c] = {text: matrix[l][c], alignment:'center'};
        corpo[l+temTitulo] = aux;
    }            
    
    return {
        style: 'body3Table',
        table: {
            headerRows:1,       
            widths: widthsCols,         
            body: corpo
        },
        layout: horizontalLinesInTable
    }
}

var searchPartOfStringInArray = function(arr, str){
    for(var i = 0; i<arr.length; i++)
        if (arr[i].search(str)==0)
            return i;
    return 0;
}

//tabela com titulo na primeira linha, subtitulo na 2ª linha, valores na 3ª linha e totais
var body5 = function(title, matrix, widthPercentage){
    var corpo = [];
    
    var numCols = matrix[0].length;
    var widthColumns = (widthPercentage/numCols).toString() + "%";    
    var widthsCols = [];
    for (var w = 0; w<numCols; w++)
        widthsCols[w] = widthColumns;    
    
    var temTitulo = 0;
    if ( title != "" ){
        corpo[corpo.length] = [{text: title, style:'columnHeader', colSpan: numCols}, '', ''];
        temTitulo = 1;
    }
         
    for(var l = 0; l < matrix.length; l++){
        var aux = [];
        var contaColunasVazias = 0;

        var ind = searchPartOfStringInArray(matrix[l], 'Total');

        if ( ind > 0){
            
            for (var c = 0; c < matrix[l].length; c++){
                if ( c == 0 )
                    aux[c] = {text: matrix[l][ind], alignment:'right', colSpan: ind+1};
                else{
                    if ( c < ind )
                        aux[c] = '';
                    else
                        aux[c] = {text: matrix[l][c], alignment:'center'};
                }
            }
        }else{
            for (var c = 0; c < matrix[l].length; c++)
                aux[c] = {text: matrix[l][c], alignment:'center'};
        }

        corpo[l+temTitulo] = aux;
    }            
    
    
    return {
        style: 'body3Table',
        borderLines: [[1,1,0,0,0]],
        table: {
            headerRows:1,       
            widths: widthsCols,         
            body: corpo
        },
        layout: horizontalLinesInTableWithTotals
    }
}
