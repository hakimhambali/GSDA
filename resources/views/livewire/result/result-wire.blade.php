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
                    <table class="table table-hover" >
                        <h2 class="text-center">Quiz Statistics for total of {{$leaderboards}} students</h2>
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
                                <tr>
                                    @foreach ($questions as $key => $question)
                                    <td>{{$key+1}}</td> 
                                    
                                    <td class="text-center">{{$question->question_text}}</td>

                                    {{-- @foreach ($attemptQuizzes as $key => $attemptQuiz) --}}
                                    <td class="text-center">{{$question->attemptquiz->answer->answer}}</td>
                                    {{-- @endforeach --}}

                                    {{-- @foreach ($answers as $key => $answer)
                                    <td>{{$answer->id}}</td>
                                    @endforeach --}}

                                    {{-- {{dd($result->answer->id)}}; --}}
                                     {{-- @foreach ($answers as $key => $answer)
                                    <td>{{$answer->answer_explanation}}</td>
                                    @endforeach --}}
                                   @if ($question->attemptquiz->answer->status_answer == '1')
                                        <td class="text-center">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </td>  
                                    @else
                                        <td class="text-center">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </td>
                                    @endif
                                    
                                    <td class="text-center">
                                        <button type="button" wire:click="selectItem({{$question->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-info data" style="width:120px; height:40px;"><i style="font-size:14px;">See Answer</i></button>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

