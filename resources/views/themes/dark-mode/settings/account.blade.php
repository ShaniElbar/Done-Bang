@extends('themes.dark-mode.main')
@section('settings')
    <div class="text-white w-full h-[100vh] bg-black absolute bg-black/80 flex justify-center items-center">

        <div class="w-[80%] h-[75vh] bg-[#1E1E1E ] flex rounded-[15px]">
            <div class="w-[20%] px-[15px] h-[75vh]  bg-[#1E1E1E]"
                style="border-top-left-radius: 15px; border-bottom-left-radius: 15px">
                <div class="text-[14px] font-[600] text-white mt-[10px]">
                    <p>Settings</p>
                </div>

                <div class="mt-[10px] w-full h-[30px] flex items-center  px-[5px] rounded-[5px] r">
                    
                    <p class="text-[14px]  text-white">Navigation</p>
                </div>

                @php
                    $isActive = request()->is('app/inbox/account/dark');
                    $Theme = request()->is('');
                @endphp

                <a href="{{ route('inbox.themes.dark-mode.settings.account') }}">
                    <div
                        class="w-full h-[30px] flex items-center mt-[10px] hover:bg-[#2D2D2D] px-[5px] rounded-[5px] cursor-pointer {{ $isActive ? 'bg-[#383838]' : '' }}">
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
                    <div class="w-full h-[30px] flex items-center hover:bg-[#2D2D2D] px-[5px] rounded-[5px] cursor-pointer">
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
                <div class="w-full h-[40px] border-b-[1px] border-b-[#2D2D2D] flex px-[10px] items-center">
                    <p class="font-[600] w-[90%]">Account</p>
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
                            window.location.href = "{{ route('themes.dark-mode.today') }}"
                        }
                    </script>
                </div>



                <div class="w-full h-[67vh] pb-[30px]" style="overflow-y: auto">
                    <div class="w-full h-[40px] mt-[20px] flex px-[10px] items-center">
                        <p class="font-[600]">Photo</p>
                    </div>
                    <div class=" mt-[10px] ml-[10px]">
                        <p class="text-[13px] text-gray-500">Pick a photo. Your avatar photo will be public.</p>
                    </div>

                    <div class="flex items-center gap-4 px-2.5">

                        <img class="w-[80px] h-[80px] rounded-full object-cover"
                            src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/profileEmpty.png') }}"
                            alt="Profile Photo">


                        <div class="flex flex-col sm:flex-row gap-2">

                            <form action="{{ route('user.update.photo') }}" method="POST" enctype="multipart/form-data"
                                class="inline">
                                @csrf
                                @method('POST')
                                <input type="file" name="photo" id="photo" class="hidden"
                                    onchange="this.form.submit()">
                                <label for="photo"
                                    class="inline-flex items-center h-8 px-3 bg-[#383838] cursor-pointer hover:bg-[#2D2D2D] rounded-md cursor-pointer transition-colors">
                                    <span class="text-xs sm:text-sm">Change Photo</span>
                                </label>
                            </form>


                            <form action="{{ route('user.remove.photo') }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center h-8 px-3 border border-red-500 hover:bg-red-500 hover:text-white rounded-md transition-colors">
                                    <span class="text-xs sm:text-sm text-red-500 hover:text-white">Remove Photo</span>
                                </button>
                            </form>
                        </div>

                    </div>

                    <div class=" mt-[10px] ml-[10px]">
                        <p class="font-[600]">Name</p>
                        <input
                            class="w-[65%] border border-gray-400 px-[5px] rounded-[5px] focus:outline-none focus:border focus:border-gray-600 h-[30px] text-[14px]"
                            type="text" value="{{ $user->name }}">

                    </div>
                    <div class=" mt-[30px] ml-[10px]">
                        <p class="font-[600]">Email</p>
                        <p class="text-[14px]">{{ $user->email }}</p>


                        <a href="{{ route('inbox.themes.dark-mode.settings.email') }}">
                            <div
                                class="mt-[10px] w-[130px] justify-center h-[30px] rounded-[5px] hover:bg-[#2D2D2D] transition cursor-pointer bg-[#383838] flex items-center">
                                <p class="text-[14px]">Change Email</p>
                            </div>
                        </a>
                    </div>
                    <div class=" mt-[30px] ml-[10px] mr-[10px]  border-b-[1px] border-b-[#2D2D2D] py-[10px]">
                        <p class="font-[600]">Password</p>



                        <a href="{{ route('inbox.themes.dark-mode.settings.password') }}">
                            <div
                                class="mt-[10px] w-[130px] justify-center h-[30px] rounded-[5px] hover:bg-[#2D2D2D] transition cursor-pointer  bg-[#383838] flex items-center">
                                <p class="text-[14px]">Add Password</p>
                            </div>
                        </a>
                    </div>


                    <div class="px-[10px] mt-[10px]  border-b-[1px] border-b-[#2D2D2D] h-auto py-[20px]">
                        <p class="font-[600]">Connected accounts</p>

                        <p class="text-[14px]">You can log in to Todoist with your Google account <span class="font-[700]">{{ $user->email }}</span></p>
                        <p class="text-[14px] mt-[10px]">You haven't set a password yet, so we can't disconnect your Google account. Please <a href="{{ route('inbox.themes.dark-mode.settings.password') }}"><u>create a password</u></a> first to proceed</p>
                    </div>
                    <div class="px-[10px] mt-[10px] ">
                        <p class="text-[14px] font-[600]">Delete account</p>

                        <p class="text-[14px]">This will immediately delete all of your data</p>
                        <form action="{{ route('user.remove') }}" method="POST">
                            @csrf
                            @method('delete')
                            <button  type="submit"
                                    class="mt-[20px] cursor-pointer inline-flex items-center h-8 px-3 border border-red-500 hover:bg-red-500 hover:text-white rounded-md transition-colors">
                                    <span class="text-xs sm:text-sm text-red-500 hover:text-white">Delete account</span>
                                </button>
                        </form>
                    </div>
                </div>
                



            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="success-message"
            class="bg-[#282828] rounded rounded-[10px] flex items-center px-[10px] absolute w-auto h-[50px] bottom-[30px] left-[20px]">
            <p class="text-[14px] text-white">{{ session('success') }}</p>

            <button class="ml-[20px] bg-[#282828] hover:bg-[#303030] rounded rounded-[5px] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <path fill="#ffffff"
                        d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                    </path>
                </svg>
            </button>

        </div>
    @elseif (session('error'))
        <div id="error-message"
            class="bg-[#B22C2C] rounded rounded-[10px] flex items-center px-[10px] absolute w-auto h-[50px] bottom-[30px] left-[20px]">
            <p class="text-[14px] text-white">{{ session('error') }}</p>

            <button class="ml-[20px] bg-[#B22C2C] hover:bg-[#A22B2B] rounded rounded-[5px] cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                    <path fill="#ffffff"
                        d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                    </path>
                </svg>
            </button>

        </div>
    @endif
@endsection
