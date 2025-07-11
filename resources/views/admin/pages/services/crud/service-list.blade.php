@extends('layout.content.admin-content')
<?php 
	$title= "service list";
?>

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Sheba Automation Ltd</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
            
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Service Information
                                    <button id="addServiceBtn" class="btn btn-block btn-primary"><i class="fas fa-plus" style="margin-right:10px"></i>Add Service</button>
                                </h3>
                                
                            </div>
                            <!-- /.card-header -->

                            @include('admin.pages.services.crud.add-service')
                            @include('admin.pages.services.crud.edit-service')

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="service-list-table" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="background-color: #E74C3C; color:white !important">
                                                <!-- <th><input type="checkbox" name="main_checkbox"><label></label></th> -->
                                                <!-- <th style="text-align: center;" class="min-w-100px">#</th> -->
                                                <th style="text-align: center;" class="min-w-100px">Service</th>
                                                <th style="text-align: center;" class="min-w-100px">Description</th>
                                                <th style="text-align: center;" class="min-w-100px">Logo</th>
                                                <th style="text-align: center;" class="min-w-100px">Status</th>
                                                <th style="text-align: center;" class="min-w-100px">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody></tbody>
                                        
                                    </table>
                                </div>
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

    @include('admin.pages.services.service-scripts')
@endsection