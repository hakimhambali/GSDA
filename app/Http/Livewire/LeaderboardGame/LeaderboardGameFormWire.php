<?php

namespace App\Http\Livewire\LeaderboardGame;

use Livewire\Component;
use App\Models\LeaderboardGame;

class LeaderboardGameFormWire extends Component
{
    public function render()
    {
        $leaderboardgames = LeaderboardGame::all();
        return view('livewire.leaderboard-game.leaderboard-game-form-wire')->with(compact('leaderboardgames'));
    }
}
