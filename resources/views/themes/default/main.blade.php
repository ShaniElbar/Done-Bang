<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DoneBang</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Arvo:ital,wght@0,400;0,700;1,400;1,700&family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Wix+Madefor+Text:ital,wght@0,400..800;1,400..800&display=swap"
        rel="stylesheet">

</head>

<style>
    * {
        font-family: "Wix Madefor Text", sans-serif;
        transition: .5s;
    }


    .toggle-container {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
    }

    .toggle-input {
        display: none
    }

    .toggle-label {
        width: 40px;
        height: 20px;
        background: #ccc;
        border-radius: 50px;
        position: relative;
        transition: 0.3s;

    }

    .toggle-label::after {
        content: "";
        width: 15px;
        height: 15px;
        border-radius: 50%;
        background: white;
        position: absolute;
        top: 50%;
        left: 4px;
        transform: translateY(-50%);
        transition: .3s
    }

    .toggle-input:checked+.toggle-label {
        background: #335166;
    }



    .toggle-input:checked+.toggle-label::after {
        left: 20px;
    }

    * {
        font-family: 'Wix Madefor Text', sans-serif;

    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<body>


    <div class="flex w-full h-auto">
        <div class="w-[22%] h-[100vh] bg-[#335166] p-[15px] text-[#FFFFFF]">
            <div class="w-full h-[33px] flex items-center rounded rounded-[5px] text-[#202020]">


                <div id="profile"
                    class="transition rounded rounded-[6px] flex items-center pr-[10px] h-[33px] w-[160px] px-[5px] cursor-pointer hover:bg-[#3F6780]">
                    <img class="w-[29px] h-[29px] rounded-full object-cover"
                        src="{{ $user->photo ? asset('storage/' . $user->photo) : asset('images/profileEmpty.png') }}"
                        alt="Profile Photo">

                    <div class="ml-[5px]">
                        <p class="text-[13px] text-[#FFFFFF]">{{ $user->name }}</p>
                    </div>

                    <div class="ml-[10px]">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </div>

                    <div style="display: none" id="hidden-goals"
                        class="absolute left-[180px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                        <div class="w-full h-[27px] flex items-center">
                            <p class="text-[14px] text-white">Daily goal: {{ $listDoneCount }}/5 tasks</p>
                        </div>
                    </div>

                </div>

                <div id="proMore" style="display: none">
                    <div style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2)"
                        class="absolute w-[285px] h-auto bg-[#ECEEF0] rounded rounded-[10px] top-[50px] left-[10px]">
                        <div style="border-top-right-radius: 10px; border-top-left-radius: 10px"
                            class="p-[6px] w-full h-auto bg-white ">
                            <div class="w-full h-[40px] rounded rounded-[5px] flex hover:bg-[#B8B8B8] cursor-pointer">
                                <div class="w-[40px] h-[40px]  flex justify-center items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g fill="none" fill-rule="evenodd">
                                            <g fill="#202020" fill-rule="nonzero">
                                                <g>
                                                    <g>
                                                        <path
                                                            d="M12 3c4.97 0 9 4.03 9 9s-4.03 9-9 9-9-4.03-9-9 4.03-9 9-9zm0 1c-4.418 0-8 3.582-8 8s3.582 8 8 8 8-3.582 8-8-3.582-8-8-8zm3.646 4.896c.196-.195.512-.195.708 0 .195.196.195.512 0 .708l-5.5 5.5c-.196.195-.512.195-.708 0l-2.5-2.5c-.195-.196-.195-.512 0-.708.196-.195.512-.195.708 0l2.146 2.147z"
                                                            transform="translate(-684 -480) translate(648 444) translate(36 36)">
                                                        </path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class="w-[200px]">
                                    <div class="ml-[5px]">
                                        <p class="text-[14px] font-[700]">{{ $user->name }}</p>
                                    </div>
                                    <div class="ml-[5px]">
                                        <p class="text-[12px] text-[#666666]">{{ $listDoneCount }}/5 task</p>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <a href="{{ route('inbox.themes.default.settings.account') }}">
                            <div class="p-[6px] w-full h-auto bg-white mt-[1px] ">
                                <div
                                    class="w-full h-[32px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#B8B8B8] transition">
                                    <div class="ml-[5px] flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            aria-hidden="true" class="svg_icon">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="M3 3h18v18H3z"></path>
                                                <path fill="currentColor" fill-rule="nonzero"
                                                    d="m8.82 6.62-.33.2-.82-.83a.63.63 0 0 0-.9 0l-.77.8a.62.62 0 0 0-.01.89l.82.82-.2.34a6.21 6.21 0 0 0-.66 1.6l-.1.38H4.69a.63.63 0 0 0-.63.64v1.1c0 .36.28.64.63.64h1.16l.1.37a6.21 6.21 0 0 0 .66 1.61l.2.34-.82.82a.63.63 0 0 0 0 .9l.79.77a.62.62 0 0 0 .89.01l.82-.82.34.2a6.21 6.21 0 0 0 1.6.66l.38.1v1.16c0 .35.28.63.64.63h1.1a.62.62 0 0 0 .64-.63v-1.16l.37-.1a6.21 6.21 0 0 0 1.61-.67l.34-.2.82.83c.25.25.64.24.9 0l.77-.79a.62.62 0 0 0 .01-.89l-.82-.82.2-.33a6.21 6.21 0 0 0 .66-1.62l.1-.37h1.16a.63.63 0 0 0 .63-.64v-1.1a.62.62 0 0 0-.63-.64h-1.16l-.1-.37a6.21 6.21 0 0 0-.67-1.61l-.2-.34.83-.82a.63.63 0 0 0 0-.9l-.8-.78a.62.62 0 0 0-.89-.01l-.82.82-.33-.2a6.21 6.21 0 0 0-1.62-.66l-.37-.1V4.69a.63.63 0 0 0-.64-.63h-1.1a.62.62 0 0 0-.64.63v1.16l-.37.1a6.21 6.21 0 0 0-1.61.66zm1-1.53v-.4c0-.9.72-1.63 1.63-1.63h1.1c.9 0 1.64.72 1.64 1.63v.4c.4.12.78.28 1.15.48l.28-.29a1.62 1.62 0 0 1 2.3.01l.79.78c.64.64.65 1.67 0 2.3l-.28.29c.2.37.36.75.48 1.15h.4c.9 0 1.63.73 1.63 1.64v1.1c0 .9-.73 1.64-1.63 1.64h-.4a7.2 7.2 0 0 1-.48 1.15l.29.28a1.62 1.62 0 0 1-.01 2.3l-.78.79a1.63 1.63 0 0 1-2.3 0l-.29-.28c-.37.2-.75.36-1.15.48v.4c0 .9-.73 1.63-1.64 1.63h-1.1A1.63 1.63 0 0 1 9.8 19.3v-.4a7.2 7.2 0 0 1-1.15-.48l-.29.29a1.62 1.62 0 0 1-2.3-.01l-.78-.78a1.63 1.63 0 0 1 0-2.3l.27-.29a7.2 7.2 0 0 1-.47-1.15h-.4c-.9 0-1.63-.73-1.63-1.64v-1.1c0-.9.72-1.64 1.63-1.64h.4c.12-.4.28-.78.47-1.15l-.28-.29a1.62 1.62 0 0 1 .01-2.3l.78-.78a1.63 1.63 0 0 1 2.3 0l.29.27c.37-.19.75-.35 1.15-.47z">
                                                </path>
                                                <path fill="currentColor" fill-rule="nonzero"
                                                    d="M12 14a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm0 1a3 3 0 1 1 0-6 3 3 0 0 1 0 6z">
                                                </path>
                                            </g>
                                        </svg>

                                        <div class="ml-[10px]">
                                            <p class="text-[13px]">Settings</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <div class="p-[6px] w-full h-auto bg-white mt-[1px] ">
                            <a href="{{ route('themes.default.completed') }}">
                                <div
                                    class="w-full h-[32px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#B8B8B8] transition">
                                    <div class="ml-[5px] flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                            <path fill="currentColor" fill-rule="evenodd"
                                                d="M6 5h12a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm0 1a1 1 0 0 0-1 1v5h2.691l1.362-2.724a.5.5 0 0 1 .917.053l1.473 4.05 1.576-5.516a.5.5 0 0 1 .938-.066L15.825 12H19V7a1 1 0 0 0-1-1H6Zm13 7h-3.5a.5.5 0 0 1-.457-.297l-1.44-3.241-1.622 5.675a.5.5 0 0 1-.95.034l-1.604-4.408-.98 1.96A.5.5 0 0 1 8 13H5v4a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-4Z"
                                                clip-rule="evenodd"></path>
                                        </svg>

                                        <div class="ml-[10px]">
                                            <p class="text-[13px]">Activity log</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div id="print"
                                class="w-full h-[32px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#B8B8B8] transition">
                                <div class="ml-[5px] flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        aria-hidden="true">
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill="currentColor" fill-rule="nonzero"
                                                d="M15 18v-1h2.44c.66 0 .86-.04 1.07-.15a.82.82 0 0 0 .34-.35c.11-.2.15-.4.15-1.06v-4.88c0-.66-.04-.86-.15-1.07a.82.82 0 0 0-.35-.34c-.2-.11-.4-.15-1.06-.15H6.56c-.66 0-.86.04-1.07.15a.82.82 0 0 0-.34.34C5.04 9.7 5 9.9 5 10.56v4.88c0 .66.04.86.15 1.07a.82.82 0 0 0 .34.34c.21.11.41.15 1.07.15H9v1H6.56c-.89 0-1.21-.1-1.54-.27a1.82 1.82 0 0 1-.75-.75c-.18-.33-.27-.65-.27-1.54v-4.88c0-.89.1-1.21.27-1.54.17-.32.43-.58.75-.75.33-.18.65-.27 1.54-.27h10.88c.89 0 1.21.1 1.54.27.32.17.58.43.75.75.18.33.27.65.27 1.54v4.88c0 .89-.1 1.21-.27 1.54a1.8 1.8 0 0 1-.75.75c-.33.18-.65.27-1.54.27H15z">
                                            </path>
                                            <path stroke="currentColor"
                                                d="M15.5 13.5h-7v3.94c0 .73.05 1.01.2 1.3.14.24.32.42.56.55.29.16.57.21 1.3.21h2.88c.73 0 1.01-.05 1.3-.2.24-.14.42-.32.55-.56.16-.29.21-.57.21-1.3V13.5z">
                                            </path>
                                            <path fill="currentColor" fill-rule="nonzero"
                                                d="M17 7h-1v-.44c0-.66-.04-.86-.15-1.07a.82.82 0 0 0-.34-.34C15.3 5.04 15.1 5 14.44 5H9.56c-.66 0-.86.04-1.07.15a.82.82 0 0 0-.34.34C8.04 5.7 8 5.9 8 6.57V7H7v-.44c0-.89.1-1.21.27-1.54.17-.32.43-.58.75-.75.33-.18.65-.27 1.54-.27h4.88c.89 0 1.21.1 1.54.27.32.17.58.43.75.75.18.33.27.65.27 1.54V7z">
                                            </path>
                                            <path fill="currentColor" d="M16 11h1v1h-1z"></path>
                                        </g>
                                    </svg>

                                    <div class="ml-[10px]">
                                        <p class="text-[13px]">Print</p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                const print = document.getElementById('print');
                                const proMore = document.getElementById('proMore');

                                print.addEventListener('click', function() {
                                    if (proMore) {
                                        proMore.style.display = 'none';
                                    }

                                    setTimeout(function() {
                                        window.print();
                                    }, 500);
                                });
                            </script>

                        </div>

                        <div style="border-bottom-right-radius: 10px; border-bottom-left-radius: 10px"
                            class="p-[6px] w-full h-auto bg-white mt-[1px] ">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="w-full h-[32px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#B8B8B8] transition">
                                    <div class="ml-[5px] flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            aria-hidden="true">
                                            <g fill="none" fill-rule="evenodd">
                                                <path stroke="currentColor"
                                                    d="M6.5 8.3V5.63c0-1.17.9-2.13 2-2.13h7c1.1 0 2 .95 2 2.13v11.74c0 1.17-.9 2.13-2 2.13h-7c-1.1 0-2-.95-2-2.13V14.7">
                                                </path>
                                                <path fill="currentColor"
                                                    d="m12.8 11-2.15-2.15a.5.5 0 1 1 .7-.7L14 10.79a1 1 0 0 1 0 1.42l-2.65 2.64a.5.5 0 0 1-.7-.7L12.79 12H4.5a.5.5 0 0 1 0-1h8.3z">
                                                </path>
                                            </g>
                                        </svg>

                                        <div class="ml-[10px]">
                                            <p class="text-[13px]">Log out</p>
                                        </div>
                                    </div>
                                </button>
                            </form>
                        </div>


                    </div>
                </div>



                <div
                    class="transition cursor-pointer hover:bg-[#3F6780] w-[32px] h-[32px] rounded rounded-[6px] ml-[10px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="white" fill-rule="evenodd"
                            d="m6.585 15.388-.101.113c-.286.322-.484.584-.484 1h12c0-.416-.198-.678-.484-1l-.101-.113c-.21-.233-.455-.505-.7-.887-.213-.33-.355-.551-.458-.79-.209-.482-.256-1.035-.4-2.71-.214-3.5-1.357-5.5-3.857-5.5s-3.643 2-3.857 5.5c-.144 1.675-.191 2.227-.4 2.71-.103.239-.245.46-.457.79-.246.382-.491.654-.701.887Zm10.511-2.312c-.083-.341-.131-.862-.241-2.148-.113-1.811-.469-3.392-1.237-4.544C14.8 5.157 13.57 4.5 12 4.5c-1.571 0-2.8.656-3.618 1.883-.768 1.152-1.124 2.733-1.237 4.544-.11 1.286-.158 1.807-.241 2.148-.062.253-.13.373-.46.884-.198.308-.373.504-.57.723-.074.081-.15.166-.232.261-.293.342-.642.822-.642 1.557a1 1 0 0 0 1 1h3a3 3 0 0 0 6 0h3a1 1 0 0 0 1-1c0-.735-.35-1.215-.642-1.557-.082-.095-.158-.18-.232-.261-.197-.22-.372-.415-.57-.723-.33-.511-.398-.63-.46-.884ZM14 17.5h-4a2 2 0 1 0 4 0Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div
                    class="transition cursor-pointer hover:bg-[#3F6780] w-[32px] h-[32px] rounded rounded-[6px] ml-[10px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#FFFFFF" fill-rule="evenodd"
                            d="M19 4.001H5a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-12a2 2 0 0 0-2-2Zm-15 2a1 1 0 0 1 1-1h4v14H5a1 1 0 0 1-1-1v-12Zm6 13h9a1 1 0 0 0 1-1v-12a1 1 0 0 0-1-1h-9v14Z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>

            <div class="addtask">
                <div id="addtask"
                    class=" w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[20px] transition">
                    <div class="ml-[5px] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path fill="#FFFFFF" fill-rule="evenodd"
                                d="M12 23c6.075 0 11-4.925 11-11S18.075 1 12 1 1 5.925 1 12s4.925 11 11 11Zm-.711-16.5a.75.75 0 1 1 1.5 0v4.789H17.5a.75.75 0 0 1 0 1.5h-4.711V17.5a.75.75 0 0 1-1.5 0V12.79H6.5a.75.75 0 1 1 0-1.5h4.789V6.5Z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class="ml-[10px]">
                            <p class="text-[13px]">Add Task</p>
                        </div>
                    </div>
                    <div id="hidden-add" style="z-index: 1000"
                        class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                        <div class="w-full h-[27px] flex items-center">
                            <p class="text-[14px] text-white">Add Task</p>
                        </div>
                    </div>


                </div>
            </div>

            <div style="overflow-y: auto" class="w-full h-[75vh]">
                <div id="search"
                    class=" w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition">
                    <div class="ml-[5px] flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path fill="#FFFFFF" fill-rule="evenodd"
                                d="M16.29 15.584a7 7 0 1 0-.707.707l3.563 3.563a.5.5 0 0 0 .708-.707l-3.563-3.563ZM11 17a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"
                                clip-rule="evenodd"></path>
                        </svg>

                        <div class="ml-[10px]">
                            <p class="text-[13px]">Search</p>
                        </div>
                    </div>
                    <div style="display: none;  z-index: 1000" id="hidden-search"
                        class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                        <div class="w-full h-[27px] flex items-center">
                            <p class="text-[14px] text-white">Open Quick Find</p>
                        </div>
                    </div>


                </div>



                <a href="{{ route('themes.default.today') }}">
                    <div id="today"
                        class="w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition  {{ Request::is('app/today') ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                        <div class="ml-[5px] flex items-center">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <g fill="#FFFFFF" fill-rule="evenodd">
                                    <path fill-rule="nonzero"
                                        d="M6 4h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H6zm1 3h10a.5.5 0 1 1 0 1H7a.5.5 0 0 1 0-1z">
                                    </path>
                                    <text id="calendarText"
                                        font-family="-apple-system, system-ui, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'"
                                        font-size="9" transform="translate(4 2)" font-weight="500">
                                        <tspan id="calendarDate" x="8" y="15" text-anchor="middle"></tspan>
                                    </text>
                                </g>
                            </svg>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const today = new Date();
                                    let day = today.getDate();
                                    day = day < 10 ? '0' + day : day;
                                    document.getElementById('calendarDate').textContent = day;
                                });
                            </script>


                            <div class="ml-[10px]">
                                <p class="text-[13px]">Today</p>
                            </div>
                        </div>
                        <div style="display: none;  z-index: 1000" id="hidden-today"
                            class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                            <div class="w-full h-[27px] flex items-center">
                                <p class="text-[14px] text-white">Go To Today</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('themes.default.inbox') }}">
                    <div id="inbox"
                        class="w-full h-[33px] flex items-center rounded-[5px] cursor-pointer mt-[5px] transition 
                    {{ Request::is('app/inbox') ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                        <div class="ml-[5px] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="{{ Request::is('app/inbox') ? '#FFFFFF' : '#FFFFFF' }}"
                                    fill-rule="evenodd"
                                    d="M8.062 4h7.876a2 2 0 0 1 1.94 1.515l2.062 8.246c.04.159.06.322.06.486V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3.754a2 2 0 0 1 .06-.485L6.12 5.515A2 2 0 0 1 8.061 4Zm0 1a1 1 0 0 0-.97.758L5.03 14.004a1 1 0 0 0-.03.242V18a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.754a.997.997 0 0 0-.03-.242L16.91 5.758a1 1 0 0 0-.97-.758H8.061Zm6.643 10a2.75 2.75 0 0 1-5.41 0H7a.5.5 0 1 1 0-1h2.75a.5.5 0 0 1 .5.5 1.75 1.75 0 1 0 3.5 0 .5.5 0 0 1 .5-.5H17a.5.5 0 0 1 0 1h-2.295Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <div class="ml-[10px]">
                                <p class="text-[13px] {{ Request::is('app/inbox') ? 'text-white' : '' }}">Inbox</p>
                            </div>
                        </div>
                        <div style="display: none;  z-index: 1000" id="hidden-inbox"
                            class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                            <div class="w-full h-[27px] flex items-center">
                                <p class="text-[14px] text-white">Go To Inbox</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('themes.default.upcoming') }}">
                    <div id="upcoming"
                        class="w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition {{ Request::is('app/upcoming') ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                        <div class="ml-[5px] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="#FFFFFF" fill-rule="evenodd"
                                    d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM6.5 8.5A.5.5 0 0 1 7 8h10a.5.5 0 0 1 0 1H7a.5.5 0 0 1-.5-.5ZM16 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-7 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm4 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-3-5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <div class="ml-[10px]">
                                <p class="text-[13px] {{ Request::is('app/upcoming') ? 'text-white' : '' }}">Upcoming
                                </p>
                            </div>
                        </div>
                        <div style="display: none; z-index: 1000" id="hidden-upcoming"
                            class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                            <div class="w-full h-[27px] flex items-center">
                                <p class="text-[14px] text-white">Go To Upcoming</p>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="{{ route('themes.default.completed') }}">
                    <div id="complet"
                        class="w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition {{ Request::is('app/completed') ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                        <div class="ml-[5px] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="#FFFFFF" fill-rule="evenodd"
                                    d="M12 21.001a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0-1a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm-4.354-8.104a.5.5 0 0 1 .708 0l2.146 2.147 5.146-5.147a.5.5 0 0 1 .708.708l-5.5 5.5a.5.5 0 0 1-.708 0l-2.5-2.5a.5.5 0 0 1 0-.708Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <div class="ml-[10px]">
                                <p class="text-[13px] {{ Request::is('app/completed') ? 'text-white' : '' }}">
                                    Completed
                                </p>
                            </div>
                        </div>
                        <div style="display: none;  z-index: 1000" id="hidden-complet"
                            class="absolute left-[270px] h-[27px] bg-[#282828] pl-[10px] pr-[10px] rounded rounded-[5px]">
                            <div class="w-full h-[27px] flex items-center">
                                <p class="text-[14px] text-white">Go To Completed</p>
                            </div>
                        </div>
                    </div>
                </a>


                @if ($favorit->contains('favorit', '1'))
                    <div
                        class="w-full h-[33px] flex items-center mt-[20px] rounded rounded-[5px] pl-[5px] cursor-pointer hover:bg-[#3F6780] transition">
                        <div class="flex items-center">
                            <p class="text-[14px] font-[600] w-[180px]">Favorites</p>
                        </div>
                    </div>
                @endif

                @foreach ($favorit as $item)
                    <a href="{{ route('themes.default.project', ['id' => $item->id]) }}">
                        <div class="menuHover">
                            <div
                                class="w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition {{ Request::segment(2) === 'project' && Request::segment(3) == $item->id ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                                <div class="ml-[5px] flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24" class=""
                                        style="color: var(--named-color-charcoal);">
                                        <path fill="{{ $item->color }}" fill-rule="evenodd"
                                            d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                    <div class="ml-[10px] w-[180px]">
                                        <p class="text-[14px]">{{ $item->name }}</p>
                                    </div>

                                    <div class="moreProject flex items-center">
                                        <button class="cursor-pointer projectHover px-[5px] w-auto h-[30px]"
                                            type="button" data-id="{{ $item->id }}">
                                            <svg width="15" height="3" aria-hidden="true">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M1.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm6 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm6 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach



                <div
                    class="w-full h-[33px] flex items-center mt-[20px] rounded rounded-[5px] pl-[5px] cursor-pointer hover:bg-[#3F6780] transition">
                    <div class=" flex items-center">
                        <p class="text-[14px] font-[600] w-[180px]">My Project</p>
                        <div class="ml-[20px]">

                            <button
                                class="shower-add-project w-[30px] bg-none h-[30px] flex items-center justify-center hover:bg-[#335166] rounded rounded-[5px] cursor-pointer">
                                <svg width="13" height="13">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M6 6V.5a.5.5 0 0 1 1 0V6h5.5a.5.5 0 1 1 0 1H7v5.5a.5.5 0 1 1-1 0V7H.5a.5.5 0 0 1 0-1H6z">
                                    </path>
                                </svg>
                            </button>

                        </div>
                    </div>

                </div>

                @foreach ($category as $item)
                    <a href="{{ route('themes.default.project', ['id' => $item->id]) }}"
                        data-id="{{ $item->id }}" data-order="{{ $item->order }}">
                        <div class="menuHover">
                            <div
                                class="w-full h-[33px] flex items-center rounded rounded-[5px] cursor-pointer hover:bg-[#3F6780] mt-[5px] transition {{ Request::segment(2) === 'project' && Request::segment(3) == $item->id ? 'bg-[#4A7899]' : 'hover:bg-[#3F6780]' }}">
                                <div class="ml-[5px] flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" viewBox="0 0 24 24" class=""
                                        style="color: var(--named-color-charcoal);">
                                        <path fill="{{ $item->color }}" fill-rule="evenodd"
                                            d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                    <div class="ml-[10px] w-[180px]">
                                        <p class="text-[14px]">{{ $item->name }}</p>
                                    </div>

                                    <div class="moreProject flex items-center">
                                        <button class="cursor-pointer projectHover px-[5px] w-auto h-[30px]"
                                            type="button" data-id="{{ $item->id }}">
                                            <svg width="15" height="3" aria-hidden="true">
                                                <path fill="currentColor" fill-rule="evenodd"
                                                    d="M1.5 3a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm6 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm6 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </a>

                    {{-- edit duplikat favorit --}}
                    <div data-id="{{ $item->id }}"
                        class="tooltip item absolute w-[300px] h-auto hidden  rounded rounded-[10px] bg-[#ECEEF0] top-[40%] left-[20%] text-black"
                        style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2); z-index: 1000">


                        <div class="w-full h-auto py-[10px] px-[10px] bg-white"
                            style="border-top-left-radius: 10px; border-top-right-radius: 10px">

                            <div class="shower-add-project" data-id="{{ $item->id }}">
                                <div
                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                    <svg width="24" height="24">
                                        <g fill="none" fill-rule="evenodd">
                                            <path fill="#929292" d="M9.5 19h10a.5.5 0 1 1 0 1h-10a.5.5 0 1 1 0-1z">
                                            </path>
                                            <path stroke="#929292"
                                                d="M4.42 16.03a1.5 1.5 0 0 0-.43.9l-.22 2.02a.5.5 0 0 0 .55.55l2.02-.21a1.5 1.5 0 0 0 .9-.44L18.7 7.4a1.5 1.5 0 0 0 0-2.12l-.7-.7a1.5 1.5 0 0 0-2.13 0L4.42 16.02z">
                                            </path>
                                        </g>
                                    </svg>
                                    <p class="ml-[5px]">Edit</p>
                                </div>
                            </div>

                            <form action="{{ route('inbox.update.favorit', ['id' => $item->id]) }}" method="post">
                                @csrf
                                @method('put')

                                <input type="hidden" name="favorit" value="{{ $item->favorit ? 0 : 1 }}">

                                <button
                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="{{ $item->favorit ? '#335166' : 'none' }}"
                                        stroke="{{ $item->favorit ? '#335166' : '#929292' }}" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                    </svg>

                                    <p class="ml-[5px]">
                                        {{ $item->favorit ? 'Remove from favorites' : 'Add to favorites' }}</p>
                                </button>
                            </form>


                            <form action="{{ route('inbox.store.duplicate', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('put')
                                <button type="submit"
                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="#929292" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="9" y="9" width="13" height="13" rx="2"
                                            ry="2">
                                        </rect>
                                        <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                                    </svg>

                                    <input type="hidden" name="name" value="{{ $item->name }}">
                                    <input type="hidden" name="color" value="{{ $item->color }}">


                                    <p class="ml-[5px]">Duplicate</p>
                                </button>
                            </form>


                        </div>

                        <div class="w-full h-auto py-[10px] px-[10px] bg-white mt-[1px]">
                            <div class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer"
                                onclick="copyProjectLink({{ $item->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#929292" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 7h3a5 5 0 0 1 0 10h-3"></path>
                                    <path d="M9 17H6a5 5 0 0 1 0-10h3"></path>
                                    <path d="M8 12h8"></path>
                                </svg>
                                <p class="ml-[5px]">Copy link to project</p>
                            </div>
                        </div>



                        <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]">

                            <div onclick="moveCategory({{ $item->id }}, 'above')"
                                class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#929292" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 5v10"></path>
                                    <path d="M16 9l-4-4-4 4"></path>
                                    <path d="M5 19h14"></path>
                                </svg>

                                <p class="ml-[5px]">Add project above</p>
                            </div>

                            <div onclick="moveCategory({{ $item->id }}, 'below')"
                                class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="#929292" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 19V9"></path>
                                    <path d="M16 15l-4 4-4-4"></path>
                                    <path d="M5 5h14"></path>
                                </svg>


                                <p class="ml-[5px]">Add project below</p>
                            </div>

                        </div>


                        <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]"
                            style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px">

                            @if ($categoryDetail->user_id === $user->id)
                                <div onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit();"
                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" stroke="red" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1.5 14a1 1 0 0 1-1 .9H7.5a1 1 0 0 1-1-.9L5 6" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M9 4h6" />
                                        <path d="M10 2h4v2h-4V2z" />
                                    </svg>
                                    <p class="ml-[5px] text-red-500">Delete</p>


                                    <form id="delete-project-{{ $item->id }}"
                                        action="{{ route('project.delete', $item->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @else
                                <div onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit();"
                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-not-allowed">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="none" stroke="red" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1.5 14a1 1 0 0 1-1 .9H7.5a1 1 0 0 1-1-.9L5 6" />
                                        <line x1="10" y1="11" x2="10" y2="17" />
                                        <line x1="14" y1="11" x2="14" y2="17" />
                                        <path d="M9 4h6" />
                                        <path d="M10 2h4v2h-4V2z" />
                                    </svg>
                                    <p class="ml-[5px] text-red-500">Delete</p>
                                </div>
                            @endif




                        </div>

                    </div>
                @endforeach











            </div>





        </div>

        {{-- edit --}}



        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const projectItems = document.querySelectorAll(".projectHover");

                projectItems.forEach(item => {
                    const projectId = item.getAttribute("data-id");
                    const tooltip = document.querySelector(`.tooltip[data-id="${projectId}"]`);
                    if (!tooltip) return;

                    const showerAddBtn = tooltip.querySelector(".shower-add-project");
                    let isHoveringTooltip = false;

                    tooltip.addEventListener("mouseenter", function() {
                        isHoveringTooltip = true;
                    });

                    tooltip.addEventListener("mouseleave", function() {
                        isHoveringTooltip = false;
                        tooltip.classList.add("hidden");
                    });

                    item.addEventListener("mouseenter", function() {
                        if (projectId) {
                            showerAddBtn.setAttribute("data-id", projectId);
                        }

                        tooltip.classList.add('ml-[2px]');
                        tooltip.classList.remove("hidden");
                    });

                    item.addEventListener("mouseleave", function() {
                        setTimeout(() => {
                            if (!isHoveringTooltip) {
                                tooltip.classList.add("hidden");
                            }
                        }, 100); // delay sedikit agar user bisa geser ke tooltip
                    });
                });
            });
        </script>







        <div class="w-[78%] h-[100vh] bg-[#ECEEF0] p-[70px]" style="overflow-y: auto">
            @yield('main-content')
        </div>





        <div id="showAddTask" style="display: none" class="absolute w-full h-[100vh] bg-black/50 ">
            <div class="w-full h-[100vh] flex items-center justify-center">
                <form action="{{ isset($task) ? route('task.update', $task->id) : route('inbox.task.store') }}"
                    method="POST">
                    @csrf
                    @if (isset($task))
                        @method('PUT')
                    @endif



                    <div class="w-[750px] h-[90vh] rounded rounded-[10px] bg-white flex">

                        <div class="w-[500px] h-auto ">
                            <div class="w-full h-auto p-[30px]">
                                <div>
                                    <p class="text-[22px] font-[600]">
                                        {{ isset($task) ? 'Edit Task' : 'Create Task' }}
                                    </p>
                                </div>

                                <div class="mt-[20px]">
                                    <input name="task_name" type="text" placeholder="Task name"
                                        value="{{ old('task_name', $task->task_name ?? '') }}"
                                        class="text-[14px] pl-[10px] pr-[10px] w-full h-[40px] border border-[#B8B8B8] rounded-[5px] focus:outline-none focus:ring-1 focus:ring-[#335166] transition duration-500">
                                </div>
                                <div class="mt-[20px]">
                                    <textarea name="description" maxlength="200" placeholder="Description max 200 character"
                                        class="resize-none text-[14px] p-[10px] w-full h-[210px] border border-[#B8B8B8] rounded-[5px] focus:outline-none focus:ring-1 focus:ring-[#335166] transition duration-500">{{ old('description', $task->description ?? '') }}</textarea>
                                </div>

                            </div>
                            <div class="mt-[60px]">
                                <div class="w-full h-[80px] flex" style="border-top: 2px solid #ECEEF0">
                                    <div class="w-[50%]"></div>
                                    <div class="w-[50%] h-[70px] flex items-center">
                                        <button type="button" id="closeAdd"
                                            class="ml-[20px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded rounded-[5px] h-[40px] bg-[#B8B8B8] text-white pr-[10px] pl-[10px]">Cancel</button>
                                        <button type="submit"
                                            class="ml-[10px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded-[5px] h-[40px] bg-[#335166] text-white px-[10px]">
                                            {{ isset($task) ? 'Update Task' : 'Create Task' }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="w-[250px] h-auto bg-[#ECEEF0] p-[20px]"
                            style="border-top-right-radius:9px;border-bottom-right-radius:9px; ">
                            <div>
                                <p class="text-[13px] text-[#8C939F]">Create in</p>
                            </div>

                            <div class="mt-[10px] relative">

                                <div id="dropdown-btn"
                                    class="w-full h-[40px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img class="w-[25px] h-[25px] rounded-full object-cover"
                                            src="{{ asset('storage/' . $user->photo) }}" alt="">
                                        <span id="selected-category" class="ml-[10px] text-gray-700"></span>
                                        <p id="selected-dummy">Inbox</p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="none" viewBox="0 0 18 19" class="arrow-icon">
                                        <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M4.125 6.875 9 11.75l4.875-4.875"></path>
                                    </svg>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const categoryInput = document.getElementById('category-input');
                                        const selectedDummy = document.getElementById('selected-dummy');
                                        const dropdownItems = document.querySelectorAll('.dropdown-item');


                                        const selectedValue = categoryInput.value;

                                        if (selectedValue) {
                                            const matched = [...dropdownItems].find(item => item.getAttribute('data-value') === selectedValue);
                                            if (matched) {
                                                const categoryName = matched.querySelector('p').textContent;
                                                selectedDummy.textContent = categoryName;
                                            }
                                        }


                                        dropdownItems.forEach(item => {
                                            item.addEventListener('click', function() {
                                                const value = this.getAttribute('data-value');
                                                const name = this.querySelector('p').textContent;

                                                categoryInput.value = value;
                                                selectedDummy.textContent = name;

                                                document.getElementById('dropdown-menu').classList.add('hidden');
                                            });
                                        });
                                    });
                                </script>



                                <div id="dropdown-menu"
                                    class="absolute w-[250px] bg-white rounded-md mt-1 hidden shadow-lg"
                                    style="z-index: 1000">
                                    <div id="searcher" class="w-full h-[40px] flex items-center px-[10px]"
                                        style="border-bottom: 1.5px solid #ECEEF0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="none" viewBox="0 0 24 24">
                                            <path fill="#B8B8B8" fill-rule="evenodd"
                                                d="M16.29 15.584a7 7 0 1 0-.707.707l3.563 3.563a.5.5 0 0 0 .708-.707l-3.563-3.563ZM11 17a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <input type="text" placeholder="Search..."
                                            class="w-full pl-[5px] focus:outline-none">
                                    </div>
                                    @foreach ($category as $item)
                                        <div class="dropdown-item px-3 py-2 cursor-pointer hover:bg-gray-200"
                                            data-value="{{ $item->id }}">
                                            <div class="flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24" class=""
                                                    style="color: var(--named-color-charcoal);">
                                                    <path fill="{{ $item->color }}" fill-rule="evenodd"
                                                        d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">{{ $item->name }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>



                                <input type="hidden" name="category_id" id="category-input"
                                    value="{{ old('category_id', $task->category_id ?? '') }}">
                            </div>




                            <div class="mt-[10px]">
                                <p class="text-[13px] text-[#8C939F]">Schedule this task for</p>
                            </div>

                            <div class="mt-[10px] relative">
                                <div id="date-btn"
                                    class="w-full h-[40px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 20 20">
                                            <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-miterlimit="10" stroke-width="1.2"
                                                d="M6.667 1.668v2.5M13.333 1.668v2.5M2.917 7.574h14.166M17.5 7.085v7.083c0 2.5-1.25 4.167-4.167 4.167H6.667c-2.917 0-4.167-1.667-4.167-4.167V7.085c0-2.5 1.25-4.167 4.167-4.167h6.666c2.917 0 4.167 1.667 4.167 4.167">
                                            </path>
                                            <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.2"
                                                d="M13.08 11.417h.007M13.08 13.917h.007M9.997 11.417h.007M9.997 13.917h.007M6.912 11.417h.007M6.912 13.917h.007">
                                            </path>
                                        </svg>
                                        <span id="selected-date" class="ml-[10px] text-gray-700 w-[150px]">Pilih
                                            Tanggal</span>
                                    </div>
                                    <div class="ml-[0px]">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="none" viewBox="0 0 18 19" class="arrow-icon">
                                            <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="1.5" d="M4.125 6.875 9 11.75l4.875-4.875"></path>
                                        </svg>
                                    </div>

                                    <div id="datepicker-container" class="abosolute"></div>
                                </div>


                                <input type="text" id="date-input" name="date" hidden>
                            </div>

                            <div class="mt-[10px]">
                                <p class="text-[13px] text-[#8C939F]">Priority</p>
                            </div>

                            <div class="mt-[10px] relative">
                                <input type="hidden" id="priority-value" name="priority" value="4">

                                <div id="priorityBtn"
                                    class="w-full h-[40px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center">
                                    <div class="w-full flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            fill="#D84040" viewBox="0 0 24 24">
                                            <path fill="#8C939F" fill-rule="evenodd"
                                                d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="ml-[10px] text-[16px] text-gray-700">Priority 4</p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="none" viewBox="0 0 18 19" class="arrow-icon">
                                        <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M4.125 6.875 9 11.75l4.875-4.875"></path>
                                    </svg>
                                </div>

                                <div id="priority-menu"
                                    class="absolute w-[250px] bg-white rounded-md mt-1 hidden shadow-lg"
                                    style="z-index: 1000;">
                                    <div class="w-full h-[40px] flex items-center px-[10px]"
                                        style="border-bottom: 1.5px solid #ECEEF0">

                                        <p class="text-gray-700">Priority</p>
                                    </div>

                                    <div class="priority-item px-3 py-2 cursor-pointer hover:bg-gray-200"
                                        data-value="1">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#D84040" viewBox="0 0 24 24">
                                                <path fill="#D84040" fill-rule="evenodd"
                                                    d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                            <p class="ml-[10px] text-gray-700">Priority 1</p>
                                        </div>
                                    </div>

                                    <div class="priority-item px-3 py-2 cursor-pointer hover:bg-gray-200"
                                        data-value="2">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#D84040" viewBox="0 0 24 24">
                                                <path fill="#FFA725" fill-rule="evenodd"
                                                    d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                            <p class="ml-[10px] text-gray-700">Priority 2</p>
                                        </div>
                                    </div>

                                    <div class="priority-item px-3 py-2 cursor-pointer hover:bg-gray-200"
                                        data-value="3">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="#D84040" viewBox="0 0 24 24">
                                                <path fill="#205781" fill-rule="evenodd"
                                                    d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                            <p class="ml-[10px] text-gray-700">Priority 3</p>
                                        </div>
                                    </div>
                                    <div class="priority-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded-b-[5px]"
                                        data-value="4">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24" class="g1pQExb"
                                                data-icon-name="priority-icon" data-priority="1">
                                                <path fill="#8C939F" fill-rule="evenodd"
                                                    d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Zm4.5 7c-1.367 0-2.535.216-3.5.654V5.277c.886-.515 2.05-.777 3.5-.777.97 0 1.704.178 3.342.724 1.737.58 2.545.776 3.658.776 1.367 0 2.535-.216 3.5-.654v7.377c-.886.515-2.05.777-3.5.777-.97 0-1.704-.178-3.342-.724C10.421 12.196 9.613 12 8.5 12Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>

                                            <p class="ml-[10px] text-gray-700">Priority 4</p>
                                        </div>
                                    </div>

                                </div>


                            </div>


                            <div class="mt-[10px]">
                                <p class="text-[13px] text-[#8C939F]">Pick Time</p>
                            </div>

                            <div id="dropdown-btn"
                                class="w-full h-[40px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center justify-between">
                                <svg width="24" height="24" viewBox="0 0 100 100"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="50" cy="50" r="45" stroke="#8C939F" stroke-width="4"
                                        fill="white" />
                                    <circle cx="50" cy="50" r="3" fill="#8C939F" />
                                    <line x1="50" y1="50" x2="50" y2="30"
                                        stroke="#8C939F" stroke-width="4" stroke-linecap="round" />
                                    <line x1="50" y1="50" x2="70" y2="50"
                                        stroke="#8C939F" stroke-width="3" stroke-linecap="round" />
                                    <text x="48" y="18" font-size="10" text-anchor="middle">12</text>
                                    <text x="85" y="55" font-size="10" text-anchor="middle">3</text>
                                    <text x="50" y="92" font-size="10" text-anchor="middle">6</text>
                                    <text x="15" y="55" font-size="10" text-anchor="middle">9</text>
                                </svg>

                                <input name="time" type="text" id="timepicker"
                                    class="custom text-gray-700 ml-[10px] w-full border-none bg-transparent focus:outline-none cursor-pointer"
                                    placeholder="Pilih Waktu" readonly>
                            </div>
                            {{-- <div class="mt-[10px]">
                                <p class="text-[13px] text-[#8C939F]">Reminder</p>
                            </div>

                            <div id="dropdown-btn"
                                class="w-full h-[40px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center justify-between">
                                <svg width="24" height="24" viewBox="0 0 100 100"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="50" cy="50" r="45" stroke="#8C939F" stroke-width="4"
                                        fill="white" />
                                    <circle cx="50" cy="50" r="3" fill="#8C939F" />
                                    <line x1="50" y1="50" x2="50" y2="30"
                                        stroke="#8C939F" stroke-width="4" stroke-linecap="round" />
                                    <line x1="50" y1="50" x2="70" y2="50"
                                        stroke="#8C939F" stroke-width="3" stroke-linecap="round" />
                                    <text x="48" y="18" font-size="10" text-anchor="middle">12</text>
                                    <text x="85" y="55" font-size="10" text-anchor="middle">3</text>
                                    <text x="50" y="92" font-size="10" text-anchor="middle">6</text>
                                    <text x="15" y="55" font-size="10" text-anchor="middle">9</text>
                                </svg>

                                <input name="reminder" type="text" id="timepicker"
                                    class="custom text-gray-700 ml-[10px] w-full border-none bg-transparent focus:outline-none cursor-pointer"
                                    placeholder="Pilih Waktu" readonly>
                            </div> --}}


                        </div>

                    </div>
                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                </form>
            </div>
        </div>




        <div id="addProject" class="hidden absolute w-full h-[100vh] bg-black/50">

            <div class="w-full h-[100vh] flex items-center justify-center">
                <form
                    action="{{ isset($project) ? route('inbox.update.project', $project->id) : route('inbox.store.project') }}"
                    method="POST">
                    @csrf
                    @if (isset($project))
                        @method('PUT')
                    @endif
                    <div class="w-[480px] h-[400px] bg-white rounded rounded-[10px]">
                        <div class="w-full h-[50px] flex items-center border-b border-b-[1px] border-b-[#ECEEF0]">
                            <p class="ml-[15px] font-[600]">{{ isset($project) ? 'Edit Project' : 'Add Project' }}</p>
                        </div>

                        <div class="w-full h-[290px] p-[15px]" style="overflow-y: auto">
                            <div>
                                <label class="font-[700]">Name</label>
                                <input type="text" name="name" value="{{ $project->name ?? '' }}"
                                    class="mt-[10px] px-[5px] w-full h-[30px] rounded-[5px] border border-[#B8B8B8] focus:outline-none">
                            </div>
                            <div class="mt-[20px]">
                                <label class="font-[700]">Color</label>

                                <input hidden type="text" name="color" id="color-value"
                                    value="{{ $project->color ?? '#B8B8B8' }}">

                                <div id="colorBtn"
                                    class="w-full border border-[1px] border-[#B8B8B8] h-[30px] pl-[7px] pr-[7px] rounded-[5px] focus:outline-none hover:bg-[#D0D3D6] cursor-pointer transition flex items-center">
                                    <div class="w-full flex items-center">
                                        <svg width="13" height="13" viewBox="0 0 100 100"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="50" cy="50" r="50"
                                                fill="{{ $project->color ?? '#B8B8B8' }}" />
                                        </svg>

                                        @php
                                            $colorName = 'Muted Silver';
                                            if (isset($project)) {
                                                $colorName = match ($project->color) {
                                                    '#DC143C' => 'Crimson Red',
                                                    '#FF4500' => 'Sunset Orange',
                                                    '#32CD32' => 'Neon Lime',
                                                    '#50C878' => 'Emerald Green',
                                                    '#008080' => 'Ocean Teal',
                                                    '#87CEEB' => 'Sky Blue',
                                                    '#191970' => 'Midnight Blue',
                                                    '#7851A9' => 'Royal Purple',
                                                    '#673147' => 'Deep Plum',
                                                    '#FFB7C5' => 'Cherry Blossom Pink',
                                                    '#F7E7CE' => 'Champagne Beige',
                                                    '#E97451' => 'Burnt Sienna',
                                                    '#C2B280' => 'Sandstone Brown',
                                                    '#708090' => 'Slate Gray',
                                                    '#B8B8B8' => 'Muted Silver',
                                                    '#36454F' => 'Charcoal Gray',
                                                    '#343434' => 'Jet Black',
                                                    '#FFFFF0' => 'Ivory White',
                                                    '#FFFAFA' => 'Snow White',
                                                    default => 'Custom Color',
                                                };
                                            }
                                        @endphp

                                        <p class="ml-[10px] text-[14px] text-gray-700">{{ $colorName }}</p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="none" viewBox="0 0 18 19" class="arrow-icon">
                                        <path stroke="#8C939F" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="1.5" d="M4.125 6.875 9 11.75l4.875-4.875"></path>
                                    </svg>
                                </div>

                                <div id="color-menu"
                                    class="p-[10px] absolute hidden w-[450px] bg-white rounded-md mt-1  shadow-lg"
                                    style="z-index: 1000;">
                                    <div class="w-full h-[40px] flex items-center px-[10px]"
                                        style="border-bottom: 1.5px solid #ECEEF0">
                                        <p class="text-gray-700">Color</p>
                                    </div>

                                    <div style="overflow-y: auto" class="h-[200px]">
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#DC143C">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#DC143C" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Crimson Red</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#FF4500">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#FF4500" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Sunset Orange</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#32CD32">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#32CD32" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Neon Lime</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#50C878">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#50C878" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Emerald Green</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#008080">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#008080" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Ocean Teal</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#87CEEB">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#87CEEB" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Sky Blue</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#191970">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#191970" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Midnight Blue</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#7851A9">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#7851A9" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Royal Purple</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#673147">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#673147" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Deep Plum</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#FFB7C5">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#FFB7C5" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Cherry Blossom Pink</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#F7E7CE">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#F7E7CE" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Champagne Beige</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#E97451">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#E97451" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Burnt Sienna</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#C2B280">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#C2B280" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Sandstone Brown</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#708090">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#708090" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Slate Gray</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#B8B8B8">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#B8B8B8" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Muted Silver</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#36454F">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#36454F" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Charcoal Gray</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#343434">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#343434" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Jet Black</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#FFFFF0">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#FFFFF0" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Ivory White</p>
                                            </div>
                                        </div>
                                        <div class="color-item px-3 py-2 cursor-pointer hover:bg-gray-200 hover:rounded hover:rounded-[5px]"
                                            data-value="#FFFAFA">
                                            <div class="flex items-center">
                                                <svg width="13" height="13" viewBox="0 0 100 100"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="50" cy="50" r="50" fill="#FFFAFA" />
                                                </svg>
                                                <p class="ml-[10px] text-gray-700">Snow White</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-[40px] flex">
                                <label class="toggle-container" for="toggle">
                                    <input class="toggle-input" type="checkbox" name="favorite" id="toggle"
                                        value="1" {{ isset($project) && $project->favorite ? 'checked' : '' }}>
                                    <span class="toggle-label"></span>
                                </label>
                                <p class="ml-[10px] font-[600]">Add to favorites</p>
                            </div>
                        </div>

                        <div
                            class="w-full flex h-[50px] flex items-center border-t border-t-[1px] border-t-[#ECEEF0]">
                            <div class="w-[100%]"></div>
                            <div class="w-full">
                                <button type="button" id="closeProject"
                                    class="ml-[10px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded rounded-[5px] h-[40px] bg-[#B8B8B8] text-white pr-[10px] pl-[10px]">Cancel</button>
                                <button type="submit"
                                    class="ml-[10px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded rounded-[5px] h-[40px] bg-[#335166] text-white pr-[10px] pl-[10px]">
                                    {{ isset($project) ? 'Update Project' : 'Create Project' }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        {{-- search --}}
        <div id="searchFitur" class="hidden w-full h-[100vh] absolute flex items-center justify-center">

            <div id="showFitur" class="w-[50%] px-[10px] h-[60vh] bg-white rounded-[10px]"
                style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2)">
                <div class="w-full h-[40px] flex items-center px-[10px]" style="border-bottom: 1.5px solid #ECEEF0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#B8B8B8" fill-rule="evenodd"
                            d="M16.29 15.584a7 7 0 1 0-.707.707l3.563 3.563a.5.5 0 0 0 .708-.707l-3.563-3.563ZM11 17a6 6 0 1 0 0-12 6 6 0 0 0 0 12Z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <input type="text" id="fiturShower" placeholder="Search..."
                        class="text-[14px] w-full pl-[5px] focus:outline-none">

                    <button onclick="closeFitur()"
                        class="closeComment ml-[20px] hover:bg-[#F5F5F5] rounded rounded-[5px] cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                            <path fill="#374151"
                                d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                            </path>
                        </svg>
                    </button>
                    <script>
                        const searchButton = document.getElementById('search');
                        const searchFeature = document.getElementById('searchFitur');
                        const closeButton = document.getElementById('closeFitur');

                        searchButton.addEventListener('click', function(e) {
                            e.stopPropagation();
                            searchFeature.classList.remove('hidden');
                        });

                        closeButton.addEventListener('click', closeFitur);

                        document.addEventListener('click', function(e) {
                            if (!searchFeature.contains(e.target) && e.target !== searchButton) {
                                closeFitur();
                            }
                        });

                        searchFeature.addEventListener('click', function(e) {
                            e.stopPropagation();
                        });

                        function closeFitur() {
                            const fitur = document.getElementById('searchFitur');
                            if (!fitur.classList.contains('hidden')) {
                                fitur.classList.add('hidden');
                            }
                        }
                    </script>

                </div>

                <div class="px-[10px] w-full h-[52vh]" style="overflow-y: auto">
                    <p class="text-[14px] text-gray-500 mt-[5px]">Navigation</p>

                    <div class="pb-[10px]" style="border-bottom: 1.5px solid #ECEEF0">
                        <a href="{{ route('themes.default.today') }}">
                            <div
                                class="navItem hover:bg-gray-300 mt-[5px]  mt-[10px] px-[5px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="gray" stroke-width="1"
                                    stroke-linecap="round" stroke-linejoin="round">

                                    <path d="M3 10L12 3L21 10" />

                                    <rect x="6" y="10" width="12" height="10" />

                                    <path d="M10 20V14H14V20" />
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Go To Home</p>
                            </div>
                        </a>

                        <a href="{{ route('themes.default.inbox') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px]  mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M8.062 4h7.876a2 2 0 0 1 1.94 1.515l2.062 8.246c.04.159.06.322.06.486V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3.754a2 2 0 0 1 .06-.485L6.12 5.515A2 2 0 0 1 8.061 4Zm0 1a1 1 0 0 0-.97.758L5.03 14.004a1 1 0 0 0-.03.242V18a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.754a.997.997 0 0 0-.03-.242L16.91 5.758a1 1 0 0 0-.97-.758H8.061Zm6.643 10a2.75 2.75 0 0 1-5.41 0H7a.5.5 0 1 1 0-1h2.75a.5.5 0 0 1 .5.5 1.75 1.75 0 1 0 3.5 0 .5.5 0 0 1 .5-.5H17a.5.5 0 0 1 0 1h-2.295Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Go To Inbox</p>
                            </div>
                        </a>

                        <a href="{{ route('themes.default.upcoming') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px]  mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M18 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2ZM6.5 8.5A.5.5 0 0 1 7 8h10a.5.5 0 0 1 0 1H7a.5.5 0 0 1-.5-.5ZM16 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-7 3a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm4 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm-3-5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-5 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Go To Upcoming</p>
                            </div>
                        </a>
                        <a href="{{ route('themes.default.completed') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px] mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M12 21.001a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0-1a8 8 0 1 1 0-16 8 8 0 0 1 0 16Zm-4.354-8.104a.5.5 0 0 1 .708 0l2.146 2.147 5.146-5.147a.5.5 0 0 1 .708.708l-5.5 5.5a.5.5 0 0 1-.708 0l-2.5-2.5a.5.5 0 0 1 0-.708Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Go To Completed</p>
                            </div>
                        </a>
                    </div>


                    {{-- account --}}
                    <p class="text-[14px] text-gray-500 mt-[5px]">Account</p>

                    <div class="pb-[10px]" style="border-bottom: 1.5px solid #ECEEF0">
                        <a href="{{ route('inbox.themes.default.settings.account') }}">
                            <div
                                class="navItem hover:bg-gray-300 mt-[5px]  mt-[10px] px-[5px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" aria-hidden="true">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M3 12a8.96 8.96 0 0 0 1.778 5.372A8.987 8.987 0 0 0 12 21a8.981 8.981 0 0 0 7.222-3.628A9 9 0 1 0 3 12zm9 3c2.747 0 5.259.472 6.562 1.577a8 8 0 1 0-13.124 0C6.74 15.472 9.253 15 12 15zm5.94 2.36A7.98 7.98 0 0 1 12 20a7.98 7.98 0 0 1-5.94-2.64C7.022 16.518 9.18 16 12 16c2.82 0 4.978.519 5.94 1.36zM12 14a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm2.75-3.75a2.75 2.75 0 1 1-5.5 0 2.75 2.75 0 0 1 5.5 0z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Account Settings</p>
                            </div>
                        </a>

                        <a href="{{ route('inbox.themes.default.settings.password') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px]  mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg width="24" height="24" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" stroke="gray"
                                    stroke-width="1">

                                    <circle cx="7" cy="12" r="4" />

                                    <circle cx="7" cy="12" r="1.5" stroke-width="1.5" />

                                    <line x1="11" y1="12" x2="19" y2="12" />

                                    <line x1="19" y1="12" x2="19" y2="14" />
                                    <line x1="20" y1="12" x2="20" y2="13.5" />
                                    <line x1="21" y1="12" x2="21" y2="14" />
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Password Settings</p>
                            </div>
                        </a>

                        <a href="{{ route('inbox.themes.default.settings.password') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px]  mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" aria-hidden="true">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M3 12a8.96 8.96 0 0 0 1.778 5.372A8.987 8.987 0 0 0 12 21a8.981 8.981 0 0 0 7.222-3.628A9 9 0 1 0 3 12zm9 3c2.747 0 5.259.472 6.562 1.577a8 8 0 1 0-13.124 0C6.74 15.472 9.253 15 12 15zm5.94 2.36A7.98 7.98 0 0 1 12 20a7.98 7.98 0 0 1-5.94-2.64C7.022 16.518 9.18 16 12 16c2.82 0 4.978.519 5.94 1.36zM12 14a3.75 3.75 0 1 1 0-7.5 3.75 3.75 0 0 1 0 7.5zm2.75-3.75a2.75 2.75 0 1 1-5.5 0 2.75 2.75 0 0 1 5.5 0z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Email Settings</p>
                            </div>
                        </a>
                        <a href="{{ route('inbox.themes.default.settings.theme') }}">
                            <div
                                class="navItem hover:bg-gray-300 px-[5px] mt-[10px] h-[30px] flex items-center rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill="gray" fill-rule="evenodd"
                                        d="M13.5 18.75C14 19.875 14.5 21 16 21c3 0 5-4 5-9s-4.03-9-9-9a9 9 0 0 0-9 9c0 7.418 2.751 6.307 5.397 5.238.92-.371 1.828-.738 2.603-.738 1.5 0 2 1.125 2.5 2.25ZM20 12c0 4.664-1.796 8-4 8-.716 0-.985-.303-1.586-1.656-.899-2.022-1.63-2.844-3.414-2.844-.835 0-1.459.198-3.017.827l-.252.102c-1.478.59-2.188.714-2.622.453C4.453 16.49 4 15 4 12a8 8 0 0 1 8-8c4.429 0 8 3.563 8 8Zm-2 3.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm-.5-3a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM16.75 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM12 7.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2ZM9.25 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6.5 12.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="ml-[10px] text-[14px] text-gray-500">Theme Settings</p>
                            </div>
                        </a>
                    </div>
                    <div id="searchResults" class="mt-[10px]">

                    </div>


                </div>
            </div>

        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const searchInput = document.querySelector("#showFitur input");
                const projectItems = document.querySelectorAll(".navItem");

                searchInput.addEventListener("input", function() {
                    const searchText = searchInput.value.toLowerCase();

                    projectItems.forEach(item => {
                        const text = item.innerText.toLowerCase();


                        if (text.includes(searchText)) {
                            item.classList.remove("hidden");
                        } else {
                            item.classList.add("hidden");
                        }
                    });
                });
            });
        </script>



        <script>
            const searchButton = document.getElementById('search');
            const searchFeature = document.getElementById('searchFitur');


            searchButton.addEventListener('click', function(e) {
                e.stopPropagation();
                searchFeature.classList.toggle('hidden');
            });


            document.addEventListener('click', function() {
                if (!searchFeature.classList.contains('hidden')) {
                    searchFeature.classList.add('hidden');
                }
            });

            searchFeature.addEventListener('click', function(e) {
                e.stopPropagation();
            });
        </script>




        <div id="commentShow"class="absolute w-full h-[100vh] bg-black/50 hidden">

            <div class="w-full h-[100vh] flex items-center justify-center">
                <form id="commentForm" method="POST">
                    @csrf
                    <div class="w-[480px] h-[300px] bg-white rounded rounded-[10px]">
                        <div class="w-full h-[50px] flex items-center border-b border-b-[1px] border-b-[#ECEEF0]">
                            <p class="ml-[15px] font-[600]">Add Comment</p>
                        </div>

                        <div class="w-full h-[200px] p-[15px]" style="overflow-y: auto">
                            <div>
                                <label class="font-[700]">Comment</label>
                                <textarea name="content" class="px-[5px] w-full h-[100px] border border-[1px] rounded-[5px]"></textarea>
                            </div>

                        </div>

                        <div
                            class="w-full flex h-[50px] flex items-center border-t border-t-[1px] border-t-[#ECEEF0]">
                            <div class="w-[100%]"></div>
                            <div class="w-full">
                                <button type="button" id="closeComment"
                                    class="ml-[10px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded rounded-[5px] h-[40px] bg-[#B8B8B8] text-white pr-[10px] pl-[10px]">Cancel</button>
                                <button type="submit"
                                    class="ml-[10px] cursor-pointer hover:bg-[#FFFFFF] hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166] transition duration-300 w-auto rounded rounded-[5px] h-[40px] bg-[#335166] text-white pr-[10px] pl-[10px]">Add
                                    Comment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>




        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const komenBtns = document.querySelectorAll('.showComment');
                const closeBtns = document.querySelectorAll('.closeComment');

                komenBtns.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const id = btn.getAttribute('data-id');
                        const commentBox = document.getElementById('commentShow-' + id);
                        if (commentBox) {
                            commentBox.classList.remove('hidden');
                        }
                    });
                });

                closeBtns.forEach(function(btn) {
                    btn.addEventListener('click', function() {
                        const id = btn.getAttribute('data-id');
                        const commentBox = document.getElementById('commentShow-' + id);
                        if (commentBox) {
                            commentBox.classList.add('hidden');
                        }
                    });
                });
            });
        </script>

        {{-- setting --}}



        @yield('settings')
        @yield('team')





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




        <script>
            setTimeout(() => {
                document.getElementById('success-message').classList.add('opacity-0')
            }, 3000);
        </script>



        {{-- <div style="display: block" class="w-full h-auto absolute ">
            <div style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2)"
                class="bg-white w-[550px] h-auto mt-[5%]  p-[15px] rounded rounded-[10px]">
                <input name="" type="text" class="w-full text-[20px] focus:outline-none font-[600]"
                    placeholder="Task Name">
                <textarea name="" class="w-full min-h-[20px] text-[13px] resize-none focus:outline-none"
                    oninput="autoResize(this)" placeholder="Description"></textarea>


                <div class="w-full">
                    <button
                        class="w-auto h-[28px] border border-[1px] border-[#B8B8B8B8] text-[13px] pr-[10px] pl-[10px] rounded rounded-[5px] flex items-center">

                        <div class="w-auto h-[20px] flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                viewBox="0 0 16 16" class="date_today" aria-hidden="true">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M12 2H4a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2ZM3 12V6h10v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8.5-1.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                    clip-rule="evenodd"></path>
                            </svg>

                            <span class="ml-[5px] text-[12px]">Date</span>

                            <div class="ml-[10px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"
                                    viewBox="0 0 16 16">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M11.854 11.854a.5.5 0 0 0 0-.707L8.707 8l3.147-3.146a.5.5 0 0 0-.708-.707L8 7.293 4.854 4.147a.5.5 0 1 0-.708.707L7.293 8l-3.147 3.147a.5.5 0 1 0 .708.707L8 8.708l3.146 3.146a.5.5 0 0 0 .708 0Z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </div>

                    </button>
                </div>
            </div>
        </div> --}}
    </div>


    </div>




    {{-- ini adalah main

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form> --}}





    @if (is_null($user->email_verified_at))
        <div class="flex justify-center items-center absolute w-full h-[100vh] bg-black/50 top-0">
            <div class="w-[480px] rounded rounded-[10px] h-auto pb-[30px] bg-white">
                <div class="w-full flex justify-center">
                    <div style="object-fit: cover;" class="w-[322px] h-[149px]">
                        <img class="w-[322px] h-[149px]"
                            src="https://d3ptyyxy2at9ui.cloudfront.net/assets/images/9a56884d5c672a7a902bf8abff5d0710.png 2x, https://d3ptyyxy2at9ui.cloudfront.net/assets/images/36920b2c8a1770f7c49d891a7594201a.png 3x"
                            srcset="https://d3ptyyxy2at9ui.cloudfront.net/assets/images/9a56884d5c672a7a902bf8abff5d0710.png 2x, https://d3ptyyxy2at9ui.cloudfront.net/assets/images/36920b2c8a1770f7c49d891a7594201a.png 3x"
                            alt="">
                    </div>
                </div>

                <div class="pl-[30px] pr-[30px]">
                    <p class="font-[700]">Please verify your account</p>
                    <p class=" text-[14px] mt-[10px] ">To start using DoneBang, please click the link we sent to your
                        email: <b>{{ $user->email }}</b>.</p>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit"><u class="text-[14px] cursor-pointer hover:text-[#335166]">Change
                                Account</u></button>
                    </form>

                    <div class="w-full flex justify-center mt-[50px]">
                        <a href="{{ route('send.test.email') }}">
                            <button
                                class="transition w-[200px] h-[40px] bg-[#335166] text-white cursor-pointer rounded rounded-[10px] hover:bg-white hover:border hover:border-[1px] hover:border-[#335166] hover:text-[#335166]">Resend
                                Email</button>

                        </a>


                    </div>

                    <p class="mt-[30px] text-[12px]">Check your spam folder if it doesn’t show up!</p>
                </div>

            </div>
        </div>
    @endif
</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dateBtn = document.getElementById("date-btn");
        const selectedDate = document.getElementById("selected-date");
        const dateInput = document.getElementById("date-input");


        flatpickr(dateInput, {
            enableTime: false,
            dateFormat: "Y-m-d",
            appendTo: document.getElementById("datepicker-container"),
            position: "below",
            locale: {
                firstDayOfWeek: 1,
                weekdays: {
                    shorthand: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
                    longhand: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]
                },
                months: {
                    shorthand: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt",
                        "Nov", "Des"
                    ],
                    longhand: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
                        "Agustus", "September", "Oktober", "November", "Desember"
                    ]
                }
            },
            onChange: function(selectedDates, dateStr) {
                let date = new Date(dateStr);
                let formattedDate =
                    `${date.getDate()} ${getMonthName(date.getMonth())} ${date.getFullYear()}`;
                selectedDate.textContent = formattedDate;
                dateInput.value = dateStr;
            }
        });


        function getMonthName(monthIndex) {
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                "September", "Oktober", "November", "Desember"
            ];
            return months[monthIndex];
        }


        dateBtn.addEventListener("click", function() {
            dateInput._flatpickr.open();
        });
    });
