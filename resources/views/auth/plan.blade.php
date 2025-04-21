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
<style>
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
        width: 50px;
        height: 25px;
        background: #ccc;
        border-radius: 50px;
        position: relative;
        transition: 0.3s;

    }

    .toggle-label::after {
        content: "";
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: white;
        position: absolute;
        top: 50%;
        left: 5px;
        transform: translateY(-50%);
        transition: .3s
    }

    .toggle-input:checked+.toggle-label {
        background: #4CAF50;
    }

    .toggle-input:checked+.toggle-label::after {
        left: 25px;
    }
</style>

<body>
    <div class="w-full h-100vh flex">
        <div class="w-[40%] h-[100vh] flex justify-center">
            <div class="absolute flex items-center left-[20px] top-[10px]">
                <div class="w-[40px] h-[40px]">
                    <img src="{{ asset('images/LogoDD.png') }}" alt="">
                </div>
                <p class="text-[20px] font-[700] text-[#335166]">DoneBang</p>
            </div>
            <div class="w-[450px]">
                <div class="w-[450px] h-[450px] ml-[30px]">
                    <img src="{{ asset('images/prop.png') }}" alt="">
                </div>
                <div class="w-full flex justify-center">
                    <p class="text-[20px] font-[600]">To-Do-List</p>
                </div>
                <div class="w-full flex justify-center">
                    <div class="w-[80%] flex justify-center">
                        <p class="text-[15px] font-[500] text-center">Aplikasi to-do list sederhana untuk menyelesaikan
                            tugas lebih cepat!</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-[60%] bg-[#ECEEF0] h-[100vh] flex items-center">
            <div class=" w-full h-auto">
                <div class="w-[450px] h-auto ml-[100px]">
                    <div>
                        <p class="font-[700]">Step 2 of 2</p>
                    </div>
                    <div class="mt-[10px]">
                        <p class="font-[700] text-[26px]">How do you plan to use DoneBang?</p>
                    </div>
                    <div class="mt-[10px]">
                        <p class="font-[400] text-[18px]">Choose all that apply.</p>
                    </div>

                    <form action="{{ route('auth.plan.store') }}" method="post">
                        @csrf
                        <div class="mt-[10px]">
                            <div id="personal"
                                class="hover:border-[#B8B8B8] hover:cursor-pointer w-full flex items-center h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <div class="w-[20px] h-[20px] ml-[10px]">
                                    <img class="object-fit-cover" src="{{ asset('images/personal.png') }}" alt="">
                                </div>
                                <p class="hover:cursor-pointer w-[200px] ml-[10px] text-[18px] text-[#202020] font-[600]" >Personal</p>
                                <label class="ml-[25%] toggle-container" for="toggle">
                                    <input class="toggle-input" type="checkbox" name="personal" id="toggle" value="1">
                                    <span class="toggle-label"></span>
                                </label>
                        </div>
                        <div class="mt-[10px]">
                            <div id="work"
                                class="hover:border-[#B8B8B8] hover:cursor-pointer w-full flex items-center h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <div class="w-[20px] h-[20px] ml-[10px]">
                                    <img class="object-fit-cover" src="{{ asset('images/briefcase.png') }}" alt="">
                                </div>
                                <p class="hover:cursor-pointer w-[200px] ml-[10px] text-[18px] text-[#202020] font-[600]" >work</p>
                                <label class="ml-[25%] toggle-container" for="toggle">
                                    <input class="toggle-input" type="checkbox" name="work" id="toggle" value="1">
                                    <span class="toggle-label"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-[10px]">
                            <div id="education"
                                class="hover:border-[#B8B8B8] hover:cursor-pointer w-full flex items-center h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <div class="w-[20px] h-[20px] ml-[10px]">
                                    <img class="object-fit-cover" src="{{ asset('images/graduation.png') }}" alt="">
                                </div>
                                <p class="hover:cursor-pointer w-[200px] ml-[10px] text-[18px] text-[#202020] font-[600]" >Education</p>
                                <label class="ml-[25%] toggle-container" for="toggle">
                                    <input class="toggle-input" type="checkbox" name="education" id="toggle" value="1">
                                    <span class="toggle-label"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-[10px]">
                            <div class="w-full flex justify-center">
                                <button class="bg-[#335166] w-[200px] h-[35px] rounded rounded-[10px] text-white cursor-pointer hover:bg-white hover:border-[#B8B8B8] hover:border-[1px] hover:text-[#335166] hover:font-[600] transition" type="submit">Launch DoneBang</button>
                            </div>
                        </div>
                    </form>





                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script>
document.querySelectorAll('.hover\\:cursor-pointer').forEach(container => {
    container.addEventListener('click', function() {
        var checkbox = this.querySelector('input[type="checkbox"]');
        checkbox.checked = !checkbox.checked; 
    });
});



</script>