<?php


namespace App\Repository;


use App\Models\Chat;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ChatRepository
{
    public function findOrCreateChatWithEmployee(Employee $employee): Chat
    {
        return
            Chat::firstOrCreate(
                ['chatable_id'=>$employee->id, 'chatable_type'=> "App\Models\Employee"],
                [
                    'company_id'=>$employee->company->id,
                    'company_account_administrator_id' => $employee->company->administrator->id,
                    'hash'=> sha1(time() . rand(1, 100000))
                ]
            );
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
