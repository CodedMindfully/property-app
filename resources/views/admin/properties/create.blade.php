<x-layouts.admin title="Create Properties">
    <x-slot:pageTitle>Create Property</x-slot:pageTitle>
    <div class="flex items-center justify-between mb-8 px-12 pt-5">
            <a href="{{ route('admin.properties.index') }}" class="text-alderton-dark hover:text-alderton-gold transition-colors
                                    flex items-center gap-2 text-sm font-semibold uppercase tracking-widest">
                                    {{-- back arrow Icon --}}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Portfolio
            </a>
    </div>
    <div class="min-h-screen bg-gray-50 px-5 py-12 flex justify-center font-serif">
        <div class="w-full max-w-4xl">
            {{-- shadow-lg gives the form depth, while border-gray-100 keeps the edges crisp --}}
            <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data" 
                    class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                    @csrf
                {{-- Form header --}}
                <div class="bg-white border-b border-gray-1oo px-8 py-6">
                    <h2 class="text-xl font-bold text-gray-800">
                        Property Details
                    </h2>
                    <p class="text-sm text-gray-500">Enter the form below to store a new property.</p>
                </div>
                {{-- Form body --}}
                <div class="p-8 space-y-6">
                    {{-- Property title --}}
                    {{-- Use items-center on the grid so that the label stays perfectly centered with the inout box on desktop --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="title" class="text-sm font-semibold text-alderton-dark md:col-span-1">Property Title</label>
                        <div class="md:col-span-3">
                            <input type="text" 
                                    name="title" 
                                    placeholder="Property Title" 
                                    value="{{ old('title') }}"
                                    id="title"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
                            @error('title')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Property Price --}}
                    {{-- Use items-center on the grid so that the label stays perfectly centered with the inout box on desktop --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="price" class="text-sm font-semibold text-alderton-dark md:col-span-1">Property Price</label>
                        <div class="md:col-span-3">
                            <input type="text" 
                                    name="price" 
                                    placeholder="Property price" 
                                    value="{{ old('price') }}"
                                    id="price"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
                            @error('price')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Property location --}}
                    {{-- Use items-center on the grid so that the label stays perfectly centered with the inout box on desktop --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="location" class="text-sm font-semibold text-alderton-dark md:col-span-1">Property Location</label>
                        <div class="md:col-span-3">
                            <input type="text" 
                                    name="location" 
                                    placeholder="Property location" 
                                    value="{{ old('location') }}"
                                    id="location"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
                            @error('location')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Property Status --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        {{-- label --}}
                        <label for="status" class="text-sm font-semibold text-alderton-dark md:col-span-1">
                            Property Status
                        </label>
                        <div class="md:col-span-3 relative">
                            <select
                                name="status"
                                id="status"
                                {{-- Appearance none removes the default clunky arrow --}}
                                class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light
                                        text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold
                                        focus:border-alderton-gold outline-none transition-all cursor-pointer">
                                <option value="">Select Property Status</option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}" {{ old('status') == $value ? 'selected' : '' }}>{{ $label }}</option>
                                    
                                @endforeach
                            </select>
                            @error('status')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            
                            {{-- Custom Chevron Icon --}}
                            <div class="pointer-event-none absolute inset-y-0 right-0 flex items-center px-4 text-alderton-dark">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9l-7 7-7-7"></path>
                                </svg>

                            </div>

                        </div>
                    </div>
                    {{-- Property type --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        {{-- Label for property type --}}
                        <label for="property_type" class="text-sm font-semibold text-alderton-dark md:col-span-1">
                            Property Type
                        </label>
                        
                        <div class="md:col-span-3 relative">
                            <select 
                                name="property_type_id" 
                                id="property_type"
                                class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                    text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold 
                                    focus:border-alderton-gold outline-none transition-all cursor-pointer"
                            >
                                <option value="">Select Property Type</option>
                                @foreach ($propertyTypes as $type )
                                    <option value="{{ $type->id }}" {{ old('property_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            @error('property_type')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            
                            {{-- Custom Chevron Icon --}}
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-alderton-dark opacity-60">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    {{-- Property Description --}}
                    {{-- Use items-start to place label at the top of the description box --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
                        <!-- Label (Aligned to the top) -->
                        <label for="description" class="text-sm font-semibold text-alderton-dark md:col-span-1 pt-3">
                            Property Description
                        </label>
                        
                        <div class="md:col-span-3">
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="5"
                                placeholder="Describe the property features, local amenities, and key selling points..."
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                    text-alderton-dark placeholder:text-gray-400
                                    focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                    outline-none transition-all resize-none"
                            >{{ old('description') }}</textarea>
                            <p class="mt-2 text-xs text-gray-500">Provide as much detail as possible to help buyers.</p>
                            @error('description')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    {{-- Bedrooms, bathroms and floor size. I am combining them into a 3 col grid to save vertical space --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
                        {{-- Label for property stats --}}
                        <label class="text-sm font-semibold text-alderton-dark md:col-span-1 pt-3">
                            Property Stats
                        </label>
                        
                        {{-- Sub-grid for the 3 numeric fields --}}
                        <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-3 gap-4">
                            
                            {{-- Bedrooms --}}
                            <div class="flex flex-col gap-1.5">
                                <span class="text-[10px] uppercase tracking-wider font-bold text-gray-400 ml-1">Beds</span>
                                <input type="number" name="bedrooms" placeholder="0" value="{{ old('bedrooms') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark 
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold outline-none 
                                            transition-all">
                                @error('bedrooms')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Bathrooms --}}
                            <div class="flex flex-col gap-1.5">
                                <span class="text-[10px] uppercase tracking-wider font-bold text-gray-400 ml-1">Baths</span>
                                <input type="number" name="bathrooms" placeholder="0" value="{{ old('bathrooms') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark 
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold outline-none 
                                            transition-all">
                                @error('bathrooms')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Floor Size --}}
                            <div class="flex flex-col gap-1.5">
                                <span class="text-[10px] uppercase tracking-wider font-bold text-gray-400 ml-1">Sq Ft</span>
                                <input type="number" name="floor_size" placeholder="Area" value="{{ old('floor_size') }}"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark 
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
                                @error('floor_size')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                    </div>
                    {{-- Joint Venture Checkbox --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <div class="md:col-start-2 md:col-span-3 flex items-center gap-3">
                            <input type="checkbox" name="is_joint_venture" id="is_jv" {{ old('is_joint_venture') ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-gray-300 text-alderton-gold focus:ring-alderton-gold transition-all 
                                            cursor-pointer">
                            <label for="is_jv" class="text-sm font-semibold text-alderton-dark cursor-pointer">
                                Is this a Joint Venture?
                            </label>
                        </div>
                        @error('is_joint_venture')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{--  Completion Date --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="completion_date" class="text-sm font-semibold text-alderton-dark md:col-span-1">
                            Completion Date
                        </label>
                        <div class="md:col-span-3">
                            <input type="date" name="completion_date" id="completion_date" value="{{ old('completion_date') }}"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark focus:ring-2 focus:ring-alderton-gold outline-none transition-all">
                            @error('completion_date')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Brochure and Images Upload --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-start">
                        <label class="text-sm font-semibold text-alderton-dark md:col-span-1 pt-3">Media Assets</label>
                        
                        <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            {{-- Brochure PDF --}}
                            <div class="flex flex-col gap-2">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Brochure (PDF)</span>
                                <input type="file" name="brochure" accept=".pdf" class="block w-full text-sm text-gray-500 file:mr-4 
                                            file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold 
                                            file:bg-alderton-gold file:text-white hover:file:bg-alderton-dark transition-all cursor-pointer">
                                @error('brochure')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Images Multiple --}}
                            <div class="flex flex-col gap-2">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Property Images</span>
                                <input type="file" name="images[]" multiple accept="image/*" class="block w-full text-sm text-gray-500 
                                            file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm 
                                            file:font-semibold file:bg-alderton-gold file:text-white hover:file:bg-alderton-dark 
                                            transition-all cursor-pointer">
                                @error('images')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    {{-- Dynamic Features Section --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
                        <label class="text-sm font-semibold text-alderton-dark md:col-span-1 pt-3">Key Features</label>
                        
                        <div class="md:col-span-3 space-y-3" id="features-container">
                            <div class="flex gap-2">
                                {{-- Features is an array, to keep the values when validation fails I need to specify the index 
                                (e.g. index 0 for the first input). Use dot notiation for the index  --}}
                                <input type="text" name="features[]" placeholder="e.g. Underfloor heating" value="{{ old('features.0') }}"
                                       class="flex-1 px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light focus:ring-2 
                                            focus:ring-alderton-gold outline-none">
                                <button type="button" id="add-feature-btn" class="px-4 py-3 rounded-xl bg-alderton-gold text-white hover:bg-alderton-dark 
                                                transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" 
                                                stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </button>
                                @error('features')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- This is where new input fields would be appended via JS --}}
                        </div>
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-12 flex justify-end">
                        <button type="submit" class="w-full md:w-auto px-12 py-4 bg-alderton-dark text-white font-bold rounded-xl 
                                        shadow-lg hover:shadow-alderton-gold/20 hover:scale-[1.02] active:scale-[0.98] transition-all">
                            Create Property Listing
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</x-layouts.admin>