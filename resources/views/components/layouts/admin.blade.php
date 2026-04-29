@props(['title' => 'Admin - Alderton Developments'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
        <aside class="w-64 bg-alderton-dark text-white flex flex-col">
            {{-- Logo --}}
            <div class="px-6 py-8 border-b border-gray-700">
                <h1 class="font-serif text-xl text-alderton-gold tracking-widest">
                    ALDERTON
                </h1>
                <P class="text-xs text-gray-400 mt-1">Admin Panel</P>
            </div>
            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-1">
                <a href="{{ route('admin.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg
                            hover:bg-white/10 transition-colors text-sm
                            {{ request()->routeIs('admin.dashboard')
                            ? 'bg-white/10 text-alderton-gold'
                            : 'text-gray-300' }}">
                      📊   Dashboard   
                </a>
                <a href="{{ route('admin.properties.index') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-lg
                            hover:bg-white/10 transition-colors text-sm
                            {{-- * is a wildcard matching any properties route --}}
                            {{ request()->routeIs('admin.properties.*')
                            ? 'bg-white/10 text-alderton-gold'
                            : 'text-gray-300' }}">
                    🏠 Properties   
                </a>

                {{-- Supper Admin only --}}
                @if (Auth::guard('admin')->user()->isSuperAdmin())
                    <a href="#"
                        class="flex items-center gap-3 px-4 py-3 rounded-lg
                                hover:bg-white/10 transition-colors text-sm
                                text-gray-300">
                       👥 Manage Admins
                    </a>
                @endif
            </nav>
            {{-- Logout --}}
            <div class="px-4 py-6 border-t border-gray-700">
                <p class="text-xs text-gray-400 mb-3 px-4">
                    {{ Auth::guard('admin')->user()->name }}
                </p>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left flex items-center gap-3
                                    px-4 py-3 rounded-lg text-sm text-gray-300
                                    hover:bg-white/10 transition-colors">
                       🚪 Logout
                    </button>
                </form>
            </div>
        </aside>
        {{-- Main content --}}
        <div class="flex-1 flex flex-col">
            {{-- Top bar --}}
            <header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">
                <h2 class="text-lg font-semibold text-gray-700">
                    {{-- Dynamically set each page header title. Dashboard is default --}}
                    @yield('page-title', 'Dashboard')
                </h2>
                <span class="text-sm text-gray-400">
                    {{ date('l, d F Y') }}
                </span>
            </header>
            {{-- Display flash message --}}
            <div class="px-8 pt-4">
                @if (session('success'))
                    <div class="bg-gree-50 border border-green-200 text-green-700
                                px-4 py-3 rounded-lg mb-4">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-50 border border-red-200 text-red-700
                                px-4 py-3 rounded-lg mb-4">
                        {{ session('error') }}
                    </div> 
                @endif

            </div>
            {{-- Page content --}}
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>