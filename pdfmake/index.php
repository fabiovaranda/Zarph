<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>pdfmake reports POC</title>
        <script src='pdfmake-master/build/pdfmake.js'></script>
        <script src='pdfmake-master/build/vfs_fonts.js'></script>
        
        <link href="bootstrap337/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <!--<script src='zarphPDF/underscore-min.js'></script>   Não está a ser utilizada    --> 
        
        <script src='zarphPDF/configDataPDF.js'></script> <!-- informações sobre para cabeçalho e rodapé -->
        <script src='zarphPDF/tableBorders.js'></script> <!-- definir borders para cada tipo de tabela -->
        <script src='zarphPDF/styles.js'></script>
        

        <script src='zarphPDF/header.js'></script>
        <script src='zarphPDF/body.js'></script>
        <script src='zarphPDF/footer.js'></script>
      
    </head>
    <body>
        
       <script>        

        //#1st - indicar as imagens que irão ser carregadas no pdf
        var imagesURL = [];
        imagesURL[0] = {"url":'img/logo.png',"width":100*0.709,"height": 100};
        imagesURL[1] = {"url":'img/graph.png',"width":200,"height": 200};
        
        var imagesURI = [];
        var imagesLoaded = 0;

        var breakPageAfterBody1 = false;
         
        var addImage = function(url, x, y, width, height){
             imagesURL[images.length] = {'url':url, 'width':width, 'height':height};
        }

        var getDataUri = function(imageref) {
            var image = new Image();

            image.onload = function () {
                var canvas = document.createElement('canvas');
                canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
                canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size
                canvas.getContext('2d').drawImage(this, 0, 0);
                imagesURI[imagesURI.length] = {"dataURI":canvas.toDataURL('image/png'), "width":imageref.width, "height":imageref.height};   
                if (++imagesLoaded == imagesURL.length)           
                    imageLoaded('reportName.pdf');
                else
                    getDataUri(imagesURL[imagesLoaded]);
                    
            }        
            image.onerror = function () {
                alert('Error on image loading');
                console.error("error loading image: " + imageref.url);
                imageLoaded();
            }
            image.src = imageref.url;
        }
        
        getDataUri(imagesURL[imagesLoaded]);
        
        //depois de todas as imagens carregadas, carrega os restantes dados do PDF
        var imageLoaded = function(reportName){            
            config(); // vem do ficheiro configDataPDF.js

            //#region dados para modelo 5
            var matrixHeader = [
                ['Company', '181 - Company', 'Equipment', '1', 'Timezone', 'GMT -2:00'], 
                ['Datetime', '2016-11-02 10:00', 'Delegation', '1', 'Currency', 'MZN'],
                ['User', '6', 'Period', '26', 'POS', '0']
            ];

            var matrix = [
                ['','Coin 0.01', 'Coin 0.02', 'Coin 0.05', 'Coin 0.10', 'Coin 0.20', 'Coin 0.50', 'Coin 1'],
                ['Quantity','0', '0','0','0','0','0','10'],
                ['Value','0', '0','0','0','0','0','10']
            ];

            var matrix2 = [
                ['','Total value', 'Quantity', 'Weight'],
                ["Coin's", '0', '0', '0.000 kg'],
                ["Bill's", '20.000', '100', '0.000 kg']
            ];
            
            var titleMatrix3 = "Doubts in coins and bills";
            var matrix3 = [
                ["Coin's", "Bill's", 'Envelopes'],
                ['0', '0', '0']
            ];
            //#endregion 

            //#region dados para modelo 6
            var matrixHeader2 = [
                ['Company', '1100 - ProCreditBank Bulgaria', 'Branch', '2'], 
                ['Datetime open', '2016-09-07 20:00', 'Equipment','1'],
                ['Datetime close', '', 'Period', '2'],
                ['Datetime printing', '2016-09-08 10:00', 'Timezone', 'Eastern European Time']
            ];

            var matrix4 = [
                ['Key', 'Depositor', 'Account', 'Type', 'Datetime', 'Amount EUR', 'Amount AOA'],
                ['1-2-2', '', '', 'Canceled', '2016-09-08 10:50', '', ''],
                ['1-2-2', '', '', 'Canceled', '2016-09-08 10:50', '', ''],
                ['1-2-2', '', '', 'Canceled', '2016-09-08 10:50', '', ''],
                ['1-2-2', '', '', 'Canceled', '2016-09-08 10:50', '', ''],
                ['', '', '', '', 'Total', '0', '0'],
                ['', '', '', '', 'Total Confirmed', '', '']
            ];
            //#endregion

            //#region dados para modelo 3
            var matrix5 = [ [{key: 'Data', value: "11/10/16"}, {key: 'Proposta', value: "PA1614776/1"}, {key: 'Código', value: "122548"}],
                            [{key: 'Página(s)', value: "1"}, {key: 'Vend', value: "VE98"}, {key: 'NIF', value: "123456789"}] ];

            var destinatario = {empresa:'Zarph SA', nome: "Sónia Matos", morada:"Rua Alves Redol, 9, loja C", codPostal: "2675-285 Odivelas" }
            //#endregion

            //#region dados para modelo 2
            var matrix6 = [ [{key: 'Encomenda n.º', value: "xxxx "}, {key: 'Data', value: "xxxx/xx/xx"}],
                            [{key: 'Fornecedor', value: "xxx xxx"}, {key: 'Produção', value: "xx xx"}] ];
            //#endregion

            //#region com dados para tabela com n colunas e 2 linhas
            var matrix7 = [{key:'Reference', value:'xxx'}, {key:'Sequencial Number', value:'xxx'}, {key:'Total Value', value:'xxx'}];
            var matrix8 = [{key:'Fornecedor', value:'xxx'}, {key:'Produção', value:'xxx'}, {key:'Data', value:'xxx'}];
            var matrix9 = [{key:'V/ Referência', value:'xxx'}, {key:'Forma Pedido', value:'xxx'}, {key:'Obra', value:'xxx'}, {key:'Elaborado Por', value:'xx xxx xxx'}];
            //#endregion

            //#region com dados para footers
            /*matriz com 2 linhas
                linha 1 - array com dados no lado esquerdo do footer
                linha 2 - array com dados para o lado dto do footer
            */ 
           
            var matrixFooter1 = [
                [
                    {key:'Observações', value:'xxx xxxx xxx xxx xxxx xxxx'},
                    {key:'Validade da proposta', value:'xxx x xxxx'},
                    {key:'Prazo de entrega', value:'xxxxxxx xxx'},
                    {key:'Preços', value:'xxx '}
                ],
                [
                    {key:'Total líq', value:'933.91'},
                    {key:'IVA 23% s/ 933.91', value:'214.80'},
                    {key:'Total', value:'1148.71'},
                    {key:'Moeda Doc', value:'EUR'},
                    {key:'Cond. Pagamento', value:'30 dias'}
                ]
            ]

            var matrixFooter2 = [
                [
                    {key:'Taxa', value:'23.00'},
                    {key:'Incidência', value:'403.00'},
                    {key:'Total IVA', value:'92.69'},
                    {key:'Motivo Isenção', value:''},
                    {key:'Local de carga', value:'Alfragide'},
                    {key:'Carga', value:'08/07/2016 às 14h15'},
                    {key:'Modo de expedição', value:'envio com..'},
                    {key:'Local de descarga', value:'Rua xxxx xx'},
                    {key:'Descarga', value:'xxx '},
                    {key:'Matrícula', value:''}
                ],
                [
                    {key:'Mercadorias/Serviços', value:'403.00'},
                    {key:'Descontos comerciais', value:'0.00'},
                    {key:'Desconto financeiro', value:'0.00'},
                    {key:'Portes', value:'0.00'},
                    {key:'Outros serviços', value:'0.00'},
                    {key:'Adiantamentos', value:'0.00'},
                    {key:'Ecovalor', value:'0.00'},
                    {key:'IEC', value:'0.00'},
                    {key:'IVA', value:'92.69'},
                    {key:'Acerto', value:'0.00'},
                    {key:'Total', value:'495.69'}
                ]
            ]
           
            //#endregion

            var docDefinition = {
                pageMargins: this._pageMargins, 
                pageSize : this._pageSize,
                fontSize: this._fontSize,
                content: [
                    //**************************************************************************************************//
                    //qdo definir os modelos de relatório, tem que se verificar qual o numero máximo de linhas por página de acordo com as combinações possíveis//
                    //**************************************************************************************************//

                    //modelo 1
                    /*headerVertical(), //vai buscar as informações da empresa ao ficheiro configDataPDF.js
                    twoLinesTable(matrix8),
                    body1(102),
                    footer(matrixFooter2)*/
                    

                    //modelo 2
                    headerHorizontal(),                    
                    headerToLetter(matrix6, destinatario),
                    body1(),                    
                    footer(matrixFooter2)
                    

                    //Modelo 3 
                    /*headerVertical(),
                    headerToLetter(matrix5, destinatario),
                    twoLinesTable(matrix9),
                    body1(),
                    footer(matrixFooter1)*/

                     //Modelo 4 
                   /* headerVertical(),
                    twoLinesTable(matrix8),         
                    body2(),
                    footer(matrixFooter1)*/
                    
                    //Modelo 5
                   /* headerVertical(),
                    headerTable(matrixHeader),
                    twoLinesTable(matrix7),
                    body3('',matrix, 100),
                    body3('',matrix, 100),
                    body3('',matrix2, 50),
                    body4(titleMatrix3, matrix3, 50),
                    observationsField('xxxx xxxx xxx xxxx xxxx xxx xxxx xxxx xxx xxxx xxxx xxxx xxxx \n'+ 
                    'xxxx xxx xxxx xxxx xxxxx xxxx xxxx xxx xxxx xxxx xxxx xxxx xxxx xxx xxxx xxxx xxxx \n')*/

                    //Modelo 6
                  /*  headerVertical(),
                    headerTable(matrixHeader2),
                    body5("título", matrix4, 100),
                    body3('EUR currency details', matrix, 100),
                    body3('',matrix2, 50),
                    body3('AOA currency details',matrix, 100),
                    body3('',matrix2, 50)*/




                ],                    
                footer: minimalFooterWithPrintDate, //minimalFooter, // vem do ficheiro footer.js
                header: minimalHeader, // vem do ficheiro header.js         
                styles: stylesPDF
            };
            pdfMake.createPdf(docDefinition).download(reportName);               
        }
         
        </script>
       
    </body>
</html>