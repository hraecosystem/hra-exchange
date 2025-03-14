@php use App\Models\Admin; @endphp
@if($model->isClose())
    <a href="{{route('member.support.ticket',$model)}}" class="btn btn-dark btn-xs"><i class="bx bx-show me-1"></i>
        View
    </a>
@else
    <a href="{{route('member.support.ticket',$model)}}" class="btn btn-primary btn-xs"><i class="bx bx-edit me-1"></i>
        Reply</a>
    <div class="badge bg-danger rounded-pill ms-auto">
        {{ $model->message()->where('messageable_type',Admin::class)->where('is_read',0)->count() }}
    </div>
@endif
