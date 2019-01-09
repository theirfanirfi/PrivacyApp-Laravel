@extends('layout')
@section('content')

<link href="{{ URL::asset('plugins/datatables/css/jquery.dataTables.css') }}" rel="stylesheet" type="text/css" media="screen"/>

<link href="{{ URL::asset('plugins/datatables/extensions/TableTools/css/dataTables.tableTools.min.css') }}" rel="stylesheet" type="text/css" media="screen"/>

<link href="{{ URL::asset('plugins/datatables/extensions/Responsive/css/dataTables.responsive.css') }}" rel="stylesheet" type="text/css" media="screen"/>

<link href="{{ URL::asset('plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet" type="text/css" media="screen"/>



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
                    <h1 class="title">Companies</h1>

                    <a href="{{ route('addCompany') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Company</a>
                 </div>



            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <div class="content-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">


                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                            <th>Company Name</th>
                                            <th>Country</th>
                                            <th>Score</th>
                                            <th>Main Activity</th>
                                            <th>Action</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Country</th>
                                        <th>Score</th>
                                        <th>Main Activity</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    @foreach ($companies as $c)
                                    <tr>
                                            <td>{{ $c->company_name }}</td>
                                            <td>{{ $c->country }}</td>
                                            <td>{{ $c->score }}</td>
                                             <td>{{ $c->main_activity }}</td>
                                            <td><a href="{{ route('editCompany',['id' => $c->id]) }}"><i class="fa fa-pencil"></i></a> | <a href="{{ route('deleteCompany',['id' => $c->id]) }}"><i style="color:red;" class="fa fa-trash"></i></a></td>

                                        </tr>
                                    @endforeach




                                </tbody>
                            </table>




                        </div>
                    </div>
                </div>
            </section></div>











    </section>
</section>
<!-- END CONTENT -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<script src="{{ URL::asset('plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') }}" type="text/javascript"></script>
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->
@endsection
