<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferju Prihamdani - Portfolio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #7c3aed;
            --accent-color: #0891b2;
            --bg-dark: #0f172a;
            --bg-card: rgba(30, 41, 59, 0.95);
            --text-light: #f1f5f9;
            --text-muted: #94a3b8;
            --border-color: #334155;
            --success-color: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg-dark);
            color: var(--text-light);
            line-height: 1.6;
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 5px;
        }

        /* Background Pattern */
        .bg-pattern {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(37, 99, 235, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(37, 99, 235, 0.05) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -1;
        }

        /* Navigation */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(15, 23, 42, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
        }

        .nav-logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-link {
            color: var(--text-muted);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: var(--primary-color);
            transition: width 0.3s ease;
        }

        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary-color);
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 4px;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: var(--text-light);
            transition: all 0.3s ease;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 100px 2rem 2rem;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .hero-content h1 {
            font-size: clamp(2.5rem, 6vw, 4rem);
            font-weight: 800;
            margin-bottom: 1rem;
            line-height: 1.2;
            opacity: 0;
            animation: fadeInUp 0.8s ease forwards;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: var(--text-muted);
            margin-bottom: 2rem;
            max-width: 600px;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.2s forwards;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            opacity: 0;
            animation: fadeInUp 0.8s ease 0.4s forwards;
        }

        .btn {
            padding: 0.875rem 1.75rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-light);
            border: 2px solid var(--border-color);
        }

        .btn-secondary:hover {
            border-color: var(--primary-color);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        /* Profile Card */
        .profile-card {
            background: var(--bg-card);
            border-radius: 16px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            text-align: center;
            opacity: 0;
            animation: fadeInRight 0.8s ease 0.3s forwards;
            transition: all 0.3s ease;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(37, 99, 235, 0.2);
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            border: 4px solid var(--primary-color);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .profile-image:hover {
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(37, 99, 235, 0.5);
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .profile-image:hover img {
            transform: scale(1.1);
        }

        .profile-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border-color);
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-color);
            display: block;
        }

        .stat-label {
            font-size: 0.75rem;
            color: var(--text-muted);
            text-transform: uppercase;
        }

        /* Section */
        .section {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto;
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .section-subtitle {
            color: var(--text-muted);
            font-size: 1.1rem;
        }

        /* About Section */
        .about-content {
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.1rem;
            line-height: 1.8;
            color: var(--text-muted);
        }

        .about-content p {
            margin-bottom: 1.5rem;
        }

        .highlight {
            color: var(--primary-color);
            font-weight: 600;
        }

        /* Stats Section */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .stat-box {
            background: var(--bg-card);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-box:hover {
            transform: translateY(-10px);
            border-color: var(--primary-color);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .stat-box i {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .stat-box h3 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-box p {
            color: var(--text-muted);
        }

        /* Skills Grid */
        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .skill-card {
            background: var(--bg-card);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .skill-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 40px rgba(37, 99, 235, 0.2);
        }

        .skill-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .skill-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            transition: all 0.3s ease;
        }

        .skill-card:hover .skill-icon {
            transform: rotate(360deg);
        }

        .skill-title {
            font-size: 1.25rem;
            font-weight: 600;
        }

        .skill-list {
            list-style: none;
        }

        .skill-item {
            padding: 0.75rem 0;
            color: var(--text-muted);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .skill-item:hover {
            transform: translateX(10px);
            color: var(--text-light);
        }

        .skill-item i {
            color: var(--success-color);
            font-size: 0.875rem;
        }

        /* Projects Section */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: var(--bg-card);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
        }

        .project-card:hover {
            transform: translateY(-15px);
            border-color: var(--primary-color);
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.3);
        }

        .project-image {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .project-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.2);
            transition: left 0.5s ease;
        }

        .project-card:hover .project-image::before {
            left: 100%;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .project-desc {
            color: var(--text-muted);
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .project-tech {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tech-tag {
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary-color);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            border: 1px solid rgba(37, 99, 235, 0.3);
        }

        .project-links {
            display: flex;
            gap: 1rem;
        }

        .project-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .project-link:hover {
            color: var(--secondary-color);
            transform: translateX(5px);
        }

        /* Timeline */
        .timeline {
            position: relative;
            padding-left: 2rem;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 2px;
            background: linear-gradient(to bottom, var(--primary-color), var(--secondary-color));
        }

        .timeline-item {
            position: relative;
            margin-bottom: 2.5rem;
            background: var(--bg-card);
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid var(--border-color);
            margin-left: 2rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .timeline-item:hover {
            border-color: var(--primary-color);
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -2.5rem;
            top: 1.5rem;
            width: 12px;
            height: 12px;
            background: var(--primary-color);
            border-radius: 50%;
            border: 3px solid var(--bg-dark);
            transition: all 0.3s ease;
        }

        .timeline-item:hover::before {
            transform: scale(1.5);
            box-shadow: 0 0 20px var(--primary-color);
        }

        .timeline-date {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .timeline-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .timeline-org {
            color: var(--secondary-color);
            font-weight: 500;
            margin-bottom: 0.75rem;
        }

        .timeline-desc {
            color: var(--text-muted);
            line-height: 1.6;
        }

        /* Certifications Grid */
        .cert-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .cert-card {
            background: var(--bg-card);
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .cert-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.1), transparent);
            transition: left 0.5s ease;
        }

        .cert-card:hover::before {
            left: 100%;
        }

        .cert-card:hover {
            border-color: var(--success-color);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 40px rgba(16, 185, 129, 0.2);
        }

        .cert-icon {
            width: 60px;
            height: 60px;
            background: var(--success-color);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .cert-card:hover .cert-icon {
            transform: rotateY(360deg);
        }

        .cert-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .cert-org {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .cert-date {
            color: var(--success-color);
            font-size: 0.85rem;
            font-weight: 500;
        }

        /* Contact Section */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            max-width: 900px;
            margin: 0 auto;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1.5rem;
            background: var(--bg-card);
            border-radius: 12px;
            border: 1px solid var(--border-color);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .contact-item:hover {
            border-color: var(--primary-color);
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.2);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: var(--primary-color);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .contact-item:hover .contact-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .contact-details h4 {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .contact-details p,
        .contact-details a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
        }

        .contact-details a:hover {
            color: var(--primary-color);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 2rem;
            color: var(--text-muted);
            border-top: 1px solid var(--border-color);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: 70px;
                left: -100%;
                width: 100%;
                height: calc(100vh - 70px);
                background: rgba(15, 23, 42, 0.98);
                flex-direction: column;
                padding: 2rem;
                transition: left 0.3s ease;
            }

            .nav-menu.active {
                left: 0;
            }

            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
                text-align: center;
            }

            .hero-subtitle {
                margin: 0 auto 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .profile-card {
                order: -1;
            }

            .timeline {
                padding-left: 1rem;
            }

            .timeline-item {
                margin-left: 1rem;
            }

            .timeline-item::before {
                left: -1.5rem;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>

    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">FP</div>
            <ul class="nav-menu">
                <li><a href="#hero" class="nav-link active">Beranda</a></li>
                <li><a href="#about" class="nav-link">Tentang</a></li>
                <li><a href="#skills" class="nav-link">Keahlian</a></li>
                <li><a href="#projects" class="nav-link">Proyek</a></li>
                <li><a href="#experience" class="nav-link">Pengalaman & Sertifikasi</a></li>
                <li><a href="#contact" class="nav-link">Kontak</a></li>
            </ul>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="hero-container">
            <div class="hero-content">
                <h1>
                    Hai, Saya <span class="gradient-text">Ferju Prihamdani</span>
                </h1>
                <p class="hero-subtitle">
                    Lulusan S1 Pendidikan Informatika dengan pemahaman dalam pengembangan aplikasi web dan mobile menggunakan Laravel dan Flutter
                </p>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i>
                        Hubungi Saya
                    </a>
                    <a href="https://github.com/asmoday21" target="_blank" class="btn btn-secondary">
                        <i class="fab fa-github"></i>
                        GitHub
                    </a>
                    <a href="https://www.linkedin.com/in/ferju-prihamdani-886628221" target="_blank" class="btn btn-secondary">
                        <i class="fab fa-linkedin"></i>
                        LinkedIn
                    </a>
                </div>
            </div>
            <div>
                <div class="profile-card">
                    <div class="profile-image">
                        <img src="{{asset('img/Ferju Prihamdani_21100052.png')}}" alt="Ferju Prihamdani">
                    </div>
                    <h3>Ferju Prihamdani</h3>
                    <p style="color: var(--primary-color); margin-bottom: 0.5rem;">Fresh Graduate</p>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Pendidikan Informatika</p>
                    <div class="profile-stats">
                        <div class="stat">
                            <span class="stat-number">S1</span>
                            <span class="stat-label">Degree</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">2025</span>
                            <span class="stat-label">Graduate</span>
                        </div>
                        <div class="stat">
                            <span class="stat-number">3+</span>
                            <span class="stat-label">Projects</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="section-header">
            <h2 class="section-title">Tentang Saya</h2>
            <p class="section-subtitle">Profil dan Latar Belakang</p>
        </div>
        <div class="about-content">
            <p>
                Saya adalah lulusan <span class="highlight">S1 Pendidikan Informatika</span> dari Universitas PGRI Sumatera Barat 
                dengan pemahaman dasar dalam pengembangan aplikasi web dan mobile menggunakan <span class="highlight">Laravel dan Flutter</span>.
            </p>
            <p>
                Memiliki pengalaman dalam organisasi dan kepanitiaan, serta aktif dalam kegiatan akademik dan non-akademik. 
                Terbiasa bekerja dalam tim, berpikir kritis, serta memiliki keterampilan <span class="highlight">desain grafis dan dokumentasi</span>.
            </p>
            <p>
                Saya juga memiliki kemampuan dalam <span class="highlight">komunikasi, kepemimpinan, dan public speaking</span> 
                yang telah diasah melalui berbagai kegiatan organisasi dan kepanitiaan selama masa kuliah.
            </p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-box">
                <i class="fas fa-graduation-cap"></i>
                <h3>S1</h3>
                <p>Pendidikan Informatika</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-users"></i>
                <h3>3+</h3>
                <p>Pengalaman Organisasi</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-certificate"></i>
                <h3>5+</h3>
                <p>Sertifikasi & Prestasi</p>
            </div>
            <div class="stat-box">
                <i class="fas fa-code"></i>
                <h3>10+</h3>
                <p>Technology Skills</p>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section">
        <div class="section-header">
            <h2 class="section-title">Keahlian</h2>
            <p class="section-subtitle">Teknologi dan Kemampuan yang Dikuasai</p>
        </div>
        <div class="skills-grid">
            <div class="skill-card">
                <div class="skill-header">
                    <div class="skill-icon">
                        <i class="fas fa-code"></i>
                    </div>
                    <div>
                        <h3 class="skill-title">Backend Development</h3>
                    </div>
                </div>
                <ul class="skill-list">
                    <li class="skill-item"><i class="fas fa-check-circle"></i> PHP & Laravel</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Database Design</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> API Development</li>
                </ul>
            </div>
            
            <div class="skill-card">
                <div class="skill-header">
                    <div class="skill-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <div>
                        <h3 class="skill-title">Mobile Development</h3>
                    </div>
                </div>
                <ul class="skill-list">
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Flutter & Dart</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Cross-Platform Apps</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Mobile UI/UX</li>
                </ul>
            </div>
            
            <div class="skill-card">
                <div class="skill-header">
                    <div class="skill-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div>
                        <h3 class="skill-title">Frontend & Design</h3>
                    </div>
                </div>
                <ul class="skill-list">
                    <li class="skill-item"><i class="fas fa-check-circle"></i> HTML, CSS, JavaScript</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Canva & Design Tools</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Microsoft Office</li>
                </ul>
            </div>
            
            <div class="skill-card">
                <div class="skill-header">
                    <div class="skill-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div>
                        <h3 class="skill-title">Soft Skills</h3>
                    </div>
                </div>
                <ul class="skill-list">
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Teamwork</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Public Speaking</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Leadership</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Problem Solving</li>
                    <li class="skill-item"><i class="fas fa-check-circle"></i> Adaptability</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="section">
        <div class="section-header">
            <h2 class="section-title">Projects Portfolio</h2>
            <p class="section-subtitle">Beberapa project yang telah saya kembangkan</p>
        </div>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Media Pembelajaran</h3>
                    <p class="project-desc">
                        Dilengkapi dengan fitur interaktif seperti kuis, visualisasi gambar 3D, serta video pembelajaran pendukung.
                    </p>
                    <div class="project-tech">
                        <span class="tech-tag">Laravel</span>
                        <span class="tech-tag">MySQL</span>
                        <span class="tech-tag">Bootstrap</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                        <a href="#" class="project-link"><i class="fab fa-github"></i> Source Code</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="project-content">
                    <h3 class="project-title">Mobile E-Learning App</h3>
                    <p class="project-desc">
                        Aplikasi mobile untuk pembelajaran online dengan fitur video interaktif, 
                        quiz interaktif, dan tracking progress siswa.
                    </p>
                    <div class="project-tech">
                        <span class="tech-tag">Flutter</span>
                        <span class="tech-tag">Firebase</span>
                        <span class="tech-tag">Dart</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> View Project</a>
                        <a href="#" class="project-link"><i class="fab fa-github"></i> Repository</a>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-image">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="project-content">
                    <h3 class="project-title">E-Commerce Platform</h3>
                    <p class="project-desc">
                        Platform e-commerce lengkap dengan payment gateway, inventory management, 
                        dan sistem order tracking real-time.
                    </p>
                    <div class="project-tech">
                        <span class="tech-tag">Laravel</span>
                        <span class="tech-tag">Vue.js</span>
                        <span class="tech-tag">API</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="project-link"><i class="fas fa-external-link-alt"></i> Live Demo</a>
                        <a href="#" class="project-link"><i class="fab fa-github"></i> GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" class="section">
        <div class="section-header">
            <h2 class="section-title">Pengalaman Organisasi</h2>
            <p class="section-subtitle">Kegiatan dan Kepanitiaan</p>
        </div>
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-date">Februari - Maret 2024</div>
                <h3 class="timeline-title">Ketua Divisi Perlengkapan</h3>
                <div class="timeline-org">Panitia POLICE IT</div>
                <p class="timeline-desc">
                    Bertanggung jawab atas pengadaan dan pemeliharaan peralatan acara. Menyusun kebutuhan logistik 
                    dan memastikan kelancaran kegiatan kompetisi IT tingkat nasional.
                </p>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">Agustus 2023 - 2024</div>
                <h3 class="timeline-title">Departemen Teknologi Informasi</h3>
                <div class="timeline-org">Himpunan Mahasiswa Pendidikan Informatika (HIMAFORTIKA)</div>
                <p class="timeline-desc">
                    Mendesain poster untuk kegiatan dan publikasi rutin organisasi. Menjalin komunikasi internal 
                    antar divisi untuk kelancaran kegiatan himpunan.
                </p>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-date">Januari 2023</div>
                <h3 class="timeline-title">Divisi Dokumentasi</h3>
                <div class="timeline-org">Panitia Pameran Desain Grafis</div>
                <p class="timeline-desc">
                    Mengambil foto dan video acara serta membuat konten digital promosi. Mengabadikan karya 
                    peserta dan aktivitas pengunjung pameran.
                </p>
            </div>
        </div>
    </section>

    <!-- Certifications & Achievements -->
    <section id="certifications" class="section">
        <div class="section-header">
            <h2 class="section-title">Sertifikasi & Prestasi</h2>
            <p class="section-subtitle">Pelatihan dan Pencapaian</p>
        </div>
        <div class="cert-grid">
            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-certificate"></i>
                </div>
                <h3 class="cert-title">MikroTik Certified Network Associate</h3>
                <p class="cert-org">MikroTik SIA</p>
                <p class="cert-date">September 2025 - September 2028 | Skor: 81</p>
            </div>
            
            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-laptop"></i>
                </div>
                <h3 class="cert-title">Pelatihan Keahlian Komputer</h3>
                <p class="cert-org">Universitas PGRI Sumatera Barat</p>
                <p class="cert-date">Agustus 2025</p>
            </div>
            
            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <h3 class="cert-title">Belajar Dasar AI</h3>
                <p class="cert-org">Dicoding Indonesia</p>
                <p class="cert-date">2025</p>
            </div>
            
            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-award"></i>
                </div>
                <h3 class="cert-title">Pertukaran Mahasiswa Merdeka Angkatan 3</h3>
                <p class="cert-org">Institut Teknologi Nasional Bandung</p>
                <p class="cert-date">2023</p>
            </div>
            
            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-trophy"></i>
                </div>
                <h3 class="cert-title">Lomba Literasi Digital Indonesia</h3>
                <p class="cert-org">Poster & Digital Art Competition</p>
                <p class="cert-date">2024</p>
            </div>

            <div class="cert-card">
                <div class="cert-icon">
                    <i class="fas fa-graduation-cap"></i>
                </div>
                <h3 class="cert-title">Maganghub Kemenaker</h3>
                <p class="cert-org">Badan Pusat Statistik RI</p>
                <p class="cert-date">2025</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="section-header">
            <h2 class="section-title">Hubungi Saya</h2>
            <p class="section-subtitle">Mari berkolaborasi untuk project Anda</p>
        </div>
        <div class="contact-grid">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h4>Email</h4>
                    <p><a href="mailto:ferjuprihamdani@gmail.com">ferjuprihamdani@gmail.com</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h4>Telepon</h4>
                    <p><a href="tel:+6282287812915">+62 822-8781-2915</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fab fa-github"></i>
                </div>
                <div class="contact-details">
                    <h4>GitHub</h4>
                    <p><a href="https://github.com/asmoday21" target="_blank">github.com/asmoday21</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fab fa-linkedin"></i>
                </div>
                <div class="contact-details">
                    <h4>LinkedIn</h4>
                    <p><a href="https://www.linkedin.com/in/ferju-prihamdani-886628221" target="_blank">LinkedIn Profile</a></p>
                </div>
            </div>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <h4>Lokasi</h4>
                    <p>Padang, Sumatera Barat</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 Ferju Prihamdani. All rights reserved.</p>
    </footer>

    <script>
        // Mobile menu toggle
        const hamburger = document.querySelector('.hamburger');
        const navMenu = document.querySelector('.nav-menu');
        
        hamburger.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            const spans = hamburger.querySelectorAll('span');
            if (navMenu.classList.contains('active')) {
                spans[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                spans[1].style.opacity = '0';
                spans[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            }
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                const spans = hamburger.querySelectorAll('span');
                spans[0].style.transform = 'none';
                spans[1].style.opacity = '1';
                spans[2].style.transform = 'none';
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Active navigation link
        function setActiveNavLink() {
            const sections = document.querySelectorAll('section');
            const navLinks = document.querySelectorAll('.nav-link');
            
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (window.scrollY >= sectionTop - 100) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === `#${current}`) {
                    link.classList.add('active');
                }
            });
        }

        // Scroll animations
        function animateOnScroll() {
            const sections = document.querySelectorAll('.section');
            sections.forEach(section => {
                const sectionTop = section.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;
                if (sectionTop < windowHeight - 100) {
                    section.classList.add('visible');
                }
            });
        }

        window.addEventListener('scroll', () => {
            setActiveNavLink();
            animateOnScroll();
        });

        window.addEventListener('load', animateOnScroll);

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>