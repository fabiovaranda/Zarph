<!DOCTYPE html>
<html lang="en" ng-app='ZCA'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <?php include_once('head.html'); ?>      
    
  </head>
  <body>
    <?php include_once('topBarNM.html'); ?>

    <div class='container-fluid'>
        <div class="row">

            <div class="col-lg-10 col-lg-offset-1">
                <div class='row'>   
                    <div class='col-lg-11'>
                        <form class="form-inline">
                           <?php include_once('formSearchForEquipments.html'); ?>
                        </form>
                    </div>
                </div>

                <hr/>
                <center>
                    <h3>ProCredit Bulgaria | Equipment</h3>
                </center>
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <tr class='tableHeader'>
                           <td>EID</td>
                           <td>Bank</td>
                           <td>Branch</td>
                           <td>Status</td>
                           <td>Equip. State</td>
                           <td>DT Last Comm.</td>
                           <td>Last Op.</td>
                           <td>Last Op. DT</td>
                           <td>SW Ver.</td>
                           <td>&nbsp;</td>  
                        </tr>
                        <?php
                            for($i=0; $i<5; $i++){
                                echo "
                                    <tr>
                                        <td>1</td>
                                        <td>1100</td>
                                        <td>2: Burgas...</td>
                                        <td>Offline</td>
                                        <td></td>
                                        <td>2016-09-08 11:11:00</td>
                                        <td>D. Canceled</td>
                                        <td>2016-09-08 11:10:20</td>
                                        <td>01.002.00</td> 
                                        <td>
                                            <a href='#' title='Equipment State' data-toggle='modal' data-target='#modalStats$i'>
                                                <span class='glyphicon glyphicon-stats'></span>
                                            </a>
                                        </td>
                                    </tr>
                                ";
                                include_once('modalStats.php');
                            }
                                
                        ?>
                        
                    </table>
                </div>
            </div>

            <div class="col-lg-10 col-lg-offset-1">
                <hr/>
                <a class='btn btn-default' href='#'>
                    <span class='glyphicon glyphicon-ban-circle'></span>
                    Set All Manually Out of Service
                </a>
                <a class='btn btn-default' href='#'>
                    <span class='glyphicon glyphicon-ok-circle'></span>                    
                    Set All Manually In Service
                </a>
            </div>

        </div>
    </div>

    <script>
        function enableTextBox(obj){
            var aux = obj.id;
            aux = aux.split('_');
            idminAmount = "minAmount_" + aux[1];
            idmaxAmount = "maxAmount_" + aux[1];            
            if ( document.getElementById(idminAmount).disabled ){
                document.getElementById(idminAmount).disabled = false;
                document.getElementById(idmaxAmount).disabled = false;
            }else{
                document.getElementById(idminAmount).disabled = true;
                document.getElementById(idmaxAmount).disabled = true;
            }           
        }
    </script>

    <?php include_once('bottomBar.html'); ?>

    <?php include_once('importJS.html'); ?>
  </body>
</html>