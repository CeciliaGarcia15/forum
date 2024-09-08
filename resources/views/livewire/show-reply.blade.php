<div>
    <div class="mb-4 rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800">
        <div class="flex gap-4 p-4">
            <div>
                <img src="{{ $reply->user->avatar() }}" alt="{{ $reply->user->name }}" class="rounded-full">
            </div>
            <div class="w-full">
                <p class="mb-2 text-xs font-semibold text-blue-600">
                    {{ $reply->user->name }}
                </p>
                @if($is_editing)
                    <form wire:submit.prevent="updateReply" class="mt-4">
                        <input type="text" placeholder="Escribe una respuesta"
                            class="w-full p-3 text-xs rounded-md border-1 border-slate-900 bg-slate-800 text-white/60" wire:model="body"
                            @keydown.enter="$wire.$refresh()">
                    </form>
                @else
                    <p class="text-xs text-white/60">{{ $reply->body }}</p>
                @endif
                
                @if($is_creating)
                    <form wire:submit.prevent="postChild" class="mt-4">
                        <input type="text" placeholder="Escribe una respuesta"
                            class="w-full p-3 text-xs rounded-md border-1 border-slate-900 bg-slate-800 text-white/60" wire:model="body"
                            @keydown.enter="$wire.$refresh()">
                    </form>
                @endif
                <p class="flex justify-end gap-2 mt-4 text-xs text-white/60">
                    @if(is_null($reply->reply_id))
                        <a href="#" wire:click.prevent="$toggle('is_creating')" class="hover:text-white">Responder</a>
                    @endif
                    @can('update', $reply)<!--solo se muestra si tengo autorizacion del policies para actualizar, osea solo cuando es mia la publicacion -->
                        <a href="#" wire:click.prevent="$toggle('is_editing')" class="hover:text-white">Editar</a>
                    @endcan
                </p>
            </div>
        </div>
    </div>
    @foreach ($reply->replies as $item)
        <div class="ml-8">
            @livewire('show-reply', ['reply' => $item], key('reply-' . $item->id))
        </div>
    @endforeach
</div>
