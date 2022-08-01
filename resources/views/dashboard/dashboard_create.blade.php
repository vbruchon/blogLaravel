<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
            {{ __('Articles') }}
        </h2>
    </x-slot>
    <div class="mb-8"></div>
    <a href="{{route('dashboard.post')}}"
       class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-16 font-semibold ">
        Retourner à l'Accueil
    </a>
    <h1 class="font-semibold text-2xl text-gray-800 leading-tight mt-10 mb-10 text-center underline">
        Créer un article
    </h1>

    <form method="post" action="{{ route('dashboard.add') }}">
        @csrf

        @if ($errors->any())
            <div class="bg-red-400 p-6 text-center m-6 rounded shadow border border-red-800 animate-ping">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <input type="hidden" name="user" value="{{Auth::id()}}">
        <div class="flex flex-col ml-10 ">
            <div class="flex justify-center">
                <label for="email" class=" text-center">Titre de l'article :
                    <div class="flex justify-center mt-3">
                        <input type="text" name="title" size="80%"
                               placeholder="Veuillez saisir le titre de votre article">
                    </div>
                </label>
            </div>

            <div class="mb-8"></div>
            <div class="flex justify-center">
                <label for="pseudo" class=" text-center">Contenu de l'article :
                    <div class="flex justify-center mt-3 mb-8">
                            <textarea type="text" name="content" cols="80" rows="20"
                                      placeholder="Veuillez saisir le contenu de votre article"></textarea>
                    </div>
                </label>
            </div>
        </div>
        <div class="flex justify-center ">
            <input class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mb-8 font-semibold" type="submit"
                   value="Créer l'article">
        </div>

    </form>
</x-app-layout>
