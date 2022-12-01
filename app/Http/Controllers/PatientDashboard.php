<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Model;
use App\Models\PatientAccount;
use App\Models\PatientAppointment;
use App\Models\Schedule;
use App\Models\DoctorAccount;
use DB;

class PatientDashboard extends Controller
{
    // sched appointment
    // appointments today
    public function appointmentToday() {
        // scheduled appointments
        $appointments = DB::select(
            "SELECT first_name, last_name, birthdate, age, complaint, allergies, s.start_time 
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id
            INNER JOIN schedules AS s ON dp.sched_id = s.sched_id;"
        );

        // recent consultations
        $consultations = DB::select(
            "SELECT first_name, last_name, birthdate, age, appointment_date, complaint, allergies, dp.doctors_note
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id;"
        );


        return view('patient-dashboard', compact('appointments', 'consultations'));
    }

    // new appointment
    public function newAppointment(Request $request) {

        // new appointment
        // $new = new PatientAppointment;
        // $new -> first_name = $request -> input('first_name');
        // $new -> last_name = $request -> input('last_name');
        // $new -> appointment_date = $request-> input('appointment_date');
        // $new -> appointment_time = $request -> input('appointment_time');
        // $new -> gender = $request -> input('gender');
        // $new -> age = $request -> input('age');
        // $new -> birthdate = $request -> input('birthdate');
        // $new -> allergies = $request -> input('allergies');
        // $new -> service = $request -> input('service');
        // $new -> department = $request -> input('department');
        // $new -> complaint = $request -> input('complaint');

        // $new -> save();

        // return redirect('patient-newappointment');

        // recent consultations
        $consultations = DB::select(
            "SELECT first_name, last_name, birthdate, age, appointment_date, complaint, allergies, dp.doctors_note
            FROM `patient_appointments` AS pa
            INNER JOIN doctor_patients AS dp ON pa.appointment_id = dp.appointment_id;"
        );

        return view('patient-newappointment', compact('consultations'));
    }
}
