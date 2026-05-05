<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <h1>Single Property Page</h1>
        <div style="border:1px solid #ccc; padding:15px; margin-bottom: 25px;">
            <h2>{{ $property->title }}</h2>
            <p><strong>Price: </strong>{{ $property->formatted_price }}</p>
            <p><strong>Location: </strong>{{ $property->location }}</p>
            <p><strong>Status: </strong>{{ $property->status }}</p>
        </div>
</body>
</html>


<div class="min-h-screen bg-alderton-light px-5 py-12 flex justify-center font-serif">
    <div class="w-full max-w-5xl">
        
        <!-- Navigation / Top Bar -->
        <div class="flex items-center justify-between mb-8">
            <a href="#" class="text-alderton-dark hover:text-alderton-gold transition-colors flex items-center gap-2 text-sm font-semibold uppercase tracking-widest">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                Back to Portfolio
            </a>
            <div class="flex gap-3">
                <a href="#" class="px-5 py-2 border border-alderton-dark text-alderton-dark rounded-xl hover:bg-alderton-dark hover:text-white transition-all text-sm font-semibold">
                    Edit Property
                </a>
            </div>
        </div>

        <!-- Main Property Card -->
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
            
            <!-- Hero Image Placeholder Section -->
            <div class="relative h-96 bg-gray-200">
                <div class="absolute inset-0 flex items-center justify-center text-gray-400">
                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <!-- Status Badge -->
                <div class="absolute top-6 left-6">
                    <span class="bg-alderton-gold text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-widest shadow-lg">
                        Under Offer
                    </span>
                </div>
            </div>

            <!-- Property Content -->
            <div class="p-10">
                <div class="flex flex-col md:flex-row justify-between items-start gap-6 border-b border-gray-100 pb-10">
                    <div>
                        <h1 class="text-4xl font-bold text-alderton-dark mb-2">The Mayfair Penthouse</h1>
                        <p class="text-xl text-gray-500 flex items-center gap-2">
                            <svg class="w-5 h-5 text-alderton-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            Belgravia, London
                        </p>
                    </div>
                    <div class="text-right">
                        <p class="text-sm uppercase tracking-widest text-gray-400 font-bold mb-1">Asking Price</p>
                        <p class="text-4xl font-bold text-alderton-gold">£4,250,000</p>
                    </div>
                </div>

                <!-- Features Grid -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 py-10">
                    <div class="text-center md:text-left">
                        <span class="block text-xs uppercase tracking-widest text-gray-400 font-bold mb-2">Bedrooms</span>
                        <span class="text-2xl font-semibold text-alderton-dark">5 Rooms</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-xs uppercase tracking-widest text-gray-400 font-bold mb-2">Bathrooms</span>
                        <span class="text-2xl font-semibold text-alderton-dark">3.5 Baths</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-xs uppercase tracking-widest text-gray-400 font-bold mb-2">Square Footage</span>
                        <span class="text-2xl font-semibold text-alderton-dark">2,850 sqft</span>
                    </div>
                    <div class="text-center md:text-left">
                        <span class="block text-xs uppercase tracking-widest text-gray-400 font-bold mb-2">Property Type</span>
                        <span class="text-2xl font-semibold text-alderton-dark">Apartment</span>
                    </div>
                </div>

                <!-- Description Section -->
                <div class="bg-alderton-light/50 rounded-2xl p-8">
                    <h3 class="text-lg font-bold text-alderton-dark mb-4 uppercase tracking-widest">About this property</h3>
                    <div class="text-gray-700 leading-relaxed space-y-4">
                        <p>
                            A masterfully designed residence that combines period features with contemporary luxury. 
                            Situated in the heart of the Alderton estate area, this property boasts floor-to-ceiling 
                            windows, a private terrace, and bespoke finishes throughout.
                        </p>
                        <p>
                            The open-plan living area provides the perfect space for entertaining, while the master 
                            suite offers a sanctuary of calm with a spa-like ensuite and walk-in dressing room.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="mt-8 flex justify-center border-t border-gray-200 pt-8">
            <button class="text-red-500 hover:text-red-700 text-sm font-bold uppercase tracking-widest transition-colors">
                Archive Property
            </button>
        </div>
    </div>
</div>