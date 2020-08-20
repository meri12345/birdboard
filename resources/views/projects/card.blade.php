
    <div class="bg-white p-5 rounded shadow-lg"  style="height: 200px">
        <a href="{{$project->path()}}">
            <h3 class="font-normal text-xl mb-3 -ml-5 border-l-4 pl-4 border-blue-300 py-4">{{$project->title}}</h3>
        </a>
        <div class="text-gray-600 mb-4">
            {{\Illuminate\Support\Str::limit($project->desc,100)}}
        </div>

        <footer>
            <form class="text-right" action="{{$project->path()}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-sm">Delete</button>
            </form>
        </footer>

    </div>

