@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <h1 class="mr-auto text-gray-600">My projects</h1>
        <a class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" href="/projects/create">Create New Project</a>
    </header>

    <main class="lg:flex lg:flex-wrap -mx-3">
        @forelse($projects as $project)
            <div class="lg:w-1/3 px-4 pb-6">
            @include('projects.card')
            </div>
        @empty
        <div>No Projects yet</div>
        @endforelse
    </main>

    <modal name="show" class="rounded-lg" height="auto">
        <h1 class="text-xl font-normal mb-16 text-center">Let's start something new</h1>
        <div class="flex">
            <div class="flex-1 ml-8 mr-4 mb-6">
                <div class="mb-4">
                    <label class="block mb-2" for="title">Title</label>
                    <input class="border rounded block border-muted-light py-2 px-2 w-full" id="title" type="text" name="title" value="">
                </div>
                <div>
                    <label class="block mb-2" for="desc">Description</label>
                    <textarea id="desc" rows="7" class="border rounded block border-muted-light py-2 px-2 w-full" type="text" name="desc"> </textarea>
                </div>
            </div>
            <div class="flex-1 mr-8 ml-4">
                <div class="mb-4">
                    <label class="block mb-2">Add task</label>
                    <input class="border rounded block border-muted-light py-2 px-2 w-full" type="text" name="body" placeholder="Task 1">
                    <button class="mt-4 border border-gray-300 rounded-lg p-3">
                        Add New Task Field
                    </button>
                </div>
            </div>

        </div>
        <footer class="mb-6 mr-8 flex justify-end">
            <button class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" @click.prevent="$modal.hide('show')">Cancel</button>
            <button class="ml-4 text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none">Create Project</button>
        </footer>
    </modal>
    <a href="" @click.prevent="$modal.show('show')">show</a>
    @endsection
