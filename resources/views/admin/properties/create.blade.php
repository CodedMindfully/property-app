<x-layouts.admin title="Create Properties">
    
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
                                    value=""
                                    id="title"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
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
                                    value=""
                                    id="price"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
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
                                    value=""
                                    id="location"
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                            text-alderton-dark placeholder:text-gray-400
                                            focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold 
                                            outline-none transition-all">
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
                                <option value="any">Select Property Status</option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                    
                                @endforeach
                            </select>
                            
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
                                name="property_type" 
                                id="property_type"
                                class="appearance-none w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light 
                                    text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold 
                                    focus:border-alderton-gold outline-none transition-all cursor-pointer"
                            >
                                {{-- <option value="" disabled selected>Select Type</option>
                                <option value="detached">Detached</option>
                                <option value="semi-detached">Semi-Detached</option>
                                <option value="terraced">Terraced</option>
                                <option value="flat">Flat</option>
                                <option value="bungalow">Bungalow</option>
                                <option value="duplex">Duplex</option>
                                <option value="penthouse">Penthouse</option> --}}
                                <option value="">Select Property Type</option>
                                @foreach ($propertyTypes as $type )
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            
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
                            ></textarea>
                            <p class="mt-2 text-xs text-gray-500">Provide as much detail as possible to help buyers.</p>
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
                                <input type="number" name="bedrooms" placeholder="0" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold outline-none transition-all">
                            </div>

                            {{-- Bathrooms --}}
                            <div class="flex flex-col gap-1.5">
                                <span class="text-[10px] uppercase tracking-wider font-bold text-gray-400 ml-1">Baths</span>
                                <input type="number" name="bathrooms" placeholder="0" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold outline-none transition-all">
                            </div>

                            {{-- Floor Size --}}
                            <div class="flex flex-col gap-1.5">
                                <span class="text-[10px] uppercase tracking-wider font-bold text-gray-400 ml-1">Sq Ft</span>
                                <input type="number" name="floor_size" placeholder="Area" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark focus:bg-white focus:ring-2 focus:ring-alderton-gold focus:border-alderton-gold outline-none transition-all">
                            </div>

                        </div>
                    </div>
                    {{-- Joint Venture Checkbox --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <div class="md:col-start-2 md:col-span-3 flex items-center gap-3">
                            <input type="checkbox" name="is_joint_venture" id="is_jv" 
                                class="w-5 h-5 rounded border-gray-300 text-alderton-gold focus:ring-alderton-gold transition-all cursor-pointer">
                            <label for="is_jv" class="text-sm font-semibold text-alderton-dark cursor-pointer">
                                Is this a Joint Venture?
                            </label>
                        </div>
                    </div>

                    {{--  Completion Date --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-center">
                        <label for="completion_date" class="text-sm font-semibold text-alderton-dark md:col-span-1">
                            Completion Date
                        </label>
                        <div class="md:col-span-3">
                            <input type="date" name="completion_date" id="completion_date"
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light text-alderton-dark focus:ring-2 focus:ring-alderton-gold outline-none transition-all">
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
                            </div>

                            {{-- Images Multiple --}}
                            <div class="flex flex-col gap-2">
                                <span class="text-[10px] uppercase font-bold text-gray-400">Property Images</span>
                                <input type="file" name="images[]" multiple accept="image/*" class="block w-full text-sm text-gray-500 
                                            file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm 
                                            file:font-semibold file:bg-alderton-gold file:text-white hover:file:bg-alderton-dark 
                                            transition-all cursor-pointer">
                            </div>
                        </div>
                    </div>
                    {{-- Dynamic Features Section --}}
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-start">
                        <label class="text-sm font-semibold text-alderton-dark md:col-span-1 pt-3">Key Features</label>
                        
                        <div class="md:col-span-3 space-y-3">
                            <div class="flex gap-2">
                                <input type="text" name="features[]" placeholder="e.g. Underfloor heating" 
                                    class="flex-1 px-4 py-3 rounded-xl border border-gray-300 bg-alderton-light focus:ring-2 
                                            focus:ring-alderton-gold outline-none">
                                <button type="button" class="px-4 py-3 rounded-xl bg-alderton-gold text-white hover:bg-alderton-dark 
                                                transition-colors">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" 
                                                stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                </button>
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

{{-- 
Title input
Price input
Location input
Status dropdown (available, sold, reserved, off-plan)
Property type dropdown (from $propertyTypes)
Description textarea
Bedrooms input
Bathrooms input
Floor size input
Is joint venture checkbox
Completion date input
Brochure PDF upload
Images upload (multiple)
Features (dynamic inputs with plus button)
Submit button --}}