<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>HRA Coin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="icon" href="{{ asset('website/img/favicon.ico') }}"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.18/sweetalert2.min.css"/>
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet"/> -->
    <!-- Google tag (gtag.js) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16806753499">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-16806753499');
    </script> -->
    <!-- <style>
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
    </style> -->


    <head>
  <!-- Basic Meta Tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- SEO Meta Tags -->
  <title>HRA Coin - Revolutionizing Travel & Finance</title>
  <meta name="description" content="Discover HRA Coin, the innovative digital currency powering a unified ecosystem for travel, payments, and blockchain solutions. Enjoy low fees, fast transactions, and global accessibility." />
  <meta name="keywords" content="HRA Coin, cryptocurrency, blockchain, travel, fintech, digital payments, travel booking, low fees" />
  <link rel="canonical" href="https://hra-coin.com/" />

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="HRA Coin - Revolutionizing Travel & Finance" />
  <meta property="og:description" content="Discover HRA Coin, the innovative digital currency powering a unified ecosystem for travel and digital payments through blockchain technology." />
  <meta property="og:url" content="https://hra-coin.com/" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="{{ asset('website/img/og-image.jpg') }}" />

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:title" content="HRA Coin - Revolutionizing Travel & Finance" />
  <meta name="twitter:description" content="Discover HRA Coin—secure, fast, and global. Powering travel, payments, and blockchain services for a modern digital experience." />
  <meta name="twitter:image" content="{{ asset('website/img/og-image.jpg') }}" />

  <!-- Favicons -->
  <link rel="icon" href="{{ asset('website/img/favicon.ico') }}" />

  <!-- External Stylesheets -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.18/sweetalert2.min.css" />
  <link rel="stylesheet" href="{{ asset('website/css/style.css') }}" />

  <!-- Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16806753499"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){ dataLayer.push(arguments); }
    gtag('js', new Date());
    gtag('config', 'AW-16806753499');
  </script>

  <!-- Custom Inline CSS -->
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

    /* Global Section Styles */
    section {
      padding: var(--spacing-lg) 0;
      position: relative;
      overflow: hidden;
    }
    .section-title {
      margin-bottom: var(--spacing-md);
    }

    /* Card Styles */
    .component-card,
    .feature-card,
    .benefit-card {
      background: #fff;
      border-radius: var(--border-radius);
      padding: var(--spacing-sm);
      transition: var(--transition);
      height: 100%;
      box-shadow: 0 10px 30px rgba(57, 49, 133, 0.1);
      border: 1px solid rgba(57, 49, 133, 0.1);
    }
    .component-card:hover,
    .feature-card:hover,
    .benefit-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(57, 49, 133, 0.15);
      border-color: var(--primary);
    }

    /* Icon Styling */
    .component-icon,
    .benefit-icon {
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
    .component-icon svg,
    .benefit-icon svg {
      width: 35px;
      height: 35px;
      color: #fff;
    }

    /* Typography */
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

    /* Badge Styles */
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

    /* Link Styles */
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

    /* Grid and Layout */
    .grid {
      gap: 2rem;
    }
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

    /* Animation */
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

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      h2.bo { font-size: 2.25rem; }
      section { padding: var(--spacing-md) 0; }
      .grid { gap: 1.5rem; }
    }

    /* Bounce Arrow Styling */
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
      0%, 20%, 50%, 80%, 100% { transform: translateY(0) translateX(-50%); }
      40% { transform: translateY(-20px) translateX(-50%); }
      60% { transform: translateY(-10px) translateX(-50%); }
    }

    /* Additional Animation Classes */
    .animated { animation-duration: 2s; animation-fill-mode: both; }
    .infinite { animation-iteration-count: infinite; }

    .distribution-list { margin-top: 2rem; }
    .distribution-list .qb {
      display: flex;
      align-items: center;
      margin-bottom: 1rem;
      padding: 0.5rem;
      transition: all 0.3s ease;
    }

    /* Our Companies Section */
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
    .companies-header h1 { font-size: 2.5rem; margin-bottom: 1rem; color: white; }
    .companies-subtitle { font-size: 1.2rem; color: rgba(255, 255, 255, 0.8); margin-bottom: 2rem; }
    .section-divider { width: 60px; height: 4px; background: rgba(255, 255, 255, 0.2); margin: 0 auto; }

    /* HRA ePay Section */
    .hra-epay {
      margin: 2em;
      padding: 2rem 0;
    }
    .epay-header { text-align: center; margin-bottom: 2rem; }
    .epay-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
      align-items: center;
      padding: 0 1rem;
    }
    .epay-content { display: flex; flex-direction: column; gap: 1.5rem; }
    .location-badge {
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      padding: 0.5rem 1rem;
      background: rgba(57, 49, 133, 0.1);
      border-radius: 20px;
      color: var(--primary);
    }
    .epay-visual { display: flex; justify-content: center; align-items: center; }
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

    /* Responsive Adjustments for ePay Section */
    @media (max-width: 768px) {
      .epay-grid { grid-template-columns: 1fr; text-align: center; }
      .location-badge, .social-links { justify-content: center; }
      .companies-header h1 { font-size: 2rem; }
      .companies-subtitle { font-size: 1rem; }
      .epay-card { max-width: 100%; }
      .primary-btn { margin: 1rem auto !important; }
    }

    /* Why HRA Coin Section */
    #features {
      padding: 6rem 0;
      background: linear-gradient(180deg, rgba(57, 49, 133, 0.05) 0%, rgba(57, 49, 133, 0) 100%);
    }
    #features .wow { animation-duration: 1s; }
    #features .section-title { text-align: center; margin-bottom: 4rem; }
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

    /* Our Solutions Section */
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

    @media (max-width: 768px) {
      #features .bo,
      #components .bo { font-size: 2rem; }
      #features .feature-card,
      #components .component-card { margin-bottom: 2rem; }
      #features,
      #components { padding: 4rem 0; }
      .component-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
      }
    }

    /* Why Choose HRA Section */
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
    #why-choose .section-content { position: relative; z-index: 1; }
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
      color: #fff;
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
      #why-choose { padding: 4rem 0; }
      #why-choose .bo { font-size: 2rem; }
      #why-choose .benefits-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
      }
      #why-choose .benefit-card { padding: 1.5rem; }
    }

    /* Underline Button Style */
    .text-decoration-underline {
      background-color: #393185;
      color: #fff !important;
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

    /* Gradient Button Style */
    .oe.of.zg.wg {
      display: inline-flex;
      align-items: center;
      padding: 1rem 2rem;
      background: linear-gradient(90deg, #376DF9, #393185);
      color: #fff;
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
  </style>
</head>

</head>

<!-- <body x-data="
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
</header> -->

<body x-data="{
    scrolledFromTop: false,
    init() {
      window.addEventListener('scroll', () => {
        this.scrolledFromTop = window.pageYOffset > 50;
      });
    }
}" class="kf fl">

  <!-- Header Section with Responsive Navbar -->
  <header 
    x-data="{
      navbarOpen: false,
      dropdownOpen: false
    }" 
    :class="scrolledFromTop ? 'kf gl zf rl ij oj' : 'lf hl'" 
    class="f ba qb jc be c">
    
    <div class="a">
      <div class="e ha qb be ee">
        
        <!-- Logo Section -->
        <div class="kc zc ng">
          <a href="/" :class="scrolledFromTop && 'og gp'" class="ob jc ah ip">
            <img src="{{ asset('website/img/logo_main.png') }}" alt="HRA Coin Logo" class="jc xk header_logo" />
            <img src="{{ asset('website/img/logo_main.png') }}" alt="HRA Coin Logo Alternative" class="sb jc wk header_logo" />
          </a>
        </div>

        <!-- Navigation Section -->
        <div class="qb jc be ce ng">
          <div>
            <!-- Toggle Button -->
            <button 
              @click="navbarOpen = !navbarOpen" 
              :class="navbarOpen && 'navbarTogglerActive'" 
              id="navbarToggler"
              class="d g h/2 ob qd/2 me pg qg mj qk to">
              <span :class="navbarOpen && 'sd i'" class="e ia ob tb lc mf il"></span>
              <span :class="navbarOpen && 'fj'" class="e ia ob tb lc mf il"></span>
              <span :class="navbarOpen && 'j td'" class="e ia ob tb lc mf il"></span>
            </button>

            <!-- Navigation Menu -->
            <nav 
              :class="!navbarOpen && 'sb'" 
              id="navbarCollapse"
              class="d g k jc _c me kf rg sg jj fl fo qo uo cp dp hp xp bq">
              <ul class="vq ro flex justify-center items-center w-full space-x-4">
                <li>
                  <a href="#features" class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                    Features
                  </a>
                </li>
                <li>
                  <a href="#tokenomics" class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                    Tokenomics
                  </a>
                </li>
                <li>
                  <a href="#roadmap" class="scroll-menu qb tg gi oi xi kk ul em ko so ip">
                    Roadmap
                  </a>
                </li>
                <li class="sk submenu-item e">
                  <a href="https://hra-whitepaper.gitbook.io/hra-whitepaper" target="_blank" class="qb tg gi oi xi kk ul em ko so ip">
                    WhitePaper
                  </a>
                </li>
                <li>
                  <a href="{{ route('member.login.create') }}" class="qb tg gi oi xi kk ul em ko so ip">
                    Login
                  </a>
                </li>
              </ul>
            </nav>
          </div>

          <!-- Call-to-Action: Buy Now -->
          <div class="qb ce lh pp oq 2xl:ud-pl-20">
            <div class="sb pm">
              <a href="https://pancakeswap.finance/swap?inputCurrency=0x55d398326f99059fF775485246999027B3197955&outputCurrency=0x5E64326cE6DF66CDfa62F8B154097BF536233451" target="_blank" 
                 class="qb be de oe re ze vg wg ii oi xi qj ek fk lk zk vl am fm lg:px-4 xl:px-8">
                 Buy on PancakeSwap
              </a>
            </div>
          </div>
        </div>
        <!-- End Navigation Section -->

      </div>
    </div>
  </header>

<!-- <section id="home" class="e ca wh xh">
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
</section> -->


<section id="home" class="e ca wh xh">
  <div class="a">
    <div class="ha qb _d">
      <div class="jc ng">
        <div class="la fi">
          <!-- Main Headline -->
          <h1 class="pa li pi ui yi vl bo bottom">
          Welcome to HRA Coin

          </h1>
          <!-- Subheadline Explaining the Token's Utility -->
          <p class="la pa gd gi qi xi vl">
            HRA Coin is a next-generation BEP20 utility token engineered to unify and drive efficiency across the HRA suite of digital platforms. Originally conceived to transform travel and hospitality payments, HRA Coin now powers seamless, borderless transactions throughout HRA Airlines, HRA Experience, HRA Exchange, HRA ePay, HRA Payway, and the HRA Crypto Wallet.
          </p>
          <!-- Call-to-Action Button

          <a href="{{ route('member.register.create') }}"
             class="oe of zg wg ii oi zi hk dark:hover:bg-opacity-90">
            Invest Now
          </a> -->

          <a href="https://pancakeswap.finance/swap?inputCurrency=0x55d398326f99059fF775485246999027B3197955&outputCurrency=0x5E64326cE6DF66CDfa62F8B154097BF536233451" 
          target="_blank" 
          rel="noopener noreferrer"
          class="oe of zg wg ii oi zi hk dark:hover:bg-opacity-90">
          Buy Now
          </a>

          <!-- Scroll Down Indicator -->
          <a href="#about" class="bounce-arrow animated infinite">
            <i class="fas fa-chevron-down text-4xl"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- Gradient Overlay for Depth -->
  <div class="d f l ea yb jc gj" style="background-image: linear-gradient(180deg, #393185 0%, rgba(57, 49, 133, 0) 100%);"></div>
  <!-- Decorative Images with Descriptive Alt Text -->
  <img src="{{ asset('website/img/hero-shape-1.svg') }}" alt="Abstract design element enhancing the hero section" class="d l f ea"/>
  <img src="{{ asset('website/img/hero-shape-2.svg') }}" alt="Complementary decorative graphic for the hero section" class="d m f ea"/>
</section>


<!-- <section id="about" class="th zh">
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
</section> -->


<section id="about" class="th zh">
  <div class="a">
    <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
      <!-- Section Badge -->
      <span class="va gi pi ri bj fn">About Us</span>
      <!-- Main Heading -->
      <h2 class="va li pi ui yi vl bo">
        What is the HRA Ecosystem?
      </h2>
      <!-- Descriptive Text -->
      <p class="gi qi xi ul">
        The HRA Ecosystem is a groundbreaking suite of interconnected digital platforms that redefines travel, payments, and finance. Powered by the innovative HRA Coin utility token, our ecosystem seamlessly integrates HRA Airlines, HRA Experience, HRA Exchange, HRA ePay, HRA Payway, and the HRA Crypto Wallet. This unified platform leverages cutting‑edge blockchain technology to enable secure, fast, and cost‑effective transactions—empowering users to effortlessly manage travel bookings, digital payments, and financial services all in one place.
      </p>
    </div>
  </div>
  <!-- Background Gradient Overlay -->
  <div class="d f l ea yb jc gj" style="background-image: linear-gradient(180deg, #393185 0%, rgba(57, 49, 133, 0) 100%);"></div>
</section>


<!-- <section id="why-choose" class="th zh">
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
</section> -->


<section id="why-choose" class="th zh">
  <div class="section-content a">
    <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
      <!-- Section Badge -->
      <span class="fn" style="background: rgba(57, 49, 133, 0.1); color: var(--primary);">
        Benefits
      </span>
      <!-- Updated Section Title -->
      <h2 class="bo">Why Choose HRA Coin</h2>
      <!-- Updated Descriptive Paragraph -->
      <p class="gi qi xi ul">
        Discover how HRA Coin, our next-generation BEP20 utility token, revolutionizes transactions by delivering unparalleled speed, security, and global access—all while offering exclusive rewards and investor-friendly features.
      </p>
    </div>

    <!-- Benefits Grid -->
    <div class="benefits-grid">
      <!-- Benefit Card 1: Unified Utility -->
      <div class="wow fadeInUp" data-wow-delay="0s">
        <div class="benefit-card">
          <div class="benefit-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" stroke="currentColor" stroke-width="2"/>
              <path d="M12 8v8M8 12h8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            </svg>
          </div>
          <h3 class="benefit-title">Unified Utility</h3>
          <p class="benefit-description">
            HRA Coin serves as the single digital asset that powers all your transactions across our platforms—eliminating the need to juggle multiple currencies.
          </p>
        </div>
      </div>

      <!-- Benefit Card 2: Speed & Security -->
      <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="benefit-card">
          <div class="benefit-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
              <path d="M12 6L12 12L16 16" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <h3 class="benefit-title">Speed & Security</h3>
          <p class="benefit-description">
            Powered by blockchain and smart contracts, HRA Coin ensures near-instant, secure transactions with minimal fees—free from intermediaries.
          </p>
        </div>
      </div>

      <!-- Benefit Card 3: Exclusive Investor Rewards -->
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
          <h3 class="benefit-title">Exclusive Rewards</h3>
          <p class="benefit-description">
            Enjoy investor-centric benefits including discounted fees, flexible payment options, and exclusive access to future platform upgrades.
          </p>
        </div>
      </div>

      <!-- Benefit Card 4: Global Connectivity -->
      <div class="wow fadeInUp" data-wow-delay="0.6s">
        <div class="benefit-card">
          <div class="benefit-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-width="2"/>
              <path d="M2 12H22" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
              <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2Z" stroke="currentColor" stroke-width="2"/>
            </svg>
          </div>
          <h3 class="benefit-title">Global Connectivity</h3>
          <p class="benefit-description">
            HRA Coin enables seamless, borderless transactions worldwide—ideal for international users, travellers, and entrepreneurs.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- <section id="components" class="th zh" style="background: linear-gradient(180deg, #393185 0%, #2d2668 100%);">
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
</section> -->

<section id="components" class="th zh" style="background: linear-gradient(180deg, #393185 0%, #2d2668 100%);">
  <div class="a">
    <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
      <!-- Section Badge -->
      <span class="fn" style="background: rgba(255, 255, 255, 0.1); color: white;">Our Solutions</span>
      <!-- Section Title -->
      <h2 class="bo" style="color: white;">Discover Our HRA Ecosystem</h2>
      <!-- Optional Introductory Text -->
      <p class="gi qi xi ul" style="color: white;">
        Experience a fully integrated suite of platforms powered by HRA Coin—designed to transform travel, digital payments, and financial transactions.
      </p>
    </div>

    <!-- Grid Layout for the Component Cards -->
    <div class="grid grid-cols-1 md:grid-cols-5 gap-6 component-grid">
      <!-- Card 1: HRA Coin (Utility Token) -->
      <div class="wow fadeInUp" data-wow-delay="0s">
        <div class="component-card">
          <div class="component-icon">
            <!-- Icon for HRA Coin -->
            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="white">
              <path fill="white" d="M12 0C5.384 0 0 5.384 0 12c0 6.616 5.384 12 12 12 6.616 0 12-5.384 12-12 0-6.616-5.384-12-12-12zm0 2c5.534 0 10 4.466 10 10s-4.466 10-10 10S2 17.534 2 12 6.466 2 12 2zm-2 2v2H8v2h2v2h1V8h2V6h-2V4h-1zM10.41 8l1.59 0c.375 0 .714.085 1.064.335.35.25.525.637.525 1.163 0 .48-.172.927-.52 1.178-.348.25-.695.323-1.07.323H10.41V8zm0 5l2.404 0c.616 0 1.068.135 1.354.404.286.27.43.657.43 1.167 0 .47-.168.825-.505 1.065-.338.24-.825.36-1.464.36H10.41V13z"/>
            </svg>
          </div>
          <div class="component-content">
            <h3>HRA Coin</h3>
            <p>
              Our next-generation BEP20 utility token serving as the core of the ecosystem—enabling lightning-fast, secure, and cost‑effective transactions across all platforms.
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
      
      <!-- Card 2: HRA Experience -->
      <div class="wow fadeInUp" data-wow-delay="0.1s">
        <div class="component-card">
          <div class="component-icon">
            <!-- Icon for HRA Experience -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M2 22H22" stroke="white" stroke-width="2"/>
              <path d="M2 22V9L12 2L22 9V22" stroke="white" stroke-width="2"/>
              <path d="M15 22V15H9V22" stroke="white" stroke-width="2"/>
            </svg>
          </div>
          <div class="component-content">
            <h3>HRA Experience</h3>
            <p>
              A revolutionary hotel and travel booking platform with transparent pricing and flexible payment options, designed for the modern traveler.
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
      
      <!-- Card 3: HRA Epay -->
      <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="component-card">
          <div class="component-icon">
            <!-- Icon for HRA Epay -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <rect x="2" y="4" width="20" height="16" rx="2" stroke="white" stroke-width="2"/>
              <path d="M2 10H22" stroke="white" stroke-width="2"/>
              <path d="M6 15H10" stroke="white" stroke-width="2"/>
            </svg>
          </div>
          <div class="component-content">
            <h3>HRA Epay</h3>
            <p>
              Our cutting-edge digital payment solution offering interest-free debit cards and rapid crypto-to-euro conversion for seamless transactions.
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
      
      <!-- Card 4: HRA Airline -->
      <div class="wow fadeInUp" data-wow-delay="0.3s">
        <div class="component-card">
          <div class="component-icon">
            <!-- Icon for HRA Airline -->
            <svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#FFFFFF">
              <path d="m397-115-99-184-184-99 71-70 145 25 102-102-317-135 84-86 385 68 124-124q23-23 57-23t57 23q23 23 23 56.5T822-709L697-584l68 384-85 85-136-317-102 102 26 144-71 71Z"/>
            </svg>
          </div>
          <div class="component-content">
            <h3>HRA Airline</h3>
            <p>
              Enjoy exclusive travel perks with discounted rates on flights—offering up to 15% off and special benefits for frequent flyers.
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
      
      <!-- Card 5: HRA Exchange -->
      <div class="wow fadeInUp" data-wow-delay="0.4s">
        <div class="component-card">
          <div class="component-icon">
            <!-- Icon for HRA Exchange -->
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 2v20h20" stroke="white" stroke-width="2" stroke-linecap="round"/>
              <path d="M4 16l4-4 4 4 8-8" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <div class="component-content">
            <h3>HRA Exchange</h3>
            <p>
              Trade digital assets effortlessly on a secure and intuitive crypto exchange built for efficiency and innovation.
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
  
  <!-- Decorative Element -->
  <div class="d l z ea">
    <img src="{{ asset('website/img/faq-shape-1.svg') }}" alt="Decorative shape element" />
  </div>
</section>


<!-- <section id="roadmap" class="e ca gh">
    <div class="a">
        <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s">
            <span class="va gi pi ri bj fn"> Roadmap </span>
            <h2 class="va li pi ui yi vl bo">HRA Coin Roadmap</h2>
            <p class="gi qi xi ul">
                HRA Coin is developed on the Binance Smart Chain (BSC), a reliable blockchain known for its high speed
                and low transaction costs. Below is the detailed about our roadmap
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
                            <h3 class="va ji pi yi vl">Q4 2024</h3>
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
                                <b>Private Sale:</b>
                                Preparations for the Initial Coin Offering for private investors are initiated, including the setup of
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
                            <h3 class="va ji pi yi vl">Q1 2025</h3>
                            <h3 class="va ji pi yi vl">HRA Coin Private Sale and Development of HRA Ecosystem</h3>
                            <p class="za ii qi xi ul">
                                <b>HRA Coin Private Sale on website:</b>
                                The HRA Coin website is launched, featuring a purchase module where investors can buy
                                HRA Coin at 2 euro per coin.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Development:</b>
                                Development of HRA platforms e.g HRA exchange, HRA Epay, HRA Airlines, HRA Experience, HRA Crypto Wallet and HRA Centralized Database and MVP ready for launch
                            </p>
                        </div>
                    </div>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl rn sn ao oo">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl mn nn un io"></span>
                            <span class="d x h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">Q2 2025</h3>
                            <h3 class="va ji pi yi vl">Development + Marketing + Launch</h3>
                            <p class="za ii qi xi ul">
                                <b>Development:</b>
                                Completion of development of all of our HRA platforms and availability for all users on web and mobile devices.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Marketing:</b>
                                Marketing For HRA ecosystem start and community building. Preparation for HRA Coin Launch for public.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>HRA Coin Launch:</b>
                            Launch of HRA Coin on HRA Exchange and listing on other centralized and decentralized exchanges. Listing on CMC & CG.
                          </p>
                        </div>
                    </div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2"></div>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl tn sn po">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl on pn un jo"></span>
                            <span class="d y h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">Q3 2025</h3>
                            <h3 class="va ji pi yi vl">Partnerships and New Features in platforms</h3>
                            <p class="za ii qi xi ul">
                                <b>Partnerships:</b>
                                Expansion of our ecosystem by partnering with other companies.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Further Development:</b>
                                New features in the HRA platforms with mobile apps ready and available for users.
                            </p>
                            <p class="za ii qi xi ul">
                                <b>Community Growth and Marketing:</b>
                                Expanding our community and taking more investors onboard. Listing of HRA Coin on some more exchanges.
                            </p>
                        </div>
                    </div>
                    <span class="d f w sb yb sc nf nl ln/2 un"></span>
                    <div class="jc ng vn/2">
                        <div class="e ca ra me nf hh sg gl rn sn ao oo">
                            <span class="d h/2 l sb ec tc qd/2 oe te df kf bl mn nn un io"></span>
                            <span class="d x h/2 sb bc qc qd/2 sd nf gl un"></span>
                            <h3 class="va ji pi yi vl">Q4 2025</h3>
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
</section> -->


<!-- Roadmap Section -->
<section id="roadmap" class="roadmap-section">
  <div class="container">
    <header class="roadmap-header">
      <span class="badge">🗺️ RoadMap</span>
      <h2>HRA Coin Roadmap</h2>
      <p class="intro">
        Phased Development Toward a Global Decentralized Ecosystem
      </p>
      <p class="description">
        The HRA Coin roadmap outlines a strategic, milestone-driven rollout plan that guides the evolution of our next-generation BEP20 utility token. Each phase is designed to achieve functional maturity, global market reach, and technological innovation—positioning HRA Coin as the dominant utility token in travel, finance, and decentralized commerce.
      </p>
    </header>

    <div class="timeline">
      <!-- Timeline Item 1: Q4 2024 -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>Q4 2024: Foundation & Planning</h3>
          <ul>
            <li><strong>Preparation & Planning:</strong> Begin initial design, architecture, and integration strategy for HRA Coin.</li>
            <li><strong>Team Formation:</strong> Assemble a dedicated, multidisciplinary team for development, legal compliance, and marketing.</li>
            <li><strong>Private Sale Preparation:</strong> Develop ICO platforms to engage early investors and set the foundation for a secure private sale.</li>
          </ul>
        </div>
      </div>

      <!-- Timeline Item 2: Q1 2025 -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>Q1 2025: Private Sale & Ecosystem Development</h3>
          <ul>
            <li><strong>HRA Coin Private Sale:</strong> Launch the HRA Coin website featuring a secure module for a private sale at a fixed rate of €2 per coin.</li>
            <li><strong>Platform Development start:</strong> Develop key ecosystem components including HRA Exchange, HRA ePay, HRA Airlines, HRA Experience, HRA Crypto Wallet, and a centralized user authentication system.</li>
            <li><strong>MVP Completion:</strong> Prepare Minimum Viable Products for internal testing and review.</li>
          </ul>
        </div>
      </div>

      <!-- Timeline Item 3: Q2 2025 -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>Q2 2025: Ecosystem Launch & Public Marketing</h3>
          <ul>
            <li><strong>Platform Deployment:</strong> MVP ready for all HRA platforms, accessible on both web and mobile.</li>
            <li><strong>Community Marketing:</strong> Initiate global marketing and community-building campaigns.</li>
            <li><strong>HRA Coin Public Launch:</strong> Launch HRA Coin publicly with listings on HRA Exchange as well as external centralized and decentralized exchanges; secure inclusion on CoinMarketCap and CoinGecko.</li>
          </ul>
        </div>
      </div>

      <!-- Timeline Item 4: Q3 2025 -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>Q3 2025: Strategic Growth & Feature Expansion</h3>
          <ul>
            <li><strong>Partnership Development:</strong> Strategically onboard partner airlines, hotels, retailers, and fintech providers.</li>
            <li><strong>Platform Enhancements:</strong> Introduce new features across mobile and web interfaces to enhance user experience and lunch with full features.</li>
            <li><strong>Investor Relations:</strong> Expand exchange listings and attract new investors to boost token liquidity.</li>
          </ul>
        </div>
      </div>

      <!-- Timeline Item 5: Q4 2025 -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>Q4 2025: Ecosystem Maturity & Innovation</h3>
          <ul>
            <li><strong>Expand Partnerships:</strong> Grow the network of businesses accepting HRA Coin.</li>
            <li><strong>Product Innovation:</strong> Roll out advanced wallet features and streamlined payment experiences.</li>
            <li><strong>Operational Scalability:</strong> Enhance backend systems and UX to support increasing user activity.</li>
          </ul>
        </div>
      </div>

      <!-- Timeline Item 6: 2026 and Beyond -->
      <div class="timeline-item">
        <div class="timeline-content">
          <h3>2026 & Beyond: Mass Adoption & Global Expansion</h3>
          <ul>
            <li><strong>Global Ecosystem Adoption:</strong> Scale HRA Coin’s presence in the international travel market, making it the default payment method.</li>
            <li><strong>Loyalty & Rewards Expansion:</strong> Introduce tier-based rewards and exclusive benefits tailored to user engagement.</li>
            <li><strong>DeFi Integration:</strong> Enable staking, lending, and liquidity provisioning through leading decentralized finance protocols.</li>
            <li><strong>Sustainability & Eco-Innovation:</strong> Launch carbon offset initiatives and establish eco-partnerships for green travel.</li>
            <li><strong>Continuous Expansion:</strong> Explore NFT integrations, metaverse applications, and eCommerce partnerships to maintain innovation.</li>
          </ul>
        </div>
      </div>
    </div>

    <footer class="roadmap-footer">
      <h3>Roadmap to a Decentralized Future</h3>
      <p>
        From the technical foundation to global adoption, every phase of our roadmap builds on the last—ensuring HRA Coin's role as a pillar of the Web3 economy and transforming travel, finance, and commerce through a unified blockchain ecosystem.
      </p>
    </footer>
  </div>
</section>

<!-- Embedded CSS for Roadmap Section -->
<style>
  .roadmap-section {
    padding: 4rem 0;
    background: #f8f8f8;
    color: #333;
  }
  .roadmap-section .container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
  }
  .roadmap-header, .roadmap-footer {
    text-align: center;
    margin-bottom: 2rem;
  }
  .roadmap-header .badge {
    display: inline-block;
    padding: 0.5rem 1rem;
    background: #393185;
    color: #fff;
    border-radius: 30px;
    font-weight: 600;
    margin-bottom: 1rem;
  }
  .roadmap-header h2 {
    font-size: 2.5rem;
    margin-bottom: 1rem;
    color: #393185;
  }
  .roadmap-header .intro {
    font-size: 1.2rem;
    font-weight: bold;
  }
  .roadmap-header .description {
    font-size: 1rem;
    margin-top: 0.5rem;
  }
  .timeline {
    position: relative;
    padding: 2rem 0;
    max-width: 900px;
    margin: 0 auto;
  }
  .timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 4px;
    background: #ddd;
    transform: translateX(-50%);
  }
  .timeline-item {
    position: relative;
    width: 50%;
    padding: 1.5rem 2rem;
    box-sizing: border-box;
  }
  /* Alternate timeline items */
  .timeline-item:nth-child(odd) {
    left: 0;
    text-align: right;
  }
  .timeline-item:nth-child(even) {
    left: 50%;
    text-align: left;
  }
  .timeline-item::before {
    content: '';
    position: absolute;
    top: 1.5rem;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #393185;
    border: 4px solid #fff;
    box-shadow: 0 0 0 2px #393185;
  }
  .timeline-item:nth-child(odd)::before {
    right: -10px;
  }
  .timeline-item:nth-child(even)::before {
    left: -10px;
  }
  .timeline-content h3 {
    font-size: 1.5rem;
    margin-bottom: 0.5rem;
    color: #393185;
  }
  .timeline-content ul {
    list-style: none;
    padding: 0;
    font-size: 0.95rem;
    line-height: 1.6;
  }
  .timeline-content li {
    margin-bottom: 0.5rem;
  }
  .roadmap-footer h3 {
    font-size: 2rem;
    color: #393185;
    margin-bottom: 1rem;
  }
  .roadmap-footer p {
    font-size: 1rem;
    line-height: 1.6;
  }
  @media (max-width: 768px) {
    .timeline {
      padding: 1rem 0;
    }
    .timeline::before {
      left: 8px;
    }
    .timeline-item {
      width: 100%;
      padding-left: 2.5rem;
      margin-bottom: 2rem;
      text-align: left !important;
      left: 0 !important;
    }
    .timeline-item::before {
      left: 0;
    }
  }
