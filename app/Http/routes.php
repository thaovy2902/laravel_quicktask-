<?php
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::post('/task', function (Request $request) {
    $validator = $request->validate( [
        'name' => 'required|max:255',
    ]);

    // if ($validator->fails()) {
    //     return redirect('/')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect('/');
});

Route::get('/', function () {
    $tasks = Task::orderBy('created_at', 'asc')->get();

    return view('tasks', compact('tasks'));
});

Route::delete('/task/{id}', function ($id) {
    Task::findOrFail($id)->delete();

    return redirect('/');
});
?>