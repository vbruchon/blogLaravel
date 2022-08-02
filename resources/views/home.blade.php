<x-guest-layout>

<a class="bg-amber-500 rounded-full pt-2 pb-2 pl-3 pr-3 ml-16 font-semibold" href="{{route('dashboard')}}">
    Se connecter
</a>
    <div class="flex justify-center mt-14 mb-14 text-4xl font-extrabold">
        <h1>Nos derniers articles ...</h1>
    </div>

    @foreach($posts as $post)
            <div class="bg-gray-200 rounded-lg shadow-gray-500 shadow-md ml-40 mr-40 mb-36 pt-12 pb-12 ">
                <div class="mt-5 mr-4 ml-4 mb-8 ">
                    <div class="text-xl flex justify-center ">
                        <a href="{{route('post.show', $post)}}" class="hover:underline">{{ $post->title }}</a>
                    </div>
                </div>

                <div class="mt-5 ml-4 mr-20">
                    <div class="font-bold text-slate-700 leading-snug flex justify-center ">
                        <div
                            class="text-xs text-slate-600 uppercase font-bold tracking-wider">{{Str::limit($post->content), 500 }}</div>
                    </div>
                </div>

                <div class="ml-2 mb-14 flex justify-center">
                    <div class="mt-5 text-sm text-slate-600 ml-4 flex flex-nowrap space-x-96">
                        <p>{{ $post->comments_count }} commentaires</p>
                        <p>Publier {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>

    @endforeach


    {{ $posts->links() }}
</x-guest-layout>
