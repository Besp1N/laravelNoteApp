@extends("layouts.app")
@section("title","To-Do List")

@section("content")
<h1>TO-DO LIST</h1>

<ul>
    @foreach($tasks as $task)
       <li
            @if ($task->completed == 1)
                style="color: red;"
            @endif
       >
           <form method="post" action="{{route("todoapp.update", $task)}}">
               @csrf
               @method("PUT")
               <input type="text" name="content" value="{{$task->content}}">
               <button type="submit">EDIT</button>
           </form>
           <form method="post" action="{{route("todoapp.destroy", $task)}}">
               @csrf
               @method("DELETE")
               <button type="submit">DELETE</button>
           </form>

           <form method="post" action="{{route("todoapp.complete", $task)}}">
               @csrf
               @method("PUT")
               <input type="hidden" name="completed" value="1">
               <button type="submit">MARK AS COMPLETE</button>
           </form>
       </li>
    @endforeach
</ul>


<form method="post">
    @csrf
    <div>
        <input type="text" name="content" placeholder="enter a to do item">
        <input type="submit" value="add">
        @error("content")
            <span style="color: red">{{$message}}</span>
        @enderror
    </div>
</form>
@endsection
