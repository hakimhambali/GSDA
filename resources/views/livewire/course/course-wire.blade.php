<div>

{{-- START SECTION - COURSE FORM  --}}
@livewire('course.course-form-wire')
{{-- END SECTION - COURSE FORM  --}}

{{-- START SECTION - DATATABLE COURSE  --}}
<div class="row">
    <div class="col-md-12">
        <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
            <div class="card-body" style="overflow:scroll">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>Topic Name</th>
                            <th>Lecturer</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th style='width:40px'>Action</th>
                        </tr>
                    </thead>
                    @foreach ($courses as $course)
                        <tbody>
                            <tr>
                                <td>{{$course->name}}</td>
                                <td>{{$course->lecturer ? $course->lecturer->name : 'undefined'}}</td>
                                <td>{{date('j F Y', strtotime($course->created_at))}}</td>
                                <td>{{date('j F Y', strtotime($course->updated_at))}}</td>
                                <td>
                                    <table style="border:none">
                                        <tr>
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$course->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                            </td>
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$course->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$course->id}}"><i class="fas fa-trash-alt"></i></button>
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
{{-- END SECTION - DATATABLE COURSE  --}}

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






