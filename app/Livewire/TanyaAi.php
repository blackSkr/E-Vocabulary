<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class TanyaAi extends Component
{
    public $question = '';
    public $messages = [];
    public $isThinking = false;

    public $botName = 'Alexandra';
    public $botIntro = 'Saya Assistant yang dikembangkan oleh Satria, siap membantu pertanyaan kamu terkait bahasa.';

    public function mount()
    {
        $this->messages = session('chat_messages', []);

        if (empty($this->messages)) {
            $this->addBotMessage($this->botIntro);
        }
    }

    public function ask()
    {
        $this->validate([
            'question' => 'required|string|min:5',
        ], [
            'question.required' => 'Pertanyaan tidak boleh kosong.',
            'question.min' => 'Tolong ajukan pertanyaan yang lebih lengkap.',
        ]);

        $cleaned = $this->sanitizeQuestion($this->question);
        $this->addUserMessage($cleaned);

        $this->isThinking = true;
        $this->reset('question');

        $answer = $this->fetchAnswerFromAi($cleaned);
        $this->addBotMessage($answer);

        $this->isThinking = false;
    }

    protected function fetchAnswerFromAi(string $cleaned): string
    {
        try {
            $response = Http::timeout(10)->post('http://127.0.0.1:5000/ask', [
                'question' => $this->buildPrompt($cleaned),
            ]);

            return $response['answer'] ?? 'Maaf, tidak dapat menjawab saat ini.';
        } catch (\Throwable $e) {
            report($e);
            return 'Terjadi kesalahan saat menghubungi AI.';
        }
    }

    protected function sanitizeQuestion(string $question): string
    {
        return trim(preg_replace('/\s+/', ' ', strip_tags($question)));
    }

    protected function addUserMessage(string $text)
    {
        $this->messages[] = [
            'from' => 'user',
            'text' => $text,
            'time' => $this->nowTime(),
        ];
    }
        protected function addBotMessage(string $text)
    {
        $this->messages[] = [
            'from' => 'bot',
            'text' => $text,
            'time' => $this->nowTime(),
        ];
    }


    protected function buildPrompt(string $question): string
    {
        return <<<EOT
        Kamu adalah {$this->botName}, asisten virtual yang dikembangkan oleh Satria dengan bahasa yang sopan, cerdas, dan ringkas. Jawab pertanyaan pengguna seputar bahasa dengan akurat dan jelas.

        Pertanyaan: {$question}
        Jawaban:
        EOT;
    }

    protected function nowTime(): string
    {
        return now()->format('H:i');
    }

    public function render()
    {
        return view('livewire.tanya-ai')->layout('layouts.app');
    }
}