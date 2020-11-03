<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\StudentHistory;
use App\Student;
use App\SchoolPeriod;
use App\AttendanceStudent;
use Barryvdh\DomPDF\Facade as PDF;


class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        
        $student = Student::where("id", $id)->first();


        return view('students.studentReports', compact('student'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reportpdf($idstudent, $idperiod)
    {

       $student = Student::where("id", $idstudent)->first();

       $attendance = AttendanceStudent::where("student_history_id", $idstudent)->where('period_id', $idperiod)->get();

       $period = SchoolPeriod::where("id", $idperiod)->first();

       $history = StudentHistory::where("student_id", $idstudent)->first();

       $pdf = PDF::loadView('pdf.reports', compact('student', 'attendance', 'history', 'period'));

        return $pdf->download('reporte-asistencia.pdf');
    }
}
