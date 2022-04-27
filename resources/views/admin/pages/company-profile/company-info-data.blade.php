@extends('layout.content.admin-content')
<?php 
	$title= "Company Profile";
?>

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Projects</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Projects</li>
                    </ol>
                </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Projects</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                                <tr>
                                    <th style="width: 1%">
                                        #
                                    </th>
                                    <th style="width: 10%">
                                        Company Name
                                    </th>
                                    <th style="width: 8%">
                                        Reg No
                                    </th>
                                    <th style="width: 8%">
                                        Trade Licence
                                    </th>
                                    {{-- <th style="width: 8%" class="text-center">
                                        Logo
                                    </th> --}}
                                    <th style="width: 8%" class="text-center">
                                        Tagline
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Website
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Facebook
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Skype
                                    </th>
                                    <th style="width: 12%" class="text-center">
                                        Bank Acc Name
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Bank Name
                                    </th>
                                    <th style="width: 8%" class="text-center">
                                        Branch Name
                                    </th>
                                    <th style="width: 20%" class="text-center">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            Creative
                                        </a>
                                        <br/>
                                        <small>
                                            Created 01.01.2019
                                        </small>
                                    </td>
                                    <td>Reg: 56664646</td>
                                    <td>Li: 56664646</td>
                                    {{-- <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="{{asset('dist/img/avatar.png')}}">
                                            </li>
                                        </ul>
                                    </td> --}}
                                    <td>tagline</td>
                                    <td>website</td>
                                    <td>facebook</td>
                                    <td>skype</td>
                                    <td>bank account name</td>
                                    <td>bank name</td>
                                    <td class="project-state">
                                        <span class="badge badge-success">branch</span>
                                    </td>
                                    <td class="project-actions text-right">
                                        {{-- <a class="btn btn-primary btn-sm" href="#">
                                            <i class="fas fa-folder">
                                            </i>
                                            View
                                        </a> --}}
                                        <a class="btn btn-info btn-sm" href="#">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                            Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection