<?php


namespace App\Http;


use App\Models\Chat;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CloseChat
{
    public function __invoke()
    {
        Chat::where("status","=", Chat::STATUS['opened'])
            ->whereTime("created_at", "<", Carbon::now()->subMinutes(30)->format('H:i:s'))
            ->update(["status" => Chat::STATUS['closed']]);

    }


}
