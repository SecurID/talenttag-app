<?php

namespace App\Http\Livewire;

use App\Models\EventPlayer;
use App\Models\Player;
use App\Models\Rating;
use Livewire\Component;

class RatingsTable extends Component
{
    public $players;
    public $event;
    public $search = '';

    public $rating = '';
    public $comment = '';
    public $playername;

    protected $listeners = ['storePlayerRecord'];

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

        return view('livewire.ratings-table');
    }

    public function storePlayerRecord($playerId): void
    {
        if($this->rating != '') {
            $rating = new Rating([
                'event_id' => 1,
                'player_id' => $playerId,
                'rating' => $this->rating,
                'comment' => $this->comment,
            ]);
            $rating->save();
            $this->resetInputFields();
        }
        $this->emit('ratingStored');
    }

    private function resetInputFields(): void
    {
        $this->rating = '';
        $this->comment = '';
    }
}
