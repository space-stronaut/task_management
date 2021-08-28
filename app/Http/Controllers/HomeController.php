<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = count(Task::all());
        $members = count(User::where('roles', 'member')->get());
        $completed = count(Task::where('status', 'done')->get());
        $total = count(User::all());

        return view('home', compact('tasks', 'members', 'total', 'completed'));
    }
}
