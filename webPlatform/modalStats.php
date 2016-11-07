<!-- Modal -->
<?php

$page = explode("/", $_SERVER['REQUEST_URI']);
$page = $page[2];

?>
<div class='modal fade' id='modalStats{{$index}}' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
    <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
            <div class='modal-header'>
                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                <h4 class='modal-title' id='myModalLabel'>Equipment State</h4>
                <span class='label label-danger'>Out of service</span>
            </div>
            <div class='modal-body'>
            
                <div class='row'>
                    <div class='col-lg-4 col-md-4 panel panel-default' >
                        <div class='panel-body'>
                            <label class='fieldNameForm'>Printer</label>
                            <span class='label label-success'>Ok</span>
                            <hr/>
                            <label class='fieldNameForm'>Card Reader</label>
                            <span class='label label-success'>Ok</span>
                            <hr/>
                            <label class='fieldNameForm'>Network</label>
                            <span class='label label-success'>Online</span>
                            <hr/>
                            <label class='fieldNameForm'>UPS</label>
                            <span class='label label-danger'>Out of service</span>
                            <hr/>
                            <label class='fieldNameForm'>Manual State</label>
                            <span class='label label-warning'>Out of service by Central Request</span>
                        </div>
                    </div>
                    <div class='col-lg-6 col-md-6' >
                        <div class='panel panel-default'>
                            <div class='panel-heading'><h3 class='panel-title'>Switchs</h3></div>
                            <div class='panel-body'>
                                <div class='leftSpace'>
                                    <label class='fieldNameForm'>Left door</label>
                                    <span class='label label-success'>Closed</span><br/>
                                    <label class='fieldNameForm'>Right door</label>
                                    <span class='label label-success'>Closed</span><br/>
                                    <label class='fieldNameForm'>Maintenance structure</label>
                                    <span class='label label-success'>Installed</span><br/>
                                    <label class='fieldNameForm'>Safe door</label>
                                    <span class='label label-danger'>Opened</span><br/>
                                    <label class='fieldNameForm'>Bag</label>
                                    <span class='label label-success'>Installed</span><br/>
                                    <label class='fieldNameForm'>Escrow open</label>
                                    <span class='label label-success'>Closed</span>
                                </div>
                            </div>
                        </div>
                        <div class='panel panel-default'>
                            <div class='panel-heading'><h3 class='panel-title'>Bag storage level</h3></div>
                            <div class='panel-body'>
                                <div class='leftSpace'>
                                    <label class='fieldNameForm'>Quantity</label>
                                    <span class='label label-success'>Ok</span><br/>
                                    <label class='fieldNameForm'>Max Amount</label>
                                    <span class='label label-success'>Ok</span>
                                </div>
                            </div>
                        </div>
                    </div>
<?php 
                    if ( $page == "equipmentsNM.php")
                    echo "
                    <div class='col-lg-2 col-md-2'>
                        <div class='btn-group-vertical' role='group'>
                        <a href='#' class='btn btn-default'>Restart</a>
                        <a href='#' class='btn btn-default'>Shutdown</a>
                        <a href='#' class='btn btn-default'>Unlock Escrow</a>
                        <a href='#' class='btn btn-default'>Out of Service</a>
                        </div>
                    </div>";
?>
  
                </div>
            </div>
        </div>
    </div>
</div>