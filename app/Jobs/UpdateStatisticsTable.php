<?php

namespace App\Jobs;

use App\Models\Statistics;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class UpdateStatisticsTable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $latestTasksCount = Task::where('created_at','>', Carbon::now()->subDay())
            ->select('assigned_to_id', DB::raw('count(*) as count'))
            ->groupBy('assigned_to_id')->get()->toArray();

        foreach($latestTasksCount as $tasksCount)
        {
            Statistics::updateOrCreate([
                'user_id' => $tasksCount['assigned_to_id']
            ],[
                'number_of_tasks' => $tasksCount['count']
            ]);
        }
    }
}
