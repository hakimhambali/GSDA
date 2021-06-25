<div>
    <div class="card">
      <div class="card-header text-center font-weight-bold">
        <h2>Leaderboards</h2>
      </div>
      <form wire:submit.prevent="search">
          
          {{-- <div class="card-body">
          <label for="exampleInputEmail1">Search by Student's Name</label>
              <div class="input-group">
              
              <input type="text" id="student_name" wire:model="student_name" name="student_name" class="form-control"  placeholder="Please enter student name here...">
              <span class="input-group-btn">
                  <button class="btn btn-secondary" style='height:38px' type="submit"><i class="fas fa-search"></i></button>
              </span>
              </div>
              <br>
              <div class="col-md-12 text-right"  style="color:blue; font-weight:bolder">
                  @if (session()->has('message'))
                      {{ session('message') }}
                  @endif
              <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                  Search
              </button>
          </div>
          </div> --}}

          <div class="card-body">
            <label for="exampleInputEmail1">Search by Quiz Name</label>
                <div class="input-group">
                
                <input type="text" id="quiz_name" wire:model="quiz_name" name="quiz_name" class="form-control"  placeholder="Please enter quiz name here...">
                {{-- {{dd($quiz_name)}}; --}}
                <span class="input-group-btn">
                    <button class="btn btn-secondary" style='height:38px' type="submit"><i class="fas fa-search"></i></button>
                </span>
                </div>
                <br>
                <div class="col-md-12 text-right"  style="color:blue; font-weight:bolder">
                    @if (session()->has('message'))
                        {{ session('message') }}
                    @endif
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Search
                </button>
            </div>
            </div>
      </form>
      </div>
    </div>