</script>

<script>
    flatpickr("#timepicker", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const colorBtn = document.getElementById("colorBtn");
        const colorMenu = document.getElementById("color-menu");
        const colorItems = document.querySelectorAll(".color-item");
        const colorText = colorBtn.querySelector("p");
        const colorInput = document.getElementById("color-value");
        const colorIcon = colorBtn.querySelector("svg circle");


        colorBtn.addEventListener("click", function(event) {
            event.stopPropagation();
            colorMenu.classList.toggle("hidden");
        });


        colorItems.forEach(item => {
            item.addEventListener("click", function() {
                const selectedColor = this.getAttribute("data-value");
                const selectedText = this.querySelector("p").textContent;


                colorText.textContent = selectedText;
                colorIcon.setAttribute("fill", selectedColor);
                colorInput.value = selectedColor;


                colorMenu.classList.add("hidden");
            });
        });


        document.addEventListener("click", function(event) {
            if (!colorBtn.contains(event.target) && !colorMenu.contains(event.target)) {
                colorMenu.classList.add("hidden");
            }
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ComButtons = document.querySelectorAll('.addComment');
        const commentFormWrapper = document.getElementById('commentShow');
        const closeButton = document.getElementById('closeComment');
        const commentForm = document.getElementById('commentForm');


        ComButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const taskId = this.getAttribute('data-id');
                commentForm.setAttribute('action', `/app/inbox/${taskId}/comment`);
                commentFormWrapper.classList.remove('hidden');
            });
        });


        if (closeButton) {
            closeButton.addEventListener('click', function() {
                commentFormWrapper.classList.add('hidden');
            });
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const projectShower = document.getElementById("project-shower");
        const projectMenu = document.getElementById("show-project-menu");
        const projectItems = document.querySelectorAll(".project-item");

        projectShower.addEventListener("click", function(event) {
            event.stopPropagation();
            projectMenu.classList.toggle("hidden");
        });

        projectItems.forEach(item => {
            item.addEventListener("click", function() {
                const selectedText = this.querySelector("p").textContent;
                projectShower.textContent = selectedText;
                projectMenu.classList.add("hidden");
            });
        });

        document.addEventListener("click", function(event) {
            if (!projectShower.contains(event.target) && !projectMenu.contains(event.target)) {
                projectMenu.classList.add("hidden");
            }
        });
    });


    document.addEventListener("DOMContentLoaded", function() {
        const dropdownItems = document.querySelectorAll(".project-item");

        dropdownItems.forEach(item => {
            item.addEventListener("click", function() {
                const selectedValue = this.getAttribute("data-value");


                window.location.href = `?category_id=${selectedValue}`;
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const projectShower = document.getElementById("project-shower");

        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        const categoryId = getQueryParam("category_id");

        if (categoryId === null || categoryId === "all") {
            projectShower.value = "All Project";
        } else if (categoryId === "notnull") {
            projectShower.value = "All Project";
        } else if (categoryId === "null") {
            projectShower.value = "Inbox";
        } else {
            const selectedItem = document.querySelector(`.project-item[data-value="${categoryId}"]`);
            if (selectedItem) {
                projectShower.value = selectedItem.querySelector("p").textContent;
            } else {
                projectShower.value = "Unknown Category";
            }
        }
    });
</script>




<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.querySelector("#show-project-menu input");
        const projectItems = document.querySelectorAll(".project-item");

        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.toLowerCase();

            projectItems.forEach(item => {
                const text = item.innerText.toLowerCase();


                if (text.includes(searchText)) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchInput = document.querySelector("#searcher input");
        const projectItems = document.querySelectorAll(".dropdown-item");

        searchInput.addEventListener("input", function() {
            const searchText = searchInput.value.toLowerCase();

            projectItems.forEach(item => {
                const text = item.innerText.toLowerCase();


                if (text.includes(searchText)) {
                    item.classList.remove("hidden");
                } else {
                    item.classList.add("hidden");
                }
            });
        });
    });
</script>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        const priorityBtn = document.getElementById("priorityBtn");
        const priorityMenu = document.getElementById("priority-menu");
        const priorityItems = document.querySelectorAll(".priority-item");
        const priorityText = priorityBtn.querySelector("p");
        const priorityInput = document.getElementById("priority-value");
        const priorityIcon = priorityBtn.querySelector("svg path");

        const priorityColors = {
            "1": "#D84040",
            "2": "#FFA725",
            "3": "#205781",
            "4": "#8C939F"
        };


        priorityBtn.addEventListener("click", function(event) {
            event.stopPropagation();
            priorityMenu.classList.toggle("hidden");
        });


        priorityItems.forEach(item => {
            item.addEventListener("click", function() {
                const selectedText = this.querySelector("p").textContent;
                const selectedValue = selectedText.replace("Priority ", "").trim();
                priorityText.textContent = selectedText;
                priorityInput.value = selectedValue;

                if (priorityIcon && priorityColors[selectedValue]) {
                    priorityIcon.setAttribute("fill", priorityColors[selectedValue]);
                }
                priorityMenu.classList.add("hidden");
            });
        });


        document.addEventListener("click", function(event) {
            if (!priorityBtn.contains(event.target) && !priorityMenu.contains(event.target)) {
                priorityMenu.classList.add("hidden");
            }
        });
    });
</script>


<script>
    var more = document.getElementById('proMore')
    var button = document.getElementById('profile')

    button.addEventListener('click', function() {
        event.stopPropagation();
        if (more.style.display === 'none') {
            more.style.display = 'block'
        } else {
            more.style.display = 'none'
        }

    })

    document.addEventListener('click', function(event) {
        if (!more.contains(event.target) && !button.contains(event.target)) {
            more.style.display = 'none';
        }
    });
</script>

<script>
    function setupHover(triggerId, targetId, delay) {
        let timeout;
        const trigger = document.getElementById(triggerId);
        const target = document.getElementById(targetId);

        function showTarget() {
            clearTimeout(timeout);
            target.style.display = 'block';
        }

        function hideTarget() {
            timeout = setTimeout(() => {
                target.style.display = 'none';
            }, delay);
        }

        trigger.addEventListener('mouseover', showTarget);
        target.addEventListener('mouseover', showTarget);

        trigger.addEventListener('mouseleave', hideTarget);
        target.addEventListener('mouseleave', hideTarget);
    }

    setupHover('addtask', 'hidden-add', 0);
    setupHover('search', 'hidden-search', 0);
    setupHover('today', 'hidden-today', 0);
    setupHover('inbox', 'hidden-inbox', 0);
    setupHover('upcoming', 'hidden-upcoming', 0);
    setupHover('complet', 'hidden-complet', 0);
    setupHover('profile', 'hidden-goals', 0);
    setupHover('team', 'hidden-team', 0);
</script>

<script>
    function autoResize(textarea) {
        textarea.style.height = 'auto'
        textarea.style.height = textarea.scrollHeight + 'px'
    }
</script>


<script>
    var add = document.getElementById('showAddTask')
    var close = document.getElementById('closeAdd')

    document.querySelectorAll('.addtask').forEach(element => {
        element.addEventListener('click', function() {
            add.style.display = 'block'
        })
    })

    close.addEventListener('click', function() {
        add.style.display = 'none'
    })
</script>

<script>
    var addBtnPro = document.querySelectorAll('.shower-add-project')
    var shower = document.getElementById('addProject')
    var closeShow = document.getElementById('closeProject')


    addBtnPro.forEach(function(btn) {
        btn.addEventListener('click', function() {
            shower.classList.remove('hidden')
        })
    })

    closeShow.addEventListener('click', function() {
        shower.classList.add('hidden')
    })
</script>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const dropdownBtn = document.getElementById("dropdown-btn");
        const dropdownMenu = document.getElementById("dropdown-menu");
        const selectedCategory = document.getElementById("selected-category");
        const selectedCategoryDummy = document.getElementById("selected-dummy");
        const categoryInput = document.getElementById("category-input");


        dropdownBtn.addEventListener("click", function() {
            dropdownMenu.classList.toggle("hidden");
        });


        document.querySelectorAll(".dropdown-item").forEach(item => {
            item.addEventListener("click", function() {
                const value = this.getAttribute("data-value");
                selectedCategory.textContent = this.textContent;
                selectedCategoryDummy.classList.add('hidden');
                categoryInput.value = value;
                dropdownMenu.classList.add("hidden");
            });
        });


        document.addEventListener("click", function(event) {
            if (!dropdownBtn.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    });
</script>


<script>
    function toggleCheckbox() {
        let hiddenInput = document.getElementById('hiddenCheckbox');
        let checkmark = document.querySelector('.checkmark');

        if (hiddenInput.value === "0") {
            hiddenInput.value = "1";
            checkmark.classList.remove("hidden");
        } else {
            hiddenInput.value = "0";
            checkmark.classList.add("hidden");
        }
    }
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const taskMoreButtons = document.querySelectorAll(".TaskMore");
        const popups = document.querySelectorAll(".taskMoreShow");

        taskMoreButtons.forEach((btn, index) => {
            const popup = popups[index];

            btn.addEventListener("mouseenter", function(e) {
                const rect = btn.getBoundingClientRect();
                const mouseX = rect.left + rect.width / 2;
                const mouseY = rect.bottom;


                popups.forEach(p => p.classList.add("hidden"));


                popup.style.left = `${mouseX - 210}px`;
                popup.style.top = `${mouseY  -100}px`;

                popup.classList.remove("hidden");
            });

            btn.addEventListener("mouseleave", function() {
                setTimeout(() => {
                    if (!popup.matches(':hover')) {
                        popup.classList.add("hidden");
                    }
                }, 100);
            });

            popup.addEventListener("mouseleave", function() {
                popup.classList.add("hidden");
            });
        });
    });
</script>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        const container = document.getElementById("drag-container");
        let draggedItem = null;

        document.querySelectorAll(".draggable-item").forEach(item => {
            item.addEventListener("dragstart", function(e) {
                draggedItem = this;
                e.dataTransfer.effectAllowed = "move";
                e.dataTransfer.setData("text/plain", this.dataset.id);
                this.classList.add("opacity-50");
            });

            item.addEventListener("dragover", function(e) {
                e.preventDefault();
                const hovering = e.target.closest(".draggable-item");
                if (hovering && hovering !== draggedItem) {
                    const rect = hovering.getBoundingClientRect();
                    const offset = e.clientY - rect.top;
                    if (offset > rect.height / 2) {
                        hovering.after(draggedItem);
                    } else {
                        hovering.before(draggedItem);
                    }
                }
            });

            item.addEventListener("dragend", function() {
                this.classList.remove("opacity-50");
                updateOrder();
            });
        });

        function updateOrder() {
            let order = [];
            document.querySelectorAll(".draggable-item").forEach((item, index) => {
                order.push({
                    id: item.dataset.id,
                    position: index + 1
                });
            });

            fetch("{{ route('update.task.order') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        order: order
                    })
                }).then(response => response.json())
                .then(data => console.log("Order updated:", data))
                .catch(error => console.error("Error updating order:", error));
        }
    });
