app.controller('controller_searchLanguages', ['$scope','$http', 
    function ($scope, $http){        
        $scope.searchLanguages = function(){
                 
          var url = 'http://zarph28:8080/zarph-zps-ea-war/restapi/language';
          var params =  JSON.stringify({"authentication":{"entid": 1100, "uid": 8, "password": "1234"}});

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
                $scope.languages = [];

                for (var i = 0; i < data.language.length; i++)
                {
                    //langid, name, nativename, 
                    var obj = {
                        langID : data.equipments[i].LangID, 
                        name : data.equipments[i].Name,
                        nativeName : data.equipments[i].NativeName
                    }
                    $scope.languages.push(obj);
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
        