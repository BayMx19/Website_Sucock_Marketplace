<?php

namespace App\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ChatBox extends Component
{
    public $userId;
    public $users = [];
    public $selectedUser;
    public $messages = [];
    public $newMessage = '';
    public function mount($userId = null)
    {
        $this->userId = $userId;
        $authId = Auth::id();

        $from = Message::where('to_user_id', $authId)->pluck('from_user_id')->toArray();
        $to = Message::where('from_user_id', $authId)->pluck('to_user_id')->toArray();
        $allUserIds = array_unique(array_merge($from, $to));

        $this->users = User::whereIn('id', $allUserIds)->get();

        if ($this->userId) {
            $user = User::find($this->userId);
            if ($user) {
                $this->selectedUser = $user;

                if (!$this->users->contains('id', $user->id)) {
                    $this->users->push($user);
                }

                $this->loadMessages();
            }
        }

    }


    public function selectUser($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->loadMessages();
    }

public function loadMessages()
{
    if ($this->selectedUser) {
        $authId = Auth::id();
        $this->messages = Message::where(function ($query) use ($authId) {
                $query->where('from_user_id', $authId)
                      ->orWhere('to_user_id', $authId);
            })
            ->where(function ($query) {
                $query->where('from_user_id', $this->selectedUser->id)
                      ->orWhere('to_user_id', $this->selectedUser->id);
            })
            ->orderBy('created_at')
            ->get()
            ->toArray();
    }
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
