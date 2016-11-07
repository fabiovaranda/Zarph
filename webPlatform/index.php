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
    <div class="container">
        
        <div class='row'>
            <div class='col-lg-12'>
                <center>
                    <img src='img/logoZarph.png' class='logo'/>
                </center>
            </div>
        </div>

        <div class="row" ng-controller='controller_login'>
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login
                        <span class="badge">{{ PostDataResponse }}</span>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name='formLogin'>
                            <fieldset>
                                <div class="form-group" ng-class="{'has-error':formLogin.userid.$invalid && !formLogin.userid.$pristine}">
                                    <input class="form-control" name='userid' ng-model='user.id' 
                                        placeholder="User ID" type="text" autofocus required ng-minlength='1' ng-maxlength='4'/>
                                </div>

                                <div class="form-group" ng-class="{'has-error':formLogin.password.$invalid &&  !formLogin.password.$pristine}">
                                    <input class="form-control" name='password' ng-model='user.password' 
                                        placeholder="Password" type="password" value="" required ng-minlength='1' ng-maxlength='4'/>
                                </div>

                                <center>
                                    <input type='submit' ng-click="login()" value='Entrar' class='btn btn-default' ng-disabled="formLogin.$invalid"/>
                                </center>
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <?php include_once('importJS.html'); ?>

    <!-- Module -->
    <script src="js/app.js"></script>

    <!-- Controllers -->
    <script src='js/controllers/login.js'></script>    
   
  </body>
</html>