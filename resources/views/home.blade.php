<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferju Prihamdani — Portfolio</title>
    <link rel="icon" type="image/png" href="img/LOGO FERJU.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&family=Fira+Code:wght@400;500&display=swap" rel="stylesheet">

    <style>
    /* ==========================================================================
       TOKENS
    ========================================================================== */
    :root {
        --c-sky:     #38bdf8;
        --c-violet:  #818cf8;
        --c-emerald: #34d399;
        --c-amber:   #fbbf24;

        --bg:   #050911;
        --bg2:  #0a1020;
        --bg3:  #0f1a30;

        --glass:        rgba(255,255,255,0.04);
        --glass-border: rgba(255,255,255,0.08);
        --glass-shine:  inset 0 1px 0 rgba(255,255,255,0.09);

        --text:   #eef4ff;
        --muted:  #8fa8c8;
        --subtle: #3d5175;

        --shadow-deep: 0 20px 50px rgba(0,0,0,0.55);
        --glow-sky:    0 0 28px rgba(56,189,248,0.22);

        --radius-lg:   18px;
        --radius-xl:   24px;
        --radius-pill: 100px;

        --transition: all 0.4s cubic-bezier(0.4,0,0.2,1);

        /* Font stack */
        --font-body:    'Plus Jakarta Sans', sans-serif;
        --font-heading: 'Space Grotesk', sans-serif;
        --font-mono:    'Fira Code', monospace;
    }

    *, *::before, *::after { margin:0; padding:0; box-sizing:border-box; }
    html { scroll-behavior:smooth; }

    body {
        background: var(--bg);
        color: var(--text);
        font-family: var(--font-body);
        font-size: 16px;
        line-height: 1.75;
        overflow-x: hidden;
        -webkit-font-smoothing: antialiased;
    }

    /* SCROLLBAR */
    ::-webkit-scrollbar { width: 5px; }
    ::-webkit-scrollbar-track { background: var(--bg); }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, var(--c-sky), var(--c-violet));
        border-radius: 10px;
    }

    /* Noise grain */
    body::before {
        content:''; position:fixed; inset:0; z-index:0; pointer-events:none;
        opacity:.022;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='.85' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)'/%3E%3C/svg%3E");
        background-size: 180px;
    }

    /* ==========================================================================
       BACKGROUNDS
    ========================================================================== */
    .nebula-bg { position:fixed; inset:0; z-index:0; pointer-events:none; overflow:hidden; }
    .orb {
        position:absolute; border-radius:50%;
        filter:blur(90px); mix-blend-mode:screen;
    }
    .orb-1 {
        width:clamp(280px,50vw,560px); height:clamp(280px,50vw,560px);
        top:-15%; left:-10%;
        background: radial-gradient(circle, rgba(56,189,248,.18), transparent 70%);
        animation: drift1 20s ease-in-out infinite alternate;
    }
    .orb-2 {
        width:clamp(300px,55vw,620px); height:clamp(300px,55vw,620px);
        bottom:-15%; right:-10%;
        background: radial-gradient(circle, rgba(129,140,248,.15), transparent 70%);
        animation: drift2 25s ease-in-out infinite alternate;
    }
    .orb-3 {
        width:clamp(180px,30vw,360px); height:clamp(180px,30vw,360px);
        top:40%; left:40%;
        background: radial-gradient(circle, rgba(52,211,153,.07), transparent 70%);
        animation: drift3 16s ease-in-out infinite alternate;
    }
    @keyframes drift1 { to { transform:translate(50px,70px) scale(1.12); } }
    @keyframes drift2 { to { transform:translate(-50px,-55px) scale(1.18); } }
    @keyframes drift3 { to { transform:translate(35px,-60px) scale(.88); } }

    .dot-grid {
        position:fixed; inset:0; z-index:0; pointer-events:none;
        background-image: radial-gradient(circle, rgba(255,255,255,.055) 1px, transparent 1px);
        background-size: 28px 28px;
        mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
        -webkit-mask-image: radial-gradient(ellipse 80% 80% at 50% 50%, black 30%, transparent 100%);
    }

    #bg-canvas { position:fixed; inset:0; z-index:1; pointer-events:none; opacity:.45; }

    /* Cursor glow — desktop only */
    .cursor-glow {
        position:fixed; width:280px; height:280px; border-radius:50%;
        pointer-events:none; z-index:2;
        background: radial-gradient(circle, rgba(56,189,248,.05), transparent 70%);
        transform:translate(-50%,-50%);
        mix-blend-mode:screen;
        display:none;
    }
    @media(hover:hover){ .cursor-glow { display:block; } }

    /* ==========================================================================
       NAVBAR
    ========================================================================== */
    .navbar {
        position:fixed; top:0; width:100%; z-index:1000;
        padding:1.4rem 0;
        transition: var(--transition);
    }
    .navbar.scrolled {
        padding:.9rem 0;
        background: rgba(5,9,17,.82);
        backdrop-filter: blur(22px);
        -webkit-backdrop-filter: blur(22px);
        border-bottom: 1px solid var(--glass-border);
    }

    .nav-container {
        max-width:1200px; margin:0 auto;
        display:flex; justify-content:space-between; align-items:center;
        padding:0 clamp(1rem,4vw,2.5rem);
    }

    .nav-logo {
        font-family: var(--font-heading);
        font-size:1.6rem; font-weight:700;
        text-decoration:none; color:var(--text); letter-spacing:-.5px;
    }
    .nav-logo .dot { color:var(--c-sky); text-shadow:0 0 16px var(--c-sky); }

    .nav-menu { display:flex; list-style:none; gap:.3rem; }
    .nav-link {
        color:var(--muted); text-decoration:none;
        font-family: var(--font-body);
        font-size:.9rem; font-weight:600;
        padding:.5rem .95rem; border-radius:10px;
        transition:background .25s, color .25s;
        letter-spacing:.01em;
    }
    .nav-link:hover  { color:var(--text); background:var(--glass); }
    .nav-link.active { color:var(--c-sky); background:rgba(56,189,248,.08); }

    /* Hamburger */
    .hamburger {
        display:none; flex-direction:column; gap:5px;
        cursor:pointer; padding:8px; z-index:1100;
        position:relative;
    }
    .hamburger span {
        display:block; width:24px; height:2px;
        background:var(--text); border-radius:2px;
        transition:transform .3s, opacity .3s;
    }

    /* Mobile drawer */
    @media(max-width:768px){
        .hamburger { display:flex; }

        .nav-menu {
            position:fixed;
            top:0; right:-100%;
            width:min(75vw, 300px);
            height:100dvh;
            background: rgba(5,9,17,.97);
            backdrop-filter:blur(24px);
            -webkit-backdrop-filter:blur(24px);
            flex-direction:column;
            align-items:flex-start;
            padding:5.5rem 2rem 2.5rem;
            gap:.4rem;
            border-left:1px solid var(--glass-border);
            transition:right .4s cubic-bezier(.4,0,.2,1);
            z-index:1050;
        }
        .nav-menu.active { right:0; }

        .nav-link {
            font-size:1rem;
            width:100%;
            padding:.75rem 1rem;
            border-radius:12px;
        }

        /* Overlay behind drawer */
        .nav-overlay {
            display:none; position:fixed; inset:0;
            background:rgba(0,0,0,.5);
            z-index:1040; backdrop-filter:blur(2px);
        }
        .nav-overlay.active { display:block; }
    }

    /* ==========================================================================
       HERO
    ========================================================================== */
    .hero-section {
        min-height:100svh;
        display:flex; align-items:center;
        padding: clamp(120px,18vw,160px) clamp(1rem,5vw,2.5rem) clamp(4rem,8vw,6rem);
        position:relative; z-index:10;
    }

    .hero-container {
        max-width:1200px; margin:0 auto; width:100%;
        display:grid;
        grid-template-columns:1.15fr 1fr;
        gap:clamp(2rem,5vw,4rem);
        align-items:center;
    }

    /* Status badge */
    .status-badge {
        display:inline-flex; align-items:center; gap:.7rem;
        padding:.5rem 1.1rem;
        background:rgba(52,211,153,.08);
        border:1px solid rgba(52,211,153,.2);
        border-radius:var(--radius-pill);
        font-family:var(--font-mono); font-size:.78rem;
        color:var(--c-emerald);
        margin-bottom:1.8rem;
    }
    .status-dot {
        width:8px; height:8px; border-radius:50%;
        background:var(--c-emerald);
        box-shadow:0 0 0 0 rgba(52,211,153,.6);
        animation:ping 2s ease-in-out infinite;
        flex-shrink:0;
    }
    @keyframes ping {
        0%,100%{ box-shadow:0 0 0 0 rgba(52,211,153,.6); }
        50%     { box-shadow:0 0 0 6px rgba(52,211,153,0); }
    }

    .hero-content h1 {
        font-family: var(--font-heading);
        font-size: clamp(2.2rem, 5.5vw, 4.8rem);
        font-weight:700; line-height:1.1;
        letter-spacing:-1.5px;
        margin-bottom:1rem;
    }
    .hero-content h1 .greeting {
        display:block;
        font-size:.55em; font-weight:500;
        letter-spacing:-.5px; color:var(--muted);
        margin-bottom:.1em;
    }

    .name-shimmer {
        background:linear-gradient(135deg, var(--text) 0%, var(--c-sky) 45%, var(--c-violet) 80%, var(--text) 100%);
        background-size:300% 300%;
        -webkit-background-clip:text; -webkit-text-fill-color:transparent;
        animation:shimmer 6s ease infinite;
    }
    @keyframes shimmer {
        0%,100%{ background-position:0% 50%; }
        50%    { background-position:100% 50%; }
    }

    .hero-role {
        font-family:var(--font-mono); font-size:clamp(.85rem,2.2vw,1.05rem);
        color:var(--muted); margin-bottom:1.8rem;
        display:flex; align-items:center; gap:.5rem;
        flex-wrap:nowrap; overflow:hidden;
    }
    .hero-role .prompt { color:var(--c-emerald); flex-shrink:0; }
    .typed-text { color:var(--c-sky); font-weight:500; }
    .cursor {
        display:inline-block; width:2px; height:1em;
        background:var(--c-sky); margin-left:2px;
        vertical-align:middle; animation:blink 1s infinite;
    }
    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }

    .hero-desc {
        font-size:clamp(.93rem,2vw,1.05rem);
        color:var(--muted); font-weight:400;
        margin-bottom:2.5rem;
        line-height:1.85; max-width:540px;
    }

    .hero-actions { display:flex; gap:.9rem; flex-wrap:wrap; }

    .btn {
        padding:.85rem 1.7rem; border-radius:13px;
        font-family:var(--font-body); font-weight:700;
        font-size:.92rem; text-decoration:none;
        display:inline-flex; align-items:center; gap:.6rem;
        transition:var(--transition); cursor:pointer; border:none;
        letter-spacing:.01em; position:relative; overflow:hidden;
        white-space:nowrap;
    }
    .btn-primary {
        background:linear-gradient(135deg, var(--c-sky), var(--c-violet));
        color:#fff;
    }
    .btn-primary::before {
        content:''; position:absolute; inset:0;
        background:linear-gradient(135deg, rgba(255,255,255,.18), transparent);
        opacity:0; transition:opacity .3s;
    }
    .btn-primary:hover { transform:translateY(-3px); box-shadow:0 12px 28px rgba(56,189,248,.3); }
    .btn-primary:hover::before { opacity:1; }

    .btn-ghost {
        background:var(--glass); color:var(--text);
        border:1px solid var(--glass-border); backdrop-filter:blur(10px);
    }
    .btn-ghost:hover {
        background:rgba(255,255,255,.08);
        border-color:rgba(56,189,248,.3);
        transform:translateY(-3px);
    }

    /* PROFILE */
    .profile-visual {
        display:flex; align-items:center; justify-content:center;
        position:relative;
    }

    .hex-frame {
        position:relative;
        width:clamp(220px,35vw,300px);
        height:clamp(220px,35vw,300px);
        display:flex; align-items:center; justify-content:center;
    }

    .hex-ring {
        position:absolute; inset:0; border-radius:50%;
        animation:spin-slow 25s linear infinite;
    }
    .hex-ring::before {
        content:''; position:absolute; inset:-2px; border-radius:50%;
        background:conic-gradient(
            var(--c-sky) 0deg, transparent 60deg,
            var(--c-violet) 120deg, transparent 180deg,
            var(--c-emerald) 240deg, transparent 300deg,
            var(--c-sky) 360deg
        );
        mask: radial-gradient(farthest-side, transparent calc(100% - 3px), black calc(100% - 3px));
        -webkit-mask: radial-gradient(farthest-side, transparent calc(100% - 3px), black calc(100% - 3px));
    }
    .hex-ring-outer {
        position:absolute;
        width:calc(100% + 55px); height:calc(100% + 55px);
        border-radius:50%;
        border:1px dashed rgba(56,189,248,.14);
        animation:spin-slow 45s linear infinite reverse;
    }
    @keyframes spin-slow { 100%{ transform:rotate(360deg); } }

    .avatar-glow {
        position:absolute; inset:-18px; border-radius:50%;
        background:radial-gradient(circle, rgba(56,189,248,.1), rgba(129,140,248,.07), transparent 70%);
        z-index:1; animation:glow-pulse 4s ease-in-out infinite;
    }
    @keyframes glow-pulse {
        0%,100%{ opacity:.8; transform:scale(1); }
        50%    { opacity:1;  transform:scale(1.04); }
    }

    .profile-avatar {
        width:calc(100% - 20px); height:calc(100% - 20px);
        border-radius:50%; overflow:hidden;
        border:2px solid rgba(255,255,255,.08);
        position:relative; z-index:2; background:var(--bg3);
    }
    .profile-avatar img {
        width:100%; height:100%;
        object-fit:cover; object-position:center top;
        transition:transform .5s ease;
    }
    .hex-frame:hover .profile-avatar img { transform:scale(1.06); }

    /* Floating icons — hide on tiny screens */
    .float-icon {
        position:absolute;
        width:40px; height:40px; border-radius:11px;
        background:var(--bg2); border:1px solid var(--glass-border);
        display:flex; align-items:center; justify-content:center;
        font-size:1.1rem; box-shadow:var(--shadow-deep);
        animation:floaty 4s ease-in-out infinite; z-index:5;
    }
    .fi-1{ top:2%;   left:-6%;  color:#f05340; animation-delay:0s; }
    .fi-2{ top:2%;   right:-6%; color:#3dc6e1; animation-delay:.8s; }
    .fi-3{ bottom:2%;left:-2%;  color:#6eb3f7; animation-delay:1.6s; }
    .fi-4{ bottom:2%;right:-2%; color:#9ca3af; animation-delay:2.4s; }
    .fi-5{ top:48%;  left:-12%; transform:translateY(-50%); color:#61dafb; animation-delay:.4s; }
    @keyframes floaty { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-7px)} }
    .fi-5 { animation:floaty5 5s ease-in-out infinite; }
    @keyframes floaty5 { 0%,100%{transform:translateY(-50%)} 50%{transform:translateY(calc(-50% - 7px))} }

    @media(max-width:480px){ .float-icon{ display:none; } }

    /* Scroll hint */
    .scroll-hint {
        position:absolute; bottom:2rem; left:50%; transform:translateX(-50%);
        display:flex; flex-direction:column; align-items:center; gap:.4rem;
        color:var(--subtle); font-size:.72rem; font-family:var(--font-mono);
        z-index:10; animation:fade-bob 3s ease-in-out infinite;
        pointer-events:none;
    }
    .scroll-wheel {
        width:24px; height:38px;
        border:1px solid var(--glass-border); border-radius:12px;
        display:flex; justify-content:center; padding-top:6px;
    }
    .scroll-wheel::before {
        content:''; width:3px; height:7px;
        background:var(--c-sky); border-radius:2px;
        animation:scroll-anim 2s ease-in-out infinite;
    }
    @keyframes scroll-anim { 0%{transform:translateY(0);opacity:1} 100%{transform:translateY(9px);opacity:0} }
    @keyframes fade-bob {
        0%,100%{ opacity:.5; transform:translateX(-50%) translateY(0); }
        50%    { opacity:1;  transform:translateX(-50%) translateY(-4px); }
    }

    /* ==========================================================================
       SECTION COMMON
    ========================================================================== */
    .section {
        padding: clamp(4rem,10vw,7rem) clamp(1rem,5vw,2.5rem);
        max-width:1200px; margin:0 auto;
        position:relative; z-index:10;
    }

    .section-label {
        display:inline-flex; align-items:center; gap:.6rem;
        font-family:var(--font-mono); font-size:.72rem;
        color:var(--c-sky); margin-bottom:1rem;
        text-transform:uppercase; letter-spacing:.12em; font-weight:500;
    }
    .section-label::before,.section-label::after {
        content:''; display:block; width:22px; height:1px;
        background:currentColor; opacity:.5;
    }

    .section-heading {
        font-family:var(--font-heading);
        font-size:clamp(1.8rem,4.5vw,3rem);
        font-weight:700; letter-spacing:-1px;
        line-height:1.15; color:var(--text);
    }

    .section-header { margin-bottom:clamp(2.5rem,6vw,4rem); }
    .section-header.centered {
        text-align:center;
        display:flex; flex-direction:column; align-items:center;
    }

    /* CARD */
    .card {
        background:var(--glass);
        border:1px solid var(--glass-border);
        box-shadow:var(--glass-shine);
        backdrop-filter:blur(18px);
        -webkit-backdrop-filter:blur(18px);
        border-radius:var(--radius-xl);
        transition:var(--transition);
    }
    .card:hover {
        border-color:rgba(56,189,248,.22);
        box-shadow:var(--glass-shine), 0 18px 45px rgba(0,0,0,.45), 0 0 0 1px rgba(56,189,248,.08);
        transform:translateY(-5px);
    }

    /* Reveal */
    .reveal { opacity:0; transform:translateY(28px); transition:opacity .65s ease, transform .65s ease; }
    .reveal.active { opacity:1; transform:none; }

    /* Divider */
    .divider { max-width:1200px; margin:0 auto; height:1px; background:var(--glass-border); position:relative; z-index:10; }

    /* ==========================================================================
       ABOUT
    ========================================================================== */
    .about-grid {
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:clamp(2rem,5vw,4.5rem);
        align-items:start;
    }

    .about-text p {
        font-size:clamp(.92rem,2vw,1.03rem);
        color:var(--muted); margin-bottom:1.4rem; line-height:1.85;
    }
    .hl {
        color:var(--text); font-weight:600;
        background:linear-gradient(120deg, rgba(56,189,248,.13), rgba(129,140,248,.13));
        padding:1px 7px; border-radius:5px;
    }

    .stat-cluster { display:grid; grid-template-columns:1fr 1fr; gap:1rem; }
    .stat-tile { padding:1.7rem 1.3rem; text-align:center; }
    .icon-wrap {
        width:48px; height:48px; border-radius:13px; margin:0 auto .9rem;
        display:flex; align-items:center; justify-content:center; font-size:1.3rem;
    }
    .ic-blue   { background:rgba(56,189,248,.1);  color:var(--c-sky); }
    .ic-violet { background:rgba(129,140,248,.1); color:var(--c-violet); }
    .ic-green  { background:rgba(52,211,153,.1);  color:var(--c-emerald); }
    .ic-amber  { background:rgba(251,191,36,.1);  color:var(--c-amber); }

    .stat-tile .val {
        font-family:var(--font-heading); font-size:2rem;
        font-weight:700; letter-spacing:-1px; color:var(--text);
    }
    .stat-tile .lbl { font-size:.82rem; color:var(--muted); margin-top:.25rem; font-weight:500; }

    /* ==========================================================================
       SKILLS
    ========================================================================== */
    .skills-grid { display:grid; grid-template-columns:repeat(auto-fit, minmax(250px,1fr)); gap:1.3rem; }
    .skill-card { padding:2rem; }
    .skill-card-header {
        display:flex; align-items:center; gap:.9rem; margin-bottom:1.6rem;
    }
    .skill-icon { width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:1.2rem; }
    .skill-card-header h3 {
        font-family:var(--font-heading); font-size:1.05rem; font-weight:700; letter-spacing:-.3px;
    }

    .badge-wrap { display:flex; flex-wrap:wrap; gap:.55rem; }
    .badge {
        padding:.4rem .85rem; border-radius:8px;
        background:rgba(255,255,255,.04); border:1px solid var(--glass-border);
        font-size:.82rem; color:var(--muted); font-weight:600;
        display:inline-flex; align-items:center; gap:.45rem;
        transition:all .22s ease; cursor:default;
    }
    .badge:hover {
        background:rgba(56,189,248,.08); border-color:rgba(56,189,248,.25);
        color:var(--text); transform:translateY(-2px);
    }
    .badge i { color:var(--c-sky); font-size:.9rem; }

    /* ==========================================================================
       PROJECTS
    ========================================================================== */
    .projects-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:1.8rem; }
    .project-card { overflow:hidden; display:flex; flex-direction:column; padding:0; }

    .project-visual {
        height:clamp(160px,22vw,200px);
        position:relative; overflow:hidden;
        display:flex; align-items:center; justify-content:center;
    }
    .pv-bg {
        position:absolute; inset:0; transition:transform .5s ease;
    }
    .pv-1 { background:linear-gradient(135deg, rgba(56,189,248,.08), rgba(129,140,248,.06)); }
    .pv-2 { background:linear-gradient(135deg, rgba(52,211,153,.08), rgba(56,189,248,.06)); }
    .pv-3 { background:linear-gradient(135deg, rgba(251,191,36,.08),  rgba(56,189,248,.06)); }
    .project-card:hover .pv-bg { transform:scale(1.06); }

    .pv-icon { font-size:3.5rem; opacity:.22; position:relative; z-index:1; transition:all .4s ease; }
    .project-card:hover .pv-icon { opacity:.55; transform:scale(1.1); filter:drop-shadow(0 0 18px currentColor); }

    .proj-badge {
        position:absolute; top:1rem; right:1rem;
        font-family:var(--font-mono); font-size:.72rem;
        color:var(--c-sky); background:rgba(56,189,248,.1);
        border:1px solid rgba(56,189,248,.2); border-radius:6px;
        padding:.22rem .55rem;
    }

    .project-body { padding:1.7rem; flex:1; display:flex; flex-direction:column; }
    .project-num  { font-family:var(--font-mono); color:var(--subtle); font-size:.75rem; margin-bottom:.5rem; }
    .project-title { font-family:var(--font-heading); font-size:1.15rem; font-weight:700; margin-bottom:.7rem; letter-spacing:-.3px; }
    .project-desc  { color:var(--muted); font-size:.9rem; margin-bottom:1.3rem; flex:1; line-height:1.75; }
    .tech-pills { display:flex; flex-wrap:wrap; gap:.45rem; margin-bottom:1.5rem; }
    .tech-pill {
        font-size:.75rem; font-weight:700; padding:.28rem .7rem;
        border-radius:6px; background:rgba(255,255,255,.04);
        color:var(--muted); border:1px solid var(--glass-border);
        letter-spacing:.02em;
    }
    .project-actions { display:flex; gap:.7rem; }
    .proj-btn {
        flex:1; text-align:center; padding:.65rem;
        border-radius:10px; font-weight:700; font-size:.84rem;
        text-decoration:none; transition:all .22s;
        display:flex; align-items:center; justify-content:center; gap:.45rem;
        font-family:var(--font-body);
    }
    .proj-btn-main { background:rgba(56,189,248,.1); color:var(--c-sky); border:1px solid rgba(56,189,248,.2); }
    .proj-btn-main:hover { background:var(--c-sky); color:#050911; }
    .proj-btn-sec  { background:var(--glass); color:var(--muted); border:1px solid var(--glass-border); }
    .proj-btn-sec:hover  { background:rgba(255,255,255,.08); color:var(--text); }

    /* ==========================================================================
       TIMELINE
    ========================================================================== */
    .timeline-wrap { position:relative; max-width:800px; margin:0 auto; }
    .tl-spine {
        position:absolute; left:18px; top:0; bottom:0; width:2px;
        background:var(--glass-border);
    }
    .tl-fill {
        position:absolute; top:0; left:0; width:100%;
        background:linear-gradient(to bottom, var(--c-sky), var(--c-violet));
        transition:height .3s ease;
    }
    .tl-item { position:relative; padding-left:56px; margin-bottom:2.5rem; }
    .tl-item:last-child { margin-bottom:0; }
    .tl-node {
        position:absolute; left:9px; top:14px;
        width:20px; height:20px; border-radius:50%;
        background:var(--bg); border:2px solid var(--c-sky); z-index:2;
        box-shadow:0 0 0 4px rgba(56,189,248,.1);
        transition:all .3s;
    }
    .tl-node::before {
        content:''; position:absolute; inset:3px; border-radius:50%;
        background:var(--c-sky); opacity:0; transition:opacity .3s;
    }
    .tl-item:hover .tl-node::before { opacity:1; }
    .tl-item:hover .tl-node { box-shadow:0 0 0 6px rgba(56,189,248,.15), var(--glow-sky); }

    .tl-card { padding:1.6rem; }
    .tl-when {
        display:inline-block; font-family:var(--font-mono); font-size:.75rem;
        color:var(--c-sky); background:rgba(56,189,248,.08);
        border:1px solid rgba(56,189,248,.15); border-radius:var(--radius-pill);
        padding:.28rem .85rem; margin-bottom:1rem;
    }
    .tl-role { font-family:var(--font-heading); font-size:1.08rem; font-weight:700; margin-bottom:.4rem; letter-spacing:-.3px; }
    .tl-org  { color:var(--muted); font-size:.9rem; margin-bottom:.9rem; display:flex; align-items:center; gap:.45rem; }
    .tl-org i{ color:var(--c-sky); font-size:.85rem; }
    .tl-body { color:var(--muted); font-size:.9rem; line-height:1.78; }

    /* ==========================================================================
       CERTIFICATIONS
    ========================================================================== */
    .cert-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:1.3rem; }
    .cert-card { display:flex; gap:1.2rem; padding:1.5rem; align-items:flex-start; }
    .cert-icon-wrap {
        width:48px; height:48px; flex-shrink:0; border-radius:13px;
        display:flex; align-items:center; justify-content:center; font-size:1.35rem;
    }
    .cert-body h3 {
        font-family:var(--font-heading); font-size:.97rem; font-weight:700;
        margin-bottom:.28rem; line-height:1.4;
    }
    .cert-issuer  { color:var(--muted); font-size:.84rem; margin-bottom:.28rem; }
    .cert-validity{ font-size:.8rem; font-weight:700; color:var(--c-emerald); }
    .cert-link {
        display:inline-flex; align-items:center; gap:.45rem;
        margin-top:.8rem; padding:.4rem .9rem;
        background:var(--glass); border:1px solid var(--glass-border);
        border-radius:8px; text-decoration:none; color:var(--muted);
        font-size:.8rem; font-weight:700; transition:all .22s;
        font-family:var(--font-body);
    }
    .cert-link:hover {
        background:rgba(52,211,153,.1); border-color:rgba(52,211,153,.3);
        color:var(--c-emerald);
    }

    /* ==========================================================================
       MODAL
    ========================================================================== */
    .modal {
        display:none; position:fixed; z-index:2000; inset:0;
        background:rgba(5,9,17,.92); backdrop-filter:blur(20px);
        -webkit-backdrop-filter:blur(20px);
        align-items:center; justify-content:center;
        opacity:0; transition:opacity .3s; padding:1rem;
    }
    .modal.show { display:flex; opacity:1; }
    .modal-box {
        background:var(--bg2); border:1px solid rgba(56,189,248,.2);
        border-radius:var(--radius-xl);
        width:100%; max-width:960px; height:85svh;
        display:flex; flex-direction:column; overflow:hidden;
        box-shadow:0 40px 80px rgba(0,0,0,.8), 0 0 0 1px rgba(56,189,248,.08);
        transform:scale(.96) translateY(16px);
        transition:transform .4s cubic-bezier(.4,0,.2,1);
    }
    .modal.show .modal-box { transform:none; }
    .modal-bar {
        padding:1rem 1.4rem; border-bottom:1px solid var(--glass-border);
        display:flex; align-items:center; justify-content:space-between;
        background:rgba(255,255,255,.02); flex-shrink:0;
    }
    .modal-bar span { font-family:var(--font-heading); font-size:.95rem; font-weight:700; }
    .modal-close {
        width:34px; height:34px; border-radius:50%;
        background:var(--glass); border:1px solid var(--glass-border);
        color:var(--muted); cursor:pointer; font-size:1rem;
        display:flex; align-items:center; justify-content:center; transition:all .22s;
    }
    .modal-close:hover { background:#ef4444; color:#fff; border-color:#ef4444; transform:rotate(90deg); }
    #modal-body {
        flex:1; overflow:hidden;
        display:flex; align-items:center; justify-content:center; background:#000;
    }
    #modal-body img, #modal-body iframe { width:100%; height:100%; object-fit:contain; border:none; }

    /* ==========================================================================
       CONTACT
    ========================================================================== */
    .contact-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(220px,1fr)); gap:1.3rem; }
    .contact-tile {
        text-align:center; padding:clamp(1.8rem,4vw,2.8rem) 1.5rem;
        text-decoration:none; color:inherit; display:block;
    }
    .contact-tile .icon-bg {
        width:60px; height:60px; border-radius:18px; margin:0 auto 1.3rem;
        display:flex; align-items:center; justify-content:center; font-size:1.5rem;
        transition:var(--transition);
    }
    .contact-tile:hover .icon-bg { transform:scale(1.08) rotate(-5deg); }
    .contact-tile h4 { font-family:var(--font-heading); font-size:1rem; font-weight:700; margin-bottom:.35rem; }
    .contact-tile p  { color:var(--muted); font-size:.85rem; }

    /* ==========================================================================
       FOOTER
    ========================================================================== */
    footer {
        border-top:1px solid var(--glass-border);
        padding:clamp(2rem,5vw,3rem) clamp(1rem,5vw,2.5rem);
        text-align:center; position:relative; z-index:10;
    }
    .footer-logo {
        font-family:var(--font-heading); font-weight:700;
        font-size:1.5rem; margin-bottom:.8rem; letter-spacing:-.5px;
    }
    .footer-logo .dot { color:var(--c-sky); text-shadow:0 0 16px var(--c-sky); }
    .footer-copy { color:var(--subtle); font-size:.85rem; }
    .footer-copy i { color:#ef4444; margin:0 3px; }

    /* ==========================================================================
       RESPONSIVE BREAKPOINTS
    ========================================================================== */

    /* Tablet */
    @media(max-width:1024px){
        .hero-container {
            grid-template-columns:1fr;
            text-align:center;
        }
        .hero-desc { margin:0 auto 2.5rem; }
        .hero-actions { justify-content:center; }
        .profile-visual { order:-1; }
        .hex-frame {
            width:clamp(200px,50vw,260px);
            height:clamp(200px,50vw,260px);
        }

        .about-grid { grid-template-columns:1fr; gap:2.5rem; }
        .section-header:not(.centered) {
            align-items:center; text-align:center;
        }
        .about-text p { max-width:600px; margin-left:auto; margin-right:auto; }
    }

    /* Mobile */
    @media(max-width:600px){
        .hero-section { padding-top:100px; }

        /* 1-col grids */
        .skills-grid      { grid-template-columns:1fr; }
        .projects-grid    { grid-template-columns:1fr; }
        .cert-grid        { grid-template-columns:1fr; }
        .contact-grid     { grid-template-columns:1fr; }
        .stat-cluster     { grid-template-columns:1fr 1fr; }

        /* Tighten padding */
        .skill-card,
        .tl-card,
        .cert-card,
        .stat-tile        { padding:1.4rem 1.1rem; }
        .project-body     { padding:1.3rem; }

        /* Timeline spine offset */
        .tl-spine  { left:14px; }
        .tl-node   { left:5px; }
        .tl-item   { padding-left:44px; }

        /* Buttons */
        .hero-actions { flex-direction:column; align-items:center; }
        .btn { width:100%; max-width:280px; justify-content:center; }

        /* Profile */
        .hex-frame { width:200px; height:200px; }

        /* Modal full height */
        .modal-box { height:90svh; }
    }

    /* Very small */
    @media(max-width:360px){
        .hero-content h1 { font-size:2rem; }
        .stat-cluster { grid-template-columns:1fr; }
        .hex-frame { width:175px; height:175px; }
    }
    </style>
</head>
<body>

    <!-- Cursor glow -->
    <div class="cursor-glow" id="cursorGlow"></div>

    <!-- Nav overlay -->
    <div class="nav-overlay" id="navOverlay"></div>

    <!-- BACKGROUNDS -->
    <div class="nebula-bg">
        <div class="orb orb-1"></div>
        <div class="orb orb-2"></div>
        <div class="orb orb-3"></div>
    </div>
    <div class="dot-grid"></div>
    <canvas id="bg-canvas"></canvas>

    <!-- NAVBAR -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="nav-logo">FP<span class="dot">.</span></a>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#beranda"    class="nav-link active">Beranda</a></li>
                <li><a href="#tentang"    class="nav-link">Tentang</a></li>
                <li><a href="#keahlian"   class="nav-link">Keahlian</a></li>
                <li><a href="#proyek"     class="nav-link">Proyek</a></li>
                <li><a href="#pengalaman" class="nav-link">Pengalaman</a></li>
                <li><a href="#kontak"     class="nav-link">Kontak</a></li>
            </ul>
            <button class="hamburger" id="hamburger" aria-label="Toggle menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- HERO -->
    <section id="beranda" class="hero-section">
        <div class="hero-container">
            <div class="hero-content reveal">
                <div class="status-badge">
                    <span class="status-dot"></span>
                    Terbuka untuk Kesempatan Baru
                </div>
                <h1>
                    <span class="greeting">Halo, Saya</span>
                    <span class="name-shimmer">Ferju Prihamdani</span>
                </h1>
                <div class="hero-role">
                    <span class="prompt">>></span>&nbsp;<span class="typed-text"></span><span class="cursor"></span>
                </div>
                <p class="hero-desc">
                    Lulusan S1 Pendidikan Informatika dari Universitas PGRI Sumatera Barat dengan keahlian komprehensif dalam perancangan serta pengembangan aplikasi web dan mobile yang modern.
                </p>
                <div class="hero-actions">
                    <a href="#kontak" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Hubungi Saya
                    </a>
                    <a href="https://github.com/asmoday21" target="_blank" class="btn btn-ghost">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                </div>
            </div>

            <div class="profile-visual reveal" style="transition-delay:.2s">
                <div class="hex-frame">
                    <div class="hex-ring"></div>
                    <div class="hex-ring-outer"></div>
                    <div class="avatar-glow"></div>
                    <div class="profile-avatar">
                        <img src="{{asset('img/Ferju_Prihamdani.jpg')}}" alt="Ferju Prihamdani"
                             onerror="this.src='https://via.placeholder.com/270/0a1020/38bdf8?text=FP'">
                    </div>
                    <div class="float-icon fi-1"><i class="fab fa-laravel"></i></div>
                    <div class="float-icon fi-2"><i class="fas fa-database"></i></div>
                    <div class="float-icon fi-3"><i class="fab fa-flutter"></i></div>
                    <div class="float-icon fi-4"><i class="fas fa-paint-brush"></i></div>
                    <div class="float-icon fi-5"><i class="fab fa-js"></i></div>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <div class="scroll-wheel"></div>
            <span>scroll</span>
        </div>
    </section>

    <div class="divider"></div>

    <!-- ABOUT -->
    <section id="tentang" class="section">
        <div class="section-header reveal">
            <div class="section-label">Mengenal Lebih Dekat</div>
            <h2 class="section-heading">Tentang Saya</h2>
        </div>
        <div class="about-grid">
            <div class="about-text reveal">
                <p>Saya adalah lulusan <span class="hl">S1 Pendidikan Informatika</span> dari Universitas PGRI Sumatera Barat. Fokus keahlian saya mengarah pada pemecahan masalah melalui pemrograman web dan perangkat bergerak menggunakan <span class="hl">Laravel dan Flutter</span>.</p>
                <p>Saat ini, saya aktif mendedikasikan diri sebagai <span class="hl">Asisten Pengembang Teknologi Pembelajaran di BPS RI</span>. Dalam posisi ini, saya membantu pengembangan media pembelajaran berbasis teknologi serta mendukung proses pelatihan dan pengembangan SDM melalui penyusunan materi digital, administrasi kegiatan, dan koordinasi bersama tim agar pelaksanaan program berjalan dengan baik.</p>
                <p>Didukung dasar desain grafis dan dokumentasi visual (video editing), saya mengedepankan pendekatan kreatif untuk mengemas setiap fungsionalitas aplikasi dengan tampilan UI/UX yang dinamis serta menyenangkan mata pengguna.</p>
            </div>
            <div class="stat-cluster reveal" style="transition-delay:.15s">
                <div class="stat-tile card">
                    <div class="icon-wrap ic-blue"><i class="fas fa-graduation-cap"></i></div>
                    <div class="val">S1</div>
                    <div class="lbl">Pend. Informatika</div>
                </div>
                <div class="stat-tile card">
                    <div class="icon-wrap ic-violet"><i class="fas fa-briefcase"></i></div>
                    <div class="val">BPS</div>
                    <div class="lbl">Asisten Teknologi</div>
                </div>
                <div class="stat-tile card">
                    <div class="icon-wrap ic-green"><i class="fas fa-certificate"></i></div>
                    <div class="val">6</div>
                    <div class="lbl">Sertifikat Resmi</div>
                </div>
                <div class="stat-tile card">
                    <div class="icon-wrap ic-amber"><i class="fas fa-laptop-code"></i></div>
                    <div class="val">3+</div>
                    <div class="lbl">Proyek Mandiri</div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- SKILLS -->
    <section id="keahlian" class="section">
        <div class="section-header reveal">
            <div class="section-label">Kompetensi Teknologis</div>
            <h2 class="section-heading">Keahlian Saya</h2>
        </div>
        <div class="skills-grid">
            <div class="skill-card card reveal">
                <div class="skill-card-header">
                    <div class="skill-icon ic-blue"><i class="fas fa-code"></i></div>
                    <h3>Web Development</h3>
                </div>
                <div class="badge-wrap">
                    <span class="badge"><i class="fab fa-laravel"></i> Laravel</span>
                    <span class="badge"><i class="fab fa-php"></i> PHP</span>
                    <span class="badge"><i class="fas fa-database"></i> MySQL</span>
                    <span class="badge"><i class="fab fa-html5"></i> HTML5/CSS3</span>
                    <span class="badge"><i class="fab fa-js"></i> JavaScript</span>
                </div>
            </div>
            <div class="skill-card card reveal" style="transition-delay:.08s">
                <div class="skill-card-header">
                    <div class="skill-icon ic-green"><i class="fas fa-mobile-alt"></i></div>
                    <h3>Mobile Development</h3>
                </div>
                <div class="badge-wrap">
                    <span class="badge"><i class="fas fa-layer-group"></i> Flutter</span>
                    <span class="badge"><i class="fas fa-code-branch"></i> Dart</span>
                    <span class="badge"><i class="fas fa-fire"></i> Firebase</span>
                    <span class="badge"><i class="fas fa-mobile"></i> Mobile UI/UX</span>
                </div>
            </div>
            <div class="skill-card card reveal" style="transition-delay:.16s">
                <div class="skill-card-header">
                    <div class="skill-icon ic-amber"><i class="fas fa-paint-brush"></i></div>
                    <h3>Desain &amp; Kreatif</h3>
                </div>
                <div class="badge-wrap">
                    <span class="badge"><i class="fas fa-pen-nib"></i> Graphic Design</span>
                    <span class="badge"><i class="fas fa-video"></i> Video Editing</span>
                    <span class="badge"><i class="fas fa-image"></i> Canva</span>
                    <span class="badge"><i class="fas fa-film"></i> Adobe Premiere</span>
                    <span class="badge"><i class="fas fa-cut"></i> CapCut</span>
                </div>
            </div>
            <div class="skill-card card reveal" style="transition-delay:.24s">
                <div class="skill-card-header">
                    <div class="skill-icon ic-violet"><i class="fas fa-users"></i></div>
                    <h3>Karakter Personal</h3>
                </div>
                <div class="badge-wrap">
                    <span class="badge"><i class="fas fa-comments"></i> Public Speaking</span>
                    <span class="badge"><i class="fas fa-users-cog"></i> Kepemimpinan</span>
                    <span class="badge"><i class="fas fa-people-carry"></i> Kerja Sama Tim</span>
                    <span class="badge"><i class="fas fa-lightbulb"></i> Problem Solving</span>
                    <span class="badge"><i class="fas fa-sync-alt"></i> Adaptif</span>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- PROJECTS -->
    <section id="proyek" class="section">
        <div class="section-header reveal">
            <div class="section-label">Karya Terpilih</div>
            <h2 class="section-heading">Portofolio Proyek</h2>
        </div>
        <div class="projects-grid">
            <div class="project-card card reveal">
                <div class="project-visual pv-1">
                    <div class="pv-bg pv-1"></div>
                    <i class="fas fa-laptop-code pv-icon" style="color:var(--c-sky)"></i>
                    <span class="proj-badge">Web App</span>
                </div>
                <div class="project-body">
                    <div class="project-num">// 001</div>
                    <h3 class="project-title">Media Pembelajaran Web</h3>
                    <p class="project-desc">Aplikasi pembelajaran interaktif lengkap dengan sistem kuis dinamis, integrasi materi video responsif, dan dukungan visualisasi objek gambar 3D secara online.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Laravel</span>
                        <span class="tech-pill">MySQL</span>
                        <span class="tech-pill">Bootstrap</span>
                    </div>
                    <div class="project-actions">
                        <a href="#" class="proj-btn proj-btn-sec"><i class="fab fa-github"></i> Code</a>
                        <a href="#" class="proj-btn proj-btn-main"><i class="fas fa-external-link-alt"></i> Demo</a>
                    </div>
                </div>
            </div>
            <div class="project-card card reveal" style="transition-delay:.1s">
                <div class="project-visual pv-2">
                    <div class="pv-bg pv-2"></div>
                    <i class="fas fa-mobile-alt pv-icon" style="color:var(--c-emerald)"></i>
                    <span class="proj-badge">Mobile</span>
                </div>
                <div class="project-body">
                    <div class="project-num">// 002</div>
                    <h3 class="project-title">Mobile E-Learning App</h3>
                    <p class="project-desc">Platform edukasi multi-platform (Android/iOS) berbasis Flutter untuk mendukung belajar fleksibel. Terintegrasi fitur kuis real-time dan UI/UX interaktif.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Flutter</span>
                        <span class="tech-pill">Dart</span>
                        <span class="tech-pill">Firebase</span>
                    </div>
                    <div class="project-actions">
                        <a href="#" class="proj-btn proj-btn-sec"><i class="fab fa-github"></i> Repo</a>
                        <a href="#" class="proj-btn proj-btn-main"><i class="fas fa-external-link-alt"></i> App</a>
                    </div>
                </div>
            </div>
            <div class="project-card card reveal" style="transition-delay:.2s">
                <div class="project-visual pv-3">
                    <div class="pv-bg pv-3"></div>
                    <i class="fas fa-shopping-cart pv-icon" style="color:var(--c-amber)"></i>
                    <span class="proj-badge">E-Commerce</span>
                </div>
                <div class="project-body">
                    <div class="project-num">// 003</div>
                    <h3 class="project-title">E-Commerce Platform</h3>
                    <p class="project-desc">Sistem belanja online komprehensif didukung fungsionalitas mutakhir untuk mengelola stok inventaris produk, sistem pesanan instan, dan gateway pembayaran.</p>
                    <div class="tech-pills">
                        <span class="tech-pill">Laravel</span>
                        <span class="tech-pill">Vue.js</span>
                        <span class="tech-pill">REST API</span>
                    </div>
                    <div class="project-actions">
                        <a href="#" class="proj-btn proj-btn-sec"><i class="fab fa-github"></i> Code</a>
                        <a href="#" class="proj-btn proj-btn-main"><i class="fas fa-external-link-alt"></i> Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- EXPERIENCE -->
    <section id="pengalaman" class="section">
        <div class="section-header reveal">
            <div class="section-label">Riwayat Kegiatan</div>
            <h2 class="section-heading">Pengalaman &amp; Organisasi</h2>
        </div>
        <div class="timeline-wrap">
            <div class="tl-spine"><div class="tl-fill" id="tl-fill"></div></div>

            <div class="tl-item reveal">
                <div class="tl-node"></div>
                <div class="tl-card card">
                    <span class="tl-when">Des 2025 — Sekarang</span>
                    <h3 class="tl-role">Asisten Pengembang Teknologi Pembelajaran</h3>
                    <div class="tl-org"><i class="fas fa-building"></i> Badan Pusat Statistik RI (Maganghub)</div>
                    <p class="tl-body">Berkontribusi aktif dalam merancang serta meluncurkan modul pelatihan digital, ekosistem e-learning, simulasi teknologi interaktif, serta melengkapi tata administrasi kegiatan pembelajaran SDM.</p>
                </div>
            </div>
            <div class="tl-item reveal">
                <div class="tl-node"></div>
                <div class="tl-card card">
                    <span class="tl-when">Feb — Mar 2024</span>
                    <h3 class="tl-role">Ketua Divisi Perlengkapan &amp; Dokumentasi</h3>
                    <div class="tl-org"><i class="fas fa-users"></i> Panitia POLICE IT</div>
                    <p class="tl-body">Bertanggung jawab dalam hal pengadaan perlengkapan logistik pameran, meliput dokumentasi (foto dan video), serta menyajikan konten promosi digital berkala.</p>
                </div>
            </div>
            <div class="tl-item reveal">
                <div class="tl-node"></div>
                <div class="tl-card card">
                    <span class="tl-when">Agu 2023 — 2024</span>
                    <h3 class="tl-role">Divisi Departemen Teknologi Informasi</h3>
                    <div class="tl-org"><i class="fas fa-users"></i> HIMAFORTIKA</div>
                    <p class="tl-body">Membuat materi publikasi visual mingguan, menyusun tata letak poster kegiatan organisasi, serta membina komunikasi informasi antar pengurus himpunan.</p>
                </div>
            </div>
            <div class="tl-item reveal">
                <div class="tl-node"></div>
                <div class="tl-card card">
                    <span class="tl-when">Januari 2023</span>
                    <h3 class="tl-role">Divisi Dokumentasi</h3>
                    <div class="tl-org"><i class="fas fa-camera"></i> Panitia Pameran Desain Grafis</div>
                    <p class="tl-body">Memimpin dokumentasi aktivitas pengunjung serta merekam dan mengedit karya para peserta pameran untuk dijadikan materi promosi resmi di media sosial.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="divider"></div>

    <!-- CERTIFICATIONS -->
    <section class="section">
        <div class="section-header reveal">
            <div class="section-label">Sertifikasi &amp; Prestasi</div>
            <h2 class="section-heading">Bukti Kompetensi</h2>
        </div>
        <div class="cert-grid">
            <div class="cert-card card reveal">
                <div class="cert-icon-wrap ic-amber"><i class="fas fa-palette"></i></div>
                <div class="cert-body">
                    <h3>CISGD — Graphic Design</h3>
                    <div class="cert-issuer">PASAS Institute Singapore</div>
                    <div class="cert-validity">Berlaku s/d Nov 2028</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/CISGD.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card card reveal" style="transition-delay:.08s">
                <div class="cert-icon-wrap ic-blue"><i class="fas fa-network-wired"></i></div>
                <div class="cert-body">
                    <h3>MikroTik Network Associate</h3>
                    <div class="cert-issuer">MikroTik SIA (Skor: 81)</div>
                    <div class="cert-validity">Sep 2025 — Sep 2028</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/MTCNA.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card card reveal" style="transition-delay:.16s">
                <div class="cert-icon-wrap ic-violet"><i class="fas fa-laptop"></i></div>
                <div class="cert-body">
                    <h3>Pelatihan Keahlian TIK</h3>
                    <div class="cert-issuer">Univ. PGRI Sumatera Barat</div>
                    <div class="cert-validity">Agustus 2025</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/ICT.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card card reveal">
                <div class="cert-icon-wrap ic-green"><i class="fas fa-brain"></i></div>
                <div class="cert-body">
                    <h3>Belajar Dasar AI</h3>
                    <div class="cert-issuer">Dicoding Indonesia</div>
                    <div class="cert-validity">Tahun 2025</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/AI.pdf"><i class="fas fa-eye"></i> Preview Berkas</a>
                </div>
            </div>
            <div class="cert-card card reveal" style="transition-delay:.08s">
                <div class="cert-icon-wrap ic-amber"><i class="fas fa-award"></i></div>
                <div class="cert-body">
                    <h3>Pertukaran Mahasiswa 3</h3>
                    <div class="cert-issuer">ITENAS Bandung</div>
                    <div class="cert-validity">Tahun 2023</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/PMM.pdf"><i class="fas fa-eye"></i> Preview Dokumen</a>
                </div>
            </div>
            <div class="cert-card card reveal" style="transition-delay:.16s">
                <div class="cert-icon-wrap ic-blue"><i class="fas fa-trophy"></i></div>
                <div class="cert-body">
                    <h3>Digital Art Competition</h3>
                    <div class="cert-issuer">Literasi Digital Indonesia</div>
                    <div class="cert-validity">Tahun 2024</div>
                    <a href="javascript:void(0)" class="cert-link" data-preview="assets/docs/LITERASI.pdf"><i class="fas fa-eye"></i> Preview Sertifikat</a>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL -->
    <div id="previewModal" class="modal">
        <div class="modal-box">
            <div class="modal-bar">
                <span><i class="fas fa-file-alt"></i>&nbsp; Pratinjau Dokumen</span>
                <button class="modal-close"><i class="fas fa-times"></i></button>
            </div>
            <div id="modal-body"></div>
        </div>
    </div>

    <div class="divider"></div>

    <!-- CONTACT -->
    <section id="kontak" class="section">
        <div class="section-header centered reveal">
            <div class="section-label">Mari Terhubung</div>
            <h2 class="section-heading">Hubungi Saya</h2>
        </div>
        <div class="contact-grid">
            <a href="mailto:ferjuprihamdani@gmail.com" class="contact-tile card reveal">
                <div class="icon-bg ic-blue"><i class="fas fa-envelope"></i></div>
                <h4>Email</h4>
                <p>ferjuprihamdani@gmail.com</p>
            </a>
            <a href="tel:+6282287812915" class="contact-tile card reveal" style="transition-delay:.1s">
                <div class="icon-bg ic-green"><i class="fas fa-phone-alt"></i></div>
                <h4>Telepon / WhatsApp</h4>
                <p>+62 822-8781-2915</p>
            </a>
            <a href="https://www.linkedin.com/in/ferju-prihamdani-886628221" target="_blank" class="contact-tile card reveal" style="transition-delay:.2s">
                <div class="icon-bg ic-violet"><i class="fab fa-linkedin"></i></div>
                <h4>LinkedIn</h4>
                <p>Ferju Prihamdani</p>
            </a>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-logo">FP<span class="dot">.</span></div>
        <div class="footer-copy">&copy; 2025 Ferju Prihamdani — Dibangun dengan <i class="fas fa-heart"></i> &amp; HTML / CSS / JS</div>
    </footer>

    <!-- SCRIPTS -->
    <script>
    /* ===== CURSOR GLOW ===== */
    const glowEl = document.getElementById('cursorGlow');
    if(glowEl){
        document.addEventListener('mousemove', e => {
            glowEl.style.left = e.clientX + 'px';
            glowEl.style.top  = e.clientY + 'px';
        });
    }

    /* ===== CANVAS PARTICLES ===== */
    (function(){
        const canvas = document.getElementById('bg-canvas');
        const ctx = canvas.getContext('2d');
        let W, H;
        function resize(){ W = canvas.width = window.innerWidth; H = canvas.height = window.innerHeight; }

        const PCOUNT = window.innerWidth < 600 ? 18 : window.innerWidth < 1024 ? 30 : 48;
        class P {
            constructor(){ this.reset(true); }
            reset(init){
                this.x  = Math.random()*(W||1200);
                this.y  = init ? Math.random()*(H||800) : (Math.random()<.5 ? 0 : H);
                this.vx = (Math.random()-.5)*.22;
                this.vy = (Math.random()-.5)*.22;
                this.a  = Math.random()*.22 + .05;
                this.r  = Math.random()*1.1 + .4;
            }
            update(){
                this.x+=this.vx; this.y+=this.vy;
                if(this.x<0||this.x>W) this.vx*=-1;
                if(this.y<0||this.y>H) this.vy*=-1;
            }
            draw(){
                ctx.save(); ctx.globalAlpha=this.a;
                ctx.beginPath(); ctx.arc(this.x,this.y,this.r,0,Math.PI*2);
                ctx.fillStyle='#38bdf8'; ctx.fill(); ctx.restore();
            }
        }
        const pts=[];
        function init(){ pts.length=0; for(let i=0;i<PCOUNT;i++) pts.push(new P()); }
        function connect(){
            const max=125;
            for(let i=0;i<pts.length;i++){
                for(let j=i+1;j<pts.length;j++){
                    const dx=pts[i].x-pts[j].x, dy=pts[i].y-pts[j].y;
                    const d=Math.sqrt(dx*dx+dy*dy);
                    if(d<max){
                        ctx.strokeStyle=`rgba(56,189,248,${(1-d/max)*.09})`;
                        ctx.lineWidth=.6;
                        ctx.beginPath(); ctx.moveTo(pts[i].x,pts[i].y); ctx.lineTo(pts[j].x,pts[j].y); ctx.stroke();
                    }
                }
            }
        }
        function animate(){ ctx.clearRect(0,0,W,H); pts.forEach(p=>{p.update();p.draw();}); connect(); requestAnimationFrame(animate); }
        resize(); init(); animate();
        window.addEventListener('resize',()=>{ resize(); });
    })();

    /* ===== TYPING ===== */
    const typedEl = document.querySelector('.typed-text');
    const phrases  = ['Web Developer','Mobile Developer','Graphic Designer','Tech Enthusiast'];
    let pi=0, ci=0;
    function type(){
        if(ci<phrases[pi].length){ typedEl.textContent+=phrases[pi][ci++]; setTimeout(type,85); }
        else { setTimeout(erase,2600); }
    }
    function erase(){
        if(ci>0){ typedEl.textContent=phrases[pi].slice(0,--ci); setTimeout(erase,38); }
        else { pi=(pi+1)%phrases.length; setTimeout(type,500); }
    }
    setTimeout(type,900);

    /* ===== REVEAL ===== */
    const revealEls = document.querySelectorAll('.reveal');
    if('IntersectionObserver' in window){
        const obs = new IntersectionObserver(entries=>{
            entries.forEach(e=>{ if(e.isIntersecting) e.target.classList.add('active'); });
        },{ threshold:.08, rootMargin:'0px 0px -25px 0px' });
        revealEls.forEach(el=>obs.observe(el));
    } else {
        revealEls.forEach(el=>el.classList.add('active'));
    }

    /* ===== NAVBAR + TIMELINE ===== */
    const navbar   = document.getElementById('navbar');
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');
    const tlFill   = document.getElementById('tl-fill');
    const tlWrap   = document.querySelector('.timeline-wrap');

    window.addEventListener('scroll',()=>{
        navbar.classList.toggle('scrolled', scrollY > 40);

        let cur='';
        sections.forEach(s=>{ if(scrollY >= s.offsetTop-200) cur=s.id; });
        navLinks.forEach(l=>{
            l.classList.toggle('active', l.getAttribute('href')==='#'+cur);
        });

        if(tlWrap && tlFill){
            const r = tlWrap.getBoundingClientRect();
            if(r.top < window.innerHeight && r.bottom > 0){
                const pct = Math.max(0, Math.min(100,(window.innerHeight-r.top)/r.height*100));
                tlFill.style.height = pct+'%';
            }
        }
    }, { passive:true });

    /* ===== HAMBURGER ===== */
    const ham      = document.getElementById('hamburger');
    const navMenu  = document.getElementById('navMenu');
    const overlay  = document.getElementById('navOverlay');
    const hamSpans = ham.querySelectorAll('span');

    function openMenu(){
        navMenu.classList.add('active');
        overlay.classList.add('active');
        hamSpans[0].style.transform='rotate(45deg) translate(5px,7px)';
        hamSpans[1].style.opacity='0';
        hamSpans[2].style.transform='rotate(-45deg) translate(5px,-7px)';
        document.body.style.overflow='hidden';
    }
    function closeMenu(){
        navMenu.classList.remove('active');
        overlay.classList.remove('active');
        hamSpans[0].style.transform='';
        hamSpans[1].style.opacity='';
        hamSpans[2].style.transform='';
        document.body.style.overflow='';
    }
    ham.addEventListener('click', ()=>{ navMenu.classList.contains('active') ? closeMenu() : openMenu(); });
    overlay.addEventListener('click', closeMenu);
    navLinks.forEach(l=>l.addEventListener('click', closeMenu));

    /* ===== SMOOTH SCROLL ===== */
    document.querySelectorAll('a[href^="#"]').forEach(a=>{
        a.addEventListener('click', e=>{
            e.preventDefault();
            const t = a.getAttribute('href');
            if(t==='#') return;
            const el = document.querySelector(t);
            if(el) window.scrollTo({ top: el.offsetTop-72, behavior:'smooth' });
        });
    });

    /* ===== MODAL ===== */
    const modal     = document.getElementById('previewModal');
    const modalBody = document.getElementById('modal-body');
    const closeBtn  = document.querySelector('.modal-close');

    document.querySelectorAll('.cert-link').forEach(l=>{
        l.addEventListener('click', e=>{
            e.preventDefault();
            const url = l.getAttribute('data-preview');
            modalBody.innerHTML = url
                ? (url.match(/\.(jpg|jpeg|png|gif)$/i)
                    ? `<img src="${url}" alt="Preview">`
                    : `<iframe src="${url}" title="Preview"></iframe>`)
                : `<div style="text-align:center;color:#8fa8c8;padding:2rem;font-family:var(--font-body)"><i class="fas fa-times-circle" style="font-size:2.5rem;color:#ef4444;display:block;margin-bottom:1rem"></i><p>Berkas tidak ditemukan.</p></div>`;
            modal.classList.add('show');
            document.body.style.overflow='hidden';
        });
    });
    function closeModal(){
        modal.classList.remove('show');
        document.body.style.overflow='';
        setTimeout(()=>{ modalBody.innerHTML=''; },300);
    }
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', e=>{ if(e.target===modal) closeModal(); });
    document.addEventListener('keydown', e=>{ if(e.key==='Escape') closeModal(); });

    /* ===== SUBTLE CARD TILT (desktop only) ===== */
    if(window.matchMedia('(hover:hover)').matches){
        document.querySelectorAll('.card').forEach(card=>{
            card.addEventListener('mousemove', e=>{
                const r = card.getBoundingClientRect();
                const x = (e.clientX - r.left)/r.width  - .5;
                const y = (e.clientY - r.top) /r.height - .5;
                card.style.transform = `translateY(-5px) rotateX(${-y*5}deg) rotateY(${x*5}deg)`;
            });
            card.addEventListener('mouseleave', ()=>{ card.style.transform=''; });
        });
    }
    </script>
</body>
</html>