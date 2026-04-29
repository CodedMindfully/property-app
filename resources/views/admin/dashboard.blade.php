<x-layouts.admin title="Dashboard - Alderton">
    {{-- @section acts as a place holder for my <header><h2></h2></header> in admin.blade--}}
    @section('page-title', 'Dashboard')
    <p class="px-3 py-3 font-serif">Welcome, {{ Auth::guard('admin')->user()->name }}</p>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        {{-- Stats card --}}
        <div class="bg-white rounded-xl shadow-sm p-6">
            <p class="text-sm text-gray-500 uppercase tracking-widest mb-2">
                Total Properties
            </p>
            @if ($propertiesCount == 0)
                <p>No properties found.</p>
            @else
                <p>{{ $propertiesCount }}</p>
             @endif
        </div>
    </div>

</x-layouts.admin>

