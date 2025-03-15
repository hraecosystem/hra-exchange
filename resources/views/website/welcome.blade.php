<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HRA Coin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="{{ asset('website/img/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.18/sweetalert2.min.css"/>
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet"/>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16806753499">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16806753499');
    </script>
    <style>
        :root {
            --primary: #393185;
            --primary-hover: #2d2668;
            --text-light: rgba(255, 255, 255, 0.8);
            --spacing-lg: 6rem;
            --spacing-md: 4rem;
            --spacing-sm: 2rem;
            --border-radius: 20px;
            --transition: all 0.3s ease;
        }

        /* Améliorations globales */
        section {
            padding: var(--spacing-lg) 0;
            position: relative;
            overflow: hidden;
        }

        .section-title {
            margin-bottom: var(--spacing-md);
        }

        /* Amélioration des cartes */
        .component-card, .feature-card, .benefit-card {
            background: white;
            border-radius: var(--border-radius);
            padding: var(--spacing-sm);
            transition: var(--transition);
            height: 100%;
            box-shadow: 0 10px 30px rgba(57, 49, 133, 0.1);
            border: 1px solid rgba(57, 49, 133, 0.1);
        }

        .component-card:hover, .feature-card:hover, .benefit-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(57, 49, 133, 0.15);
            border-color: var(--primary);
        }

        /* Amélioration des icônes */
        .component-icon, .benefit-icon {
            width: 70px;
            height: 70px;
            background: var(--primary);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: var(--transition);
        }

        .component-icon svg, .benefit-icon svg {
            width: 35px;
            height: 35px;
            color: white;
        }

        /* Amélioration des textes */
        h2.bo {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #666;
        }

        /* Amélioration des badges */
        .fn {
            display: inline-block;
            padding: 0.75rem 2rem;
            background: rgba(57, 49, 133, 0.1);
            border-radius: 30px;
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1rem;
            letter-spacing: 0.5px;
        }

        /* Amélioration des liens */
        .component-link {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            margin-top: 1.5rem;
        }

        .component-link:hover {
            gap: 1.25rem;
            color: var(--primary-hover);
        }

        /* Amélioration des grilles */
        .grid {
            gap: 2rem;
        }

        /* Amélioration des sections avec fond coloré */
        section[style*="background: linear-gradient"] {
            position: relative;
        }

        section[style*="background: linear-gradient"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url("{{ asset('website/img/pattern.svg') }}");
            opacity: 0.05;
            z-index: 1;
        }

        section[style*="background: linear-gradient"] > * {
            z-index: 2;
        }

        /* Amélioration des animations */
        .wow {
            animation-duration: 1s;
        }

        .fadeInUp {
            animation-name: fadeInUp;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }
            to {
                opacity: 1;
                transform: translate3d(0, 0, 0);
            }
        }

        /* Amélioration du responsive */
        @media (max-width: 768px) {
            h2.bo {
                font-size: 2.25rem;
            }
            
            section {
                padding: var(--spacing-md) 0;
            }
            
            .grid {
                gap: 1.5rem;
            }
        }

        .bounce-arrow {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            color: #393185;
            font-size: 32px;
            cursor: pointer;
            z-index: 10;
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            animation: bounce 2s infinite;
        }

        .bounce-arrow:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(-50%) translateY(-5px);
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0) translateX(-50%);
            }
            40% {
                transform: translateY(-20px) translateX(-50%);
            }
            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        .animated {
            animation-duration: 2s;
            animation-fill-mode: both;
        }

        .infinite {
            animation-iteration-count: infinite;
        }

        .distribution-list {
            margin-top: 2rem;
        }

        .distribution-list .qb {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        /* Styles pour la section Our Companies */
        #companies {
            padding: 4rem 0;
            background: linear-gradient(180deg, #393185 0%, #2d2668 100%);
            color: white;
        }

        .companies-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 0 1rem;
        }

        .companies-header h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: white;
        }

        .companies-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 2rem;
        }

        .section-divider {
            width: 60px;
            height: 4px;
            background: rgba(255, 255, 255, 0.2);
            margin: 0 auto;
        }

        .hra-epay {
            margin-left: 2em;
            margin-right: 2em;
            padding: 2rem 0;
            margin-bottom: 2rem;
        }

        .epay-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .epay-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
            padding: 0 1rem;
        }

        .epay-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .location-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(57, 49, 133, 0.1);
            border-radius: 20px;
            color: var(--primary);
        }

        .epay-visual {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .epay-card {
            width: 100%;
            max-width: 400px;
            aspect-ratio: 16/9;
            background: rgba(62, 125, 255, 0.1);
            border-radius: 12px;
            padding: 2rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .epay-logo {
            width: 100%;
            height: auto;
            max-height: 200px;
            object-fit: contain;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .social-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            background: rgba(57, 49, 133, 0.1);
            border-radius: 20px;
            color: var(--primary);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-link:hover {
            background: var(--primary);
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .epay-grid {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .location-badge {
                justify-content: center;
            }

            .social-links {
                justify-content: center;
            }

            .companies-header h1 {
                font-size: 2rem;
            }

            .companies-subtitle {
                font-size: 1rem;
            }

            .epay-card {
                max-width: 100%;
            }

            .primary-btn {
                margin: 1rem auto !important;
            }
        }

        /* Styles existants ... */

        /* Styles pour Why HRA Coin? section */
        #features {
            padding: 6rem 0;
            background: linear-gradient(180deg, rgba(57, 49, 133, 0.05) 0%, rgba(57, 49, 133, 0) 100%);
        }

        #features .wow {
            animation-duration: 1s;
        }

        #features .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        #features .fn {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(57, 49, 133, 0.1);
            border-radius: 30px;
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        #features .bo {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #2d2668, #393185);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #features .feature-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(57, 49, 133, 0.1);
        }

        #features .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(57, 49, 133, 0.1);
            border-color: var(--primary);
        }

        #features .feature-card h3 {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #features .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Styles pour Our Solutions section */
        #components {
            padding: 6rem 0;
            background: linear-gradient(180deg, #393185 0%, #2d2668 100%);
        }

        #components .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        #components .fn {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            color: white;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        #components .bo {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: white;
        }

        #components .component-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            height: 100%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            flex-direction: column;
            margin: 0.5rem;
        }

        #components .component-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(62, 125, 255, 0.1);
        }

        #components .component-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }

        #components .component-icon svg {
            width: 30px;
            height: 30px;
            color: white;
        }

        #components .component-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        #components .component-content h3 {
            color: var(--primary);
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        #components .component-content p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        #components .component-link {
            margin-top: auto;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        #components .component-link:hover {
            gap: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            #features .bo,
            #components .bo {
                font-size: 2rem;
            }

            #features .feature-card,
            #components .component-card {
                margin-bottom: 2rem;
            }

            #features,
            #components {
                padding: 4rem 0;
            }

            .component-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
        }

        /* Styles existants ... */

        /* Styles pour Why Choose HRA section */
        #why-choose {
            padding: 6rem 0;
            background: linear-gradient(180deg, rgba(62, 125, 255, 0.02) 0%, rgba(62, 125, 255, 0.08) 100%);
            position: relative;
            overflow: hidden;
        }

        #why-choose::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('website/img/pattern.svg') }}");
            background-repeat: repeat;
            opacity: 0.05;
            z-index: 0;
        }

        #why-choose .section-content {
            position: relative;
            z-index: 1;
        }

        #why-choose .fn {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background: rgba(62, 125, 255, 0.1);
            border-radius: 30px;
            color: var(--primary);
            font-weight: 500;
            margin-bottom: 1rem;
        }

        #why-choose .bo {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, #2d2668, #393185);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        #why-choose .benefits-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
            margin-top: 3rem;
        }

        #why-choose .benefit-card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 2rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(62, 125, 255, 0.1);
        }

        #why-choose .benefit-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--primary), #2d2668);
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: left;
        }

        #why-choose .benefit-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(62, 125, 255, 0.1);
        }

        #why-choose .benefit-card:hover::before {
            transform: scaleX(1);
        }

        #why-choose .benefit-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        #why-choose .benefit-card:hover .benefit-icon {
            transform: scale(1.1) rotate(5deg);
        }

        #why-choose .benefit-icon svg {
            width: 30px;
            height: 30px;
            color: white;
        }

        #why-choose .benefit-title {
            font-size: 1.25rem;
            color: #2d2668;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        #why-choose .benefit-description {
            color: #666;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        @media (max-width: 1024px) {
            #why-choose .benefits-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            #why-choose {
                padding: 4rem 0;
            }

            #why-choose .bo {
                font-size: 2rem;
            }

            #why-choose .benefits-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            #why-choose .benefit-card {
                padding: 1.5rem;
            }
        }

        .text-decoration-underline {
            background-color: #393185;
            color: white !important;
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none !important;
            transition: all 0.3s ease;
            display: inline-block;
            margin-left: 10px;
        }

        .text-decoration-underline:hover {
            background-color: #2d2668;
            transform: translateY(-2px);
        }

        .oe.of.zg.wg {
            display: inline-flex;
            align-items: center;
            padding: 1rem 2rem;
            background: linear-gradient(90deg, #376DF9, #393185);
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 3rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            animation: fadeIn 1s ease-out 0.6s;
            opacity: 0;
            animation-fill-mode: forwards;
        }

        .pa.li.pi.ui.yi.vl.bo {
            font-size: 3.5rem;
            font-weight: 700;
            background: linear-gradient(90deg, #376DF9, #393185);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            line-height: 1.2;
        }

        .bottom:after {
            content: '';
            position: absolute;
            width: 60%;
            height: 3px;
            background: linear-gradient(90deg, #376DF9 0%, #2d2668 100%);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }
        
        /* Amélioration des animations */
    </style>
</head>

<body x-data="
      {
        scrolledFromTop: false,
        init() {
            window.addEventListener('scroll', () => {
                this.scrolledFromTop = window.pageYOffset > 50;
            });
        }
      }
    " class="kf fl">
<header x-data="
        {
          navbarOpen: false,
          dropdownOpen: false
        }
      " :class="scrolledFromTop ? 'kf gl zf rl ij oj ' : ' lf hl' " class="f ba qb jc be c">
    <div class="a">
        <div class="e ha qb be ee">
            <div class="kc zc ng">
                <a href="/" :class="scrolledFromTop && 'og gp' " class="ob jc ah ip">
                    <img src="{{ asset('website/img/logo_main.png') }}" alt="logo" class="jc xk header_logo"/>
                    <img src="{{ asset('website/img/logo_main.png') }}" alt="logo" class="sb jc wk header_logo"/>
                </a>
            </div>
            <div class="qb jc be ce ng">
                <div>
                    <button @click="navbarOpen = !navbarOpen" :class="navbarOpen && 'navbarTogglerActive' "
                            id="navbarToggler"
                            class="d g h/2 ob qd/2 me pg qg mj qk to">
                        <span :class="navbarOpen && 'sd i' " class="e ia ob tb lc mf il"></span>
                        <span :class="navbarOpen && 'fj' " class="e ia ob tb lc mf il"></span>
                        <span :class="navbarOpen && 'j td' " class="e ia ob tb lc mf il"></span>
                    </button>
                    <nav :class="!navbarOpen && 'sb' " id="navbarCollapse"
                         class="d g k jc _c me kf rg sg jj fl fo qo uo cp dp hp xp bq">
                        <ul class="vq ro flex justify-center items-center w-full space-x-4">
                            <li>
                                <a href="#features"
                                   class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                                    Features
                                </a>
                            </li>
                            <li>
                                <a href="#tokenomics"
                                   class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                                    Tokenomics
                                </a>
                            </li>
                            <li>
                                <a href="#roadmap"
                                   class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                                    Roadmap
                                </a>
                            </li>
                            <li class="sk submenu-item e">
                                <a href="https://hra-whitepaper.gitbook.io/hra-whitepaper" target="_blank" class="qb tg gi oi xi kk ul em ko so ip">
                                    WhitePaper
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('member.login.create') }}"
                                   class="qb tg gi oi xi kk ul em ko so ip">
                                    Login
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="qb ce lh pp oq 2xl:ud-pl-20">
                    <div class="sb pm">
                        <a href="https://www.hra-exchange.com" target="_blank"
                           class="qb be de oe re ze vg wg ii oi xi qj ek fk lk zk vl am fm lg:px-4 xl:px-8">
                            Buy Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section id="home" class="e ca wh xh">
    <div class="a">
        <div class="ha qb _d">
            <div class="jc ng">
                <div class="la  fi">
                    <h1 class="pa li pi ui yi vl bo bottom">
                        Welcome to HRA Experience Ecosystem
                    </h1>
                    <p class="la pa gd gi qi xi vl">
                        Discover a revolutionary platform that transforms travel, payments, and finance through blockchain and digital solutions
                    </p>
                   
                    <a href="{{ route('member.register.create') }}"
                       class="oe of zg wg ii oi zi hk dark:hover:bg-opacity-90">
                        Get Started
                    </a>
                    
                    <a href="#about" class="bounce-arrow animated infinite">
                        <i class="fas fa-chevron-down text-4xl"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="d f l ea yb jc gj" style="
          background-image: linear-gradient(
            180deg,
            #393185 0%,
            rgba(57, 49, 133, 0) 100%
          );
        "></div>
    <img src="{{ asset('website/img/hero-shape-1.svg') }}" alt class="d l f ea"/>
    <img src="{{ asset('website/img/hero-shape-2.svg') }}" alt class="d m f ea"/>
</section>

<section id="about" class="th zh">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn">About Us</span>
            <h2 class="va li pi ui yi vl bo">What is the HRA Ecosystem?</h2>
            <p class="gi qi xi ul">
                The HRA ecosystem is an innovative and comprehensive platform that revolutionizes the world of travel, payments, and finance through blockchain and digital solutions. We've created an interconnected system that simplifies every aspect of travel, from hotel and flight bookings to cryptocurrency and fiat payment management.
            </p>
        </div>
    </div>
    <div class="d f l ea yb jc gj" style="
          background-image: linear-gradient(
            180deg,
            #393185 0%,
            rgba(57, 49, 133, 0) 100%
          );
        "></div>
</section>

<section id="why-choose" class="th zh">
    <div class="section-content a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="fn" style="background: rgba(57, 49, 133, 0.1); color: var(--primary);">Benefits</span>
            <h2 class="bo">Why Choose HRA Ecosystem</h2>
            <p class="gi qi xi ul">
                Discover the unique advantages that make the HRA ecosystem the ideal choice for your financial and travel needs.
            </p>
        </div>

        <div class="benefits-grid">
            <div class="wow fadeInUp" data-wow-delay="0s">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title">All-in-One Platform</h3>
                    <p class="benefit-description">
                        A single platform for all your needs - No more juggling between different services.
                    </p>
                </div>
            </div>

            <div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 6L12 12L16 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Fast & Secure</h3>
                    <p class="benefit-description">
                        Fast, secure and intermediary-free - Thanks to blockchain and smart contracts.
                    </p>
                </div>
            </div>

            <div class="wow fadeInUp" data-wow-delay="0.4s">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 15C15.866 15 19 11.866 19 8C19 4.13401 15.866 1 12 1C8.13401 1 5 4.13401 5 8C5 11.866 8.13401 15 12 15Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M8 14.6L3 21.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M16 14.6L21 21.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 8L14 10L18 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Exclusive Benefits</h3>
                    <p class="benefit-description">
                        Exclusive benefits for users - Discounts, flexible payments and simplified management.
                    </p>
                </div>
            </div>

            <div class="wow fadeInUp" data-wow-delay="0.6s">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M2 12H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                    </div>
                    <h3 class="benefit-title">Global Access</h3>
                    <p class="benefit-description">
                        Accessible worldwide - An ecosystem designed for globe-trotters and entrepreneurs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="components" class="th zh" style="background: linear-gradient(180deg, #393185 0%, #2d2668 100%);">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="fn" style="background: rgba(255, 255, 255, 0.1); color: white;">Our Solutions</span>
            <h2 class="bo" style="color: white;">HRA Ecosystem Components</h2>
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6 component-grid">
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="component-card">
                        <div class="component-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0 0 24 24">
                                <path fill="white" d="M 12 0 C 5.3844276 0 0 5.3844276 0 12 C 0 18.615572 5.3844276 24 12 24 C 18.615572 24 24 18.615572 24 12 C 24 5.3844276 18.615572 0 12 0 z M 12 2 C 17.534692 2 22 6.4653079 22 12 C 22 17.534692 17.534692 22 12 22 C 6.4653079 22 2 17.534692 2 12 C 2 6.4653079 6.4653079 2 12 2 z M 10 4 L 10 6 L 8 6 L 8 18 L 10 18 L 10 20 L 11 20 L 11 18 L 12 18 L 12 20 L 13 20 L 13 17.980469 C 14.209519 17.930578 15.172192 17.649175 15.861328 17.113281 C 16.620328 16.522281 17 15.653859 17 14.505859 C 17 13.840859 16.819984 13.256 16.458984 12.75 C 16.106984 12.256 15.578812 11.933391 14.882812 11.775391 C 15.621813 11.226391 16 10.43 16 9.375 L 16 9.2871094 C 16 8.1941094 15.603547 7.3732187 14.810547 6.8242188 C 14.327154 6.4895619 13.714227 6.2694752 13 6.1386719 L 13 4 L 12 4 L 12 6.0253906 C 11.833177 6.0168322 11.676531 6 11.5 6 L 11 6 L 11 4 L 10 4 z M 10.410156 8 L 12 8 C 12.375 8 12.714453 8.0849375 13.064453 8.3359375 C 13.414453 8.5869375 13.589844 8.974 13.589844 9.5 C 13.589844 9.98 13.417312 10.426734 13.070312 10.677734 C 12.722312 10.927734 12.375 11 12 11 L 10.410156 11.001953 L 10.410156 8 z M 10.410156 13 L 12.814453 13 C 13.430453 13 13.881969 13.135297 14.167969 13.404297 C 14.453969 13.673297 14.597656 14.062266 14.597656 14.572266 C 14.597656 15.043266 14.42975 15.398672 14.09375 15.638672 C 13.75775 15.879672 13.271812 16 12.632812 16 L 10.410156 16 L 10.410156 13 z"></path>
                            </svg>
                        </div>
                        <div class="component-content">
                            <h3>HRA Coin</h3>
                            <p>
                                Our exclusive cryptocurrency, designed for fast and secure payments in the travel universe.
                            </p>
                            <a href="https://www.hra-coin.com" target="_blank" class="component-link">
                                Visit Website
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="component-card">
                        <div class="component-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M2 22H22" stroke="white" stroke-width="2"/>
                                <path d="M2 22V9L12 2L22 9V22" stroke="white" stroke-width="2"/>
                                <path d="M15 22V15H9V22" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="component-content">
                            <h3>HRA Experience</h3>
                            <p>
                                A hotel booking platform with no hidden fees, offering flexible monthly payments up to €6000 in negative balance.
                            </p>
                            <a href="https://www.hra-experience.com" target="_blank" class="component-link">
                                Visit Website
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="component-card">
                        <div class="component-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect x="2" y="4" width="20" height="16" rx="2" stroke="white" stroke-width="2"/>
                                <path d="M2 10H22" stroke="white" stroke-width="2"/>
                                <path d="M6 15H10" stroke="white" stroke-width="2"/>
                            </svg>
                        </div>
                        <div class="component-content">
                            <h3>HRA Epay</h3>
                            <p>
                                A digital payment service with interest-free debit cards and instant crypto-to-euro conversion.
                            </p>
                            <a href="https://www.hra-epay.com" target="_blank" class="component-link">
                                Visit Website
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="component-card">
                        <div class="component-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF"><path d="m397-115-99-184-184-99 71-70 145 25 102-102-317-135 84-86 385 68 124-124q23-23 57-23t57 23q23 23 23 56.5T822-709L697-584l68 384-85 85-136-317-102 102 26 144-71 71Z"/></svg>
                        </div>
                        <div class="component-content">
                            <h3>HRA Airline</h3>
                            <p>
                                Book flights with 15% off all tickets and access exclusive rates for frequent travelers.
                            </p>
                            <a href="https://www.hra-airlines.com" target="_blank" class="component-link">
                                Visit Website
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="component-card">
                        <div class="component-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M2 2v20h20" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                <path d="M4 16l4-4 4 4 8-8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="component-content">
                            <h3>HRA Exchange</h3>
                            <p>
                                A crypto exchange platform for buying, selling, and managing digital assets with ease.
                            </p>
                            <a href="https://www.hra-exchange.com" target="_blank" class="component-link">
                                Visit Website
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                    <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d l z ea">
        <img src="{{ asset('website/img/faq-shape-1.svg') }}" alt="shape"/>
    </div>
</section>
<section id="roadmap" class="e ca gh">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn"> Timeline </span>
            <h2 class="va li pi ui yi vl bo">HRA Coin Timeline</h2>
            <p class="gi qi xi ul">
                HRA Coin is developed on the Binance Smart Chain (BSC), a reliable blockchain known for its high speed
                and low transaction costs.
            </p>
        </div>
        <div class="ha qb de">
            <div class="jc ng zo/12 iq/12">
                <div class="wow fadeInUp e ha qb _d yn mp" data-wow-delay="0s">
                    <span class="d f w sb yb sc nf nl ln/2 un"></span>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl rn sn ao oo">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl mn nn un io"></span>
                            <span class="d x h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">1. June 2024</h3>
                            <h3 class="va ji pi yi vl">Preparation & Planning</h3>
                            <p class="za ii qi xi ul">
                                <b>Planning & Development:</b>
                                Development of HRA Coin begins, including the design of the HRA Coin website and its
                                integration into the HRA Experience Ecosystem.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Team Formation:</b>
                                A dedicated team is assembled to focus on development, marketing, and legal aspects of
                                HRA Coin.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>ICO Preparation:</b>
                                Preparations for the Initial Coin Offering (ICO) are initiated, including the setup of
                                sales platforms.
                            </p>
                        </div>
                    </div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl tn sn po">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl on pn un jo"></span>
                            <span class="d y h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">2. August 2024</h3>
                            <h3 class="va ji pi yi vl">Website & Marketing</h3>
                            <p class="za ii qi xi ul">
                                <b>Website Development:</b>
                                The HRA Coin website is launched, featuring a purchase module where investors can buy
                                HRA Coin at 1 euro per coin.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Marketing Campaign:</b>
                                A marketing campaign is initiated to raise awareness of HRA Coin and highlight the
                                benefits of investing.
                            </p>
                        </div>
                    </div>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl rn sn ao oo">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl mn nn un io"></span>
                            <span class="d x h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">3. October 2024</h3>
                            <h3 class="va ji pi yi vl">Strengthening Partnerships</h3>
                            <p class="za ii qi xi ul">
                                <b>Expanding Partnerships:</b>
                                Partners are confirmed to accept HRA Coin for payments within their
                                services.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Financial Plan:</b>
                                A detailed financial plan will be created for the ICO launch and the period ahead.
                            </p>
                        </div>
                    </div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl tn sn po">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl on pn un jo"></span>
                            <span class="d y h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">4. December 2024</h3>
                            <h3 class="va ji pi yi vl">ICO Phase Start</h3>
                            <p class="za ii qi xi ul">
                                <b>Official ICO Launch:</b>
                                On December 1, 2024, the initial coin offering of HRA Coin will officially launch,
                                allowing global access to investors.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Community Engagement:</b>
                                Early investors will be able to purchase HRA Coin via the website, starting at 1 Euro
                                per coin. Active promotion and community engagement continues.
                            </p>
                        </div>
                    </div>
                    <span class="d f w sb yb sc nf nl ln/2 un"></span>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl rn sn ao oo">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl mn nn un io"></span>
                            <span class="d x h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">5. 2025</h3>
                            <h3 class="va ji pi yi vl">Further Growth & Innovation</h3>
                            <p class="za ii qi xi ul">
                                <b>Expand Partnerships:</b>
                                Continue to expand the number of partners accepting HRA Coin.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Innovation:</b>
                                Introducing new features and enhancements, such as additional wallet integrations and
                                more user-friendly payment options for HRA Coin users.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d l n ea">
        <img src="{{ asset('website/img/timeline.svg') }}" alt="shape"/>
    </div>
</section>

<section id="companies" class="th zh" style="background: linear-gradient(180deg, #393185 0%, #2d2668 100%);">
    <div class="companies-header">
        <h1 style="color: white;">Our Companies</h1>
        <p class="companies-subtitle" style="color: rgba(255, 255, 255, 0.8);">Discover our ecosystem of innovative companies</p>
        <div class="section-divider" style="background: rgba(255, 255, 255, 0.2);"></div>
    </div>

    <!-- 1. HRA Web3 -->
    <section class="hra-epay" style="
    background: white;
    border-radius: 25px;
    padding: 1em;
">
        <div class="a">
            <div class="epay-header">
                <h2 style="color: #393185;">HRA Web3</h2>
                <p style="color: #393185;">Your Trusted Blockchain Solution in Dubai</p>
            </div>

            <div class="epay-grid">
                <div class="epay-content">
                    <div class="location-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 22C14 18 20 15.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 15.4183 10 18 12 22Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Dubai, UAE</span>
                    </div>
                    
                    <h3>Licensed Blockchain Institution</h3>
                    <p>HRA Web3 is a regulated blockchain solutions provider offering secure and innovative decentralized services worldwide.</p>
                    
                    <div class="web3-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                            <a href="{{ asset('assets/pdfs/hra-web3-license.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline">
                                Licence
                            </a>
                        </div>
                    </div>

                    <div class="web3-links">
                        <a href="https://www.hra-web3.com" target="_blank" rel="noopener noreferrer" class="primary-btn" style="margin: 1em 0; width: 200px; text-align: center;">
                            Visit HRA Web3
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="social-links">
                            <a href="https://x.com/Hra_web3" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="https://www.instagram.com/Hra_web3" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>
                            <a href="https://www.youtube.com/@HRAWeb3" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-youtube"></i>
                                YouTube
                            </a>
                            <a href="https://www.tiktok.com/@hra.web3" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div class="epay-visual">
                    <div class="epay-card">
                        <img src="{{ asset('images/hra-web3.png') }}" alt="HRA Web3" class="epay-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. HRA ePay -->
    <section class="hra-epay" style="
    background: white;
    border-radius: 25px;
    padding: 1em;
">
        <div class="a">
            <div class="epay-header">
                <h2 style="color: #393185;">HRA ePay</h2>
                <p style="color: #393185;">Your Trusted Payment Solution</p>
            </div>

            <div class="epay-grid">
                <div class="epay-content">
                    <div class="location-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 22C14 18 20 15.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 15.4183 10 18 12 22Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Sharjah, UAE</span>
                    </div>
                    
                    <h3>Licensed Payment Institution</h3>
                    <p>HRA ePay is a regulated payment gateway providing secure and efficient payment solutions for businesses worldwide.</p>
                    
                    <div class="epay-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                            <a href="{{ asset('assets/pdfs/hra-epay-license.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline">
                                Licence
                            </a>
                        </div>
                    </div>

                    <div class="epay-links">
                        <a href="https://www.hra-epay.com" target="_blank" rel="noopener noreferrer" class="primary-btn" style="margin: 1em 0; width: 200px; text-align: center;">
                            Visit HRA-ePay
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="social-links">
                            <a href="https://x.com/HraEpay" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="https://www.instagram.com/hra.epay/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>
                            <a href="https://www.youtube.com/@HRAePay" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-youtube"></i>
                                YouTube
                            </a>
                            <a href="https://www.tiktok.com/@hra.epay" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div class="epay-visual">
                    <div class="epay-card">
                        <img src="{{ asset('images/logo-hraepay.avif') }}" alt="HRA ePay" class="epay-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. HRA Financial Brokers -->
    <section class="hra-epay" style="
    background: white;
    border-radius: 25px;
    padding: 1em;
">
        <div class="a">
            <div class="epay-header">
                <h2 style="color: #393185;">HRA Financial Brokers</h2>
                <p style="color: #393185;">Your Trusted Financial Broker in Dubai</p>
            </div>

            <div class="epay-grid">
                <div class="epay-content">
                    <div class="location-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 22C14 18 20 15.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 15.4183 10 18 12 22Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Dubai, UAE</span>
                    </div>
                    
                    <h3>Licensed Financial Brokerage</h3>
                    <p>HRA Financial Brokers provides professional trading services and investment solutions for global markets.</p>
                    
                    <div class="brokers-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                            <a href="{{ asset('assets/pdfs/hra-brokers-license.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline">
                                Licence
                            </a>
                        </div>
                    </div>

                    <div class="brokers-links">
                        <a href="https://www.hra-brokers.com" target="_blank" rel="noopener noreferrer" class="primary-btn" style="margin: 1em 0; width: 200px; text-align: center;">
                            Visit HRA Exchange
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="social-links">
                            <a href="https://x.com/Hra_exchange" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-twitter"></i>
                                Twitter
                            </a>
                            <a href="https://www.instagram.com/hra.exchange/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>
                            <a href="https://www.youtube.com/@HRAexchange" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-youtube"></i>
                                YouTube
                            </a>
                            <a href="https://www.tiktok.com/@hraexperience" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div class="epay-visual">
                    <div class="epay-card">
                        <img src="{{ asset('images/hra-web3.png') }}" alt="HRA Financial Brokers" class="epay-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Little Oummah -->
    <section class="hra-epay" style="
    background: white;
    border-radius: 25px;
    padding: 1em;
">
        <div class="a">
            <div class="epay-header">
                <h2 style="color: #393185;">Little Oummah</h2>
                <p style="color: #393185;">Your Trusted Islamic Education Platform in Brussels</p>
            </div>

            <div class="epay-grid">
                <div class="epay-content">
                    <div class="location-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 22C14 18 20 15.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 15.4183 10 18 12 22Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Mechelen, Belgium</span>
                    </div>
                    
                    <h3>Licensed Islamic Education Institution</h3>
                    <p>Little Oummah is a regulated educational platform providing Islamic education and resources for children worldwide.</p>
                    
                    <div class="epay-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                            <a href="{{ asset('assets/pdfs/little-oummah-license.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline">
                                Licence
                            </a>
                        </div>
                    </div>

                    <div class="epay-links">
                        <a href="https://www.littleoummah.com" target="_blank" rel="noopener noreferrer" class="primary-btn" style="margin: 1em 0; width: 200px; text-align: center;">
                            Visit Little Oummah
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                                <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </a>
                        <div class="social-links">
                         
                            <a href="https://www.instagram.com/littleoummah/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>,
                            
                            <a href="https://www.tiktok.com/@littleoummah" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div class="epay-visual">
                    <div class="epay-card">
                        <img src="{{ asset('images/little-oummah.png') }}" alt="Little Oummah" class="epay-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="features" class="th zh">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="fn">Why</span>
            <h2 class="bo">Why HRA Coin?</h2>
            <p class="gi qi xi ul">
                The integration of HRA Coin into the HRA experience ecosystem sets it apart from other cryptocurrencies.
                It provides users with a seamless travel and payment experience, distinguishing it as more than just a
                digital currency. 
            </p>
        </div>
        <div class="ha qb _d">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="wow fadeInUp" data-wow-delay="0s">
                    <div class="feature-card">
                        <h3>Low transaction fees</h3>
                        <p>
                            HRA Coin offers significantly lower transaction fees compared to traditional payment
                            systems. This means that users can send and receive funds without incurring high costs,
                            making it an attractive option for individuals and businesses alike.
                        </p>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="feature-card">
                        <h3>Global acceptance</h3>
                        <p>
                            HRA Coin is designed as a global currency, enabling users to make transactions across
                            borders without intermediaries or exchange rates. This allows for fast and seamless
                            international transactions, bridging gaps between diverse economies and cultures.
                        </p>
                    </div>
                </div>
                <div class="wow fadeInUp" data-wow-delay="0.4s">
                    <div class="feature-card">
                        <h3>Fast processing times</h3>
                        <p>
                            HRA Coin boasts quick processing times, with transactions settled in mere seconds. This
                            speed is particularly valuable for businesses needing rapid payment processing, such as
                            e-commerce sites or online marketplaces.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tokenomics Section -->
<section id="tokenomics" class="th e ca">
    <div class="a">
        <div class="me nf fh wg ml ym zm lp nq">
            <div class="ha qb _d be">
                <div class="jc ng yo/2">
                    <div class="wow fadeInUp hb qb be de no" data-wow-delay="0s">
                        <div id="tokenomicsChart" style="width: 100%; min-height: 400px;"></div>
                    </div>
                </div>
                <div class="jc ng yo/2">
                    <div class="wow fadeInUp ib" data-wow-delay="0s">
                        <span class="va gi pi ri bj fn">Tokenomics</span>
                        <h2 class="va li pi ui yi vl bo">Revenue Distribution</h2>
                        <p class="gi qi xi ul">
                            The revenue distribution within the HRA ecosystem is structured as follows:
                        </p>
                    </div>
                    <div class="wow fadeInUp ie" data-wow-delay="0s">
                        <div class="distribution-list">
                            <div class="qb">
                            <span class="oa dc rc oe of"></span>
                                <span class="gi qi xi ul">HRA Financial Brokers : 30% </span>
                            </div>
                            <div class="qb">
                            <span class="oa dc rc oe sf"></span>
                                <span class="gi qi xi ul">HRA Epay : 20% </span>
                            </div>
                            <div class="qb">
                            <span class="oa dc rc oe tf"></span>
                                <span class="gi qi xi ul">HRA Web3 Services : 15% </span>
                            </div>
                            <div class="qb">
                            <span class="oa dc rc oe uf"></span>
                                <span class="gi qi xi ul">HRA Airlines : 15% </span>
                    </div>
                            <div class="qb">
                                <span class="oa dc rc oe vf"></span>
                                <span class="gi qi xi ul">Little Umma BV : 10% </span>
                </div>
                            <div class="qb">
                                <span class="oa dc rc oe wf"></span>
                                <span class="gi qi xi ul">HRA Experience App : 10% </span>
            </div>
        </div>
    </div>
    </div>
        </div>
                        </div>
    </div>
</section>

<style>
.distribution-list {
    margin-top: 2rem;
}

.distribution-list .qb {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    padding: 0.5rem;
    transition: all 0.3s ease;
}

.distribution-list .qb:hover {
    background: rgba(62, 125, 255, 0.1);
    border-radius: 8px;
}

#tokenomicsChart {
    margin: 0 auto;
    background: transparent;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configuration du graphique
    const options = {
        series: [30, 20, 15, 15, 10, 10],
        chart: {
            type: 'pie',
            height: 400,
            fontFamily: 'Inter, sans-serif',
            background: 'transparent',
            animations: {
                enabled: true,
                easing: 'easeinout',
                speed: 800,
                animateGradually: {
                    enabled: true,
                    delay: 150
                }
            }
        },
        labels: [
            'HRA Financial Brokers',
            'HRA Epay',
            'HRA Web3 Services',
            'HRA Airlines',
            'Little Umma BV',
            'HRA Experience App'
        ],
        colors: ['#393185', '#2d2668', '#9590c3', '#8695ca', '#000000', '#637381'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            labels: {
                colors: '#000000'
            },
            markers: {
                width: 12,
                height: 12,
                radius: 6
            }
        },
        stroke: {
            width: 0
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val + '%'
            },
            style: {
                fontSize: '14px',
                fontFamily: 'Inter, sans-serif',
                fontWeight: 'bold',
                colors: ['#FFFFFF']
            }
        },
        tooltip: {
            enabled: true,
            y: {
                formatter: function(val) {
                    return val + '%'
                }
            },
            theme: 'dark',
            style: {
                fontSize: '14px',
                fontFamily: 'Inter, sans-serif'
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                },
                legend: {
                    position: 'bottom',
                    fontSize: '12px'
                }
            }
        }]
    };

    // Initialisation du graphique avec gestion d'erreurs
    function initChart() {
        try {
            const chartElement = document.querySelector("#tokenomicsChart");
            if (!chartElement) {
                console.error("L'élément #tokenomicsChart n'a pas été trouvé");
                return;
            }

            if (typeof ApexCharts === 'undefined') {
                console.error("La bibliothèque ApexCharts n'est pas chargée");
                return;
            }

            const chart = new ApexCharts(chartElement, options);
            chart.render().catch(error => {
                console.error("Erreur lors du rendu du graphique:", error);
            });

        } catch (error) {
            console.error("Erreur lors de l'initialisation du graphique:", error);
        }
    }

    // Attendre que la bibliothèque ApexCharts soit chargée
    if (document.readyState === 'complete') {
        initChart();
    } else {
        window.addEventListener('load', initChart);
    }
});
</script>

<section id="team" class="we bf th oh al">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn"> Technology </span>
            <h2 class="va li pi ui yi vl bo">
                Discuss what makes HRA Coin different from other cryptocurrencies.
            </h2>
            <p class="gi qi xi ul">
                HRA Coin is based on the Binance smart chain, which is an IMA blockchain network.
                It is characterized by efficiency and low transaction fees.
                Through this network, customers meet convenience.
                It also ensures that users can make payments, withdrawals or bookings without any delay due to its high
                speed.
                The low transaction fees make it cost-effective for users.
            </p>
        </div>
        <div class="ha qb _d"></div>
    </div>
</section>



<section id="faq" x-data="
        {
          openFaq1: false,
          openFaq2: false,
          openFaq3: false,
          openFaq4: false,
          openFaq5: false,
        }
      " class="e ca nf ih ml">
    <div class="a">
        <div class="wow fadeInUp la fb ld fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn"> FAQ </span>
            <h2 class="va li pi ui yi vl bo">Frequently Asked Questions</h2>
            <p class="la id gi qi xi ul">
                How HRA Coin facilitates users easily pay for travel, hotels, and more within the HRA Experience
                ecosystem.
            </p>
        </div>
        <div class="ha qb _d de">
            <div class="jc ng _o/12 jq/12">
                <div class="single-faq wow fadeInUp ra me kf ah ch gl zn _n" data-wow-delay="0s">
                    <button @click="openFaq1 = !openFaq1" class="faq-btn qb jc be ee ei">
                        <h3 class="kb ii pi aj vl dn co">
                            What is HRA Coin, and how does it work within the HRA Experience ecosystem?
                        </h3>
                        <span class="icon rb gc jc md be de ne wf zi yl pl gi oi" :class="openFaq1 && 'ud' ">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_50_132)">
                                    <path
                                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_50_132">
                                        <rect width="10" height="10" fill="white"
                                              transform="translate(-0.000488281 0.000488281)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </button>
                    <div x-show="openFaq1" class="faq-content">
                        <p class="ar bi ii xi ul">
                            HRA Coin is a digital currency developed by HRA Experience, specifically designed for use
                            within its ecosystem which includes services such as travel and hotel bookings.
                            Users can use HRA Coin to pay for various products and services, while partners, including
                            airlines, accept it as a payment method.
                            This makes HRA Coin an integral part of the platform's offerings.
                            By using HRA Coin, users benefit from a streamlined, secure, and efficient way to manage and
                            spend their funds across a wide range of services.
                        </p>
                    </div>
                </div>
                <div class="single-faq wow fadeInUp ra me kf ah ch gl zn _n" data-wow-delay="0s">
                    <button @click="openFaq2 = !openFaq2" class="faq-btn qb jc be ee ei">
                        <h3 class="kb ii pi aj vl dn co">How can I buy HRA Coin?</h3>
                        <span class="icon rb gc jc md be de ne wf zi yl pl gi oi" :class="openFaq2 && 'ud' ">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_50_132)">
                                    <path
                                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_50_132">
                                        <rect width="10" height="10" fill="white"
                                              transform="translate(-0.000488281 0.000488281)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </button>
                    <div x-show="openFaq2" class="faq-content">
                        <p class="ar bi ii xi ul">
                           You can purchase HRA Coins directly through our website. A buy module is available, allowing you to acquire HRA Coins with traditional currencies like the Euro. Soon, HRA Coin will be available on cryptocurrency exchanges.
                        </p>
                    </div>
                </div>
                <div class="single-faq wow fadeInUp ra me kf ah ch gl zn _n" data-wow-delay="0s">
                    <button @click="openFaq3 = !openFaq3" class="faq-btn qb jc be ee ei">
                        <h3 class="kb ii pi aj vl dn co">
                            What is the value of HRA Coin, and how does it change?
                        </h3>
                        <span class="icon rb gc jc md be de ne wf zi yl pl gi oi" :class="openFaq3 && 'ud' ">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_50_132)">
                                    <path
                                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_50_132">
                                        <rect width="10" height="10" fill="white"
                                              transform="translate(-0.000488281 0.000488281)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </button>
                    <div x-show="openFaq3" class="faq-content">
                        <p class="ar bi ii xi ul">
                            The value of HRA Coin is subject to market demand and supply fluctuations.
                            During the Initial Coin Offering (ICO), you can buy HRA Coin for 1 euro per coin.
                            Once the coin is available on cryptocurrency exchanges starting February 1, 2025, the
                            initial trading price will be 3 euros.
                            Its value may rise or fall depending on market conditions.
                        </p>
                    </div>
                </div>
                <div class="single-faq wow fadeInUp ra me kf ah ch gl zn _n" data-wow-delay="0s">
                    <button @click="openFaq4 = !openFaq4" class="faq-btn qb jc be ee ei">
                        <h3 class="kb ii pi aj vl dn co">
                            Can I use HRA Coin for payments outside the HRA Experience ecosystem?
                        </h3>
                        <span class="icon rb gc jc md be de ne wf zi yl pl gi oi" :class="openFaq4 && 'ud' ">
                            <svg width="10" height="10" viewBox="0 0 10 10" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_50_132)">
                                    <path
                                        d="M8.82033 1.91065L4.99951 5.73146L1.17869 1.91064L-0.000488487 3.08978L4.99951 8.08978L9.99951 3.08979L8.82033 1.91065Z"
                                        fill="currentColor"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0_50_132">
                                        <rect width="10" height="10" fill="white"
                                              transform="translate(-0.000488281 0.000488281)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                    </button>
                    <div x-show="openFaq4" class="faq-content">
                        <p class="ar bi ii xi ul">
                            Yes, we are working to make HRA Coin widely accepted.
                            Additionally, through the HRA Experience app, you can make payments via Apple Pay, making it
                            easy to use HRA Coin for services both within and outside the HRA Experience ecosystem.
                            We are also expanding partnerships with other companies to broaden HRA Coin's usability
                            beyond our platform.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d l z ea">
        <img src="{{ asset('website/img/faq-shape-1.svg') }}" alt="shape"/>
    </div>
    <div class="d m _ ea">
        <img src="{{ asset('website/img/faq-shape-2.svg') }}" alt="shape"/>
    </div>
</section>

<section id="blog" class="th oh">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn"> Invest in HRA Coin </span>
            <h2 class="va li pi ui yi vl bo">Why Invest Now?</h2>
            <p class="gi qi xi ul">
                Investing in HRA Coin is worthwhile due to its seamless use.
                A minimum of 100 Euro can already be invested in the HRA coin today, allowing you to enter the market at
                a low price and make a high return as the coin increases in value.
                This is a limited time opportunity and the ideal time to invest in the HRA coin.
            </p>
        </div>
        <div class="ha qb _d"></div>
    </div>
</section>

<section id="contact" class="nf gh ml">
    <div class="a">
        <div class="ha qb _d be">
            <div class="jc ng ap/12">
                <div class="wow fadeInUp fb nd" data-wow-delay="0s">
                    <span class="va gi pi ri bj fn"> Contact Us </span>
                    <h2 class="va li pi ui yi vl bo">
                        How Can We Help?
                    </h2>
                    <p class="vl">Share your concerns, and we will get back to you as soon as possible.</p>
                </div>
                <div class="ha qb _d">
                    <div class="jc ng qm/2">
                        <div class="wow fadeInUp lb _c" data-wow-delay="0s">
                            <h3 class="pa gi oi aj vl">Our Location</h3>
                            <p class="ii qi wi xi ul">
                                HRA Web3 Services, 404, C34 Building, Behind Fab Building, Khalifa Street, Abu Dhabi
                            </p>
                        </div>
                    </div>
                    <div class="jc ng qm/2">
                        <div class="wow fadeInUp lb _c" data-wow-delay="0s">
                            <h3 class="pa gi oi aj vl">Email Address</h3>
                            <p class="ii qi wi xi ul">
                                <a href="mailto:info@hra-coin.com?subject=Help Me to HRA Coin&body=Help Me to HRA Coin for investement"
                                   class="__cf_email__">info@hra-coin.com</a>
                            </p>
                        </div>
                    </div>
                    <div class="jc ng qm/2">
                        <div class="wow fadeInUp lb _c" data-wow-delay="0s">
                            <h3 class="pa gi oi aj vl">Phone Number</h3>
                            <p class="ii qi wi xi ul">+971 585484314</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="jc ng bp/12">
                <div class="sm:ud-14 wow fadeInUp pe kf fh wg gl" data-wow-delay="0s">
                    <h3 class="xa mi pi aj vl hn tp sq">Send us a Message</h3>
                    <form method="post" action="{{ route('website.customer-message') }}">
                        {{ csrf_field() }}
                        <div class="za">
                            <label for="name" class="ya ob hi qi aj vl">
                                Full Name*
                            </label>
                            <input type="text" id="name" placeholder="Enter your full name" name="name"
                                   class="jc pe re ff if zg _g ii qi _i lj pk dl il tl" required/>
                            @error('name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="za">
                            <label for="email" class="ya ob hi qi aj vl">
                                Email Address*
                            </label>
                            <input type="email" id="email" placeholder="Enter your email address" name="email"
                                   class="jc pe re ff if zg _g ii qi _i lj pk dl il tl" required/>
                            @error('email')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="za">
                            <label for="message" class="ya ob hi qi aj vl">
                                Message*
                            </label>
                            <textarea rows="6" id="message" placeholder="Type your message" name="message"
                                      class="jc pe re ff if zg _g ii qi _i lj pk dl il tl" required></textarea>
                            @error('message')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <button class="jc oe of lg fi ii oi zi hk il yl dm" type="submit">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="e ca th">
    <div class="a">
        <div class="ha qb _d">
            <div class="jc ng vn/2 wo/12 gq/12">
                <div class="wow fadeInUp bb dd eq" data-wow-delay="0s">
                    <a href="/" class="ta pb">
                        <img src="{{ asset('website/img/logo_main.png') }}" alt="logo" class="sb wk footer_logo"/>
                        <img src="{{ asset('website/img/logo_main.png') }}" alt="logo" class="xk footer_logo"/>
                    </a>
                    <p class="ra ii qi xi ul">
                        HRA Coin is a valuable investment offering unique benefits designed to enhance users' payment
                        and travel experiences.
                        As a digital cryptocurrency, it is an integral part of the HRA Experience ecosystem.
                    </p>
                    @if(settings('social_link'))
                        <div class="qb be ge">
                            <a href="{{ settings('twitter_url') }}" class="qb ac pc be de oe nf xi fk lk gl vl bm"
                               name="social-link"
                               aria-label="social-link">
                                <svg width="18" height="15" viewBox="0 0 18 15" class="cg">
                                    <path
                                        d="M17.7165 2.00016C17.0749 2.29183 16.3832 2.4835 15.6665 2.57516C16.3999 2.1335 16.9665 1.4335 17.2332 0.591829C16.5415 1.0085 15.7749 1.30016 14.9665 1.46683C14.3082 0.750163 13.3832 0.333496 12.3332 0.333496C10.3749 0.333496 8.77487 1.9335 8.77487 3.9085C8.77487 4.19183 8.8082 4.46683 8.86654 4.72516C5.89987 4.57516 3.2582 3.15016 1.49987 0.991829C1.19154 1.51683 1.01654 2.1335 1.01654 2.7835C1.01654 4.02516 1.64154 5.12516 2.6082 5.75016C2.01654 5.75016 1.46654 5.5835 0.983203 5.3335C0.983203 5.3335 0.983203 5.3335 0.983203 5.3585C0.983203 7.09183 2.21654 8.54183 3.84987 8.86683C3.54987 8.95016 3.2332 8.99183 2.9082 8.99183C2.6832 8.99183 2.4582 8.96683 2.24154 8.92516C2.69154 10.3335 3.99987 11.3835 5.57487 11.4085C4.3582 12.3752 2.81654 12.9418 1.1332 12.9418C0.84987 12.9418 0.566536 12.9252 0.283203 12.8918C1.86654 13.9085 3.74987 14.5002 5.76654 14.5002C12.3332 14.5002 15.9415 9.05016 15.9415 4.32516C15.9415 4.16683 15.9415 4.01683 15.9332 3.8585C16.6332 3.3585 17.2332 2.72516 17.7165 2.00016Z"/>
                                </svg>
                            </a>
                            <a href="{{ settings('telegram_url') }}" class="qb ac pc be de oe nf xi fk lk gl vl bm"
                               name="social-link"
                               aria-label="social-link">
                                <i class="fa-brands fa-telegram-plane"></i>
                            </a>
                            <a href="{{ settings('facebook_url') }}"
                               class="qb ac pc be de oe nf xi fk lk gl vl bm" name="social-link"
                               aria-label="social-link">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="{{ settings('instagram_url') }}" class="qb ac pc be de oe nf xi fk lk gl vl bm"
                               name="social-link"
                               aria-label="social-link">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                            <a href="{{ settings('youtube_url') }}" class="qb ac pc be de oe nf xi fk lk gl vl bm"
                               name="social-link"
                               aria-label="social-link">
                                <svg width="18" height="12" viewBox="0 0 18 12" class="cg">
                                    <path
                                        d="M7.33366 8.49984L11.6587 5.99984L7.33366 3.49984V8.49984ZM16.967 1.97484C17.0753 2.3665 17.1503 2.8915 17.2003 3.55817C17.2587 4.22484 17.2837 4.79984 17.2837 5.29984L17.3337 5.99984C17.3337 7.82484 17.2003 9.1665 16.967 10.0248C16.7587 10.7748 16.2753 11.2582 15.5253 11.4665C15.1337 11.5748 14.417 11.6498 13.317 11.6998C12.2337 11.7582 11.242 11.7832 10.3253 11.7832L9.00033 11.8332C5.50866 11.8332 3.33366 11.6998 2.47533 11.4665C1.72533 11.2582 1.24199 10.7748 1.03366 10.0248C0.925326 9.63317 0.850326 9.10817 0.800326 8.44151C0.741992 7.77484 0.716992 7.19984 0.716992 6.69984L0.666992 5.99984C0.666992 4.17484 0.800326 2.83317 1.03366 1.97484C1.24199 1.22484 1.72533 0.741504 2.47533 0.533171C2.86699 0.424837 3.58366 0.349837 4.68366 0.299837C5.76699 0.241504 6.75866 0.216504 7.67533 0.216504L9.00033 0.166504C12.492 0.166504 14.667 0.299837 15.5253 0.533171C16.2753 0.741504 16.7587 1.22484 16.967 1.97484Z"/>
                                </svg>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="jc ng qm/2 vn/2 wo/12 hq/12">
                <div class="wow fadeInUp bb eq" data-wow-delay="0s">
                    <h2 class="za mi pi yi vl">Quick Links</h2>
                    <div class="he">
                        <a href="#home" class="ob ii qi xi kk ul fm">
                            About HRA Coin
                        </a>
                        <a href="#features" class="ob ii qi xi kk ul fm">
                            Ecosystem
                        </a>
                        <a href="#tokenomics" class="ob ii qi xi kk ul fm">
                            Tokenomics
                        </a>
                        <a href="#roadmap" class="ob ii qi xi kk ul fm">
                            Roadmap
                        </a>
                        <a href="{{ route('member.register.create') }}" class="ob ii qi xi kk ul fm">
                            Login / Sign Up
                        </a>
                        <a href="{{ settings('white_paper_link') }}" class="ob ii qi xi kk ul fm"
                           target="_blank">
                            Whitepaper
                        </a>
                    </div>
                </div>
            </div>
            <div class="jc ng qm/2 vn/2 wo/12 hq/12">
                <div class="wow fadeInUp bb eq" data-wow-delay="0s">
                    {{--                    <h2 class="za mi pi yi vl">Supports</h2>--}}
                    {{--                    <div class="he">--}}
                    {{--                        <a href="javascript:void(0);" class="ob ii qi xi kk ul fm">--}}
                    {{--                            Privacy Policy--}}
                    {{--                        </a>--}}
                    {{--                        <a href="javascript:void(0);" class="ob ii qi xi kk ul fm">--}}
                    {{--                            Help & Support--}}
                    {{--                        </a>--}}
                    {{--                        <a href="javascript:void(0);" class="ob ii qi xi kk ul fm">--}}
                    {{--                            Terms & Conditions--}}
                    {{--                        </a>--}}
                    {{--                        <a href="javascript:void(0);" class="ob ii qi xi kk ul fm">--}}
                    {{--                            24/7 Supports--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>
            </div>
            <div class="jc ng vn/2 yo/2 gq/12">
                <div class="wow fadeInUp bb eq" data-wow-delay="0s">
                    <h2 class="za mi pi yi vl">News & Post</h2>
                    <div class="he">
                        <div class="qb" style="align-items: center">
                            <div class="sa xb jc ed pe">
                                <img src="{{ asset('website/img/blog-01.jpeg') }}" alt="post" class="yb jc pe dg eg"/>
                            </div>
                            <div>
                                <a href="https://www.dailyscanner.com/revolutionizing-travel-and-finance-with-the-hra-experience-ecosystem" target="_blank" class="ii qi xi kk ul fm">
                                    Revolutionizing Travel and Finance with the HRA Experience Ecosystem
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wow fadeInUp we bf dh fi al" data-wow-delay="0s">
            <p class="ii qi wi xi ul">
                © HRA Ecosystem - All rights reserved
            </p>
        </div>
    </div>
    <div class="d f l ea">
        <img src="{{ asset('website/img/footer-shape-2.svg') }}" alt="shape"/>
    </div>
    <div class="d n m ea">
        <img src="{{ asset('website/img/footer-shape-1.svg') }}" alt="shape"/>
    </div>
</footer>

<a x-show="scrolledFromTop" 
   @click="window.scrollTo({top: 0, behavior: 'smooth'})" 
   href="javascript:void(0);" 
   class="zq back-to-top c p q r fa qb ac pc be de me of zi kj rj">
    <span class="cb bc qc sd we xe cf"></span>
</a>

<script data-cfasync="false" src="cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".scroll-menu");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector(elem.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                offsetTop: 1 - 60,
            });
        });
    });

    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".scroll-menu");
        const scrollPos =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            const refElement = document.querySelector(val);
            const scrollTopMinus = scrollPos + 73;
            if (
                refElement.offsetTop <= scrollTopMinus &&
                refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
            ) {
                document.querySelector(".scroll-menu").classList.remove("vl", "bj");
                currLink.classList.add("vl", "bj");
            } else {
                currLink.classList.remove("vl", "bj");
            }
        }
    }

    window.document.addEventListener("scroll", onScroll);
