@extends('themes.dark-mode.main')
@section('main-content')
    <div class="mb-[40px]">
        <div class="flex items-center">
            <p class="text-[26px] font-[700]">Activity:</p>
            <input id="project-shower" class="w-[150px] focus:outline-none cursor-pointer text-[26px] font-[700] ml-[5px]" 
       readonly type="text" value="All Project">

            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" viewBox="0 0 16 16"
                style="padding-top: 4px;">
                <path fill="currentColor"
                    d="M11.646 5.647a.5.5 0 0 1 .708.707l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 1 1 .708-.707L8 9.294l3.646-3.647Z">
                </path>
            </svg>
        </div>
        {{--  --}}
        <div id="show-project-menu" class="ml-[20px] absolute hidden  w-[300px]  bg-[#1E1E1E] rounded-md mt-1  shadow-lg"
            style="z-index: 1000;">
            <div class="w-full h-[40px] flex items-center px-[10px]" style="border-bottom: 1.5px solid #ECEEF0">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="#B8B8B8" fill-rule="evenodd"
                        d="M16.29 15.584a7 7 0 1 0-.707.707l3.563 3.563a.5.5 0 0 0 .708-.707l-3.563-3.563ZM11 17a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"
                        clip-rule="evenodd"></path>
                </svg>
                <input type="text" placeholder="Search..." class="w-full pl-[5px] focus:outline-none">
            </div>

            <div class="project-item px-3 py-2 cursor-pointer hover:bg-gray-200" data-value="notnull">

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"
                        class="" style="color: var(--named-color-charcoal);">
                        <path fill="#fff" fill-rule="evenodd"
                            d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                            clip-rule="evenodd"></path>
                    </svg>

                    <p class="ml-[10px] text-white">All Project</p>
                </div>
            </div>

            <div class="project-item px-3 py-2 cursor-pointer hover:bg-gray-200" data-value="null">

                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#fff" fill-rule="evenodd"
                            d="M8.062 4h7.876a2 2 0 0 1 1.94 1.515l2.062 8.246c.04.159.06.322.06.486V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3.754a2 2 0 0 1 .06-.485L6.12 5.515A2 2 0 0 1 8.061 4Zm0 1a1 1 0 0 0-.97.758L5.03 14.004a1 1 0 0 0-.03.242V18a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.754a.997.997 0 0 0-.03-.242L16.91 5.758a1 1 0 0 0-.97-.758H8.061Zm6.643 10a2.75 2.75 0 0 1-5.41 0H7a.5.5 0 1 1 0-1h2.75a.5.5 0 0 1 .5.5 1.75 1.75 0 1 0 3.5 0 .5.5 0 0 1 .5-.5H17a.5.5 0 0 1 0 1h-2.295Z"
                            clip-rule="evenodd"></path>
                    </svg>


                    <p class="ml-[10px] text-white">Inbox</p>
                </div>
            </div>

            <div class="px-3 py-2 cursor-pointer hover:bg-gray-200">

                <div class="flex items-center">
                    <img class="w-[20px] h-[20px] rounded-[50%]" src="{{ asset('storage/' . $user->photo) }}"
                        alt="">


                    <p class="ml-[10px] text-white font-[500]">My Project</p>
                </div>
            </div>

            @foreach ($category as $item)
                <div class="project-item px-3 py-2 cursor-pointer hover:bg-gray-200" data-value="{{ $item->id }}">

                    <div class="flex items-center ml-[10px]">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24" class="" style="color: var(--named-color-charcoal);">
                            <path fill="{{ $item->color }}" fill-rule="evenodd"
                                d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                clip-rule="evenodd"></path>
                        </svg>


                        <p class="ml-[10px] text-white">{{ $item->name }}</p>
                    </div>
                </div>
            @endforeach


            <div class="px-3 py-2 cursor-pointer">

            </div>



        </div>
    </div>  

    {{--  --}}


    @php
        $lastDate = null;
    @endphp

    @foreach ($listDone as $item)
        @php
            $currentDate = optional($item->updated_at)->setTimezone('Asia/Jakarta')->format('j M • l');
        @endphp

        @if ($currentDate !== $lastDate)
            <div class="mt-4 h-[30px] border-b border-b-[1px] border-[#b8b8b8]">
                <p class="font-bold">{{ $currentDate }}</p>
            </div>
            @php
                $lastDate = $currentDate;
            @endphp
        @endif


        <div class="flex">
            <div class="w-full h-[78px] flex items-center border-b border-b-[1px] border-[#b8b8b8]">
                <div class="relative w-full h-[50px] px-[5px] flex items-center">
                    <img class="w-[49px] h-[49px] rounded rounded-[50%]" src="{{ asset('storage/' . $user->photo) }}"
                        alt="">
                    <div class="absolute ml-[40px] mt-[30px]">
                        <svg data-svgs-path="sm1/notification_completed.svg" xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16">
                            <g fill="none" fill-rule="evenodd" transform="translate(-4 -4)">
                                <circle cx="12" cy="12" r="8" fill="#3C9B0D"></circle>
                                <path fill="#FFF"
                                    d="M10.536 13.071l4.242-4.243a1 1 0 0 1 1.414 1.415l-4.95 4.95a1 1 0 0 1-1.414 0l-2.12-2.122a1 1 0 0 1 1.413-1.414l1.415 1.414z">
                                </path>
                            </g>
                        </svg>
                    </div>
                    <div class="w-[700px] h-[50px] ml-[10px]">
                        <div class="w-[700px]">
                            <p><b>You</b> completed a task: <u>{{ $item->task_name }}</u></p>
                        </div>
                        <div class="text-[12px] text-white">
                            <p>{{ optional($item->updated_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</p>
                        </div>
                    </div>
                    <div class=" w-[100px] h-[50px] ml-[10px]">
                        <div class="h-[25px]">

                        </div>
                        <div class="text-[12px] text-white flex items-center">

                            <p class="text-[12px] text-white">{{ $item->category->name ?? 'Inbox' }}</p>

                            @if (!$item->category || $item->category->name === 'inbox')
                                <div class="ml-[5px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"
                                        viewBox="0 0 16 16" class="AyswQEh wMrhHaw">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M5.509 2h4.982a2 2 0 0 1 1.923 1.45l1.509 5.28c.051.18.077.365.077.55V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.28a2 2 0 0 1 .077-.55l1.509-5.28A2 2 0 0 1 5.509 2Zm0 1a1 1 0 0 0-.962.726l-1.509 5.28A1 1 0 0 0 3 9.28V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.28a.997.997 0 0 0-.039-.274l-1.508-5.28A1 1 0 0 0 10.49 3H5.51Zm4.685 7a2.25 2.25 0 0 1-4.388 0H4.5a.5.5 0 1 1 0-1h1.75a.5.5 0 0 1 .5.5 1.25 1.25 0 0 0 2.5 0 .5.5 0 0 1 .5-.5h1.75a.5.5 0 0 1 0 1h-1.306Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @else
                                <div class="ml-[5px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"
                                        viewBox="0 0 12 12" class="wMrhHaw" style="color: var(--named-color-charcoal);">
                                        <path fill="{{ $item->category->color }}" fill-rule="evenodd"
                                            d="M4.555 1.003a.5.5 0 0 1 .442.552L4.781 3.5h2.994l.228-2.055a.5.5 0 0 1 .994.11L8.781 3.5H10.5a.5.5 0 0 1 0 1H8.67l-.334 3H10a.5.5 0 0 1 0 1H8.225l-.228 2.055a.5.5 0 0 1-.994-.11L7.22 8.5H4.225l-.228 2.055a.5.5 0 0 1-.994-.11L3.22 8.5H1.5a.5.5 0 0 1 0-1h1.83l.334-3H2a.5.5 0 1 1 0-1h1.775l.228-2.055a.5.5 0 0 1 .552-.442ZM7.33 7.5l.334-3H4.67l-.334 3H7.33Z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class=" w-full flex justify-center mt-[30px] text-gray-500">
        <p>That's it. No more history to load.</p>
    </div>


    @if ($listDone->isEmpty())
        <div class="w-full h-[50vh] flex items-center justify-center">
            <div class="">
                <img class="w-[220px] h-[200px]"
                    src="https://d3ptyyxy2at9ui.cloudfront.net/assets/images/9b83bf5d1895df53ed06506fd3cd381c.png"
                    alt="">
                <div>
                    <p class="font-[600]">What do you need to get done today?</p>
                </div>
                <div class="w-full flex justify-center">
                    <div class="w-[260px] flex justify-center">
                        <p style="text-align: center" class="mt-[10px] text-gray-700 text-[14px]">By default, tasks added
                            here will be scheduled for today.</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
