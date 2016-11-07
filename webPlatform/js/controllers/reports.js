app.controller('controller_reportsPDF', ['$scope','$http', 
    function ($scope, $http){

        $scope.getEntidade = function(){
            var nome = "Zarph, Payment & Cash Solutions";
            var morada = "Rua Alves Redol, 9 loja C";
            var codPostal = "2675-285 Odivelas";
            var tlf = "00351 219 382 300";
            var email = "geral@zarph.com";
            var site = "www.zarph.com";
            var nif = "xxx xxx xxx";
            var capSocial = "xxx.xxx€";
            var crc = "CRC Lisboa n.º xx";
            var img = "img/logoZarph.png";

            return {nome,morada, codPostal, tlf,email,site,nif,capSocial,crc,img};
        }       

        $scope.exportEncomenda = function(pages){
  
          var url = 'http://zarph28:8080/zarph-maintsys-ea-war/wpsx/doc?docType=5&docCode=50'; //encomenda com o código 50
        
          $http.get(url).success(
              function(response){

                var entidade = $scope.getEntidade();
                
                //entid, type, name, description, email, mobile, logo, contact, address, postalCode
                var fornecedor = response.doc.entity; 

                var info = { "docCode" : response.doc.docCode, "datetime" : response.doc.datetime , 'productCode': response.doc.productCode};

                var doc = new jsPDF(_orientation, _unit, _format);

                doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);

                doc.Encomenda(entidade, fornecedor, info, response.doc.docLins, pages);
                
                doc.producePDF('order_' + response.doc.docCode +'.pdf');
              }
          ).error(
              function(response){
                console.log(response);
              }
          );
        }

        $scope.reportType1 = function(pages){
            var entidade = $scope.getEntidade();
            var doc = new jsPDF(_orientation, _unit, _format);
            doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);
            doc.report1(entidade, pages);            
            doc.producePDF('reportType1.pdf');
        }

        $scope.reportType2 = function(pages){
            var entidade = $scope.getEntidade();
            var doc = new jsPDF(_orientation, _unit, _format);
            doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);
            doc.report2(entidade, pages);            
            doc.producePDF('reportType2.pdf');
        }

        $scope.reportType3 = function(pages){
            var entidade = $scope.getEntidade();
            var doc = new jsPDF(_orientation, _unit, _format);
            doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);
            doc.report3(entidade, pages);            
            doc.producePDF('reportType3.pdf');
        }

        $scope.reportType5 = function(pages){
            var entidade = $scope.getEntidade();
            var doc = new jsPDF(_orientation, _unit, _format);
            doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);
            doc.report5(entidade, pages);
                   
            doc.producePDF('reportType5.pdf');           
            
        }
        
        //depósito
        $scope.reportType6 = function(pages){
            var entidade = $scope.getEntidade();
            var doc = new jsPDF(_orientation, _unit, _format);
            doc.configurePage(_maxWidth, _maxHeight, _top, _left, _mbr, _lineWidth, _fontSize, _font);
            doc.report6(entidade, pages);            
          //  doc.producePDF('reportType6.pdf', "404R/03-2" , "Deposit");
        }

        $scope.exportReportType = function(){
                
                var img = "img/logoZarph.png";

                switch($scope.tipo){
                    case '1': 
                        $scope.reportType1($scope.numberOfPages);
                    break;
                    case '2': 
                        $scope.reportType2($scope.numberOfPages);
                    break;
                    case '3': 
                        $scope.reportType3($scope.numberOfPages);
                    break;
                    case '4': //encomenda                         
                        $scope.exportEncomenda($scope.numberOfPages);
                    break;
                    case '5':                          
                        $scope.reportType5($scope.numberOfPages);
                    break;
                    case '6':   //depósito                       
                        $scope.reportType6($scope.numberOfPages);
                    break;
                }
         
        }
        
    }
]
);
        