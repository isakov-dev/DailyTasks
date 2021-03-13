<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Returns all user's tasks by user id
     *
     * @param  int  $userId
     * @return \Illuminate\Http\Response
     */
    public function getTasksByUserId($userId)
    {
        return Task::where('user_id', $userId)->with('category:id,name')->orderBy('created_at', 'DESC')->get();
    }

    /**
     * Returns task by id
     *
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function getTaskById($taskId)
    {
        return Task::findOrFail($taskId);
    }

    /**
     * Completes task by id
     *
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function completeTaskById($taskId)
    {
        $task = Task::findOrFail($taskId);
        if (!$task->done) {
            $task->done = true;
            $task->save();
        }
        return $task;
    }

    /**
     * Cancels the task by id
     *
     * @param  int  $taskId
     * @return \Illuminate\Http\Response
     */
    public function refuseTaskById($taskId)
    {
        $task = Task::findOrFail($taskId);
        $task->user_id = null;
        return $task;
    }

}
