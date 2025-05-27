<main class="max-w-4xl w-full mx-auto px-4 py-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-2 sm:gap-0">
        <h1 class="text-2xl font-bold text-gray-800">Ask {{ $botName }}</h1>
        <div class="text-gray-600 text-sm sm:text-base">{{ now()->format('H:i') }}</div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-green-700 text-white px-4 py-3 flex items-center">
            <div class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-3">
                <i class="fas fa-robot"></i>
            </div>
            <div>
                <h2 class="font-semibold">{{ $botName }} Assistant</h2>
                <p class="text-xs opacity-80">Powered by Satria</p>
            </div>
        </div>

        <!-- Chat Body -->
        <div 
            class="chat-container overflow-y-auto p-4 space-y-4 max-h-[70vh] sm:h-96 scroll-smooth"
            x-data="{ messages: @entangle('messages').live, thinking: @entangle('isThinking').live }"
            x-ref="chatContainer"
            x-effect="$nextTick(() => $refs.chatContainer.scrollTop = $refs.chatContainer.scrollHeight)"
        >
            <template x-for="msg in messages" :key="msg.time + msg.text">
                <div>
                    <template x-if="msg.from === 'user'">
                        <div class="flex justify-end">
                            <div class="bg-green-700 text-white rounded-xl px-4 py-2 max-w-full sm:max-w-md">
                                <p x-text="msg.text"></p>
                                <p class="text-xs text-white text-right mt-1" x-text="msg.time"></p>
                            </div>
                        </div>
                    </template>
                    <template x-if="msg.from === 'bot'">
                        <div class="flex items-start space-x-2">
                            <div class="w-8 h-8 bg-green-700 text-white rounded-full flex items-center justify-center text-sm mt-1">
                                <i class="fas fa-robot"></i>
                            </div>
                            <div class="bg-gray-100 text-gray-800 rounded-xl px-4 py-2 max-w-full sm:max-w-md">
                                <p x-text="msg.text"></p>
                                <p class="text-xs text-gray-500 mt-1" x-text="msg.time"></p>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

            <div x-show="thinking" class="flex items-start space-x-2">
                <div class="w-8 h-8 bg-green-700 text-white rounded-full flex items-center justify-center text-sm mt-1">
                    <i class="fas fa-robot"></i>
                </div>
                <div class="bg-gray-100 rounded-xl px-4 py-2 max-w-full sm:max-w-md animate-pulse">
                    <p class="text-gray-800">{{ $botName }} sedang berpikir...</p>
                </div>
            </div>
        </div>

        <!-- Input Form -->
        <div class="border-t px-4 py-3 bg-gray-50">
            <form wire:submit.prevent="ask" class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2">
                <input 
                    type="text"
                    wire:model.live="question"
                    placeholder="Tanyakan sesuatu tentang bahasa..."
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-700"
                    autocomplete="off"
                >
                <button 
                    type="submit"
                    class="bg-green-700 text-white px-4 py-2 rounded-full hover:bg-green-800 transition"
                >
                    Kirim
                </button>
            </form>
            <p class="text-xs text-gray-500 mt-2">CivilLex mungkin memberikan informasi yang tidak sepenuhnya akurat.</p>
        </div>
    </div>
</main>
