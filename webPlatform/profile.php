<!DOCTYPE html>
<html lang="en" ng-app='ZCA'>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <?php include_once('head.html'); ?>    
  </head>
  <body>
    <?php include_once('topBar.html'); ?>

    <div class='container-fluid' ng-controller='controller_profile'>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default" >

                    <div class="panel-heading">
                        User Profile | ID 3
                    </div>
                    
                    <div class="panel-body">
                        <!-- formulário para edição de utilizador -->
                        <form role='editUser' name='form_editUser' id='form_editUser' ng-submit="submitFormEditUser(form_editUser.$valid)" novalidate>   
                            <div class="row">
                                <div class='col-lg-3 col-md-4 col-sm-12'>
                                    <div ng-class="{'has-error':form_editUser.name.$invalid && !form_editUser.name.$pristine}">
                                        <p class='text-muted'>Name</p>
                                        <input class='form-control' type='text' alt='Name' title='Name' id='name' name='name' ng-model='name' required/>
                                    </div>
                                </div>
                                <div class='col-lg-3 col-md-5 col-sm-12'>
                                    <div ng-class="{'has-error':form_editUser.email.$invalid && !form_editUser.email.$pristine}">
                                        <p class='text-muted'>E-mail</p>
                                        <input class='form-control' type='email' alt='E-mail' title='E-mail' id='email' name='email' required ng-model='email'/>
                                    </div>
                                </div>
                                <div class='col-lg-2 col-md-3 col-sm-12'>
                                    <p class='text-muted'>Cellphone</p>
                                    <input class='form-control' type='text' maxlength='13' alt='Cellphone' title='Cellphone' id='cellphone' name='cellphone'/>
                                </div>
                                <div class='col-lg-2 col-md-6 col-sm-12'>
                                    <p class='text-muted'>Language</p>
                                    <select class="form-control" name='language' id='language' title='Language' alt='Language'>
                                            <option>Bulgarian</option>
                                            <option>English</option>                                            
                                            <option>Greek</option>
                                            <option>Portuguese</option>
                                    </select>
                                </div>
                                <div class='col-lg-2 col-md-6 col-sm-12'>
                                    <p class='text-muted'>Time Zone</p>
                                    <select class="form-control" name='timeZone' id='timeZone' title='Time Zone' alt='Time Zone'>
                                            <option>Europe/Sofia</option>
                                            <option>Europe/Stockholm</option>                                            
                                            <option>...</option>
                                    </select>
                                </div>
                                <div class='col-lg-2 col-md-6 col-sm-12'>
                                    <p class='text-muted'>Company</p>
                                    <input class='form-control' type='text' alt='Company' title='Company' value='nome da empresa' id='company' name='company' disabled/>
                                </div>
                                <div class='col-lg-2 col-md-6 col-sm-12'>
                                    <p class='text-muted'>Branch</p>
                                    <input class='form-control' type='text' alt='Branch' title='Branch' value='nome da sucursal' id='branch' name='branch' disabled/>
                                </div>
                                <div class='col-lg-2 col-md-6 col-sm-12'>
                                    <p class='text-muted'>Permissions</p>
                                    <input class='form-control' type='text' alt='Permissions' title='Permissions' value='tipo de utilizador' id='userType' name='userType' disabled/>
                                </div>
                            </div>
                        
                            <div class='row'>
                                <div class='col-lg-12'>
                                    <center>
                                        <input type='submit' value='Edit' class='btn btn-default' name='btSubmitEdit' id='btSubmitEdit' ng-disabled="form_editUser.$invalid"/>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <!-- fim de formulário -->
                        
                            <div class='row'>
                                <div class='col-lg-6 col-md-12'>

                                    <!-- formulário de edição de password -->
                                    <form role='EditPassword' name='form_editPassword' id='form_editPassword' ng-submit="submitFormEditPassword(form_editPassword.$valid)" novalidate>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Edit Password
                                            </div>
                                            <div class="panel-body">
                                                <div class='row'>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editUser.pwd.$invalid && !form_editUser.pwd.$pristine}">
                                                            <p class='text-muted'>Current Password</p>
                                                            <input class='form-control' type='password' alt='current password' title='current password' id='pwd' name='pwd' ng-model='pwd' required/>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editUser.pwd2.$invalid && !form_editUser.pwd2.$pristine}">
                                                            <p class='text-muted'>New Password</p>
                                                            <input class='form-control' type='password' alt='new password' title='new password' id='pwd2' name='pwd2' ng-model='pwd2' required/>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editUser.pwd3.$invalid && !form_editUser.pwd3.$pristine}">
                                                            <p class='text-muted'>Repeat New Password</p>
                                                            <input class='form-control' type='password' alt='repeat password' title='repeat password' id='pwd3' name='pwd3' ng-model='pwd3' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <center>
                                                            <input type='submit' value='Edit Password' class='btn btn-default' name='btSubmitEditPWD' id='btSubmitEditPWD' ng-disabled="form_editPassword.$invalid"/>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>        
                                    </form>       
                                    <!-- fim de formulário -->

                                </div>

                                <div class='col-lg-6 col-md-12'>

                                    <!-- formulário para editar o PIN-->
                                    <form role='EditPIN'  name='form_editPIN' id='form_editPIN' ng-submit="submitFormEditPIN(form_editPIN.$valid)" novalidate>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                Edit PIN
                                            </div>
                                            <div class="panel-body">
                                                    <div class='row'>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editPIN.pin.$invalid && !form_editPIN.pin.$pristine}">
                                                            <p class='text-muted'>Current PIN</p>
                                                            <input class='form-control' type='text' alt='current PIN' title='current PIN' id='pin' name='pin' ng-model='pin' required/>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editPIN.pin2.$invalid && !form_editPIN.pin2.$pristine}">
                                                            <p class='text-muted'>New PIN</p>
                                                            <input class='form-control' type='text' alt='new PIN' title='new PIN' id='pin2' name='pin2' ng-model='pin2' required/>
                                                        </div>
                                                    </div>
                                                    <div class='col-lg-4 col-md-12'>
                                                        <div ng-class="{'has-error':form_editPIN.pin3.$invalid && !form_editPIN.pin3.$pristine}">
                                                            <p class='text-muted'>Repeat New PIN</p>
                                                            <input class='form-control' type='text' alt='repeat PIN' title='repeat PIN' id='pin3' name='pin3' ng-model='pin3' required/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-lg-12'>
                                                        <center>
                                                            <input type='submit' value='Edit PIN' class='btn btn-default' name='btSubmitEditPIN' id='btSubmitEditPIN' ng-disabled="form_editPIN.$invalid"/>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- fim de formulário -->

                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php include_once('bottomBar.html'); ?>
    
    <!-- Controller -->
    <script src='js/controllers/profile.js'></script>

    
    <?php include_once('importJS.html'); ?>
  </body>
</html>