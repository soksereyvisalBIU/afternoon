<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        
    </head>
    <body class="antialiased">


        
        
        <div class="container">
            <div style="max-width: 300px; width: 60px ; " class="d-flex justify-content-between text-center gap-2">
                <div class="KhmerTran">
                    <a id="KHMERT">
                        <a href="{{ route('set-locale', 'kh') }}" onclick="KHMERTRAN()"><img loading="lazy" style="max-width: 100px; width: 60px ; min-height: 20px; height: 30px;"
                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_Cambodia.svg/1200px-Flag_of_Cambodia.svg.png" alt="" /></a>
                        <p class="fs14" style="font-family: 'khmer OS Content'">ភាសាខ្មែរ</p>
                    </a>
                </div>
    
                <div class="EnglishTran">
                    <a id="ENGLISHT">
                        <a href="{{ route('set-locale', 'en') }}" onclick="ENGLISHTRAN()"><img loading="lazy" style="max-width: 100px; width: 60px ; min-height: 20px; height: 30px;"
                                src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Flag_of_the_United_Kingdom_%281-2%29.svg" alt="" /></a>
                        <p class="fs14" style="font-family: 'khmer OS Content'">English</p>
                    </a>
                </div>
            </div>
            {{ __('app.name') }}

            @livewire('create-user')
        </div>

        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </body>
</html>
