<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="bg-amber-500 ml-3 mt-5 w-14">
        <a href="{{ route('dashboard.post') }}">
            <button>Accueil</button>
        </a>
    </div>

    <form method="post" action="{{route("dashboard.post.update", $post)}}">
        @csrf
        @method('put')

        @if ($errors->any())
            <div class="bg-red-400 p-6 text-center m-6 rounded shadow border border-red-800 animate-ping">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input type="hidden" name="post_id" value="{{$post->id}}">

        <div class="mb-8"></div>
        <div class="flex justify-center">
            <label for="comment">Titre de l'article :
                <div class="flex justify-center mt-3">
                    <input type="text" name="title" size="130%" value="{{ old('title', $post->title) }}">
                </div>
            </label>
        </div>
        <div class="mb-8"></div>

        <div class="mb-8"></div>
        <div class="flex justify-center">
            <label for="comment">Contenu de l'article :
                <div class="flex justify-center mt-3">
                    <textarea type="text" name="content" rows="8" cols="130" >{{ old('content', $post->content) }}</textarea>
                </div>
            </label>
        </div>
        <div class="mb-8"></div>


        <div class="flex justify-center">
            <button class="bg-amber-500 p-3" type="submit">Modifier </button>
        </div>
    </form>
</x-app-layout>
