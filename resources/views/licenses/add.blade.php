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
                    <h1 class="title">Add License</h1>

                    <a href="{{ route('licenses') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i></a>
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
                        <form action="{{ route('addlicense') }}" method="post">
                            @csrf
                                <div class="form-group">
                                        <label class="form-label" for="active">Active</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="active" id="active">
                                        </div>
                                    </div>


                                <div class="form-group">
                                        <label class="form-label" for="type">Type</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" name="type" id="type">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                            <label class="form-label" for="description">Description</label>
                                            <span class="desc">e.g. "License Description"</span>
                                            <div class="controls">
                                                <textarea class="form-control" cols="5" name="description" id="description"></textarea>
                                            </div>
                                        </div>
<div class="pull-right">
    <button type="submit" class="btn btn-success">Add Licenses</button>
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
