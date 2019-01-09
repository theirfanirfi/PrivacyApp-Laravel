  @extends('layout')
  <!-- START CONTENT -->
  @section('content')
  <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Profile</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Details</h2>
                                <div class="actions panel_actions pull-right">

                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

<p><label>First name: </label> {{$user->first_name}}</p>
<p><label>Last name: </label> {{$user->last_name}}</p>
<p><label>Email: </label> {{$user->email}}  <a href="{{route('changeEmail') }}">Change</a></p>
<p><label>Password: </label> <a href="{{route('changepassword') }}">Change password</a></p>
<p><label>Registeration Date: </label> {{$user->created_at}}</p>


                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
@endsection
