<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function showStatistics()
    {
        $usersTasksCounts = Statistics::orderBy('number_of_tasks','DESC')->limit(10)->with('user:id,name')->get();

        return view('statistics', ['usersTasksCounts' => $usersTasksCounts]);
    }

    public function index()
    {
        $tasks = Task::with(['user:id,name','admin:id,name'])->paginate(10);

        return view('tasks', ['tasks' => $tasks]);
    }

    public function create()
    {
        $users = User::select('id','name')->where('is_admin',0)->get();
        $admins = User::select('id','name')->where('is_admin',1)->get();

        return view('create_task', ['admins' => $admins, 'users' => $users]);
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'assigned_to_id' => 'required',
            'assigned_by_id' => 'required',
        ], [],
        [
            'assigned_to_id' => 'user',
            'assigned_by_id' => 'admin',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        Task::create([
            'title' => request()->title,
            'description' => request()->description,
            'assigned_to_id' => request()->assigned_to_id,
            'assigned_by_id' => request()->assigned_by_id,
        ]);

        $tasks = Task::with(['user:id,name','admin:id,name'])->paginate(10);

        return redirect('tasks?page='. $tasks->lastPage());
    }
}
