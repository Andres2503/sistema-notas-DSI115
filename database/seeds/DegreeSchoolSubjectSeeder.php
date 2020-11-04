<?php

use Illuminate\Database\Seeder;
use App\SchoolYear;
use App\Degree;
use App\User;
use App\DegreeSchoolSubject;
use App\Subject;
use App\ScoreType;
use App\ScoreStudent;
//use Faker\Generator;

class DegreeSchoolSubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $degrees=Degree::all();
        $schoolYears=SchoolYear::all();
        $users=User::where('role_id',2)->get();
        $subjects=Subject::all();

        /*Objeto de actividades*/
        $act1 = array( 
           array(
             'Actividades','act 1',10
           ),
           array(
             'Actividades','act 2',10
           ),
           array(
             'Actividades','act 3',20
           ),
           array(
             'Actitud','actitud',20
           ),
           array(
             'Prueba Objetiva','Examen',40
           ),
         );
        $faker  = Faker\Factory::create();



        foreach ($schoolYears as $year) {
          foreach ($degrees as $degree) {
             $students=  User::studentsByYearByDegree($degree->id,$year->id);
             foreach ($subjects as $subject) {
                 $degreeSchoolSubject= new DegreeSchoolSubject();
                 $degreeSchoolSubject->subject_id=$subject->id;
                 $degreeSchoolSubject->school_year_id=$year->id;
                 $number=random_int(0,sizeof($users)-1);
                 $degreeSchoolSubject->user_id=$users[$number]->id;
                 $degreeSchoolSubject->degree_id=$degree->id;
                 $degreeSchoolSubject->save();

                 for ($p=0; $p <3 ; $p++) { 
                    for ($i=0; $i <count($act1) ; $i++) { 
                       $date = $faker->dateTimeBetween($startDate = '-7 months', $endDate = 'now', $timezone = null);
                       $scoreType= ScoreType::create([
                        'school_period_id' => $p+1,
                         'school_year_id' => $year->id,
                         'degree_id'=>$degree->id,
                         'subject_id'=>$subject->id,
                         'percentage'=>$act1[$i][2],
                         'activity'=>$act1[$i][1],
                         'description'=> 'periodo 1: -' .$act1[$i][1],
                         'date'=>$date->format('Y-m-d'),
                         'type'=>$act1[$i][0],
                         'state'=>false,
                         'send'=>true
                       ]);

                       //designar las evaluaciones a los alumnos
                       foreach ($students as $s => $student) {
                           $stu = ScoreStudent::create([
                            'score_type_id'=>$scoreType->id,
                            'student_id'=>$student->id,
                            'school_period_id'=>$p+1,
                            'school_year_id'=> $year->id,
                            'degree_id'=>$degree->id,
                            'subject_id'=>$subject->id,
                            'score'=>rand(0.00,10.00)
                           ]);
                       }
                    }
                 }

             }
          }
        }
    }
}
