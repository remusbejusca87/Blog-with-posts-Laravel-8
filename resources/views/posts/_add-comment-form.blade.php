@auth
    <x-card class="bg-green-50">

        <form action="/posts/{{ $post->slug }}/comments" method="POST">
            @csrf

            <header class="flex space-x-4 items-center">

                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                    alt=""
                    width="40"
                    height="40"
                    class="rounded-full">

                <h2> Please leave a comment below: </h2>

            </header>

            <x-form.field>
                <textarea
                    name="body"
                    rows="5"
                    class="w-full rounded text-sm focus:outline-none focus:ring"
                    placeholder="Write something here."
                    required ></textarea>
                <x-form.error name="body"/>
            </x-form.field>

            <div class="flex justify-end border-gray-300 border-t-2 mt-4 pt-4">
                <x-form.button> Post </x-form.button>
            </div>
        </form>

    </x-card>

@else
    <p class="font-semibold">
        Please <a href="/register" class="hover:text-blue-600 hover:underline"> Register </a>
        or <a href="/login" class="hover:text-blue-600 hover:underline">Log In</a> to leave a comment for this post.
    </p>
@endauth
