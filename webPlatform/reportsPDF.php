<html ng-app='ZCA'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <?php include_once('head.html'); ?>

        <!-- Necessário para exportação de relatórios em PDF -->
        <script type='text/javascript' src='js/jsPDF/jsPDFlib/dist/jspdf.debug.js'></script>
        <script type='text/javascript' src='js/jsPDF/jsPDFlib/plugins/from_html.js'></script>
        <script type='text/javascript' src='js/jsPDF/jsPDFlib/plugins/standard_fonts_metrics.js'></script>
        <script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/2.0.16/jspdf.plugin.autotable.js"></script>
        <!--<script src="https://gist.github.com/Purush0th/7fe8665bbb04482a0d80.js"></script>    plugin to align text -->
        <script type='text/javascript' src='js/jsPDF/jspdf.plugin.zarph.js'></script><!-- plugin jsPDF ZARPH-->
        <script type='text/javascript' src='js/pdfPageConfig.js'></script><!-- plugin jsPDF ZARPH-->
        
    </head>
    <body>
        
        <!--<a href='javascript:exportPDF()'>download PDF</a>-->
        <div class='container' ng-controller='controller_reportsPDF'>
            <div class='row'>
                <div class='col-lg-12'>
                    <br/>
                    <center><h1>Zarph Generate Reports</h1></center>                        
                    <br/>
                </div>
            </div>
            <form role='exportPDF'>
                <div class='row'>
                    <div class='col-lg-2 col-lg-offset-2'>
                        <p>Tipo</p>
                    </div>
                    <div class='col-lg-6'>
                        <select name='tipo' id='tipo' ng-model='tipo' class='form-control'>                            
                            <option value='1'>Tipo 1</option>
                            <option value='2'>Tipo 2</option>
                            <option value='3'>Tipo 3</option>
                            <option value='4'>Tipo 4 - Encomenda</option>
                            <option value='5'>Tipo 5</option>
                            <option value='6'>Tipo 6 - Depósito</option>
                        </select>
                    </div>
                </div>             
                <div class='row'>
                    <div class='col-lg-2 col-lg-offset-2'>
                        <p>Número de páginas</p>
                    </div>
                    <div class='col-lg-6'>
                        <input type='number' id='numberOfPages' ng-model='numberOfPages' class='form-control' value='2'/>
                    </div>
                </div>      
                <div class='row'>
                    <div class='col-lg-12'>
                        <center>                        
                        <br/>
                        <input type='submit' value='Exportar' ng-click='exportReportType()' class='btn btn-default'></input>
                        </center>                        
                    </div>
                </div>
            </form>
        </div>

        <?php include_once('bottomBar.html'); ?>

        <?php include_once('importJS.html'); ?>

        <!-- Module -->
        <!--<script src="js/app.js"></script>-->

        <!-- Controllers -->
        <script src='js/controllers/reports.js'></script>

    </body>
</html>