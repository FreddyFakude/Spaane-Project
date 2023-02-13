<?php

namespace App\Jobs;

use App\Models\BulkMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class BatchMessageNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $employees;

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
            $employee->notify(new \App\Notifications\WhatsAppUpdateToUserNotification());
        }
    }
}
