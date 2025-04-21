<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Verifikasi Email</title>
</head>
<body>
    <form id="autoSubmitForm" action="{{ route('verifyEmail') }}" method="POST">
        @csrf
    </form>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("autoSubmitForm").submit();
        });
    </script>
</body>
</html>
