<x-guest-layout>
    <div class="bg-amber-500 ml-3 mt-5 w-14">
        <a href="{{ route('home') }}">
            <button>Acceuil</button>
        </a>
    </div>
    <div class="mb-14">
        <div class="mt-14 text-2xl flex justify-center ">
            <h2>{{ $post->title }}</h2>
        </div>
    </div>

    <div class="mb-14 ml-10 mr-14">
        <p>{{$post->content}}</p>
    </div>

    <div class="mt-5 text-sm text-slate-600 ml-4 mb-12 flex justify-center space-x-64">
        <p>Ecrit par {{ $post->user->name }}</p>
        <p>Publier {{ $post->created_at->diffForHumans() }}</p>
    </div>

    <div class="text-xl flex justify-center mt-14 underline">
        <h2>Commentaires</h2>
    </div>
    <div class="flex flex-col  mt-14 mb-8 ">
        @foreach($post->comments as $comment)
            <div class="flex justify-center mb-4">
                @if($comment->pseudo !== null)
                    <p>{{ $comment->pseudo}}</p>
                @else
                    <p>{{ $comment->user->name}}</p>
                @endif
            </div>
            <div class="flex justify-center mb-4">
                <p>{{ $comment->content }}</p>
            </div>
            <div class="flex justify-center">
                <p>{{ $comment->created_at->diffForHumans() }}</p>
            </div>
            <div class="mb-16"></div>

        @endforeach


        <h2 class="text-xl flex justify-center underline font-bold mb-10 ">Ajouter un commentaire</h2>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="text-red-600"><p>{{ $error }}</p></div>
            @endforeach
    </div>
    @endif

    <form method="post" action="{{route("comment.store")}}">
        @csrf
        <input type="hidden" name="post_id" value="{{$post->id}}">
        <div class="flex flex-col ml-10 ">
            @guest
            <div class="flex justify-center">
                <label for="email">Veuillez renseigner votre adresse Email :
                    <div class="flex justify-center mt-3">
                        <input type="email" name="email" placeholder="example@email.com">
                    </div>
                </label>
            </div>

            <div class="mb-8"></div>
            <div class="flex justify-center">
                <label for="pseudo">Veuillez renseigner votre Pseudo :
                    <div class="flex justify-center mt-3">
                        <input type="text" name="pseudo" placeholder="bidul26">
                    </div>
                </label>
            </div>
            @endguest
            <div class="mb-8"></div>
            <div class="flex justify-center">
                <label for="comment">Veuillez saisir ici votre comentaire :
                    <div class="flex justify-center mt-3">
                        <textarea type="text" name="comment" placeholder="Votre commentaire ..."></textarea>
                    </div>
                </label>
            </div>
            <div class="mb-8"></div>
        </div>
        <div class="flex justify-center">
            <input class="bg-amber-500 p-3" type="submit">
        </div>
    </form>

    <div class="bg-amber-500 ml-3 mb-5 w-14">
        <a href="{{ route('home') }}">
            <button>Acceuil</button>
        </a>
    </div>

</x-guest-layout>
