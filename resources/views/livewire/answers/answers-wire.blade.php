<div>

    {{-- START SECTION - COURSE FILE FORM  --}}
    {{-- @livewire('questions.questions-form-wire') --}}
    @livewire('answers.answers-form-wire', ['id_question' => $Question->id] )
    {{-- END SECTION - COURSE FILE FORM  --}}
    
    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Answer</th>
                                 {{-- <th>Answer</th> --}}
                                <th>Answer Explanation</th>
                                {{-- <th>Quiz File</th> --}}
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th >Action</th>
                                <th >Correct Answer</th>
                            </tr>
                        </thead>
                  
             
                       
                            @foreach ($Question->answer as $answer)
                            <tbody>
                                <tr>
                                    <td>{{$answer->answer}}</td>
                                    {{-- <td>{{$question->answer}}</td> --}}
                                    <td>{{$answer->answer_explanation}}</td>
                                    {{-- <td class="text-center"> <button wire:click="addAnswer({{$answer->id}})" class="btn btn-success" >Add Answer</button>  </td> --}}
                                    <td>{{date('j F Y', strtotime($answer->created_at))}}</td>
                                    <td>{{date('j F Y', strtotime($answer->updated_at))}}</td>
                                    <td>
                                        <table style="border:none">
                                            <tr>
                                                {{-- {{dd($question->id)}} --}}
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$answer->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                                </td>
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$answer->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$answer->id}}"><i class="fas fa-trash-alt"></i></button>
                                                </td>
                                            </tr>

                                        </table>
                                    </td>
                                    <td>
                                        <table style="border:none">
                                            <tr>
                                                <td style="border:none">
                                                    @if ($answer->status_answer==1)
                                                    {{-- <button type="button" wire:click="selectItem({{$answer->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$answer->id}}"><i class="fas fa-trash-alt"></i></button> --}}
                                                    <label for="status" class="btn btn-success">True</label>
                                                         <input type="radio" name="status" id="status" value="status"><br>
                                                    @else 
                                                    {{-- ($answer->status==false) --}}
                                                    <button wire:click="changeStatus({{$answer->id}})" class="btn btn-success" >Make as true</button>
                                                    @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        
                    </table>
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
            text: "Once deleted, you will not be able to recover!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                e.preventDefault();
                Livewire.emit('delete')
            } 
            });
        });

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

