<!DOCTYPE html>
<html lang="en">

<head>
    @include('FrontEnd/dashboardHead')
    <title>24/7 MD - Dashboard</title>

</head>

<body id="page-top">

@include('FrontEnd/dashboardSide')

@include('FrontEnd/dashTopBar')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background-color:#1b2f45"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Next Consultation Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Next Consultation :
                            </div>
                            @foreach ($consultants as $consultant)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                @if ($loop -> first)
                                    {{ $consultant -> first_name }} {{ $consultant -> last_name }} - {{ $consultant -> start_time }}
                                @endif
                            </div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Task Card -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar"
                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                            aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card  -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            @foreach ($pending_reqs as $pending_req)
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pending_req -> pending_reqs }}
                            </div>
                            @endforeach
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patient Overview for September 28, 2022</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Chief Complaint</th>
                            <th>Allergies</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td> {{ $patient -> first_name }} {{ $patient -> last_name }} </td>
                            <td> {{ $patient -> birthdate }} </td>
                            <td> {{ $patient -> age }} </td>
                            <td> {{ $patient -> complaint }} </td>
                            <td> {{ $patient -> allergies }} </td>
                        </tr>           
                        @endforeach             
                    </tbody>
                </table>
            </div>
        </div>
    </div>


   

 <!-- Content Row -->
 <div class="row">

<!-- Content Column -->
<div class="col-lg-12 mb-4">

    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patient Statistics</h6>
        </div>
                        <!-- <div class="card-body"> --> 
                        <div class="row">
<div class="col-sm-7 ml-0">
<div class="card">
{!! $chart2->renderHtml() !!}    
</div>
</div>
<div class="col-sm-5">
<div class="card-body">
{!! $chart1->renderHtml() !!} 
</div>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@include('FrontEnd/dashFooter')

</body>
@yield('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
{!! $chart2->renderChartJsLibrary() !!}
{!! $chart2->renderJs() !!}

</html>