<?php

namespace App\Imports;

use App\Models\Event;
use App\Models\EventPlayer;
use App\Models\Player;
use Illuminate\Support\Carbon;
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
        if ($row[8] == "Frankfurt (Sonntag, den 29.09.)") {
            $name = explode(' ', $row[1], 2);

            $player =  new Player([
                'first_name' => $name[0],
                'last_name' => $name[1] ?? null,
                'birthdate' => $this->convertExcelDate($row[2]),
                'email' => $row[6],
                'phone' => $row[7],
                'city' => $row[3],
                'club' => $row[4],
                'accepted_disclaimer' => true,
            ]);
            $player->save();

            $event = Event::find(2);
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

    function convertExcelDate($excelDate) {

        if(!is_numeric($excelDate)) {
            return Carbon::create(1900,1,1)->format('Y-m-d');
        }

        // Excel dates are days since January 1, 1900
        // Carbon's addDays method will add the number of days to January 1, 1900
        // Adjust by -1 day because Excel considers 1/1/1900 as day 1
        $date = Carbon::create(1900, 1, 1)->addDays($excelDate - 2);

        return $date->format('Y-m-d');
    }
}
