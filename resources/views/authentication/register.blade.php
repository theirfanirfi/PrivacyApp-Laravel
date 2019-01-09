
<!DOCTYPE html>
<html class=" ">
    <head>
        <!--
         * @Package: Ultra Admin - Responsive Theme
         * @Subpackage: Bootstrap
         * @Version: 4.1
         * This file is part of Ultra Admin Theme.
        -->
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <title>Sign Up </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />






        <link href="{{ URL::asset('plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>

        <!-- CORE CSS FRAMEWORK - END -->


        <!-- CORE CSS TEMPLATE - START -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet" type="text/css"/>
        <!-- CORE CSS TEMPLATE - END -->

    </head>
    <!-- END HEAD -->

    <!-- BEGIN BODY -->
    <body class=" login_page">


        <div class="login-wrapper">
            <div id="login" class="login loginpage col-lg-offset-4 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-0 col-xs-12">
                <h1 style="color:white;font-weight:bold;">Sign Up</h1>


@if(Session('error'))
<div class="alert alert-error alert-dismissible fade in">
                                            <strong>Error: </strong>{{Session('error')}}
                                        </div>
@endif

                <form name="" id="" action="{{route('signup')}}" method="post">
                    <p>
                        <label for="user_login">First Name<br />
                            <input type="text" name="first_name"  class="input" value="" /></label>
                    </p>

                    <p>
                        <label for="user_login">Last Name<br />
                            <input type="text" name="last_name"  class="input" value="" /></label>
                    </p>

                        @csrf
                    <p>
                        <label for="user_login">Email<br />
                            <input type="email" name="email" id="" class="input" value=""  /></label>
                    </p>
                    <p>
                        <label for="user_pass">Password<br />
                            <input type="password" name="pwd" id="user_pass" class="input" value="demo" size="20" /></label>
                    </p>

                    <p class="submit">
                        <input type="submit" name="" id="" class="btn btn-orange btn-block" value="Sign Up" />
                    </p>
                </form>

                <p id="nav">
                    <a class="pull-right" href="{{route('login')}}" title="Login">Login</a>
                </p>


            </div>
        </div>

















    </body>
</html>



