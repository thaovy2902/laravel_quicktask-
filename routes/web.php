<?php
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

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