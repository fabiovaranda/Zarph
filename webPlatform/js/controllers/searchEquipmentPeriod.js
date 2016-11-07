app.controller('controller_searchEquipmentPeriod', function($scope){
    $scope.search = function(){
        
        var di = $('#dataInicio').children()[0].value;
        var df = $('#dataFim').children()[0].value;
        
        if (  di > df )
            alert('invalid search');
        else
            alert('valid search');
        
    }
});