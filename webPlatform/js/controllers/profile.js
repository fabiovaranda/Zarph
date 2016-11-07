app.controller('controller_profile', ['$scope', '$http',
    function($scope, $http){
  
        $scope.submitFormEditUser = function(isValid){
            if ( isValid )
                alert('EditUser');
            else
                alert('nOK');
        }

        $scope.submitFormEditPassword = function(isValid){
            if ( isValid && $scope.pwd2 == $scope.pwd3 )
                alert('EditPwd');
            else
                alert('nOK');
        }

        $scope.submitFormEditPIN = function(isValid){
            if ( isValid && $scope.pin2 == $scope.pin3 )
                alert('EditPIN');
            else
                alert('nOK');
        }
    }
]);