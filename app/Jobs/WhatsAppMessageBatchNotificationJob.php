<?php

namespace App\Jobs;

use App\Models\BulkMessage;
use App\Models\EmployeeBulkMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WhatsAppMessageBatchNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $employees;
    private $bulkMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BulkMessage $bulkMessage)
    {
        $this->bulkMessage = $bulkMessage;
        $this->employees = $bulkMessage->company->employees;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->employees as $employee){
            $messageQueue = EmployeeBulkMessage::create([
                'employee_id' => $employee->id,
                'bulk_message_id' => $this->bulkMessage->id,
                'status' => 'PENDING'
            ]);

             $employee->notify(new \App\Notifications\WhatsAppUpdateToUserNotification());
        }
    }
}
