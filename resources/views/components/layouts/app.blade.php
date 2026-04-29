@props (['title' => 'Alderton Developments'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Alderton Developments' }}</title>
    {{-- Tailwin CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- Custom Tailwin config for brand colours --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'alderton': {
                            'gold': '#C9A84C',
                            'dark': '#1a1a2e',
                            'light': '#f8f6f0',
                        }
                    },
                    fontFamily: {
                        'serif': ['Georgia', 'serif'],
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-alderton-light text-gray-800 font-sans">
    {{-- Navigation --}}
    <nav class="bg-alderton-dark text-white shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            {{-- Logo --}}
            <a href="/" class="font-serif text-2xl tracking-widest text-alderton-gold">ALDERTON
                <span class="block text-xs text-gray-400 tracking-widest uppercase">Developments</span>
             </a>
            {{-- My nav links --}}
            <ul class="hidden md:flex space-x-8 text-sm tracking-wide uppercase">
                <li>
                    <a href="/" class="hover:text-alderton-gold transition-colors duration-200">Home</a>
                </li>
                <li>
                    <a href="/properties" class="hover:text-alderton-gold transition-colors duration-200">Properties</a>
                </li>
                <li>
                    <a href="/joint-venture" class="hover:text-alderton-gold transition-colors duration-200">Joint Venture</a>
                </li>
                <li>
                    <a href="/about" class="hover:text-alderton-gold transition-colors duration-200">About</a>
                </li>
                <li>
                    <a href="/testimonials" class="hover:text-alderton-gold transition-colors duration-200">Testimonials</a>
                </li>
                <li>
                    <a href="/contact" class="hover:text-alderton-gold transition-colors duration-200">Contact</a>
                </li>
            </ul>
        </div>
    </nav>

    {{-- My main page content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-alderton-dark text-gray-400 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Brand stuffs --}}
            <div>
                <h3 class="font-serif text-xl text-alderton-gold tracking-widest mb-4">
                    ALDERTON
                </h3>
                <p class="text-sm leading-relaxed">
                    Building premium homes across the UK
                    Quality craftmanship, exceptional living.
                </p>
            </div>
            {{-- Some quick links --}}
            <div>
                <h4 class="text-white text-sm uppercase tracking-widest mb-4">
                    Quick Links
                </h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/properties" class="hover:text-alderton-gold transition-colors">Properties</a></li>
                    <li><a href="/about" class="hover:text-alderton-gold transition-colors">About Us</a></li>
                    <li><a href="/joint-venture" class="hover:text-alderton-gold transition-colors">Joint Venture</a></li>
                    <li><a href="/contact" class="hover:text-alderton-gold transition-colors">Contact</a></li>
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="text-white text-sm uppercase tracking-widest mb-4">
                    Contact Us
                </h4>
                <ul class="space-y-2 text-sm">
                    <li>📍 London, United Kingdom</li>
                    <li>📞 +44 20 1234 5678</li>
                    <li>✉️ info@aldertondev.co.uk</li>
                </ul>
            </div>
        </div>
        {{-- Bottom bar --}}
        <div class="border-t border-gray-700 px-6 py-4 text-center">
            © {{ date('Y') }} Alderton Developments. All rights reserved.
        </div>

    </footer>
</body>
</html>