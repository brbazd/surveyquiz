<x-app-layout>

    <div class="container mx-auto">
        <form action="{{route('assignments.store')}}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="title">Title</label>
                <input type="text" name="title" id="title">
            </div>

            <button type="submit">Add Assignment</button>
        </form>
    </div>

</x-app-layout>
