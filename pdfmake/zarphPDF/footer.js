var getDateTime = function(){
    var d = new Date();
    return  d.getFullYear() + "/" + (d.getMonth() + 1) + "/" + d.getDate() + " " + 
            d.getHours()+":"+d.getMinutes();
}

var minimalFooter = function(currentPage, pageCount) { 
    return {
        style: 'footer',
        table:{
            widths: ['33%', '*', '33%'],
            body:[
                    [
                    {text: this.docName, alignment: 'left'},
                    {text: this.subject, alignment: 'center'},
                    {text: currentPage.toString() + '/' + pageCount, alignment: 'right'}
                ],
                [
                    {text: "docCode ISO 9001", alignment: 'left', style:'footer2ndLine'},
                    "",
                    {text: "Powered by Zarph", alignment: 'right', style:'footer2ndLine'}
                ]
            ]  
        },
        layout:  
        {
            hLineWidth: function(i, node) {
                return (i === 0) ? 0.5 : 0;
            },
            vLineWidth: function(i, node) {
                return 0;
            },
            hLineColor: function(i, node){
                return zarphColor; //styles.js
            },
        }
    }
}

var minimalFooterWithPrintDate = function(currentPage, pageCount) { 
    return {
        style: 'footer',
        table:{
            widths: ['33%', '*', '33%'],
            body:[
                [
                    {text: this.docName, alignment: 'left'},
                    {text: this.subject, alignment: 'center'},
                    {text: currentPage.toString() + '/' + pageCount, alignment: 'right'}
                ],
                [
                    {text: "Print date " + getDateTime(), alignment: 'left', style:'footer2ndLine'},
                    "",
                    {text: "Powered by Zarph", alignment: 'right', style:'footer2ndLine'}
                ],
                [
                    {text: "docCode ISO 9001", alignment: 'left', style:'footer2ndLine'},
                    "",
                    ""
                ]
            ]  
        },
        layout:  
        {
            hLineWidth: function(i, node) {
                return (i === 0) ? 0.5 : 0;
            },
            vLineWidth: function(i, node) {
                return 0;
            },
            hLineColor: function(i, node){
                return zarphColor; //styles.js
            },
        }
    }
}

// observações, validade da proposta, prazo de entrega, preços...
var footer = function(matrix) {
    //matrix[0] -> lado esquerdo do footer
    //matrix[1] -> lado direito do footer
    
    var colsWidths = ['30%','*']; //por defeito vem preparado para 2 colunas e n linhas
    var corpo1 = [[]];
    
    if ( matrix[0].length > 5) {
        //se o lado esquerdo tiver mais do que 5 células, faz-se uma tabela com 3 colunas
        var colsWidths = ['33%','33%','*']; 

        var linhas = -1;
        var col = 0;

        for(var i = 0; i<matrix[0].length; i++){
            if ( (i % 3) == 0 ){
                linhas++;
                col=0;
                corpo1[linhas*2] = [];
                corpo1[linhas*2+1] = []; 
            }
            corpo1[linhas*2].push({text: matrix[0][i].key, style: 'oddRow'});
            corpo1[linhas*2+1].push({text: matrix[0][i].value, alignment: 'left'});
            col++;
        }
        
        for (var i=col%3; i<3; i++){
            corpo1[linhas*2].push({text: "", style: 'oddRow'});
            corpo1[linhas*2+1].push("");
        }
        
    } else{ //lista com chave e valor
        for(var i = 0; i<matrix[0].length; i++){
            if (i%2!=0)
                corpo1[i] = [
                    {text: matrix[0][i].key, alignment: 'left'},
                    {text: matrix[0][i].value, alignment: 'left'}
                ];
            else
                corpo1[i] = [
                    {text: matrix[0][i].key, style: 'oddRow'},
                    {text: matrix[0][i].value, style: 'oddRow'}
                ];
        }
    }
    var tb1 = {
        table: {
            widths: colsWidths,
            body: corpo1
        }, layout: 'noBorders'
    }

    var corpo2 = [];
    colsWidths = ['70%','*'];
    for(var i = 0; i<matrix[1].length; i++){
        if (i%2!=0)
            corpo2[i] = [
                {text: matrix[1][i].key, alignment: 'left'},
                {text: matrix[1][i].value, alignment: 'right'}
            ];
        else
            corpo2[i] = [
                {text: matrix[1][i].key, style: 'oddRow'},
                {text: matrix[1][i].value, style: 'oddRow', alignment: 'right'}
            ];
    }

    var tb2 = {
        table: {
            widths: colsWidths,
            body: corpo2
        }, layout: 'noBorders'
    }

    return {
        style: 'footer1',
        table:{
            headerRows: 0,
            widths: ['60%', '*', '30%'],
            body:[
                    [
                        tb1,
                        {text: "", alignment: 'left'},
                        tb2
                    ]
            ]
        },
        layout:  
        {
            hLineWidth: function(i, node) {
                return (i === 0) ? 0.5 : 0;
            },
            vLineWidth: function(i, node) {
                return 0;
            },
            hLineColor: function(i, node){
                return zarphColor; //styles.js
            },
        }
    }
}