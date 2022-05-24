@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'block max-w-lg w-full shadow-sm focus:ring-[#173a68] sm:text-sm border-gray-300 rounded-md']) !!}>
{{ $slot }}
</textarea>
