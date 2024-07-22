<header class="bg-transparent absolute shadow-xl top-0 left-0 w-full pt-10 px-[50px] flex items-center z-10">
    <div class="container">
        <div class="flex items-center justify-between relative">
            <div class="px-4">
                <h1 class="font-bold lg:text-xl md:text-lg text-sm text-white"><img src="assets/logo/3.png" class="lg:w-20 block md:w-15 w-10" alt=""> KimGeovedi</h1>
            </div>
            <div class="flex items-center px-4 ">
                <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                    <span class="hamburger-line transition duration-300 ease-in-out origin-top-left"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out"></span>
                    <span class="hamburger-line transition duration-300 ease-in-out origin-bottom-left"></span>
                </button>
                <nav id="nav-menu" class="hidden absolute py-5 bg-[#1e293b] shadow-lg rounded-lg max-w-[250px] w-full right-4 top-full lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                    <ul class="block lg:flex">
                        <li class="group">
                            <a href="#home" class="text-base text-white py-2 mx-8 flex group-hover:text-primary">Home</a>
                        </li>
                        <li class="group">
                            <a href="#about" class="text-base text-white py-2 mx-8 flex group-hover:text-primary">About</a>
                        </li>
                        <li class="group">
                            <a href="#skills" class="text-base text-white py-2 mx-8 flex group-hover:text-primary">Skills</a>
                        </li>
                        @auth
                        <div class="flex gap-[10px] items-center border-t-2 mx-auto">
                            <div class="flex flex-col items-end justify-center ">
                                <p class="text-base text-white py-2 mx-8 flex group-hover:text-primary">{{ Auth::user()->name }}</p>
                                @if (Auth::user()->hasActiveSubscription())
                                <p class="p-[2px_10px] rounded-full bg-[#8C71F7] font-semibold text-xs text-white text-center">PRO</p>
                                @endif
                            </div>
                            <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                                <a href="{{ route('dashboard') }}">
                                    <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                                </a>
                            </div>
                        </div>
                        @endauth
                        @guest
                        <div class="flex gap-[10px] items-center">
                            <a href="/register" class="text-white font-semibold sm:text-sm rounded-[30px] lg:p-[16px_32px] sm:p-1 ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#8C71F7]">Sign Up</a>
                            <a href="/login" class="text-white font-semibold rounded-[30px] lg:p-[16px_32px] bg-[#8C71F7] sm:p-1 transition-all duration-300 hover:shadow-[0_10px_20px_0_#8C71F7]">Sign In</a>
                        </div>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
    {{-- <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="">
                <h1 class="font-bold lg:text-xl md:text-lg sm:text-sm text-white"><img src="assets/logo/3.png" class="w-20 block" alt=""> KimGeovedi</h1>
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                <li>
                    <a href="{{ route('front.index') }}" class="font-semibold hover:text-primary">Home</a>
                </li>
                @role('student')
                <li>
                    <a href="{{ route('front.pricing') }}" class="font-semibold hover:text-primary">Pricing</a>
                </li>
                @endrole
                <li>
                    <a href="" class="font-semibold hover:text-primary">Benefits</a>
                </li>
                <li>
                    <a href="" class="font-semibold hover:text-primary">Stories</a>
                </li>
            </ul>
            @auth
            <div class="flex gap-[10px] items-center">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{ Auth::user()->name }}</p>
                    @if (Auth::user()->hasActiveSubscription())
                    <p class="p-[2px_10px] rounded-full bg-[#8C71F7] font-semibold text-xs text-white text-center">PRO</p>
                    @endif
                </div>
                <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{Storage::url(Auth::user()->avatar)}}" class="w-full h-full object-cover" alt="photo">
                    </a>
                </div>
            </div>
            @endauth
            @guest
            <div class="flex gap-[10px] items-center">
                <a href="/register" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#8C71F7]">Sign Up</a>
                <a href="/login" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#8C71F7] transition-all duration-300 hover:shadow-[0_10px_20px_0_#8C71F7]">Sign In</a>
            </div>
            @endguest
        </nav> --}}
