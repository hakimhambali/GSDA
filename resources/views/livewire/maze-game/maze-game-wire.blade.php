<div>
    <h2 id="countdown"></h2>
    @livewire('maze-game.maze-game-form-wire')
    <div>
    <a href="#" id="btn_finish_attempt" data-hour='' data-min='' data-sec='' class="btn btn-success">Finish</a>
    </div>

    @push('scripts')

<script>
    
    document.addEventListener('livewire:load', function () {

    $('#btn_finish_attempt').on('click' , function(){
        var hourFin = $(this).data('hour');
        var minFin = $(this).data('min');
        var secFin = $(this).data('sec');
    // console.log(qid , hourFin, minFin , secFin);
    Livewire.emit('postTime' , hourFin, minFin , secFin);

    }); 

        function startTimer(duration, durationSet, display) {     

            var timer = duration, hours , minutes, seconds;
            var timer2 = durationSet, hoursSet , minutesSet, secondsSet;
            
            setInterval(function () {
                hours = parseInt((timer /3600)%24, 10)
                minutes = parseInt((timer / 60)%60, 10)
                seconds = parseInt(timer % 60, 10);

                hours = hours < 10 ? "0" + hours : hours;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = hours + ":"  + minutes + ":" + seconds;
                if (++timer < 0) {
                    timer = duration;
                }
                timer3 = timer2-timer;
                console.log(timer3)
                hoursSet = parseInt((timer3 /3600)%24, 10)
                minutesSet = parseInt((timer3 / 60)%60, 10)
                secondsSet = parseInt(timer3 % 60, 10);

                $('#btn_finish_attempt').attr('data-hour',hours);
                $('#btn_finish_attempt').attr('data-min',minutes);
                $('#btn_finish_attempt').attr('data-sec',seconds);
            }, 1000);
        }

        var durationQuizHour = 60 * 60 * 00;
        var durationQuizMin =  60 * 00;
        var durationQuizSec =  00;

        var durationQuizHourSet = 60 * 60 * 00;
        var durationQuizMinSet =  60 * 00;
        var durationQuizSecSet =  00;
        var display = document.querySelector('#countdown');
        startTimer(durationQuizHour + durationQuizMin + durationQuizSec, durationQuizHourSet + durationQuizMinSet + durationQuizSecSet, display);
  })
</script>
{{-- END SECTION - SCRIPT FOR DELETE BUTTON  --}}

@endpush

</div>
