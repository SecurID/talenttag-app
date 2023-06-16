<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\EventPlayer;
use App\Models\Player;
use Maatwebsite\Excel\Concerns\ToModel;

class PlayersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return Player|null
     */
    public function model(array $row): ?Player
    {
        if ($row[14] == "yes") {
            $parts = preg_split('/^(.*?)\s([^ ]+)$/', $row[3], -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
            $date = \DateTime::createFromFormat('d/m/Y', $row[10]);
            $formattedDate = $date->format('Y-m-d');

            $player =  new Player([
                'first_name' => $row[1],
                'last_name' => $row[2],
                'birthdate' => $formattedDate,
                'email' => $row[7],
                'phone' => $row[8],
                'street' => $parts[0],
                'housenumber' => $parts[1] ?? 'nicht gesetzt',
                'city' => $row[4],
                'zip' => $row[5],
                'club' => $row[6],
                'position' => $row[9],
                'accepted_disclaimer' => true,
            ]);
            $player->save();

            $event = Event::find(1);
            $event_player = new EventPlayer(
                [
                    'player_id' => $player->id,
                    'event_id' => $event->id,
                ]
            );
            $event_player->save();

            return $player;
        }

        return null;
    }
}
