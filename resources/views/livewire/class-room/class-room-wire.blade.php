<div>
   
    {{-- START SECTION - CLASS FORM  --}}
    @livewire('class-room.class-room-form-wire')
    {{-- END SECTION - CLASS FORM  --}}
    


{{-- START SECTION - DATATABLE CLASS  --}}
<div class="row">

<div class="col-md-12">


    <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
        <div class="card-body" style="overflow:scroll">
            <table class="table table-hover" >
                <thead>
                    <tr>
                        <th>Class Name</th>
                        <th>Class Owner</th>
                        <th>Is Personal Class</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th style='width:40px'>Action</th>
                    </tr>
                </thead>
                @foreach ($teams as $team)
                    <tbody>
                        <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->owner ? $team->owner->name : ''}}</td>
                            <td>{{($team->personal_team == 1) ? 'Yes' : 'No'}}</td>
                            <td>{{date('j F Y', strtotime($team->created_at))}}</td>
                            <td>{{date('j F Y', strtotime($team->updated_at))}}</td>
                            <td>
                                <table style="border:none">
                                    <tr>
                                        @if (auth()->user()->role == 'admin')
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$team->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                            </td>
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$team->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$team->id}}"><i class="fas fa-trash-alt"></i></button>
                                            </td>
                                        @endif

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
{{-- END SECTION - DATATABLE CLASS  --}}


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






