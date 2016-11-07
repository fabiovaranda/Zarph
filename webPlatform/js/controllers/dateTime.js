app.controller('refresh_control', function($scope, $interval){
        var d = Math.round(new Date().getTime());
        $scope.date = d;        
        var timer = $interval(function(){
        var d = Math.round(new Date().getTime());
        $scope.date = d; 
        },1000); //1000ms = 1s
    }
);
