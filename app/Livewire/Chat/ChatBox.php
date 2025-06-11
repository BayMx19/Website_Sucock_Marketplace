<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class ChatBox extends Component
{
    public $users = [];
    public $selectedUser = null;
    public $messages = [];
    public $newMessage = '';

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->get();
    }

    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->loadMessages();
    }

    public function loadMessages()
{
    $this->messages = Message::where(function ($q) {
        $q->where('from_user_id', Auth::id())
          ->where('to_user_id', $this->selectedUser->id);
    })->orWhere(function ($q) {
        $q->where('from_user_id', $this->selectedUser->id)
          ->where('to_user_id', Auth::id());
    })->orderBy('created_at')->get()->toArray();
}


    public function sendMessage()
    {
        $this->validate([
            'newMessage' => 'required|string',
        ]);

        Message::create([
            'from_user_id' => Auth::id(),
            'to_user_id' => $this->selectedUser->id,
            'content' => $this->newMessage,
        ]);

        $this->newMessage = '';
        $this->loadMessages();
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
