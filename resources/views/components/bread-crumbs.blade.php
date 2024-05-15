<nav {{ $attributes }}>
    <ul class="flex text-slate-400 space-x-3 mb-4">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $label => $link)
            <li>
                >
            </li>
            <li>
                <a href="{{ $link }}">{{ $label }}</a>
            </li>
        @endforeach

    </ul>
</nav>
