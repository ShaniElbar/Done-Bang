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
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<body>


    <div class="flex w-full h-auto">
        <div class="w-[22%] h-[100vh] bg-[#335166] p-[15px] text-[#FFFFFF]">
            <div class="w-full h-[33px] flex items-center rounded rounded-[5px] text-[#202020]">


                <div id="profile"
                    class="transition rounded rounded-[6px] flex items-center pr-[10px] h-[33px] cursor-pointer hover:bg-[#3F6780]">
                    <img class="w-[29px] ml-[5px] h-[29px] rounded rounded-[50%]"
                        src="{{ asset('storage/' . $user->photo) }}" alt="Gambar Produk">

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
                    class="transition cursor-pointer hover:bg-[#3F6780] w-[32px] h-[32px] rounded rounded-[6px] ml-[15px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                        viewBox="0 0 24 24">
                        <path fill="#FFFFFF" fill-rule="evenodd"
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
                    <div id="hidden-add"
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
                    <div style="display: none" id="hidden-search"
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
                        <div style="display: none" id="hidden-today"
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
                        <div style="display: none" id="hidden-inbox"
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
                        <div style="display: none" id="hidden-upcoming"
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
                        <div style="display: none" id="hidden-complet"
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

                            <div onclick="event.preventDefault(); document.getElementById('delete-project-{{ $item->id }}').submit();"
                                class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    stroke="red" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                                    viewBox="0 0 24 24">
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


                        </div>

                    </div>
                @endforeach









            </div>








        </div>

        {{-- edit --}}





        {{-- part2 --}}

        <div id="comments" class="absolute w-full h-[100vh] bg-black/50 flex items-center justify-center">
            <div class="w-[65%] h-[80vh] bg-white rounded-[15px]">
                <div class="w-full h-[50px] border-b-[2px] border-[#ECEEF0] flex items-center   ">
                    <div class="ml-[20px] w-[90%] flex items-center">
                        @if ($task->category)
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24" class="" style="color: var(--named-color-charcoal);">
                                <path fill="{{ $task->category->color }}" fill-rule="evenodd"
                                    d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="#374151" fill-rule="evenodd"
                                    d="M8.062 4h7.876a2 2 0 0 1 1.94 1.515l2.062 8.246c.04.159.06.322.06.486V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3.754a2 2 0 0 1 .06-.485L6.12 5.515A2 2 0 0 1 8.061 4Zm0 1a1 1 0 0 0-.97.758L5.03 14.004a1 1 0 0 0-.03.242V18a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.754a.997.997 0 0 0-.03-.242L16.91 5.758a1 1 0 0 0-.97-.758H8.061Zm6.643 10a2.75 2.75 0 0 1-5.41 0H7a.5.5 0 1 1 0-1h2.75a.5.5 0 0 1 .5.5 1.75 1.75 0 1 0 3.5 0 .5.5 0 0 1 .5-.5H17a.5.5 0 0 1 0 1h-2.295Z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        @endif

                        <p class="text-gray-700 font-600 text-[14px] ml-[5px]">
                            {{ $task->category ? $task->category->name : 'Inbox' }}
                        </p>

                    </div>

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

                <div class="flex justify-center">
                    <div class="w-full flex">
                        <div class="w-[70%] h-auto px-[20px]">
                            <div class="flex mt-[20px]">
                                <p class="text-[20px]">{{ $task->task_name }}</p>
                            </div>
                            <div class="flex  h-[100px]  mt-[10px]">
                                <p class="text-[14px] text-[#999999]">{{ $task->description }}</p>
                            </div>
                            <div class="flex mt-[10px] h-[30px] border-[#ECEEF0] border-b-[1px]">
                                <p class="text-[14px]">Comments</p>
                            </div>


                            <div class="flex mt-[10px] h-auto w-[500px]">
                                <div class="w-auto  h-[200px] pr-[20px]" style="overflow-y: auto">
                                    @foreach ($comments as $comment)
                                        <div class="w-full  h-[65px] hover:bg-gray-300 flex items-center">
                                            <img class="w-[28px] h-[28px] rounded-[50%] ml-[20px]"
                                                src="{{ asset('storage/' . $comment->user->photo) }}" alt="">
                                            <div class="ml-[10px]">
                                                <div class=" flex">
                                                    <p class="text-[13px] font-[600]">{{ $comment->user->email }}</p>
                                                    <p class="text-[12px] text-gray-700 ml-[15px]">{{ $task->date }}
                                                    </p>
                                                </div>
                                                <div>
                                                    <p class="text-[13px]">{{ $comment->content }}</p>
                                                </div>



                                            </div>


                                            <div class="TaskMore relative ml-[100px] mr-[20px]"
                                                data-id="{{ $comment->id }}">
                                                <div class="ml-[10px] hover:bg-[#CCCCCC] rounded-[5px]">
                                                    <button class="cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24">
                                                            <g fill="none" stroke="#929292" stroke-linecap="round"
                                                                transform="translate(3 10)">
                                                                <circle cx="2" cy="2" r="2">
                                                                </circle>
                                                                <circle cx="9" cy="2" r="2">
                                                                </circle>
                                                                <circle cx="16" cy="2" r="2">
                                                                </circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="taskMoreShow hidden absolute w-[200px] h-auto rounded rounded-[10px] bg-[#ECEEF0] right-[5%]"
                                                style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2); z-index: 1000">



                                                <div
                                                    class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px] rounded-[10px]">

                                                    <div onclick="event.preventDefault(); document.getElementById('delete-form-{{ $comment->id }}').submit();"
                                                        class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" stroke="red"
                                                            stroke-width="1" stroke-linecap="round"
                                                            stroke-linejoin="round" viewBox="0 0 24 24">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path
                                                                d="M19 6l-1.5 14a1 1 0 0 1-1 .9H7.5a1 1 0 0 1-1-.9L5 6" />
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17" />
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17" />
                                                            <path d="M9 4h6" />
                                                            <path d="M10 2h4v2h-4V2z" />
                                                        </svg>
                                                        <p class="ml-[5px] text-red-500">Delete</p>


                                                        <form id="delete-form-{{ $comment->id }}"
                                                            action="{{ route('comment.delete', $comment->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

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


                                            popup.style.left = `${mouseX + 20}px`;
                                            popup.style.top = `${mouseY  - 45}px`;

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

                        </div>
                        <div class="w-[30%] px-[20px] h-[71.4vh] bg-[#ECEEF0]"
                            style="border-bottom-right-radius: 15px">

                            <div class="w-full h-auto mt-[20px]">
                                <div>
                                    <p class="text-[12px] font-[600]">Project</p>
                                </div>
                                <div class="h-[30px] flex items-center">
                                    @if ($task->category)
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            fill="none" viewBox="0 0 24 24" class=""
                                            style="color: var(--named-color-charcoal);">
                                            <path fill="{{ $task->category->color }}" fill-rule="evenodd"
                                                d="M15.994 6.082a.5.5 0 1 0-.987-.164L14.493 9h-3.986l.486-2.918a.5.5 0 1 0-.986-.164L9.493 9H7a.5.5 0 1 0 0 1h2.326l-.666 4H6a.5.5 0 0 0 0 1h2.493l-.486 2.918a.5.5 0 1 0 .986.164L9.507 15h3.986l-.486 2.918a.5.5 0 1 0 .987.164L14.507 15H17a.5.5 0 1 0 0-1h-2.326l.667-4H18a.5.5 0 1 0 0-1h-2.493l.487-2.918ZM14.327 10H10.34l-.667 4h3.987l.667-4Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                            fill="none" viewBox="0 0 24 24">
                                            <path fill="#374151" fill-rule="evenodd"
                                                d="M8.062 4h7.876a2 2 0 0 1 1.94 1.515l2.062 8.246c.04.159.06.322.06.486V18a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-3.754a2 2 0 0 1 .06-.485L6.12 5.515A2 2 0 0 1 8.061 4Zm0 1a1 1 0 0 0-.97.758L5.03 14.004a1 1 0 0 0-.03.242V18a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-3.754a.997.997 0 0 0-.03-.242L16.91 5.758a1 1 0 0 0-.97-.758H8.061Zm6.643 10a2.75 2.75 0 0 1-5.41 0H7a.5.5 0 1 1 0-1h2.75a.5.5 0 0 1 .5.5 1.75 1.75 0 1 0 3.5 0 .5.5 0 0 1 .5-.5H17a.5.5 0 0 1 0 1h-2.295Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    @endif
                                    <p class="text-[12px] ml-[4px] ">Inbox</p>
                                </div>
                                <div class="border-b border-[#D0D4D9]">

                                </div>
                            </div>


                            <div class="w-full h-auto mt-[20px]">
                                <div>
                                    <p class="text-[12px] font-[600]">Date</p>
                                </div>
                                <div class="h-[30px] flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
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
                                    <p class="text-[12px] ml-[4px] ">
                                        {{ \Carbon\Carbon::parse($task->date)->locale('id')->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                                <div class="border-b border-[#D0D4D9]">

                                </div>
                            </div>


                            <div class="w-full h-auto mt-[20px]">
                                <div>
                                    <p class="text-[12px] font-[600]">Priority</p>
                                </div>
                                <div class="h-[30px] flex items-center">
                                    @php
                                        $priorityColors = [
                                            1 => '#D84040',
                                            2 => '#FFA725',
                                            3 => '#205781',
                                            4 => '#8C939F',
                                        ];
                                        $color = $priorityColors[$task->priority] ?? '#8C939F';
                                    @endphp

                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                        fill="{{ $color }}" viewBox="0 0 24 24">
                                        <path fill="{{ $color }}" fill-rule="evenodd"
                                            d="M4 5a.5.5 0 0 1 .223-.416C5.313 3.857 6.742 3.5 8.5 3.5c1.113 0 1.92.196 3.658.776C13.796 4.822 14.53 5 15.5 5c1.575 0 2.813-.31 3.723-.916A.5.5 0 0 1 20 4.5V13a.5.5 0 0 1-.223.416c-1.09.727-2.518 1.084-4.277 1.084-1.113 0-1.92-.197-3.658-.776C10.204 13.178 9.47 13 8.5 13c-1.45 0-2.614.262-3.5.777V19.5a.5.5 0 0 1-1 0V5Z"
                                            clip-rule="evenodd"></path>
                                    </svg>

                                    <p class="text-[12px] ml-[4px] ">Priority {{ $task->priority }}</p>
                                </div>
                                <div class="border-b border-[#D0D4D9]">

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>












    </div>


    </div>






</body>

</html>


<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
