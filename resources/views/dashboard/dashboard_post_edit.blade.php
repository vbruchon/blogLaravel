<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="mb-8"></div>
    <a href="{{route('dashboard.post')}}"
       class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-16 font-semibold ">
        Retourner à l'Accueil
    </a>

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

        <input type="hidden" name="user_id" value="{{Auth::id()}}">

        <div class="mb-8"></div>
        <div class="flex justify-center">
            <label for="comment" class="text-center">Titre de l'article :
                <div class="flex justify-center mt-3">
                    <input type="text" name="title" size="80%" value="{{ old('title', $post->title) }}">
                </div>
            </label>
        </div>
        <div class="mb-8"></div>

        <div class="mb-8"></div>
        <div class="flex justify-center">
            <label for="comment" class="text-center">Contenu de l'article :
                <div class="flex justify-center mt-3">
                    <textarea type="text" name="content" rows="10"
                              cols="80">{{ old('content', $post->content) }}</textarea>
                </div>
            </label>
        </div>

        <div class="flex justify-center">
            <button class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-8 mb-8 font-semibold" type="submit">
                Modifier
            </button>
        </div>

    </form>
</x-app-layout>
