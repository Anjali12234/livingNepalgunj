
@props(['liClass' => ''])
          @if(auth('registered-user')->check())
                <h3 class="py-2.5 {{ $liClass }} ">Hi {{ Auth::guard('registered-user')->user()->username }}</h3>

                <a href="{{ route('registeredUser.dashboard') }}">
                    <li class='flex items-center py-3 {{ $liClass }} hover:bg-blue-50 text-black text-sm cursor-pointer'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mr-3"
                            viewBox="0 0 512 512">
                            <path
                                d="M337.711 241.3a16 16 0 0 0-11.461 3.988c-18.739 16.561-43.688 25.682-70.25 25.682s-51.511-9.121-70.25-25.683a16.007 16.007 0 0 0-11.461-3.988c-78.926 4.274-140.752 63.672-140.752 135.224v107.152C33.537 499.293 46.9 512 63.332 512h385.336c16.429 0 29.8-12.707 29.8-28.325V376.523c-.005-71.552-61.831-130.95-140.757-135.223zM446.463 480H65.537V376.523c0-52.739 45.359-96.888 104.351-102.8C193.75 292.63 224.055 302.97 256 302.97s62.25-10.34 86.112-29.245c58.992 5.91 104.351 50.059 104.351 102.8zM256 234.375a117.188 117.188 0 1 0-117.188-117.187A117.32 117.32 0 0 0 256 234.375zM256 32a85.188 85.188 0 1 1-85.188 85.188A85.284 85.284 0 0 1 256 32z"
                                data-original="#000000"></path>
                        </svg>
                        My Account
                    </li>
                </a>
                <a href="{{ route('registeredUser.profile.index') }}">
                <li class='flex items-center py-3 {{ $liClass }} hover:bg-blue-50 text-black text-sm cursor-pointer'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mr-3" viewBox="0 0 64 64">
                        <path
                            d="M45.5 4A18.53 18.53 0 0 0 32 9.86 18.5 18.5 0 0 0 0 22.5C0 40.92 29.71 59 31 59.71a2 2 0 0 0 2.06 0C34.29 59 64 40.92 64 22.5A18.52 18.52 0 0 0 45.5 4ZM32 55.64C26.83 52.34 4 36.92 4 22.5a14.5 14.5 0 0 1 26.36-8.33 2 2 0 0 0 3.27 0A14.5 14.5 0 0 1 60 22.5c0 14.41-22.83 29.83-28 33.14Z"
                            data-original="#000000" />
                    </svg>
                    Profile Setting
                </li>
                </a>

                <form method="POST" action="{{ route('registeredUser.logout') }}">
                    @csrf
                    <li class="flex items-center py-3 {{ $liClass }} hover:bg-blue-50 text-black text-sm cursor-pointer">
                        <button type="submit" class="flex items-center w-full text-left">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-4 h-4 mr-3"
                                 viewBox="0 0 6.35 6.35">
                                <path
                                    d="M3.172.53a.265.266 0 0 0-.262.268v2.127a.265.266 0 0 0 .53 0V.798A.265.266 0 0 0 3.172.53zm1.544.532a.265.266 0 0 0-.026 0 .265.266 0 0 0-.147.47c.459.391.749.973.749 1.626 0 1.18-.944 2.131-2.116 2.131A2.12 2.12 0 0 1 1.06 3.16c0-.65.286-1.228.74-1.62a.265.266 0 1 0-.344-.404A2.667 2.667 0 0 0 .53 3.158a2.66 2.66 0 0 0 2.647 2.663 2.657 2.657 0 0 0 2.645-2.663c0-.812-.363-1.542-.936-2.03a.265.266 0 0 0-.17-.066z"
                                    data-original="#000000"></path>
                            </svg>
                            Logout
                        </button>
                    </li>
                </form>

            @else
                <li class='py-2.5 {{ $liClass }} '><a href="{{ route('registeredUser.login') }}"
                        class='mt-3 py-2 {{ $liClass }} rounded-lg m-4 my-3 text-2xl tracking-wider font-bold cursor-pointer border border-neutral-700 hover:border-neutral-800 outline-none bg-transparent hover:bg-neutral-200 text-neutral-700  transition-all duration-300'>Login</a>
                </li>
                <li class='py-2.5 px-5 '><a href="{{ route('registeredUser.register') }}"
                        class='mt-3 py-2 px-5 rounded-lg m-4 my-3 text-2xl tracking-wider font-bold cursor-pointer border outline-none bg-neutral-700 hover:bg-neutral-800 text-white transition-all duration-300'>SignUp</a>
                </li>
            @endif


<script>
    let dropdownToggle1 = document.getElementById('dropdownToggle1');
    let dropdownMenu1 = document.getElementById('dropdownMenu1');

    function handleClick() {
        if (dropdownMenu1.className.includes('block')) {
            dropdownMenu1.classList.add('hidden')
            dropdownMenu1.classList.remove('block')
        } else {
            dropdownMenu1.classList.add('block')
            dropdownMenu1.classList.remove('hidden')
        }
    }

    dropdownToggle1.addEventListener('click', handleClick);
</script>
