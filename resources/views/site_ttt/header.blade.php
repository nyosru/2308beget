<header>
  @if(1==2)
    <!-- Navigation bar -->
    <nav class="relative flex w-full items-center justify-between bg-white py-2 text-neutral-600 shadow-lg hover:text-neutral-700 focus:text-neutral-700 dark:bg-neutral-600 dark:text-neutral-200 md:flex-wrap md:justify-start"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            <div class="flex items-center">
                <!-- Hamburger menu button -->
                <button
                    class="border-0 bg-transparent px-2 text-xl leading-none transition-shadow duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 dark:hover:text-white dark:focus:text-white lg:hidden"
                    type="button" data-te-collapse-init data-te-target="#navbarSupportedContentX"
                    aria-controls="navbarSupportedContentX" aria-expanded="false" aria-label="Toggle navigation">
                    <!-- Hamburger menu icon -->
                    <span class="[&>svg]:w-5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-7 w-7">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </span>
                </button>
            </div>

            <!-- Navigation links -->
            <div class="!visible hidden grow basis-[100%] items-center lg:!flex lg:basis-auto"
                id="navbarSupportedContentX" data-te-collapse-item>
                <ul class="mr-auto flex flex-col lg:flex-row" data-te-navbar-nav-ref>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="block transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:hover:text-white dark:focus:text-white lg:p-2 [&.active]:text-black/90"
                            href="#!" data-te-nav-link-ref data-te-ripple-init
                            data-te-ripple-color="light">Home</a>
                    </li>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="block transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:hover:text-white dark:focus:text-white lg:p-2 [&.active]:text-black/90"
                            href="#!" data-te-nav-link-ref data-te-ripple-init
                            data-te-ripple-color="light">Features</a>
                    </li>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="block transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:hover:text-white dark:focus:text-white lg:p-2 [&.active]:text-black/90"
                            href="#backw" data-te-nav-link-ref data-te-ripple-init
                            data-te-ripple-color="light">Написать</a>
                    </li>
                    <li class="mb-4 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="block transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:hover:text-white dark:focus:text-white lg:p-2 [&.active]:text-black/90"
                            href="#!" data-te-nav-link-ref data-te-ripple-init
                            data-te-ripple-color="light">Pricing</a>
                    </li>
                    <li class="mb-2 lg:mb-0 lg:pr-2" data-te-nav-item-ref>
                        <a class="block transition duration-150 ease-in-out hover:text-neutral-700 focus:text-neutral-700 disabled:text-black/30 dark:hover:text-white dark:focus:text-white lg:p-2 [&.active]:text-black/90"
                            href="#!" data-te-nav-link-ref data-te-ripple-init
                            data-te-ripple-color="light">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif

    <!-- Hero section with background image, heading, subheading and button -->
    <div class="relative overflow-hidden bg-cover bg-no-repeat"
        style="
            background-position: 50%;
            xxbackground-image: url('https://tecdn.b-cdn.net/img/new/slides/146.webp');
            background-image: url('/storage/site_ttt/img/bb.png');
            height: 350px;
          ">
        <div class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
            style="background-color: rgba(0, 0, 0, 0.15)">
            <div class="flex h-full items-center justify-center">
                <div class="px-6 text-center text-white md:px-12">
                    <h1 class="mb-6 text-5xl font-bold">Обучение бильярду в Тюмени</h1>
                    <a href="tel:+79222630618" >
                    <h3 class="mb-8 text-3xl font-bold">Звоните!</h3>
                    <button type="button"
                        class="inline-block text-3xl rounded border-2 border-neutral-50 px-6 pb-[6px] pt-2 xtext-xs font-medium uppercase leading-normal text-neutral-50 transition duration-150 ease-in-out hover:border-neutral-100 hover:bg-neutral-500 hover:bg-opacity-10 hover:text-neutral-100 focus:border-neutral-100 focus:text-neutral-100 focus:outline-none focus:ring-0 active:border-neutral-200 active:text-neutral-200 dark:hover:bg-neutral-100 dark:hover:bg-opacity-10"
                        data-te-ripple-init data-te-ripple-color="light">
                        8-922-263-06-18
                    </button>
                  </a>
                </div>
            </div>
        </div>
    </div>
</header>
