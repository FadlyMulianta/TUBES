<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Clicker+Script&family=Edu+AU+VIC+WA+NT+Pre:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Contact & Chat</title>
    <style>
        /* body {
            margin: 0;
            padding: 0;
            font-family: "Poppins", serif; */
        /* display: flex; */
        /* flex-direction: column;
            height: 100vh; */
        /* } */

        :root {
            --primary-color: #1C3F60;
            --secondary-color: #ffff;
            --text-color: #333;
            --text-color-secondary: #ffff;
            --back-color: #DBE2EF;
        }

        body {
            background-color: #f1f1f6;
        }

        .side {
            background-color: var(--primary-color);
            padding: 0.5rem;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }


        .container {
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-left: 5rem;
            margin-right: 6.5rem;
            display: flex;
            flex: 1;
            margin-bottom: 3rem;
        }

        .sidebar {
            width: 50px;
            background-color: var(--primary-color);
            display: flex;
            flex-direction: column;
            align-items: center;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .main-contacts {
            background-color: white;
        }

        .sidebar .hamburger {
            width: 30px;
            height: 30px;
            margin-top: 10px;
            background: url('hamburger-icon.png') no-repeat center center;
            background-size: contain;
            cursor: pointer;
        }

        .main {
            flex: 1;
            display: flex;
        }

        .main-contacts {
            width: 25%;
            border-right: 1px solid #ccc;
            overflow-y: auto;
            min-height: 628px;
            /* Menjamin tinggi minimum */
        }

        .main-chat {
            width: 50%;
            padding: 1rem;
            overflow-y: auto;
        }

        /* .main-contacts header {
            background-color: ;
            padding: 0.5rem;
            border-bottom: 1px solid #ccc;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        } */

        .main-contacts h2 {
            margin: 0 0 0.5rem 0;
            font-size: 1.5rem;
            color: var(--secondary-color);
        }

        .main-contacts .search-bar {
            width: 100%;
            display: flex;
            align-items: center
        }

        .main-contacts .search-bar input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .main-contacts .contact-list {
            display: flex;
            flex-direction: column;
            margin: 1rem;
            max-height: 496px;
            /* Sesuaikan tinggi maksimum agar hanya 7 kontak terlihat */
            overflow-y: auto;
            /* Tambahkan scroll vertikal */
        }


        .main-contacts .contact {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }


        .main-contacts .contact-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .main-contacts .contact-name {
            font-size: 1rem;
            font-weight: bold;
        }

        .main-contacts .contact:hover {
            background-color: var(--primary-color);
            color: white;
            cursor: pointer;
            transform: scale(1.03);
            /* Sedikit memperbesar */
            transition: all 0.3s ease;
            /* Animasi transisi */
        }

        .main-contacts .contact:hover .contact-name {
            color: white;
        }

        .main-contacts .contact.active-contact {
            background-color: #1C3F60;
            /* Warna latar belakang untuk kontak yang dipilih */
            color: white;
            /* Mengubah warna teks menjadi putih */
        }

        .kolom-chat {
            display: flex;
            flex-direction: column;
            max-height: 500px;
            /* Tinggi minimum kolom */
            width: 100%;
        }

        .chat-header {
            display: flex;
            align-items: center;
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .chat-header .back-button {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            margin-right: 0.5rem;
            cursor: pointer;
        }

        .chat-header .chat-contact-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
        }

        .chat-header .chat-contact-name {
            font-size: 1.2rem;
            margin: 0;
        }

        .chat-body {
            background-color: white;
            display: flex;
            flex-direction: column;
            min-height: 500px;
            /* Menjamin tinggi minimum */
            overflow-y: auto;
            /* Menambahkan scroll vertikal */
            max-height: 400px;
            /* Menambahkan batasan tinggi agar bisa scroll saat pesan bertambah */
            padding: 0.5rem;
            /* Sedikit padding agar konten tidak mepet dengan tepi */
        }


        .chat-body:empty::before {
            content: "No messages yet. Start the conversation!";
            color: #aaa;
            font-style: italic;
            text-align: center;
            margin: auto;
        }

        .chat-footer {
            display: flex;
            align-items: center;
            padding: 0.5rem;
            background-color: #ffffff;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        .chat-footer .chat-input {
            flex: 1;
            padding: 0.5rem;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            margin-right: 0.5rem;
        }

        .message {
            max-width: 70%;
            margin: 0.5rem;
            padding: 0.8rem;
            border-radius: 15px;
            word-wrap: break-word;
            display: inline-block;
        }

        .user-message {
            background-color: var(--primary-color);
            color: white;
            align-self: flex-end;
            text-align: right;
        }

        .bot-message {
            background-color: var(--back-color);
            color: var(--text-color);
            align-self: flex-start;
        }

        .chat-footer .send-button {
            padding: 0.5rem 1rem;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .chat-footer .send-button:hover {
            border: 1px solid var(--primary-color);
            background-color: var(--secondary-color);
            color: var(--primary-color);
        }

        .contact-list:empty::before {
            content: "No contacts available.";
            color: #aaa;
            font-style: italic;
            text-align: center;
            display: block;
        }
    </style>
</head>

<body>
    @include('header.mainHeader')
    <div class="container">
        <!-- <aside class="sidebar">
            <img src="assets/hamburgermenu.svg" alt="Hamburger Menu" class="hamburger" title="Menu">
        </aside> -->

        <div class="main">
            <section class="main-contacts">
                <div class="side">
                    <h2>Contact</h2>
                    <div class="search-bar">
                        <input type="text" placeholder="Search contacts...">
                    </div>
                </div>
                <div class="contact-list">
                    <div class="contact" data-id="1">
                        <img src="../gambar/dokter1.jpg" alt="Contact 1" class="contact-img">
                        <span class="contact-name">Dr.John Doe</span>
                    </div>
                    <div class="contact" data-id="2">
                        <img src="../gambar/dokter2.jpg" alt="Contact 2" class="contact-img">
                        <span class="contact-name">Dr.Thong Long</span>
                    </div>
                    <div class="contact" data-id="3">
                        <img src="../gambar/dokter3.jpg" alt="Contact 1" class="contact-img">
                        <span class="contact-name">Dr.Thomas E Ege</span>
                    </div>
                    <div class="contact" data-id="4">
                        <img src="../gambar/dokter4.jpg" alt="Contact 2" class="contact-img">
                        <span class="contact-name">Dr.Jane Smith</span>
                    </div>
                    <div class="contact" data-id="5">
                        <img src="../gambar/dokter1.jpg" alt="Contact 1" class="contact-img">
                        <span class="contact-name">Dr.Lorde Smith</span>
                    </div>
                    <div class="contact" data-id="6">
                        <img src="../gambar/dokter2.jpg" alt="Contact 2" class="contact-img">
                        <span class="contact-name">Dr.Kode Jhor</span>
                    </div>
                    <div class="contact" data-id="7">
                        <img src="../gambar/dokter3.jpg" alt="Contact 1" class="contact-img">
                        <span class="contact-name">Dr.Ahe THong</span>
                    </div>
                    <div class="contact" data-id="8">
                        <img src="../gambar/dokter4.jpg" alt="Contact 2" class="contact-img">
                        <span class="contact-name">Dr.Victoria Jenner</span>
                    </div>
                </div>
            </section>
            <div class="kolom-chat">
                <div class="chat-header">
                    <img src="../gambar/dokter1.jpg" alt="Contact Image" class="chat-contact-img">
                    <h3 class="chat-contact-name">Dr. John Doe</h3>
                </div>
                <div class="chat-body">
                </div>
                <footer class="chat-footer">
                    <input type="text" placeholder="Type a message..." class="chat-input">
                    <button class="send-button">Kirim</button>
                </footer>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const chatInput = document.querySelector(".chat-input");
            const sendButton = document.querySelector(".send-button");
            const chatBody = document.querySelector(".chat-body");
            const chatHeaderName = document.querySelector(".chat-contact-name");
            const chatHeaderImg = document.querySelector(".chat-contact-img");
            const contacts = document.querySelectorAll(".main-contacts .contact");
            const searchInput = document.querySelector(".search-bar input");
            const chatHistory = {};

            const addMessage = (message, sender = "user") => {
                const messageElement = document.createElement("div");
                messageElement.classList.add("message");
                messageElement.classList.add(sender === "user" ? "user-message" : "bot-message");
                messageElement.textContent = message;
                chatBody.appendChild(messageElement);
                chatBody.scrollTop = chatBody.scrollHeight;
            };

            const switchChat = (contactId, contactName, contactImgSrc) => {
                const currentContactId = chatHeaderName.dataset.contactId;
                if (currentContactId) {
                    chatHistory[currentContactId] = chatBody.innerHTML;
                }

                chatHeaderName.textContent = contactName;
                chatHeaderName.dataset.contactId = contactId;
                chatHeaderImg.src = contactImgSrc;

                chatBody.innerHTML = chatHistory[contactId] || "";
            };

            contacts.forEach((contact) => {
                contact.addEventListener("click", () => {
                    const contactId = contact.dataset.id;
                    const contactName = contact.querySelector(".contact-name").textContent;
                    const contactImgSrc = contact.querySelector(".contact-img").src;
                    switchChat(contactId, contactName, contactImgSrc);
                });
            });

            sendButton.addEventListener("click", () => {
                const message = chatInput.value.trim();
                if (message) {
                    addMessage(message, "user");
                    chatInput.value = "";
                    setTimeout(() => {
                        const botReply = generateBotReply(message);
                        addMessage(botReply, "bot");
                    }, 500);
                }
            });

            chatInput.addEventListener("keypress", (event) => {
                if (event.key === "Enter") {
                    event.preventDefault();
                    sendButton.click();
                }
            });

            const generateBotReply = (userMessage) => {
                if (userMessage.toLowerCase().includes("halo")) {
                    return "Halo! Ada yang bisa saya bantu?";
                } else if (userMessage.toLowerCase().includes("dokter")) {
                    return "Apakah Anda ingin membuat janji dengan dokter?";
                } else {
                    return "Maaf, saya tidak mengerti. Bisa ulangi lagi?";
                }
            };

            const filterContacts = (searchTerm) => {
                const lowerCaseSearchTerm = searchTerm.toLowerCase();
                contacts.forEach((contact) => {
                    const contactName = contact.querySelector(".contact-name").textContent.toLowerCase();
                    if (contactName.includes(lowerCaseSearchTerm)) {
                        contact.style.display = "";
                    } else {
                        contact.style.display = "none";
                    }
                });
            };

            searchInput.addEventListener("input", (event) => {
                filterContacts(event.target.value);
            });
        });
        document.addEventListener("DOMContentLoaded", () => {
            const contacts = document.querySelectorAll(".main-contacts .contact");

            contacts.forEach((contact) => {
                contact.addEventListener("click", () => {
                    // Menghapus kelas aktif dari semua kontak
                    contacts.forEach((otherContact) => {
                        otherContact.classList.remove("active-contact");
                    });

                    // Menambahkan kelas aktif pada kontak yang dipilih
                    contact.classList.add("active-contact");

                    // Switch chat logic
                    const contactId = contact.dataset.id;
                    const contactName = contact.querySelector(".contact-name").textContent;
                    const contactImgSrc = contact.querySelector(".contact-img").src;
                    switchChat(contactId, contactName, contactImgSrc);
                });
            });
        });
    </script>


</body>

</html>