
<div>
    {{-- START SECTION - CLASS FORM --}}
    <div class="row">
        <div class="col-lg-4">
            <h3 style="color:black">Class Details</h3>
       
            <p class="text-muted">Create a new class by fill up all required field.</p>
        </div>
        <div class="col-lg-12">
    
            <form wire:submit.prevent="store">
    
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Class Name</label>
                                <input wire:model="name" type="text" id="name" name="name" class="form-control" >
                                @error('name') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Class Owner</label>
                                <select wire:model="owner_id" name="owner_id" id="owner_id" class="form-control custom-select" data-placeholder="Choose Class Owner" tabindex="1">
                                    <option value="">-- Choose Class Owner --</option>
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @error('owner_id') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>
                    </div>
                </div>
    
                <div class="card-footer" style="background-color: #f9fafb !important;border-top: none;">
                    <div class="row">
                        <div class="col-md-12 text-right" style="color:blue; font-weight:bolder">
                            @if (session()->has('message'))
                                {{ session('message') }}
                                
                            @endif
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Save
                            </button>
                        </div>
                    </div>
                </div>
    
            </div>
    
        </form>
    
        </div>
    </div>
    {{-- END SECTION - CLASS FORM --}}
    </div>