<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <br><br>
    {{-- <span class='btn'>Click to play some music!</span> --}}
    <button class='btn' style="float:right" >Click to play some music!</button>
    <h2 id="countdown"></h2>
    {{-- START SECTION - COURSE FILE FORM  --}}
    {{-- {{dd($CreateQuiz->questions)}} --}}
    @livewire('attempt-quiz.attempt-quiz-form-wire', ['id_createquizzes' => $CreateQuiz->id])
    {{-- @livewire('questions.questions-form-wire', ['id_createquizzes' => $CreateQuiz->id]) --}}
    {{-- END SECTION - COURSE FILE FORM  --}}
    {{-- <audio controls>
        <source src="horse.ogg" type="audio/ogg">
        <source src="horse.mp3" type="audio/mpeg">
        Your browser does not support the audio tag.
      </audio> --}}
    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    {{-- <canvas id="script.js" width="400" height="100"></canvas> --}}
    {{-- <h2 id="countdown"></h2> --}}
    
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Question</th>
                                {{-- <th>Quiz Name</th>
                                <th class="text-center">Quiz File</th>
                                <th>Created At</th>
                                <th>Updated At</th> --}}
                                <th style='width:40px' class="text-center">Action</th>
                            </tr>
                        </thead>
                    
                            @foreach ($CreateQuiz->questions as $key  => $question)
                            <tbody>
                                <tr>
                                     <td>{{$key+1}}</td> 
                                    {{-- <td>{{$question}}</td> --}}
                                    {{-- <td>{{$attemptquiz->createquiz->question ? $attemptquiz->course->name : ''}}</td> --}}
                                    {{-- {{dd($attemptquiz->createquiz)}} --}}
                                    {{-- {{dd($CreateQuiz->id)}} --}}
                                    {{-- <td>{{$attemptquiz->createquiz->questions->question_text}}</td> --}}
                                    <td>{{$question->question_text}}</td>
                                    {{-- {{dd($attemptquiz->createquiz)}} --}}
                                    {{-- <td>{{$attemptquiz->name}}</td>
                                    <td class="text-center">
                                        <a href="{{URL::to(''.$attemptquiz->file_path.'')}}" target="_blank" class="btn btn-success">Download</a>
                                        <br>
                                        <small>{{$attemptquiz->file_name}}</small>
                                    </td>
                                    <td>{{date('j F Y', strtotime($attemptquiz->created_at))}}</td>
                                    <td>{{date('j F Y', strtotime($attemptquiz->updated_at))}}</td> --}}
                                    <td>
                                        <table style="border:none">
                                            <tr>
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$question->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-info data-buy"  style="width:100px; height:30px;"><i class="fa fa-paint-brush" style="font-size:18px;">Attempt</i></button>
                                                    {{-- {{dd($question->id)}} --}}
                                                </td>

                                                {{-- <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$attemptquiz->id}} , 'add' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                                </td> --}}

                                                {{-- <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$question->id}} , 'add' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="fa fa-user-plus"></i></button>
                                                </td> --}}

                                                {{-- <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                                    Save
                                                </button> --}}
                                                {{-- <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$question->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$question->id}}"><i class="fas fa-trash-alt"></i></button>
                                                </td> --}}
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                    </table>
                    <td style="border:none">
                        {{-- <button type="button" href="/myclass" style="width:160px; height:30px;"><i  style="font-size:14px;">Finish Attempt Quiz</i></button> --}}
                        <a href="#" id="btn_finish_attempt" data-qid='{{$question->id}}' data-hour='' data-min='' data-sec='' class="btn btn-success">Finish Attempt Quiz</a>
                        <a style="color:blue; font-weight:bolder">
                            @if (session()->has('message'))
                                {{ session('message') }}
                            @endif
                        </a>
                        <button wire:click="seeResult({{$CreateQuiz->id}})" class="btn btn-success" style="float:right" >See My Result</button>
                        {{-- <td style="border:none">
                            <button type="button" wire:click="selectItem({{$createquiz->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$createquiz->id}}"><i class="fas fa-trash-alt"></i></button>
                        </td> --}}
                        {{-- {{dd($CreateQuiz->id)}}; --}}
                            
                        {{-- {{dd($question->id)}} --}}
                    </td>
                </div>
            </div>
        </div>
    </div>
      {{-- END SECTION - DATATABLE COURSE FILE  --}}        


@push('scripts')

