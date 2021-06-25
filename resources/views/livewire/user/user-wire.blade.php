<div>

{{-- START SECTION - USER FORM  --}}
@livewire('user.user-form-wire')
{{-- END SECTION - USER FORM  --}}

{{-- START SECTION - DATATABLE USER  --}}
 <div class="row">
    <div class="col-md-12">
        <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
            <div class="card-body" style="overflow:scroll">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th style='width:40px'>Action</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody>
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{date('j F Y', strtotime($user->created_at))}}</td>
                                <td>{{date('j F Y', strtotime($user->updated_at))}}</td>
                                <td>
                                    <table style="border:none">
                                        <tr>
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$user->id}} , 'update' )" class="btn btn-sm waves-effect waves-light btn-warning"><i class="far fa-edit"></i></button>
                                            </td>
                                            <td style="border:none">
                                                <button type="button" wire:click="selectItem({{$user->id}} , 'delete' )" class="btn btn-sm waves-effect waves-light btn-danger data-delete" data-form="{{$user->id}}"><i class="fas fa-trash-alt"></i></button>
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
{{-- END SECTION - DATATABLE USER  --}}

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