</style>



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
                <p style="color: #393185;">Your Trusted Blockchain Solution in UAE</p>
            </div>

            <div class="epay-grid">
                <div class="epay-content">
                    <div class="location-badge">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M12 13.5C13.6569 13.5 15 12.1569 15 10.5C15 8.84315 13.6569 7.5 12 7.5C10.3431 7.5 9 8.84315 9 10.5C9 12.1569 10.3431 13.5 12 13.5Z" stroke="currentColor" stroke-width="2"/>
                            <path d="M12 22C14 18 20 15.4183 20 10C20 5.58172 16.4183 2 12 2C7.58172 2 4 5.58172 4 10C4 15.4183 10 18 12 22Z" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span>Abu Dhabi, UAE</span>
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

                    <div class="web3-links"style="color: #393185;" >
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

                    <div class="epay-links" style="color: #393185;">
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

                    <div class="brokers-links" style="color: #393185;">
                        <a href="https://www.hra-exchange.com" target="_blank" rel="noopener noreferrer" class="primary-btn" style="margin: 1em 0; width: 200px; text-align: center;">
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

    <!-- 4. Europ Invest Group -->
    <section class="hra-epay" style="
    background: white;
    border-radius: 25px;
    padding: 1em;
">
        <div class="a">
            <div class="epay-header">
                <h2 style="color: #393185;">Europe Invest Group</h2>
                <p style="color: #393185;">Your reliable investment partner based in Belgium</p>
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
                    
                    <h3>Licensed</h3>
                    <p>urope Invest Group is a Belgian investment company that actively supports innovative projects within the HRA Experience ecosystem</p>
                    
                    <div class="epay-features">
                        <div class="feature">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M382-240 154-468l57-57 171 171 367-367 57 57-424 424Z"/></svg>
                            <a href="{{ asset('assets/pdfs/little-oummah-license.pdf') }}" target="_blank" rel="noopener noreferrer" class="text-decoration-underline">
                                Licence
                            </a>
                        </div>
                    </div>

                    <div class="epay-links" style="color: #393185;">
                    
    <a href="https://www.hra-experience.com" target="_blank" rel="noopener noreferrer" class="primary-btn text-decoration-none d-inline-flex align-items-center justify-content-center" style="width: 200px;">
        Visit HRA Experience
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="ms-2">
            <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </a>

    <a href="https://www.hra-airlines.com" target="_blank" rel="noopener noreferrer" class="primary-btn text-decoration-none d-inline-flex align-items-center justify-content-center" style="width: 200px;">
        Visit HRA Airlines
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="ms-2">
            <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </a>

    <a href="https://www.hra-epay.com" target="_blank" rel="noopener noreferrer" class="primary-btn text-decoration-none d-inline-flex align-items-center justify-content-center" style="width: 200px;">
        Visit HRA Epay
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" class="ms-2">
            <path d="M7 17L17 7M17 7H7M17 7V17" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </a>


                        <div class="social-links">
                         
                            <a href="https://www.instagram.com/hra_experience/" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-instagram"></i>
                                Instagram
                            </a>,
                            
                            <a href="https://www.tiktok.com/@hraexperience" target="_blank" rel="noopener noreferrer" class="social-link">
                                <i class="fab fa-tiktok"></i>
                                TikTok
                            </a>
                        </div>
                    </div>
                </div>

                <div class="epay-visual">
                    <div class="epay-card">
                        <img src="{{ asset('images/europgroupinvest.png') }}" alt="Europ Group" class="epay-logo" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>

