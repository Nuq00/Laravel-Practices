<div class="grid grid-cols-2 gap-2">
    @if ($allOption)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value=""
                @checked(!request($name)) />
            <span class="ml-2">All</span>
        </label>
    @endif
    
    @foreach ($optionsWithLabel as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $label }}"
                {{-- @checked($label === request($name)) /> --}} @checked($label === ($value ?? request($name))) />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach

    @error($name)
        <div class="w-full col-span-2 mt-1 text-xs text-red-500">
            {{ $message }}
        </div>
    @enderror

</div>
{{-- <div class="grid grid-cols-2 gap-2">
    <label for="{{ $name }}" class="mb-1 flex items-center">
        <input type="radio" name="{{ $name }}" id="{{ $name }}" value=""
            @checked(!request($name)) />
        <span class="ml-2">All</span>
    </label>
    @foreach ($optionsWithLabel as $label => $option)
        <label for="{{ $name }}" class="mb-1 flex items-center">
            <input type="radio" name="{{ $name }}" id="{{ $name }}" value="{{ $label }}"
                @checked($label === request($name)) />
            <span class="ml-2">{{ $label }}</span>
        </label>
    @endforeach
</div> --}}
