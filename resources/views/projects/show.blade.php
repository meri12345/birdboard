@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <h1 class="mr-auto text-gray-600"><a href="/projects">My projects</a> / {{$project->title}}</h1>
        <a class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" href="/projects/create">Add Task</a>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3">
                <div class="mb-6">
                    <h1 class="mr-auto text-lg text-gray-600 mb-3">Tasks</h1>
                    @foreach ($project->tasks as $task)
                    <div class="bg-white p-4 rounded shadow-lg mb-3">{{$task->body}}</div>
                    @endforeach
                    <div class="bg-white p-4 rounded shadow-lg mb-3">
                        <form action="{{$project->path().'/tasks'}}" method="POST">
                            @csrf
                            <input class="w-full" placeholder="Add New Task" name="body" type="text"/>
                        </form>
                    </div>

                </div>

                <div>
                    <h1 class="mr-auto text-lg text-gray-600 mb-3">General Notes</h1>
                    <textarea class="bg-white p-4 rounded shadow-lg w-full">Lorem ipsum.</textarea>
                </div>

            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
            </div>
        </div>
    </main>

@endsection