<section id="features" class="th zh" style="padding: 4rem 0; background: linear-gradient(180deg, rgba(57,49,133,0.05) 0%, rgba(57,49,133,0) 100%);">
  <div class="a">
    <!-- Section Header -->
    <div class="wow fadeInUp la fb id fi qn" data-wow-delay="0s" style="text-align: center; margin-bottom: 2rem;">
      <span class="fn" style="display: inline-block; padding: 0.5rem 1.5rem; background: rgba(57,49,133,0.1); border-radius: 30px; color: var(--primary); font-weight: 500;">Why</span>
      <h2 class="bo" style="font-size: 2.5rem; font-weight: bold; margin-top: 1rem; color: var(--primary);">Why HRA Coin?</h2>
      <p class="gi qi xi ul" style="font-size: 1.1rem; line-height: 1.8; color: #666; max-width: 700px; margin: 1rem auto;">
        HRA Coin is not just another digital asset—it’s a robust utility token that redefines financial transactions in a global, decentralized ecosystem. Enjoy ultra‑low fees, lightning‑fast processing, and unparalleled security, while gaining access to exclusive rewards and innovative features that empower your digital lifestyle.
      </p>
    </div>

    <!-- Features Grid -->
    <div class="ha qb _d">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Feature Card 1: Low Transaction Fees -->
        <div class="wow fadeInUp" data-wow-delay="0s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Low Transaction Fees</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            Send and receive funds at a fraction of the cost compared to traditional systems. HRA Coin minimizes fees to maximize your value.
          </p>
        </div>

        <!-- Feature Card 2: Global Acceptance -->
        <div class="wow fadeInUp" data-wow-delay="0.2s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Global Acceptance</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            Make seamless cross-border transactions without intermediaries or currency exchange hassles. HRA Coin is designed for a truly global market.
          </p>
        </div>

        <!-- Feature Card 3: Fast Processing Times -->
        <div class="wow fadeInUp" data-wow-delay="0.4s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Lightning-Fast Speed</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            Powered by blockchain technology, HRA Coin processes transactions in mere seconds—ensuring efficiency for every payment.
          </p>
        </div>

        <!-- Feature Card 4: Robust Security -->
        <div class="wow fadeInUp" data-wow-delay="0.6s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Unmatched Security</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            Leveraging the power of the Binance Smart Chain and smart contracts, HRA Coin ensures your transactions remain secure and immutable.
          </p>
        </div>

        <!-- Feature Card 5: Innovative & Scalable -->
        <div class="wow fadeInUp" data-wow-delay="0.8s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Innovative & Scalable</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            With continuous upgrades and a design built for expansion, HRA Coin stays ahead of market demands, offering you a future-proof digital asset.
          </p>
        </div>

        <!-- Feature Card 6: Community & Investor Rewards -->
        <div class="wow fadeInUp" data-wow-delay="1s" style="background: white; border-radius: 20px; padding: 2rem; box-shadow: 0 10px 20px rgba(57,49,133,0.1);">
          <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem;">Exclusive Rewards</h3>
          <p style="font-size: 1rem; color: #666; line-height: 1.6;">
            Benefit from a range of investor and community rewards, including flexible payment options and access to exclusive future innovations.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 
