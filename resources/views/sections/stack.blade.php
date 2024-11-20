@vite('resources/scss/sections/stack.scss')

<section class="stack max-w-6xl mx-auto">
    <div>
        <h1>Stacks</h1>
        <div>

            <div>
                @foreach ($stacks as $stack)
                    <div class="border p-4 hover:bg-gray-100 flex justify-between items-center w-[5rem] h-[5rem]">
                        <p>{{ $stack->name }}</p>
                        <img src="{{ asset('storage/' . $stack->logo) }}" alt="{{ $stack->name }}"
                            class="w-6 h-6 hover:opacity-75">
                    </div>
                @endforeach
            </div>


        </div>
    </div>
</section>
