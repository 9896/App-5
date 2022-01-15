<?php

namespace App\Domains\Task\Jobs;

use Lucid\Units\Job;

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

    $tasks = Task::get();

    return Inertia::render('Tasks/TaskList', [
        'tasks' => $tasks
    ]);
}
