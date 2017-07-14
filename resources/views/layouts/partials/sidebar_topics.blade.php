<ul class="list">
    @foreach ($sidebarTopics as $index => $sidebarTopic)
        @if(isset($sidebarTopic))
        <li>
            <a href="{{ $sidebarTopic->link() }}" title="{{ $sidebarTopic->title }}">

                @if (isset($numbered))
                    {{ $index }}.
                @endif

                 {{ $sidebarTopic->title }}
            </a>
        </li>
        @endif
    @endforeach
</ul>
