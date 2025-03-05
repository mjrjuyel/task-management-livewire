<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Events\chatMessageEvent;
use Illuminate\Support\Facades\Auth;

class ChatComponent extends Component
{
    public $id;
    
    public $message;
    public $sender_id;
    public $receiver_id;
    public $messages = [];

    public function insert(){
       $insert =  Message::create([
          'message' => $this->message,
           'sender_id' => Auth::user()->id,
            'receiver_id' => $this->id,
            'created_at' =>Carbon::now('UTC'),
        ]);
        $this->chatMessage($insert);
        broadcast(new chatMessageEvent($insert))->toOthers();
        $this->message = '';
    }

    #[On('echo-private:chat-channel.{sender_id},chatMessageEvent')]
    public function listenMessage($event){
        $chatMessage = Message::whereId($event['message']['id'])->with(['sender:id,name','receiver:id,name'])->first();
        $this->chatMessage($chatMessage);
    }

    public function render()
    {
        $user = User::findOrfail($this->id);
        return view('livewire.chat-component',compact('user'));
    }

    public function mount($users){
        $this->sender_id = auth()->user()->id;
        $this->id = $users;
        $messages = Message::where(function($query){
            $query->where('sender_id',auth()->user()->id)->where('receiver_id',$this->id);
        })->orWhere(function($query){
                $query->where('sender_id',$this->id)->where('receiver_id',auth()->user()->id);
            })->with(['sender:id,name','receiver:id,name'])->get();
        foreach($messages as $chathistory){
           $this->chatMessage($chathistory);
        }
    }
    
    public function chatMessage($chathistory){
        $this->messages[]=[
            'id' => $chathistory->id,
            'message' => $chathistory->message,
            'sender' => $chathistory->sender->name,
            'receiver' => $chathistory->receiver->name,
            'date' => $chathistory->created_at->format('d-M-Y'),
            'time' => $chathistory->created_at->format('h:i A'),
        ];

        
    } 
}
