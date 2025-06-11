<div class="flex chat-container w-full h-screen">
    <!-- Sidebar / List Users -->
    <div class="w-1/3 flex flex-col chat-sidebar border-r border-gray-200 p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-800">Chat</h2>
            {{-- <button class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-cog"></i> <!-- Ikon pengaturan jika diperlukan -->
            </button> --}}
        </div>

        <div class="mb-4">
            <span class="font-medium text-gray-700">Inbox</span>
            <span class="ml-2 bg-blue-500 text-white text-xs font-bold px-2 py-1 rounded-full">
                {{-- Jumlah pesan baru dinamis --}}
                @if(isset($newMessagesCount) && $newMessagesCount > 0)
                    {{ $newMessagesCount }} New
                @else
                    0 New
                @endif
            </span>
        </div>

        <div class="relative mb-4">
            <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" />
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-search text-gray-400"></i>
            </div>
        </div>

        <div class="flex-1 overflow-y-auto">
            @foreach($users as $user)
                <div
                    wire:click="selectUser({{ $user->id }})"
                    class="user-list-item flex items-center p-3 cursor-pointer rounded-lg mb-2 transition duration-200 ease-in-out
                           {{ $selectedUser && $selectedUser->id === $user->id ? 'active' : 'hover:bg-gray-100' }}"
                >
                    {{-- Tanpa gambar, hanya teks --}}
                    <div>
                        <div class="font-medium text-gray-800">{{ $user->name }}</div>
                        <div class="text-sm text-gray-500">Lorem ipsum dolor sit amet</div> {{-- Placeholder untuk pesan terakhir/status --}}
                    </div>
                    <div class="ml-auto text-xs text-gray-400">5m</div> {{-- Placeholder untuk waktu terakhir dilihat --}}
                </div>
            @endforeach
        </div>
    </div>

    <!-- Chat Area -->
    <div class="w-2/3 flex flex-col chat-main p-4">
        @if($selectedUser)
            <div class="flex items-center justify-between pb-4 border-b border-gray-200 mb-4">
                <h3 class="text-lg font-semibold text-gray-800">{{ $selectedUser->name }}</h3>
                <div>
                    {{-- Ikon Opsi/Lainnya --}}
                    <button class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-ellipsis-v"></i>
                    </button>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto chat-messages-scrollable" wire:poll.1s="loadMessages">
                @foreach($messages as $message)
                    <div class="flex flex-col mb-4 {{ $message['from_user_id'] == Auth::id() ? 'items-end' : 'items-start' }}">
                        <div class="text-xs text-gray-500 mb-1">
                            {{-- Opsional: Tampilkan nama pengirim di atas bubble jika bukan 'Saya' --}}
                            {{ $message['from_user_id'] == Auth::id() ? 'Saya' : $selectedUser->name }}
                        </div>
                        <div class="message-bubble {{ $message['from_user_id'] == Auth::id() ? 'sent' : 'received' }}">
                            {{ $message['content'] }}
                        </div>
                        <div class="text-xs text-gray-400 mt-1">
                            {{ \Carbon\Carbon::parse($message['created_at'])->format('h:i A') }} {{-- Asumsi 'created_at' ada --}}
                        </div>
                    </div>
                @endforeach
                <div wire:ignore id="scroll-to-bottom"></div>
            </div>

            <form wire:submit.prevent="sendMessage" class="mt-4 flex items-center chat-input-container pt-4">
                <div class="flex gap-3 mr-4">
                    {{-- Tombol Aksi --}}
                    <button type="button" class="action-button hover:text-blue-500" title="Lampirkan file">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <button type="button" class="action-button hover:text-blue-500" title="Kirim emoji">
                        <i class="far fa-laugh"></i>
                    </button>
                </div>
                <input type="text" wire:model.defer="newMessage" class="flex-1 chat-input-field" placeholder="Tulis pesan..." />
                <button type="submit" class="ml-4 send-button">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim
                </button>
            </form>
        @else
            <div class="flex flex-1 justify-center items-center text-gray-500 text-lg">
                <p>Pilih pengguna untuk mulai chatting.</p>
            </div>
        @endif
    </div>
</div>

