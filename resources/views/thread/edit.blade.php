<x-app-layout>
    <div class="max-w-4xl px-4 py-12 mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 rounded-md bg-gradient-to-r from-slate-800 to-slate-900 ">
            <div class="p-4">
               
                    <h2 class="mb-4 text-xl font-semibold text-white/90">
                       Editar pregunta
                    </h2>
                    <form action="{{route('threads.update', $thread)}}" method="POST">
                        @csrf
                        @method('PUT')
                        @include('thread.form')
                        <input 
                        type="submit" 
                        value="Editar pregunta" 
                        class="w-full py-4 text-xs font-bold rounded-md bg-gradient-to-r from-blue-600 to-blue-700 hover:to-blue-600 text-white/90">
                    </form>
            </div>
        </div>
    </div>    
</x-app-layout>
