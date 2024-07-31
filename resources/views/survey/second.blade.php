<x-guest-layout>
    <div class="my-4">
        <h1 class="text-4xl font-bold">Programming Quiz</h1>
        <p>This is the second part of the survey. Below you have a couple of programming tasks that you need to solve. Take your time, if you're not sure of the answer just write "N/A".</p>
    </div>

    <form action="{{route('survey.submitsecond')}}" method="POST">
        @csrf
        @method('post')

        @foreach ($assignments as $assignment)
            <div class="py-2">
                <h2 class="text-2xl font-semibold">{{$loop->index+1}}. {{$assignment->title}}</h2>
                <div>
                    <div class="p-1">
                        <label for="{{$assignment->id}}">Write your answer here</label>
                        <textarea name="val[{{$assignment->id}}]" id="{{$assignment->id}}" rows="10" class="textarea bg-gray-950 border-gray-600 w-full text-gray-300"></textarea>
                    </div>
                </div>
            </div>
        @endforeach


        <h2 class="text-2xl font-semibold">Have you used AI in any capacity during this quiz?</h2>

        <div>
            <input type="radio" name="ai_check" id="true"
                                value="true"
                                class="focus:ring-gray-950 focus:text-gray-950 text-gray-950">
            <label for="true">Yes</label>
        </div>

        <div>
            <input type="radio" name="ai_check" id="false"
                                value="false"
                                class="focus:ring-gray-950 focus:text-gray-950 text-gray-950">
            <label for="false">No</label>
        </div>

        <button type="submit" class="bg-gray-950 text-white p-2 rounded-md uppercase font-semibold text-lg mt-4">Submit Answers</button>

    </form>
</x-guest-layout>

<script>
    var textareas = document.querySelectorAll('.textarea')

    console.log(textareas)

    textareas.forEach(function(textarea) {
        textarea.addEventListener('keydown', function(e) {
            if (e.key == 'Tab') {
                e.preventDefault();
                var start = this.selectionStart;
                var end = this.selectionEnd;

                this.value = this.value.substring(0, start) +
                "\t" + this.value.substring(end);


                this.selectionStart =
                this.selectionEnd = start + 1;
            }
        });
    })
</script>
