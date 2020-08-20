<div class="bg-white p-5 rounded shadow-lg mt-4"  style="height: 200px">
    <h3 class="font-normal text-xl mb-3 -ml-5 border-l-4 pl-4 border-blue-300 py-4">Invite User</h3>

    <form action="{{$project->path().'/invitations'}}" method="POST">
        @csrf
        <input style="display: block" class="border border-gray-500 rounded" name="email" type="email">
        @error('email')
        <p class="text-xs text-red-500">{{$message}}</p>
        @enderror
        <button class="text-white bg-blue-300 rounded-lg p-3 shadow text-decoration-none mt-3">Invite</button>
    </form>

</div>
