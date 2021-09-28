<div>
    {{-- START SECTION - MY CLASS --}}
    {{-- @livewire(['id_createquizzes' => $CreateQuiz->id]) --}}
    @if (auth()->user()->currentClass)
    {{-- {{dd($leaderboards)}} --}}
  
        <div class="row el-element-overlay">
            <div class="col-md-12 text-center">
                <h1 class="card-title">{{auth()->user()->currentClass ? auth()->user()->currentClass->name : 'Not In Any Class'}}</h1>
                <h6 class="card-subtitle m-b-20 text-muted">View all quizzes available for your class</h6>
            </div>
            
            @foreach ($classcourses as $classcourse)
                <div class="col-lg-3 col-md-6" style="padding-bottom: 30px;">
                    <a wire:click="selectItem({{$classcourse->course->id}} , 'showCourseContent')">
                    <div class="card zoom2" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                        <div class="el-card-item">
                    
                                {{-- <div class="el-card-avatar el-overlay-1"> 
                                    <img src="https://ui-avatars.com/api/?size=512&name={{$classcourse->course ? $classcourse->course->name : 'Undefined'}}&color={{mt_rand( 0, 0xFFFFF )}}" alt="user" style="cursor: pointer;"/> 
                                </div> --}}

                                <div class="el-card-avatar el-overlay-1">           
                                    {{-- <img src="{{''.$classcourse->course->thumbnail_path.''}}" alt="Image Preview" style="width:480px;height:200px;">  --}}
                                    {{-- <img src="{{ URL::to('/assets/images/Course2.jpg') }}" alt="user" style="cursor: pointer;"/> --}}
                                    <img src="{{ URL::to(''.$classcourse->course->thumbnail_path.'') }}" alt="Image Preview" style="width:480px;height:200px;"> 
                                </div>
                        
                            <div class="el-card-content" style="cursor: pointer;">
                            <h3 class="box-title">{{$classcourse->course ? $classcourse->course->name : 'Undefined'}}</h3> 
                            <small class="text-muted">{{$classcourse->course ? ($classcourse->course->lecturer ? $classcourse->course->lecturer->name : 'undefined') : 'undefined'}}</small>
                            <br/> </div>
                        </div>
                    </div>
                </a>
                </div>
            @endforeach
        </div>
    
    @else
        
        <!-- Tell user if no data in My Class -->
        <table style="width:100%;height:80vh">
            <tr>
                <td>
                    <div class="row">
                        <div class="jumbotron jumbotron-fluid" style=" margin: auto;width: 50%;">
                            <div class="container">
                                <h2 class="display-3 text-center">You`re currently not in any class.</h2>
                                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    
    @endif

    
    <!-- Modal - Show My Class Data When User Click on Subject -->
    <div id="showCourseContentModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="showCourseContentModal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <table style="border:none;width:100%">
                        <tr>
                            <td style="border:none;width:95%"><h3 class="modal-title font-weight-bold" id="myLargeModalLabel">{{$course ? $course->name : ''}}</h3></td>
                            <td style="border:none;width:5%"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-body">
              
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                                <div class="card-body" style="overflow:scroll">
                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th>Quiz Name</th>
                                                <th class="text-center">Quiz File</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                            </tr>
                                        </thead>
                                        @if ($course)
                                        
                                            {{-- @foreach ($course->createquiz as $createquiz) --}}
                                            @foreach($course->createquiz->sortByDesc('created_at') as $createquiz)
                                            {{-- {{dd($createquiz->id)}} --}}
                                            <tbody>
                                                <tr>
                                                    <td>{{$createquiz->name}}</td>
                                                    <td class="text-center">
                                                        {{-- @if ($createquiz->file_type == "360file")
                                                            <a href="{{URL::to('/video_360/'.$createquiz->id.'')}}" target="_blank" class="btn btn-success">View 360° Video</a>    
                                                        @elseif ($createquiz->file_type == "3dfile")
                                                            <a href="{{URL::to('/3d_model_view/'.$createquiz->id.'')}}" target="_blank" class="btn btn-success">View in VR</a>
                                                            <a href="{{URL::to('/ar_view/'.$createquiz->id.'')}}" target="_blank" class="btn btn-success">View in AR</a> --}}
                                                        {{-- @else --}}
                                                            {{-- <a href="{{URL::to(''.$createquiz->file_path.'')}}" target="_blank" class="btn btn-success">Attempt Quiz</a>  --}}
                                                            {{-- {{dd($createquiz->id)}} --}}
                                                            {{-- <canvas id="script.js" width="400" height="100"></canvas> --}}
                                                            {{-- <p id="countdown">10:00</p> --}}

                                                            
                                                            @php
                                                                $isAnswered = false;
                                                            @endphp
                                                            @foreach($leaderboards as $leaderboard)
                                                            @if ($leaderboard->id_createquizzes != $createquiz->id)
                                                            @php
                                                                $isAnswered = true;
                                                            @endphp
                                                            @else
                                                            @php
                                                                $isAnswered = false;
                                                            @endphp
                                                            @break
                                                            {{-- <button wire:click="attemptQuiz({{$createquiz->id}})" class="btn btn-success" >Attempt Quiz</button> --}}
                                                            @endif
                                                            @endforeach
                                                            @if ($isAnswered)
                                                            <button wire:click="attemptQuiz({{$createquiz->id}})" class="btn btn-success" >Attempt Quiz</button>
                                                            @else
                                                            @endif
                                                            {{-- @foreach($leaderboards->id_createquizzes as $createquiz)
                                                            @endforeach
                                                            @if ($leaderboards[3]->id_createquizzes != $createquiz->id)
                                                            <button wire:click="attemptQuiz({{$createquiz->id}})" class="btn btn-success" >Attempt Quiz</button>
                                                            @else
                                                                
                                                            @endif --}}
                                                            {{-- <button wire:click="attemptQuiz({{$createquiz->id}})" class="btn btn-success" >Attempt Quiz</button> --}}
                                                            <button wire:click="seeResult({{$createquiz->id}})" class="btn btn-success" style="float:right" >See My Result</button>
                                                            
                                                        {{-- @endif --}}
                                                        {{-- <p id="countdown">{{$createquiz->hour}}:{{$createquiz->minute}}</p> --}}
                                                        {{-- <script src="scripts1"></script> --}}
                                                        <br>
                                                        <small>{{$createquiz->file_name}}</small>
                                                    </td>
                                                    <td>{{date('j F Y', strtotime($createquiz->created_at))}}</td>
                                                    <td>{{date('j F Y', strtotime($createquiz->updated_at))}}</td>
                                                
                                                </tr>
                                            </tbody>
                                            @endforeach
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect text-left" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    
    
    <!-- Loading Animation When Click on Subject -->
    <div wire:loading style="position: absolute;top: 0%;width: 100%;height: 100%;z-index: 9999;background-color:#d2d6dc66">
        <table style="width:100%;height:100%">
            <tr>
                <td style="text-align:center;vertical-align:middle">
                    <i class="mdi mdi-loading mdi-spin mdi-48px"></i>
                </td>
            </tr>
        </table>
    </div>
    
    @push('scripts')
    
    <script>
      document.addEventListener('livewire:load', function () {
    
            window.addEventListener('openModal_showCourseContent', event => {
                $('#showCourseContentModal').modal('show')
            })
    
        // const startingMinutes = 10;
        // let time = startingMinutes = 60;

        // const countdownEl = document.getElementById('countdown');

        // setInterval(updateCountdown, 1000);

        // function updateCountdown() {
        //     const minutes = Math.floor(time/60);
        //     let seconds = time % 60;

        //     seconds = seconds < 10 ? '0' + seconds : seconds;

        //     countdownEl.innerHTML = '$(minutes):$(seconds)';
        //     time--;
        // }
    })
    </script>
    
    @endpush
    {{-- END SECTION - MY CLASS --}}

    
    {{-- @push('scripts1')
    <script>
        
    document.addEventListener('livewire:load', function () {


        $(document).on("click",  function (e) 
            {
                const startingMinutes = 10;
                let time = startingMinutes = 60;

                const countdownEl = document.getElementById('countdown');

                setInterval(updateCountdown, 1000);

                function updateCountdown() {
                    const minutes = Math.floor(time/60);
                    let seconds = time % 60;

                    seconds = seconds < 10 ? '0' + seconds : seconds;

                    countdownEl.innerHTML = '$(minutes):$(seconds)';
                    time--;
                }  
            });

    })
    </script>

    @endpush --}}

    </div>
    
    