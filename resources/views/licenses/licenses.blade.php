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
                    <h1 class="title">Licenses</h1>

                    <a href="{{ route('addlicense') }}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Licence</a>
                 </div>



            </div>
        </div>
        <div class="clearfix"></div>

        <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                    <!-- <h2 class="title pull-left">Basic Data Table</h2> -->
                    <div class="actions panel_actions pull-right">
                        <i class="box_toggle fa fa-chevron-down"></i>
                        <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                        <i class="box_close fa fa-times"></i>
                    </div>
                </header>
                <div class="content-body">    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">


                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Active</th>
                                        <th>Type</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                            <th>Active</th>
                                            <th>Type</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                    </tr>
                                </tfoot>

                                <tbody>
                                    @foreach ($licenses as $l)
                                    <tr>
                                            <td>{{ $l->active }}</td>
                                            <td>{{ $l->type }}</td>
                                            <td>{{ $l->description }}</td>
                                            <td><a href="{{ route('editlicense',['id' => $l->id]) }}"><i class="fa fa-pencil"></i></a> | <a href="{{ route('deletelicense',['id' => $l->id]) }}"><i style="color:red;" class="fa fa-trash"></i></a></td>

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
