@props(['type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'w-full bg-primary text-white font-semibold py-3 px-4 rounded-xl hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-all duration-200 shadow-lg hover:shadow-xl']) }}>
    {{ $slot }}
</button>
