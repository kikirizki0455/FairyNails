@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#FF8FA4] text-start text-base font-medium text-[#292352] bg-[#FF8FA4]/20 focus:outline-none focus:text-[#292352] focus:bg-[#FF8FA4]/30 focus:border-[#FF8FA4] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-[#292352] hover:bg-[#FF8FA4]/20 hover:border-[#FF8FA4] focus:outline-none focus:text-[#292352] focus:bg-[#FF8FA4]/30 focus:border-[#FF8FA4] transition duration-150 ease-in-out';

@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
