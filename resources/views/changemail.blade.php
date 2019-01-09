  @extends('layout')
  <!-- START CONTENT -->
  @section('content')
  <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>


                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                    @if(Session('success'))
<div class="alert alert-success alert-dismissible fade in">
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
<strong>Success: </strong>{{Session('success')}}</div>
@endif

@if(Session('error'))
<div class="alert alert-error alert-dismissible fade in">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <strong>Error: </strong>{{Session('error')}}
                                        </div>
@endif
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Update Profile</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Change Email</h2>
                                <div class="actions panel_actions pull-right">
                                  
                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <form action="{{route('changeEmail')}}" method="post">
<label>Email: </label>
<input type="email" class="form-control" name="email" value="{{$user->email}}" />

<label>Password: </label>
@csrf
<input type="password" class="form-control" name="password" autocomplete="off" />
<p></p>
<button type="submit" class="btn btn-primary">Update Email</button>
</form>

                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
            <!-- END CONTENT -->
@endsection