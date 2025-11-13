<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interno AutoWake</title>
    <link rel="icon" href="img/Icon.png" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .chat-container {
            width: 100%;
            max-width: 400px;
            height: 600px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
        }
        .chat-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .chat-messages {
            flex: 1;
            padding: 15px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }
        .message.sent {
            background-color: #007bff;
            color: white;
            align-self: flex-end;
        }
        .message.received {
            background-color: #e9ecef;
            color: black;
            align-self: flex-start;
        }
        .message .user-name {
            font-weight: bold;
            font-size: 0.8em;
            margin-bottom: 5px;
        }
        .chat-input {
            display: flex;
            padding: 15px;
            border-top: 1px solid #ddd;
        }
        .chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            outline: none;
        }
        .chat-input button {
            margin-left: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }
        .chat-input button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-header">
            <h3>Chat Interno AutoWake</h3>
        </div>
        <div class="chat-messages" id="chat-messages">
            @foreach($messages as $message)
                <div class="message {{ $message->user_id == auth()->id() ? 'sent' : 'received' }}">
                    <div class="user-name">{{ $message->user->name }}</div>
                    <div>{{ $message->message }}</div>
                </div>
            @endforeach
        </div>
        <div class="chat-input">
            <input type="text" id="message-input" placeholder="Digite sua mensagem...">
            <button id="send-button">Enviar</button>
        </div>
    </div>

    <script>
        const chatMessages = document.getElementById('chat-messages');
        const messageInput = document.getElementById('message-input');
        const sendButton = document.getElementById('send-button');
        let lastMessageId = {{ $messages->last() ? $messages->last()->id : 0 }};

        function addMessage(message) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', message.user_id == {{ auth()->id() }} ? 'sent' : 'received');
            messageDiv.innerHTML = `
                <div class="user-name">${message.user.name}</div>
                <div>${message.message}</div>
            `;
            chatMessages.appendChild(messageDiv);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function sendMessage() {
            const message = messageInput.value.trim();
            if (message) {
                fetch('/internal-chat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message: message })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        messageInput.value = '';
                        fetchMessages(); // Refresh messages after sending
                    }
                })
                .catch(error => console.error('Error:', error));
            }
        }

        function fetchMessages() {
            fetch('/internal-chat/messages')
            .then(response => response.json())
            .then(messages => {
                // Clear existing messages
                chatMessages.innerHTML = '';
                messages.forEach(message => {
                    addMessage(message);
                });
                // Update lastMessageId
                if (messages.length > 0) {
                    lastMessageId = messages[messages.length - 1].id;
                }
            })
            .catch(error => console.error('Error:', error));
        }

        sendButton.addEventListener('click', sendMessage);
        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Poll for new messages every 5 seconds
        setInterval(fetchMessages, 5000);
    </script>
</body>
</html>
