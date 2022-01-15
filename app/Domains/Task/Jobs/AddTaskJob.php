<?php

namespace App\Domains\Task\Jobs;

use Lucid\Units\Job;
use App\Data\Models\Task;

class AddTaskJob extends Job
{
    private $title;
    private $description;

    /**
     * Create a new job instance.
     *
     * @param $title
     * @param $description
     */
    public function __construct($title, $description)
    {
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Execute the job.
     *
     * 
     */
    public function handle()
    {

        $attributes = [
            'title' => $this->title,
            'description' => $this->description,
        ];

        Task::create($attributes);
        return redirect()->route('tasklist');
    }
}
