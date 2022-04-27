@extends('layout.content.admin-content')
<?php 
	$title= "Data show";
?>

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
            
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">DataTable with default features</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr style="background-color: #E74C3C; color:white !important">
                                            <!-- <th><input type="checkbox" name="main_checkbox"><label></label></th> -->
                                            <!-- <th style="text-align: center;" class="min-w-100px">#</th> -->
                                            <th style="text-align: center;" class="min-w-100px">Name</th>
                                            <th style="text-align: center;" class="min-w-100px">Mobile</th>
                                            <th style="text-align: center;" class="min-w-100px">Amount</th>
                                            <th style="text-align: center;" class="min-w-100px">Service Type</th>
                                            <th style="text-align: center;" class="min-w-100px">Bike Model</th>
                                            {{-- <th style="text-align: center;" class="min-w-100px">Date</th>
                                            <th style="text-align: center;" class="min-w-100px">Time</th>
                                            <th style="text-align: center;" class="min-w-100px">User Type</th>
                                            <th style="text-align: center;" class="min-w-100px">Membership</th>
                                            <th style="text-align: center;" class="min-w-100px">Status</th>
                                            <th style="text-align: center;" class="min-w-100px">Percentage</th>
                                            <th style="text-align: center;" class="min-w-100px">Actions</th> --}}
                                            <!-- <th style="text-align: center;" class="min-w-100px">Test</th> -->
                                            <!-- <button class="btn btn-sm btn-danger d-none" id="deleteAllBtn">Delete All</button> -->
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 1.5</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                          </tr>
                                          <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 2.0</td>
                                            <td>Win 98+ / OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                          </tr>
                                          <tr>
                                            <td>Gecko</td>
                                            <td>Firefox 3.0</td>
                                            <td>Win 2k+ / OSX.3+</td>
                                            <td>1.9</td>
                                            <td>A</td>
                                          </tr>
                                          <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.0</td>
                                            <td>OSX.2+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                          </tr>
                                          <tr>
                                            <td>Gecko</td>
                                            <td>Camino 1.5</td>
                                            <td>OSX.3+</td>
                                            <td>1.8</td>
                                            <td>A</td>
                                          </tr>
                                    </tbody>
                                    {{-- <tfoot>
                                        <tr>
                                            <th>Rendering engine</th>
                                            <th>Browser</th>
                                            <th>Platform(s)</th>
                                            <th>Engine version</th>
                                            <th>CSS grade</th>
                                        </tr>
                                    </tfoot> --}}
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection