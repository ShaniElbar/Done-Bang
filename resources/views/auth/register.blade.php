<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>DoneBang</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="flex w-full h-auto" style="padding-bottom: 40px">
        <div class="w-[50%] h-fill">
            <div class="ml-[150px] mt-[20px]">
                <div class="flex items-center ">
                    <div class="w-[60px] h-[60px]">
                        <img src="{{ asset('images/LogoDD.png') }}" alt="">
                    </div>
                    <div class="">
                        <p class="text-[30px] font-[700] text-[#335166]">DoneBang</p>
                    </div>
                </div>
                <div class="ml-[10px] mt-[100px] w-[400px]">
                    <div>
                        <p class="text-[32px] font-[700]">Sign up</p>
                    </div>

                    <div class="mt-[20px]">
                        <a href="javascript:void(0)" onclick="loginWithGoogle()">
                            <button  style="transition: .2s"
                            class="flex items-center justify-center items-center w-full h-[50px] border border-[1.5px] border-[#EEEEEE] rounded rounded-[5px] hover:cursor-pointer hover:bg-[#EEEEEE]"><svg
                                xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"
                                class="u2emSEy" aria-hidden="true">
                                <g fill="none" fill-rule="evenodd">
                                    <path fill="#4285F4"
                                        d="M17.64 9.205c0-.639-.057-1.252-.164-1.841H9v3.481h4.844a4.14 4.14 0 0 1-1.796 2.716v2.259h2.908c1.702-1.567 2.684-3.875 2.684-6.615Z">
                                    </path>
                                    <path fill="#34A853"
                                        d="M9 18c2.43 0 4.467-.806 5.956-2.18l-2.908-2.259c-.806.54-1.837.86-3.048.86-2.344 0-4.328-1.584-5.036-3.711H.957v2.332A8.997 8.997 0 0 0 9 18Z">
                                    </path>
                                    <path fill="#FBBC05"
                                        d="M3.964 10.71A5.41 5.41 0 0 1 3.682 9c0-.593.102-1.17.282-1.71V4.958H.957A8.996 8.996 0 0 0 0 9c0 1.452.348 2.827.957 4.042l3.007-2.332Z">
                                    </path>
                                    <path fill="#EA4335"
                                        d="M9 3.58c1.321 0 2.508.454 3.44 1.345l2.582-2.58C13.463.891 11.426 0 9 0A8.997 8.997 0 0 0 .957 4.958L3.964 7.29C4.672 5.163 6.656 3.58 9 3.58Z">
                                    </path>
                                    <path d="M0 0h18v18H0z"></path>
                                </g>
                            </svg><span class="text-[18px] ml-[10px] font-[700]">Login with Google</span>
                            
                        </button>
                        </a>
                    </div>
                    {{-- <div class="mt-[20px]">
                        <a href="">
                            <button style="transition: .2s"
                                class="flex items-center justify-center items-center w-full h-[50px] border border-[1.5px] border-[#EEEEEE] rounded rounded-[5px] hover:cursor-pointer hover:bg-[#EEEEEE]"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none"
                                    viewBox="0 0 18 18" class="u2emSEy" aria-hidden="true">
                                    <mask id="facebook-icon_svg__a" width="18" height="18" x="0" y="0"
                                        maskUnits="userSpaceOnUse" style="mask-type: alpha;">
                                        <path fill="#fff" fill-rule="evenodd" d="M.001 0H18v17.89H.001V0Z"
                                            clip-rule="evenodd"></path>
                                    </mask>
                                    <g mask="url(#facebook-icon_svg__a)">
                                        <path fill="#1877F2" fill-rule="evenodd"
                                            d="M18 9a9 9 0 1 0-10.406 8.89v-6.288H5.309V9h2.285V7.017c0-2.255 1.343-3.501 3.4-3.501.984 0 2.014.175 2.014.175v2.215h-1.135c-1.118 0-1.467.694-1.467 1.406V9h2.496l-.399 2.602h-2.097v6.289C14.71 17.216 18 13.492 18 9Z"
                                            clip-rule="evenodd"></path>
                                    </g>
                                    <path fill="#fff" fill-rule="evenodd"
                                        d="m12.503 11.602.4-2.602h-2.497V7.312c0-.712.349-1.406 1.467-1.406h1.135V3.691s-1.03-.175-2.015-.175c-2.056 0-3.4 1.246-3.4 3.501V9H5.31v2.602h2.285v6.289a9.067 9.067 0 0 0 2.812 0V11.6h2.097Z"
                                        clip-rule="evenodd"></path>
                                </svg><span class="text-[18px] ml-[10px] font-[700]">Login with
                                    Facebook</span></button>
                        </a>
                    </div> --}}

                    <div class="mt-[20px]">
                        <hr class="border border-[#EEEEEE]">
                    </div>

                    <form action="{{ route('auth.register.store') }}" method="POST">
                        @csrf

                        @error('email')
                            <div class="mt-[10px] w-full flex justify-center">
                                <span class="text-red-500 font-[500]">{{ $message }}</span>
                            </div>
                        @enderror

                        <div class="mt-[20px] group">
                            <div
                                class="input-field @error('email') error @enderror w-full h-[60px] border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <label for=""
                                    class="ml-[10px] mt-[5px] text-[12px] text-[#202020] font-[500]">Email</label>
                                <input name="email" placeholder="Enter your email..." type="text"
                                    value="{{ old('email') }}"
                                    class="w-full mt-[5px] pl-[10px] pr-[10px] text-[16px] font-[600] focus:outline-none">
                            </div>
                        </div>
                        <div class="mt-[20px] group">
                            <div
                                class="w-full h-[60px] border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <label for=""
                                    class="ml-[10px] mt-[5px] text-[12px] text-[#202020] font-[500]">Password</label>
                                <input name="password" placeholder="Enter your password..." type="password"
                                    class="w-full mt-[5px] pl-[10px] pr-[10px] text-[16px] font-[600] focus:outline-none">
                            </div>
                        </div>
                        <div class="mt-[20px]">
                            <button type="submit"
                                class="w-full h-[50px] bg-[#335166] border rounded rounded-[10px] font-[600] text-white cursor-pointer hover:bg-[#EEEEEE] hover:text-[#335166] hover:font-[600] transition">Sign
                                up with Email</button>
                        </div>
                        <div class="mt-[20px]">
                            <p class="text-[13px]">By continuing with Google or Email, you agree to DoneBang's <a
                                    href=""><u class="hover:text-[#335166]">Terms of Service</u></a> and <a
                                    href=""><u class="hover:text-[#335166]">Privacy Policy</u></a>.</p>
                        </div>
                        <div class="mt-[20px]">
                            <div class="w-full flex justify-center">
                                <p class="text-[13px]">Already signed up? <a href="{{ route('auth.login') }}"><u
                                            class="hover:text-[#335166]">Go to login</u></a></p>
                            </div>
                        </div>


                    </form>


                </div>
            </div>
        </div>

        <div class="w-[50%] h-fill  flex justify-center items-center">
            <div class="w-[450px] h-[450px] flex justify-center items-center mr-[100px]">
                <video id="myVideo" playsinline muted autoplay
                    poster="https://todoist.b-cdn.net/assets/images/7b55dafbc1fe203bd537c738fb1757ed.png">
                    <source src="https://todoist.b-cdn.net/assets/video/69a00ecf3b2aedf11010987593926c2e.mp4"
                        type="video/mp4">
                </video>
            </div>

            <div style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2)"
                class="absolute w-[330px] h-[210px] bg-white rounded rounded-[10px] mt-[35%] ml-[20%] p-[20px] pt-[30px]">
                <p class="arvo-regular-italic text-[18px]">Before using DoneBang, my tasks were all over the place!
                    Now, everything is neatly organized in one spot.</p>
                <p class="mt-[20px] text-[14px] text-[#282F30]">– Sani Elbar</p>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let video = document.getElementById('myVideo')
        video.play()

        video.onended

        function() {
            video.pause
            video.currentTime = 0
        }
    })
</script>

<script>
    function loginWithGoogle(){
        let popup = window.open(
            "{{ route('auth.google') }}",
            "popupWindow",
            "width=500,height=600,scrollbars=yes"
        )
    }
</script>

