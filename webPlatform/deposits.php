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
    <?php include_once('topBarFI.html'); ?>

    <div class='container-fluid'>
        <div class="row">

            <div class="col-lg-10 col-lg-offset-1">
                 <div class='row'>   
                    <div class='col-lg-11'>
                        <form class="form-inline"  ng-controller='controller_searchDeposits'>
                           <?php 
                                include_once('formPeriod.html');
                            ?>
                        </form>
                    </div>
                </div>
                <hr/>
                <center>
                    <h3>ProCredit Bulgaria | Deposits</h3>
                </center>
                <div class='table-responsive'>
                    <table class='table table-hover'>
                        <tr class='tableHeader'>
                           <td>Branch</td>
                           <td>EID</td>
                           <td>Period</td>
                           <td>#</td>
                           <td>Depositor</td>
                           <td>Account</td>
                           <td>Date Time</td>
                           <td>Type</td>
                           <td>Amount</td>
                           <td align='center'>Details</td>
                           <td align='center'>Report</td>    
                        </tr>
                        <?php
                            for($i=0; $i<5; $i++)
                                echo "
                                    <tr>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td>...</td>
                                        <td align='center'>
                                            <a href='#' title='Details'>
                                                <span class='label label-default'>PDF</span>
                                            </a>
                                        </td>
                                        <td align='center'>
                                            <a href='#' title='Report PDF'>
                                                <span class='label label-default'>PDF</span>
                                            </a>
                                        </td>
                                    </tr>";
                        ?>
                    </table>
                </div>
            </div>

        </div>
    </div>
    
    <!-- Module -->
    <script src="js/app.js"></script>

    <!-- Controllers -->
    <script src='js/controllers/searchDeposits.js'></script>        

    <?php include_once('bottomBar.html'); ?>
    <?php include_once('importJS.html'); ?>
    
  </body>
</html>