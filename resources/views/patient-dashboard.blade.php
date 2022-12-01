<!DOCTYPE html>
<html lang="en">
<head>
    @include('FrontEnd/dashboardHead')
    <title>24/7 MD - Dashboard</title>
</head>
<body id="page-top">
@include('FrontEnd/patientdashSide')
@include('FrontEnd/dashTopBar')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background-color:#1b2f45"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
        <!-- DataTable-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Scheduled Appointment for Nov 19, 2022
                </h6>
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
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                            @if ($appointment != "")
                            <tr>
                                <td> {{ $appointment -> first_name }} {{ $appointment -> last_name }} </td>
                                <td> {{ $appointment -> birthdate }} </td>
                                <td> {{ $appointment -> age }} </td>
                                <td> {{ $appointment -> complaint }} </td>
                                <td> {{ $appointment -> allergies }} </td>
                                <td> {{ $appointment -> start_time }} </td>
                            </tr>
                            @else
                            <tr>
                                <td><h2> No Appointments Today </h2></td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Most Recent Consultation</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Date of Consultation</th>
                            <th>Chief Complaint</th>
                            <th>Allergies</th>
                            <th>Doctor's Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($consultations as $consultant)
                            <tr>
                                <td> {{ $consultant -> first_name }} {{ $consultant -> last_name }} </td>
                                <td> {{ $consultant -> birthdate }} </td>
                                <td> {{ $consultant -> age }} </td>
                                <td> {{ $consultant -> appointment_date }} </td>
                                <td> {{ $consultant -> complaint }} </td>
                                <td> {{ $consultant -> allergies }} </td>
                                <td><a href="#" style="color:gray;">Click to View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->
@include('FrontEnd/dashFooter')
</body>
</html>