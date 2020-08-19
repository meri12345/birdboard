<div class="bg-white p-4 rounded shadow-lg mt-6">
    <ul >
        @foreach($project->activities as $activity)
            <li class="text-sm mb-2">
                @include('projects.activities.'.$activity->desc)
                <span  class="text-gray-500">{{$activity->created_at->diffForHumans()}}</span>
                @endforeach
            </li>
    </ul>
</div>
