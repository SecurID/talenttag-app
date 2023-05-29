<?php

namespace App\Http\Livewire;

use App\Models\Event;
use App\Models\EventPlayer;
use Livewire\Component;
use App\Models\Player;

class PlayersTable extends Component
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
        if($this->search != '' ) {
            $this->players =  $this->event->players()
                ->where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('birthdate', 'like', '%' . $this->search . '%')
                ->orWhere('club', 'like', '%' . $this->search . '%')
                ->get();
        } else {
            $this->players = $this->event->players;
        }

        return view('livewire.players-table');
    }

    public function updatePlayer($player_id, $event_id, $number): void
    {
        $player = Player::find($player_id);
        $event = Event::find($event_id);
        $pivot = EventPlayer::where('event_id', '=', $event->id)->where('player_id', '=', $player->id)->first();
        if ($number == ''){
            $pivot->number = null;
        } else {
            $pivot->number = $number;
        }
        $saved = $pivot->save();

        if ($saved) {
            $this->statuses[$player_id] = 'saved';
            $this->dispatchBrowserEvent('status-updated', ['id' => $player->id]);
        } else {
            $this->statuses[$player_id] = 'failed';
            $this->dispatchBrowserEvent('status-updated', ['id' => $player->id]);
        }
    }

    public function resetStatus($id)
    {
        unset($this->statuses[$id]);
    }
}
