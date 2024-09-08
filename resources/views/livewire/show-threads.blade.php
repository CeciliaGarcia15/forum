<div class="flex gap-10 px-4 py-12 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="w-64">
        <a 
        href="{{route('threads.create')}}" 
        class="block w-full py-4 mb-10 text-xs font-bold text-center rounded-md bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90 "
        >Preguntar</a>
        <ul>
            @foreach ($categories as $category )
            <li class="mb-2">
                <a href="#" wire:click.prevent="filterByCategory('{{$category->id}}')" class="flex items-center gap-2 p-2 text-xs font-semibold capitalize rounded-md bg-slate-800 text-white/60 hover:text-white">
                    <span class="w-2 h-2 rounded-full" style="background-color: {{$category->color}};"></span>
                    {{$category->name}}
                </a>
            </li>
            @endforeach
           
            <li>
                <a href="#" wire:click.prevent="filterByCategory('')" class="flex items-center gap-2 p-2 text-xs font-semibold rounded-md bg-slate-800 text-white/60 hover:text-white">
                    <span class="w-2 h-2 rounded-full" style="background-color: #000;"></span>
                    Todos los resultados
                </a>
            </li>
        </ul>
    </div>
    <div class="w-full">
        <!---- Formulario ------>
        <form class="mb-4" action="">
            <input type="text" 
                    placeholder="// ..." 
                    class="w-1/3 p-3 text-xs border-0 rounded-md bg-slate-800 text-white/60"
                    wire:model.live='search'
                    >
        </form>

        @foreach ($threads as $thread )
            <div class="mb-4 rounded-md bg-gradient-to-r from-slate-800 to-slate-900 hover:to-slate-800">
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
                        <p class="flex items-center justify-between w-full text-xs">
                            <span class="font-semibold text-blue-600">
                                {{$thread->user->name}}
                                <span class="text-white/90">{{$thread->created_at->diffForHumans()}}</span>
                            </span>
                            <span class="flex items-center gap-1 text-slate-700">
                                <svg class="h-4" data-slot="icon" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.337 21.718a6.707 6.707 0 0 1-.533-.074.75.75 0 0 1-.44-1.223 3.73 3.73 0 0 0 .814-1.686c.023-.115-.022-.317-.254-.543C3.274 16.587 2.25 14.41 2.25 12c0-5.03 4.428-9 9.75-9s9.75 3.97 9.75 9c0 5.03-4.428 9-9.75 9-.833 0-1.643-.097-2.417-.279a6.721 6.721 0 0 1-4.246.997Z"></path>
                                  </svg>
                                {{$thread->replies_count}}
                                Respuesta{{$thread->replies_count !== 1 ? 's' : ''}}
                                
                                @can('update',$thread)
                                |
                                <a href="{{route('threads.edit',$thread)}}" class="hover:text-white">Editar</a>

                                @endcan
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
