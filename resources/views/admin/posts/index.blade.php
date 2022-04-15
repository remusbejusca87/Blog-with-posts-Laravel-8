<x-layout>

    <x-setting heading="Manage Post">
        <div class="flex flex-col">
            <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                    <table class="min-w-full">

                        <tbody class="bg-white">

                            @foreach ($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <div class="flex items-center">
                                            <div class="text-sm font-medium leading-5 text-gray-900">
                                                <a href="/posts/{{$post->slug}}"> {{ $post->title }} </a>
                                            </div>
                                        </div>
                                    </td>

                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600"> Edit </a>
                                    </td>

                                    <td
                                        class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                            {{-- <a href="/admin/posts/{{ $post->id }}/edit" class="text-red-500 hover:text-red-600"> Delete </a> --}}
                                            <form method="POST" action="/admin/posts/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')

                                                <button class="text-sm text-red-400 hover:text-red-600"> Delete </button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </x-setting>


</x-layout>
