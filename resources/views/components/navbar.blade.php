<nav id="navbar" class="w-full bg-white fixed top-0 left-0 z-50">
    <div class="max-w-6xl mx-auto px-6 flex justify-between items-center py-6">
        <!-- Bal oldal: Logo -->
        <div class="flex items-center space-x-2">
            <div class="logo">
                <!-- Logó helye -->
                <svg width="24" height="36" viewBox="0 0 24 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M23.5294 12.2118C23.5294 16.8819 20.7623 20.9082 16.7793 22.7351C18.4612 21.3496 19.5322 19.248 19.5322 16.896C19.5322 12.7642 16.2259 9.40423 12.112 9.32046C12.0574 9.3167 12.0075 9.3167 11.9529 9.3167C11.8983 9.3167 11.8485 9.3167 11.7939 9.32046C10.2673 9.40328 9.05882 10.6663 9.05882 12.2108V26.6814C9.05882 31.4748 5.16988 35.3638 0.376465 35.3638V12.2118C0.376465 5.81928 5.56047 0.635284 11.9529 0.635284C18.3454 0.635284 23.5294 5.81928 23.5294 12.2118Z"
                        fill="black" />
                    <path
                        d="M13.9992 14.2582C15.1294 13.128 15.1294 11.2956 13.9992 10.1654C12.8689 9.03515 11.0365 9.03515 9.90629 10.1654C8.77608 11.2956 8.77608 13.128 9.90629 14.2582C11.0365 15.3884 12.8689 15.3884 13.9992 14.2582Z"
                        fill="black" />
                </svg>
            </div>
            <span class="font-bold text-xl">Ferencz</span>
        </div>

        <!-- Középső menü -->
        <div id="menu" class="hidden md:flex space-x-8">
            <a href="#about" class="font-bold">About Me</a>
            <a href="#skills" class="font-bold">Skills</a>
            <a href="#projects" class="font-bold">Project</a>
            <a href="#contact" class="font-bold">Contact Me</a>
        </div>

        <!-- Jobb oldal: Hamburger Menu Button -->
        <button id="menu-btn" class="block md:hidden focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden fixed inset-0 bg-black flex flex-col items-center justify-center z-50">
        <button id="close-btn" class="absolute top-4 right-4 focus:outline-none">
            <svg class="w-6 h-6 close-icon mt-4 ml-2" fill="none" stroke="white" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <a href="#about" class="block py-2 px-4  text-white hover:bg-gray-200">About Me</a>
        <a href="#skills" class="block py-2 px-4  text-white hover:bg-gray-200">Skills</a>
        <a href="#projects" class="block py-2 px-4  text-white hover:bg-gray-200">Project</a>
        <a href="#contact" class="block py-2 px-4  text-white hover:bg-gray-200">Contact Me</a>
    </div>
</nav>

<script>
    document.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        if (window.scrollY > 0) {
            navbar.classList.add('shadow-md');
        } else {
            navbar.classList.remove('shadow-md');
        }
    });

    document.getElementById('menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('menu');
        const mobileMenu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
        mobileMenu.classList.toggle('hidden');
        this.classList.toggle('open');
    });

    document.getElementById('close-btn').addEventListener('click', function() {
        const menu = document.getElementById('menu');
        const mobileMenu = document.getElementById('mobile-menu');
        menu.classList.add('hidden');
        mobileMenu.classList.add('hidden');
        document.getElementById('menu-btn').classList.remove('open');
    });
</script>

<style>
    #menu-btn.open svg {
        transform: rotate(90deg);
        transition: transform 0.3s ease;
    }

    .close-icon {
        transition: transform 0.3s ease;
    }

    #close-btn:hover .close-icon {
        transform: rotate(90deg);
    }

    a {
        font-family: "Sora", sans-serif;
        color: #000;
    }
</style>
