<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    {{-- {{dd($Question)}} --}}
    {{-- @livewire('result.result-form-wire', [['id_createquizzes' => $CreateQuiz->id], ['id_question' => $Question->id]] ) --}}
    @livewire('result.result-form-wire', ['id_createquizzes' => $CreateQuiz->id])
    {{-- {{dd( $Question->id)}}; --}}
    
    {{-- END SECTION - COURSE FILE FORM  --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <h2 class="text-center">Quiz Statistics for total of {{$leaderboards}} students</h2>
                    <canvas id="myChart" width="400" height="100"></canvas>

                    <table class="table table-hover" >
                        
                        <thead>
                            <tr>
                                {{-- <th>No</th> --}}
                                {{-- <th class="text-center">Question Text</th> --}}
                                <th class="text-center">No of Students Got Right</th>
                                <th class="text-center">No of Students Got Wrong</th>
                                <th class="text-center">Percentage of Correctness (%)</th>
                            </tr>
                        </thead>
                        @isset($attemptQuizzes)
                            <tbody>
                                <tr>
                                    {{-- @foreach ($questions as $key => $question) --}}
                                    {{-- <td>{{$key+1}}</td>  --}}
                                    {{-- <td class="text-center">{{$question->question_text}}</td> --}}
                                    {{-- {{$count = 0}}
                                    @if ($question->attemptQuiz->answer->status_answer == '1')
                                    {{$count++}} 
                                    @endif --}}
                                    {{-- <td class="text-center">
                                        <button type="button" wire:click="selectItem2({{$question->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-info data" style="width:120px; height:40px;"><i style="font-size:14px;">See Answer</i></button>
                                    </td> --}}
                                    
                                    <td class="text-center">{{$attemptQuizzes}}</td>
                                    <td class="text-center">{{$leaderboards-$attemptQuizzes}}</td>
                                    <td class="text-center">{{$attemptQuizzes/$leaderboards * 100}}</td>
                                    
                                </tr>
                            </tbody>
                            @endisset
                            {{-- @endforeach --}}
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            
                            <tr>
                                <th>No</th>
                                <th class="text-center">Question Text</th>
                                <th class="text-center">Your Answer</th>
                                <th class="text-center">Result</th>
                                {{-- <th class="text-center">Result</th> --}}
                                <th class="text-center">Action</th>
                                {{-- <th>Actual Answer</th>
                                <th>Answer Explanation</th> --}}
                                {{-- <th>Created At</th>
                                <th>Updated At</th> --}}
                            </tr>
                        </thead>
                        {{-- @isset($result) --}}
                        {{-- @foreach ($leaderboards as $key => $leaderboard)       --}}
                            
                            <tbody>
                                @foreach ($questions as $key => $question)
                                <tr>
                                   
                                        @php
                                            $isAnswered = false;
                                        @endphp
                                        
                                        @foreach ($question->attemptquiz as $attemptquiz)
                                            @if($attemptquiz->id_users == auth()->user()->id)
                                                @php
                                                    $isAnswered = true;
                                                @endphp
                                                @break
                                            @else
                                                @php
                                                    $isAnswered = false;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @if ($isAnswered)
                                            <td>Q{{$key+1}}</td>
                                            <td class="text-center">{{$question->question_text}}</td>
                                            <td class="text-center">{{$attemptquiz->answer->answer}}</td>
                                            {{-- <td class="text-center">{{$attemptquiz->answer->id}}</td> --}}
                                            @if ($attemptquiz->answer->status_answer == '1')
                                                <td class="text-center">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </td>  
                                            @else
                                                <td class="text-center">
                                                    <i class="fa fa-times" aria-hidden="false"></i>
                                                </td>
                                            @endif
                                            
                                            <td class="text-center">
                                                <button type="button" wire:click="selectItem({{$question->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-info data" style="width:120px; height:40px;"><i style="font-size:14px;">See Answer</i></button>
                                            </td>
                                        @else
                                            You have no yet answer the quiz...
                                        @endif

                                </tr>
                                @endforeach
                            </tbody>
                      
                        {{-- @endisset  --}}
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
      {{-- END SECTION - DATATABLE COURSE FILE  --}}   
   
      {{-- $attemptQuizzes = AttemptQuiz::where( [[ 'id_createquizzes', '=', $this->id_createquizzes ], ['id_question', '=', $question->id], ['status_answer', '=', '1']] )->get();
      dd($attemptQuizzes); --}}
      


@push('scripts')

{{-- START SECTION - SCRIPT FOR DELETE BUTTON  --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.1/chart.min.js" integrity="sha512-5vwN8yor2fFT9pgPS9p9R7AszYaNn0LkQElTXIsZFCL7ucT8zDCAqlQXDdaqgA1mZP47hdvztBMsIoFxq/FyyQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

  document.addEventListener('livewire:load', function () {



    $(document).on("click", ".data-buy", function (e) 
        {
            // e.preventDefault();
            // swal({
            // // title: "Buy this file ?",
            // // text: "You sure want to buy ?",
            // // icon: "warning",
            // // buttons: true,
            // // dangerMode: true,
            // })
            // .then((willBuy) => {
            //     // Livewire.emit('buyResources')
            // if (willBuy) {
            //     // window.alert("This is an alert message.") ;
            //     e.preventDefault();
                // window.alert("This is an alert message.") ;
                window.alert("Your newly chosen resources has successfully added into your account.");
            //     Livewire.emit('buyResources($resourcesfile->id)')
            // } 
            // });
        });

        @isset($attemptQuizzes)

         var questions = [];
         var answerWrong = [];
         var answerRight = [];

        @foreach ($questions as $key => $question)
            
            questions.push('Q{{$key + 1}}');

            var wrong = 0;
            var right = 0;
            @foreach($question->attemptquiz as $key => $attemptquiz)

                @if($attemptquiz->status_answer == '1')
                    right++;
                @elseif($attemptquiz->status_answer == '0')
                    wrong++;
                @endif

            @endforeach

            answerWrong.push(wrong);
            answerRight.push(right);

        @endforeach
        
                   console.log(answerWrong , answerRight);
                                    
        var ctx = document.getElementById('myChart');

        const data = {
            labels: questions,
            datasets: [
                {
                label: 'No of Students Got Right',
                data: answerRight,
                backgroundColor: 'rgba(54, 162, 235, 1)',
                borderColor: 'rgba(54, 162, 235, 1)',
                                
                                
                },
                {
                label: 'No of Students Got Wrong',
                data: answerWrong,
                backgroundColor: 'rgba(255, 99, 132, 1)',
                borderColor: 'rgba(255, 99, 132, 1)',
                }
            ]
            };

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true,
                plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    // text: 'Chart.js Bar Chart'
                    // text: ''
                }
                }
            },
            });               
                             
                             
                                    
                            
        @endisset


        

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

