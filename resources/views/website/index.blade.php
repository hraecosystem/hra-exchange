@extends('website.layouts.master')

@section('title',''.settings('company_name'))

@section('content')

    <div id="hom" class="fugu--hero-section3" style="background-image: url(images/all-img/hero-bg2.png)">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="fugu--hero-content fugu--hero-content3">
                        <h1 class="wow fadeInUpX" data-wow-delay="0s">Powering the Future of Decentralized Finance</h1>
                        <p class="wow fadeInUpX" data-wow-delay="0.15s">
                            HRA Chain is a next-generation, EVM-compatible blockchain designed to accelerate the
                            adoption of decentralized finance, GameFi, and tokenization of real-world assets (RWA).
                        </p>
                        <div class="fugu--btn-wrap fugu--hero-btn wow fadeInUpX" data-wow-delay="0.25s">
                            <a class="fugu--btn bg-blue active" href="{{ route('member.register.create') }}">Get
                                Started</a>
                            <a class="fugu--btn bg-blue" href="{{ settings('white_paper_link') }}">WhitePaper</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="fugu--thumb-three">
                        <div class="fugu--hero-thumb fugu--hero-thumb3">
                            <img class="wow fadeInUpX" data-wow-delay="0.20s"
                                 src="{{ asset('images/all-img/hero-thumb.png') }}" alt="">
                            <div class="fugu--bitcoin bitcoin-one">
                                <img src="{{ asset('images/all-img/bitcoin1.png') }}" alt="">
                            </div>
                            <div class="fugu--bitcoin bitcoin-two">
                                <img src="{{ asset('images/all-img/bitcoin2.png') }}" alt="">
                            </div>
                            <div class="fugu--bitcoin bitcoin-three">
                                <img src="{{ asset('images/all-img/bitcoin3.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fugu--circle-shape circle-one">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
        <div class="fugu--circle-shape circle-two">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
    </div>

    <div id="partners" class="fugu--client-section">
        <div class="container">
            <div class="fugu--client-title">
                <p>Our Partners</p>
            </div>
            <div class="fugu-client-slider">
                @for($i=1;$i<=5;$i++)
                    <div class="fugu--brand-logo">
                        <img src="{{ asset('images/all-img/'.$i.'.png') }}" alt="">
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div id="build" class="fugu--video-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="fugu--video-thumb wow fadeInUpX" data-wow-delay="0.10s">
                        <img src="{{ asset('images/HRA-Blockchain-Transparent.png') }}" alt="">
                        {{--                        <div class="fugu--video-shape1">--}}
                        {{--                            <img src="images/shape2/shape-video.png" alt="">--}}
                        {{--                        </div>--}}
                        {{--                        <div class="fugu--video-shape2">--}}
                        {{--                            <img src="images/shape2/shape-video.png" alt="">--}}
                        {{--                        </div>--}}
                    </div>
                </div>
                <div class="col-xl-6 d-flex align-items-center">
                    <div class="fugu--default-content">
                        <h2>Build on HRA Chain</h2>
                        <p>
                            For developers and enterprises, HRA Chain provides a familiar, user-friendly development
                            environment compatible with popular Ethereum tools like Remix, MetaMask, and Truffle.
                        </p>
                        <p>
                            Create and deploy smart contracts effortlessly, empowering innovation in DeFi, GameFi, and
                            beyond.
                        </p>
                        <div class="fugu--btn-wrap">
                            <a class="fugu--btn bg-blue" href="{{ route('member.register.create') }}">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End video section -->

    <div id="ecoSystem" class="fugu--feature-section fugu--section-padding2">
        <div class="container">
            <div class="fugu--section-title">
                <div class="fugu--default-content">
                    <h2>Explore the HRA Ecosystem</h2>
                    <p>
                        Built for speed, security, and scalability, HRA Chain is your gateway to the decentralized
                        world.
                    </p>
                </div>
            </div>
            <div class="row justify-content-center">
{{--                <div class="col-xl-4 col-md-6">--}}
{{--                    <div class="fugu--iconbox-wrap fugu--iconbox-wrap3 wow fadeInUpX" data-wow-delay="0s">--}}
{{--                        <div class="fugu--iconbox-thumb">--}}
{{--                            <svg width="41" height="45" viewBox="0 0 41 45" fill="none"--}}
{{--                                 xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path--}}
{{--                                    d="M39.4221 5.78276L22.9278 0.41887C21.2076 -0.139885 19.3257 -0.139885 17.5992 0.42044L4.87969 4.55774L1.09868 5.81808C0.442609 6.03703 0 6.65072 0 7.34288V11.3185C0 24.173 6.11021 35.91 16.3452 42.7155L19.3759 44.7308C19.6459 44.9105 19.9551 45 20.2659 45C20.5766 45 20.8858 44.9105 21.1558 44.7308L24.1866 42.7155C34.4215 35.91 40.5317 24.1613 40.5317 11.2871V7.31149C40.5317 6.6154 40.0828 5.99857 39.4221 5.78276ZM37.3173 11.2871C37.3173 23.0822 31.7439 33.8312 22.4067 40.0395L20.2659 41.463L18.125 40.0395C8.78784 33.8312 3.21441 23.094 3.21441 11.3185V8.5012L18.5943 3.4779C19.6741 3.12632 20.8591 3.12632 21.9327 3.47633L37.3173 8.47923V11.2871Z"--}}
{{--                                    fill="white"/>--}}
{{--                                <path--}}
{{--                                    d="M19.2865 5.62628L6.57792 9.75888C5.91715 9.97469 5.46826 10.6229 5.46826 11.319C5.46826 22.3364 10.665 32.3704 19.3712 38.1589C19.6412 38.3386 19.9504 38.4281 20.2611 38.4281C20.5719 38.4281 20.8811 38.3386 21.1511 38.1589C29.8573 32.3704 35.054 22.3364 35.054 11.319V11.2876C35.054 10.5915 34.6051 9.97469 33.9444 9.75888L21.2358 5.62707C20.5986 5.41832 19.9237 5.4191 19.2865 5.62628ZM20.2611 34.8644C13.2846 29.8058 9.03582 21.5736 8.70308 12.4467L20.2407 8.68374L31.8192 12.4483C31.4943 21.5587 27.244 29.8011 20.2611 34.8644Z"--}}
{{--                                    fill="white"/>--}}
{{--                                <path--}}
{{--                                    d="M25.3529 17.6552C24.7251 17.0259 23.7081 17.0274 23.0803 17.6537L19.1752 21.5548L17.4425 19.8243C16.8147 19.1981 15.796 19.1965 15.1682 19.8259C14.542 20.4537 14.542 21.4716 15.1698 22.0986L18.0389 24.9638C18.3528 25.2769 18.764 25.4339 19.1752 25.4339C19.5865 25.4339 19.9977 25.2769 20.3116 24.9638L25.3529 19.9279C25.9808 19.3009 25.9808 18.2831 25.3529 17.6552Z"--}}
{{--                                    fill="white"/>--}}
{{--                            </svg>--}}
{{--                        </div>--}}
{{--                        <div class="fugu--iconbox-data">--}}
{{--                            <h4>Crypto Volt</h4>--}}
{{--                            <p>--}}
{{--                                Our integrated exchange offers a seamless experience for buying, selling, and trading--}}
{{--                                digital assets. Built with top-notch security, advanced trading tools, and high--}}
{{--                                liquidity, it provides users with a trusted and easy-to-navigate platform for all their--}}
{{--                                crypto needs.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-xl-4 col-md-6">
                    <div class="fugu--iconbox-wrap fugu--iconbox-wrap3 wow fadeInUpX" data-wow-delay=".10s">
                        <div class="fugu--iconbox-thumb">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M43.3929 10.4464H6.83036C4.83634 10.4464 3.21429 8.82359 3.21429 6.83036C3.21429 4.83712 4.83634 3.21429 6.83036 3.21429H32.9464C33.834 3.21429 34.5536 2.49547 34.5536 1.60714C34.5536 0.71882 33.834 0 32.9464 0H6.83036C3.0644 0 0 3.06362 0 6.83036V35.3571C0 40.6745 4.32547 45 9.64286 45H43.3929C44.2804 45 45 44.2812 45 43.3929V12.0536C45 11.1652 44.2804 10.4464 43.3929 10.4464ZM9.64286 41.7857C6.0982 41.7857 3.21429 38.9026 3.21429 35.3571V12.6014C4.26574 13.2627 5.49925 13.6607 6.83036 13.6607H41.7857V41.7857H9.64286Z"
                                    fill="white"/>
                                <path
                                    d="M5.22339 6.83047C5.22339 7.71879 5.94299 8.43761 6.83053 8.43761H38.1698C39.0574 8.43761 39.777 7.71879 39.777 6.83047C39.777 5.94215 39.0574 5.22333 38.1698 5.22333H6.83053C5.94299 5.22333 5.22339 5.94215 5.22339 6.83047Z"
                                    fill="white"/>
                                <path
                                    d="M31.2754 29.0438C31.3466 28.6621 31.2324 28.2919 31.0682 27.9524L23.8635 16.4246C23.275 15.4861 21.7259 15.4861 21.1373 16.4246L13.9327 27.9524C13.6106 28.5323 13.6399 29.2378 14.0221 29.784L21.2268 39.149C21.5305 39.5446 22.0013 39.7768 22.5004 39.7768C22.9995 39.7768 23.4704 39.5446 23.7741 39.149L30.9787 29.784C31.109 29.5516 31.2526 29.3149 31.2754 29.0438ZM22.5004 20.3091L27.2256 27.8704L22.5004 29.288L17.7752 27.8704L22.5004 20.3091ZM22.5004 35.5345L19.6095 31.7772L22.039 32.5055C22.3388 32.5965 22.6621 32.5965 22.9619 32.5055L25.3914 31.7772L22.5004 35.5345Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="fugu--iconbox-data">
                            <h4>DeFi & GameFi Solutions</h4>
                            <p>
                                HRA is at the forefront of decentralized finance and gaming applications, offering a
                                robust ecosystem where developers can deploy dApps, create smart contracts, and build
                                decentralized games with ease. Our EVM compatibility allows for seamless integration of
                                decentralized applications.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6">
                    <div class="fugu--iconbox-wrap fugu--iconbox-wrap3 wow fadeInUpX" data-wow-delay=".20s">
                        <div class="fugu--iconbox-thumb">
                            <svg width="45" height="45" viewBox="0 0 45 45" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M41.3416 0H3.65923C1.64167 0 0 1.64167 0 3.65923V31.4115C0 33.7837 1.93045 35.7142 4.30272 35.7142H16.6319C16.9654 37.7225 16.9654 39.7774 16.6319 41.7857H13.4551C12.5676 41.7857 11.848 42.5053 11.848 43.3929C11.848 44.2804 12.5676 45 13.4551 45H31.5449C32.4332 45 33.152 44.2804 33.152 43.3929C33.152 42.5053 32.4332 41.7857 31.5449 41.7857H28.3672C28.0339 39.7773 28.0339 37.7226 28.3672 35.7142H40.6965C43.0695 35.7142 45 33.7837 45 31.4115V3.65923C45 1.64167 43.3583 0 41.3416 0ZM41.7857 31.4115C41.7857 32.0118 41.2976 32.4999 40.6965 32.4999H4.30272C3.70239 32.4999 3.21429 32.0118 3.21429 31.4115V3.65923C3.21429 3.41361 3.41361 3.21429 3.65923 3.21429H41.3416C41.5864 3.21429 41.7857 3.41361 41.7857 3.65923V31.4115ZM25.0849 41.7857H19.9143C20.1968 39.7752 20.1968 37.7247 19.9143 35.7142H25.0849C24.8024 37.7247 24.8024 39.7752 25.0849 41.7857Z"
                                    fill="white"/>
                                <path
                                    d="M36.161 25.986H8.83956C7.95203 25.986 7.23242 26.7056 7.23242 27.5931C7.23242 28.4806 7.95203 29.2002 8.83956 29.2002H36.161C37.0493 29.2002 37.7681 28.4806 37.7681 27.5931C37.7681 26.7056 37.0493 25.986 36.161 25.986Z"
                                    fill="white"/>
                                <path
                                    d="M15.995 23.8984C16.3002 24.2696 16.7554 24.4846 17.2357 24.4846C17.7159 24.4846 18.1711 24.2696 18.4763 23.8984L23.0254 18.3715L24.8539 20.5938C25.1537 20.958 25.5978 21.1722 26.0687 21.18C26.5222 21.1753 26.9915 20.9886 27.3023 20.6339L37.3673 9.18219C37.9527 8.51516 37.8884 7.49971 37.2214 6.9143C36.5559 6.32888 35.5373 6.39245 34.9535 7.06026L26.1361 17.0923L24.2669 14.8213C23.9609 14.4501 23.5057 14.2351 23.0254 14.2351C22.5452 14.2351 22.09 14.4501 21.7848 14.8213L17.2357 20.3482L13.9523 16.3594C13.3873 15.6735 12.3758 15.5747 11.6907 16.1397C11.0048 16.7031 10.9067 17.7162 11.471 18.4013L15.995 23.8984Z"
                                    fill="white"/>
                            </svg>
                        </div>
                        <div class="fugu--iconbox-data">
                            <h4>Real-World Asset Tokenization</h4>
                            <p>
                                HRA Chain's RWA solutions allow businesses to tokenize and trade real-world assets such
                                as real estate and commodities, enabling secure and transparent transactions.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Fugu feature section -->

    <div id="blockchain" class="fugu--content-section pb-5">
        <div class="container">
            <div class="fugu--content-bottom">
                <div class="row">
                    <div class="col-xl-6 d-flex align-items-center">
                        <div class="fugu--content-thumb">
                            <img class="wow fadeInLeft" data-wow-delay=".10s"
                                 src="{{ asset('images/all-img/staking.png') }}" alt="">

                            {{--                            <div class="fugu--content-shape">--}}
                            {{--                                <img src="{{ asset('images/shape2/shape-video.png') }}" alt="">--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="fugu--default-content">
                            <h2>Blockchain Infrastructure Built for Speed and Security</h2>
                            <div class="fugu-accordion-wrap">
                                <div class="fugu-accordion-item">
                                    <h4>Unmatched Performance</h4>
                                    <p>
                                        HRA Chain leverages state-of-the-art blockchain technology to deliver
                                        lightning-fast transaction times and low fees, making it ideal for
                                        applications across RWA, GameFi, and DeFi. With block times of just 5
                                        seconds, the platform ensures real-time settlement and an unparalleled user
                                        experience.
                                    </p>
                                </div>
                                <div class="fugu-accordion-item">
                                    <h4>Security First</h4>
                                    <p>
                                        HRA Chain employs advanced cryptographic mechanisms and consensus protocols
                                        to secure every transaction, protecting both user data and digital assets.
                                        Whether you're a developer building dApps or an enterprise integrating
                                        blockchain solutions, our platform guarantees integrity and security.
                                    </p>
                                </div>
                                <div class="fugu-accordion-item">
                                    <h4>User centric</h4>
                                    <p>
                                        HRA's platform is built with the user in mind, offering a seamless and intuitive
                                        interface that simplifies blockchain interactions. We prioritize accessibility
                                        and user empowerment, providing personalized experiences and enabling users to
                                        take full control of their digital assets with ease and confidence.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="road" class="fugu--faq-section2 fugu--section-padding-bottom">
        <div class="fugu--section-title">
            <div class="fugu--default-content">
                <h2>Roadmap</h2>
            </div>
        </div>
        <div class="container road-map style-4 overflow-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="road-map__main">
                        <div class="box-roadmap left active" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="title">Q4 of 2023</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Ideation of HRA Chain</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap right active" data-aos="fade-left" data-aos-duration="1000">
                            <h5 class="title">Q1 of 2024</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Blockchain Development started</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap left active" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="title">Q2 of 2024</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Adding Rockstar team members</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap right active" data-aos="fade-left" data-aos-duration="1000">
                            <h5 class="title">Q3 of 2024</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Launching HRA chain Website</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing HRA Chain Whitepaper</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing Pre-ICO</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap left" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="title">Q4 2024</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing Private Sale/ICO</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing Social media Official Accounts</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">KOL Campaigns</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">1st Glance of HRA Blockchain Testnet</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap right" data-aos="fade-left" data-aos-duration="1000">
                            <h5 class="title">Q1 2025</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Community Building</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing HRA Blockchain Testnet</p></li>
{{--                                <li>--}}
{{--                                    <div class="dot"></div>--}}
{{--                                    <p class="fs-17">Announcement of CryptoVolt Crypto Exchange</p></li>--}}
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Announcing HRA EcoSystem</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Next Phase ICOs</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap left" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="title">Q2 2025</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">KOLs International Tie ups</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Growing HRA Communities</p></li>
{{--                                <li>--}}
{{--                                    <div class="dot"></div>--}}
{{--                                    <p class="fs-17">Beta Launch of CryptoVolt</p></li>--}}
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Launching HRA Chain Mainnet</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap right" data-aos="fade-left" data-aos-duration="1000">
                            <h5 class="title">Q3 2025</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Introducing HRA Staking Program</p></li>
                                <li>
{{--                                <li>--}}
{{--                                    <div class="dot"></div>--}}
{{--                                    <p class="fs-17">CryptoVolt Official Launch</p>--}}
                                </li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Community Growth RegionWise</p>
                                </li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Inviting Developers to Build on HRA</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Announcing HRA wallet</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Launching HRA Web Application</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap left" data-aos="fade-right" data-aos-duration="1000">
                            <h5 class="title">Q4 2025</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Growing HRA Community</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Expanding KOLs network</p></li>
{{--                                <li>--}}
{{--                                    <div class="dot"></div>--}}
{{--                                    <p class="fs-17">Additional Feature Announcement regarding Exchange</p></li>--}}
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Beta Launch of HRA Wallet</p></li>
                            </ul>
                        </div>
                        <div class="box-roadmap right" data-aos="fade-left" data-aos-duration="1000">
                            <h5 class="title">Q1 2026</h5>
                            <ul class="list">
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Announcing HRA Grants for Developers</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Expanding Ecosystem with community</p></li>
                                <li>
                                    <div class="dot"></div>
                                    <p class="fs-17">Official Launch of HRA Wallet</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End content section -->
    <div class="fugu-hero-section2">
        <div class="container">
            <div class="fugu-hero-content fugu-hero-content2">
                <h1 class="wow fadeInUpX text-white" data-wow-delay="0s">Securely Build on HRA</h1>
                <p class="wow fadeInUpX text-gray" data-wow-delay="0.25s">
                    Start building on HRA Ecosystem using solidity and the tools you’re already familiar with: Remix,
                    Meta, Mask and Truffle. HRA is an EVM compatible blockchain and you can deploy your dApps just
                    like on Ethereum. Access to the documentation and connect with our developer community.
                </p>
            </div>
        </div>
        <div class="fugu-shape4">
            <img src="{{ asset('images/shape/shape3.png') }}" alt="">
        </div>
        <div class="fugu-shape5">
            <img src="{{ asset('images/shape/shape4.png') }}" alt="">
        </div>
    </div>
    <div class="section bg-black-custom  fugu--section-padding-bottom">
        <div class="container">
            <div class="fugu-single-thumb wow fadeInUpX" data-wow-delay="0.20s"
                 style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUpX;">
                <img class="img-fluid rounded-3" src="{{ asset('images/explore.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="fugu--faq-section2 fugu--section-padding-bottom">
        <div class="container">
            <div class="fugu--section-title">
                <div class="fugu--default-content">
                    <h2>Do you have any questions about HRA Chain? Ask us</h2>
                    <p> Frequently asked questions about HRA Chain & blockchain technology. Cryptographic security
                        for conducting trusted transactions.</p>
                </div>
            </div>
            <div class="fugu--accordion-one accordion-three" id="accordionExample2">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        @foreach($faqs as $index=> $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading{{ $index }}">
                                    <button class="accordion-button {{ $index == 0 ? 'collapsed' : '' }}" type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $index }}" aria-expanded="true"
                                            aria-controls="collapse{{ $index }}">
                                        Q. {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $index }}"
                                     class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}"
                                     aria-labelledby="heading{{ $index }}" data-bs-parent="#accordionExample2">
                                    <div class="accordion-body">
                                        A {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="fugu--circle-shape circle-five">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
        <div class="fugu--circle-shape circle-six">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
        <div class="fugu--circle-shape circle-seven">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
    </div>
    <!-- End faq section -->

    <div class="fugu--cta-section">
        <div class="container">
            <div class="fugu--cta-wrap">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="fugu--cta-thumb wow fadeInUpX" data-wow-delay=".10s">
                            <img src="{{ asset('images/all-img/cta-thumb.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center">
                        <form class="mt-3" action="{{ route('website.newletter') }}" method="post" class=""
                              onsubmit="subButton.disabled = true; return true;">
                            @csrf
                            <div class="fugu--default-content">
                                <h2>Subscribe to learn more and get updates</h2>
                                <p>A membership site lets you create a secure platform that allows you to deliver
                                    content
                                    easily and automatically..</p>
                                <div class="fugu--newsletter fugu--newsletter2">
                                    <input type="email" placeholder="Type your email here" name="email">
                                    <button type="submit" id="fugu--submit-btn">Subscribe</button>
                                </div>
                                @foreach($errors->get('email') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fugu--circle-shape circle-eight">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
        <div class="fugu--circle-shape circle-nine">
            <img src="{{ asset('images/all-img/shapes-round.png') }}" alt="">
            <div class="waves wave-1"></div>
        </div>
    </div>
    <!-- End cta section -->

    <div class="fugu-go-top">
        <img src="{{ asset('images/arrow-black-right.svg') }}" alt="">
    </div>
@endsection
@push('page-javascript')

@endpush


