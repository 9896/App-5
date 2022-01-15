<?php

namespace App\Domains\Task\Jobs;

use Lucid\Units\Job;
use App\Data\Models\Task;
use Inertia\Inertia;

class GetTasksJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Execute the job.
     *
     */
    public function handle()
    {
        //
        $tasks = Task::get();

        return Inertia::render('Tasks/TaskList', [
            'tasks' => $tasks
        ]);
    }
}
