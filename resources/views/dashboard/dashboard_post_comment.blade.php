<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="mb-8"></div>
    <a href="{{route('dashboard')}}"
       class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-16 font-semibold ">
        Retourner à l'Accueil
    </a>

    <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex justify-center mt-10 mb-8">
        Voici la liste de vos commentaires
    </h2>

    <div class="table w-full p-2 mt-8">
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
                        Auteur
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Email
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Pseudo
                    </div>
                </th>
                <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                    <div class="flex items-center justify-center">
                        Contenu
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

            @foreach($post->comments as $comment)

                <tbody>
                <tr class="bg-gray-50 text-center">
                    <td class="p-2 border-r">
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{$comment->id}}</td>

                    @if($comment->user !== null)
                        <td class="p-2 border-r">{{$comment->user->name}}</td>
                    @else
                        <td class="p-2 border-r"> ... </td>
                    @endif


                    @if($comment->email !== null)
                        <td class="p-2 border-r">{{$comment->email}}</td>
                        <td class="p-2 border-r">{{$comment->pseudo}}</td>
                    @else
                        <td class="p-2 border-r"> ... </td>
                        <td class="p-2 border-r"> ... </td>
                    @endif

                    <td class="p-2 border-r">{{Str::limit($comment->content, 100 )}}</td>
                    <td class="p-2 border-r">{{$comment->created_at->diffForHumans()}}</td>
                    <td class="p-2 border-r">
                        <div class="flex flex-nowrap space-x-1 ">
                            <a href="{{ route('dashboard.comment.update', [$post, $comment]) }}"
                               class="bg-blue-500 p-2 pl-3 pr-3 text-white hover:shadow-lg text-xs font-semibold  ">
                                Modifier
                            </a>

                            <form method="post" action="{{ route('dashboard.comment.destroy', [$post, $comment]) }}">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                        class="bg-red-500 p-2 pl-3 pr-3 text-white hover:shadow-lg text-xs font-semibold">
                                    Supprimer
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach

        </table>
    </div>
    <div class="mb-8"></div>
    <a href="{{route('dashboard.post')}}"
       class="bg-amber-500 rounded-full pt-2 pb-2 pr-3 pl-3 ml-16 mt-16 font-semibold ">
        Retourner à l'Accueil
    </a>
</x-app-layout>