Tokenomics Section
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
                        <p class="gi qi xi ul">
                        Token Name: HRA Coin 
                        </p>
                        <p class="gi qi xi ul">
                        Token Symbol: HRA
                        </p><p class="gi qi xi ul">
                        Blockchain: Binance Smart Chain (BEP-20)</p><br>
                        <p class="gi qi xi ul">
                        Contract Address: 0x5E64326cE6DF66CDfa62F8B154097BF536233451</p><br>
                        <p class="gi qi xi ul">
                        Total Supply: 1,000,000,000 HRA (1 Billion)</p>
                        <p class="gi qi xi ul">
                        Decimals: 18</p>
                        <p class="gi qi xi ul">
                        Token Standard: BEP-20</p>
                        <p class="gi qi xi ul">
                        Token Type: Utility Token
                        </p>
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
                                <span class="gi qi xi ul">Europe Invest Group : 10% </span>
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
            'Europe Invest Group',
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
</script> -->

<!-- Tokenomics Section -->
<section id="tokenomics" class="th e ca" style="padding: 4rem 0; background: #f4f4f4;">
  <div class="a" style="max-width: 1200px; margin: 0 auto; padding: 0 1rem;">
    <!-- Section Header -->
    <div class="section-header" style="text-align: center; margin-bottom: 2rem;">
      <span class="badge" style="display: inline-block; padding: 0.5rem 1.5rem; background: #393185; color: white; border-radius: 30px; font-weight: 600;">
        Tokenomics
      </span>
      <h2 style="font-size: 2.5rem; color: #393185; margin: 1rem 0;">HRA Coin Details</h2>
      <p style="font-size: 1.125rem; color: #555; max-width: 800px; margin: 0 auto;">
        HRA Coin is our next-generation BEP-20 utility token built on the Binance Smart Chain. It powers our ecosystem with cutting‑edge technology, ensuring secure and efficient transactions worldwide.
      </p>
    </div>

    <!-- Tokenomics Content: Chart & Details -->
    <div class="tokenomics-content" style="display: flex; flex-wrap: wrap; gap: 2rem; align-items: flex-start;">
      <!-- Chart Column -->
      <div class="chart-column" style="flex: 1 1 400px; min-width: 300px;">
        <div class="wow fadeInUp" data-wow-delay="0s">
          <div id="tokenomicsChart" style="width: 100%; min-height: 400px; background: transparent;"></div>
        </div>
      </div>
      
      <!-- Details Column -->
      <div class="details-column" style="flex: 1 1 400px; min-width: 300px;">
        <!-- Token Specifications -->
        <div class="token-specs wow fadeInUp" data-wow-delay="0s" style="margin-bottom: 2rem;">
          <p style="font-size: 1rem; color: #333; line-height: 1.8;">
            <strong>Token Name:</strong> HRA Coin<br>
            <strong>Token Symbol:</strong> HRA<br>
            <strong>Blockchain:</strong> Binance Smart Chain (BEP‑20)<br>
            <strong>Contract Address:</strong> 0x5E64326cE6DF66CDfa62F8B154097BF536233451<br>
            <strong>Total Supply:</strong> 1,000,000,000 HRA (1 Billion)<br>
            <strong>Decimals:</strong> 18<br>
            <strong>Token Standard:</strong> BEP‑20<br>
            <strong>Token Type:</strong> Utility Token
          </p>
        </div>
        
        <!-- Revenue Distribution -->
        <div class="revenue-distribution wow fadeInUp" data-wow-delay="0s">
          <h2 style="font-size: 2rem; color: #393185; margin-bottom: 1rem;">Revenue Distribution</h2>
          <p style="font-size: 1rem; color: #555; margin-bottom: 1rem;">
            The revenue generated within the HRA Ecosystem is reinvested strategically to fuel further innovation and growth:
          </p>
          <div class="distribution-list" style="display: flex; flex-direction: column; gap: 0.75rem;">
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #393185; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">HRA Financial Brokers: <strong>30%</strong></span>
            </div>
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #2d2668; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">HRA Epay: <strong>20%</strong></span>
            </div>
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #9590c3; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">HRA Web3 Services: <strong>15%</strong></span>
            </div>
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #8695ca; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">HRA Airlines: <strong>15%</strong></span>
            </div>
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #000000; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">Europe Invest Group: <strong>10%</strong></span>
            </div>
            <div class="distribution-item" style="display: flex; align-items: center;">
              <span style="display: inline-block; width: 12px; height: 12px; background: #637381; border-radius: 50%; margin-right: 0.5rem;"></span>
              <span style="font-size: 1rem; color: #333;">HRA Experience App: <strong>10%</strong></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Inline CSS for Hover Effects -->
