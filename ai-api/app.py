from flask import Flask, request, jsonify
import requests

app = Flask(__name__)

@app.route('/ask', methods=['POST'])
def ask():
    data = request.get_json()
    question = data.get('question', '')

    if not question.strip():
        return jsonify({"answer": "Pertanyaan kosong."}), 400

    try:
        response = requests.post(
            "http://localhost:11434/api/generate",
            json={
                "model": "gemma:2b",
                "prompt": question,
                "stream": False
            },
            timeout=60
        )
        response.raise_for_status()
        result = response.json()
        return jsonify({"answer": result.get("response", "Maaf, tidak ada jawaban.")})
    except requests.exceptions.Timeout:
        return jsonify({"answer": "Server terlalu lama merespons."}), 500
    except Exception as e:
        return jsonify({"answer": f"Terjadi kesalahan: {str(e)}"}), 500

if __name__ == '__main__':
    app.run(debug=True)
