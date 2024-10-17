@vite('resources/scss/sections/header.scss')
<section class="header bg-white p-8 max-w-full mx-auto">
    <div
        class="min-h-screen flex flex-col md:flex-row lg:justify-between max-w-6xl mx-auto px-4 lg:-mt-12 md:mt-12 justify-center items-center">

        <!-- Avatar Image (Top on mobile view) -->
        <div class="order-1 md:order-2"> <!-- Adjust order for mobile view -->
            <div class="avatar-border">
                <img src="./assets/memoji.png" alt="Avatar" class="w-52 h-52 rounded-full mx-auto md:mx-0 avatar">
            </div>
        </div>

        <!-- Text Content (Bottom on mobile view) -->
        <div class=" text-center md:text-left order-2 md:order-1 mt-0 md:mt-4 text-content">
            <!-- Adjust order and margin for mobile view -->
            <p class="position-headline">Full Stack Fejlesztő</p>
            <h1 class="name-headline mt-4">Toth Ferencz</h1>
            <p class="paragraph-headline mt-4">
                Full Stack Fejlesztő, Románia, Érsemjén <br>
                Jelenlegi munkahely: Pomscloud
            </p>

            <div class="flex flex-row flex-wrap mt-6 space-x-4 items-center ml-10 md:ml-0">
                <a href="#about-me"
                    class="bg-black text-white px-6 py-2 rounded-full font-bold hover:bg-gray-800 transition">
                    Rólam
                </a>
                <!-- Copy Email Button -->
                <a href="#" class="text-black px-6 py-2 rounded-full font-bold border-2">
                    Projektek
                </a>
            </div>
        </div>
    </div>
</section>
