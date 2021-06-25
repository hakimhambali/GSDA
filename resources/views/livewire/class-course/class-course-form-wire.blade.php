
<div>
    {{-- START SECTION - CLASS COURSE FORM  --}}
     <div class="row">
         <div class="col-lg-4">
             @if (auth()->user()->role == 'admin')
                 <h3 style="color:black">Add Topic to Class</h3>
         
                 <p class="text-muted">Select a topic.</p>
             @else
                 <div class="md:col-span-1">
                     <div class="px-4 sm:px-0">
                         <h3 class="text-lg font-medium text-gray-900">Add Topic to Class</h3>
                 
                         <p class="mt-1 text-sm text-gray-600">
                             Select a topic.
                         </p>
                     </div>
                 </div>
             @endif
         </div>
     </div>
     <div class="row">
        
             <div class="col-md-12">
        
        
     
             <form wire:submit.prevent="store">
     
             <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                 <div class="card-body" >
                     <div class="row">
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="control-label" style="font-weight:500">Class</label>
                                 <select wire:model="id_class" name="id_class" id="id_class" class="form-control custom-select" data-placeholder="Choose Class Topic" tabindex="1">
                                     <option value="">-- Choose Class --</option>
                                     @foreach ($classes as $class)
                                         <option value="{{$class->id}}">{{$class->name}}</option>
                                     @endforeach
                                 </select>
                                 @error('id_class') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label class="control-label" style="font-weight:500">Topic Name</label>
                                 <select wire:model="topic_name" name="topic_name" id="topic_name" class="form-control custom-select" data-placeholder="Choose Class Topic" tabindex="1">
                                     <option value="">-- Choose Class Topic --</option>
                                     @foreach ($courses as $course)
                                         <option value="{{$course->id}}">{{$course->name}}</option>
                                     @endforeach
                                 </select>
                                 @error('topic_name') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
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
                                 Add Topic to Class
                             </button>
                         </div>
                     </div>
                 </div>
     
             </div>
     
         </form>
     
         </div>
     </div>
     {{-- END SECTION - CLASS COURSE FORM  --}}
     </div>