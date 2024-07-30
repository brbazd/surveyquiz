<x-guest-layout>
    <div class="my-4">
        <h1 class="text-4xl font-bold py-2">Welcome to my survey</h1>
        <p>This is my survey regarding people's thoughts and relationship with AI and its uses in both teaching and assisting in programming. You have a couple of questions to answer and 5 programming tasks to complete. A couple of minutes of your time will help me tremendously.</p>
    </div>

    <form action="{{ route('survey.submitfirst') }}" method="POST">
        @csrf
        @method('post')

        @foreach ($questions as $question)
            <div class="py-2">
                <h2 class="text-2xl font-semibold break-normal">{{ $loop->index + 1 }}. {{ $question->title }}</h2>
                <div>
                    <input type="hidden" name="val[{{ $question->id }}]" value="" />
                    @foreach ($question->answers as $answer)
                        <div class="p-1">
                            <input type="radio" name="val[{{ $question->id }}]" id="{{ $answer->value }}"
                                value="{{ $answer->value }}"
                                class="focus:ring-gray-950 focus:text-gray-950 text-gray-950">
                            <label for="{{ $answer->value }}">{{ $answer->body }}</label>
                        </div>



                        @error('val.{{ $question->id }}')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror

                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="bg-gray-950 text-white p-2 rounded-md uppercase font-semibold text-lg mt-4">Submit
            Answers</button>

    </form>
</x-guest-layout>

<script>

</script>
