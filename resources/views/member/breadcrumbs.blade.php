<div class="page-titles">
    <h4>
        @if(isset($crumbTitle))
            @if (is_callable($crumbTitle))
                {!! $crumbTitle() !!}
            @else
                {{ $crumbTitle }}
            @endif
        @else
            @foreach($crumbs as $link => $crumb)
                {{ $crumb }}
            @endforeach
        @endif
    </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('member.dashboard.index') }}">Home</a>
        </li>
        @foreach($crumbs as $link => $crumb)
            <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}">
                @if (is_int($link))
                    @if (is_callable($crumb))
                        {!! $crumb() !!}
                    @else
                        {{ $crumb }}
                    @endif
                @else
                    <a href="{{ $link }}">
                        @if (is_callable($crumb))
                            {!! $crumb() !!}
                        @else
                            {{ $crumb }}
                        @endif
                    </a>
                @endif
            </li>
        @endforeach
    </ol>
</div>
