@extends('member.layouts.master')

@section('title')
    Buy HRA
@endsection

@section('content')
    @include('member.breadcrumbs', [
                    'crumbs' => [
                        'Buy HRA'
                    ]
               ])
    <div id="preloader">
        <div id="status">
            <div class="spinner">Loading...</div>
        </div>
    </div>
    <form action="{{ route('member.deposit.store') }}" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center" id="app">
            <div class="col-lg-5">
                <div class="section mt-4">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="form-group basic p-0">
                                <div class="exchange-heading">
                                    <label class="group-label" for="fromAmount">
                                        You Pay
                                    </label>
                                </div>
                                <div class="exchange-group">
                                    <div class="input-col">
                                        <input id="amount" type="text"
                                               class="form-control form-control-lg pe-0 border-0" name="amount"
                                               placeholder="Enter Amount"
                                               v-model="amount"
                                               required>
                                    </div>
                                    <div class="select-col">
                                        <h4 class="text-dark mb-0">Euro</h4>
                                    </div>
                                </div>
                                @foreach($errors->get('amount') as $error)
                                    <span class="text-danger">{{ $error }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="exchange-line">
                        <div class="exchange-icon">
                            <i class='bx bx-transfer'></i>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group basic p-0">
                                <div class="exchange-heading">
                                    <label class="group-label" for="toAmount">You Receive</label>
                                </div>
                                <div class="exchange-group">
                                    <div class="input-col">
                                        <input id="receive_coin" type="text"
                                               class="form-control form-control-lg pe-0 border-0" readonly
                                               :value="total" placeholder="{{ env('APP_CURRENCY')  }}"
                                               required>
                                    </div>
                                    <div class="select-col">
                                        <h4 class="text-dark mb-0">{{ env('APP_CURRENCY') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-button-group text-center">
                    <button type="submit" class="btn btn-lg w-100 btn-primary inputDisabled">
                        <i class="uil uil-message me-1"></i> Buy
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('page-javascript')
    <script type="module">
        import {computed, createApp, ref} from 'https://unpkg.com/vue@3/dist/vue.esm-browser.js'

        createApp({
            setup() {
                const amount = ref(parseFloat({{ old('amount', 0) }}))
                const price = ref(parseFloat({{ $activeIco->price }}))
                const total = computed(() => {
                    return parseFloat(amount.value ? amount.value.toString() : 0) * parseFloat(price.value)
                })

                return {
                    amount,
                    price,
                    total,
                }
            }
        }).mount('#app')
    </script>
@endpush
