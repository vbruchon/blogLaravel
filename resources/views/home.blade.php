<x-guest-layout>
    <div class="flex justify-center mt-14 mb-14 text-4xl font-extrabold">
        <h1>Nos derniers articles ...</h1>
    </div>
    <?php $count = 1; ?>

    @foreach($posts as $post)
        <div class="ml-2">
            <p>Article n° {{$count }}</p>
        </div>
        <div class="mt-5 mr-4 ml-4 mb-8 ">
            <div class="text-xl ">
                <a :href="url" class="hover:underline">{{ $post->title }}</a>
            </div>
        </div>
        </div>

        <div class="mt-5 ml-4 mr-20">
            <div class="font-bold text-slate-700 leading-snug ">
                <div
                    class="text-xs text-slate-600 uppercase font-bold tracking-wider">{{Str::limit($post->content), 500 }}</div>
            </div>
        </div>
        </div>
        <div class="ml-2 mb-14">
            <div class="mt-2 text-sm text-slate-600 ml-4 mr-20">
                {{ $post->comments_count }}
                <p>commentaires</p>
            </div>
        </div>
        </div>
        <?php $count = $count + 1 ?>
    @endforeach

    {{ $posts->links() }}

</x-guest-layout>
