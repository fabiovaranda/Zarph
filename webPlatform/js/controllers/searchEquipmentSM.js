app.controller('controller_searchEquipmentSM', ['$scope','$http', 
    function ($scope, $http){       
        
         $scope.searchLanguages = function(){
          var url = 'http://zarph28:8080/zarph-zps-ea-war/restapi/language';
          var params =  JSON.stringify({"authentication":{"entid": 1100, "uid": 8, "password": "1234"}});

          $http.post(url, params).success(
              function(data, status, headers, config) {
                $scope.languages = [];
                console.log(data);
                for (var i = 0; i < data.languages.length; i++)
                {
                    //langid, name, nativename, iso639_1 (ex: en, pt...)
                    var obj = {
                        langID : data.languages[i].langid, 
                        name : data.languages[i].name,
                        nativeName : data.languages[i].nativeName,
                        iso639_1 : data.languages[i].iso639_1
                    }
                    $scope.languages.push(obj);
                }
//                console.log("lang " + $scope.languages);
            }
          ).error(function(data, status, headers, config) {
                console.log("err search languages  "+status);
          });
        }

        $scope.exportReportXLS = function(){
        
          var url = 'http://zarph28:8080/zarph-zps-ea-war/restapi/equipment/details/report';
          var params =  JSON.stringify({"authentication":{"entid": 1100, "uid": 8, "password": "1234"}, "entid":1100, "format": "XLS"});

          //alert(url+' - '+params)
          /*
          $http.post(url, params).success(
              function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
                console.log(data);
                    
                var blob = new Blob([data], "application/vnd.ms-excel");
                var objectUrl = URL.createObjectURL(blob);
                window.open(objectUrl);
              }
                 
            
          ).error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log("err  "+status);
          });
          */
          /*$http.get(url,{
              params: JSON.stringify({"authentication":{"entid": 1100, "uid": 8, "password": "1234"}, "entid":1100, "format": "XLS"})
          });*/
          //$http.get(url);
          
         window.location.href=url;
        }


        $scope.exportReportOrder = function(){
            
          var url = 'http://zarph28:8080/zarph-maintsys-ea-war/wpsx/doc?docType=5&docCode=50'; //encomenda com o código 50
        
          $http.get(url).success(
              function(response){

                //#1st - indicar as imagens que irão ser carregadas no pdf
                addImage('img/logoZarph.png', 100 * logoZarphRacio, 100); //exportPDF.js

                //console.log(response);
                /*var doc2 = response.data.doc;
                var fornecedor = doc2.entity.name;

                var data = doc2.datetime;
                var docLin = response.data.docLin;
                console.log(response.data);
                console.log(response.status);*/

                var destinatario = {empresa:'Zarph SA', nome: "Sónia Matos", morada:"Rua Alves Redol, 9, loja C", codPostal: "2675-285 Odivelas" }

                var nome = "Zarph, Payment & Cash Solutions";
                var morada = "Rua Alves Redol, 9 loja C 2675-285 Odivelas";
                var tlf = "00351 219 382 300";
                var email = "geral@zarph.com";
                var site = "www.zarph.com";
                var nif = "xxx xxx xxx";
                var capSocial = "xxx.xxx€";
                var crc = "CRC Lisboa n.º xx";
                var img = "img/logoZarph.png";

                var entidade = {nome,morada,tlf,email,site,nif,capSocial,crc,img};
                
                //entid, type, name, description, email, mobile, logo, contact, address, postalCode
                var fornecedor = response.doc.entity; 

                var info = { "docCode" : response.doc.docCode, "datetime" : response.doc.datetime , 'productCode': response.doc.productCode};

                var doc = new jsPDF(orientation, unit, format);
                doc.configurePage(maxWidth, maxHeight, top, left, mbr, lineWidth, fontSize, font);

                doc.Encomenda(entidade, fornecedor, info, response.doc.docLins);
                
                doc.producePDF('order_' + response.doc.docCode +'.pdf');
                
              }
          ).error(
              function(response){
                console.log(response);
              }
          );
          
         
        }

        $scope.search = function(){
                 
          var url = 'http://zarph28:8080/zarph-zps-ea-war/restapi/equipment/details';
          var params =  JSON.stringify({"authentication":{"entid": 1200, "uid": 8, "password": "1234"}, "entid":1200});

         // alert(url+' - '+params)

          $http.post(url, params).success(
              function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
                //console.log("sucess"+data);
                // alert(data)
                // var x = JSON.stringify(data);
                // alert(x)
                // var x2 = JSON.parse(x);

                //var x2 = JSON.parse(data);

                //alert(data.equipments.length)
                if ( data.statusOper == 0 ){
                    $scope.equipments = [];
                    console.log(data);
                    for (var i = 0; i < data.equipments.length; i++)
                    {
                        var languages = [];
                        for (var j = 0; j< data.equipments[i].languages.length; j++){
                            languages[j] = data.equipments[i].languages[j].langid;
                        }
                        
                        //console.log(languages);
                        var obj = {
                            eid : data.equipments[i].equipment['eid'], 
                            bankid : data.equipments[i].equipment['bankid'], 
                            sid : data.equipments[i].equipment['sid'], //branch
                            etid : data.equipments[i].equipment['etid'], //type
                            status : data.equipments[i].equipment['status'],
                            equipmentState : data.equipments[i].equipmentState['equipmentState'], //se null tem q aparecer undefined
                            lastComDt: data.equipments[i].lastComDt,
                            lastOperation : data.equipments[i].lastOperation,
                            lastOperationDt : data.equipments[i].lastOperationDt,
                            softwareVersion : data.equipments[i].softwareVersion,
                            serialNumber: data.equipments[i].equipment['serialnumber'],
                            region: data.equipments[i].equipment['region'],
                            languages: languages,
                            currencies: data.equipments[i].currencies,
                            maxCoins: data.equipments[i].equipment['maxCoins'],
                            maxBills: data.equipments[i].equipment['maxBills'],
                            almostFullValue: data.equipments[i].equipment['almostFullValue'],
                            almostFullPerc: data.equipments[i].equipment['almostFullPerc'],
                            fullValue: data.equipments[i].equipment['fullValue'],
                            fullPerc: data.equipments[i].equipment['fullPerc'],
                            fullValueCid: data.equipments[i].equipment['fullValueCid'],
                            cardInsertionTimeout: data.equipments[i].equipment['cardInsertionTimeout'],
                            cardRemovalTimeout: data.equipments[i].equipment['cardRemovalTimeout'],
                            dataInsertionTimeout: data.equipments[i].equipment['dataInsertionTimeout'],
                            depositTimeout: data.equipments[i].equipment['depositTimeout'],
                            declarationTimeout: data.equipments[i].equipment['declarationTimeout'],
                            endpointAddress: data.equipments[i].equipment['endpointAddress']
                        }
                        
                        $scope.equipments.push(obj);
                        console.log($scope.equipments);
                    }
                    
                    $scope.searchLanguages();
                   
                }else{
                    alert('Error!');
                     //$scope.PostDataResponse = "login inválido"; 
                }
                
            }
          ).error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log("err  "+status);
          });
        }

        
    }
]
);
        