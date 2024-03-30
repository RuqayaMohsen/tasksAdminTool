<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Support\Facades\Artisan;

class RunTasksAdminTool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:run-tasks-admin-tool';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run Tasks Admin Tool';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Artisan::call('migrate'); // create tables in database

        User::factory(10100) //add 10000 user and 100 admin to users table
            ->sequence(fn (Sequence $sequence) => ['is_admin' => $sequence->index < 10000 ? 0 : 1])
            ->create();

        Artisan::call('serve'); //run the project
    }
}
