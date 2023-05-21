@props(['value'])

<label {{ $attributes->merge(['class' => 'block mt-2 font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
    {{ $value ?? $slot }}
</label>
