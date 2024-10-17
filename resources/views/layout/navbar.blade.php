@vite('resources/scss/layout/navbar.scss')


<nav
    class="navbar fixed md:absolute  md:shadow-none md:border-0 w-full bg-[#366F62] p-8 max-w-[100vw] {{-- {{ $page->navbar_light ? 'navbar-light' : 'navbar-dark' }} --}}">
    <div class="container flex flex-wrap items-center justify-between mx-auto">

        {{-- Logo --}}
        <a href="/" class="flex items-center space-x-3 navbar-logo rtl:space-x-reverse">
            <img src="{{ $asset->get('navbar', 'navbar-logo') }}" class="h-16"
                alt="{{ $asset->attrs('navbar', 'navbar-logo', 'alt') }}" />
        </a>

        <div class="flex justify-between">
            <div class="flex items-center space-x-1 hamburger-menu md:order-2 md:space-x-0 rtl:space-x-reverse">

                

                {{-- Open hamburger menu --}}
                <button type="button" onclick="toggleMenu()"
                    class="inline-flex items-center justify-center p-2 text-sm rounded-lg navbar-toggle-menu-button w-14 h-14 md:hidden focus:outline-none focus:ring-2"
                    aria-controls="navbar-menu" aria-expanded="false">

                    <span class="sr-only">Open main menu</span>

                    <svg width="26" height="19" viewBox="0 0 26 19" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M25.5 17.5833C25.5 18.3657 24.8657 19 24.0833 19H1.41667C0.634263 19 0 18.3657 0 17.5833C0 16.8009 0.634264 16.1667 1.41667 16.1667H24.0833C24.8657 16.1667 25.5 16.8009 25.5 17.5833ZM25.5 9.5C25.5 10.2824 24.8657 10.9167 24.0833 10.9167H1.41667C0.634262 10.9167 0 10.2824 0 9.5C0 8.7176 0.634263 8.08333 1.41667 8.08333H24.0833C24.8657 8.08333 25.5 8.7176 25.5 9.5ZM25.5 1.41667C25.5 2.19907 24.8657 2.83333 24.0833 2.83333H1.41667C0.634262 2.83333 0 2.19907 0 1.41667C0 0.634263 0.634263 0 1.41667 0H24.0833C24.8657 0 25.5 0.634263 25.5 1.41667Z"
                            fill="#FFFFFF" />
                    </svg>

                </button>
            </div>

            {{-- Navbar items --}}
            <div class="fixed items-center justify-between hidden w-full md:w-full md:relative w-50 md:flex md:order-1">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border rounded-lg md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0">

                    @foreach ($pages as $route => $page)
                        @if ($page->in_navigation)

							{{-- Pharmaceutical Services has context menu --}}
                            @if ($page->title === 'Pharmaceutical Services')
                                <li order="{{ $page->order_in_navigation }}" class="relative open-desktop-dropdown">
                                    <a href="/{{ $route !== 'main' ? $route : '' }}"
                                        class="navbar-item">{{ $page->title }}</a>

									{{-- Dropdown --}}
                                    {{-- <div class="dropdown-desktop-outer">
                                        <ul class="p-4 space-y-4 border dropdown-desktop backdrop-blur-sm">
                                            @foreach ($pages as $route => $subpage)
                                                @if (!$subpage->in_navigation)
                                                    <li>
                                                        <a
                                                            href="/{{ $route !== 'main' ? $route : '' }}">{{ $subpage->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div> --}}
                                </li>
                            @else
                                <li order="{{ $page->order_in_navigation }}">
                                    <a href="/{{ $route !== 'main' ? $route : '' }}"
                                        class="navbar-item">{{ $page->title }}</a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</nav>

{{-- Navbar items (mobile) --}}
<div
    class="navbar navbar-mobile-menu flex md:hidden flex-col fixed bg-[#E9EEF1] {{-- {{ $page->navbar_light ? 'navbar-light' : 'navbar-dark' }} --}}">

    <div class="pt-[5rem] relative w-full h-full">
        <ul class="flex flex-col navbar-items">
            @foreach ($pages as $route => $page)
                @if ($page->in_navigation)
                    <li order="{{ $page->order_in_navigation }}" class="flex items-center justify-between w-full">
                        <a href="/{{ $route !== 'main' ? $route : '' }}" class="navbar-item">
                            @if ($page->title === 'Home')
                                <svg class="w-[2.25em] h-[2.25em] mr-[0.5em]" viewBox="0 0 18 18" fill="#366F62"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.50003 9.83333H2.33336V15.6667C2.33336 16.5858 3.08086 17.3333 4.00003 17.3333H14C14.9192 17.3333 15.6667 16.5858 15.6667 15.6667V9.83333H16.5C16.6648 9.8333 16.8259 9.7844 16.9629 9.69283C17.0999 9.60126 17.2067 9.47113 17.2698 9.31888C17.3328 9.16663 17.3493 8.9991 17.3172 8.83747C17.285 8.67584 17.2057 8.52737 17.0892 8.41083L9.58919 0.910831C9.51187 0.833376 9.42003 0.771928 9.31894 0.730002C9.21784 0.688076 9.10947 0.666496 9.00003 0.666496C8.89058 0.666496 8.78221 0.688076 8.68112 0.730002C8.58002 0.771928 8.48818 0.833376 8.41086 0.910831L0.910859 8.41083C0.794351 8.52737 0.715013 8.67584 0.682873 8.83747C0.650733 8.9991 0.667236 9.16663 0.730294 9.31888C0.793353 9.47113 0.900136 9.60126 1.03714 9.69283C1.17415 9.7844 1.33523 9.8333 1.50003 9.83333ZM7.33336 15.6667V11.5H10.6667V15.6667H7.33336ZM9.00003 2.67833L14 7.67833V11.5L14.0009 15.6667H12.3334V11.5C12.3334 10.5808 11.5859 9.83333 10.6667 9.83333H7.33336C6.41419 9.83333 5.66669 10.5808 5.66669 11.5V15.6667H4.00003V7.67833L9.00003 2.67833Z"
                                        fill="#366F62" />
                                </svg>
                            @endif
                            {{ $page->title }}
                        </a>

                        {{-- subpage sztori. Visszatesszük ha kell. --}}
                        {{-- @if ($page->title === 'Pharmaceutical Services')
                            <button class="mobile-dropdown" onclick="toggleDropDown()">
                                <svg class="dropdown-svg w-[2.5em] h-[2.5em]" viewBox="0 0 24 24" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.7105 15.5407L18.3605 9.88071C18.4542 9.78775 18.5286 9.67715 18.5793 9.55529C18.6301 9.43343 18.6562 9.30273 18.6562 9.17071C18.6562 9.0387 18.6301 8.908 18.5793 8.78614C18.5286 8.66428 18.4542 8.55368 18.3605 8.46071C18.1731 8.27446 17.9196 8.16992 17.6555 8.16992C17.3913 8.16992 17.1378 8.27446 16.9505 8.46071L11.9505 13.4107L7.00045 8.46071C6.81309 8.27446 6.55964 8.16992 6.29545 8.16992C6.03127 8.16992 5.77781 8.27446 5.59045 8.46071C5.49596 8.55333 5.42079 8.66377 5.3693 8.78565C5.3178 8.90752 5.291 9.03841 5.29045 9.17071C5.291 9.30302 5.3178 9.4339 5.3693 9.55578C5.42079 9.67765 5.49596 9.7881 5.59045 9.88071L11.2405 15.5407C11.3341 15.6422 11.4477 15.7232 11.5742 15.7786C11.7007 15.834 11.8373 15.8626 11.9755 15.8626C12.1136 15.8626 12.2502 15.834 12.3767 15.7786C12.5032 15.7232 12.6168 15.6422 12.7105 15.5407Z" />
                                </svg>
                            </button>
                        @endif --}}
                        @if ($page->order_in_navigation === 1)
                            <button class="navbar-mobile-close" onclick="toggleMenu()">
                                <svg class="w-[2.5em] h-[2.5em]" viewBox="0 0 21 21" fill="#366F62"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M1.00171 1.00173C0.448468 1.55497 0.448469 2.45196 1.00171 3.0052L17.0295 19.033C17.5827 19.5862 18.4797 19.5862 19.0329 19.033C19.5862 18.4797 19.5862 17.5827 19.0329 17.0295L3.00518 1.00173C2.45194 0.448488 1.55495 0.448489 1.00171 1.00173Z" />
                                    <path
                                        d="M19.033 1.00173C19.5862 1.55497 19.5862 2.45196 19.033 3.0052L3.0052 19.033C2.45196 19.5862 1.55498 19.5862 1.00173 19.033C0.448492 18.4797 0.448492 17.5827 1.00173 17.0295L17.0295 1.00173C17.5827 0.448488 18.4797 0.448489 19.033 1.00173Z" />
                                </svg>
                            </button>
                        @endif
                    </li>
                @endif

                {{-- subpage sztori. Visszatesszük ha kell. --}}
                {{-- @if ($page->title === 'Pharmaceutical Services' && $page->in_navigation)
                    <div class="dropdown-container">
                        <ul>
                            @foreach ($pages as $route => $subpage)
                                @if (!$subpage->in_navigation)
                                    <li class="flex items-center w-full">
                                        <a href="/{{ $route !== 'main' ? $route : '' }}" class="navbar-item">
                                            <svg class="w-[1em] h-[1em] mr-[0.5em]" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="15 10 20 15 15 20" />
                                                <path d="M4 4v7a4 4 0 0 0 4 4h12" />
                                            </svg>
                                            {{ $subpage->title }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
            @endforeach
        </ul>
    </div>
</div>

<script>
    function toggleMenu() {
        var navbar = document.querySelector('.navbar');
        var navbarMobileMenu = document.querySelector('.navbar-mobile-menu');

        navbar.classList.toggle('navbar-opened');
        navbarMobileMenu.classList.toggle('navbar-opened');
    }

    function toggleDropDown() {
        var dropDownSvg = document.querySelector('.dropdown-svg');
        var dropDownContainer = document.querySelector('.dropdown-container');
        dropDownSvg.classList.toggle('dropdown-opened');
        dropDownContainer.classList.toggle('dropdown-opened');
    }

    function stickyNavbar() {
        if (window.innerWidth >= 768) { //Ha MD-nél nagyobb screen van
            var currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            if (currentScroll <= 100) navbar.classList.remove("sticky");
            else {
                if (currentScroll > lastScrollTop) navbar.classList.remove("sticky"); // Lefelé görgetés
                else navbar.classList.add("sticky"); //Felfelé görgetés
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
        } else if (navbar.classList.contains("sticky")) navbar.classList.remove("sticky");
    }
    var navbar = document.querySelector('.navbar');
    var lastScrollTop = 0;
    window.addEventListener('scroll', stickyNavbar);

    
</script>