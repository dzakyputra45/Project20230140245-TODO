public function index()
{
    // $todos = Todo::all();
    $todos = Todo::where('user_id', Auth::id())->get();
    dd($todos);
    return view('todos.index');
}