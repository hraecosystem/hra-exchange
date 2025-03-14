<div class="col-md-4 offset-md-2 mb-lg-0 mb-3" id="app">
    <div class="card swap-card wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.7s">
        <div class="card-disabled" v-if="transactionStatus === TransactionStatuses.PENDING">
            <div class="card-portlets-loader"></div>
            <div class="loader">
                <h1>PLEASE WAIT <span class="bullets">.</span></h1>
            </div>
        </div>

        <div class="card-disabled" v-if="transactionStatus === TransactionStatuses.VERIFYING"
             v-cloak>
            <div class="card-portlets-loader"></div>
            <div class="loader">
                <h1>Verifying your transaction <span class="bullets">.</span></h1>
            </div>
        </div>

        <div class="card-disabled" v-if="transactionStatus === TransactionStatuses.SUCCESS" v-cloak>
            <div class="successBlock">
                <div class="text-center d-flex flex-column">
                    <img src="{{ asset('images/success.gif') }}" alt="">
                </div>
                <h4>
                    @{{ successMessage }}
                </h4>
                <button @click="reset"
                        class="connect-btn readon white-btn hover-shape">Back
                </button>
            </div>
        </div>

        <div class="pre-sale-info">
            <div class="d-flex justify-content-between px-3 align-items-center my-3">
                <h5 class="mb-0 text-center text-capitalize text-primary-gradient fw-semibold">BUY NOW BEFORE PRICE RISE!</h5>
                <div>
                    <a href="" class="history-btn" data-bs-toggle="modal" data-bs-target="#myModal"
                       v-if="walletAddress">
                        <i class="fa-duotone fa-clock-rotate-left"></i>
                    </a>
                </div>
            </div>
            <h2 class="mt-3 text-center text-primary-gradient ">@{{ currentPresale.name }}</h2>
        </div>
        <div class="token-bar">
            <div class="top">
                <h6>
                    Raised -
                    <span>@{{ currentPresale.raised }} @{{ selectedCoin.symbol }}</span>
                </h6>
                <h6>
                    Target -
                    <span>@{{ currentPresale.target }} @{{ selectedCoin.symbol }}</span>
                </h6>
            </div>
            <div class="main">
                <div class="w3-light-grey progress">
                    <div class="w3-blue"
                         :style="{ 'min-width': `${currentPresale.percentage}%`}">
                        @{{ currentPresale.percentage }}%
                    </div>
                </div>
            </div>
            <p class="text-center mt-3 mb-0 font-14 fw-bold dashTitle fw-medium position-relative">
                1 {{ env('APP_CURRENCY') }}
                = @{{ currentPresale.price }} @{{ selectedCoin.symbol }}
            </p>
        </div>
        <div class="card-body">
            <div class="section">
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="form-group basic p-0">
                            <div class="exchange-heading">
                                <label class="group-label" for="fromAmount">
                                    You Pay
                                    <small class="text-primary">
                                        (Min {{ settings('min_deposit_sol') }} @{{ selectedCoin.symbol }}
                                        and Max {{ settings('max_deposit_sol') }}
                                        @{{ selectedCoin.symbol }} for Buying)
                                    </small>
                                </label>
                            </div>
                            <div class="exchange-group">
                                <div class="input-col">
                                    <input id="amount" type="number"
                                           v-model="amount"
                                           class="form-control form-control-lg pe-0 border-0"
                                           name="amount" :placeholder="selectedCoin.symbol"
                                           oninput="validateNumber(this);"
                                           min="{{ settings('min_deposit_sol') }}"
                                           max="{{ settings('max_deposit_sol') }}"
                                           required="">
                                </div>
                                <div class="select-col">
                                    @{{ selectedCoin.symbol }}
                                </div>
                            </div>
                            <div class="d-flex"
                                 :class="{'justify-content-between': walletAddress, 'justify-content-end': !walletAddress}">
                                                    <span class="balance-info" v-if="walletAddress">
                                                       <i class="fa-light fa-wallet me-2"></i>
                                                        @{{ shortHash(walletAddress) }}
                                                    </span>
                                <div class="balance-info">
                                    Balance: @{{ bigIntToEther(web3WalletBalance)
                                    }} @{{ selectedCoin.symbol }}
                                    <a @click='setMaxAmount' class="link-primary ms-2">Max</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="exchange-line">
                    <div class="exchange-icon"><i class="fa-light fa-arrow-up-arrow-down"></i></div>
                </div>
            </div>
            <div class="section">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group basic p-0">
                            <div class="exchange-heading">
                                <label class="group-label" for="toAmount">
                                    You Receive
                                </label>
                            </div>
                            <div class="exchange-group">
                                <div class="input-col">
                                    <input id="receive_coin" type="text"
                                           name="receiveCoin" v-model="receiveCoin"
                                           class="form-control form-control-lg pe-0 border-0"
                                           placeholder="{{ env('APP_CURRENCY') }}" disabled>
                                </div>
                                <div class="select-col">
                                    {{ env('APP_CURRENCY') }}
                                </div>
                            </div>
                        </div>
                        <span class="bonus_coin"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer position-relative">
            <div class="ribbon-2" v-for="chain in chains" :value="chain.chainId">
                @{{ chain.name }}
            </div>

            <div class="mt-5" v-if="!connectedWallet || connectedChain.id != chainId">
                <div v-if="!connectedWallet">
                    <button type="button" class="btn btn-primary w-100" @click="connect()">
                        <span v-if="connectingWallet">Connecting...</span>
                        <span v-else>Connect Wallet</span>
                    </button>
                </div>
                <div v-else-if="connectedChain.id !== chainId">
                    <button type="button" class="theme-btn1 btn2 btn--ripple ripple w-100" @click="setProperChain()">
                        Switching to @{{ chainName }}...
                    </button>
                </div>
            </div>
            <div v-else class="form-button-group text-center mb-3 mt-5">
                <button class="theme-btn1 btn btn--ripple ripple w-100" type="button" @click="purchase">
                    Pay <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog model-lg modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Transactions</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-md-6" v-for="(deposit , index) in deposits"
                             v-if="deposits.length">
                            <div class="project-item hover-shape-border bg-dark">
                                <div class="project-info d-flex">
                                    <a href="javascript:void(0)">
                                        <img src="{{ asset(env('FAVICON')) }}"
                                             alt="Project-Image">
                                    </a>
                                    <div class="project-auother">
                                        <h4 class="mb-1">{{ env('APP_CURRENCY') }}</h4>
                                        <div class="dsc">Coin = @{{ deposit.kuromiQty }}</div>
                                    </div>
                                </div>
                                <div class="project-content">
                                    <div class="project-header d-flex justify-content-between">
                                        <div class="heading-title">
                                            <h4>@{{ deposit.presaleName }}</h4>
                                        </div>
                                    </div>
                                    <div class="project-media">
                                        <ul class="project-listing">
                                            <li>@{{ selectedCoin.symbol }} <span>@{{ deposit.solAmount }}</span>
                                            </li>
                                            <li>Price
                                                <span>@{{ deposit.price }} @{{ selectedCoin.symbol }}</span>
                                            </li>
                                            <li>
                                                Tx Hash
                                                <span>
                                                                        <a :href="deposit.transactionUrl" class=""
                                                                           target="_blank">
                                                                            <i class="fa fa-external-link"></i>
                                                                            @{{ shortHash(deposit.transactionHash) }}
                                                                        </a>
                                                                    </span>
                                            </li>
                                            <li>
                                                Status
                                                <span class="text-uppercase" :class="{
                                                                        'text-success': deposit.status === 'Completed',
                                                                        'text-info': deposit.status === 'Pending',
                                                                        'text-danger': deposit.status === 'Failed',
                                                                    }">
                                                                        @{{ deposit.status }}
                                                                    </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <span class="border-shadow shadow-1"></span>
                                <span class="border-shadow shadow-2"></span>
                                <span class="border-shadow shadow-3"></span>
                                <span class="border-shadow shadow-4"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
