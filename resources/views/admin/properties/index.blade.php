<x-layouts.admin title="Admin Properties - Alderton">
    <x-slot:pageTitle>Properties</x-slot:pageTitle>
    {{-- Display success message if property upload was successful on create property page --}}
    {{-- @if (session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-4">
                <p>{{ session('success') }}</p>
        </div>
    @endif --}}

    <div class="min-h-screen bg-gray-50 px-5 py-12 flex justify-center font-serif">
        <div class="w-full max-w-6xl">
            {{-- header section --}}
            <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-alderton-dark">Property Portfolio</h1>
                    <p class="text-sm text-gray-500 text-alderton-dark">Manager and oversee all listed properties.</p>
                </div>
                {{-- Add property btn --}}
                <a href="{{ route('admin.properties.create') }}"
                    class="inline-flex items-center justify-center px-6 py-3 bg-alderton-dark text-white 
                            font-semibold round-xl hover:bg-alderton-gold transition-colors duration-300 
                            shadow-md group">
                    <span class="mr-2">+</span>Add New Property</a>
            </div>
        {{-- Table holding properties --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-alderton-light border-b border-gray-100">
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-alderton-dark">Title</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-alderton-dark">Price</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-alderton-dark">Location</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-alderton-dark">Status</th>
                                <th class="px-6 py-4 text-xs font-bold uppercase tracking-wider text-alderton-dark">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            {{-- Loop through the properties and display them --}}
                            @foreach ($properties as $property)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-5">
                                    <span class="font-semibold text-alderton-dark block">{{ $property->title }}</span>
                                </td>
                                <td class="px-6 py-5 font-medium text-alderton-dark">{{ $property->formatted_price }}</td>
                                <td class="px-6 py-5 text-gray-600">{{ $property->location }}</td>
                                <td class="px-6 py-5">
                                    <span class="px-3 py-1 rounded-full text-xs font-medium bg-alderton-light
                                                text-alderton-gold border border-alderton-gold/20">{{ ucfirst($property->status) }}</span>
                                </td>
                                <td class="px-6 py-5 text-right space-x-2">
                                    {{-- View prop btn --}}
                                    <a href="{{ route('admin.properties.show', $property->id) }}"
                                        class="inline-block text-gray-400 hover:text-alderton-dark transition-colors" title="View">
                                        {{-- Eye icon --}}
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    {{-- Edit --}}
                                    <a href="{{ route('admin.properties.edit', $property->id) }}"
                                        class="inline-block text-gray-400 hover:text-alderton-gold transition-colors" title="Edit">
                                        {{-- Edit icon --}}
                                        <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    {{-- Delete --}}
                                    <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors" title="Delete">
                                            {{-- Delete icon --}}
                                            <svg class="w-5 h-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
             {{-- Pagination links. Display 15 properties on each page --}}
            <div class="px-6 py-4 border-t border-gray-100">
                {{ $properties->links() }}
                <p>Hello World</p>
            </div>
        </div>
       
    </div>
    
</x-layouts.admin>