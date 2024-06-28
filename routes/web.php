<?php
use Illuminate\http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Task;



Route::get('/tasks', function ()  {
    return view('index',
    [
        'tasks' => Task::latest('updated_at')->paginate(10)
    ]);
}) ->name('tasks.index');

Route::view('/tasks/create', 'create') ->name('tasks.create');

Route::get('/tasks/{id}/edit', function($id) {

    return view('edit', [
        'task' => Task::findOrFail($id)
    ]);

})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
  ;
   return view('show', ['tasks' => Task::findOrFail($id)]);

})->name('tasks.show');

Route::post('/tasks', function(Request $request){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|min:10'
    ]);

    $task = new Task;
    $task -> title = $data['title'];
    $task -> description = $data['description'];
    $task -> completed = false;
    $task -> save();

    return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task created');
})->name('tasks.store');

Route::put('/tasks/{id}', function($id, Request $request){
    $status = (bool) $request->input('completed');
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required|min:10',
        'completed' => 'sometimes'
    ]);
    
    $task = Task::findOrFail($id);
    $task -> title = $data['title'];
    $task -> description = $data['description'];
    $task -> completed = $request->has('completed') ? $data['completed'] : 0;
    $task -> save();

    return redirect()->route('tasks.show', ['id' => $task->id])
    ->with('success', 'Task updated');
})->name('tasks.update');

Route::put('/tasks/edit', function($id, Request $request){

    $data = $request->validate([
        'checkbox' => 'required'
    ]);

    $task = Task::findOrFail($id);
    $task -> completed = $data['checkbox'];
    $task -> save();
})->name('tasks.complete');

Route::delete('/tasks/{id}', function ($id){

    $task = Task::findOrFail($id);
    $task -> delete();

    return redirect()->route('tasks.index')-> with('success', 'Task deleted');

})->name('tasks.destroy');
/* Route::get('/cab', function () {
    return 'cabinet';
});

Route::get('/greet/{name}', function ($name) {
    return 'Hello' . $name . '!';
});

Route::get('/hallo', function () {
    return redirect()->route('home');
});

Route::fallback(function () {
    return 'Still got somewhere';
}); */