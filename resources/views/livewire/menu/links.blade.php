<div>
    <h5>{{ $menu->name }}</h5>
        <ul class="list-unstyled text-small">
            @foreach ($menu->links as $link)
            <li><a class="link-secondary" href="{{ $link->name }}" target="{{ $link->target}}">{{ $link->name }}</a></li>
        @endforeach
        </ul>


</div>