{{-- START SECTION - SCRIPT FOR DELETE BUTTON  --}}
<script>
    
  document.addEventListener('livewire:load', function () {
    
    var audioUrl = '{{ URL::to("/assets/images/Instrumental - Return Unto Thy Rest.mp3") }}';
    // SIMPLE EXEMPLE
    $('.btn').click( () => new Audio(audioUrl).play() ); // that will do the trick !!

    $('#btn_finish_attempt').on('click' , function(){
        var qid = $(this).data('qid');
        var hourFin = $(this).data('hour');
        var minFin = $(this).data('min');
        var secFin = $(this).data('sec');
    // console.log(qid , hourFin, minFin , secFin);
    Livewire.emit('postTime' , qid , hourFin, minFin , secFin);

    }); 

        $(document).on("click", ".data-delete", function (e) 
        {
            e.preventDefault();
            swal({
            title: "Are you sure?",
            text: "Once submitted, you will not be able to attempt back!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            });
        });

        // var startingMinutes = 10;
        // var time = startingMinutes = 60;

        // var countdownEl = document.getElementById('countdown');

        // setInterval(updateCountdown, 1000);

        // function updateCountdown() {
        //     var minutes = Math.floor(time/60);
        //     var seconds = time % 60;

        //     seconds = seconds < 10 ? '0' + seconds : seconds;

        //     countdownEl.innerHTML = ''+minutes+':'+seconds+'';
        //     time--;

        //     console.log(minutes, seconds);
        // }


        function startTimer(duration, durationSet, display) {     

            var timer = duration, hours , minutes, seconds;
            var timer2 = durationSet, hoursSet , minutesSet, secondsSet;
            
            setInterval(function () {
                hours = parseInt((timer /3600)%24, 10)
                minutes = parseInt((timer / 60)%60, 10)
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":"  + minutes + ":" + seconds;
                // console.log("Timeout")
                // console.log(timer)
                if (--timer < 0) {
                    timer = duration;
                    // console.log("duration")
                }
                // console.log(timer2)
                timer3 = timer2-timer;
                console.log(timer3)
                hoursSet = parseInt((timer3 /3600)%24, 10)
                minutesSet = parseInt((timer3 / 60)%60, 10)
                secondsSet = parseInt(timer3 % 60, 10);

                // hoursSet = hoursSet < 10 ? "0" + hoursSet : hoursSet;
                // minutesSet = minutesSet < 10 ? "0" + minutesSet : minutesSet;
                // secondsSet = secondsSet < 10 ? "0" + secondsSet : secondsSet;

                // display.textContent = hoursSet + ":"  + minutesSet + ":" + secondsSet;

                // if (--timer2 < 0) {
                //     timer2 = durationSet;
                // }

              
                $('#btn_finish_attempt').attr('data-hour',hoursSet);
                $('#btn_finish_attempt').attr('data-min',minutesSet);
                $('#btn_finish_attempt').attr('data-sec',secondsSet);

                if(hours === '00'  && minutes === '00' && seconds === '00'){
                        // console.log("Timeout")
                        //Logic pegi page lain tuu kalau mase habis
                        // <button wire:click="seeResult({{$CreateQuiz->id}})" class="btn btn-success" style="float:right" >See My Result</button>
                        // window.location.replace("http://www.w3schools.com");
                        // window.location.replace("seeResult({{$CreateQuiz->id}})");
                        // window.location.replace("http://gsda2.test/seeResult/{{$CreateQuiz->id}}");
                        window.location.replace("http://gsda2.test/seeResult/{{$CreateQuiz->id}}");    
                }
            }, 1000);
        }

        //Pass data yang lecturer key in kat sini
        // console.log('{{$CreateQuiz->hour}}' , '{{$CreateQuiz->minute}}');
        var durationQuizHour = 60 * 60 * '{{$CreateQuiz->hour}}';
        var durationQuizMin =  60 * '{{$CreateQuiz->minute}}';
        var durationQuizSec =  00;

        var durationQuizHourSet = 60 * 60 * '{{$CreateQuiz->hour}}';
        var durationQuizMinSet =  60 * '{{$CreateQuiz->minute}}';
        var durationQuizSecSet =  00;
        // var durationQuizHour = 60 * 60 * 00;
        // var durationQuizMin =  60 * 00;
        // var durationQuizSec =  15;
        var display = document.querySelector('#countdown');
        startTimer(durationQuizHour + durationQuizMin + durationQuizSec, durationQuizHourSet + durationQuizMinSet + durationQuizSecSet, display);
                                       
        //  $durationHour =  durationQuizHour;
        //  $durationMin =  durationQuizMin;
        //  $durationSec =  durationQuizSec;

        // dd($durationHour);
        // Livewire.emit('postTime',  $durationHour, $durationMin, $durationSec);
        // console.log("Timeout")
        // $this->emit('finishAttempt', $post->id);
        // $this->emit('postAdded', $post->id);
  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

