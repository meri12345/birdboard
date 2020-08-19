<?php

namespace App\Observers;

use App\Task;

class TaskObserver
{
    /**
     * Handle the task "created" event.
     *
     * @param \App\Task $task
     * @return void
     */
    public function created(Task $task)
    {
        $task->createActivity('task_created');
    }

    /**
     * Handle the task "deleted" event.
     *
     * @param \App\Task $task
     * @return void
     */
    public function deleted(Task $task)
    {
        $task->createActivity('task_deleted');
    }
}
