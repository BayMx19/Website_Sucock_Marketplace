<div class="flex h-[80vh] border rounded shadow overflow-hidden">
    <!-- Sidebar: List Users -->
    <div class="w-1/3 bg-gray-100 border-r overflow-y-auto">
        <div class="p-4 font-bold text-lg border-b bg-white">Pesan Masuk</div>
        @foreach($users as $user)
            <div
                wire:click="selectUser({{ $user->id }})"
                class="px-4 py-3 cursor-pointer hover:bg-blue-100 {{ $selectedUser && $selectedUser->id === $user->id ? 'bg-blue-200 font-semibold' : '' }}"
            >
                {{ $user->name }}
            </div>
        @endforeach
    </div>

    <!-- Main Chat Area -->
    <div class="w-2/3 flex flex-col">
        @if($selectedUser)
            <!-- Header -->
            <div class="px-4 py-3 border-b bg-white shadow-sm font-semibold">
                Chat dengan {{ $selectedUser->name }}
            </div>

            <!-- Chat Messages -->
            <div
                class="flex-1 overflow-y-auto p-4 space-y-2 bg-gray-50"
                id="chat-container"
                wire:poll.1s="loadMessages"
            >
                @foreach($messages as $message)
                    <div class="{{ $message['from_user_id'] == Auth::id() ? 'text-right' : 'text-left' }}">
    <div class="text-xs text-gray-500 mb-1">
        {{ $message['from_user_id'] == Auth::id() ? 'Saya' : $selectedUser->name }}
    </div>
    <div class="inline-block px-4 py-2 rounded-lg max-w-xs
        {{ $message['from_user_id'] == Auth::id() ? 'bg-blue-500 text-white' : 'bg-white border' }}">
        <span class="text-sm">
            {{ $message['content'] }}
        </span>
    </div>
</div>
                @endforeach
            </div>

            <!-- Input -->
            <form wire:submit.prevent="sendMessage" class="p-4 border-t bg-white flex space-x-2">
                <input
                    type="text"
                    wire:model.defer="newMessage"
                    class="flex-1 border rounded px-4 py-2 focus:outline-none focus:ring focus:border-blue-300"
                    placeholder="Tulis pesan..."
                />
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Kirim
                </button>
            </form>
        @else
            <div class="flex-1 flex items-center justify-center text-gray-500">
                Pilih pengguna untuk mulai chatting.
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        scrollToBottom();

        Livewire.hook('message.processed', (message, component) => {
            scrollToBottom();
        });

        function scrollToBottom() {
            const container = document.getElementById('chat-container');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        }
    });
</script>
@endpush
