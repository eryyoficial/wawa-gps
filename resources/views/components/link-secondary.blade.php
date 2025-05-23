<a {{ $attributes->merge([ 'class' => 'inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