</script>



{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".draggable-item").forEach((item) => {
        item.addEventListener("dragend", function () {
            const taskId = this.getAttribute("data-id");

            fetch(`/update-task-date/${taskId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                },
                body: JSON.stringify({
                    date: new Date().toISOString().split("T")[0], 
                }),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        console.log("Tanggal task diperbarui ke hari ini!");
                    }
                })
                .catch((error) => console.error("Error:", error));
        });
    });
});

</script> --}}

<script>
    document.addEventListener("DOMContentLoaded", function() {

        document.querySelectorAll('.edit-task').forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                const taskId = this.getAttribute('data-id');


                fetch(`/task/${taskId}/edit`)
                    .then(response => response.json())
                    .then(task => {

                        document.querySelector('input[name="task_name"]').value = task
                            .task_name;
                        document.querySelector('textarea[name="description"]').value = task
                            .description;


                        if (task.category_id) {
                            document.getElementById('category-input').value = task
                                .category_id;
                            const categoryName = task.category ? task.category.name :
                                'Inbox';
                            document.getElementById('selected-dummy').textContent =
                                categoryName;
                        }


                        if (task.date) {
                            document.getElementById('date-input').value = task.date;
                            const date = new Date(task.date);
                            const formattedDate =
                                `${date.getDate()} ${getMonthName(date.getMonth())} ${date.getFullYear()}`;
                            document.getElementById('selected-date').textContent =
                                formattedDate;
                        }


                        if (task.priority) {
                            document.getElementById('priority-value').value = task.priority;
                            document.querySelector('#priorityBtn p').textContent =
                                `Priority ${task.priority}`;
                        }


                        if (task.time) {
                            document.getElementById('timepicker').value = task.time;
                        }


                        const form = document.querySelector('#showAddTask form');
                        form.action = `/task/${taskId}/update`;


                        document.getElementById('showAddTask').style.display = 'block';
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        function getMonthName(monthIndex) {
            const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus",
                "September", "Oktober", "November", "Desember"
            ];
            return months[monthIndex];
        }
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll('.edit-task').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const taskId = this.getAttribute('data-id');

                fetch(`/task/${taskId}/edit`)
                    .then(response => response.json())
                    .then(task => {
                        const form = document.querySelector('#showAddTask form');
                        form.action = `/task/${taskId}/update`;
                        form.method = "POST";


                        let methodInput = form.querySelector('input[name="_method"]');
                        if (!methodInput) {
                            methodInput = document.createElement('input');
                            methodInput.type = 'hidden';
                            methodInput.name = '_method';
                            form.appendChild(methodInput);
                        }
                        methodInput.value = 'PUT';

                        document.querySelector('input[name="task_name"]').value = task
                            .task_name || '';
                        document.querySelector('textarea[name="description"]').value = task
                            .description || '';
                        document.querySelector('input[name="category_id"]').value = task
                            .category_id || '';
                        document.querySelector('input[name="date"]').value = task.date ||
                            '';
                        document.querySelector('input[name="priority"]').value = task
                            .priority || '';
                        document.querySelector('input[name="time"]').value = task.time ||
                            '';

                        // document.querySelector('.form-title').innerText = 'Edit Task';
                        // document.querySelector('.submit-btn').innerText = 'Update Task';


                        document.getElementById('showAddTask').style.display = 'block';
                    })
                    .catch(error => console.error('Error:', error));
            });
        });

        const createBtn = document.querySelector('#create-task-button');
        if (createBtn) {
            createBtn.addEventListener('click', function() {
                const form = document.querySelector('#showAddTask form');
                form.action = '/app/inbox/store';
                form.method = 'POST';

                const methodInput = form.querySelector('input[name="_method"]');
                if (methodInput) {
                    methodInput.remove();
                }

                form.reset();

                // document.querySelector('.form-title').innerText = 'Create Task';
                // document.querySelector('.submit-btn').innerText = 'Create Task';

                document.getElementById('showAddTask').style.display = 'block';
            });
        }
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const inboxStoreProjectUrl = "{{ route('inbox.store.project') }}";

        document.querySelectorAll('.shower-add-project').forEach(button => {
            button.addEventListener('click', function() {
                const projectId = this.getAttribute('data-id');
                const form = document.querySelector('#addProject form');


                let methodInput = form.querySelector('input[name="_method"]');
                if (!methodInput) {
                    methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    form.appendChild(methodInput);
                }

                if (projectId) {

                    methodInput.value = 'PUT';
                    form.action = `/project/${projectId}/update`;

                    fetch(`/project/${projectId}/edit`)
                        .then(response => response.json())
                        .then(project => {
                            form.querySelector('input[name="name"]').value = project.name;
                            form.querySelector('input[name="color"]').value = project.color;
                            form.querySelector('input[name="favorite"]').checked = project
                                .favorite == 1;

                            const colorBtn = document.getElementById('colorBtn');
                            colorBtn.querySelector('circle').setAttribute('fill', project
                                .color);
                            colorBtn.querySelector('p').textContent = getColorName(project
                                .color);

                            document.getElementById('addProject').classList.remove(
                                'hidden');
                        })
                        .catch(error => console.error('Error:', error));
                } else {

                    methodInput.value = 'POST';
                    form.action = inboxStoreProjectUrl;
                    form.querySelector('input[name="name"]').value = '';
                    form.querySelector('input[name="color"]').value = '#B8B8B8';
                    form.querySelector('input[name="favorite"]').checked = false;

                    const colorBtn = document.getElementById('colorBtn');
                    colorBtn.querySelector('circle').setAttribute('fill', '#B8B8B8');
                    colorBtn.querySelector('p').textContent = 'Muted Silver';

                    document.getElementById('addProject').classList.remove('hidden');
                }
            });
        });

        function getColorName(color) {
            const colors = {
                '#DC143C': 'Crimson Red',
                '#FF4500': 'Sunset Orange',
                '#32CD32': 'Neon Lime',
                '#50C878': 'Emerald Green',
                '#008080': 'Ocean Teal',
                '#87CEEB': 'Sky Blue',
                '#191970': 'Midnight Blue',
                '#7851A9': 'Royal Purple',
                '#673147': 'Deep Plum',
                '#FFB7C5': 'Cherry Blossom Pink',
                '#F7E7CE': 'Champagne Beige',
                '#E97451': 'Burnt Sienna',
                '#C2B280': 'Sandstone Brown',
                '#708090': 'Slate Gray',
                '#B8B8B8': 'Muted Silver',
                '#36454F': 'Charcoal Gray',
                '#343434': 'Jet Black',
                '#FFFFF0': 'Ivory White',
                '#FFFAFA': 'Snow White'
            };
            return colors[color] || 'Custom Color';
        }
    });
</script>
<script>
    function copyProjectLink(projectId) {
        const projectUrl = `${window.location.origin}/app/project/${projectId}`;


        const tempInput = document.createElement('input');
        tempInput.value = projectUrl;
        document.body.appendChild(tempInput);


        tempInput.select();
        document.execCommand('copy');


        document.body.removeChild(tempInput);


        const successMessage = document.createElement('div');
        successMessage.id = 'success-message';
        successMessage.className =
            'bg-[#282828] rounded-[10px] flex items-center px-[10px] absolute w-auto h-[50px] bottom-[30px] left-[20px]';


        const messageText = document.createElement('p');
        messageText.className = 'text-[14px] text-white';
        messageText.textContent = 'Project link copied to clipboard!';


        const closeButton = document.createElement('button');
        closeButton.className = 'ml-[20px] bg-[#282828] hover:bg-[#303030] rounded-[5px] cursor-pointer';
        closeButton.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                <path fill="#ffffff" d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z"></path>
            </svg>
        `;


        closeButton.addEventListener('click', () => {
            document.body.removeChild(successMessage);
        });


        successMessage.appendChild(messageText);
        successMessage.appendChild(closeButton);


        document.body.appendChild(successMessage);


        setTimeout(() => {
            if (document.body.contains(successMessage)) {
                document.body.removeChild(successMessage);
            }
        }, 5000);
    }
</script>


<script>
    function showSuccessMessage(message) {
        const container = document.createElement('div');
        container.className =
            'bg-[#282828] rounded rounded-[10px] flex items-center px-[10px] absolute w-auto h-[50px] bottom-[30px] left-[20px] z-[9999]';

        const text = document.createElement('p');
        text.className = 'text-[14px] text-white';
        text.innerText = message;

        const closeBtn = document.createElement('button');
        closeBtn.className = 'ml-[20px] bg-[#282828] hover:bg-[#303030] rounded rounded-[5px] cursor-pointer';

        closeBtn.innerHTML = `
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                <path fill="#ffffff"
                    d="M5.146 5.146a.5.5 0 0 1 .708 0L12 11.293l6.146-6.147a.5.5 0 0 1 .638-.057l.07.057a.5.5 0 0 1 0 .708L12.707 12l6.147 6.146a.5.5 0 0 1 .057.638l-.057.07a.5.5 0 0 1-.708 0L12 12.707l-6.146 6.147a.5.5 0 0 1-.638.057l-.07-.057a.5.5 0 0 1 0-.708L11.293 12 5.146 5.854a.5.5 0 0 1-.057-.638z">
                </path>
            </svg>
        `;

        closeBtn.addEventListener('click', () => {
            container.remove();
        });

        container.appendChild(text);
        container.appendChild(closeBtn);
        document.body.appendChild(container);

        setTimeout(() => {
            container.remove();
        }, 3000);
    }

    function moveCategory(categoryId, position) {
        let url = (position === 'above') ?
            `/category/${categoryId}/add-above` :
            `/category/${categoryId}/add-below`;

        fetch(url, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    category_id: categoryId
                })
            })
            .then(response => response.json())
            .then(data => {
                showSuccessMessage(data.message); // Ganti alert

                let categoryElement = document.querySelector(`a[data-id='${data.categoryId}']`);
                let categories = document.querySelectorAll('a[data-id]');
                let nextCategoryElement = null;

                categories.forEach(function(item) {
                    if (parseInt(item.dataset.order) > data.categoryOrder) {
                        nextCategoryElement = item;
                    }
                });

                if (nextCategoryElement) {
                    nextCategoryElement.parentNode.insertBefore(categoryElement, nextCategoryElement);
                } else {
                    nextCategoryElement = categories[categories.length - 1];
                    nextCategoryElement.parentNode.appendChild(categoryElement);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showSuccessMessage('An error occurred while moving the category.');
            });
    }
</script>
