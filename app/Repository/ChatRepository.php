<?php


namespace App\Repository;


use App\Models\CompanyEmployeeChat;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChatRepository
{
    public function startChat(Employee $talent)
    {
        return CompanyEmployeeChat::updateOrCreate([
            "company_id" => $talent->company->id,
            "company_account_administrator_id" => $case->user_id,
            "employee_id" => $talent->id
        ]);
    }

    public function findChatByTalent($case,User $user)
    {
        return CompanyEmployeeChat::firstwhere([
            "talent_profile_id" => $user->id
        ]);
    }

    public function findChatByHash($hash)
    {
        return CompanyEmployeeChat::firstwhere([
            "hash" => $hash
        ]);
    }

}
