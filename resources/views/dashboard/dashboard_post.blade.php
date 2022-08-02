<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex justify-center mt-10 mb-8">
        Voici la liste de vos articles
    </h2>

    <div class="space-x-96">
        <div class="relative">
            <div class="absolute left-5">
                <a href="{{route('dashboard')}}"
                   class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 mt-16 font-semibold ">
                    Retourner à l'Accueil
                </a>
            </div>
            <div class="absolute right-5">
                <a href="{{route('dashboard.create')}}"
                   class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 font-semibold ">
                    + Créer un article
                </a>
            </div>
        </div>

    </div>

    <div class="table w-full p-2 mt-20">
        <table class="w-full border">
            <thead>
            <tr class="bg-gray-50 border-b">
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        ID
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Titre

                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Contenu
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Auteur
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Publié
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Action
                    </div>
                </th>
            </tr>
            </thead>
            @foreach($posts as $post)
                <tbody>
                <tr class="bg-gray-50 text-center">
                    <td class="p-2 border-r">
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{$post->id}}</td>
                    <td class="p-2 border-r">{{Str::limit($post->title, 50)}}</td>
                    <td class="p-2 border-r">{{Str::limit($post->content, 100 )}}</td>
                    <td class="p-2 border-r">{{$post->user->name}}</td>
                    <td class="p-2 border-r">{{$post->created_at->diffForHumans()}}</td>
                    <td class="p-2 border-r">
                        <div class="flex flex-nowrap space-x-1 ">
                            <a href="{{ route('dashboard.post.edit', $post) }}"
                               class="bg-blue-500 p-2 pl-3 pr-3 text-white hover:shadow-lg text-xs font-semibold  ">
                                Modifier
                            </a>

                            <form method="post" action="{{ route('dashboard.posts.destroy', $post) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="bg-red-500 p-2 pl-3 pr-3 text-white hover:shadow-lg text-xs font-semibold">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                        <div class="mb-3"></div>
                        <a href="{{ route('dashboard.post.comments', $post) }}"
                           class="bg-gray-600 pt-2 pb-2 pl-3 pr-3 text-white hover:shadow-lg text-xs font-semibold  ">
                            Voir les commentaires
                        </a>


                    </td>

                </tr>

                </tbody>
            @endforeach

        </table>
    </div>
</x-app-layout>