</script>
<script defer src="{{ asset('website/js/bundle.js') }}"></script>
<script>
    (function () {
        function c() {
            var b = a.contentDocument || a.contentWindow.document;
            if (b) {
                var d = b.createElement("script");
                d.innerHTML =
                    "window.__CF$cv$params={r:'8bf395c45cb93dfb',t:'MTcyNTY3OTQ1OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='cdn-cgi/challenge-platform/scripts/jsd/main.html';document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName("head")[0].appendChild(d);
            }
        }

        if (document.body) {
            var a = document.createElement("iframe");
            a.height = 1;
            a.width = 1;
            a.style.position = "absolute";
            a.style.top = 0;
            a.style.left = 0;
            a.style.border = "none";
            a.style.visibility = "hidden";
            document.body.appendChild(a);
            if ("loading" !== document.readyState) c();
            else if (window.addEventListener)
                document.addEventListener("DOMContentLoaded", c);
            else {
                var e = document.onreadystatechange || function () {
                };
                document.onreadystatechange = function (b) {
                    e(b);
                    "loading" !== document.readyState &&
                    ((document.onreadystatechange = e), c());
                };
            }
        }
    })();
</script>

<!-- testi9monial -->
<script>
    const btns = document.querySelectorAll(".btn");
    const slideRow = document.getElementById("slide-row");
    const main = document.querySelector("main");

    let currentIndex = 0;

    const updateSlide = () => {
        const mainWidth = main.offsetWidth;
        const translateValue = currentIndex * -mainWidth;
        slideRow.style.transform = `translateX(${translateValue}px)`;

        btns.forEach((btn, index) => {
            btn.classList.toggle("active", index === currentIndex);
        });
    };

    btns.forEach((btn, index) => {
        btn.addEventListener("click", () => {
            currentIndex = index;
            updateSlide();
        });
    });

    window.addEventListener("resize", () => {
        updateSlide();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.18/sweetalert2.all.js"></script>
@if(Session::has('success'))
    <script>
        window.Swal.fire({
            title: "Yay!!!",
            text: "{!! Session::get('success') !!}",
            icon: "success"
        });
    </script>
@endif




<script>
// Renommer les variables pour éviter les redéclarations
const pageLinkTestimonial = document.querySelector('.page-link');
const btnsTestimonial = document.querySelectorAll('.btn');
const slideRowTestimonial = document.getElementById('slide-row');
const mainTestimonial = document.querySelector('main');
let currentIndexTestimonial = 1;

// ... existing code ...
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        series: [30, 20, 15, 15, 10, 10],
        chart: {
            type: 'pie',
            height: 400,
            fontFamily: 'Inter, sans-serif',
            background: 'transparent'
        },
        labels: [
            'HRA Financial Brokers',
            'HRA Epay',
            'HRA Web3 Services',
            'HRA Airlines',
            'Little Umma BV',
            'HRA Experience App'
        ],
        colors: ['#393185', '#2d2668', '#9590c3', '#8695ca', '#000000', '#637381'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            labels: {
                colors: '#000000'
            },
            markers: {
                width: 12,
                height: 12,
                radius: 6
            }
        },
        stroke: {
            width: 0
        },
        dataLabels: {
            enabled: true,
            formatter: function(val) {
                return val + '%'
            },
            style: {
                fontSize: '14px',
                fontFamily: 'Inter, sans-serif',
                fontWeight: 'bold',
                colors: ['#FFFFFF']
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                chart: {
                    height: 300
                },
                legend: {
                    position: 'bottom',
                    fontSize: '12px'
                }
            }
        }]
    };

    var chart = new ApexCharts(document.querySelector("#tokenomicsChart"), options);
    chart.render();
</script>

