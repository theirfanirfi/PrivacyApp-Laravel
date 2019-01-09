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
                    <h1 class="title">Edit Company</h1>

                    <a href="{{ route('companies') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i></a>
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
                        <form action="{{ route('editCompanyPost') }}" method="post">
                            @csrf
                            <div class="form-group">
                                    <label class="form-label" for="comp_name">Company Name</label>
                                    <div class="controls">
                                        <input type="text" class="form-control" value="{{ $company->company_name }}" name="company_name" id="comp_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                        <label class="form-label" for="country">Country</label>
                                        <div class="controls">
                                            <input type="text" class="form-control" value="{{ $company->country }}" name="country" id="country">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="score">Score</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" value="{{ $company->score }}" name="score" id="score">
                                        </div>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $company->id }}" />

                                    <div class="form-group">
                                            <label class="form-label" for="main_activity">Main Activity</label>
                                            <div class="controls">
                                                <input type="text" class="form-control" value="{{ $company->main_activity }}" name="main_activity" id="main_activity">
                                            </div>
                                        </div>
<div class="pull-right">
    <button type="submit" class="btn btn-success">Update Company</button>
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
