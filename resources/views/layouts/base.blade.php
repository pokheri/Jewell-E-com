<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Gold Jewels - Header</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Montserrat:wght@300;400;500&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f9fafb;
        }

        .luxury-font {
            font-family: 'Playfair Display', serif;
        }

        .transition-smooth {
            transition: all 0.3s ease;
        }

        @keyframes slideInFromLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .slide-in-left {
            animation: slideInFromLeft 0.3s ease-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.2s ease-out;
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- HEADER -->
    <header class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="container mx-auto px-4 lg:px-6">
            <!-- Desktop Layout - Equal Spacing Between Logo, Navigation, and Actions -->
            <div class="hidden lg:flex items-center justify-between py-4">
                <!-- Logo Section - Left -->

                <div class="flex-[1_0_auto] flex justify-start">

                    <div class="flex items-center">
                        <div
                            class="w-10 h-10 rounded-full bg-gradient-to-r from-amber-400 to-yellow-500 flex items-center justify-center shadow-lg">
                            <i class="fas fa-gem text-white text-lg"></i>
                        </div>
                        <span class="ml-3 text-2xl luxury-font font-bold text-gray-800">Royal<span
                                class="text-amber-600">Gold</span></span>
                    </div>
                </div>

                <!-- Navigation Section - Center -->

                <div class="flex-[2_0_auto] flex justify-center">

                    <nav class="flex space-x-4 xl:space-x-8">
                        <x-ui.nav-link href="#">Home</x-ui.nav-link>
                        <x-ui.nav-link href="#">Rings</x-ui.nav-link>
                        <x-ui.nav-link href="#">Necklaces</x-ui.nav-link>
                        <x-ui.nav-link href="#">Earrings</x-ui.nav-link>
                        <x-ui.nav-link href="#">Bracelets</x-ui.nav-link>
                    </nav>
                </div>

                <!-- Actions Section - Right -->

                <div class="flex-[1_0_auto] flex justify-end">

                    <div class="flex items-center space-x-6">
                        <!-- Search with Suggestions -->
                        <div class="relative search-container">
                            <div
                                class="flex items-center bg-gray-100 rounded-full px-4 py-2 transition-smooth focus-within:bg-white focus-within:ring-2 focus-within:ring-amber-300">
                                <i class="fas fa-search text-gray-500"></i>
                                <input type="text" id="desktop-search-input" placeholder="Search jewelry..."
                                    class="ml-2 bg-transparent border-none focus:outline-none focus:ring-0 w-32 xl:w-48">
                            </div>

                            <!-- Search Suggestions Dropdown -->
                            <div id="desktop-search-suggestions"
                                class="absolute top-full right-0 mt-2 bg-white rounded-lg shadow-xl z-50 overflow-hidden min-w-72 hidden fade-in">
                                <div class="p-4 border-b">
                                    <p class="text-sm text-gray-600 mb-2">Popular Searches:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <a href="#"
                                            class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Gold
                                            Rings</a>
                                        <a href="#"
                                            class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Diamond
                                            Earrings</a>
                                        <a href="#"
                                            class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Wedding
                                            Necklaces</a>
                                    </div>
                                </div>
                                <div class="p-2 max-h-60 overflow-y-auto">
                                    <a href="#"
                                        class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                        <i class="fas fa-ring text-amber-600 mr-3"></i>
                                        <div>
                                            <p class="font-medium text-gray-800">Solitaire Diamond Ring</p>
                                            <p class="text-sm text-gray-600">₹24,999</p>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                        <i class="fas fa-gem text-amber-600 mr-3"></i>
                                        <div>
                                            <p class="font-medium text-gray-800">Gold Pendant Set</p>
                                            <p class="text-sm text-gray-600">₹18,499</p>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                        <i class="fas fa-star text-amber-600 mr-3"></i>
                                        <div>
                                            <p class="font-medium text-gray-800">Pearl Earrings</p>
                                            <p class="text-sm text-gray-600">₹12,999</p>
                                        </div>
                                    </a>
                                    <a href="#"
                                        class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                        <i class="fas fa-circle text-amber-600 mr-3"></i>
                                        <div>
                                            <p class="font-medium text-gray-800">Gold Bracelet</p>
                                            <p class="text-sm text-gray-600">₹15,499</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <a href="#" class="text-gray-700 hover:text-amber-600 transition-smooth">
                            <x-icon.heart />

                        </a>

                        <!-- Cart with badge -->
                        <a href="#" class="text-gray-700 hover:text-amber-600 relative transition-smooth">
                            <x-icon.bag />
                            <span
                                class="absolute -top-2 -right-2 bg-amber-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                        </a>

                        <!-- User Account -->
                        <a href="#" class="text-gray-700 hover:text-amber-600 transition-smooth">
                            <x-icon.user />
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="lg:hidden flex items-center justify-between py-4">
                <!-- Mobile Menu Button - LEFT SIDE -->
                <button id="mobile-menu-btn" class="text-gray-700 hover:text-amber-600 transition-smooth">

                    <x-icon.menu />
                </button>

                <!-- Logo - Center on mobile -->
                <div class="flex items-center">
                    <div
                        class="w-10 h-10 rounded-full bg-gradient-to-r from-amber-400 to-yellow-500 flex items-center justify-center shadow-lg">
                        <i class="fas fa-gem text-white text-lg"></i>
                    </div>
                    <span class="ml-3 text-2xl luxury-font font-bold text-gray-800">Royal<span
                            class="text-amber-600">Gold</span></span>
                </div>

                <!-- Right Actions -->
                <div class="flex items-center space-x-4">
                    <!-- Mobile Search Icon -->
                    <button id="mobile-search-btn" class="text-gray-700 hover:text-amber-600">
                        <x-icon.search />
                    </button>

                    <!-- Wishlist -->
                    <a href="#" class="text-gray-700 hover:text-amber-600 transition-smooth">
                        <x-icon.heart />
                    </a>

                    <!-- Cart with badge -->
                    <a href="#" class="text-gray-700 hover:text-amber-600 relative transition-smooth">
                        <x-icon.bag />
                        <span
                            class="absolute -top-2 -right-2 bg-amber-600 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                    </a>
                </div>
            </div>

            <!-- Mobile Search Bar (hidden by default) -->
            <div id="mobile-search-bar" class="lg:hidden hidden py-3 border-t border-gray-100">
                <div class="relative">
                    <div
                        class="flex items-center bg-gray-100 rounded-full px-4 py-3 transition-smooth focus-within:bg-white focus-within:ring-2 focus-within:ring-amber-300">
                        <i class="fas fa-search text-gray-500"></i>
                        <input type="text" id="mobile-search-input" placeholder="Search for rings, necklaces..."
                            class="ml-2 bg-transparent border-none focus:outline-none focus:ring-0 w-full">
                        <!-- Close (X) Button -->
                        <button id="mobile-search-close"
                            class="ml-2 text-gray-500 hover:text-gray-700 transition-smooth">
                            <i class="fas fa-times text-lg"></i>
                        </button>
                    </div>

                    <!-- Mobile Search Suggestions -->
                    <div id="mobile-search-suggestions"
                        class="absolute top-full left-0 right-0 mt-2 bg-white rounded-lg shadow-xl z-50 overflow-hidden hidden fade-in">
                        <div class="p-4 border-b">
                            <p class="text-sm text-gray-600 mb-2">Popular Searches:</p>
                            <div class="flex flex-wrap gap-2">
                                <a href="#"
                                    class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Gold
                                    Rings</a>
                                <a href="#"
                                    class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Diamond
                                    Earrings</a>
                                <a href="#"
                                    class="text-sm bg-gray-100 hover:bg-amber-50 text-gray-700 hover:text-amber-600 px-3 py-1 rounded-full transition-smooth">Wedding
                                    Necklaces</a>
                            </div>
                        </div>
                        <div class="p-2 max-h-60 overflow-y-auto">
                            <a href="#"
                                class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                <i class="fas fa-ring text-amber-600 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-800">Solitaire Diamond Ring</p>
                                    <p class="text-sm text-gray-600">₹24,999</p>
                                </div>
                            </a>
                            <a href="#"
                                class="flex items-center p-2 hover:bg-gray-50 rounded transition-smooth">
                                <i class="fas fa-gem text-amber-600 mr-3"></i>
                                <div>
                                    <p class="font-medium text-gray-800">Gold Pendant Set</p>
                                    <p class="text-sm text-gray-600">₹18,499</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu - Slides from LEFT -->
        <div id="mobile-menu" class="lg:hidden hidden fixed inset-0 z-50">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black bg-opacity-50" id="menu-overlay"></div>

            <!-- Menu Content -->
            <div class="absolute left-0 top-0 h-full w-64 bg-white shadow-xl slide-in-left">
                <!-- Menu Header -->
                <div class="flex items-center justify-between p-4 border-b">
                    <div class="flex items-center">
                        <div
                            class="w-8 h-8 rounded-full bg-gradient-to-r from-amber-400 to-yellow-500 flex items-center justify-center">
                            <i class="fas fa-gem text-white text-sm"></i>
                        </div>
                        <span class="ml-2 text-xl luxury-font font-bold">Menu</span>
                    </div>
                    <button id="close-menu-btn" class="text-gray-700 hover:text-amber-600">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <!-- Menu Items -->
                <div class="p-4 space-y-1">

                    <x-icon.menu.menuIcon href="#" type="home"> Home </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="ring"> Rings </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="gem"> Necklaces </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="star"> Earrings </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="circle"> Bracelets </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="user"> My Account </x-icon.menu.menuIcon>
                    <x-icon.menu.menuIcon href="#" type="heart"> Wishlist </x-icon.menu.menuIcon>

                    <a href="#"
                        class="flex items-center text-gray-700 hover:text-amber-600 py-3 px-4 rounded-lg hover:bg-gray-50 transition-smooth">
                        <x-icon.menu.bag-bg class="w-5 mr-3" />
                        <span class="font-medium">Cart (3)</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Page Content (for demonstration) -->
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-lg shadow text-center">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Header Only Demo</h2>
            <p class="text-gray-600">The header above has equal spacing between Logo, Navigation, and Actions on
                desktop.</p>
            <p class="text-gray-600 mt-2">Click on the search icon to open mobile search, then manually click the input
                to focus.</p>
            <p class="text-gray-600 mt-2">Use the X button in mobile search to close it.</p>
        </div>
    </div>

    <script>
        // Mobile Menu Toggle - Slides from LEFT
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const closeMenuBtn = document.getElementById('close-menu-btn');
        const menuOverlay = document.getElementById('menu-overlay');

        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        closeMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        });

        menuOverlay.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
            document.body.style.overflow = '';
        });

        // Mobile Search Functionality
        const mobileSearchBtn = document.getElementById('mobile-search-btn');
        const mobileSearchBar = document.getElementById('mobile-search-bar');
        const mobileSearchClose = document.getElementById('mobile-search-close');
        const mobileSearchInput = document.getElementById('mobile-search-input');
        const mobileSearchSuggestions = document.getElementById('mobile-search-suggestions');

        // Show mobile search when clicking search icon
        mobileSearchBtn.addEventListener('click', function() {
            mobileSearchBar.classList.remove('hidden');
            mobileSearchBar.classList.add('block');
            // DO NOT auto-focus - let user manually click the input
        });

        // Close mobile search when clicking X button
        mobileSearchClose.addEventListener('click', function() {
            mobileSearchBar.classList.add('hidden');
            mobileSearchBar.classList.remove('block');
            mobileSearchInput.value = '';
            hideMobileSearchSuggestions();
        });

        // Hide search suggestions when clicking X
        mobileSearchClose.addEventListener('mousedown', function(e) {
            e.preventDefault(); // Prevent focus loss issues
        });

        // Search Suggestions Functionality
        const desktopSearchInput = document.getElementById('desktop-search-input');
        const desktopSearchSuggestions = document.getElementById('desktop-search-suggestions');

        function showDesktopSearchSuggestions() {
            desktopSearchSuggestions.classList.remove('hidden');
        }

        function hideDesktopSearchSuggestions() {
            setTimeout(() => {
                desktopSearchSuggestions.classList.add('hidden');
            }, 200);
        }

        function showMobileSearchSuggestions() {
            mobileSearchSuggestions.classList.remove('hidden');
        }

        function hideMobileSearchSuggestions() {
            setTimeout(() => {
                mobileSearchSuggestions.classList.add('hidden');
            }, 200);
        }

        function hideAllSearchSuggestions() {
            desktopSearchSuggestions.classList.add('hidden');
            mobileSearchSuggestions.classList.add('hidden');
        }

        // Desktop search events
        if (desktopSearchInput) {
            desktopSearchInput.addEventListener('focus', showDesktopSearchSuggestions);
            desktopSearchInput.addEventListener('blur', hideDesktopSearchSuggestions);
            desktopSearchInput.addEventListener('input', function(e) {
                if (e.target.value.trim() !== '') {
                    showDesktopSearchSuggestions();
                } else {
                    hideDesktopSearchSuggestions();
                }
            });
        }

        // Mobile search events - ONLY when user manually clicks the input
        if (mobileSearchInput) {
            mobileSearchInput.addEventListener('focus', function() {
                showMobileSearchSuggestions();
            });

            mobileSearchInput.addEventListener('blur', hideMobileSearchSuggestions);

            mobileSearchInput.addEventListener('input', function(e) {
                if (e.target.value.trim() !== '') {
                    showMobileSearchSuggestions();
                } else {
                    hideMobileSearchSuggestions();
                }
            });
        }

        // Close search suggestions when clicking outside
        document.addEventListener('click', function(event) {
            const isDesktopSearch = desktopSearchInput && desktopSearchInput.contains(event.target);
            const isMobileSearch = mobileSearchInput && mobileSearchInput.contains(event.target);
            const isDesktopSuggestions = desktopSearchSuggestions && desktopSearchSuggestions.contains(event
                .target);
            const isMobileSuggestions = mobileSearchSuggestions && mobileSearchSuggestions.contains(event.target);

            if (!isDesktopSearch && !isDesktopSuggestions) {
                hideDesktopSearchSuggestions();
            }

            if (!isMobileSearch && !isMobileSuggestions) {
                hideMobileSearchSuggestions();
            }
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            }
        });

        // Escape key to close mobile search
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!mobileSearchBar.classList.contains('hidden')) {
                    mobileSearchBar.classList.add('hidden');
                    mobileSearchInput.value = '';
                    hideMobileSearchSuggestions();
                }
            }
        });
    </script>
</body>

</html>
