<p class="mb-0">
    @if(strlen($model->question) < 60)
        {{ $model->question }}
    @else
        {{ substr($model->question, 0, 60). "...." }}
    @endif
</p>
