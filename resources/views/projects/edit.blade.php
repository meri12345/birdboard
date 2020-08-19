@extends('layouts.app')

@section('content')

    <div class="bg-white p-16 rounded shadow-lg mx-auto w-3/5">
        <h1 class="font-bold text-2xl">Edit Project</h1>
        <form action='{{$project->path()}}' method="post">
            @csrf
            @method('PATCH')
            <div>
                <label class="text-xl" for="title">Title: </label>
                <div>
                    <input value="{{$project->title}}" class="w-full border-2 border-gray-400 p-2" id="title" type="text" name="title">
                    @error('title')
                        <p class="text-red-500 text-sm">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label class="text-xl" for="desc">Description:</label>
                <div>
                    <textarea class="w-full border-2 border-gray-400 p-2" name="desc" id="desc">{{$project->desc}}</textarea>
                    @error('desc')
                    <p class="text-red-500 text-sm">{{$message}}</p>
                    @enderror
                </div>
            </div>


            <button class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" type="submit">Update Project</button>
            <a href="{{$project->path()}}">Cancel</a>
        </form>
    </div>

@endsection
