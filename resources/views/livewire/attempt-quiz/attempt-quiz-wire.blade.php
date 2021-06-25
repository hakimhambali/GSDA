<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    {{-- {{dd($CreateQuiz->questions)}} --}}
    @livewire('attempt-quiz.attempt-quiz-form-wire', ['id_createquizzes' => $CreateQuiz->id])
    {{-- @livewire('questions.questions-form-wire', ['id_createquizzes' => $CreateQuiz->id]) --}}
    {{-- END SECTION - COURSE FILE FORM  --}}

    {{-- START SECTION - DATATABLE COURSE FILE  --}}
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
                        <a href="/result" wire:click="finishAttempt({{$question->id}} , 'finish' )" class="btn btn-success data-delete">Finish Attempt Quiz</a>
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

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

