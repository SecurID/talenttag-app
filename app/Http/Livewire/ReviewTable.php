<?php

namespace App\Http\Livewire;

use App\Models\EventPlayer;
use App\Models\Player;
use Livewire\Component;

class ReviewTable extends Component
{
    public $players;
    public $event;
    public $statuses = [];
    public $search = '';

    public function mount(): void
    {
        $this->players = $this->event->players;
    }

    public function render()
    {
        $array = [];
        if ($this->search != '') {
            $eventPlayer = EventPlayer::query()
                ->where('number', 'like', '%' . $this->search . '%')
                ->where('event_id', '=', $this->event->id)
                ->where('number', 'IS NOT', null)
                ->get();

        } else {
            $eventPlayer = EventPlayer::query()
                ->where('event_id', '=', $this->event->id)
                ->where('number', 'IS NOT', null)
                ->get();

        }
        foreach ($eventPlayer as $player) {
            $array[] = $player->player_id;
        }
        $this->players = Player::findMany($array);

        return view('livewire.review-table');
    }
}
