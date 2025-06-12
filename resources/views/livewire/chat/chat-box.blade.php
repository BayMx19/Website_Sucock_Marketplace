<div class="container-fluid py-4">
    <div class="row" style="height: 80vh;">
        <!-- Sidebar: List Users -->
        <div class="col-md-4 border-end overflow-auto">
            <div class="fw-bold fs-5 p-3 border-bottom bg-light">Pesan Masuk</div>
            @foreach($users as $user)
                <div
                    wire:click="selectUser({{ $user->id }})"
                    class="px-4 py-3 cursor-pointer font-semibold"
                    style="{{ $selectedUser && $selectedUser->id === $user->id ? 'background-color: #548c9a !important; color: white;' : '' }}"
                    onmouseover="this.style.backgroundColor='#c3d8dc'"
                    onmouseout="this.style.backgroundColor='{{ $selectedUser && $selectedUser->id === $user->id ? '#548c9a' : '' }}'"
                >
                    {{ $user->name }}
                </div>
            @endforeach
        </div>

        <!-- Chat Area -->
<div class="col-md-8 position-relative">
    @if($selectedUser)
        <!-- Chat Header -->
        <div class="p-3 border-bottom bg-white fw-semibold">
            Chat dengan {{ $selectedUser->name }}
        </div>

        <!-- Chat Messages -->
        <div class="overflow-auto px-3 py-2 bg-light" id="chat-container" wire:poll.keep-alive1s="loadMessages" style="height: calc(80vh - 130px);" x-init="$nextTick(() => $el.scrollTop = $el.scrollHeight)">
            @foreach($messages as $message)
                <div class="mb-3 {{ $message['from_user_id'] == Auth::id() ? 'text-end' : 'text-start' }}">
                    <div class="small text-muted mb-1">
                        {{ $message['from_user_id'] == Auth::id() ? 'Saya' : $selectedUser->name }}
                    </div>
                    <div class="d-inline-block px-3 py-2 rounded text-white" style="background-color: #548c9a !important;">
                        {{ $message['content'] }}
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Chat Input Fixed -->
        <form wire:submit.prevent="sendMessage"
              class="bg-white border-top d-flex px-3 py-2 align-items-center w-100"
              style="position: absolute; bottom: 0; left: 0; right: 0;">
            <input type="text"
                   wire:model.defer="newMessage"
                   class="form-control me-2"
                   placeholder="Tulis pesan..." />
            <button type="submit" class="btn text-white" style="background-color: #548c9a !important;">Kirim</button>

            </form>
    @else
        <div class="d-flex align-items-center justify-content-center text-muted" style="height: 100%;">
            Pilih pengguna untuk mulai chatting.
        </div>
    @endif
</div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:load', function () {
        scrollToBottom();

        Livewire.hook('message.processed', (message, component) => {
            // Deteksi jika event berasal dari sendMessage
            if (message.updateQueue[0].method === 'sendMessage') {
                scrollToBottom();
            }
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
