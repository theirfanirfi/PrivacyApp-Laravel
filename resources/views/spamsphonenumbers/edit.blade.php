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
                    <h1 class="title">Edit Spam Phone Number</h1>

                    <a href="{{ route('spams') }}" class="btn btn-info"> <i class="fa fa-arrow-left"></i></a>
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
                        <form action="{{ route('editSpamPost') }}" method="post">
                            @csrf
                                    <div class="form-group">
                                        <label class="form-label" for="company">Company</label>
                                        <div class="controls">
                                            <select class="form-control input-sm m-bot15" name="company_id" id="company">
                                                @foreach ($companies as $c)
                                                <option value="{{ $c->id }}" <?php if($c->id == $spam->company_id){ echo "selected"; } ?>>{{ $c->company_name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <input type="hidden" name="id" value="{{ $spam->id }}" />
                                    <div class="form-group">
                                        <label class="form-label" for="phone_number">Phone Number</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" value="{{ $spam->phone_number }}" name="phone_number" id="phone_number">
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="score">Score</label>
                                        <div class="controls">
                                            <input type="number" class="form-control" value="{{ $spam->score }}" name="score" id="score">
                                        </div>
                                    </div>
<div class="pull-right">
    <button type="submit" class="btn btn-success">Update Spam Phone Number</button>
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
