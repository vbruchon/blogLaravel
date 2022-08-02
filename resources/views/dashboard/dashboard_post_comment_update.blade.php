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


    <form method="post" action="">
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

        <input type="hidden" name="id" value="{{$comment->id}}">
        <input type="hidden" name="post_id" value="{{$comment->post_id}}">
        <div class="mb-8"></div>
        <div class="flex justify-center">
            <label for="content" class="text-center">Contenu du commentaire :
                <div class="flex justify-center mt-3">
                    <textarea type="text" name="content" rows="10" cols="80">
                        {{ old('content', $comment->content) }}
                    </textarea>
                </div>
            </label>
        </div>

        <div class="mb-8"></div>
        <div class="flex justify-center">
            @if($comment->email !== null)
                <label for="email" class="text-center">Email de l'auteur :
                    <div class="flex justify-center mt-3">

                        <input type="email" name="email" size="80%" value="{{ old('email', $comment->email) }}">
                    </div>
                </label>
            @endif
        </div>

        <div class="flex justify-center">
            <button class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-8 mb-8 font-semibold" type="submit">
                Modifier
            </button>
        </div>
    </form>
</x-app-layout>
