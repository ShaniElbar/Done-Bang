@extends('themes.dark-mode.main')
@section('settings')
    <div class="text-white w-full h-[100vh] bg-black absolute bg-black/80 flex justify-center items-center">

        <div class="w-[80%] h-[75vh] bg-[#1E1E1E ] flex rounded-[15px]">
            <div class="w-[20%] px-[15px] h-[75vh] bg-[#1E1E1E]"
                style="border-top-left-radius: 15px; border-bottom-left-radius: 15px">
                <div class="text-[14px] font-[600] text-white mt-[10px]">
                    <p>Settings</p>
                </div>
                <div class="mt-[10px] w-full h-[30px] flex items-center  px-[5px] rounded-[5px] r">
                    
                    <p class="text-[14px]  text-white">Navigation</p>
                </div>



                <a href="{{ route('inbox.themes.dark-mode.settings.account') }}">
                    <div
                        class="w-full h-[30px] flex items-center mt-[10px] hover:bg-[#2D2D2D] px-[5px] rounded-[5px] cursor-pointer ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            aria-hidden="true">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M3 12a8.96 8.96 0 0 0 1.778 5.372A8.987 8.987 0 0 0 12 21a8.981 8.981 0 0 0 7.222-3.628A9 9 0 1 0 3 12zm9 3c2.747 0 5.259.472 6.562 1.577a8 8 0 1 0-13.124 0C6.74 15.472 9.253 15 12 15zm5.94 2.36A7.98 7.98 0 0 1 12 20a7.98 7.98 0 0 1-5.94-2.64C7.022 16.518 9.18 16 12 16c2.82 0 4.978.519 5.94 1.36zM12 14a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm2.75-3.75a2.75 2.75 0 1 1-5.5 0 2.75 2.75 0 0 1 5.5 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <p class="text-[14px] ml-[5px]">Account</p>
                    </div>
                </a>


                <a href="{{ route('inbox.themes.dark-mode.settings.theme') }}">
                    <div
                        class="w-full h-[30px] flex items-center hover:bg-[#2D2D2D] px-[5px] rounded-[5px] cursor-pointer {{ request()->is('app/inbox/theme*') ? 'bg-[#383838]' : '' }}">
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


            <div class="w-[80%] h-[75vh]  bg-[#121212]" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px">
                <div class="w-full h-[40px] border-b-[1px] border-b-[#1E1E1E] flex px-[10px] items-center">
                    <p class="font-[600] w-[90%]">Theme</p>
                    <button onclick="goBack()"
                        class="closeComment ml-[20px] hover:bg-[#2D2D2D] rounded rounded-[5px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="#374151"
                                d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                            </path>
                        </svg>
                    </button>
                    <script>
                        function goBack() {
                            window.location.href = "{{ route('themes.dark-mode.today') }}"
                        }
                    </script>
                </div>



                <div class=" w-full px-[10px] h-[67vh] pb-[30px]" style="overflow-y: auto">
                    <p class="text-[14px] mt-[10px]">Personalize your colors to match your style, mood, and personality</p>
                    <p class="text-[14px] mt-[10px] font-[700]">Your themes</p>


                    <form id="themeForm"  action="{{ route('update.theme') }}" method="POST">
                        @csrf

                        <div class=" flex mt-[20px]">

                            <input type="hidden" name="theme_id" id="theme_id" value="1">

                            <div onclick="submitTheme(1)"
                                class="cursor-pointer w-[200px] flex h-[84px] border rounded-[10px] border-gray-400"
                                style="overflow: hidden">
                                <div class="w-[25%] h-[100px] bg-[#E5EBEF]">
                                    <div class="w-full px-[5px]">
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#4A7899]">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#B8C7D4]">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-white">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#D0D3D6]">

                                        </div>
                                    </div>

                                </div>
                                <div class="w-[70%] ml-[5px] h-[100px]">
                                    <p class="text-[14px] text-gray-600 font-[600]">Default</p>

                                    <div class="w-[70%] h-[10px] mt-[5px] rounded-[5px] bg-[#D0D3D6]">

                                    </div>
                                    <div class="w-[90%] h-[10px] mt-[5px] rounded-[5px] bg-[#D0D3D6]">

                                    </div>
                                </div>

                                <div class="absolute ml-[170px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M16.854 7.896a.5.5 0 0 0-.708 0L10 14.043l-3.146-3.147a.5.5 0 0 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l6.5-6.5a.5.5 0 0 0 0-.708Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>


                            <div onclick="submitTheme(2)"
                                class="cursor-pointer ml-[20px] bg-[#121212] w-[200px] flex h-[84px] border rounded-[10px] border-gray-400"
                                style="overflow: hidden">
                                <div class="w-[25%] h-[100px] bg-[#1E1E1E]">
                                    <div class="w-full px-[5px]">
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#2D2D2D]">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#383838]">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#335166]">

                                        </div>
                                        <div class="w-full h-[10px] mt-[5px] rounded-[5px] bg-[#D0D3D6]">

                                        </div>
                                    </div>

                                </div>
                                <div class="w-full bg-[#121212]  ml-[5px] h-[100px]">
                                    <p class="text-[14px] text-white font-[600]">Dark</p>

                                    <div class="w-[70%] h-[10px] mt-[5px] rounded-[5px] bg-[#424242]">

                                    </div>
                                    <div class="w-[90%] h-[10px] mt-[5px] rounded-[5px] bg-[#424242]">

                                    </div>
                                </div>

                                <div class="absolute ml-[170px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M16.854 7.896a.5.5 0 0 0-.708 0L10 14.043l-3.146-3.147a.5.5 0 0 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l6.5-6.5a.5.5 0 0 0 0-.708Z">
                                        </path>
                                    </svg>
                                </div>
                            </div>

                        </div>
                    </form>

                    <script>
                        function submitTheme(themeId) {
                            document.getElementById('theme_id').value = themeId;
                            document.getElementById('themeForm').submit();
                        }
                    </script>


                </div>




            </div>
        </div>
    </div>
@endsection
