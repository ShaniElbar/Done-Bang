@extends('themes.dark-mode.main')
@section('settings')
    <div class="w-full h-[100vh] bg-black/80 absolute flex justify-center items-center">

        <div class="w-[80%] h-[75vh] bg-[#1E1E1E] flex rounded-[15px] border border-[#333333]">
            <div class="w-[20%] px-[15px] h-[75vh] bg-[#252525]"
                style="border-top-left-radius: 15px; border-bottom-left-radius: 15px">
                <div class="text-[14px] font-[600] text-[#BDBDBD] mt-[10px]">
                    <p>Settings</p>
                </div>

                <div class="mt-[10px] w-full h-[30px] flex items-center  px-[5px] rounded-[5px] r">
                    
                    <p class="text-[14px]  text-white">Navigation</p>
                </div>
                @php
                    $isActive = request()->is('app/inbox/account/password');
                @endphp

                <a href="{{ route('inbox.themes.dark-mode.settings.account') }}">
                    <div
                        class="w-full h-[30px] flex items-center mt-[10px] hover:bg-[#333333] px-[5px] rounded-[5px] cursor-pointer {{ $isActive ? 'bg-[#383838]' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            aria-hidden="true">
                            <path fill="#BDBDBD" fill-rule="evenodd"
                                d="M3 12a8.96 8.96 0 0 0 1.778 5.372A8.987 8.987 0 0 0 12 21a8.981 8.981 0 0 0 7.222-3.628A9 9 0 1 0 3 12zm9 3c2.747 0 5.259.472 6.562 1.577a8 8 0 1 0-13.124 0C6.74 15.472 9.253 15 12 15zm5.94 2.36A7.98 7.98 0 0 1 12 20a7.98 7.98 0 0 1-5.94-2.64C7.022 16.518 9.18 16 12 16c2.82 0 4.978.519 5.94 1.36zM12 14a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm2.75-3.75a2.75 2.75 0 1 1-5.5 0 2.75 2.75 0 0 1 5.5 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-[14px] ml-[5px] text-[#E0E0E0]">Account</p>
                    </div>
                </a>

                <a href="{{ route('inbox.themes.dark-mode.settings.theme') }}">
                    <div class="w-full h-[30px] flex items-center hover:bg-[#333333] px-[5px] rounded-[5px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="#BDBDBD" fill-rule="evenodd"
                                d="M13.5 18.75C14 19.875 14.5 21 16 21c3 0 5-4 5-9s-4.03-9-9-9a9 9 0 0 0-9 9c0 7.418 2.751 6.307 5.397 5.238.92-.371 1.828-.738 2.603-.738 1.5 0 2 1.125 2.5 2.25ZM20 12c0 4.664-1.796 8-4 8-.716 0-.985-.303-1.586-1.656-.899-2.022-1.63-2.844-3.414-2.844-.835 0-1.459.198-3.017.827l-.252.102c-1.478.59-2.188.714-2.622.453C4.453 16.49 4 15 4 12a8 8 0 0 1 8-8c4.429 0 8 3.563 8 8Zm-2 3.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-.5-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM16.75 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM12 7.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM9.25 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.5 12.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-[14px] ml-[5px] text-[#E0E0E0]">Theme</p>
                    </div>
                </a>
            </div>

            <div class="w-[80%] h-[75vh] bg-[#1E1E1E]" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px">
                <div class="w-full h-[40px] border-b border-b-[#333333] flex px-[10px] items-center">
                    <div onclick="goBackAccount()" class="cursor-pointer hover:bg-[#333333] rounded-[5px] p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="#BDBDBD"
                                d="M11.145 5.148a.5.5 0 0 1 .71.704L6.738 11H17.5a.5.5 0 0 1 0 1H6.738l5.117 5.148a.5.5 0 0 1-.71.704l-5.964-6-.025-.027A.44.44 0 0 1 5 11.5c0-.124.059-.238.156-.325l.025-.027 5.964-6z">
                            </path>
                        </svg>
                    </div>
                    <p class="font-[600] w-[90%] ml-[10px] text-[#E0E0E0]">Add password</p>

                    <button onclick="goBack()"
                        class="closeComment ml-[20px] hover:bg-[#333333] rounded rounded-[5px] cursor-pointer p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="#BDBDBD"
                                d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                            </path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('profile.updatePassword') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div class="w-full h-[57vh] px-[15px]">
                        <p class="text-[14px] text-[#BDBDBD] mt-[10px]">Your password must be at least 8 characters long.
                            Avoid common words or patterns.</p>

                        <div class="mt-[20px]">
                            <p class="font-[700] text-[14px] text-[#E0E0E0]">New password</p>
                            <div class="relative mt-[10px] w-[65%]">
                                <input id="password1"
                                    class="text-[14px] w-full border border-[#424242] px-[5px] pr-[35px] rounded-[5px] focus:outline-none focus:border-[#40C4FF] h-[30px] bg-[#252525] text-[#E0E0E0]"
                                    type="password" name="new_password">
                                <div onclick="togglePassword(this)"
                                    class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                                    <svg class="icon-hide block" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="#9E9E9E" viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.5C7 4.5 2.7 8.1 1 12c.8 1.9 2.1 3.6 3.6 5 .3.3.8.3 1.1 0 .3-.3.3-.8 0-1.1C4.4 14.6 3.2 13 2.4 12c1.7-2.3 5.1-5.5 9.6-5.5 1.9 0 3.6.5 5.2 1.3.4.2.9.1 1.1-.3.2-.4.1-.9-.3-1.1C16.2 5.1 14.2 4.5 12 4.5z" />
                                        <path
                                            d="M12 8c-2.2 0-4 1.8-4 4 0 .7.2 1.3.6 1.9l5.3-5.3C13.3 8.2 12.7 8 12 8zM21.7 20.3L3.7 2.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l3 3C3.6 8.1 2.3 9.9 1 12c1.7 3.4 6 7.5 11 7.5 2.3 0 4.4-.7 6.2-1.9l2.1 2.1c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4zM12 18c-3.7 0-7-2.6-8.7-6 .9-1.5 2.2-3.1 3.7-4.3l1.6 1.6C8.2 9.9 8 10.4 8 11c0 2.2 1.8 4 4 4 .6 0 1.1-.2 1.6-.4l1.7 1.7c-.9.5-2 .7-3.3.7z" />
                                    </svg>
                                    <svg class="icon-show hidden" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="#9E9E9E" viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.5c5 0 9.3 3.6 11 7.5-1.7 3.4-6 7.5-11 7.5S2.7 15.4 1 12c1.7-3.9 6-7.5 11-7.5m0 13c2.8 0 5-2.2 5-5s-2.2-5-5-5-5 2.2-5 5 2.2 5 5 5m0-2c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="mt-[20px]">
                            <p class="font-[700] text-[14px] text-[#E0E0E0]">Confirm new password</p>
                            <div class="relative mt-[10px] w-[65%]">
                                <input id="password2"
                                    class="text-[14px] w-full border border-[#424242] px-[5px] pr-[35px] rounded-[5px] focus:outline-none focus:border-[#40C4FF] h-[30px] bg-[#252525] text-[#E0E0E0]"
                                    type="password" name="new_password_confirmation">
                                <div onclick="togglePassword(this)"
                                    class="absolute inset-y-0 right-2 flex items-center cursor-pointer">
                                    <svg class="icon-hide block" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="#9E9E9E" viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.5C7 4.5 2.7 8.1 1 12c.8 1.9 2.1 3.6 3.6 5 .3.3.8.3 1.1 0 .3-.3.3-.8 0-1.1C4.4 14.6 3.2 13 2.4 12c1.7-2.3 5.1-5.5 9.6-5.5 1.9 0 3.6.5 5.2 1.3.4.2.9.1 1.1-.3.2-.4.1-.9-.3-1.1C16.2 5.1 14.2 4.5 12 4.5z" />
                                        <path
                                            d="M12 8c-2.2 0-4 1.8-4 4 0 .7.2 1.3.6 1.9l5.3-5.3C13.3 8.2 12.7 8 12 8zM21.7 20.3L3.7 2.3c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l3 3C3.6 8.1 2.3 9.9 1 12c1.7 3.4 6 7.5 11 7.5 2.3 0 4.4-.7 6.2-1.9l2.1 2.1c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4zM12 18c-3.7 0-7-2.6-8.7-6 .9-1.5 2.2-3.1 3.7-4.3l1.6 1.6C8.2 9.9 8 10.4 8 11c0 2.2 1.8 4 4 4 .6 0 1.1-.2 1.6-.4l1.7 1.7c-.9.5-2 .7-3.3.7z" />
                                    </svg>
                                    <svg class="icon-show hidden" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="#9E9E9E" viewBox="0 0 24 24">
                                        <path
                                            d="M12 4.5c5 0 9.3 3.6 11 7.5-1.7 3.4-6 7.5-11 7.5S2.7 15.4 1 12c1.7-3.9 6-7.5 11-7.5m0 13c2.8 0 5-2.2 5-5s-2.2-5-5-5-5 2.2-5 5 2.2 5 5 5m0-2c-1.7 0-3-1.3-3-3s1.3-3 3-3 3 1.3 3 3-1.3 3-3 3z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="border-t border-t-[#333333] h-[9.5vh] flex items-center">
                        <div class="w-[72%]"></div>
                        <div class="flex items-center">
                            <div onclick="goBackAccount()"
                                class="w-auto h-[30px] flex items-center bg-[#424242] px-[10px] cursor-pointer hover:bg-[#333333] transition rounded-[5px]">
                                <p class="text-[14px] text-[#E0E0E0]">Cancel</p>
                            </div>

                            <button type="submit"
                                class="ml-[10px] flex items-center w-auto h-[30px] bg-[#40C4FF] px-[10px] cursor-pointer hover:bg-[#2D9CDB] transition rounded-[5px]">
                                <p class="text-[14px] text-[#1E1E1E]">Add password</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(el) {
            const container = el.closest(".relative");
            const input = container.querySelector("input");
            const iconShow = container.querySelector(".icon-show");
            const iconHide = container.querySelector(".icon-hide");

            if (input.type === "password") {
                input.type = "text";
                iconShow.classList.remove("hidden");
                iconHide.classList.add("hidden");
            } else {
                input.type = "password";
                iconShow.classList.add("hidden");
                iconHide.classList.remove("hidden");
            }
        }

        function goBackAccount() {
            window.location.href = "{{ route('inbox.themes.dark-mode.settings.account') }}"
        }
        
        function goBack() {
            window.location.href = "{{ route('themes.dark-mode.today') }}"
        }
    </script>
@endsection