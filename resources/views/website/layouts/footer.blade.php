<footer id="footer" class="fugu--footer-section">
    <div class="container">
        @if(settings('social_link'))
        <div class="fugu--footer-top fugu--default-content">
            <div class="row mb-5 mb-lg-7 text-center">
                <h2>
                    Join Community
                </h2>
                <p>
                    {{ settings('company_name') }} is a global, decentralized network with validators and community
                    members from all around the
                    world. Join the discussions on Discord and stay up to date with the latest news and announcements.
                </p>
            </div>
            <div class="row gy-5 gx-md-2 justify-content-center mb-5 mb-md-10">
                <div class="col-lg-6">
                    <div class="row">
                        @if(settings('facebook_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('facebook_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/1.png') }}"
                                         alt="Facebook"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('instagram_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('instagram_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/5.png') }}"
                                         alt="Instagram"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('twitter_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('twitter_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/3.png') }}"
                                         alt=""/>
                                </a>
                            </div>
                        @endif
                        @if(settings('linkedin_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('linkedin_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/6.png') }}"
                                         alt="Linkedin"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('youtube_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('youtube_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/9.png') }}"
                                         alt="Pinterest"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('telegram_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('telegram_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/4.png') }}"
                                         alt="Telegram"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('medium_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('medium_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/7.png') }}"
                                         alt="Medium"/>
                                </a>
                            </div>
                        @endif
                        @if(settings('telegram_group_url'))
                            <div class="col-xl col-md col-3 mb-lg-0 mb-4">
                                <a href="{{ settings('telegram_group_url') }}" target="_blank">
                                    <img class="img-fluid" src="{{ asset('images/social/4.png') }}"
                                         alt="Telegram Community"/>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="fugu--footer-bottom fugu--footer-bottom3">
            <div class="row">
                <div class="col-lg-6">
                    <p>
                        © Copyright {{ date('Y') }}. All Rights Reserved by
                        <span class="animate-underline">
                        <a class="animate-target text-dark-emphasis text-decoration-none"
                           href="https://createx.studio/" target="_blank" rel="noreferrer">
                            {{ settings('company_name') }}
                        </a>
                    </span>
                    </p>
                </div>
{{--                <div class="col-lg-6">--}}
{{--                    <div class="fugu--footer-menu">--}}
{{--                        <ul>--}}
{{--                            <li><a href="">Terms</a></li>--}}
{{--                            <li><a href=""> Privacy Policy</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
</footer>



<div class="fugu-preloader">
    <div class="fugu-spinner">
        <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
            <circle cx="50" cy="50" r="46" />
        </svg>
    </div>
    <div class="fugu-title">loading...</div>
</div>
