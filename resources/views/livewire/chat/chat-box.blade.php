<!-- resources/views/livewire/chat/chat-box.blade.php -->


<div class="flex">
    <!-- List Users -->
    <div class="w-1/3 border-r">
        @foreach($users as $user)
            <div wire:click="selectUser({{ $user->id }})" class="p-2 cursor-pointer hover:bg-gray-200">
                {{ $user->name }}
            </div>
        @endforeach
    </div>

    <!-- Chat Area -->
    <div class="w-2/3 p-4">
        @if($selectedUser)
            <div class="h-64 overflow-y-auto border p-2 mb-2" wire:poll.1s="loadMessages">
                @foreach($messages as $message)
                <div class="mb-1">
                    <strong>{{ $message['from_user_id'] == Auth::id() ? 'Saya' : $selectedUser->name }}</strong>: {{ $message['content'] }}
                </div>
            @endforeach

            </div>

            <form wire:submit.prevent="sendMessage">
                <input type="text" wire:model.defer="newMessage" class="w-full border p-2" placeholder="Tulis pesan..." />
                <button type="submit" class="mt-2 bg-blue-500 text-white px-4 py-1 rounded">Kirim</button>
            </form>
        @else
            <p>Pilih pengguna untuk mulai chatting.</p>
        @endif
    </div>
</div>
