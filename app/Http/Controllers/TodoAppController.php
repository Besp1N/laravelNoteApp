<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function Termwind\terminal;

class TodoAppController extends Controller
{
    protected array $rules =[
        "content" => "required"

    ];
    protected array $customErrorMessages = [
        "content.required" => "Empty message"
    ];
    public function index()
    {
        return view("todoapp.index")->with("tasks", Task::all());
    }
    public function store(Request $request, Task $task)
    {



       $validatedData = $request->validate($this->rules, $this->customErrorMessages);
       Task::create($validatedData);
       return redirect()->route("todoapp.index");
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route("todoapp.index");
    }
    public function update(Task $task, Request $request)
    {
        $validatedData = $request->validate($this->rules);
        $task->update($validatedData);
        return redirect()->route("todoapp.index");
    }
    public function complete(Task $task, Request $request)
    {
        $task->update($request->all());
        return redirect()->route("todoapp.index");
    }


}
