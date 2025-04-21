@extends('themes.default.main')
@section('main-content')

    <div class="w-full h-auto ">
        <section>
            <p class="text-[26px] font-[700]">Upcoming</p>
        </section>


        <div class="mt-[30px]">

        </div>

        @if ($overdueData->where('date', '<', now()->format('y-m-d'))->count() > 0)
            <div>
                <div class="font-[700] flex w-full justify-center items-center" id="drag-container">
                    <div class="w-[90%]  border-b border-b-[1px] h-[30px] border-[#b8b8b8]">
                        <p>Overdue</p>
                    </div>
                </div>

                <div id="drag-container">
                    @foreach ($overdueData as $item)
                        <div class="draggable-item" data-id="{{ $item->id }}" draggable="true">
                            <div class="w-full p-[10px] h-auto flex cursor-pointer">
                                <div
                                    class="w-auto h-[20px] hover:bg-[#b8b8b8] flex items-center justify-center rounded-[5px]">
                                    <div class="drag-handle">
                                        <svg class="cursor-move" width="24" height="24">
                                            <path fill="#929292"
                                                d="M14.5 15.5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 15.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 15.5zm5-5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 10.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 10.5zm5-5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 5.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 5.5z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <form method="POST" action="{{ route('task.done.store', ['id' => $item->id]) }}">
                                    @csrf
                                    <input type="hidden" name="done" value="0" id="doneInput-{{ $item->id }}">

                                    <div class="mt-[3px] ml-[10px]">
                                        <label class="cursor-pointer flex items-center relative">
                                            <div class="priorityCircle w-[17px] h-[17px] rounded-full border-[2px] flex items-center justify-center transition-all"
                                                data-id="{{ $item->id }}"
                                                data-default="{{ $item->priority == 1 ? '#FFE5E5' : ($item->priority == 2 ? '#FFF2DA' : ($item->priority == 3 ? '#C5E7FF' : ($item->priority == 4 ? '#F8F9FA' : 'black'))) }}"
                                                data-hover="{{ $item->priority == 1 ? '#FFD6D6' : ($item->priority == 2 ? '#FFE8C2' : ($item->priority == 3 ? '#A3D8FF' : ($item->priority == 4 ? '#F0F2F5' : 'black'))) }}"
                                                style="border-color: {{ $item->priority == 1 ? '#D84040' : ($item->priority == 2 ? '#FFA725' : ($item->priority == 3 ? '#205781' : ($item->priority == 4 ? '#8C939F' : 'black'))) }};">

                                                <svg width="12" height="12" viewBox="0 0 40 40" class="checkmark"
                                                    style="display: none;">
                                                    <polyline points="12,20 18,26 28,14"
                                                        stroke="{{ $item->priority == 1 ? '#D84040' : ($item->priority == 2 ? '#FFA725' : ($item->priority == 3 ? '#205781' : ($item->priority == 4 ? '#8C939F' : 'black'))) }}"
                                                        stroke-width="3.5" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                    </polyline>
                                                </svg>
                                            </div>
                                        </label>
                                    </div>
                                </form>


                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        document.querySelectorAll(".priorityCircle").forEach(circle => {
                                            const id = circle.getAttribute("data-id");
                                            const doneInput = document.getElementById(`doneInput-${id}`);
                                            const checkmark = circle.querySelector(".checkmark");

                                            const defaultColor = circle.getAttribute("data-default");
                                            const hoverColor = circle.getAttribute("data-hover");
                                            circle.style.backgroundColor = defaultColor;

                                            circle.addEventListener("mouseenter", function() {
                                                checkmark.style.display = "block";
                                                circle.style.backgroundColor = hoverColor;
                                            });

                                            circle.addEventListener("mouseleave", function() {
                                                if (doneInput.value === "0") {
                                                    checkmark.style.display = "none";
                                                    circle.style.backgroundColor = defaultColor;
                                                }
                                            });

                                            circle.addEventListener("click", function() {
                                                doneInput.value = "1";
                                                checkmark.style.display = "block";
                                                circle.style.backgroundColor = hoverColor;

                                                this.closest("form").submit();
                                            });
                                        });
                                    });
                                </script>

                                <div class="ml-[10px] w-[70%]">
                                    <p class="text-[14px]">{{ $item->task_name }}</p>
                                    <p class="text-[12px] text-[#666666]">{{ $item->description }}</p>

                                    @php
                                        $taskDate = \Carbon\Carbon::parse($item->date);
                                        $taskTimestamp = strtotime($item->date . ' ' . $item->time);
                                        $currentDateTime = time();

                                        $isToday = $taskDate->isToday();
                                        $isPast = $taskTimestamp < $currentDateTime;
                                        $isFuture = $taskTimestamp > $currentDateTime;
                                        $isSameDay = $taskDate->isSameDay(\Carbon\Carbon::now());
                                        $isPastButNotToday = !$isToday && $isPast;

                                        $displayText = $isPastButNotToday
                                            ? date('d M', $taskTimestamp)
                                            : ($isToday
                                                ? date('H:i', $taskTimestamp)
                                                : $taskDate->translatedFormat('l'));

                                        $finalColor =
                                            $isPastButNotToday || ($isToday && $isPast)
                                                ? '#ff2626'
                                                : ($isToday && !$isPast
                                                    ? '#058527'
                                                    : '#692EC2');
                                    @endphp

                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none"
                                            viewBox="0 0 12 12">
                                            <path fill="{{ $finalColor }}" fill-rule="evenodd"
                                                d="M9.5 1h-7A1.5 1.5 0 0 0 1 2.5v7A1.5 1.5 0 0 0 2.5 11h7A1.5 1.5 0 0 0 11 9.5v-7A1.5 1.5 0 0 0 9.5 1ZM2 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7ZM8.75 8a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM3.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="ml-[5px] text-[12px]" style="color: {{ $finalColor }};">
                                            {{ $displayText }}
                                        </p>
                                        @if ($item->comments->count() > 0)
                                            <a href="{{ route('inbox.comment.detail', ['id' => $item->id]) }}">
                                                <div class="showComment cursor-pointer hover:bg-gray-300 px-[3px] rounded-[2px] ml-[10px] flex items-center"
                                                    data-id="{{ $item->id }}">
                                                    <svg width="12" height="12" viewBox="0 0 12 12" class="yw4Nin7">
                                                        <g fill="none" fill-rule="evenodd">
                                                            <path fill="currentColor" fill-rule="nonzero"
                                                                d="M9.5 1A1.5 1.5 0 0 1 11 2.5v5A1.5 1.5 0 0 1 9.5 9H7.249L5.28 10.97A.75.75 0 0 1 4 10.44V9H2.5A1.5 1.5 0 0 1 1 7.5v-5A1.5 1.5 0 0 1 2.5 1h7zm0 1h-7a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5H5v1.836L6.835 8H9.5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                    <p class="text-[10px] ml-[3px]">{{ $item->comments->count() }}</p>
                                                </div>
                                            </a>
                                        @endif
                                    </div>


                                </div>


                                <div>
                                    <div class="flex">
                                        <div class="addtask edit-task" data-id="{{ $item->id }}">
                                            <div class="hover:bg-[#CCCCCC]  ml-[25px] rounded-[5px]">
                                                <svg width="24" height="24">
                                                    <g fill="none" fill-rule="evenodd">
                                                        <path fill="#929292"
                                                            d="M9.5 19h10a.5.5 0 1 1 0 1h-10a.5.5 0 1 1 0-1z">
                                                        </path>
                                                        <path stroke="#929292"
                                                            d="M4.42 16.03a1.5 1.5 0 0 0-.43.9l-.22 2.02a.5.5 0 0 0 .55.55l2.02-.21a1.5 1.5 0 0 0 .9-.44L18.7 7.4a1.5 1.5 0 0 0 0-2.12l-.7-.7a1.5 1.5 0 0 0-2.13 0L4.42 16.02z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </div>
                                        </div>




                                        <div class="addComment" data-id="{{ $item->id }}">
                                            <div class="ml-[10px] hover:bg-[#CCCCCC] rounded-[5px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    data-svgs-path="sm1/comments.svg">
                                                    <path fill="#929292" fill-rule="nonzero"
                                                        d="M11.707 20.793A1 1 0 0 1 10 20.086V18H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4.5l-2.793 2.793zM11 20.086L14.086 17H19a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h6v3.086z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>


                                        <div class="TaskMore relative" data-id="{{ $item->id }}">
                                            <div class="ml-[10px] hover:bg-[#CCCCCC] rounded-[5px]">
                                                <button class="cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <g fill="none" stroke="#929292" stroke-linecap="round"
                                                            transform="translate(3 10)">
                                                            <circle cx="2" cy="2" r="2"></circle>
                                                            <circle cx="9" cy="2" r="2"></circle>
                                                            <circle cx="16" cy="2" r="2"></circle>
                                                        </g>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>

                                        <div class="taskMoreShow hidden absolute w-[200px] h-auto rounded rounded-[10px] bg-[#ECEEF0] right-[5%]"
                                            style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2); z-index: 1000">
                                            <div class="w-full h-auto py-[10px] px-[10px] bg-white"
                                                style="border-top-left-radius: 10px; border-top-right-radius: 10px">


                                                <div class="edit-task" data-id="{{ $item->id }}">
                                                    <div
                                                        class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                        <svg width="24" height="24">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <path fill="#929292"
                                                                    d="M9.5 19h10a.5.5 0 1 1 0 1h-10a.5.5 0 1 1 0-1z">
                                                                </path>
                                                                <path stroke="#929292"
                                                                    d="M4.42 16.03a1.5 1.5 0 0 0-.43.9l-.22 2.02a.5.5 0 0 0 .55.55l2.02-.21a1.5 1.5 0 0 0 .9-.44L18.7 7.4a1.5 1.5 0 0 0 0-2.12l-.7-.7a1.5 1.5 0 0 0-2.13 0L4.42 16.02z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <p class="ml-[5px]">Edit</p>
                                                    </div>
                                                </div>








                                            </div>

                                            <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]">


                                                <div onclick="event.preventDefault(); document.getElementById('complete-form-{{ $item->id }}').submit();"
                                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        fill="none" viewBox="0 0 24 24" stroke="#929292"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="M9 12l2 2l4 -4" />
                                                    </svg>
                                                    <p class="ml-[5px]">Complete</p>


                                                    <form id="complete-form-{{ $item->id }}"
                                                        action="{{ route('task.complete', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        <input type="hidden" name="done" value="1">
                                                    </form>
                                                </div>

                                            </div>


                                            <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]"
                                                style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px">

                                                <div onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"
                                                    class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" stroke="red" stroke-width="1"
                                                        stroke-linecap="round" stroke-linejoin="round"
                                                        viewBox="0 0 24 24">
                                                        <polyline points="3 6 5 6 21 6" />
                                                        <path d="M19 6l-1.5 14a1 1 0 0 1-1 .9H7.5a1 1 0 0 1-1-.9L5 6" />
                                                        <line x1="10" y1="11" x2="10"
                                                            y2="17" />
                                                        <line x1="14" y1="11" x2="14"
                                                            y2="17" />
                                                        <path d="M9 4h6" />
                                                        <path d="M10 2h4v2h-4V2z" />
                                                    </svg>
                                                    <p class="ml-[5px] text-red-500">Delete</p>


                                                    <form id="delete-form-{{ $item->id }}"
                                                        action="{{ route('task.delete', $item->id) }}" method="POST"
                                                        style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="ml-[70px] flex items-center">
                                        <p class="text-[12px] text-gray-700">{{ $item->category->name ?? 'Inbox' }}</p>

                                        @if (!$item->category || $item->category->name === 'inbox')
                                            <div class="ml-[5px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="none" viewBox="0 0 16 16" class="AyswQEh wMrhHaw">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M5.509 2h4.982a2 2 0 0 1 1.923 1.45l1.509 5.28c.051.18.077.365.077.55V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.28a2 2 0 0 1 .077-.55l1.509-5.28A2 2 0 0 1 5.509 2Zm0 1a1 1 0 0 0-.962.726l-1.509 5.28A1 1 0 0 0 3 9.28V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.28a.997.997 0 0 0-.039-.274l-1.508-5.28A1 1 0 0 0 10.49 3H5.51Zm4.685 7a2.25 2.25 0 0 1-4.388 0H4.5a.5.5 0 1 1 0-1h1.75a.5.5 0 0 1 .5.5 1.25 1.25 0 0 0 2.5 0 .5.5 0 0 1 .5-.5h1.75a.5.5 0 0 1 0 1h-1.306Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        @else
                                            <div class="ml-[5px]">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                    fill="none" viewBox="0 0 12 12" class="wMrhHaw"
                                                    style="color: var(--named-color-charcoal);">
                                                    <path fill="{{ $item->category->color }}" fill-rule="evenodd"
                                                        d="M4.555 1.003a.5.5 0 0 1 .442.552L4.781 3.5h2.994l.228-2.055a.5.5 0 0 1 .994.11L8.781 3.5H10.5a.5.5 0 0 1 0 1H8.67l-.334 3H10a.5.5 0 0 1 0 1H8.225l-.228 2.055a.5.5 0 0 1-.994-.11L7.22 8.5H4.225l-.228 2.055a.5.5 0 0 1-.994-.11L3.22 8.5H1.5a.5.5 0 0 1 0-1h1.83l.334-3H2a.5.5 0 1 1 0-1h1.775l.228-2.055a.5.5 0 0 1 .552-.442ZM7.33 7.5l.334-3H4.67l-.334 3H7.33Z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </div>
                                        @endif

                                    </div>
                                </div>


                            </div>
                            <div class="w-full flex justify-center">
                                <div class="w-[90%] border-b border-b-[1px] border-[#b8b8b8]"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        @php
            use Carbon\Carbon;
            $startDate = Carbon::now();
        @endphp
        @php
            $previousMonthYear = '';
        @endphp

        @for ($i = 0; $i < 365; $i++)
            @php
                $date = $startDate->copy()->addDays($i);
                $dayNumber = $date->format('d');
                $dayName = $date->translatedFormat('l');

                $monthYear = $date->translatedFormat('F Y');

                $label = match ($i) {
                    0 => 'Today • ' . $dayName,
                    1 => 'Tomorrow • ' . $dayName,
                    default => $dayName,
                };
            @endphp




            <div class="mt-[50px] ">


                @if ($monthYear !== $previousMonthYear)
                    <div class=" mb-[10px] flex justify-center">
                        <div class="w-[90%] text-[16px] font-bold text-[#335166] border-b border-[#cccccc] pb-[4px]">
                            {{ $monthYear }}
                        </div>
                    </div>
                    @php
                        $previousMonthYear = $monthYear;
                    @endphp
                @endif



                <div>
                    <div class="font-[700] flex w-full justify-center items-center" id="drag-container">

                        <div class="w-[90%] border-b border-b-[1px] h-[30px] border-[#b8b8b8]">
                            <p>{{ $dayNumber }} <span class="text-[12px]">•</span> {{ $date->translatedFormat('M') }}
                                <span class=" text-[12px]">•</span> {{ $label }}
                            </p>
                        </div>

                    </div>

                    <div id="drag-container">
                        @foreach ($list->where('date', $date->toDateString()) as $item)
                            <div class="draggable-item" data-id="{{ $item->id }}" draggable="true">
                                <div class="w-full p-[10px] h-auto flex cursor-pointer">
                                    <div
                                        class="w-auto h-[20px] hover:bg-[#b8b8b8] flex items-center justify-center rounded-[5px]">
                                        <div class="drag-handle">
                                            <svg class="cursor-move" width="24" height="24">
                                                <path fill="#929292"
                                                    d="M14.5 15.5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 15.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 15.5zm5-5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 10.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 10.5zm5-5a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 14.5 5.5zm-5 0a1.5 1.5 0 1 1-.001 3.001A1.5 1.5 0 0 1 9.5 5.5z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>

                                    <form method="POST" action="{{ route('task.done.store', ['id' => $item->id]) }}">
                                        @csrf
                                        <input type="hidden" name="done" value="0"
                                            id="doneInput-{{ $item->id }}">

                                        <div class="mt-[3px] ml-[10px]">
                                            <label class="cursor-pointer flex items-center relative">
                                                <div class="priorityCircle w-[17px] h-[17px] rounded-full border-[2px] flex items-center justify-center transition-all"
                                                    data-id="{{ $item->id }}"
                                                    data-default="{{ $item->priority == 1 ? '#FFE5E5' : ($item->priority == 2 ? '#FFF2DA' : ($item->priority == 3 ? '#C5E7FF' : ($item->priority == 4 ? '#F8F9FA' : 'black'))) }}"
                                                    data-hover="{{ $item->priority == 1 ? '#FFD6D6' : ($item->priority == 2 ? '#FFE8C2' : ($item->priority == 3 ? '#A3D8FF' : ($item->priority == 4 ? '#F0F2F5' : 'black'))) }}"
                                                    style="border-color: {{ $item->priority == 1 ? '#D84040' : ($item->priority == 2 ? '#FFA725' : ($item->priority == 3 ? '#205781' : ($item->priority == 4 ? '#8C939F' : 'black'))) }};">

                                                    <svg width="12" height="12" viewBox="0 0 40 40"
                                                        class="checkmark" style="display: none;">
                                                        <polyline points="12,20 18,26 28,14"
                                                            stroke="{{ $item->priority == 1 ? '#D84040' : ($item->priority == 2 ? '#FFA725' : ($item->priority == 3 ? '#205781' : ($item->priority == 4 ? '#8C939F' : 'black'))) }}"
                                                            stroke-width="3.5" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </polyline>
                                                    </svg>
                                                </div>
                                            </label>
                                        </div>
                                    </form>


                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            document.querySelectorAll(".priorityCircle").forEach(circle => {
                                                const id = circle.getAttribute("data-id");
                                                const doneInput = document.getElementById(`doneInput-${id}`);
                                                const checkmark = circle.querySelector(".checkmark");

                                                const defaultColor = circle.getAttribute("data-default");
                                                const hoverColor = circle.getAttribute("data-hover");
                                                circle.style.backgroundColor = defaultColor;

                                                circle.addEventListener("mouseenter", function() {
                                                    checkmark.style.display = "block";
                                                    circle.style.backgroundColor = hoverColor;
                                                });

                                                circle.addEventListener("mouseleave", function() {
                                                    if (doneInput.value === "0") {
                                                        checkmark.style.display = "none";
                                                        circle.style.backgroundColor = defaultColor;
                                                    }
                                                });

                                                circle.addEventListener("click", function() {
                                                    doneInput.value = "1";
                                                    checkmark.style.display = "block";
                                                    circle.style.backgroundColor = hoverColor;

                                                    this.closest("form").submit();
                                                });
                                            });
                                        });
                                    </script>





                                    <div class="ml-[10px] w-[70%]">
                                        <p class="text-[14px]">{{ $item->task_name }}</p>
                                        <p class="text-[12px] text-[#666666]">{{ $item->description }}</p>

                                        @php
                                            $taskTimestamp = strtotime($item->date . ' ' . $item->time);
                                            $currentDateTime = time();

                                            $isLate = $taskTimestamp < $currentDateTime;
                                            $textColor = $isLate ? '#ff2626' : '#058527';
                                        @endphp
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                fill="none" viewBox="0 0 12 12">
                                                <path fill="{{ $textColor }}" fill-rule="evenodd"
                                                    d="M9.5 1h-7A1.5 1.5 0 0 0 1 2.5v7A1.5 1.5 0 0 0 2.5 11h7A1.5 1.5 0 0 0 11 9.5v-7A1.5 1.5 0 0 0 9.5 1ZM2 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5v-7ZM8.75 8a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM3.5 4a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5Z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-[5px] text-[12px]" style="color: {{ $textColor }};">
                                                {{ date('H:i', strtotime($item->time)) }}
                                            </p>
                                            @if ($item->comments->count() > 0)
                                                <a href="{{ route('inbox.comment.detail', ['id' => $item->id]) }}">
                                                    <div class="showComment cursor-pointer hover:bg-gray-300 px-[3px] rounded-[2px] ml-[10px] flex items-center"
                                                        data-id="{{ $item->id }}">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            class="yw4Nin7">
                                                            <g fill="none" fill-rule="evenodd">
                                                                <path fill="currentColor" fill-rule="nonzero"
                                                                    d="M9.5 1A1.5 1.5 0 0 1 11 2.5v5A1.5 1.5 0 0 1 9.5 9H7.249L5.28 10.97A.75.75 0 0 1 4 10.44V9H2.5A1.5 1.5 0 0 1 1 7.5v-5A1.5 1.5 0 0 1 2.5 1h7zm0 1h-7a.5.5 0 0 0-.5.5v5a.5.5 0 0 0 .5.5H5v1.836L6.835 8H9.5a.5.5 0 0 0 .5-.5v-5a.5.5 0 0 0-.5-.5z">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                        <p class="text-[10px] ml-[3px]">{{ $item->comments->count() }}</p>
                                                    </div>
                                                </a>
                                            @endif
                                        </div>
                                    </div>


                                    <div>
                                        <div class="flex">
                                            <div class="addtask edit-task" data-id="{{ $item->id }}">
                                                <div class="hover:bg-[#CCCCCC]  ml-[25px] rounded-[5px]">
                                                    <svg width="24" height="24">
                                                        <g fill="none" fill-rule="evenodd">
                                                            <path fill="#929292"
                                                                d="M9.5 19h10a.5.5 0 1 1 0 1h-10a.5.5 0 1 1 0-1z">
                                                            </path>
                                                            <path stroke="#929292"
                                                                d="M4.42 16.03a1.5 1.5 0 0 0-.43.9l-.22 2.02a.5.5 0 0 0 .55.55l2.02-.21a1.5 1.5 0 0 0 .9-.44L18.7 7.4a1.5 1.5 0 0 0 0-2.12l-.7-.7a1.5 1.5 0 0 0-2.13 0L4.42 16.02z">
                                                            </path>
                                                        </g>
                                                    </svg>
                                                </div>
                                            </div>




                                            <div class="addComment" data-id="{{ $item->id }}">
                                                <div class="ml-[10px] hover:bg-[#CCCCCC] rounded-[5px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        data-svgs-path="sm1/comments.svg">
                                                        <path fill="#929292" fill-rule="nonzero"
                                                            d="M11.707 20.793A1 1 0 0 1 10 20.086V18H5a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-4.5l-2.793 2.793zM11 20.086L14.086 17H19a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h6v3.086z">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>


                                            <div class="TaskMore relative" data-id="{{ $item->id }}">
                                                <div class="ml-[10px] hover:bg-[#CCCCCC] rounded-[5px]">
                                                    <button class="cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24">
                                                            <g fill="none" stroke="#929292" stroke-linecap="round"
                                                                transform="translate(3 10)">
                                                                <circle cx="2" cy="2" r="2"></circle>
                                                                <circle cx="9" cy="2" r="2"></circle>
                                                                <circle cx="16" cy="2" r="2"></circle>
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="taskMoreShow hidden absolute w-[200px] h-auto rounded rounded-[10px] bg-[#ECEEF0] right-[5%]"
                                                style="box-shadow: 0px 4px 10px rgba(0,0,0,0.2); z-index: 1000">
                                                <div class="w-full h-auto py-[10px] px-[10px] bg-white"
                                                    style="border-top-left-radius: 10px; border-top-right-radius: 10px">


                                                    <div class="edit-task" data-id="{{ $item->id }}">
                                                        <div
                                                            class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                            <svg width="24" height="24">
                                                                <g fill="none" fill-rule="evenodd">
                                                                    <path fill="#929292"
                                                                        d="M9.5 19h10a.5.5 0 1 1 0 1h-10a.5.5 0 1 1 0-1z">
                                                                    </path>
                                                                    <path stroke="#929292"
                                                                        d="M4.42 16.03a1.5 1.5 0 0 0-.43.9l-.22 2.02a.5.5 0 0 0 .55.55l2.02-.21a1.5 1.5 0 0 0 .9-.44L18.7 7.4a1.5 1.5 0 0 0 0-2.12l-.7-.7a1.5 1.5 0 0 0-2.13 0L4.42 16.02z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                            <p class="ml-[5px]">Edit</p>
                                                        </div>
                                                    </div>








                                                </div>

                                                <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]">


                                                    <div onclick="event.preventDefault(); document.getElementById('complete-form-{{ $item->id }}').submit();"
                                                        class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                            height="20" fill="none" viewBox="0 0 24 24"
                                                            stroke="#929292" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <circle cx="12" cy="12" r="10" />
                                                            <path d="M9 12l2 2l4 -4" />
                                                        </svg>
                                                        <p class="ml-[5px]">Complete</p>


                                                        <form id="complete-form-{{ $item->id }}"
                                                            action="{{ route('task.complete', $item->id) }}"
                                                            method="POST" style="display: none;">
                                                            @csrf
                                                            <input type="hidden" name="done" value="1">
                                                        </form>
                                                    </div>

                                                </div>


                                                <div class="w-full h-auto py-[10px] px-[10px]  bg-white mt-[1px]"
                                                    style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px">

                                                    <div onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();"
                                                        class="w-full h-[35px] hover:bg-[#ECEEF0] px-[5px] flex items-center text-[13px] rounded rounded-[5px] cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" stroke="red"
                                                            stroke-width="1" stroke-linecap="round"
                                                            stroke-linejoin="round" viewBox="0 0 24 24">
                                                            <polyline points="3 6 5 6 21 6" />
                                                            <path d="M19 6l-1.5 14a1 1 0 0 1-1 .9H7.5a1 1 0 0 1-1-.9L5 6" />
                                                            <line x1="10" y1="11" x2="10"
                                                                y2="17" />
                                                            <line x1="14" y1="11" x2="14"
                                                                y2="17" />
                                                            <path d="M9 4h6" />
                                                            <path d="M10 2h4v2h-4V2z" />
                                                        </svg>
                                                        <p class="ml-[5px] text-red-500">Delete</p>


                                                        <form id="delete-form-{{ $item->id }}"
                                                            action="{{ route('task.delete', $item->id) }}" method="POST"
                                                            style="display: none;">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="ml-[70px] flex items-center">
                                            <p class="text-[12px] text-gray-700">{{ $item->category->name ?? 'Inbox' }}
                                            </p>

                                            @if (!$item->category || $item->category->name === 'inbox')
                                                <div class="ml-[5px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="none" viewBox="0 0 16 16" class="AyswQEh wMrhHaw">
                                                        <path fill="currentColor" fill-rule="evenodd"
                                                            d="M5.509 2h4.982a2 2 0 0 1 1.923 1.45l1.509 5.28c.051.18.077.365.077.55V12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9.28a2 2 0 0 1 .077-.55l1.509-5.28A2 2 0 0 1 5.509 2Zm0 1a1 1 0 0 0-.962.726l-1.509 5.28A1 1 0 0 0 3 9.28V12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V9.28a.997.997 0 0 0-.039-.274l-1.508-5.28A1 1 0 0 0 10.49 3H5.51Zm4.685 7a2.25 2.25 0 0 1-4.388 0H4.5a.5.5 0 1 1 0-1h1.75a.5.5 0 0 1 .5.5 1.25 1.25 0 0 0 2.5 0 .5.5 0 0 1 .5-.5h1.75a.5.5 0 0 1 0 1h-1.306Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            @else
                                                <div class="ml-[5px]">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="none" viewBox="0 0 12 12" class="wMrhHaw"
                                                        style="color: var(--named-color-charcoal);">
                                                        <path fill="{{ $item->category->color }}" fill-rule="evenodd"
                                                            d="M4.555 1.003a.5.5 0 0 1 .442.552L4.781 3.5h2.994l.228-2.055a.5.5 0 0 1 .994.11L8.781 3.5H10.5a.5.5 0 0 1 0 1H8.67l-.334 3H10a.5.5 0 0 1 0 1H8.225l-.228 2.055a.5.5 0 0 1-.994-.11L7.22 8.5H4.225l-.228 2.055a.5.5 0 0 1-.994-.11L3.22 8.5H1.5a.5.5 0 0 1 0-1h1.83l.334-3H2a.5.5 0 1 1 0-1h1.775l.228-2.055a.5.5 0 0 1 .552-.442ZM7.33 7.5l.334-3H4.67l-.334 3H7.33Z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                </div>
                                            @endif

                                        </div>
                                    </div>


                                </div>
                                <div class="w-full flex justify-center">
                                    <div class="w-[90%] border-b border-b-[1px] border-[#b8b8b8]"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>




                <div class="addtask">
                    <div class="w-full flex justify-center ">
                        <div class="w-[90%]  cursor-pointer">
                            <div class="mt-[5px] flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                                    viewBox="0 0 24 24">
                                    <path fill="#335166" fill-rule="evenodd"
                                        d="M12 23c6.075 0 11-4.925 11-11S18.075 1 12 1 1 5.925 1 12s4.925 11 11 11Zm-.711-16.5a.75.75 0 1 1 1.5 0v4.789H17.5a.75.75 0 0 1 0 1.5h-4.711V17.5a.75.75 0 0 1-1.5 0V12.79H6.5a.75.75 0 1 1 0-1.5h4.789V6.5Z"
                                        clip-rule="evenodd"></path>
                                </svg>

                                <p class="text-[14px] ml-[10px] text-[#666666]">Add Task</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor




    </div>
@endsection
