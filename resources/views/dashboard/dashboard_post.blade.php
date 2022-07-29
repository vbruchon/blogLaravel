<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <h2 class="font-semibold text-2xl text-gray-800 leading-tight flex justify-center mt-10">
        Voici la liste de vos articles
    </h2>
    <div class="table w-full p-2">
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
                        Publié le
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
                    <td class="p-2 border-r">{{$post->created_at}}</td>
                    <td>
                        <a href="{{ route('dashboard.post.edit', $post) }}"
                           class="bg-blue-500 p-2 text-white hover:shadow-lg text-xs font-thin ">Edit</a>
                        <a href="{{ route('dashboard.post.delete', $post) }}"
                           class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>
                    </td>
                </tr>

                </tbody>
            @endforeach

        </table>
    </div>
</x-app-layout>
