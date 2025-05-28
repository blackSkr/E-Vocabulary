#pakai model mistrail
from flask import Flask, request, jsonify

import requests

app = Flask(__name__)


API_KEY = "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"  

@app.route('/ask', methods=['POST'])
def ask():
    data = request.get_json()
    question = data.get('question', '')

    if not question.strip():
        return jsonify({"answer": "Pertanyaan kosong."}), 400

    try:
        res = requests.post(
            url="https://openrouter.ai/api/v1/chat/completions",
            headers={
                "Authorization": f"Bearer {API_KEY}",
                "Content-Type": "application/json",
                "HTTP-Referer": "http://127.0.0.1:8000",  # Sesuaikan jika deploy
                "X-Title": "CivilBot"
            },
            json={
                "model": "mistralai/devstral-small:free",
                "messages": [
                    {
                        "role": "system",
                        "content": "Kamu adalah asisten AI teknik sipil yang dikembangkan oleh Satria dengan bahasa yang santai, cerdas, dan bisa menerjemahkan antara bahasa Indonesia dan Inggris."
                    },
                    {
                        "role": "user",
                        "content": question
                    }
                ]
            },
            timeout=60
        )

        # Cetak debug response dari OpenRouter
        print("== RESPONSE DEBUG ==")
        print("Status:", res.status_code)
        print("Text:", res.text)

        res.raise_for_status()
        data = res.json()
        return jsonify({"answer": data['choices'][0]['message']['content']})

    except requests.exceptions.Timeout:
        return jsonify({"answer": "Server terlalu lama merespons."}), 500

    except Exception as e:
        return jsonify({"answer": f"Terjadi kesalahan: {str(e)}"}), 500

if __name__ == '__main__':
    app.run(debug=True)
