document.addEventListener("DOMContentLoaded", function () {
    const chatMessages = document.getElementById("chat-messages");
    const messageInput = document.getElementById("message-input");
    const sender = document.getElementById("sender");
    const receiver = document.getElementById("receiver");
    const sendButton = document.getElementById("send-button");


    function getChatMessages() {
        fetch("get_messages.php")
            .then(response => response.json())
            .then(messages => {
                chatMessages.innerHTML = ""; // Clear previous messages
    
                messages.forEach(message => {
                    const chatBox = document.createElement("div");
                    chatBox.classList.add("chat-box");
    
                    const messageText = document.createElement("span");
                    messageText.textContent = message.message;
    
                    if (message.sender === "Admin") {
                        chatBox.classList.add("admin-message");
                    } else
                    {
                        chatBox.classList.add("user-message");
                    }
    
                    chatBox.appendChild(messageText);
    
                    chatMessages.appendChild(chatBox);
                });
            });
    }
    

    getChatMessages();
    setInterval(getChatMessages, 3000); // Fetch messages every 5 seconds

   
    
});
