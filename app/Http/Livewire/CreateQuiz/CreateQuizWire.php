<?php

namespace App\Http\Livewire\CreateQuiz;

use App\Models\Question;
use App\Models\QuestionsOption;
use Illuminate\Http\Request;
use App\Http\Requests\StoreQuestionsRequest;
use App\Http\Requests\UpdateQuestionsRequest;
use App\Models\CreateQuiz;
use Livewire\Component;
use App\Models\Course;
use App\Models\CourseFile;

class CreateQuizWire extends Component
{

    public $id_createquiz;
    public $action;
    public $name;
    // public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    // /**
    //  * Display a listing of Question.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     $questions = Question::all();

    //     return view('livewire.create-quiz.index')->with(compact('questions'));
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
    //     $this->id_createquiz = $modelid;
    //     $this->action = $action;

    //     if($action == "update")
    //     {
    //         $this->emit('getModelId' , $this->id_createquiz);
    //     }
    //     else if($action == "manageCourseResources")
    //     {
    //         $this->emit('getModelIdDeeper' , $this->id_createquiz);
    //         $this->dispatchBrowserEvent('openModal_manageCourseResources');
    //     }
        
    // }

    public function selectItem($modelid , $action)
    {
        $this->id_createquiz = $modelid;
        $this->action = $action;
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_createquiz);
        }  
    }

    public function delete()
    {
        $createquiz = CreateQuiz::find($this->id_createquiz);

        $createquiz->delete();

    }
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
    // public function destroy($id)
    // {
    //     $question = Question::findOrFail($id);
    //     $question->delete();

    //     return redirect()->route('questions.index');
    // }

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

    public function addQuestion($id_createquizzes)
    {
        
        return redirect()->to('addQuestion/'.$id_createquizzes.'');
    }

    public function render()
    {
        // if (auth()->user()->role == "admin") {
            // $createquizzes = CreateQuiz::all();
            $createquizzes = CreateQuiz::orderBy('created_at','desc')->get();
        // } else if(auth()->user()->role == "lecturer"){
        //     $coursefiles = CourseFile::whereHas('course' , function ($query) {
        //         $query->where('id_lecturer' , auth()->user()->id);
        //     })->get();
        // }
        // if (auth()->user()->role == "admin") {
        //     $createquizzes = CreateQuiz::orderBy('created_at','desc')->get();
        // } else if(auth()->user()->role == "lecturer"){
        //     $createquizzes = CreateQuiz::whereHas('course' , function ($query) {      
        //         $query->where('id_lecturer' , auth()->user()->id);
        //     })->orderBy('created_at','desc')->get();
        // }

        return view('livewire.create-quiz.create-quiz-wire')->with(compact('createquizzes'));

        // return view('livewire.course-file.course-file-wire');
    }
}


