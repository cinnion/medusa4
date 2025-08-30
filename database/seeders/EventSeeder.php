<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
        ];

        foreach ($events as $event) {
            $rec = new Event($event);
            $rec->created_at = $event['created_at'];
            $rec->updated_at = $event['updated_at'];
            if (isset($event['deleted'])) {
                $rec->deleted_at = $event['deleted_at'];
            }
            $rec->timestamps = false;
            $rec->save();
        }
    }
}
