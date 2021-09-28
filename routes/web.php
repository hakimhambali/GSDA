<?php

use App\Http\Livewire\MyClassWire;
use App\Http\Livewire\User\UserWire;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Course\CourseWire;

use App\Http\Livewire\Result\ResultWire;
use App\Http\Livewire\Answers\AnswersWire;
use App\Http\Livewire\MazeGame\MazeGameWire;

use App\Http\Livewire\BoardGame\BoardGameWire;
use App\Http\Livewire\ClassRoom\ClassRoomWire;

use App\Http\Livewire\Questions\QuestionsWire;
use App\Http\Livewire\CourseFile\CourseFileWire;
use App\Http\Livewire\CreateQuiz\CreateQuizWire;
use App\Http\Livewire\AttemptQuiz\AttemptQuizWire;
use App\Http\Livewire\ClassCourse\ClassCourseWire;
use App\Http\Livewire\Leaderboard\LeaderboardWire;
use App\Http\Livewire\QuestionGame\QuestionGameWire;
use App\Http\Livewire\LeaderboardGame\LeaderboardGameWire;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return redirect('login');
    return view('welcome');
});


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Laravel Livewire Route
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {
	
    Route::get('/user',	UserWire::class);

    Route::get('/course',	CourseWire::class);
    Route::get('/coursefile',	CourseFileWire::class);
    
    Route::get('/class',	ClassRoomWire::class);
    Route::get('/classcourse',	ClassCourseWire::class);

    Route::get('/myclass',	MyClassWire::class);

    Route::get('/createquiz',	CreateQuizWire::class);
    // Route::get('/result',	ResultWire::class);
    Route::get('/leaderboard',	LeaderboardWire::class);
    Route::get('/boardgame',	BoardGameWire::class);
    Route::get('/leaderboardGame',	LeaderboardGameWire::class);
    Route::get('/questiongame',	QuestionGameWire::class);
    // Route::get('/boardgame',	BoardGameWire::class);
    // Route::get('/createquiz123', [CreateQuizWire::class, 'index'] );
    // Route::get('/createquiz1234', [CreateQuizWire::class, 'create'] );
    // Route::get('/indexquiz',	CreateQuizWire::class);
    // Route::get('/createquiz1234', [CreateQuizWire::class, 'store'] );
    // Route::get('/createquiz1235', [CreateQuizWire::class, 'edit'] );
    // Route::get('/createquiz1236', [CreateQuizWire::class, 'show'] );
    // Route::view('/create-quiz', 'livewire.create-quiz.index');
    // Route::view('/create-quiz1', 'livewire.create-quiz.create');
    // Route::view('/create-quiz2', 'livewire.create-quiz.view');
    // Route::view('/create-quiz3', 'livewire.create-quiz.edit');
    // Route::post('/questions', [CreateQuizWire::class, 'store'] );
    // Route::get('/questions', [QuestionsWire::class, 'store'] );

    Route::get('/addQuestion/{id}', QuestionsWire::class);
    Route::get('/addAnswer/{id}', AnswersWire::class);
    Route::get('/attemptQuiz/{id}', AttemptQuizWire::class);
    Route::get('/seeResult/{id}',	ResultWire::class);
    // Route::get('/mazegame', 'App\Http\Controllers\MazeGame@index');
    Route::get('/mazegame', MazeGameWire::class);

    // Route::get('/attemptquiz',	AttemptQuizWire::class);

});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Video 360 and 3D Model route
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::middleware('auth')->group(function () {

    // Route::get('/minecraft', function() {
    //     return view('minecraft_demo.index');
    // })->name('minecraft_demo');

    // Route::get('/video_360/{videoId}', function($videoId) {
    //     $video = App\Models\CourseFile::find($videoId);

    //     return view('video_360.index', [
    //         'videoSrc' => $video 
    //     ]);
    // })->name('video_360');

    // Route::get('/3d_model_view/{modelId}', function($modelId) {
    //     $model = App\Models\CourseFile::find($modelId);

    //     return view('3d_model_view.index', [
    //         'modelSrc' => $model 
    //     ]);

    // })->name('3d_model_view');

    // Route::get('/ar_view/{modelId}', function($modelId) {
    //     $model = App\Models\CourseFile::find($modelId);

    //     return view('ar_view.index', [
    //         'modelSrc' => $model 
    //     ]);

    // })->name('ar_view');

    Route::get('/board_game', function() {
        return view('board_game.index');
    })->name('board_game');

    Route::get('/maze_game', function() {
        return view('maze_game.index');
    })->name('maze_game');

    // Route::get('/3d_model_view', function() {
    //     return view('3d_model_view.index');
    // })->name('3d_model_view');

    Route::get('/changeclassto/{classId}', function($classId) {
        $class = App\Models\Team::find($classId);

        $user = App\Models\User::find(auth()->user()->id);
        $user->current_team_id = $class->id;
        $user->save();

        return redirect('dashboard');

    });

});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
