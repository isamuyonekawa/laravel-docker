<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JobTest implements ShouldQueue
{
    use Queueable;

    public $user;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // 10秒待機
        sleep(5);
        // idが一致するUserを取得
        $this->user->name = $this->user->name . ' JOB実行OK:' . $this->job->getJobId();
        // DBに保存
        $this->user->save();
    }
}
