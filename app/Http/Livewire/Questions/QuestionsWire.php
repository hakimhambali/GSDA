<?php

namespace App\Http\Livewire\Questions;

use App\Models\CreateQuiz;
use Livewire\Component;
use App\Models\Question;
use App\Models\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Models\Answer;
use App\Models\Course;
use App\Models\CourseFile;


class QuestionsWire extends Component
{
    public $id_createquiz;
    public $action;
    public $CreateQuiz;
    public $id_question;
    public $id_answer;
    public $answer;

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function mount($id)
    { 
        $this->CreateQuiz = CreateQuiz::find($id);

    }

    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    // /**
    //  * Display a listing of Question.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $questions = Question::all();

    //     return view('livewire.questions.questions-wire')->with(compact('questions'));
    // }

    // /**
    //  * Show the form for creating new Question.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     $relations = [
    //         'createquizzes' => \App\Models\CreateQuiz::get()->pluck('title', 'id')->prepend('Please select', ''),
    //     ];

    //     $correct_options = [
    //         'option1' => 'Option #1',
    //         'option2' => 'Option #2',
    //         'option3' => 'Option #3',
    //         'option4' => 'Option #4',
    //         'option5' => 'Option #5'
    //     ];

    //     return view('livewire.create-quiz.create')->with(compact('correct_options') + $relations );
    //     // return view('questions.create', compact('correct_options') + $relations);
    // }

    // /**
    //  * Store a newly created Question in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreQuestionsRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreQuestionsRequest $request)
    // {

    //     $question = Question::create($request->all());

    //     foreach ($request->input() as $key => $value) {
    //         if(strpos($key, 'option') !== false && $value != '') {
    //             $status = $request->input('correct') == $key ? 1 : 0;
    //             QuestionsOption::create([
    //                 'question_id' => $question->id,
    //                 'option'      => $value,
    //                 'correct'     => $status
    //             ]);
    //         }
    //     }

    //     return redirect()->route('questions.index');
    // }

   

    // public function selectItem($modelid , $action)
    // {
    //     $this->id_question = $modelid;
    //     $this->action = $action;  
    // }

    public function selectItem($modelid , $action)
    {
        $this->id_question = $modelid;
        $this->action = $action;
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_question);
        }  
    }

    public function delete()
    {  
        $question = Question::find($this->id_question);
        // dd($this->id_question);
        $question->delete();
    }

    // public function delete()
    // {
    //     $course = Course::find($this->course_id);

    //     $course->delete();

    // }
    // /**
    //  * Show the form for editing Question.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $relations = [
    //         'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
    //     ];

    //     $question = Question::findOrFail($id);

    //     // return view('questions.edit', compact('question') + $relations);
    //     return view('livewire.create-quiz.edit')->with(compact('questions'));
    // }

    // /**
    //  * Update Question in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateQuestionsRequest  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateQuestionsRequest $request, $id)
    // {
    //     $question = Question::findOrFail($id);
    //     $question->update($request->all());

    //     return redirect()->route('questions.index');
    // }


    // /**
    //  * Display Question.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $relations = [
    //         'topics' => \App\Topic::get()->pluck('title', 'id')->prepend('Please select', ''),
    //     ];

    //     $question = Question::findOrFail($id);

    //     // return view('questions.show', compact('question') + $relations);
    //     return view('livewire.create-quiz.show')->with(compact('questions') + $relations);
    // }


    // /**
    //  * Remove Question from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // // public function destroy($id)
    // // {
    // //     $question = Question::findOrFail($id);
    // //     $question->delete();

    // //     return redirect()->route('questions.index');
    // // }

    // /**
    //  * Delete all selected Question at once.
    //  *
    //  * @param Request $request
    //  */
    // public function massDestroy(Request $request)
    // {
    //     if ($request->input('ids')) {
    //         $entries = Question::whereIn('id', $request->input('ids'))->get();

    //         foreach ($entries as $entry) {
    //             $entry->delete();
    //         }
    //     }
    // }

    public function addAnswer($id_questions)
    {
        
        return redirect()->to('addAnswer/'.$id_questions.'');
    }

    public function render()
    {
        
        return view('livewire.questions.questions-wire');
    }
}
