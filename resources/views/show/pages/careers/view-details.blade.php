@extends('layout.content.main-content')
<?php 
	$title= "View Details";
?>

@section('content')

    <main id="main">
        <section class="py-5 view-detiles">
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
                <div class="table_main table-responsive">
                <table class="table table-bordered table-hover">

                    @foreach ($careers as $item)
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">Position</th>
                                <td>{{$item->company_name}}</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>   
                                <th scope="col">Vacancy</th>
                                <td>{{$item->vacancy}}</td>
                            </tr>
                            <tr>   
                                <th scope="col">Type</th>
                                <td>{{$item->job_type}}</td>
                            </tr>
                            <tr>   
                                <th scope="col">Apply Date</th>
                                <td>{{$item->apply_date}}</td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-start table-active">
                                <p>&nbsp;</p>
                                    <p><strong>{{$item->position_name}}</strong></p>
                                    <p><strong>{{$item->company_name}}</strong></p>                        
                                    <p><strong>Vacancy</strong></p>
                                    <p>{{$item->company}}</p>
                                    <p><strong>Job Context</strong></p>
                                    <p>{{$item->job_context}}</p>
                                    <p>&nbsp;</p>
                                    <p><strong>Job Nature</strong></p>
                                    <p>{{$item->job_nature}}</p>
                                    <p><strong>Educational Requirements</strong></p>
                                    <p>• {{$item->edu_requirment}}</p>
                                    
                                    <p><strong>Job Location</strong></p>
                                    <p>• {{$item->job_location}}</p>
                                    <p><strong>Salary Range</strong></p>
                                    <p>• {{$item->salary_range}}</p>
                                    <p><strong>Other Benefits</strong></p>
                                    <p>• {{$item->other_benefit}}</p>
                                    <p><strong>Please E-mail your updated resume along with a cover letter and your photograph to <a href="" style="text-decoration-line: none;">hr@synesisit.com.bd </a> by March 25, 2018 and mention the position applied for in the subject line.</strong><span style="background-color:transparent; font-family:Verdana,Arial,Helvetica,sans-serif"> </span></p>                
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2" class="table-active">
                                    <a class="btn btn-success text-light" target="_blank" href="#">Apply from bdjobs</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    
                </table>
                </div>
            </div>
            </div>
        </div>
        </section>
    </main>
  <!-- End #main -->

@endsection