app.controller('controller_login', ['$scope','$http', 
    function ($scope, $http){        
        $scope.login = function(){          
          var url = 'http://zarph28:8080/zarph-zps-ea-war/restapi/authenticate/';
          var params =  JSON.stringify({"entid": 1100, "uid": $scope.user.id, "password": $scope.user.password});

          $http.post(url, params).success(
              function(data, status, headers, config) {
                // this callback will be called asynchronously
                // when the response is available
                // console.log("sucess"+data);
                var x = JSON.stringify(data);
                var x2 = JSON.parse(x);
                if ( x2.statusOper == 0) 
                    window.location='profile.php';
                else 
                    $scope.PostDataResponse = "login inválido"; 
            }
          ).error(function(data, status, headers, config) {
                // called asynchronously if an error occurs
                // or server returns response with an error status.
                console.log("error on post login - "+status);
          });
        }
    }
]
);
        