<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    <div class="row">
        <div class="col-lg-4">
            <h3 style="color:black">Results of your Quiz</h3>
       
            {{-- <p class="text-muted">Select a file.</p> --}}
        </div>
        <div class="col-lg-12">
    
            <form wire:submit.prevent="store" enctype="multipart/form-data">
    
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" >
                    <div class="row">

                        @foreach ($leaderboards as $leaderboard)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Quiz Name:</label>
                                {{$leaderboard->quiz_name}}
                                {{-- <input wire:model="student_name" type="text" id="student_name" name="student_name" class="form-control" >
                                @error('student_name') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror --}}
                            </div>
                        </div>
                        
                        {{-- <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Quiz Name:</label>
                                <input wire:model="quiz_name" type="text" id="quiz_name" name="quiz_name" class="form-control" >
                                @error('quiz_name') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror
                            </div>
                        </div> --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Duration:</label>
                                {{$leaderboard->hour}} hours {{$leaderboard->minute}} minutes {{$leaderboard->second}} seconds
                                {{-- <input wire:model="duration" type="text" id="duration" name="duration" class="form-control" >
                                @error('duration') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror --}}
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Total Marks:</label>
                                {{$leaderboard->total_marks}}
                                {{-- <input wire:model="total_marks" type="text" id="total_marks" name="total_marks" class="form-control" >
                                @error('total_marks') <span class="error" style="color:red"><b>{{ $message }}</b></span> @enderror --}}
                            </div>
                        </div>
                        @endforeach
                        {{-- @endforeach --}}
                        @foreach ($answers as $answer)

                        {{-- @isset($question) --}}
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Actual Answer: </label>
                                {{$answer->answer}}
                            </div>
                        </div>
                        @isset($answer->answer_explanation)
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label" style="font-weight:500">Answer Explanation: </label>
                                {{$answer->answer_explanation}}
                            </div>
                        </div>
                        @endisset
                        {{-- @endisset --}}
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
    
        </form>
    
        </div>
    </div>
    {{-- END SECTION - COURSE FILE FORM  --}}
</div>

 