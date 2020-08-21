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

    <new-project-modal></new-project-modal>

    @endsection
