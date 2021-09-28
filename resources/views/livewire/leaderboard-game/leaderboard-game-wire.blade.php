<div>
    {{-- START SECTION - COURSE FILE FORM  --}}
    @livewire('leaderboard-game.leaderboard-game-form-wire')
    {{-- END SECTION - COURSE FILE FORM  --}}

    {{-- START SECTION - DATATABLE COURSE FILE  --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card" style="box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;border-radius: 5px;">
                <div class="card-body" style="overflow:scroll">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="text-center">Student Name</th>
                                {{-- <th >Quiz Name</th> --}}
                                <th class="text-center">Time Taken</th>
                                {{-- <th>Attempt At</th> --}}
                                {{-- <th>Updated At</th> --}}
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        {{-- {{dd($leaderboards)}}; --}}
                        {{-- {{dd($quizName)}}; --}}
                            @foreach ($leaderboardgames as $key => $leaderboardgame)      
                            <tbody>
                                @if (auth()->user()->id == $leaderboardgame->id_users)
                                <tr style="background-color:#BCF5A9;">
                                @else
                                <tr>
                                @endif
                                
                                    <td>{{$key+1}}</td> 
                                    <td class="text-center">{{$leaderboardgame->student_name}}</td>
                                    {{-- <td class="text-center">
                                        <a href="{{URL::to('http://161.139.23.150:8080/ipfs/'.$resourcesfile->link_thumbnail.'')}}" target="_blank" class="btn btn-success">Preview Thumbnail</a>
                                        <br>
                                        <br>
                                        <img src="{{'http://161.139.23.150:8080/ipfs/'.$resourcesfile->link_thumbnail.''}}" alt="Image Preview" style="width:480px;height:200px;">
                                        <i>{{$resourcesfile->resources_name}}</i>
                                    </td> --}}
                                    {{-- <td>{{$leaderboard->quiz_name}}</td> --}}
                                    <td class="text-center">{{$leaderboardgame->hour}} hours {{$leaderboardgame->minute}} minutes {{$leaderboardgame->second}} seconds</td>
                                    {{-- $minute=$createQuiz->minute; --}}
                                    {{-- {{$createquiz->hour}} hours {{$createquiz->minute}} minutes --}}
                                    {{-- <td>{{$leaderboard->minute}}</td> --}}
                                    {{-- <td>{{date('j F Y', strtotime($leaderboard->created_at))}}</td> --}}
                                    {{-- <td>{{date('j F Y', strtotime($leaderboard->updated_at))}}</td> --}}
                                    {{-- <td>{{($resourcesfile->created_by)}}</td> --}}
                                    {{-- <td>
                                        <table style="border:none">
                                            <tr>
                                                <td class="text-center" style="border:none">  
                                                    <button type="button" wire:click="buyResources({{ $resourcesfile->id }})" class="btn btn-sm waves-effect waves-light btn-info data-buy"  style="width:70px; height:30px;"><i class="fas fa-shopping-cart" style="font-size:18px;">Get</i></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </td> --}}
                                    @if ($key+1 == '1')
                                    {{-- <td class="text-center"><img src="{{ url('img/Ranking1.png') }}" alt="homepage" class="dark-logo" style="width:8%;display: inline;" /></td> --}}
                                    <td class="text-center"><i class="fa fa-trophy" aria-hidden="true"></i></td>
                                    @else
                                    <td class="text-center"></td>
                                    @endif

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


    $(document).on("click", ".data-buy", function (e) 
        {
            // e.preventDefault();
            // swal({
            // // title: "Buy this file ?",
            // // text: "You sure want to buy ?",
            // // icon: "warning",
            // // buttons: true,
            // // dangerMode: true,
            // })
            // .then((willBuy) => {
            //     // Livewire.emit('buyResources')
            // if (willBuy) {
            //     // window.alert("This is an alert message.") ;
            //     e.preventDefault();
                // window.alert("This is an alert message.") ;
                window.alert("Your newly chosen resources has successfully added into your account.");
            //     Livewire.emit('buyResources($resourcesfile->id)')
            // } 
            // });
        });

  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>

