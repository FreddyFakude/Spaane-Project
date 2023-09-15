<?php

namespace App\Helper;

use App\Jobs\WhatsAppNotificationJob;
use App\Models\BulkMessage;
use App\Models\Company;
use App\Models\Employee;
use App\Models\QueuedMessage;
use Illuminate\Support\Facades\Auth;

class Spaane
{

    const EMPOLOYEE_DEFAULT_PASSWORD = 'password';
    public function sendQueuedMessage(Employee $employee, Company $company,  $message, $title = 'Message from Spaane')
    {
        $message = QueuedMessage::create([
            "company_id" => $company->id,
            "message" => $message,
            "title" => $title
        ]);
      return  WhatsAppNotificationJob::dispatch($employee, $message)->delay(now()->addSeconds(5));
    }

}
