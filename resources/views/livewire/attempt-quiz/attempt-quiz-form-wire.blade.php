<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    <div class="row">
        <div class="col-lg-4">
            {{-- @if (isset($questions))
            {{dd($questions)}} 
            @else
                
            @endif --}}
    

         {{-- @if (isset($id_question))

         <input wire:model="id_question" type="text" id="id_question" name="id_question" class="form-control" >
             
         @endif --}}
         {{-- {{dd($question_text)}} --}}
            <h3 style="color:black">Quizzes in Topic Details</h3>
       
            <p class="text-muted">Select a file.</p>
        </div>
        <div class="col-lg-12">
    
            <form wire:submit.prevent="store" enctype="multipart/form-data">
    
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" >
                    <div class="row">
                        
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Question</label>
                                <input wire:model="question_text" type="text" id="question_text" name="question_text" class="form-control" >
                                @error('question_text') <span class="error">{{ $message }}</span> @enderror
                            </div>
                        </div> --}}
                        @isset($question)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Question</label>
                                <input wire:model="question_text" type="text" id="question_text" name="question_text" class="form-control" >
                                @error('question_text') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Answer</label>
                                <select wire:model="answer" name="answer" id="answer" class="form-control custom-select" data-placeholder="Choose Class Topic" tabindex="1">
                                    <option value="">-- Choose Answer --</option>
                                    
                                   
                                    @foreach ($question->answer as $answer)
                                    
                                    <option value="{{$answer->id}}">{{$answer->answer}}</option>
                                    
                                @endforeach
                                {{-- <input type="hidden" id="status_answer" name="status_answer" value="{{$answer->status_answer}}">
                                {{dd($status_answer)}}; --}}
                                   
                                  

                                </select>
                                @error('answer') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div>
                        @endisset
                        {{-- <div class="col-md-4">
                            <div class="demo-radio-button">
                                <input name="group1" type="radio" id="radio_1" wire:model="file_type" value="normalfile" />
                                <label for="radio_1">Normal File</label>

                                <input name="group1" type="radio" id="radio_2" wire:model="file_type" value="3dfile"/>
                                <label for="radio_2">3D File</label>

                                <input name="group1" type="radio" id="radio_3" wire:model="file_type" value="360file"/>
                                <label for="radio_3">360° Video</label>
                            </div>
                        </div> --}}
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                        {{-- <div class="col-md-4" id="fileupload">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">File Upload</label>
                                <div
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                                <div wire:loading wire:target="file_path"><i class="mdi mdi-loading mdi-spin mdi-24px"></i></div>
                                    <input type="file" wire:model="file_path" id="file_path" name="file_path" class="dropify" />
                                    @error('file_path') <span class="error">{{ $message }}</span> @enderror
                                    <div x-show="isUploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
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
    {{-- END SECTION - COURSE FILE FORM  --}}
</div>

 