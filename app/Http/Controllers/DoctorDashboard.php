<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientAccount;
use App\Models\PatientAppointment;
use App\Models\Schedule;
use App\Models\DoctorAccount;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use Session;
use DB;

class DoctorDashboard extends Controller
{

    // dashboard
    public function doctorDashboard() {


        // next consultant
        $consultants = DB::select(
            "SELECT first_name, last_name, s.start_time
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id
            INNER JOIN schedules AS s ON dp.sched_id = s.sched_id;"
        );

        // pending requests
        $pending_reqs = DB::select(
            "SELECT COUNT(appointment_id) AS pending_reqs
            FROM `patient_appointments`;"
        );

        // patients overview
        $patients = DB::select(
            "SELECT first_name, last_name, birthdate, age, complaint, allergies
            FROM `patient_appointments`;"
        );
        $options = [
            'chart_title' => 'Students by year level',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Service',
            'group_by_field' => 'services',
            'chart_type' => 'pie',
            'style_class' => 'chart1'
        ];

        $chart1 = new LaravelChart($options);

        $options = [
            'chart_title' => 'Department statistics',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\PatientAppointment',
            'group_by_field' => 'department',
            'chart_type' => 'bar',
            'chart_color' => '121,204,179'
       
        ];

        $chart2 = new LaravelChart($options);
       
    
        return view('dashboard', compact('patients', 'pending_reqs', 'consultants','chart1', 'chart2'));
    }

    // Patients List
    public function patientsList() {
        $patients = DB::select(
            "SELECT first_name, last_name, birthdate, age, appointment_date, s.services
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id
            INNER JOIN services AS s ON dp.service_id = s.service_id"
        );
        return view('tables', compact('patients'));
  }

    // Patients Chart
    public function patientChart() {
        $patients = DB::select(
            "SELECT first_name, last_name, birthdate, age, complaint, allergies FROM `patient_appointments`;"
        );
        return view('patient-chart', compact('patients'));
  }

    // Consultation schedule
    public function consultationSched() {
        $patients = DB::select(
            "SELECT first_name, last_name, birthdate, age, appointment_date, s.start_time, complaint, serv.services
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id
            INNER JOIN schedules AS s ON dp.sched_id = s.sched_id
            INNER JOIN services AS serv ON dp.service_id = serv.service_id;;"
        );
        return view('consultation-schedule', compact('patients'));
    }
}