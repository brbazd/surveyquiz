<x-app-layout>

    <div class="container mx-auto">
        <form action="{{route('answers.store', $question->id)}}" method="post">
            @csrf
            @method('POST')
            <div>
                <label for="body">Body</label>
                <input type="text" name="body" id="body">
            </div>
            <div>
                <label for="value">Value</label>
                <input type="text" name="value" id="value">
            </div>

            <button type="submit">Add Answer</button>
        </form>
    </div>

</x-app-layout>
