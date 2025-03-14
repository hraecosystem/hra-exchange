@php use App\Models\EuroWalletTransaction; @endphp
@if($model->type == \App\Models\EuroWalletTransaction::TYPE_CREDIT)
    <span class="badge light badge-success">Credit</span>
@endif
@if($model->type == EuroWalletTransaction::TYPE_DEBIT)
    <span class="badge light badge-danger">Debit</span>
@endif
