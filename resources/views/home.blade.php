<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferju Prihamdani — Portfolio</title>
    <!-- Favicon / Icon Web (Ganti href dengan lokasi/file icon Anda) -->
    <link rel="icon" type="image/png" href="img/LOGO FERJU.png">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts: Outfit (Heading), Inter (Body), Fira Code (Mono) -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;700;800;900&family=Inter:wght@300;400;500;600&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">
    
    <style>
        /* ==========================================================================
           1. VARIABLE & PALET WARNA (Premium, K3, High-Tech)
           ========================================================================== */
        :root {
            /* Warna Aksen Dinamis */
            --c1: #0ea5e9;         /* Vibrant Sky Blue */
            --c2: #6366f1;         /* Deep Indigo */
            --c3: #10b981;         /* Emerald Green */
            
            /* Latar Belakang - Dark Slate / Midnight */
            --bg: #090e17;         
            --bg2: #111827;        
            
            /* Glassmorphism & Borders */
            --glass-bg: linear-gradient(145deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.4) 100%);
            --glass-border: rgba(255, 255, 255, 0.08);
            --glass-shine: inset 0 1px 1px rgba(255, 255, 255, 0.15);
            
            /* Teks */
            --text: #f8fafc;       
            --muted: #cbd5e1;      
            
            /* Shadows */
            --shadow-card: 0 15px 35px -5px rgba(0,0,0,0.5);
            --glow-primary: 0 0 20px rgba(14, 165, 233, 0.3);
        }

        * { margin:0; padding:0; box-sizing:border-box; }
        html { scroll-behavior:smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: var(--bg); }
        ::-webkit-scrollbar-thumb { background: rgba(14, 165, 233, 0.3); border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--c1); }

        /* ==========================================================================
           2. BACKGROUNDS (Grid & Canvas Particles)
           ========================================================================== */
        /* Grid IT Pattern */
        .cyber-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.02) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
            mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 100%);
        }

        /* Blobs Glow */
        .bg-glow {
            position: fixed; inset: 0; z-index: 0; pointer-events: none;
        }
        .blob {
            position: absolute;
            filter: blur(120px);
            opacity: 0.15;
            border-radius: 50%;
            animation: float-blob 15s infinite alternate ease-in-out;
        }
        .blob-1 { top: -10%; left: -10%; width: 500px; height: 500px; background: var(--c1); }
        .blob-2 { bottom: -10%; right: -10%; width: 600px; height: 600px; background: var(--c2); animation-delay: -5s; }

        @keyframes float-blob {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(50px, 50px) scale(1.2); }
        }

        #bg-canvas {
            position: fixed; inset: 0; z-index: 1; pointer-events: none; opacity: 0.6;
        }

        /* ==========================================================================
           3. NAVBAR
           ========================================================================== */
        .navbar {
            position: fixed; top: 0; width: 100%; z-index: 1000;
            padding: 1.5rem 0;
            transition: all 0.4s ease;
        }
        .navbar.scrolled {
            padding: 1rem 0;
            background: rgba(9, 14, 23, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
        }

        .nav-container {
            max-width: 1200px; margin: 0 auto;
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 2rem;
        }

        .nav-logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.8rem; font-weight: 900;
            text-decoration: none; color: var(--text);
            display: flex; align-items: center; gap: 2px;
        }
        .nav-logo span { color: var(--c1); }

        .nav-menu { display: flex; list-style: none; gap: 2.5rem; }
        .nav-link {
            color: var(--muted); text-decoration: none;
            font-weight: 500; font-size: 0.95rem;
            transition: color 0.3s; position: relative; padding: 0.5rem 0;
        }
        .nav-link::after {
            content: ''; position: absolute; bottom: 0; left: 0;
            width: 0; height: 2px;
            background: linear-gradient(90deg, var(--c1), var(--c2));
            transition: width 0.3s ease; border-radius: 2px;
        }
        .nav-link:hover, .nav-link.active { color: var(--text); }
        .nav-link:hover::after, .nav-link.active::after {
            width: 100%; box-shadow: var(--glow-primary);
        }

        .hamburger { display: none; flex-direction: column; gap: 6px; cursor: pointer; }
        .hamburger span {
            width: 28px; height: 2px; background: var(--text);
            transition: all 0.3s; border-radius: 2px;
        }

        /* ==========================================================================
           4. HERO SECTION
           ========================================================================== */
        .hero-section {
            min-height: 100vh; display: flex; align-items: center;
            padding: 140px 2rem 5rem; position: relative; z-index: 10;
        }

        .hero-container {
            max-width: 1200px; margin: 0 auto;
            display: grid; grid-template-columns: 1.3fr 1fr;
            gap: 3rem; align-items: center; width: 100%;
        }

        .hero-tag {
            display: inline-flex; align-items: center; gap: 0.6rem;
            padding: 0.5rem 1.2rem;
            border: 1px solid rgba(14, 165, 233, 0.3);
            border-radius: 50px;
            background: rgba(14, 165, 233, 0.1);
            font-family: 'Fira Code', monospace; font-size: 0.85rem; color: var(--c1);
            margin-bottom: 2rem; backdrop-filter: blur(5px);
        }
        .hero-tag::before {
            content: ''; width: 8px; height: 8px; border-radius: 50%;
            background: var(--c1); box-shadow: 0 0 10px var(--c1);
            animation: pulse-dot 2s infinite;
        }

        .hero-content h1 {
            font-family: 'Outfit', sans-serif;
            /* Clamp membuat teks membesar dramatis di desktop, namun pas di hp */
            font-size: clamp(2.8rem, 5.5vw, 5.5rem); 
            font-weight: 900; line-height: 1.1;
            margin-bottom: 1rem; letter-spacing: -1.5px;
        }

        .gradient-text {
            background: linear-gradient(110deg, #fff 0%, var(--c1) 50%, var(--c2) 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            display: inline-block;
        }

        .typing-container {
            font-family: 'Fira Code', monospace; font-size: 1.2rem;
            color: var(--muted); margin-bottom: 2rem; height: 1.8rem;
        }
        .typed-text { color: var(--c1); font-weight: 500; }
        .cursor {
            display: inline-block; width: 2px; height: 1.2em;
            background: var(--c1); margin-left: 4px; vertical-align: middle;
            animation: blink 1s infinite;
        }
        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }

        .hero-desc {
            font-size: 1.15rem; color: var(--muted);
            margin-bottom: 2.5rem; max-width: 90%; line-height: 1.7;
        }

        .hero-buttons { display: flex; gap: 1.2rem; flex-wrap: wrap; }

        .btn {
            padding: 1rem 2.2rem; border-radius: 14px;
            font-weight: 600; font-size: 1rem; text-decoration: none;
            display: inline-flex; align-items: center; gap: 0.8rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer; border: none; font-family: 'Inter', sans-serif;
            position: relative; overflow: hidden;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--c1), var(--c2));
            color: #fff; box-shadow: var(--glow-primary);
        }
        .btn-primary:hover {
            transform: translateY(-4px); box-shadow: 0 10px 25px rgba(99, 102, 241, 0.5);
            background: linear-gradient(135deg, #38bdf8, #818cf8);
        }
        .btn-secondary {
            background: rgba(255, 255, 255, 0.03); color: var(--text);
            border: 1px solid var(--glass-border); backdrop-filter: blur(10px);
        }
        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.08); border-color: var(--c1);
            transform: translateY(-4px);
        }

        /* Foto Profil High-Tech */
        .profile-wrapper {
            position: relative; display: flex; justify-content: center; align-items: center;
        }

        /* Cincin Rotasi */
        .ring-1, .ring-2 {
            position: absolute; border-radius: 50%;
            border: 2px solid transparent; pointer-events: none;
        }
        .ring-1 {
            width: 320px; height: 320px;
            border-top-color: var(--c1); border-bottom-color: var(--c2);
            animation: spin 15s linear infinite;
            filter: drop-shadow(0 0 10px var(--c1));
        }
        .ring-2 {
            width: 350px; height: 350px;
            border-left-color: var(--c2); border-right-color: var(--c1);
            animation: spin-reverse 20s linear infinite;
            opacity: 0.5;
        }

        @keyframes spin { 100% { transform: rotate(360deg); } }
        @keyframes spin-reverse { 100% { transform: rotate(-360deg); } }

        .profile-card {
            background: var(--glass-bg); box-shadow: var(--glass-shine), var(--shadow-card);
            border: 1px solid var(--glass-border); border-radius: 50%;
            padding: 10px; position: relative; z-index: 2;
            backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            width: 280px; height: 280px; display: flex; align-items: center; justify-content: center;
            transition: transform 0.5s ease;
        }
        .profile-card:hover { transform: scale(1.05); }

        .profile-image {
            width: 100%; height: 100%; border-radius: 50%; overflow: hidden;
            border: 2px solid rgba(255,255,255,0.1); background: var(--bg2);
        }
        .profile-image img {
            width: 100%; height: 100%; object-fit: cover; object-position: center top;
            transition: transform 0.6s ease;
        }
        .profile-card:hover .profile-image img { transform: scale(1.1); }

        /* ==========================================================================
           5. SECTION GENERAL & GLASS CARDS
           ========================================================================== */
        .section {
            padding: 7rem 2rem; max-width: 1200px; margin: 0 auto;
            position: relative; z-index: 10;
        }

        .section-header { margin-bottom: 4rem; display: flex; flex-direction: column; align-items: flex-start; }
        .section-header.center { align-items: center; text-align: center; }

        .section-eyebrow {
            font-family: 'Fira Code', monospace; font-size: 0.9rem; color: var(--c1);
            margin-bottom: 1rem; display: inline-block;
            padding: 0.4rem 1.2rem; background: rgba(14, 165, 233, 0.1);
            border-radius: 50px; border: 1px solid rgba(14, 165, 233, 0.2);
        }

        .section-title {
            font-family: 'Outfit', sans-serif; font-size: clamp(2.2rem, 4vw, 3.5rem);
            font-weight: 800; line-height: 1.2; letter-spacing: -1px; color: var(--text);
        }

        .glass-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            box-shadow: var(--glass-shine), var(--shadow-card);
            backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
            border-radius: 24px; padding: 2.5rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:hover {
            border-color: rgba(14, 165, 233, 0.4);
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -10px rgba(0,0,0,0.7), var(--glow-primary);
        }

        /* REVEAL ANIMATION */
        .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s ease; }
        .reveal.active { opacity: 1; transform: translateY(0); }

        /* ==========================================================================
           6. ABOUT SECTION
           ========================================================================== */
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; align-items: center; }

        .about-text p { font-size: 1.1rem; color: var(--muted); margin-bottom: 1.5rem; }
        .highlight {
            color: #fff; font-weight: 600;
            background: linear-gradient(120deg, rgba(14, 165, 233, 0.2), rgba(99, 102, 241, 0.2));
            padding: 2px 8px; border-radius: 6px;
        }

        .stats-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; }
        .stat-card { text-align: center; padding: 2rem; }
        .stat-icon { font-size: 2.5rem; background: linear-gradient(135deg, var(--c1), var(--c2)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; margin-bottom: 1rem; }
        .stat-number { font-family: 'Outfit', sans-serif; font-size: 2.8rem; font-weight: 800; color: var(--text); line-height: 1; }
        .stat-label { font-size: 0.95rem; color: var(--muted); font-weight: 500; margin-top: 0.5rem; }

        /* ==========================================================================
           7. SKILLS SECTION
           ========================================================================== */
        .skills-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 2rem; }

        .skill-header { display: flex; align-items: center; gap: 1rem; margin-bottom: 2rem; }
        .skill-header i { font-size: 2rem; color: var(--c2); }
        .skill-header h3 { font-family: 'Outfit', sans-serif; font-size: 1.4rem; font-weight: 700; }

        .skill-badges { display: flex; flex-wrap: wrap; gap: 0.8rem; }
        .skill-badge {
            background: rgba(255, 255, 255, 0.03); border: 1px solid var(--glass-border);
            padding: 0.6rem 1.2rem; border-radius: 50px; font-size: 0.9rem; font-weight: 500;
            color: var(--muted); display: flex; align-items: center; gap: 0.6rem;
            transition: all 0.3s ease;
        }
        .skill-badge:hover {
            background: rgba(14, 165, 233, 0.1); color: var(--text);
            border-color: var(--c1); transform: translateY(-3px) scale(1.05);
        }
        .skill-badge i { color: var(--c1); font-size: 1.1rem; }

        /* ==========================================================================
           8. PROJECTS SECTION
           ========================================================================== */
        .projects-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 2.5rem; }
        
        .project-card { padding: 0; display: flex; flex-direction: column; }
        
        .project-img {
            height: 220px; background: rgba(0,0,0,0.3);
            display: flex; align-items: center; justify-content: center;
            border-bottom: 1px solid var(--glass-border); position: relative; overflow: hidden;
        }
        .project-img::after {
            content:''; position: absolute; inset:0;
            background: linear-gradient(to bottom, transparent, rgba(15,23,42,0.8));
        }
        .project-img i { font-size: 4.5rem; color: rgba(255,255,255,0.1); transition: all 0.5s; z-index: 2; }
        .project-card:hover .project-img i { color: var(--c1); transform: scale(1.1); filter: drop-shadow(0 0 15px var(--c1)); }

        .project-content { padding: 2rem; flex: 1; display: flex; flex-direction: column; }
        .project-num { font-family: 'Fira Code', monospace; color: var(--c1); margin-bottom: 0.8rem; font-size: 0.9rem; }
        .project-title { font-family: 'Outfit', sans-serif; font-size: 1.5rem; font-weight: 700; margin-bottom: 1rem; }
        .project-desc { color: var(--muted); font-size: 1rem; margin-bottom: 1.5rem; flex: 1; }
        
        .tech-stack { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-bottom: 2rem; }
        .tech-tag {
            font-size: 0.8rem; font-weight: 600; padding: 0.4rem 0.8rem;
            background: rgba(255,255,255,0.05); color: var(--text); border-radius: 8px;
        }

        .project-links { display: flex; gap: 1rem; }
        .project-links a {
            flex: 1; text-align: center; padding: 0.8rem; border-radius: 12px;
            font-weight: 600; font-size: 0.95rem; text-decoration: none; transition: all 0.3s;
        }
        .link-live { background: rgba(14, 165, 233, 0.15); color: var(--c1); border: 1px solid rgba(14, 165, 233, 0.3); }
        .link-live:hover { background: var(--c1); color: #fff; }
        .link-github { background: rgba(255,255,255,0.03); color: var(--text); border: 1px solid var(--glass-border); }
        .link-github:hover { background: rgba(255,255,255,0.1); }

        /* ==========================================================================
           9. TIMELINE (EXPERIENCE)
           ========================================================================== */
        .timeline-container { position: relative; max-width: 900px; margin: 0 auto; }
        .timeline-track {
            position: absolute; left: 24px; top: 0; bottom: 0; width: 2px;
            background: var(--glass-border);
        }
        .timeline-progress {
            position: absolute; top: 0; left: 0; width: 100%;
            background: linear-gradient(to bottom, var(--c1), var(--c2)); transition: height 0.3s ease;
        }

        .timeline-item { position: relative; padding-left: 70px; margin-bottom: 3.5rem; }
        .timeline-item:last-child { margin-bottom: 0; }

        .timeline-dot {
            position: absolute; left: 13px; top: 8px; width: 24px; height: 24px;
            border-radius: 50%; background: var(--bg); border: 4px solid var(--c1);
            z-index: 2; transition: all 0.3s; box-shadow: var(--glow-primary);
        }
        .timeline-item:hover .timeline-dot { transform: scale(1.3); background: var(--c1); }

        .timeline-date {
            display: inline-block; padding: 0.4rem 1.2rem;
            background: rgba(14, 165, 233, 0.1); color: var(--c1); border: 1px solid rgba(14,165,233,0.2);
            border-radius: 50px; font-size: 0.9rem; font-weight: 600; margin-bottom: 1.2rem;
        }
        .timeline-title { font-family: 'Outfit', sans-serif; font-size: 1.4rem; font-weight: 700; margin-bottom: 0.5rem; }
        .timeline-org { color: var(--muted); font-size: 1.05rem; font-weight: 500; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.6rem; }
        .timeline-org i { color: var(--c1); }

        /* ==========================================================================
           10. CERTIFICATIONS
           ========================================================================== */
        .cert-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; }
        .cert-card { display: flex; align-items: flex-start; gap: 1.5rem; padding: 2rem; }
        
        .cert-icon {
            width: 60px; height: 60px; flex-shrink: 0;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.2), rgba(16, 185, 129, 0.05));
            color: var(--c3); border-radius: 16px; border: 1px solid rgba(16,185,129,0.2);
            display: flex; align-items: center; justify-content: center; font-size: 1.8rem;
        }

        .cert-info h3 { font-family: 'Outfit', sans-serif; font-size: 1.15rem; font-weight: 700; margin-bottom: 0.5rem; line-height: 1.4; }
        .cert-info p { color: var(--muted); font-size: 0.95rem; margin-bottom: 0.5rem; }
        .cert-valid { font-size: 0.85rem; font-weight: 600; color: var(--c3); }

        .cert-link {
            display: inline-flex; align-items: center; gap: 0.6rem; margin-top: 1rem;
            padding: 0.6rem 1.2rem; background: rgba(255,255,255,0.05); color: var(--text);
            border-radius: 8px; font-size: 0.9rem; font-weight: 600; text-decoration: none;
            transition: all 0.3s; border: 1px solid var(--glass-border);
        }
        .cert-link:hover { background: var(--c3); color: #000; border-color: var(--c3); }

        /* ==========================================================================
           11. MODAL PREVIEW
           ========================================================================== */
        .modal {
            display: none; position: fixed; z-index: 2000; inset: 0;
            background: rgba(9, 14, 23, 0.9); backdrop-filter: blur(15px); -webkit-backdrop-filter: blur(15px);
            align-items: center; justify-content: center; opacity: 0; transition: opacity 0.3s ease;
        }
        .modal.show { display: flex; opacity: 1; }
        .modal-content {
            background: var(--bg2); border: 1px solid rgba(14, 165, 233, 0.3); border-radius: 24px;
            width: 95%; max-width: 1000px; height: 85vh; display: flex; flex-direction: column;
            transform: translateY(30px) scale(0.95); transition: transform 0.4s cubic-bezier(0.4,0,0.2,1);
            box-shadow: 0 30px 60px rgba(0,0,0,0.8), var(--glow-primary); overflow: hidden;
        }
        .modal.show .modal-content { transform: none; }
        
        .modal-top-bar {
            padding: 1.2rem 1.5rem; border-bottom: 1px solid var(--glass-border);
            display: flex; align-items: center; justify-content: space-between; background: rgba(255,255,255,0.02);
        }
        .modal-top-bar span { font-family: 'Outfit', sans-serif; font-size: 1.1rem; font-weight: 600; }
        .close-modal {
            color: var(--muted); cursor: pointer; background: rgba(255,255,255,0.05); border: 1px solid var(--glass-border);
            width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
            transition: all 0.3s; font-size: 1.2rem;
        }
        .close-modal:hover { background: #ef4444; color: #fff; border-color: #ef4444; transform: rotate(90deg); }
        
        #modal-body { flex: 1; overflow: hidden; padding: 1rem; display: flex; align-items: center; justify-content: center; background: #000; }
        #modal-body img, #modal-body iframe { width: 100%; height: 100%; object-fit: contain; border-radius: 12px; border: none; }

        /* ==========================================================================
           12. KONTAK & FOOTER
           ========================================================================== */
        .contact-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; }
        .contact-card { text-align: center; padding: 3rem 2rem; text-decoration: none; color: inherit; }
        .contact-card i { font-size: 2.5rem; color: var(--c1); margin-bottom: 1.2rem; display: block; transition: transform 0.3s; }
        .contact-card:hover i { transform: scale(1.1) translateY(-5px); }
        .contact-card h4 { font-family: 'Outfit', sans-serif; font-size: 1.2rem; font-weight: 700; margin-bottom: 0.5rem; }
        .contact-card p { color: var(--muted); font-size: 0.95rem; }

        footer { border-top: 1px solid var(--glass-border); padding: 3rem 2rem; background: rgba(0,0,0,0.2); position: relative; z-index: 10; text-align: center; }
        .footer-logo { font-family: 'Outfit', sans-serif; font-weight: 900; font-size: 1.8rem; margin-bottom: 1rem; }
        .footer-logo span { color: var(--c1); }
        .footer-copy { color: var(--muted); font-size: 0.95rem; }

        /* ==========================================================================
           13. MEDIA QUERIES (Sangat Responsif)
           ========================================================================== */
        @media(max-width: 992px) {
            .hero-container { grid-template-columns: 1fr; text-align: center; gap: 3rem; }
            .hero-desc { margin: 0 auto 2.5rem auto; }
            .hero-buttons { justify-content: center; }
            .profile-wrapper { order: -1; max-width: 280px; margin: 0 auto; }
            .ring-1 { width: 300px; height: 300px; }
            .ring-2 { width: 330px; height: 330px; }
            .profile-card { width: 260px; height: 260px; }
            .about-grid { grid-template-columns: 1fr; gap: 3rem; }
            .section-header:not(.center) { align-items: center; text-align: center; }
        }

        @media(max-width: 768px) {
            .section { padding: 5rem 1.5rem; }
            .hero-section { padding-top: 120px; }
            .hamburger { display: flex; }
            .nav-menu {
                position: fixed; top: 70px; left: -100%; width: 100%; height: 100vh;
                background: rgba(9, 14, 23, 0.98); backdrop-filter: blur(20px);
                flex-direction: column; align-items: center; padding-top: 4rem; gap: 2.5rem;
                transition: 0.4s cubic-bezier(0.4,0,0.2,1); border-top: 1px solid var(--glass-border);
            }
            .nav-menu.active { left: 0; }
            .hero-content h1 { font-size: 2.8rem; }
            .timeline-track { left: 24px; }
            .timeline-dot { left: 13px; }
            .timeline-item { padding-left: 60px; }
        }
    </style>
</head>
<body>

    <!-- ANIMATED BACKGROUNDS -->
    <div class="cyber-grid"></div>
    <div class="bg-glow">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>
    <canvas id="bg-canvas"></canvas>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="nav-logo">FP<span>.</span></a>
            <ul class="nav-menu">
                <li><a href="#beranda" class="nav-link active">Beranda</a></li>
                <li><a href="#tentang" class="nav-link">Tentang</a></li>
                <li><a href="#keahlian" class="nav-link">Keahlian</a></li>
                <li><a href="#proyek" class="nav-link">Proyek</a></li>
                <li><a href="#pengalaman" class="nav-link">Pengalaman</a></li>
                <li><a href="#kontak" class="nav-link">Kontak</a></li>
            </ul>
            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section id="beranda" class="hero-section">
        <div class="hero-container">
            <div class="hero-content reveal">
                <div class="hero-tag"><i class="fas fa-rocket"></i> Terbuka untuk Kesempatan Baru</div>
                <h1>Halo, Saya<br><span class="gradient-text">Ferju Prihamdani</span></h1>
                <div class="typing-container">
                    &gt; <span class="typed-text"></span><span class="cursor"></span>
                </div>
                <p class="hero-desc">
                    Lulusan S1 Pendidikan Informatika dari Universitas PGRI Sumatera Barat dengan keahlian komprehensif dalam perancangan serta pengembangan aplikasi web dan mobile yang modern.
                </p>
                <div class="hero-buttons">
                    <a href="#kontak" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Hubungi Saya
                    </a>
                    <a href="https://github.com/asmoday21" target="_blank" class="btn btn-secondary">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                </div>
            </div>

            <div class="profile-wrapper reveal" style="transition-delay:0.2s;">
                <div class="ring-1"></div>
                <div class="ring-2"></div>
                <div class="profile-card">
                    <div class="profile-image">
                        <img src="{{asset('img/Ferju_Prihamdani.jpg')}}" alt="Ferju Prihamdani" onerror="this.src='https://via.placeholder.com/280/111827/0ea5e9?text=FP'">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT -->
    <section id="tentang" class="section">
        <div class="section-header reveal">
            <div class="section-eyebrow">Mengenal Lebih Dekat</div>
            <h2 class="section-title">Tentang Saya</h2>
        </div>
        <div class="about-grid">
            <div class="about-text reveal">
                <p>Saya adalah lulusan <span class="highlight">S1 Pendidikan Informatika</span> dari Universitas PGRI Sumatera Barat. Fokus keahlian saya mengarah pada pemecahan masalah melalui pemrograman web dan perangkat bergerak menggunakan <span class="highlight">Laravel dan Flutter</span>.</p>
                <p>Saat ini, saya aktif mendedikasikan diri sebagai <span class="highlight">Asisten Pengembang Teknologi Pembelajaran di BPS RI</span>. Dalam posisi ini, saya membantu pengembangan media pembelajaran berbasis teknologi serta mendukung proses pelatihan dan pengembangan SDM melalui penyusunan materi digital, administrasi kegiatan, dan koordinasi bersama tim agar pelaksanaan program berjalan dengan baik.</p>
                <p>Didukung dasar desain grafis dan dokumentasi visual (video editing), saya mengedepankan pendekatan kreatif untuk mengemas setiap fungsionalitas aplikasi dengan tampilan UI/UX yang dinamis serta menyenangkan mata pengguna.</p>
            </div>
            <div class="stats-grid reveal" style="transition-delay:0.2s;">
                <div class="stat-card glass-card">
                    <i class="fas fa-graduation-cap stat-icon"></i>
                    <div class="stat-number">S1</div>
                    <div class="stat-label">Pend. Informatika</div>
                </div>
                <div class="stat-card glass-card">
                    <i class="fas fa-briefcase stat-icon"></i>
                    <div class="stat-number">BPS</div>
                    <div class="stat-label">Asisten Teknologi</div>
                </div>
                <div class="stat-card glass-card">
                    <i class="fas fa-certificate stat-icon"></i>
                    <div class="stat-number">6</div>
                    <div class="stat-label">Sertifikat Resmi</div>
                </div>
                <div class="stat-card glass-card">
                    <i class="fas fa-laptop-code stat-icon"></i>
                    <div class="stat-number">3+</div>
                    <div class="stat-label">Proyek Mandiri</div>
                </div>
            </div>
        </div>
    </section>

    <!-- SKILLS -->
    <section id="keahlian" class="section">
        <div class="section-header reveal">
            <div class="section-eyebrow">Kompetensi Teknologis</div>
            <h2 class="section-title">Keahlian Saya</h2>
        </div>
        <div class="skills-grid">
            <div class="skill-category-card glass-card reveal">
                <div class="skill-header">
                    <i class="fas fa-code"></i>
                    <h3>Web Development</h3>
                </div>
                <div class="skill-badges">
                    <span class="skill-badge"><i class="fab fa-laravel"></i> Laravel</span>
                    <span class="skill-badge"><i class="fab fa-php"></i> PHP</span>
                    <span class="skill-badge"><i class="fas fa-database"></i> MySQL</span>
                    <span class="skill-badge"><i class="fab fa-html5"></i> HTML5/CSS3</span>
                    <span class="skill-badge"><i class="fab fa-js"></i> JavaScript</span>
                </div>
            </div>
            <div class="skill-category-card glass-card reveal" style="transition-delay:0.1s;">
                <div class="skill-header">
                    <i class="fas fa-mobile-alt"></i>
                    <h3>Mobile Development</h3>
                </div>
                <div class="skill-badges">
                    <span class="skill-badge"><i class="fas fa-layer-group"></i> Flutter</span>
                    <span class="skill-badge"><i class="fas fa-code-branch"></i> Dart</span>
                    <span class="skill-badge"><i class="fas fa-fire"></i> Firebase</span>
                    <span class="skill-badge"><i class="fas fa-mobile"></i> Mobile UI/UX</span>
                </div>
            </div>
            <div class="skill-category-card glass-card reveal" style="transition-delay:0.2s;">
                <div class="skill-header">
                    <i class="fas fa-paint-brush"></i>
                    <h3>Desain & Kreatif</h3>
                </div>
                <div class="skill-badges">
                    <span class="skill-badge"><i class="fas fa-pen-nib"></i> Graphic Design</span>
                    <span class="skill-badge"><i class="fas fa-video"></i> Video Editing</span>
                    <span class="skill-badge"><i class="fas fa-image"></i> Canva</span>
                    <span class="skill-badge"><i class="fas fa-film"></i> Adobe Premiere</span>
                    <span class="skill-badge"><i class="fas fa-cut"></i> CapCut</span>
                </div>
            </div>
            <div class="skill-category-card glass-card reveal" style="transition-delay:0.3s;">
                <div class="skill-header">
                    <i class="fas fa-users"></i>
                    <h3>Karakter Personal</h3>
                </div>
                <div class="skill-badges">
                    <span class="skill-badge"><i class="fas fa-comments"></i> Public Speaking</span>
                    <span class="skill-badge"><i class="fas fa-users-cog"></i> Kepemimpinan</span>
                    <span class="skill-badge"><i class="fas fa-people-carry"></i> Kerja Sama Tim</span>
                    <span class="skill-badge"><i class="fas fa-lightbulb"></i> Problem Solving</span>
                    <span class="skill-badge"><i class="fas fa-sync-alt"></i> Adaptif</span>
                </div>
            </div>
        </div>
    </section>

    <!-- PROJECTS -->
    <section id="proyek" class="section">
        <div class="section-header reveal">
            <div class="section-eyebrow">Karya Terpilih</div>
            <h2 class="section-title">Portofolio Proyek</h2>
        </div>
        <div class="projects-grid">
            <div class="project-card glass-card reveal">
                <div class="project-img">
                    <i class="fas fa-laptop-code"></i>
                </div>
                <div class="project-content">
                    <div class="project-num">// 001</div>
                    <h3 class="project-title">Media Pembelajaran Web</h3>
                    <p class="project-desc">Aplikasi pembelajaran interaktif lengkap dengan sistem kuis dinamis, integrasi materi video responsif, dan dukungan visualisasi objek gambar 3D secara online.</p>
                    <div class="tech-stack">
                        <span class="tech-tag">Laravel</span>
                        <span class="tech-tag">MySQL</span>
                        <span class="tech-tag">Bootstrap</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="link-github"><i class="fab fa-github"></i> Code</a>
                        <a href="#" class="link-live"><i class="fas fa-external-link-alt"></i> Demo</a>
                    </div>
                </div>
            </div>
            <div class="project-card glass-card reveal" style="transition-delay:0.1s;">
                <div class="project-img">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <div class="project-content">
                    <div class="project-num">// 002</div>
                    <h3 class="project-title">Mobile E-Learning App</h3>
                    <p class="project-desc">Platform edukasi multi-platform (Android/iOS) berbasis Flutter untuk mendukung belajar fleksibel. Terintegrasi fitur kuis real-time dan UI/UX interaktif.</p>
                    <div class="tech-stack">
                        <span class="tech-tag">Flutter</span>
                        <span class="tech-tag">Dart</span>
                        <span class="tech-tag">Firebase</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="link-github"><i class="fab fa-github"></i> Repo</a>
                        <a href="#" class="link-live"><i class="fas fa-external-link-alt"></i> App</a>
                    </div>
                </div>
            </div>
            <div class="project-card glass-card reveal" style="transition-delay:0.2s;">
                <div class="project-img">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="project-content">
                    <div class="project-num">// 003</div>
                    <h3 class="project-title">E-Commerce Platform</h3>
                    <p class="project-desc">Sistem belanja online komprehensif didukung fungsionalitas mutakhir untuk mengelola stok inventaris produk, sistem pesanan instan, dan gateway pembayaran.</p>
                    <div class="tech-stack">
                        <span class="tech-tag">Laravel</span>
                        <span class="tech-tag">Vue.js</span>
                        <span class="tech-tag">REST API</span>
                    </div>
                    <div class="project-links">
                        <a href="#" class="link-github"><i class="fab fa-github"></i> Code</a>
                        <a href="#" class="link-live"><i class="fas fa-external-link-alt"></i> Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- EXPERIENCE -->
    <section id="pengalaman" class="section">
        <div class="section-header reveal">
            <div class="section-eyebrow">Riwayat Kegiatan</div>
            <h2 class="section-title">Pengalaman & Organisasi</h2>
        </div>
        <div class="timeline-container">
            <div class="timeline-track">
                <div class="timeline-progress" id="timeline-progress"></div>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content glass-card">
                    <span class="timeline-date">Des 2025 — Sekarang</span>
                    <h3 class="timeline-title">Asisten Pengembang Teknologi Pembelajaran</h3>
                    <div class="timeline-org"><i class="fas fa-building"></i> Badan Pusat Statistik RI (Maganghub)</div>
                    <p style="color:var(--muted);">Berkontribusi aktif dalam merancang serta meluncurkan modul pelatihan digital, ekosistem e-learning, simulasi teknologi interaktif, serta melengkapi tata administrasi kegiatan pembelajaran SDM.</p>
                </div>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content glass-card">
                    <span class="timeline-date">Feb — Mar 2024</span>
                    <h3 class="timeline-title">Ketua Divisi Perlengkapan & Dokumentasi</h3>
                    <div class="timeline-org"><i class="fas fa-users"></i> Panitia POLICE IT</div>
                    <p style="color:var(--muted);">Bertanggung jawab dalam hal pengadaan perlengkapan logistik pameran, meliput dokumentasi (foto dan video), serta menyajikan konten promosi digital berkala.</p>
                </div>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content glass-card">
                    <span class="timeline-date">Agu 2023 — 2024</span>
                    <h3 class="timeline-title">Divisi Departemen Teknologi Informasi</h3>
                    <div class="timeline-org"><i class="fas fa-users"></i> HIMAFORTIKA</div>
                    <p style="color:var(--muted);">Membuat materi publikasi visual mingguan, menyusun tata letak poster kegiatan organisasi, serta membina komunikasi informasi antar pengurus himpunan.</p>
                </div>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-dot"></div>
                <div class="timeline-content glass-card">
                    <span class="timeline-date">Januari 2023</span>
                    <h3 class="timeline-title">Divisi Dokumentasi</h3>
                    <div class="timeline-org"><i class="fas fa-camera"></i> Panitia Pameran Desain Grafis</div>
                    <p style="color:var(--muted);">Memimpin dokumentasi aktivitas pengunjung serta merekam dan mengedit karya para peserta pameran untuk dijadikan materi promosi resmi di media sosial.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CERTIFICATIONS -->
    <section class="section">
        <div class="section-header reveal">
            <div class="section-eyebrow">Sertifikasi & Prestasi</div>
            <h2 class="section-title">Bukti Kompetensi</h2>
        </div>
        <div class="cert-grid">
            <div class="cert-card glass-card reveal">
                <div class="cert-icon"><i class="fas fa-palette"></i></div>
                <div class="cert-info">
                    <h3>CISGD — Graphic Design</h3>
                    <p>PASAS Institute Singapore</p>
                    <div class="cert-valid">Berlaku s/d Nov 2028</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/CISGD.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card glass-card reveal" style="transition-delay:0.1s;">
                <div class="cert-icon"><i class="fas fa-network-wired"></i></div>
                <div class="cert-info">
                    <h3>MikroTik Network Associate</h3>
                    <p>MikroTik SIA (Skor: 81)</p>
                    <div class="cert-valid">Sep 2025 — Sep 2028</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/MTCNA.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card glass-card reveal" style="transition-delay:0.2s;">
                <div class="cert-icon"><i class="fas fa-laptop"></i></div>
                <div class="cert-info">
                    <h3>Pelatihan Keahlian TIK</h3>
                    <p>Univ. PGRI Sumatera Barat</p>
                    <div class="cert-valid">Agustus 2025</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/ICT.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card glass-card reveal">
                <div class="cert-icon"><i class="fas fa-brain"></i></div>
                <div class="cert-info">
                    <h3>Belajar Dasar AI</h3>
                    <p>Dicoding Indonesia</p>
                    <div class="cert-valid">Tahun 2025</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/AI.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card glass-card reveal" style="transition-delay:0.1s;">
                <div class="cert-icon"><i class="fas fa-award"></i></div>
                <div class="cert-info">
                    <h3>Pertukaran Mahasiswa 3</h3>
                    <p>ITENAS Bandung</p>
                    <div class="cert-valid">Tahun 2023</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/PMM.pdf"><i class="fas fa-eye"></i> Preview Dokumen</a>
                </div>
            </div>
            <div class="cert-card glass-card reveal" style="transition-delay:0.2s;">
                <div class="cert-icon"><i class="fas fa-trophy"></i></div>
                <div class="cert-info">
                    <h3>Digital Art Competition</h3>
                    <p>Literasi Digital Indonesia</p>
                    <div class="cert-valid">Tahun 2024</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/LITERASI.pdf"><i class="fas fa-eye"></i> Preview Sertifikat</a>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL PREVIEW -->
    <div id="previewModal" class="modal">
        <div class="modal-content">
            <div class="modal-top-bar">
                <span><i class="fas fa-file-alt"></i> Pratinjau Dokumen</span>
                <button class="close-modal" title="Tutup"><i class="fas fa-times"></i></button>
            </div>
            <div id="modal-body"></div>
        </div>
    </div>

    <!-- CONTACT -->
    <section id="kontak" class="section">
        <div class="section-header reveal center">
            <div class="section-eyebrow">Mari Terhubung</div>
            <h2 class="section-title">Hubungi Saya</h2>
        </div>
        <div class="contact-grid">
            <a href="mailto:ferjuprihamdani@gmail.com" class="contact-card glass-card reveal">
                <i class="fas fa-envelope"></i>
                <h4>Email</h4>
                <p>ferjuprihamdani@gmail.com</p>
            </a>
            <a href="tel:+6282287812915" class="contact-card glass-card reveal" style="transition-delay:0.1s;">
                <i class="fas fa-phone-alt"></i>
                <h4>Telepon / WhatsApp</h4>
                <p>+62 822-8781-2915</p>
            </a>
            <a href="https://www.linkedin.com/in/ferju-prihamdani-886628221" target="_blank" class="contact-card glass-card reveal" style="transition-delay:0.2s;">
                <i class="fab fa-linkedin"></i>
                <h4>LinkedIn</h4>
                <p>Ferju Prihamdani</p>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-logo">FP<span>.</span></div>
        <div class="footer-copy">&copy; 2025 Ferju Prihamdani — Dibangun dengan <i class="fas fa-heart" style="color:#ef4444; margin:0 4px;"></i> & HTML/CSS/JS</div>
    </footer>

    <!-- SCRIPTS -->
    <script>
    /* ===== CANVAS BACKGROUND (PARTIKEL & GRID IT) ===== */
    (function(){
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');
        let W, H;
        
        function resize(){
            W = canvas.width = window.innerWidth;
            H = canvas.height = window.innerHeight;
        }

        const particles = [];
        // Mengurangi jumlah partikel pada layar HP agar performa halus
        const PCOUNT = window.innerWidth < 768 ? 25 : 55; 

        class Particle {
            constructor(){
                this.x = Math.random() * (W||1200);
                this.y = Math.random() * (H||800);
                this.vx = (Math.random()-0.5) * 0.3; 
                this.vy = (Math.random()-0.5) * 0.3;
                this.alpha = Math.random() * 0.3 + 0.1;
                this.size = Math.random() * 1.5 + 1;
            }
            update(){
                this.x += this.vx; this.y += this.vy;
                if(this.x<0||this.x>W) this.vx*=-1;
                if(this.y<0||this.y>H) this.vy*=-1;
            }
            draw(){
                ctx.save();
                ctx.globalAlpha = this.alpha;
                ctx.beginPath();
                ctx.arc(this.x,this.y,this.size,0,Math.PI*2);
                ctx.fillStyle='#0ea5e9';
                ctx.fill();
                ctx.restore();
            }
        }

        function initP(){
            particles.length = 0;
            for(let i=0;i<PCOUNT;i++) particles.push(new Particle());
        }

        function connectP(){
            const maxD = 130;
            for(let i=0;i<particles.length;i++){
                for(let j=i+1;j<particles.length;j++){
                    const dx=particles[i].x-particles[j].x;
                    const dy=particles[i].y-particles[j].y;
                    const d=Math.sqrt(dx*dx+dy*dy);
                    if(d<maxD){
                        const op=(1-d/maxD)*0.15; 
                        ctx.strokeStyle=`rgba(14, 165, 233, ${op})`;
                        ctx.lineWidth=0.8;
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x,particles[i].y);
                        ctx.lineTo(particles[j].x,particles[j].y);
                        ctx.stroke();
                    }
                }
            }
        }

        function animate(){
            ctx.clearRect(0,0,W,H);
            particles.forEach(p=>{p.update();p.draw();});
            connectP();
            requestAnimationFrame(animate);
        }

        resize(); initP(); animate();
        window.addEventListener('resize',()=>{ resize(); initP(); });
    })();

    /* ===== TYPING EFFECT ===== */
    const typedEl = document.querySelector('.typed-text');
    const texts = ['Web Developer','Mobile Developer','Graphic Designer','Tech Enthusiast'];
    let ti=0, ci=0;

    function type(){
        if(ci<texts[ti].length){
            typedEl.textContent+=texts[ti][ci++];
            setTimeout(type,80);
        } else { setTimeout(erase,2500); }
    }
    function erase(){
        if(ci>0){
            typedEl.textContent=texts[ti].substring(0,--ci);
            setTimeout(erase,40);
        } else {
            ti=(ti+1)%texts.length;
            setTimeout(type,600);
        }
    }
    setTimeout(type,800);

    /* ===== SCROLL REVEAL ===== */
    const reveals = document.querySelectorAll('.reveal');
    const obsOptions = { threshold: 0.1, rootMargin: '0px 0px -40px 0px' };
    
    if('IntersectionObserver' in window){
        const observer = new IntersectionObserver((entries)=>{
            entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('active'); });
        }, obsOptions);
        reveals.forEach(el => observer.observe(el));
    } else {
        reveals.forEach(el => el.classList.add('active'));
    }

    /* ===== NAVBAR & TIMELINE PROGRESS ===== */
    const navbar = document.getElementById('navbar');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const tlProgress = document.getElementById('timeline-progress');
    const tlContainer = document.querySelector('.timeline-container');

    window.addEventListener('scroll',()=>{
        navbar.classList.toggle('scrolled', window.scrollY > 50);

        let cur = '';
        sections.forEach(s=>{ if(scrollY >= s.offsetTop - 200) cur = s.id; });
        navLinks.forEach(l=>{
            l.classList.toggle('active', l.getAttribute('href') === '#'+cur);
        });

        if(tlContainer){
            const r = tlContainer.getBoundingClientRect();
            if(r.top < window.innerHeight && r.bottom > 0){
                const pct = Math.max(0,Math.min(100,(window.innerHeight-r.top)/r.height*100));
                tlProgress.style.height = pct+'%';
            }
        }
    });

    /* ===== HAMBURGER MENU ===== */
    const ham = document.getElementById('hamburger');
    const navMenu = document.querySelector('.nav-menu');

    function toggleMenu(){
        navMenu.classList.toggle('active');
        const spans = ham.querySelectorAll('span');
        const on = navMenu.classList.contains('active');
        spans[0].style.transform = on ? 'rotate(45deg) translate(5px,6px)' : 'none';
        spans[1].style.opacity = on ? '0' : '1';
        spans[2].style.transform = on ? 'rotate(-45deg) translate(5px,-6px)' : 'none';
    }

    ham.addEventListener('click',toggleMenu);
    navLinks.forEach(l=>l.addEventListener('click',()=>{ if(navMenu.classList.contains('active')) toggleMenu(); }));

    /* ===== SMOOTH SCROLL ===== */
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
        a.addEventListener('click',e=>{
            e.preventDefault();
            const t = a.getAttribute('href');
            if(t==='#') return;
            const el = document.querySelector(t);
            if(el) window.scrollTo({top:el.offsetTop-80,behavior:'smooth'});
        });
    });

    /* ===== MODAL PREVIEW ===== */
    const modal = document.getElementById('previewModal');
    const modalBody = document.getElementById('modal-body');
    const closeBtn = document.querySelector('.close-modal');

    document.querySelectorAll('.cert-link').forEach(l=>{
        l.addEventListener('click',e=>{
            e.preventDefault();
            const url = l.getAttribute('data-preview');
            if(url){
                modalBody.innerHTML = url.match(/\.(jpg|jpeg|png|gif)$/i)
                    ? `<img src="${url}" alt="Preview">`
                    : `<iframe src="${url}" title="Preview"></iframe>`;
            } else {
                modalBody.innerHTML = `<div style="text-align:center;color:var(--muted);padding:2rem;"><i class="fas fa-file-times" style="font-size:3rem;margin-bottom:1rem;color:#ef4444;display:block;"></i><p>Berkas tidak ditemukan.</p></div>`;
            }
            modal.classList.add('show');
        });
    });

    function closeModal(){
        modal.classList.remove('show');
        setTimeout(()=>{ modalBody.innerHTML=''; }, 300);
    }
    closeBtn.addEventListener('click',closeModal);
    window.addEventListener('click',e=>{ if(e.target===modal) closeModal(); });
    </script>
</body>
</html>