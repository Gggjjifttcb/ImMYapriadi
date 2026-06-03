<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Landing page portofolio personal modern dan responsif.">
    <title>Immy Apriadi | Portfolio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800|fraunces:600,700" rel="stylesheet" />
    <style>
        :root {
            --bg: #f5efe6;
            --panel: rgba(255, 255, 255, 0.72);
            --panel-strong: #ffffff;
            --text: #1f1a17;
            --muted: #6c625b;
            --line: rgba(31, 26, 23, 0.1);
            --accent: #d35400;
            --accent-2: #0f766e;
            --shadow: 0 24px 80px rgba(64, 36, 11, 0.14);
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(211, 84, 0, 0.18), transparent 28%),
                radial-gradient(circle at top right, rgba(15, 118, 110, 0.18), transparent 24%),
                radial-gradient(circle at bottom left, rgba(255, 255, 255, 0.85), transparent 30%),
                linear-gradient(180deg, #f8f2ea 0%, #f4ebdf 46%, #efe5d6 100%);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        .page {
            position: relative;
            overflow: clip;
        }

        .noise {
            pointer-events: none;
            position: fixed;
            inset: 0;
            opacity: 0.08;
            background-image: linear-gradient(rgba(0, 0, 0, 0.55) 1px, transparent 1px), linear-gradient(90deg, rgba(0, 0, 0, 0.55) 1px, transparent 1px);
            background-size: 36px 36px;
            mix-blend-mode: soft-light;
        }

        .container {
            width: min(1120px, calc(100% - 32px));
            margin: 0 auto;
        }

        .nav {
            position: sticky;
            top: 16px;
            z-index: 20;
            margin-top: 16px;
        }

        .nav-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 14px 18px;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(18px);
            box-shadow: 0 10px 40px rgba(44, 25, 10, 0.08);
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            letter-spacing: 0.02em;
        }

        .brand-mark {
            width: 38px;
            height: 38px;
            display: grid;
            place-items: center;
            border-radius: 14px;
            color: white;
            background: linear-gradient(135deg, var(--accent), #ff8a3d);
            box-shadow: 0 12px 24px rgba(211, 84, 0, 0.28);
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: flex-end;
        }

        .nav-links a {
            padding: 10px 14px;
            border-radius: 999px;
            color: var(--muted);
            transition: 180ms ease;
        }

        .nav-links a:hover {
            color: var(--text);
            background: rgba(255, 255, 255, 0.85);
        }

        .hero {
            padding: 64px 0 28px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.25fr 0.75fr;
            gap: 24px;
            align-items: stretch;
        }

        .hero-card,
        .side-card,
        .section-card {
            border: 1px solid var(--line);
            background: var(--panel);
            backdrop-filter: blur(18px);
            box-shadow: var(--shadow);
        }

        .hero-card {
            position: relative;
            padding: clamp(28px, 4vw, 48px);
            border-radius: 34px;
            overflow: hidden;
        }

        .hero-card::before,
        .hero-card::after {
            content: '';
            position: absolute;
            border-radius: 999px;
            filter: blur(8px);
            opacity: 0.9;
        }

        .hero-card::before {
            width: 260px;
            height: 260px;
            right: -90px;
            top: -100px;
            background: radial-gradient(circle, rgba(211, 84, 0, 0.26), transparent 62%);
        }

        .hero-card::after {
            width: 180px;
            height: 180px;
            left: -60px;
            bottom: -90px;
            background: radial-gradient(circle, rgba(15, 118, 110, 0.18), transparent 62%);
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(31, 26, 23, 0.08);
            color: var(--muted);
            font-size: 0.92rem;
            font-weight: 600;
        }

        .eyebrow-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--accent), #ffb36b);
            box-shadow: 0 0 0 6px rgba(211, 84, 0, 0.12);
        }

        h1,
        h2,
        h3,
        .display {
            font-family: 'Fraunces', serif;
            letter-spacing: -0.03em;
            margin: 0;
        }

        h1 {
            font-size: clamp(3rem, 8vw, 5.8rem);
            line-height: 0.95;
            margin-top: 18px;
            max-width: 10ch;
        }

        .hero p {
            max-width: 60ch;
            color: var(--muted);
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 28px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            border-radius: 999px;
            border: 1px solid transparent;
            font-weight: 700;
            transition: transform 180ms ease, box-shadow 180ms ease, background 180ms ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            color: white;
            background: linear-gradient(135deg, var(--accent), #ff914d);
            box-shadow: 0 18px 32px rgba(211, 84, 0, 0.25);
        }

        .btn-secondary {
            color: var(--text);
            background: rgba(255, 255, 255, 0.82);
            border-color: rgba(31, 26, 23, 0.09);
        }

        .hero-meta {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
            margin-top: 32px;
        }

        .meta-box {
            padding: 16px;
            border-radius: 22px;
            background: rgba(255, 255, 255, 0.76);
            border: 1px solid rgba(31, 26, 23, 0.08);
        }

        .meta-box strong {
            display: block;
            font-size: 1.35rem;
            margin-bottom: 4px;
        }

        .meta-box span {
            color: var(--muted);
            font-size: 0.92rem;
        }

        .side-card {
            border-radius: 30px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
            justify-content: space-between;
        }

        .profile-card {
            padding: 24px;
            border-radius: 26px;
            background: linear-gradient(180deg, rgba(255, 255, 255, 0.88), rgba(255, 247, 237, 0.82));
            border: 1px solid rgba(31, 26, 23, 0.08);
        }

        .avatar {
            width: 78px;
            height: 78px;
            border-radius: 24px;
            display: grid;
            place-items: center;
            color: white;
            font-size: 1.55rem;
            font-weight: 800;
            background: linear-gradient(135deg, #2d6a4f, #d35400 70%);
            box-shadow: 0 18px 32px rgba(44, 25, 10, 0.18);
        }

        .profile-card h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.15rem;
            margin-top: 16px;
        }

        .profile-card p {
            color: var(--muted);
            line-height: 1.75;
            margin: 10px 0 0;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .pill {
            padding: 10px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.75);
            border: 1px solid rgba(31, 26, 23, 0.08);
            color: var(--text);
            font-size: 0.92rem;
            font-weight: 600;
        }

        .section {
            padding: 28px 0;
        }

        .section-card {
            border-radius: 30px;
            padding: clamp(24px, 3vw, 34px);
        }

        .section-heading {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            align-items: end;
            margin-bottom: 20px;
        }

        .section-heading p {
            color: var(--muted);
            margin: 10px 0 0;
            max-width: 58ch;
            line-height: 1.7;
        }

        .grid-3 {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .feature,
        .project,
        .timeline-item,
        .contact-card {
            border-radius: 24px;
            padding: 22px;
            background: rgba(255, 255, 255, 0.74);
            border: 1px solid rgba(31, 26, 23, 0.08);
        }

        .feature h3,
        .project h3,
        .contact-card h3 {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.08rem;
            margin-bottom: 10px;
        }

        .feature p,
        .project p,
        .contact-card p,
        .timeline-item p {
            color: var(--muted);
            line-height: 1.7;
            margin: 0;
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, rgba(211, 84, 0, 0.15), rgba(15, 118, 110, 0.15));
            margin-bottom: 16px;
            font-size: 1.25rem;
        }

        .project-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        .project {
            min-height: 220px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
        }

        .project::after {
            content: '';
            position: absolute;
            inset: auto -60px -60px auto;
            width: 170px;
            height: 170px;
            border-radius: 999px;
            background: radial-gradient(circle, rgba(211, 84, 0, 0.12), transparent 65%);
        }

        .tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-top: 16px;
        }

        .tag {
            padding: 8px 12px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.82);
            border: 1px solid rgba(31, 26, 23, 0.08);
            color: var(--muted);
            font-size: 0.85rem;
            font-weight: 600;
        }

        .timeline {
            display: grid;
            gap: 14px;
        }

        .timeline-item {
            display: flex;
            gap: 14px;
            align-items: start;
        }

        .timeline-dot {
            width: 14px;
            height: 14px;
            margin-top: 8px;
            border-radius: 999px;
            background: linear-gradient(135deg, var(--accent), #ffb36b);
            box-shadow: 0 0 0 7px rgba(211, 84, 0, 0.12);
            flex: 0 0 auto;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .contact-card {
            min-height: 100%;
        }

        .contact-list {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 16px;
            border-radius: 18px;
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(31, 26, 23, 0.08);
        }

        .contact-item span {
            color: var(--muted);
            font-size: 0.95rem;
        }

        .footer {
            padding: 24px 0 36px;
            color: rgba(108, 98, 91, 0.95);
            text-align: center;
            font-size: 0.94rem;
        }

        .reveal {
            animation: rise 900ms ease both;
        }

        .reveal.delay-1 {
            animation-delay: 100ms;
        }

        .reveal.delay-2 {
            animation-delay: 220ms;
        }

        .reveal.delay-3 {
            animation-delay: 340ms;
        }

        @keyframes rise {
            from {
                opacity: 0;
                transform: translateY(18px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 960px) {
            .hero-grid,
            .grid-3,
            .project-grid,
            .contact-grid {
                grid-template-columns: 1fr;
            }

            .section-heading,
            .nav-inner {
                flex-direction: column;
                align-items: start;
            }

            .nav-links {
                width: 100%;
                justify-content: flex-start;
            }

            h1 {
                max-width: 100%;
            }

            .hero-meta {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .container {
                width: min(100% - 20px, 1120px);
            }

            .hero {
                padding-top: 24px;
            }

            .hero-card,
            .side-card,
            .section-card {
                border-radius: 24px;
            }

            .nav-inner {
                padding: 12px;
            }

            h1 {
                font-size: clamp(2.6rem, 17vw, 4rem);
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="noise"></div>

        <header class="nav">
            <div class="container nav-inner reveal">
                <a class="brand" href="#home">
                    <span class="brand-mark">IA</span>
                    <span>Immy Apriadi</span>
                </a>
                <nav class="nav-links" aria-label="Navigasi utama">
                    <a href="#about">Tentang</a>
                    <a href="#projects">Project</a>
                    <a href="#process">Proses</a>
                    <a href="#contact">Kontak</a>
                </nav>
            </div>
        </header>

        <main id="home">
            <section class="hero">
                <div class="container hero-grid">
                    <article class="hero-card reveal delay-1">
                        <span class="eyebrow"><span class="eyebrow-dot"></span> Available for freelance dan full-time role</span>
                        <h1>Membangun portofolio yang terasa premium.</h1>
                        <p>
                            Saya Immy Apriadi, seorang kreator web yang fokus pada landing page, UI yang rapi, dan pengalaman pengguna yang sederhana tapi kuat. Halaman ini saya rancang sebagai contoh portofolio personal yang siap dipakai atau diubah sesuai identitas Anda.
                        </p>
                        <div class="hero-actions">
                            <a class="btn btn-primary" href="#projects">Lihat Project</a>
                            <a class="btn btn-secondary" href="#contact">Hubungi Saya</a>
                        </div>

                        <div class="hero-meta">
                            <div class="meta-box">
                                <strong>05+</strong>
                                <span>Tahun eksplor UI dan front-end</span>
                            </div>
                            <div class="meta-box">
                                <strong>18</strong>
                                <span>Project landing page, company profile, dan dashboard</span>
                            </div>
                            <div class="meta-box">
                                <strong>98%</strong>
                                <span>Fokus pada detail, performa, dan tampilan responsif</span>
                            </div>
                        </div>
                    </article>

                    <aside class="side-card reveal delay-2">
                        <div class="profile-card">
                            <div class="avatar">IA</div>
                            <h2>Frontend Developer & UI Builder</h2>
                            <p>
                                Spesialis dalam membangun tampilan yang modern, elegan, dan mudah dinavigasi. Cocok untuk personal branding, profil usaha, atau showcase karya.
                            </p>
                        </div>

                        <div>
                            <p class="display" style="font-size: 1.4rem; margin-bottom: 12px;">Tech Stack</p>
                            <div class="skill-list">
                                <span class="pill">Laravel</span>
                                <span class="pill">Tailwind</span>
                                <span class="pill">Blade</span>
                                <span class="pill">JavaScript</span>
                                <span class="pill">Figma</span>
                                <span class="pill">Responsive UI</span>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>

            <section class="section" id="about">
                <div class="container section-card reveal delay-1">
                    <div class="section-heading">
                        <div>
                            <span class="eyebrow"><span class="eyebrow-dot"></span> Tentang Saya</span>
                            <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-top: 14px;">Desain yang bersih, pesan yang jelas, dan struktur yang mudah dijelajahi.</h2>
                        </div>
                        <p>
                            Saya suka membangun tampilan yang tidak hanya enak dilihat, tetapi juga terasa cepat, terarah, dan punya karakter visual yang kuat.
                        </p>
                    </div>

                    <div class="grid-3">
                        <div class="feature">
                            <div class="feature-icon">✦</div>
                            <h3>Brand Presence</h3>
                            <p>Hero section yang langsung menyampaikan siapa Anda, apa yang Anda kerjakan, dan kenapa orang perlu lanjut scroll.</p>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">▣</div>
                            <h3>Responsive System</h3>
                            <p>Layout fleksibel yang tetap nyaman dibaca di layar kecil, tablet, maupun desktop lebar.</p>
                        </div>
                        <div class="feature">
                            <div class="feature-icon">◌</div>
                            <h3>Clean Conversion</h3>
                            <p>Call to action yang jelas untuk memudahkan pengunjung menghubungi, melihat karya, atau lanjut ke profil Anda.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section" id="projects">
                <div class="container section-card reveal delay-2">
                    <div class="section-heading">
                        <div>
                            <span class="eyebrow"><span class="eyebrow-dot"></span> Selected Works</span>
                            <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-top: 14px;">Beberapa contoh project yang bisa ditampilkan di portofolio.</h2>
                        </div>
                        <p>
                            Bagian ini bisa Anda ganti dengan studi kasus asli, link demo, atau hasil kerja terbaik yang ingin dipamerkan.
                        </p>
                    </div>

                    <div class="project-grid">
                        <article class="project">
                            <div>
                                <span class="eyebrow" style="background: rgba(255,255,255,.66);">Website Profile</span>
                                <h3 style="font-size: 1.6rem; margin-top: 14px;">Cahaya Studio</h3>
                                <p>Landing page minimalis untuk studio kreatif dengan fokus pada storytelling dan CTA yang kuat.</p>
                            </div>
                            <div class="tags">
                                <span class="tag">Laravel</span>
                                <span class="tag">Blade</span>
                                <span class="tag">Animation</span>
                            </div>
                        </article>

                        <article class="project">
                            <div>
                                <span class="eyebrow" style="background: rgba(255,255,255,.66);">E-commerce</span>
                                <h3 style="font-size: 1.6rem; margin-top: 14px;">Nusa Market</h3>
                                <p>Halaman promosi produk dengan tampilan premium, card yang rapi, dan struktur informasi yang cepat dipahami.</p>
                            </div>
                            <div class="tags">
                                <span class="tag">Tailwind</span>
                                <span class="tag">Conversion</span>
                                <span class="tag">Responsive</span>
                            </div>
                        </article>

                        <article class="project">
                            <div>
                                <span class="eyebrow" style="background: rgba(255,255,255,.66);">Personal Brand</span>
                                <h3 style="font-size: 1.6rem; margin-top: 14px;">Ruang Belajar</h3>
                                <p>Portfolio edukasi untuk menampilkan artikel, kelas, dan konten pembelajaran dalam satu halaman yang rapi.</p>
                            </div>
                            <div class="tags">
                                <span class="tag">Content</span>
                                <span class="tag">SEO</span>
                                <span class="tag">UI Kit</span>
                            </div>
                        </article>

                        <article class="project">
                            <div>
                                <span class="eyebrow" style="background: rgba(255,255,255,.66);">Company Profile</span>
                                <h3 style="font-size: 1.6rem; margin-top: 14px;">Sagara Digital</h3>
                                <p>Website perusahaan dengan tampilan profesional untuk memperkenalkan layanan, tim, dan proses kerja.</p>
                            </div>
                            <div class="tags">
                                <span class="tag">Design System</span>
                                <span class="tag">Layout</span>
                                <span class="tag">Branding</span>
                            </div>
                        </article>
                    </div>
                </div>
            </section>

            <section class="section" id="process">
                <div class="container section-card reveal delay-3">
                    <div class="section-heading">
                        <div>
                            <span class="eyebrow"><span class="eyebrow-dot"></span> Process</span>
                            <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-top: 14px;">Alur kerja yang sederhana dan fokus pada hasil.</h2>
                        </div>
                        <p>
                            Mulai dari memahami kebutuhan, menyusun struktur, hingga polishing visual supaya hasil akhirnya terasa matang.
                        </p>
                    </div>

                    <div class="timeline">
                        <div class="timeline-item">
                            <span class="timeline-dot"></span>
                            <div>
                                <h3 style="font-family: 'Plus Jakarta Sans', sans-serif; margin: 0 0 6px;">01. Discovery</h3>
                                <p>Menentukan tujuan halaman, audiens, dan pesan utama yang ingin disampaikan.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-dot"></span>
                            <div>
                                <h3 style="font-family: 'Plus Jakarta Sans', sans-serif; margin: 0 0 6px;">02. Structure</h3>
                                <p>Menyusun urutan section agar alur scroll terasa logis dan mudah diikuti.</p>
                            </div>
                        </div>
                        <div class="timeline-item">
                            <span class="timeline-dot"></span>
                            <div>
                                <h3 style="font-family: 'Plus Jakarta Sans', sans-serif; margin: 0 0 6px;">03. Polish</h3>
                                <p>Menambahkan detail visual, spacing, dan transisi halus supaya terasa premium.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section" id="contact">
                <div class="container contact-grid reveal delay-1">
                    <article class="contact-card">
                        <span class="eyebrow"><span class="eyebrow-dot"></span> Contact</span>
                        <h2 style="font-size: clamp(2rem, 4vw, 3rem); margin-top: 14px;">Siap dipakai sebagai halaman utama personal branding Anda.</h2>
                        <p style="margin-top: 14px;">
                            Anda bisa mengganti nama, foto, daftar project, dan link kontak sesuai kebutuhan. Layout ini sengaja dibuat fleksibel supaya mudah diadaptasi.
                        </p>
                        <div class="hero-actions" style="margin-top: 22px;">
                            <a class="btn btn-primary" href="mailto:halo@example.com">Kirim Email</a>
                            <a class="btn btn-secondary" href="#home">Kembali ke atas</a>
                        </div>
                    </article>

                    <article class="contact-card">
                        <h3 style="font-size: 1.3rem; margin-top: 0;">Detail Kontak</h3>
                        <div class="contact-list">
                            <div class="contact-item">
                                <strong>Email</strong>
                                <span>halo@example.com</span>
                            </div>
                            <div class="contact-item">
                                <strong>Location</strong>
                                <span>Indonesia</span>
                            </div>
                            <div class="contact-item">
                                <strong>Available</strong>
                                <span>Freelance / Full-time</span>
                            </div>
                        </div>
                    </article>
                </div>
            </section>
        </main>

        <footer class="footer">
            <div class="container">
                Designed with care for a personal portfolio landing page.
            </div>
        </footer>
    </div>
</body>
</html>
