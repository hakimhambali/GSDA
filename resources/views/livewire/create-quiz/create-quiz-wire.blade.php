<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    @livewire('create-quiz.create-quiz-form-wire')
    {{-- END SECTION - COURSE FILE FORM  --}}

    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>Topic Name</th>
                                <th>Quiz Name</th>
                                <th class="text-center">Quiz File</th>
                                {{-- <th>Duration hour</th>
                                <th>Duration minute</th> --}}
                                <th>Duration</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th style='width:40px'>Action</th>
                            </tr>
                        </thead>
                    
                            @foreach ($createquizzes as $createquiz)
                            <tbody>
                                <tr>
                                    <td>{{$createquiz->course ? $createquiz->course->name : ''}}</td>
                                    {{-- {{dd($createquiz->course ? $createquiz->course->name : '')}} --}}
                                    <td>{{$createquiz->name}}</td>
                                    <td class="text-center">
                                        {{-- <a href="{{URL::to(''.$createquiz->file_path.'')}}" target="_blank" class="btn btn-success">Add Question</a> --}}
                                        {{-- <a href='{{URL::to('createquiz123')}}' target="_blank" class="btn btn-success">View Question</a> --}}
                                        <button wire:click="addQuestion({{$createquiz->id}})" class="btn btn-success" >View Question</button>
                                        {{-- <button type="button" wire:click="selectItem({{$createquiz->id}} , 'index' )" class="btn btn-sm waves-effect waves-light btn-danger" data-form="{{$createquiz->id}}"><i class="fas fa-trash-alt"></i></button> --}}
                                        {{-- <button wire:click="index" target="_blank" >hehe</button> --}}
                                        {{-- <a href="{{URL::to(''.$createquiz->file_path.'')}}" target="_blank" class="btn btn-success">Add Question</a> --}}
                                        {{-- <button type="button" wire:click="selectItem({{$createquiz->id}} , 'index' )" class="btn btn-sm waves-effect waves-light btn-danger" data-form="{{$createquiz->id}}"><i class="fas fa-trash-alt"></i></button> --}}
                                        {{-- <button wire:click="index">hehe</button> --}}
                                        <br>
                                        {{-- <small>{{$createquiz->file_name}}</small> --}}
                                    </td>
                                    {{-- <td>{{$createquiz->hour}}</td>
                                    <td>{{$createquiz->minute}}</td> --}}
                                    <td>{{$createquiz->hour}} hours {{$createquiz->minute}} minutes</td>
                                    <td>{{date('j F Y', strtotime($createquiz->created_at))}}</td>
                                    <td>{{date('j F Y', strtotime($createquiz->updated_at))}}</td>
                                    <td>
                                        <table style="border:none">
                                            <tr>
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$createquiz->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                                    {{-- <button type="button" wire:click="selectItem({{$course->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button> --}}
                                                </td>
                                                <td style="border:none">
                                                    <button type="button" wire:click="selectItem({{$createquiz->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$createquiz->id}}"><i class="fas fa-trash-alt"></i></button>
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

