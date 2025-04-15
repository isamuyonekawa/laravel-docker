<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\DownloadHistory;
use Illuminate\Support\Facades\Log;

class JobTest implements ShouldQueue
{
    use Queueable;

    const TYPE = 'user_list';

    public $downloadHistory;

    /**
     * Create a new job instance.
     */
    public function __construct(DownloadHistory $downloadHistory)
    {
        $this->downloadHistory = $downloadHistory;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 10秒待機
        sleep(5);

        try {
            $this->downloadHistory->status = 'completed';
            $this->downloadHistory->save();
        } catch (\Exception $e) {
            // エラーログを記録
            Log::error('Failed to save DownloadHistory: ' . $e->getMessage());

            // 必要に応じて例外を再スロー
            throw $e;
        }
    }
}
