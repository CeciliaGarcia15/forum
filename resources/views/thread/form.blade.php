<div>
    <select 
        name="category_id"
        class="w-full p-3 mb-4 text-xs capitalize rounded-md border-1 border-slate-900 bg-slate-800 text-white/60"
    >
        <option value="">Seleccionar Categoria</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}"
            @if(old('category_id' , $thread->category_id) == $category->id) 
                selected
            @endif
        >{{$category->name}}
        </option>
        @endforeach
    </select>
    @error('category_id')
        <span class="font-semibold text-red-600 error">{{$message}}</span>
    @enderror
    <input 
    type="text" 
    name="title" 
    placeholder="Titulo" 
    class="w-full p-3 mb-4 text-xs capitalize rounded-md border-1 border-slate-900 bg-slate-800 text-white/60"
    value="{{old('title',$thread->title)}}"
    >
    @error('title')
        <span class="font-semibold text-red-600 error">{{$message}}</span>
    @enderror
    <textarea 
    name="body"  
    rows="10" 
    placeholder="Descripcion del problema"
    class="w-full p-3 mb-4 text-xs capitalize rounded-md border-1 border-slate-900 bg-slate-800 text-white/60"
    >{{ old('body', $thread->body)}}
    </textarea>
    @error('body')
        <span class="font-semibold text-red-600 error">{{$message}}</span>
    @enderror

</div>

