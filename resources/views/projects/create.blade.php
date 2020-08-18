@extends('layouts.app')

@section('content')
<h1>create project</h1>
<form action='/projects' method="post">
    @csrf
    <div>
        <label for="title">Title: </label>
        <div>
            <input id="title" type="text" name="title">
        </div>
    </div>

    <div>
        <label for="desc">Desc:</label>
        <div>
            <textarea name="desc" id="desc"></textarea>
        </div>
    </div>


    <button type="submit">Create Project</button>
    <a href="/projects">Cancel</a>
</form>
@endsection
