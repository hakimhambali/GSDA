<div>
    {{-- START SECTION - COURSE FORM  --}}
    <div class="row">
        <div class="col-lg-4">
            <h3 style="color:black">Topic Details</h3>
       
            <p class="text-muted">Create a new topic by fill up all required field.</p>
        </div>
        <div class="col-lg-12">
    
            <form wire:submit.prevent="store">
    
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" >
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Topic Name</label>
                                <input wire:model="topic_name" type="text" id="topic_name" name="topic_name" class="form-control" >
                                @error('topic_name') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Lecturer</label>
                               
                                @if (auth()->user()->role == 'admin')
                                <select wire:model="id_lecturer" name="id_lecturer" id="id_lecturer" class="form-control custom-select" data-placeholder="Choose Class Owner" tabindex="1">
                                        <option value="">-- Choose Class Lecturer --</option>
                                        @foreach ($lecturers as $lecturer)
                                            <option value="{{$lecturer->id}}">{{$lecturer->name}}</option>
                                        @endforeach
                                    </select>
                                @else
                                <select wire:model="id_lecturer" name="id_lecturer" id="id_lecturer" class="form-control custom-select" data-placeholder="Choose Class Owner" tabindex="1">
                                    <option value="">-- Choose Class Lecturer --</option>
                                    <option value="{{auth()->user()->id}}">{{auth()->user()->name}}</option>
                                </select>
                                @endif
                                
                                @error('id_lecturer') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" id="thumbnailupload">
                        <div class="form-group">
                            <label class="control-label" style="font-weight:500">Thumbnail Upload</label>
                            <div
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div wire:loading wire:target="thumbnail_path"><i class="mdi mdi-loading mdi-spin mdi-24px"></i></div>
                                <input type="file" wire:model="thumbnail_path" id="thumbnail_path" name="thumbnail_path" class="dropify" />
                                @error('thumbnail_path') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                                <div x-show="isUploading">
                                    <progress max="100" x-bind:value="progress"></progress>
                                </div>
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
    {{-- END SECTION - COURSE FORM  --}}
</div>