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
                    <img class="object-fit-cover" src="{{ asset('images/prop.png') }}" alt="">
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
                        <p class="font-[700]">Step 1 of 2</p>
                    </div>
                    <div class="mt-[10px]">
                        <p class="font-[700] text-[36px]">Create Profile</p>
                    </div>
                    <div class="mt-[10px]">
                        <p class="font-[700] text-[18px]">Create Your Profile</p>
                    </div>


                    <form action="{{ route('auth.createProfile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-[20px] group">
                            <div
                                class=" w-full h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded flex items-center rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                {{-- terbaru --}}
                                <div style="display: block" id="uploadContainer">
                                    <div class="flex items-center">
                                        <div
                                            class=" w-[30px] flex justify-center items-center h-[30px] bg-[#B8B8B8] rounded rounded-[50%] ml-[10px]">
                                            <img class="w-[20px] h-[20px]" src="{{ asset('images/upload.png') }}"
                                                alt="">
                                        </div>
                                        <label for="upload" class="hover:cursor-pointer ml-[10px]">Upload Your
                                            Photo</label>
                                    </div>
                                </div>


                                <input id="upload" name="photo" type="file"
                                    class="w-full text-[16px] font-[600] focus:outline-none">


                                <div style="display: none" id="previewContainer">
                                    <div class="flex items-center w-[440px]">
                                        <div 
                                            class=" w-[30px] flex justify-center items-center h-[30px] overflow-hidden bg-[#B8B8B8] rounded rounded-[50%] ml-[10px]">
                                            <img id="previewImage" class="w-full h-full object-cover rounded"
                                                src="" alt="">
                                        </div>
                                        <label for="upload" class="hover:cursor-pointer ml-[10px]">Looking
                                            Good!</label>
                                        <label for="upload" class="hover:cursor-pointer ml-[50%] text-green-500">&#10004;</label>
                                    </div>
                                </div>




                            </div>
                        </div>
                        <div class="mt-[20px] group">
                            <div
                                class="w-full h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <label for=""
                                    class="ml-[10px] text-[12px] text-[#202020] font-[500]">Name</label>
                                <input name="name" placeholder="Enter your name..." type="text"
                                    class="w-full pl-[10px] pr-[10px] text-[16px] font-[600] focus:outline-none"
                                    value="{{ str_replace('@gmail.com', '', auth()->user()->email ?? '') }}">
                            </div>
                        </div>
                        <div class="mt-[20px]">
                            <div
                                class="w-full h-[50px] bg-white border border-[1.5px] border-[#EEEEEE] rounded flex items-center rounded-[10px] group-focus-within:border-[#B8B8B8] transition">
                                <p class="text-[14px] ml-[10px]">I want to use DoneBang with my team</p>
                                <label class="ml-[25%] toggle-container" for="toggle">
                                    <input class="toggle-input" type="checkbox" name="forteam" id="toggle" value="1">
                                    <span class="toggle-label"></span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-[20px]">
                            <button type="submit"
                                class="w-full h-[50px] bg-[#335166] border rounded rounded-[10px] font-[600] text-white cursor-pointer hover:bg-[#EEEEEE] hover:text-[#335166] hover:font-[600] transition">Continue</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</body>

</html>


<script>
    document.getElementById('upload').addEventListener('change', function(event) {
        const file = event.target.files[0]

        if (file) {
            const reader = new FileReader()

            reader.onload = function(e) {
                setTimeout(() => {
                    document.getElementById('previewImage').src = e.target.result
                    document.getElementById('uploadContainer').style.display = 'none'
                    document.getElementById('previewContainer').style.display = 'block'
                }, 1000);
            }

            reader.readAsDataURL(file)
        }
    })
</script>
