<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <h1 class="text-4xl flex justify-center mt-56 text-red-600 underline">
        L'article {{ $post->id }} est supprimer
    </h1>
</x-app-layout>
