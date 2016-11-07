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
    <?php include_once('topBarSU.html'); ?>

    <div class='container-fluid'>
        <div class="row">

            <div class="col-lg-10 col-lg-offset-1">
                <div class='row'>
                    <div class='col-lg-11'>
                        <form class="form-inline">
                            <div class="form-group">
                                <p class='text-muted'>Users</p>
                                <input type='text' class="form-control" name='userTxtSearch' id='userTxtSearch' /> 
                            </div>
                            <div class="form-group">
                                <p class='text-muted'>&nbsp;</p>
                                <input type="submit" value='Search' class="btn btn-default" />
                            </div>
                        </form>
                    </div>
                    <div class='col-lg-1'>
                        <p class='text-muted'>&nbsp;</p>
                        <a href='#' class='btn btn-default'  data-toggle='modal' data-target='#modalNewUser'>New User</a>
                    </div>
                </div>                

                <hr/>
                <center>
                    <h3>Users</h3>
                </center>
                <div class='row'>
                    <div class='col-lg-4 col-md-4'>
                        <!-- Listagem de utilizadores -->
                        <div class='table-responsive'>
                            <table class='table table-hover'>
                                <tr class='tableHeader'>
                                <td>ID</td>
                                <td>Name</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>    
                                </tr>
                                <?php
                                    for($i=0; $i<5; $i++)
                                        echo "
                                            <tr>
                                                <td>...</td>
                                                <td>...</td>
                                                <td align='center'>
                                                    <a href='#' title='Edit User'>
                                                        <span class='glyphicon glyphicon-edit'></span>
                                                    </a>
                                                </td>
                                                <td align='center'>
                                                    <a href='#' title='Delete User'>
                                                        <span class='glyphicon glyphicon-trash'></span>
                                                    </a>
                                                </td>
                                            </tr>";
                                ?>
                                
                            </table>
                        </div>
                    </div>
                    <div class='col-lg-8 col-md-8'>
                        <!-- Formulário para editar utilizador -->
                        <form role='editUser'>
                        <div class='panel panel-default'>  
                            <div class='panel-heading'><h3 class='panel-title'>Edit User</h3></div>
                            <div class='panel-body'>
                                <div class='row'>
                                    <div class='col-lg-2 col-md-2'> 
                                        <p class='text-muted'>ID</p>
                                        <input type='text' name='id' id='id' value='3' class='form-control' disabled/>
                                    </div>
                                    <div class='col-lg-4 col-md-4'>
                                        <p class='text-muted'>Name</p> 
                                        <input type='text' name='name' id='name' class='form-control' required/>
                                    </div>
                                    <div class='col-lg-4 col-md-4'>
                                        <p class='text-muted'>E-mail</p> 
                                        <input type='text' name='email' id='email' class='form-control'/>
                                    </div>
                                    <div class='col-lg-2 col-md-2'> 
                                        <p class='text-muted'>Mobile phone</p>
                                        <input type='text' name='mobilePhone' id='mobilePhone' class='form-control'/>
                                    </div>
                                </div>
                                
                                <div class='row'>
                                    <div class='col-lg-6 col-md-6'> 
                                        <p class='text-muted'>Company</p>
                                        <input type='text' name='id' id='id' value='1100 - ProCredit Bulgaria' class='form-control' disabled/>
                                    </div>
                                    <div class='col-lg-6 col-md-6'> 
                                        <p class='text-muted'>Branch</p>
                                        <select name='branch' id='branch' class='form-control'>  
                                            <option value='1'>All branches</option>
                                            <option value='2'>...</option>
                                        </select>
                                    </div>
                                </div>

                                <div class='row'>
                                    <div class='col-lg-4 col-md-4'> 
                                        <p class='text-muted'>Language</p>
                                         <select name='language' id='language' class='form-control'>  
                                            <option value='1'>Bulgarian</option>
                                            <option value='2'>English</option>
                                            <option value='3'>Greek</option>
                                            <option value='4'>Portuguese</option>
                                        </select>
                                    </div>
                                    <div class='col-lg-4 col-md-4'> 
                                        <p class='text-muted'>Time Zone</p>
                                        <select name='timezone' id='timezone' class='form-control'>  
                                            <option value='1'>Europe/Sofia</option>
                                            <option value='2'>...</option>
                                        </select>
                                    </div>
                                    <div class='col-lg-4 col-md-4'> 
                                        <p class='text-muted'>Permissions</p>
                                        <select name='permissions' id='permissions' class='form-control'>  
                                            <option value='1'>System Management</option>
                                            <option value='2'>Network Management</option>
                                            <option value='3'>Financial Information</option>
                                            <option value='4'>Super User Management</option>
                                            <option value='5'>CIT</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class='row'>
                                    <div class='col-lg-2 col-md-2 col-lg-offset-5'>
                                        <center>
                                            <input type='submit' value='Edit' class='btn btn-default' />
                                        </center>
                                    </div>
                                </div>

                                    <form role='EditPassword'>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Edit Password
                                            </div>
                                            <div class="panel-body">
                                                <div class='row'>
                                                    <div class='col-lg-4 col-md-12'>
                                                         <p class='text-muted'>Current Password</p>
                                                        <input class='form-control' type='text' alt='current password' title='current password' id='pwd' name='pwd'/>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <p class='text-muted'>New Password</p>
                                                        <input class='form-control' type='text' alt='new password' title='new password' id='pwd2' name='pwd2'/>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <p class='text-muted'>Repeat New Password</p>
                                                        <input class='form-control' type='text' alt='repeat password' title='repeat password' id='pwd3' name='pwd3'/>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <center>
                                                            <input type='button' value='Edit Password' class='btn btn-default btnSubmit' name='btSubmitEditPWD' id='btSubmitEditPWD' />
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>        
                                    </form>                             
                               
                                    <form role='EditPIN'>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Edit PIN
                                            </div>
                                            <div class="panel-body">
                                                    <div class='row'>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <p class='text-muted'>Current PIN</p>
                                                        <input class='form-control' type='text' alt='current PIN' title='current PIN' id='pin' name='pin'/>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <p class='text-muted'>New PIN</p>
                                                        <input class='form-control' type='text' alt='new PIN' title='new PIN' id='pin2' name='pin2'/>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <p class='text-muted'>Repeat New PIN</p>
                                                        <input class='form-control' type='text' alt='repeat PIN' title='repeat PIN' id='pin3' name='pin3'/>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <center>
                                                            <input type='button' value='Edit PIN' class='btn btn-default btnSubmit' name='btSubmitEditPIN' id='btSubmitEditPIN' />
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                            </div>
                        </div>
                        </form>
                        <!-- Fim do formulário -->
                        <!-- Modal -->
                        <div class='modal fade' id='modalNewUser' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-lg' role='document'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                        </button>
                                        <h4 class='modal-title' id='myModalLabel'>New User</h4> 
                                    </div>
                                    <div class='modal-body'>
                                        <form role='newUser'>                                            
                                                    <div class='row'>
                                                        <div class='col-lg-2 col-md-2'> 
                                                            <p class='text-muted'>ID</p>
                                                            <input type='text' name='id' id='id' value='3' class='form-control'/>
                                                        </div>
                                                        <div class='col-lg-4 col-md-4'>
                                                            <p class='text-muted'>Name</p> 
                                                            <input type='text' name='name' id='name' class='form-control' required/>
                                                        </div>
                                                        <div class='col-lg-4 col-md-4'>
                                                            <p class='text-muted'>E-mail</p> 
                                                            <input type='text' name='email' id='email' class='form-control'/>
                                                        </div>
                                                        <div class='col-lg-2 col-md-2'> 
                                                            <p class='text-muted'>Mobile phone</p>
                                                            <input type='text' name='mobilePhone' id='mobilePhone' class='form-control'/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class='row'>
                                                        <div class='col-lg-6 col-md-6'> 
                                                            <p class='text-muted'>Company</p>
                                                            <select name='company' id='company' class='form-control'>  
                                                                <option value='1'>1100 - ProCredit Bulgaria</option>
                                                                <option value='2'>...</option>
                                                            </select>
                                                        </div>
                                                        <div class='col-lg-6 col-md-6'> 
                                                            <p class='text-muted'>Branch</p>
                                                            <select name='branch' id='branch' class='form-control'>  
                                                                <option value='1'>All branches</option>
                                                                <option value='2'>...</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class='row'>
                                                        <div class='col-lg-4 col-md-4'> 
                                                            <p class='text-muted'>Language</p>
                                                            <select name='language' id='language' class='form-control'>  
                                                                <option value='1'>Bulgarian</option>
                                                                <option value='2'>English</option>
                                                                <option value='3'>Greek</option>
                                                                <option value='4'>Portuguese</option>
                                                            </select>
                                                        </div>
                                                        <div class='col-lg-4 col-md-4'> 
                                                            <p class='text-muted'>Time Zone</p>
                                                            <select name='timezone' id='timezone' class='form-control'>  
                                                                <option value='1'>Europe/Sofia</option>
                                                                <option value='2'>...</option>
                                                            </select>
                                                        </div>
                                                        <div class='col-lg-4 col-md-4'> 
                                                            <p class='text-muted'>Permissions</p>
                                                            <select name='permissions' id='permissions' class='form-control'>  
                                                                <option value='1'>System Management</option>
                                                                <option value='2'>Network Management</option>
                                                                <option value='3'>Financial Information</option>
                                                                <option value='4'>Super User Management</option>
                                                                <option value='5'>CIT</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class='row'>
                                                        <div class='col-lg-3 col-md-3'>
                                                            <p class='text-muted'>Password</p>
                                                            <input class='form-control' type='text' alt='new password' title='password' id='pwd2' name='pwd2'/>
                                                        </div>
                                                        <div class='col-lg-3 col-md-3'>
                                                            <p class='text-muted'>Repeat Password</p>
                                                            <input class='form-control' type='text' alt='repeat password' title='repeat password' id='pwd3' name='pwd3'/>
                                                        </div>
                                                        <div class='col-lg-3 col-md-3'>
                                                            <p class='text-muted'>PIN</p>
                                                            <input class='form-control' type='text' alt='new PIN' title='PIN' id='pin2' name='pin2'/>
                                                        </div>
                                                        <div class='col-lg-3 col-md-3'>
                                                            <p class='text-muted'>Repeat PIN</p>
                                                            <input class='form-control' type='text' alt='repeat PIN' title='repeat PIN' id='pin3' name='pin3'/>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class='row'>
                                                        <div class='col-lg-2 col-md-2 col-lg-offset-5'>
                                                            <center>
                                                                <input type='submit' value='Save' class='btn btn-default' />
                                                            </center>
                                                        </div>
                                                    </div>

                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
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
        $('#userTxtSearch').keyup(function(){
            var x = $('#userTxtSearch').val();
            if ( x.length >= 3){
                alert('filtrar user...');
            }
        });
    </script>

    <?php include_once('bottomBar.html'); ?>

    <?php include_once('importJS.html'); ?>
  </body>
</html>