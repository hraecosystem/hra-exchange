<p class="mb-0">
@if(strlen($model->title) < 40)
        {{ $model->title }}
    @else
        {{ substr($model->title, 0, 40). "...." }}
    @endif
</p>
