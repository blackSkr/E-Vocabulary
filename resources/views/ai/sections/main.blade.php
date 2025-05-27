<main class="max-w-4xl mx-auto px-4 py-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Ask Alexandra</h1>
        <div class="text-gray-600">{{ now()->format('H:i') }}</div>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Chat Header -->
        <div class="bg-primary text-white px-4 py-3 flex items-center">
            <div class="w-8 h-8 rounded-full bg-white bg-opacity-20 flex items-center justify-center mr-3">
                <i class="fas fa-robot"></i>
            </div>
            <div>
                <h2 class="font-semibold">Alexandra Assistant</h2>
                <p class="text-xs opacity-80">Powered by Satria</p>
            </div>
        </div>

        <!-- Chat Messages -->
        <div class="chat-container overflow-y-auto p-4 space-y-4 h-96">
            @foreach ($messages as $msg)
                @if ($msg['from'] === 'user')
                    <div class="message-enter flex justify-end">
                        <div class="bg-primary text-white rounded-lg px-4 py-3 max-w-3xl">
                            <p>{{ $msg['text'] }}</p>
                            <p class="text-xs text-primary-100 mt-1">{{ $msg['time'] }}</p>
                        </div>
                    </div>
                @else
                    <div class="message-enter flex">
                        <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-3 flex-shrink-0">
                            <i class="fas fa-robot"></i>
                        </div>
                        <div class="bg-gray-100 rounded-lg px-4 py-3 max-w-3xl">
                            <p class="text-gray-800">{{ $msg['text'] }}</p>
                            <p class="text-xs text-gray-500 mt-1">{{ $msg['time'] }}</p>
                        </div>
                    </div>
                @endif
            @endforeach

            @if ($isThinking)
                <div class="flex items-start">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center mr-3 flex-shrink-0">
                        <i class="fas fa-robot"></i>
                    </div>
                    <div class="bg-gray-100 rounded-lg px-4 py-3">
                        <div class="typing-indicator text-gray-800">Alexandra is typing...</div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Input Area -->
        <div class="border-t px-4 py-3 bg-gray-50">
            <form wire:submit="ask" class="flex space-x-2">
                <input 
                    type="text"
                    wire:model.live="question"
                    wire:keydown.enter="ask"
                    placeholder="Ask anything about language learning..." 
                    class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                >
                <button 
                    type="submit"
                    class="bg-primary text-white rounded-lg px-4 py-2 hover:bg-green-700 transition flex items-center justify-center"
                >
                    <i class="fas fa-paper-plane mr-2"></i>
                    <span class="hidden sm:inline">Send</span>
                </button>
            </form>
            <p class="text-xs text-gray-500 mt-2">Alexandra may produce inaccurate information about people, places, or facts.</p>
        </div>
    </div>
</main>
