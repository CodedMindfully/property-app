<x-layouts.app title="Alderton Developments - Premium UK Properties">

    {{-- Hero --}}
    <section class="relative bg-alderton-dark text-white py-40 px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <p class="text-alderton-gold uppercase tracking-widest text-sm mb-4">
                Premium Property Developer
            </p>
            <h1 class="font-serif text-5xl md:text-7xl leading-tight mb-6">
                Building Homes <br> Worth Living In
            </h1>
            <p class="text-gray-300 text-lg mb-10 max-w-2xl mx-auto">
                From luxury apartments to elegant townhouses — 
                Alderton Developments crafts exceptional homes 
                across the United Kingdom.

            </p>
            <div class="flex justify-center gap-4">
                <a href="/properties" class="bg-alderton-gold text-alderton-dark px-8 py-3
                                            uppercase tracking-widest text-sm font-bold
                                            hover:bg-yellow-500 transition-colors">
                    View Properties
                </a>
                <a href="/contact" class="border border-white text-white px-8 py-3 uppercase
                                            tracking-widest text-sm hover:bg-white
                                            hover:text-alderton-dark transition-colors">
                    Get In Touch
                </a>
            </div>
        </div>
    </section>

    {{-- Featured Property --}}
    <section class="max-w-7xl mx-auto px-6 py-20">
        <div class="text-center mb-12">
            <p class="text-alderton-gold uppercase tracking-widest text-sm mb-12">
                Our Portfolio
            </p>
            <h2 class="font-serif text-4xl text-alderton-dark">
                Featured Properties
            </h2>
        </div>
        {{-- check if featured property is empty --}}
        @if ($featuredProperties->isEmpty())
            <p class="text-center text-gray-500">No Propertes available</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- If not loop through and display three properties --}}
                @foreach ($featuredProperties as $property)
                    <a href="/properties/{{ $property->id }}" 
                        class="group bg-white shadow-md hover:shadow-xl transition-shadow 
                                duration-300">
                        {{-- Property image --}}
                        <div class="overflow-hidden h-56 bg-gray-200">
                            @if ($property->image)
                                <img src="/storage/{{ $property->image }}" alt="{{ $property->title }}"
                                class="w-full h-full object-cover group-hover:scale-105
                                        transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    No Image
                                </div>
                            @endif
                        </div>
                        {{-- Property Details --}}
                        <div class="p-6">
                            <p class="text-alderton-gold text-xs uppercase tracking-widest mb-1">
                                {{ $property->status }}
                            </p>
                            <h3 class="font-serif text-xl text-alderton-dark mb-2">
                                {{ $property->title }}
                            </h3>
                            <p class="text-gray-500 text-sm mb-4">
                               📍 {{ $property->location }}
                            </p>
                            <p class="text-2xl font-bold text-alderton-dark">
                                {{ $property->formatted_price }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="/properties"
                class="border border-alderton-dark text-alderton-dark px-8 py-3 uppercase tracking-widest
                        text-sm hover:bg-alderton-dark hover:text-white transition-colors">
                View All Properties</a>
            </div>
        @endif
    </section>
    
    {{-- Why choose us --}}
    <section class="bg-white py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12">
                <p class="text-alderton-gold uppercase tracking-widest text-sm mb-2">
                    Why Alderton
                </p>
                <h2 class="font-serif text-4xl text-alderton-dark">
                    The Alderton Difference
                </h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-8">
                    <div class="text-4xl mb-4">🏆</div>
                    <h3 class="font-serif text-xl mb-3">Award Winning Design</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Our properties are crafted by leading architects
                        with an eye for details and lasting quality.
                    </p>
                </div>
                <div class="p-8">
                    <div class="text-4xl mb-4">📍</div>
                    <h3 class="font-serif text-xl mb-3">Prime Location</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Every Alderton development is carefully positioned 
                        in sought after locations across the UK.
                    </p>
                </div>
                <div class="p-8">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="font-serif text-xl mb-3">Trusted Developer</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        With over 20 years of experience, we deliver
                        on our promises every single time.
                    </p>
                </div>
            </div>
        </div>
    </section>
    {{-- Joint venture Section --}}
    <section class="bg-alderton-dark">
    
        <!-- 2. The Container: This handles the 1280px width and centering -->
        <div class="max-w-7xl mx-auto py-20 px-6 md:py-24">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                
                <!-- Image div: Stays at top on mobile because it's first in the HTML -->
                <div class="rounded-2xl overflow-hidden shadow-xl">
                    <img src="https://images.unsplash.com/photo-1634250878836-0d4618ae41d3?q=80&w=1973&auto=format&fit=crop" 
                        alt="A skyscraper" 
                        class="w-full h-auto object-cover">
                </div>

                <div class="space-y-6">
                    <div class="space-y-2">
                        <p class="text-alderton-gold uppercase tracking-widest text-sm mb-2">
                            Partner with Alderton
                        </p>
                        <!-- Updated to text-white for readability -->
                        <h2 class="font-serif text-4xl text-white">
                            Joint Venture Partnership
                        </h2>
                        <!-- Updated to a lighter gray so it's readable on dark -->
                        <p class="text-gray-300 text-sm leading-relaxed">
                            Unlock the true value of your land. We partner with landowners to develop 
                            premium residences, sharing the final units to ensure maximum return on investment.
                        </p>
                    </div>

                    <!-- Updated Button: Switched to gold or white borders for visibility -->
                    <div class="pt-4">
                        <a href="/joint-venture" 
                        class="inline-block border border-alderton-gold text-alderton-gold px-8 py-3 uppercase tracking-widest text-sm hover:bg-alderton-gold hover:text-alderton-dark transition-colors">
                            Partner with us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Testimonial Section --}}
    <section class="bg-alderton-light py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-16">
            <p class="text-alderton-gold uppercase tracking-widest text-sm mb-2">
                Testimonials
            </p>
            <h2 class="font-serif text-4xl text-alderton-dark">
                Client Experiences
            </h2>
        </div>

        <!-- Testimonial Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Card 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="text-alderton-gold text-4xl mb-4 font-serif">“</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">
                        "The best investment decision I've made. The attention to detail is incredible, and the entire process was seamless."
                    </p>
                </div>
                <div>
                    <h3 class="font-serif text-lg text-alderton-dark">Sarah J.</h3>
                    <p class="text-alderton-gold text-xs uppercase tracking-widest">Homeowner</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="text-alderton-gold text-4xl mb-4 font-serif">“</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">
                        "A premium experience from start to finish. The location is perfect, and the property value has already increased significantly."
                    </p>
                </div>
                <div>
                    <h3 class="font-serif text-lg text-alderton-dark">Marcus T.</h3>
                    <p class="text-alderton-gold text-xs uppercase tracking-widest">Property Investor</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="text-alderton-gold text-4xl mb-4 font-serif">“</div>
                    <p class="text-gray-600 italic leading-relaxed mb-6">
                        "From the gold accents to the functional layout, everything feels intentional. Derton doesn't cut corners."
                    </p>
                </div>
                <div>
                    <h3 class="font-serif text-lg text-alderton-dark">Elena R.</h3>
                    <p class="text-alderton-gold text-xs uppercase tracking-widest">Penthouse Owner</p>
                </div>
            </div>

        </div>
    </div>
</section>
</x-layouts.app>