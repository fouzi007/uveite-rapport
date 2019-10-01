<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Medecin;
use App\Question;
use App\Formulaire;

class AppController extends Controller
{
    public function index()
    {

      return view('index');
    }
    public function audience ()
    {
      $users = Medecin::paginate(15);
      return view('audience',compact('users'));
    }
    public function interaction ()
    {
      return view('interaction');
    }

    public function questions ()
    {
      $questions = Question::all();
      return view('questions',[
        'questions' => $questions
      ]);
    }

    public function quiz () {
	    $ok = DB::select('select concat("Question " , question_id) as label , data as data  from all_results where is_true = 1 group by label order by question_id asc');
	    $notOk = DB::select('select concat("Question " , question_id) as label , data as data  from all_results where is_true = 0 group by label order by question_id asc');

	    $specialite = DB::select('select * from all_results where question_id = 12');
		$reponses = collect([
			'bonnes' => collect($ok),
			'mauvaises' => collect($notOk)
		]);
	    return view('quiz',compact('reponses','specialite'));
    }

    public function formulaires () {
    $tendances = collect(\DB::select('select avg(q1)  as q1, avg(q2)  as q2, avg(q3)as q3, avg(q4)  as q4, avg(q5)  as q5, avg(q6)  as q6, avg(q7)  as q7, avg(q10) as q10  from formulaires;'))->first();
	$medecins = DB::select('select * from users where id in (select user_id from formulaires)');
      return view('formulaires',[
        'tendances' => $tendances,
         'medecins' => $medecins
      ]);
    }

	public function showForm( $id ) {
		$form = Formulaire::where('user_id',$id)->first();
		return view('show-form',compact('form'));
    }

    public function autre () {
      return view('autre');
    }

}
