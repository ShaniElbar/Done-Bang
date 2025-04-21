@extends('themes.default.main')
@section('settings')
    <div class="w-full h-[100vh] bg-black absolute bg-black/50 flex justify-center items-center">

        <div class="w-[80%] h-[75vh] bg-white flex rounded-[15px]">
            <div class="w-[20%] px-[15px] h-[75vh] bg-[#ECEEF0]"
                style="border-top-left-radius: 15px; border-bottom-left-radius: 15px">
                <div class="text-[14px] font-[600] text-gray-600 mt-[10px]">
                    <p>Settings</p>
                </div>

                <div class="mt-[10px] w-full h-[30px] flex items-center  px-[5px] rounded-[5px] r">
                    
                    <p class="text-[14px]  text-gray-600">Navigation</p>
                </div>

                @php
                    $isActive = request()->is('app/inbox/account/email');
                    $Theme = request()->is('');
                @endphp

                <a href="{{ route('inbox.themes.default.settings.account') }}">
                    <div
                        class="w-full h-[30px] flex items-center mt-[10px] hover:bg-gray-300 px-[5px] rounded-[5px] cursor-pointer {{ $isActive ? 'bg-gray-400' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            aria-hidden="true">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M3 12a8.96 8.96 0 0 0 1.778 5.372A8.987 8.987 0 0 0 12 21a8.981 8.981 0 0 0 7.222-3.628A9 9 0 1 0 3 12zm9 3c2.747 0 5.259.472 6.562 1.577a8 8 0 1 0-13.124 0C6.74 15.472 9.253 15 12 15zm5.94 2.36A7.98 7.98 0 0 1 12 20a7.98 7.98 0 0 1-5.94-2.64C7.022 16.518 9.18 16 12 16c2.82 0 4.978.519 5.94 1.36zM12 14a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm2.75-3.75a2.75 2.75 0 1 1-5.5 0 2.75 2.75 0 0 1 5.5 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-[14px] ml-[5px]">Account</p>
                    </div>

                </a>



                <a href="{{ route('inbox.themes.default.settings.theme') }}">
                    <div class="w-full h-[30px] flex items-center hover:bg-gray-300 px-[5px] rounded-[5px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24" aria-hidden="true">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M13.5 18.75C14 19.875 14.5 21 16 21c3 0 5-4 5-9s-4.03-9-9-9a9 9 0 0 0-9 9c0 7.418 2.751 6.307 5.397 5.238.92-.371 1.828-.738 2.603-.738 1.5 0 2 1.125 2.5 2.25ZM20 12c0 4.664-1.796 8-4 8-.716 0-.985-.303-1.586-1.656-.899-2.022-1.63-2.844-3.414-2.844-.835 0-1.459.198-3.017.827l-.252.102c-1.478.59-2.188.714-2.622.453C4.453 16.49 4 15 4 12a8 8 0 0 1 8-8c4.429 0 8 3.563 8 8Zm-2 3.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-.5-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM16.75 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM12 7.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM9.25 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.5 12.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-[14px] ml-[5px]">Theme</p>
                    </div>
                </a>


            </div>


            <div class="w-[80%] h-[75vh]  bg-white" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px">
                <div class="w-full h-[40px] border-b-[1px] border-b-[#ECEEF0] flex px-[10px] items-center">
                    <div onclick="goBackAccount()" class="cursor-pointer hover:bg-gray-300 rounded-[5px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="currentColor"
                                d="M11.145 5.148a.5.5 0 0 1 .71.704L6.738 11H17.5a.5.5 0 0 1 0 1H6.738l5.117 5.148a.5.5 0 0 1-.71.704l-5.964-6-.025-.027A.44.44 0 0 1 5 11.5c0-.124.059-.238.156-.325l.025-.027 5.964-6z">
                            </path>
                        </svg>
                    </div>
                    <p class="font-[600] w-[90%] ml-[10px]">Change email address</p>

                    <script>
                        function goBackAccount() {
                            window.location.href = "{{ route('inbox.themes.default.settings.account') }}"
                        }
                    </script>
                    <button onclick="goBack()"
                        class="closeComment ml-[20px] hover:bg-[#F5F5F5] rounded rounded-[5px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="#374151"
                                d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                            </path>
                        </svg>
                    </button>
                    <script>
                        function goBack() {
                            window.location.href = "{{ route('themes.default.today') }}"
                        }
                    </script>
                </div>

                <form action="{{ route('profile.updateEmail') }}" method="POST">
                    @csrf
                    @method('POST')
                    
                    <div class="w-full h-[57vh] px-[15px]">
                        <p class="text-[14px] text-gray-600 mt-[10px]">Update the email you use for your account. Your email is
                            currently <span class="text-black font-[600]">{{ $user->email }}</span>.</p>
    
    
    
                        <div class=" mt-[20px]">
                            <p class="font-[700] text-[14px]">New email</p>
                            <input
                                class="mt-[10px] w-[65%] border border-gray-400 px-[5px] rounded-[5px] focus:outline-none focus:border focus:border-gray-600 h-[30px] text-[14px]"
                                type="email" name="new_email">
    
                        </div>
                        <div class=" mt-[20px]">
                            <p class="font-[700] text-[14px]">Confirm new email</p>
                            <input
                                class="mt-[10px] w-[65%] border border-gray-400 px-[5px] rounded-[5px] focus:outline-none focus:border focus:border-gray-600 h-[30px] text-[14px]"
                                type="email" name="new_email_confirmation">
    
                        </div>
    
                    </div>
    
                    <div class=" border-t-[1px] border-t-[#ECEEF0] h-[9.5vh] flex items-center">
                        <div class="w-[72%]">
    
                        </div>
                        <div class="flex items-center">
    
                            <div onclick="goBackAccount()"
                                class="w-auto h-[30px] flex items-center bg-gray-300 px-[10px] cursor-pointer hover:bg-gray-400 transition rounded-[5px]">
                                <p class="text-[14px]">Cancel</p>
                            </div>
    
                            <button type="submit"
                                class="ml-[10px] flex items-center w-auto h-[30px] bg-gray-500 px-[10px] cursor-pointer hover:bg-gray-400 transition rounded-[5px]">
                                <p class="text-[14px] text-white">Change email</p>
                        </button>
                        </div>
                    </div>
                </form>






            </div>
        </div>
    </div>
@endsection