<style>
  .distribution-list .distribution-item:hover {
    background: rgba(62, 125, 255, 0.1);
    border-radius: 8px;
    padding: 0.25rem;
  }
  #tokenomicsChart {
    margin: 0 auto;
  }
</style>

<!-- Tokenomics Chart Script -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
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
        'Europe Invest Group',
        'HRA Experience App'
      ],
      colors: ['#393185', '#2d2668', '#9590c3', '#8695ca', '#000000', '#637381'],
      legend: {
        position: 'bottom',
        horizontalAlign: 'center',
        fontSize: '14px',
        labels: {
          colors: '#000'
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
        formatter: function(val) { return val + '%'; },
        style: {
          fontSize: '14px',
          fontFamily: 'Inter, sans-serif',
          fontWeight: 'bold',
          colors: ['#fff']
        }
      },
      tooltip: {
        enabled: true,
        y: {
          formatter: function(val) { return val + '%'; }
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
          chart: { height: 300 },
          legend: { fontSize: '12px' }
        }
      }]
    };

    function initChart() {
      try {
        const chartElement = document.querySelector("#tokenomicsChart");
        if (!chartElement) {
          console.error("Tokenomics chart element not found.");
          return;
        }
        if (typeof ApexCharts === 'undefined') {
          console.error("ApexCharts library is not loaded.");
          return;
        }
        const chart = new ApexCharts(chartElement, options);
        chart.render().catch(error => {
          console.error("Error rendering the tokenomics chart:", error);
        });
      } catch (error) {
        console.error("Error initializing the tokenomics chart:", error);
      }
    }
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
                What Sets HRA Coin Apart from Traditional Cryptocurrencies?
            </h2>
            <p class="gi qi xi ul">
                HRA Coin is built on the Binance Smart Chain (BEP‑20), a high-performance blockchain known for its scalability, low gas fees, and lightning-fast transaction speeds. What makes HRA Coin unique is its deep integration into a real-world ecosystem, enabling instant payments, seamless bookings, and real-time withdrawals within our interconnected platforms—such as travel, payments, and crypto finance.
                <br><br>
                Unlike traditional cryptocurrencies that operate in isolation, HRA Coin acts as a unified utility token across a growing suite of platforms, offering users tangible benefits such as reduced costs, borderless usage, and decentralized efficiency. Its foundation on BSC not only ensures reliability and security, but also makes it ideal for micro and macro transactions across global markets.
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
                            HRA Coin is a digital currency developed by HRA Ecosystem, specifically designed for use
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
                            Once the coin is available on cryptocurrency exchanges starting Q2 , 2025, the
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
                            <p class="ii qi wi xi ul">+971 26 322 569</p>
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
            'Europe Investment Group',
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

