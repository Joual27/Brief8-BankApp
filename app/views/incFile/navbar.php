

<div class="container mx-auto w-[80%]">
<nav class="relative flex items-center justify-between sm:h-10 md:justify-center py-8 px-4 ">
    <div class="flex items-center flex-1 md:absolute md:inset-y-0 md:left-0">
        <div class="flex items-center justify-between w-full md:w-auto">
            <a href="" aria-label="Home">
                <img src="<?php echo URLROOT . '/pics/Logo.png'?>" height="40" width="40" />
            </a>
            <div class="-mr-2 flex items-center md:hidden">
                <button type="button" id="main-menu" aria-label="Main menu" aria-haspopup="true" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg stroke="currentColor" fill="none" viewBox="0 0 24 24" class="h-6 w-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="hidden md:flex md:space-x-10">
        <a href="<?php echo URLROOT?>/pages"
            class="font-medium text-primary hover:text-gray-900 transition duration-150 ease-in-out">Home</a>
        <a href="<?php echo URLROOT?>/pages/about"
            class="font-medium text-primary hover:text-gray-900 transition duration-150 ease-in-out">About us</a>
        <a href="<?php echo URLROOT?>/pages/contact"
            class="font-medium text-primary hover:text-gray-900 transition duration-150 ease-in-out">Contact us</a>
        <a href="<?php echo URLROOT?>/pages/offre" 
            class="font-medium text-primary hover:text-gray-900 transition duration-150 ease-in-out">Offre</a>
    </div>
    <div class="hidden md:absolute md:flex md:items-center md:justify-end md:inset-y-0 md:right-0">
        <span class="inline-flex">
        </span>
        <span class="inline-flex rounded-md shadow ml-2">
            <a href="<?php echo URLROOT; ?>/pages/Login" class="dark:inline-flex items-center px-4 py-2 border border-transparent text-sm leading-6 font-medium rounded-md text-white bg-amber-400 hover:bg-amber-200 focus:outline-none">
               Login
            </a>
        </span>
    </div>
</nav>

</div>
