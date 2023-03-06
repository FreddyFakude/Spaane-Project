<?php


namespace App\Repository;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChatRepository
{
    public function startChat(Employee $talent)
    {
        return Chat::updateOrCreate([
            "company_id" => $talent->company->id,
            "company_account_administrator_id" => $case->user_id,
            "employee_id" => $talent->id
        ]);
    }

    public function findChatByTalent($case,User $user)
    {
        return Chat::firstwhere([
            "talent_profile_id" => $user->id
        ]);
    }

    public function findChatByHash($hash)
    {
        return Chat::firstwhere([
            "hash" => $hash
        ]);
    }

}
