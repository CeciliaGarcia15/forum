<?php

namespace App\Livewire;

use App\Models\Reply;
use Livewire\Component;

class ShowReply extends Component
{
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;
    
    
    protected $listener = ['refresh'=>'$refresh'];


    public function postChild(){
        if(! is_null($this->reply->reply_id)) return;// si tiene reply_id entonces que no te deje guardar la respuesta para que no haya anidacion de respuestas
        //validate
        $this->validate(['body'=>'required']);
        //create
        auth()->user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body,
        ]);
        //refresh
        $this->is_creating = false;
        $this->body='';
        $this->dispatch('refresh')->self();//refresca el componente
       
    }
    public function updatedIsCreating(){
        $this->is_editing = false;
        $this->body = '';
    }
    public function updatedIsEditing(){
        $this->authorize('update',$this->reply);//esto viene de las politicas(policies)
        $this->is_creating = false;
        $this->body = $this->reply->body;
    }
    public function updateReply(){
        $this->authorize('update',$this->reply);//esto viene de las politicas(policies)
        //validate
        $this->validate(['body'=>'required']);
        //update
        $this->reply->update([
            'body' => $this->body,
        ]);
        //refresh
        $this->is_editing = false;
        $this->body='';
        $this->dispatch('refresh')->self();//refresca el componente
       
    }

    public function render()
    {
        return view('livewire.show-reply');
    }
}
