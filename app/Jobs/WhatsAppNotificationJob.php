<?php

namespace App\Jobs;

use App\Models\Employee;
use App\Models\EmployeeQueuedMessage;
use App\Models\QueuedMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WhatsAppNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $employee;
    private $queuedMessage;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Employee $employee, QueuedMessage $message)
    {
        $this->employee = $employee;
        $this->queuedMessage = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $messageQueue = EmployeeQueuedMessage::create([
            'employee_id' => $this->employee->id,
            'queued_message_id' => $this->queuedMessage->id,
            'status' => 'PENDING'
        ]);

        $this->employee->notify(new \App\Notifications\WhatsAppUpdateToUserNotification());
    }
}
