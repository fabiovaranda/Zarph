<!DOCTYPE html>
<html lang="en" ng-app='ZCA'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <?php include_once('head.html'); ?>

    <!-- Necessário para exportação de relatórios em PDF -->
    <script src='js/pdfmake/pdfmake-master/build/pdfmake.js'></script>
    <script src='js/pdfmake/pdfmake-master/build/vfs_fonts.js'></script>
    <!-- Zarph PDF files -->
    <script src='js/pdfmake/exportPDF.js'></script>
    <script src='js/pdfmake/configDataPDF.js'></script> <!-- informações sobre para cabeçalho e rodapé -->
    <script src='js/pdfmake/tableBorders.js'></script> <!-- definir borders para cada tipo de tabela -->
    <script src='js/pdfmake/styles.js'></script>
    <script src='js/pdfmake/header.js'></script>
    <script src='js/pdfmake/body.js'></script>
    <script src='js/pdfmake/footer.js'></script>
    
  </head>
  <body>
    <?php include_once('topBar.html'); ?>

    <div class='container-fluid'>

        <!--<div onload='searchLanguages()' ng-controller='controller_searchLanguage'>
                
            <ng-repeat='lang in languages'>
                {{lang.langID}}
            </ng-repeat>
        </div>-->

        <div class="row" ng-controller='controller_searchEquipmentSM'>

            <div class="col-lg-10 col-lg-offset-1">
                <div class='row'>   
                    <div class='col-lg-11'>
                        <form class="form-inline" >
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
                           <td>&nbsp;</td>   
                        </tr>
                        <tr ng-repeat='equip in equipments'>
                            <td>{{ equip.eid }}</td>
                            <td>{{ equip.bankid }}</td>
                            <td>{{ equip.sid }}</td>
                            <td>{{ equip.status }}</td>
                            <td>{{ equip.equipmentState }}</td>
                            <td>{{ equip.lastComDt }}</td>
                            <td>{{ equip.lastOperation }}</td>
                            <td>{{ equip.lastOperationDt }}</td>
                            <td>{{ equip.softwareVersion }}</td> 
                            <td>
                                <a href='#' title='Editar' data-toggle='modal' data-target='#myModal{{$index}}'>
                                    <span class='glyphicon glyphicon-edit'></span>
                                </a>
                                <?php include('modalEditEquipmentsSM.php'); ?>
                            </td>
                            <td>
                                <a href='#' title='Equipment State' data-toggle='modal' data-target='#modalStats{{$index}}'>
                                    <span class='glyphicon glyphicon-stats'></span>
                                </a>
                                <?php include('modalStats.php'); ?>
                            </td>
                        </tr>
                   
                    </table>
                </div>
            </div>

            <div class="col-lg-10 col-lg-offset-1">
                <hr/>
                <a class='btn btn-default' href='#' ng-click='exportReportOrder()'>
                    <span class='glyphicon glyphicon-import'></span>
                    Import Zarph Equipment file
                    <span class='label label-default'>JSON</span>
                </a>
                <a class='btn btn-default' href='#' ng-click='exportReportXLS()'>
                    <span class='glyphicon glyphicon-export'></span>
                    Export Equipment
                    <span class='label label-default'>XLS</span>
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

    <!-- Controllers -->
    <script src='js/controllers/searchEquipmentSM.js'></script>
    
    <!--<script src='js/controllers/searchLanguages.js'></script>-->

    <!-- classes -->
    <script src='js/classes/language.js'></script>
  </body>
</html>