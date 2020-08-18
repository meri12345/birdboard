@extends('layouts.app')

@section('content')
    <header class="flex items-center mb-3 py-4">
        <h1 class="mr-auto text-gray-600"><a href="/projects">My projects</a> / {{$project->title}}</h1>
        <a class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none" href="/projects/create">Create New Project</a>
    </header>

    <main>
        <div class="lg:flex -mx-3">
            <div class="lg:w-3/4 px-3">
                <div class="mb-6">
                    <h1 class="mr-auto text-lg text-gray-600 mb-3">Tasks</h1>

                    <div class="bg-white p-4 rounded shadow-lg mb-3">Lorem ipsum.</div>
                    <div class="bg-white p-4 rounded shadow-lg mb-3">Lorem ipsum.</div>
                    <div class="bg-white p-4 rounded shadow-lg mb-3">Lorem ipsum.</div>
                    <div class="bg-white p-4 rounded shadow-lg mb-3">Lorem ipsum.</div>

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
