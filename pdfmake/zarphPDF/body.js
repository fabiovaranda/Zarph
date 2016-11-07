

//tabela com n linhas e n colunas
var body1 = function(maxLinesPerPage = 34){
    var corpo = [];

    var lines = 0;
    var aux = [];
    for(var l = 0; l<50; l++){
        aux = [];
        if (l == 0){
            for(var c = 0; c<5; c++)
                aux[c] = {text: 'Col'+c, style:'columnHeader'};

            aux[5] = {text: 'Col'+c, style:'columnHeader', alignment:'center'};                            
        }else{
            if (l == 42){
                for(var c = 0; c<4; c++)
                    aux[c] = "";
                aux[4] = {text: "Subtotal", alignment: 'right'};
                aux[5] = {text: "somatório", alignment: 'center'};
            }else{
                if (l % 2 == 0){
                    for(var c = 0; c<5; c++)            
                        aux[c] = {text: 'xxxx', alignment: 'left'};
                    aux[5] = {text: "xxxx", alignment: 'center'};
                }else{
                    for(var c = 0; c<5; c++)            
                        aux[c] = {text: 'xxxx', style: 'oddRow'};
                    aux[5] = {text: "xxxx", style: 'oddRow', alignment: 'center'};
                }   
            }
        }   
        corpo[l] = aux;
        lines++;
    }

    for(var c = 0; c<4; c++)
        aux[c] = "";
    aux[4] = {text: "Total", style: 'oddRow', alignment: 'right'};
    aux[5] = {text: "somatório", style: 'oddRow', alignment: 'center'};
    corpo[l] = aux;
    
    var maxLinesWithoutFooter = 52;

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

//campo de observações que poderá ser adicionado a qualquer tipo de relatório
var observationsField = function(obs){
    return {
        table:{
            widths: ['*'],
            body: [
                [{text: 'Observações: ' + obs}]
            ]
        }, layout: allBorders
    }
}
