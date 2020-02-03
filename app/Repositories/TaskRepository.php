<?php
namespace App\Repositories;

use App\Repositories\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Task;
use Auth;

class TaskRepository implements TaskRepositoryInterface
{
    protected $task;

    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    public function getList()
    {
        return $this->task->all();
    }

    public function forUser()
    {
        return $this->task->byUser(Auth::id())->get();
    }
}

?>
