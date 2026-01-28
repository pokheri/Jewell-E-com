<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Royal Gold Jewels - Header</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/product-card.css')

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

        /* Add this to your <style> tag in base layout */
        html,
        body {
            max-width: 100%;
            overflow-x: hidden;
        }

        main {
            overflow-x: hidden;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50 ">

    <x-web.header />
    <!-- Page Content (for demonstration) -->
    <main class="pt-20">
        {{-- <x-web.slider /> --}}

        {{-- <x-web.product-category /> --}}
        {{-- <x-web.best-seller /> --}}
        {{-- Rings section  --}}
        {{-- <x-web.product-section title="Exquisite Rings Collection" bgColor="white"
            subtitle="Discover our finest selection of handcrafted rings " buttonText="View all Rings" /> --}}

        {{-- Rings section  --}}
        {{-- <x-web.product-section title="Exquisite Necklace Collection" bgColor="gray-50"
            subtitle="Add a touch of sophistication to your ensemble" buttonText="View all Necklace" /> --}}


        <x-web.product-section title="Sparkling Earrings for Every Style" bgColor="white"
            subtitle="Light up your look with our earring collection" buttonText="View all Earrings" />



        {{-- <x-web.product-detail /> --}}
        {{-- Rings section  --}}
        {{-- <x-web.product-section title="Luxury Bracelet Collection" bgColor="gray-50"
            subtitle="From delicate chains to bold cuffs" buttonText="View all Bracelet" /> --}}

        {{-- 
        <x-web.about-us /> --}}
        <x-web.product-listing />
        <x-web.footer />
    </main>



    @stack('scripts')
</body>

</html>
