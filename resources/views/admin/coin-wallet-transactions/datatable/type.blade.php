@if($model->type == \App\Models\CoinWalletTransaction::TYPE_CREDIT)
    <span class="btn btn-success btn-sm waves-effect waves-light">Credit</span>
@endif
@if($model->type == \App\Models\CoinWalletTransaction::TYPE_DEBIT)
    <span class="btn btn-danger btn-sm waves-effect waves-light">Debit</span>
@endif
