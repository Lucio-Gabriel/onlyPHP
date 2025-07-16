@props([
    'id',
    'name',
    'type' => 'text',
    'value' => '',
    'placeholder' => '',
    'icon' => null
])

<div class="relative">
    @if ($icon)
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            {{ $icon }}
        </div>
    @endif
    <input type="{{ $type }}"
           id="{{ $id }}"
           name="{{ $name }}"
           value="{{ old($name, $value) }}"
           placeholder="{{ $placeholder }}"
           {{ $attributes->merge(['class' => 'block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent transition-all duration-200 bg-gray-50 focus:bg-white']) }}
    />
</div>
