<p class="mb-0">
    @if(strlen($model->answer) < 60)
        {{ $model->answer }}
    @else
        {{ substr($model->answer, 0, 60). "...." }}
    @endif
</p>
