<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Spesial Buat Kamu ❤️</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            background-color: #fce4ec;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            min-height: 100vh;
            overflow-x: hidden;
            padding: 40px 15px 20px 15px;
        }
        .container {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
            max-width: 600px;
        }

        /* Amplop Styles */
        .envelope-wrapper {
            position: relative;
            width: 300px;
            height: 200px;
            background-color: #f8bbd0;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: transform 0.3s ease;
            margin-bottom: 25px;
        }
        .envelope-wrapper:hover { transform: translateY(-5px); }
        .flap {
            position: absolute; top: 0; left: 0;
            border-left: 150px solid transparent;
            border-right: 150px solid transparent;
            border-top: 110px solid #f48fb1;
            transform-origin: top;
            transition: transform 0.5s ease;
            z-index: 4;
        }
        .pocket {
            position: absolute; bottom: 0; left: 0;
            border-left: 150px solid #f48fb1;
            border-right: 150px solid #f48fb1;
            border-top: 100px solid transparent;
            border-bottom: 100px solid #f06292;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
            z-index: 3;
        }
        .heart-seal {
            position: absolute; top: 85px; left: 50%;
            transform: translateX(-50%);
            width: 44px; height: 44px;
            background-color: #e91e63;
            border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            color: white; font-size: 22px; z-index: 5;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .hint { color: #880e4f; font-weight: 600; font-size: 1rem; text-align: center; animation: bounce 1.5s infinite; }

        /* Fullscreen Modal Surat */
        .modal-overlay {
            position: fixed;
            top: 0; left: 0;
            width: 100vw; height: 100vh;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.4s ease;
            padding: 20px;
        }

        .modal-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .letter-paper {
            background-color: #ffffff;
            width: 100%;
            max-width: 650px;
            max-height: 85vh;
            border-radius: 16px;
            padding: 30px 25px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            display: flex;
            flex-direction: column;
            transform: scale(0.8);
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .modal-overlay.active .letter-paper {
            transform: scale(1);
        }

        .letter-content {
            overflow-y: auto;
            padding-right: 10px;
            text-align: left;
        }

        .letter-content::-webkit-scrollbar { width: 6px; }
        .letter-content::-webkit-scrollbar-thumb { background-color: #f48fb1; border-radius: 10px; }

        .letter-paper h2 { color: #d81b60; font-size: 1.5rem; margin-bottom: 15px; font-family: 'Georgia', serif; text-align: center; }
        .letter-paper p { color: #333; font-size: 1rem; line-height: 1.7; margin-bottom: 16px; text-align: justify; }
        .letter-paper .signature { font-weight: bold; color: #c2185b; font-size: 1.1rem; text-align: center; margin-top: 20px; }

        .close-btn {
            margin-top: 20px;
            background-color: #e91e63;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 0.95rem;
            cursor: pointer;
            align-self: center;
            box-shadow: 0 4px 10px rgba(233, 30, 99, 0.3);
            transition: background-color 0.2s ease, transform 0.2s ease;
        }
        .close-btn:hover { background-color: #c2185b; transform: scale(1.05); }

        /* Scratch Card Section */
        .scratch-section { width: 100%; margin-top: 35px; text-align: center; display: none; }
        .scratch-section h3 { color: #c2185b; font-size: 1.3rem; margin-bottom: 18px; }
        .scratch-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; width: 100%; max-width: 450px; margin: 0 auto; }
        .scratch-card { position: relative; width: 100%; aspect-ratio: 1; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 10px rgba(0,0,0,0.1); background-color: #fff; }
        .scratch-card img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .scratch-card canvas { position: absolute; top: 0; left: 0; width: 100%; height: 100%; cursor: pointer; touch-action: none; }

        /* Footer Styles */
        footer {
            margin-top: 50px;
            text-align: center;
            color: #d81b60;
            font-size: 1.2rem;
            font-weight: bold;
            letter-spacing: 1.5px;
            font-family: 'Georgia', serif;
        }

        @keyframes bounce { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-6px); } }
        @media (max-width: 480px) {
            .scratch-grid { gap: 8px; }
            .letter-paper { padding: 20px 15px; }
        }
    </style>
</head>
<body>

    <!-- Audio Element -->
    <audio id="bgMusic" loop>
        <source src="{{ asset('audio/TULUS - Jatuh Suka (Official Lyric Video).mp3') }}" type="audio/mpeg">
    </audio>

    <div class="container">
        <!-- Amplop -->
        <div class="envelope-wrapper" id="envelope">
            <div class="flap"></div>
            <div class="pocket"></div>
            <div class="heart-seal">❤️</div>
        </div>
        
        <div class="hint" id="hintText">Klik amplopnya buat buka surat! 💌</div>

        <!-- Section Scratch Lotre (12 Foto) -->
        <div class="scratch-section" id="scratchSection">
            <h3>Gosok Kotak-Kotak Ini Buat Lihat Foto Kita! 🎁✨</h3>
            <div class="scratch-grid">
                @for ($i = 1; $i <= 12; $i++)
                    <div class="scratch-card">
                        <img src="{{ asset('images/foto' . $i . '.png') }}" alt="Foto Kenangan {{ $i }}">
                        <canvas></canvas>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Modal Layar Penuh Kertas Surat -->
    <div class="modal-overlay" id="modalOverlay">
        <div class="letter-paper">
            <div class="letter-content">
                <h2>Dear sayanggg ❤️</h2>
                <p>Untuk sayanggg aku...</p>
                <p>Aku gak terlalu jago dalam merangkai kata. Tapi, aku harap, kamu mengerti apa yang aku maksud yaa...</p>
                <p>First of all, i wanna say my apology.</p>
                <p>Aku minta maaf ayy, maaf karena aku udah melakukan kesalahan fatal pada hari itu. Aku tahu kamu kesel, kesel banget, dan emang kurang ajar aku ke kamu.</p>
                <p>Jujur, aku gaada terbesit satu pun niatan aku dan hati aku untuk melakukan yang aneh sama dia. Jujur. Aku murni hanya menanyakan status dia dengan cowonya dan aku manasin dia karena aku sudah punya kamu dan membanggakan kamu di mata dia. Oke, kamu melihat aku minta ketemuan dengan dia. Jujur, aku hanya bercanda, sekaligus mengancam dianya agar jangan sepele dengan barang yang masih tertahan sama dia, yaitu jaket aku. Kamu udah tahu, kan, jaket aku itu betapa berartinya sama aku? Iya, ketikan aku seperti flirty, ya, karena memang aku kurang jago dalam merangkai kata sehingga terkesan aku mengatakan hal tersebut untuk melakukan hal yang aneh. Jujur, aku gaada maksud ke arah sana ayy. Aku sudah punya kamu, ayy.</p>
                <p>Dan aku sadar, aku sering banget nyakitin kamu. Aku sering banget buat kamu terluka. Dan respons kamu untuk ngediamin aku membuat aku memiliki waktu untuk introspeksi diri lebih dalam. Dan perlahan, iya, aku udah banyak banget salah sama kamu. Aku masih banyak kurangnya ke kamu.</p>
                <p>Akan tetapi, putus bukanlah solusi, sayanggg. Kita tahu, manusia tidak ada yang sempurna. Aku ada kurangnya. Kamu juga ada kurangnya. Apakah dengan kekurangan itu kita tetap terlarut? Selama ini, aku juga sering memaafkan kamu. Kamu ada salah, selalu aku maklumi dan aku maafin. Bahkan, kamu cerita cowok di depan aku aja pun aku jarang marah, kan? Dan itu gak hanya sekali dua kali kamu lakukan. Kalau dibilang sakit hati, aku juga sakit hati ayyy, tetapi aku lebih milih selalu memaafkan itu dan gak aku bawa ke hati demi kelanjutan hubungan ini ayyy. Sebegitu sayangnya aku sama kamu ayyy...</p>
                <p>Dan aku juga selalu mengusahakan yang terbaik untuk kamu ayy... Mungkin, di versi aku saat ini, aku belum bisa menyaingi kakak kamu. Akan tetapi, tetap aku usahakan kasih yang terbaik untuk kamu. Maafin aku juga, aku kurang inisiatif bagi kamu ketika kamu sakit ayyy. Jujur, aku bener-bener lagi gaada uang pada saat itu. Bahkan, lagi gaada uang pun, aku tetep beliin kamu sop kan? Sebegitu sayangnya aku sama kamu ayyy....</p>
                <p>Kamu juga sering bilang ke aku untuk HTS lah, temenan lah, bilang putus ke aku lah. Terlepas itu bercanda atau serius, aku juga sakit hati ayy. Tetapi, tetap aku pilih diam atas hal itu ayy. Sebegitu sayangnya aku sama kamu...</p>
                <p>Kalau sakit hati, kita berdua juga sama-sama merasakan. Akan tetapi, apakah putus menjadi solusi atas ini semua ayyy? Kita bisa sama-sama komunikasikan bareng-bareng, kita evaluasi bersama, kita bahas bersama, dan kita cari solusinya bersama karena kunci hubungan biar langgeng adalah komunikasi, ayyy...</p>
                <p>Ayo, kita banyak kurangnya ayyy. Maka dari itu, ayo kita sama-sama memperbaiki diri untuk menjadi lebih baik lagi agar kita bisa melanjutkan hubungan ini secara sehat dan dalam versi diri yang terbaik. Putus bukanlah solusi sayangggg.... Pliss...</p>
                <p>Aku berjanji, ini adalah yang terakhir kalinya aku melakukan kesalahan fatal ini. Aku janji, aku janji, aku janji. Sebagai penebusan terhadap semua kesalahan aku, aku beliin kamu hacipupu keduaa. Gimanaa?? Mau kannn??</p>
                <p>Aku cinta banget sama kamu. Aku sayang banget sama kamu. Aku cuma punya kamu.</p>
                <p>Dan ini cara aku komunikasi ke kamu soalnya aku gaada akses lagi untuk komunikasi ke kamu sayanggg :(</p>
                <p>Udah, itu aja dari aku ayy. Aku merangkai kata juga dibantu AI hehe. Dibantu yaa, bukan dibuatinn. Nanti beliin aku oleh-oleh dari Garut atau Bandung yaa ayyy heheh, canda sayangggg</p>
                <p class="signature">I love u ❤️</p>
            </div>
            <button class="close-btn" id="closeBtn">Tutup Surat & Lihat Foto 💖</button>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        I Love You ❤️
    </footer>

    <script>
        const envelope = document.getElementById('envelope');
        const modalOverlay = document.getElementById('modalOverlay');
        const closeBtn = document.getElementById('closeBtn');
        const hintText = document.getElementById('hintText');
        const scratchSection = document.getElementById('scratchSection');
        const bgMusic = document.getElementById('bgMusic');

        // Buka Modal Surat Penuh + Putar Lagu Tulus saat Amplop Diklik
        envelope.addEventListener('click', () => {
            modalOverlay.classList.add('active');
            if (bgMusic.paused) {
                bgMusic.play().catch(e => console.log("Autoplay ditolak browser, perlu interaksi lanjutan"));
            }
        });

        // Tutup Surat & Tampilkan Bagian Scratch Lotre
        closeBtn.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
            scratchSection.style.display = 'block';
            hintText.textContent = "Scroll kebawah buat gosok fotonya! 💖";
        });

        // Inisialisasi Canvas Scratch Card
        document.querySelectorAll('.scratch-card').forEach((card, index) => {
            const canvas = card.querySelector('canvas');
            initScratchCard(canvas, index + 1);
        });

        function initScratchCard(canvas, index) {
            const ctx = canvas.getContext('2d');
            const width = canvas.parentElement.clientWidth || 120;
            const height = canvas.parentElement.clientHeight || 120;

            canvas.width = width;
            canvas.height = height;

            ctx.fillStyle = '#f48fb1';
            ctx.fillRect(0, 0, width, height);

            ctx.fillStyle = '#ffffff';
            ctx.font = 'bold 18px Segoe UI, sans-serif';
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            ctx.fillText(`✨ ${index} ✨`, width / 2, height / 2);

            let isDrawing = false;

            function scratch(e) {
                if (!isDrawing) return;
                const rect = canvas.getBoundingClientRect();
                const x = (e.clientX || (e.touches && e.touches[0].clientX)) - rect.left;
                const y = (e.clientY || (e.touches && e.touches[0].clientY)) - rect.top;

                ctx.globalCompositeOperation = 'destination-out';
                ctx.beginPath();
                ctx.arc(x, y, 18, 0, Math.PI * 2);
                ctx.fill();
            }

            canvas.addEventListener('mousedown', (e) => { isDrawing = true; scratch(e); });
            canvas.addEventListener('mousemove', scratch);
            canvas.addEventListener('mouseup', () => isDrawing = false);
            canvas.addEventListener('mouseleave', () => isDrawing = false);

            canvas.addEventListener('touchstart', (e) => { isDrawing = true; scratch(e); });
            canvas.addEventListener('touchmove', scratch);
            canvas.addEventListener('touchend', () => isDrawing = false);
        }
    </script>
</body>
</html>