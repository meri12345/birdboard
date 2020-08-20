@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <div class="flex justify-between items-end w-full">
                <h1 class="mr-auto text-gray-600"><a href="/projects">My projects</a> / {{$project->title}}</h1>

            <div class="flex items-center">
                <div class="flex">
                    @foreach($project->members as $member)
                        <img class="rounded-full mr-2" src="https://gravatar.com/avatar/{{md5($member->email)}}?s=40" title="{{$member->email}}" alt="{{$member->name}}">
                    @endforeach
                </div>
                <img class="rounded-full" src="https://gravatar.com/avatar/{{md5($project->owner->email)}}?s=40" title="{{$project->owner->email}}" alt="{{$member->name}}">

                <div>
    <a class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none ml-4" href="{{$project->path().'/edit'}}">Edit Project</a>

</div>

            </div>
        </div>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3">
                <div class="mb-6">
                    <h1 class="mr-auto text-lg text-gray-600 mb-3">Tasks</h1>
                    @foreach ($project->tasks as $task)
                        <form action="{{$task->path()}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="bg-white p-4 rounded shadow-lg mb-3">
                                <div class="flex">
                                    <input type="text" value="{{$task->body}}" name="body" class="w-full {{$task->completed ? 'text-gray-500' : ''}}">
                                    <input type="checkbox" name="completed" onchange="this.form.submit()" {{$task->completed ? 'checked' : ''}}>
                                </div>
                            </div>
                        </form>
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

                    <form action="{{$project->path()}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <textarea
                            name="notes"
                            class="bg-white p-4 rounded shadow-lg w-full"
                            placeholder="Anything spacial that you want to make note?"
                        >{{$project->notes}}</textarea>
                        @error('notes')
                            <p class="text-red-500 text-sm">{{$message}}</p>
                        @enderror
                        <button class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none ml-4">Add Notes</button>
                    </form>
                </div>

            </div>
            <div class="lg:w-1/4 px-3">
                @include('projects.card')
                @include('projects.activity')

                @if($project->owner->is(auth()->user()))
                @include('projects.invite')
                @endif

            </div>
        </div>
    </main>

@endsection
