@extends('layout')
@section('content')
<!-- START CONTENT -->
<section id="main-content" class=" ">
    <section class="wrapper main-wrapper" style=''>

        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                @if(Session('error'))
                <div class="alert alert-error alert-dismissible fade in">
                                                            <strong>Error: </strong>{{Session('error')}}
                                                        </div>
                @endif

                @if(Session('success'))
<div class="alert alert-success alert-dismissible fade in">
                                            <strong>Success: </strong>{{Session('success')}}
                                        </div>
@endif
            <div class="page-title">

                <div class="pull-left">
                    <h1 class="title">Add Email</h1>

                    <a href="{{ route('emails') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i></a>
                 </div>



            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">

                </header>
                <div class="content-body">
                     <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
<div class="col-md-6">
                        <form action="{{ route('addemail') }}" method="post">
                            @csrf
                                <div class="form-group">
                                        <label class="form-label" for="email">Email</label>
                                        <div class="controls">
                                            <input type="email" class="form-control" name="email" id="email">
                                        </div>
                                    </div>



<div class="pull-right">
    <button type="submit" class="btn btn-success">Add Email</button>
</div>

                        </form>

</div>
                        </div>
                    </div>
                </div>
            </section></div>











    </section>
</section>
<!-- END CONTENT -->

@endsection
