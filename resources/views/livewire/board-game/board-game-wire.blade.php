<div>
    <h2 id="countdown"></h2>
    @livewire('board-game.board-game-form-wire')
    <div>
    <a href="#" id="btn_finish_attempt" data-hour='' data-min='' data-sec='' class="btn btn-success">Finish</a>
    </div>

    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-footer">
                <h2 id="demo" onmouseover="" style="cursor:pointer;">Identify the most appropriate  design pattern for each following purpose:
                    The class Food is implemented by PeanutButterAndJellySandwich, which contains objects of type Bread, PeanutButter, and Jelly. Bread contains Flour and Salt, and Jelly contains Fruit and Sugar. All of these objects are Food objects themselves.
                    </h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer2"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer3"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer4"></h2>
            </div>
        </div>

    </div>

    <div id="myModal2" class="modal2">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-footer">
                <h2 id="demo" onmouseover="" style="cursor:pointer;">The longest path through a Network diagram is called:
                    </h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer2"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer3"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer4"></h2>
            </div>
        </div>

    </div>

    <div id="myModal3" class="modal3">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-footer">
                <h2 id="demo" onmouseover="" style="cursor:pointer;">Identify the design pattern represented by the given figure and also identify ONE advantage when the design pattern is implemented.
                    </h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer2"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer3"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer4"></h2>
            </div>
        </div>

    </div>

    <div id="myModal4" class="modal4">

        <!-- Modal content -->
        <div class="modal-content">
            <div class="modal-footer">
                <h2 id="demo" onmouseover="" style="cursor:pointer;">Identify which statement is NOT CORRECT to explain Iterator Design Pattern
                    </h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer2"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer3"></h2>
            </div>
            <div class="modal-header">
                {{-- <span class="close">&times;</span> --}}
                <h2 class="answer4"></h2>
            </div>
        </div>

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
                var modal = document.getElementById('myModal');
                if (timer == 5 ) {
                    Livewire.emit('questionQuiz');
                    // Livewire.emit('answerQuiz');
                    // console.log("func called")
                    // modal.style.display = "block";
                    // a = document.querySelector(".answer");
                    // a.textContent = "Facade"
                    // b = document.querySelector(".answer2");
                    // b.textContent = "Composite"
                    // c = document.querySelector(".answer3");
                    // c.textContent = "Singleton"
                    // d = document.querySelector(".answer4");
                    // d.textContent = "Abstract Factory"
                    // alert("Are you ready to answer a question ?!");
                    window.addEventListener('update-question', event => {
                        console.log(event.detail.question);
                    })
                }

                

                var modal2 = document.getElementById('myModal2');
                if (timer == 67 ) {
                    console.log("func called")
                    modal.style.display = "block";
                    a = document.querySelector(".answer");
                    a.textContent = "Slack time"
                    b = document.querySelector(".answer2");
                    b.textContent = "The critical path"
                    c = document.querySelector(".answer3");
                    c.textContent = "Maximum path time"
                    d = document.querySelector(".answer4");
                    d.textContent = "The precedent activity path Factory"
                    // alert("Are you ready to answer a question ?!");
                }
                var modal3 = document.getElementById('myModal3');
                if (timer == 97 ) {
                    console.log("func called")
                    modal.style.display = "block";
                    a = document.querySelector(".answer");
                    a.textContent = "Builder. The advantage is you can use the same construction process to create multiple types classes"
                    b = document.querySelector(".answer2");
                    b.textContent = "Prototype. This design pattern allows us to specify a category of objects using a prototype instance"
                    c = document.querySelector(".answer3");
                    c.textContent = "Builder. The advantage is you can use the same construction process to create multiple types of instance"
                    d = document.querySelector(".answer4");
                    d.textContent = " Prototype. The advantage is this design pattern allows us to specify objects with an only inheritance class"
                    // alert("Are you ready to answer a question ?!");
                }
                var modal4 = document.getElementById('myModal4');
                if (timer == 127 ) {
                    console.log("func called")
                    modal.style.display = "block";
                    a = document.querySelector(".answer2");
                    a.textContent = "Iterator is a behavioral design pattern that lets you traverse elements of a collection and exposing its underlying representation (list, stack, tree etc)"
                    b = document.querySelector(".answer");
                    b.textContent = "You can methods such as fetching the previous element, tracking the current position, and checking the end of the iteration in Iterator design pattern"
                    c = document.querySelector(".answer3");
                    c.textContent = "You can implement new types of collections and iterators and pass them to existing code without modifying the existing code"
                    d = document.querySelector(".answer4");
                    d.textContent = "Applying the pattern can be an overkill if your app only works with simple collections"
                    // alert("Are you ready to answer a question ?!");
                }
            //    document.getElementById("answer").addEventListener("click", myFunction);
               var span = document.getElementsByClassName("answer")[0];
                    span.onclick = function() {
                    timer = timer + 10;
                    modal.style.display = "none";
                }

                var span = document.getElementsByClassName("answer2")[0];
                    span.onclick = function() {
                    
                    modal.style.display = "none";
                }

                var span = document.getElementsByClassName("answer3")[0];
                    span.onclick = function() {
                    timer = timer + 10;
                    modal.style.display = "none";
                }

                var span = document.getElementsByClassName("answer4")[0];
                    span.onclick = function() {
                    timer = timer + 10;
                    modal.style.display = "none";
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
