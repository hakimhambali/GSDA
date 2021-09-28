<?php

namespace App\Http\Livewire\LeaderboardGame;

use Livewire\Component;
use App\Models\LeaderboardGame;

class LeaderboardGameWire extends Component
{
    public function render()
    {
        $leaderboardgames = LeaderboardGame::orderBy('hour','asc')->orderBy('minute','asc')->orderBy('second','asc')->get();
        return view('livewire.leaderboard-game.leaderboard-game-wire')->with(compact('leaderboardgames'));
    }
}
