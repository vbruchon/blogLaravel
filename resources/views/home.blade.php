<x-guest-layout>
    <div class="flex justify-center mt-14 mb-14 text-4xl font-extrabold">
        <h1>Nos derniers articles ...</h1>
    </div>

    @foreach($posts as $post)
        <div class="flex justify-center">
            <div class="mt-5 mr-4 ml-4 ">
                <div class="text-xl ">
                    <a :href="url" class="hover:underline">{{ $post->title }}</a>
                </div>
            </div>
        </div>

        <div class="flex justify-center">

            <div class="mt-5 ml-4 mr-20 mb-14">
                <div class="font-bold text-slate-700 leading-snug">
                    <div
                        class="text-xs text-slate-600 uppercase font-bold tracking-wider">{{Str::limit($post->content), 500 }}</div>
                </div>
            </div>
        </div>

    @endforeach

</x-guest-layout>
