<div class="max-w-4xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
    <div class="mb-4 rounded-md bg-gradient-to-r from-slate-800 to-slate-900 ">
        <div class="flex gap-4 p-4">
            <div>
                <img src="{{$thread->user->avatar()}}" alt="{{$thread->user->name}}" class="rounded-full">
            </div>
            <div class="w-full">
                <h2 class="flex items-start justify-between mb-4">
                    <a href="{{route('thread',$thread)}}" class="text-xl font-semibold text-white/90">
                    {{$thread->title}}
                    </a>
                    <span class="px-4 py-2 text-xs capitalize rounded-full"
                            style="color:{{$thread->category->color}}; border:1px solid {{$thread->category->color}};">
                            {{$thread->category->name}}
                    </span>
                </h2>
                <p class="mb-4 text-xs font-semibold text-blue-600">
                        {{$thread->user->name}}
                        <span class="text-white/90">{{$thread->created_at->diffForHumans()}}</span>
                </p>
                <p class="text-white/60">
                    {{$thread->body}}
                </p>
            </div>
        </div>
    </div>
    <!-- respuestas-->
    @foreach ($replies as $reply )
        @livewire('show-reply',['reply'=>$reply],key('reply-'.$reply->id))
    @endforeach

     <!---- Formulario ------>
     <form wire:submit.prevent="postReply" class="mb-4" action="">
        <input type="text" 
                placeholder="Escribe una respuesta" 
                class="w-full p-3 text-xs border-0 rounded-md bg-slate-800 text-white/60"
                wire:model="body"
                @keydown.enter="$wire.$refresh()"
                >
    </form>
</div>
