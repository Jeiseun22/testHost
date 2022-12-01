<!DOCTYPE html>
<html lang="en">

<head>
    @include('FrontEnd/dashboardHead')
    <title>24/7 MD - Patient Database</title>
</head>

<body id="page-top">

@include('FrontEnd/patientdbSide')

@include('FrontEnd/dashTopBar')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Patient Database</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="background-color:#1b2f45"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>


<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patient List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date of Birth</th>
                            <th>Age</th>
                            <th>Consultation Date</th>
                            <th>Service</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($patients as $patient)
                        <tr>
                            <td> {{ $patient -> first_name }} {{ $patient -> last_name }} </td>
                            <td> {{ $patient -> birthdate }} </td>
                            <td> {{ $patient -> age }} </td>
                            <td> {{ $patient -> appointment_date }} </td>
                            <td> {{ $patient -> services }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@include('FrontEnd/dashFooter')

</body>

</html>