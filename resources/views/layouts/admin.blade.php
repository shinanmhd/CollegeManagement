<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('css/app.css?').md5(date("h.i.s")) }}">
    @livewireStyles
    <style>
        [x-cloak] { display: none !important; }
    </style>

    <title>Cyrix College</title>
</head>
<body>

<div class="w-full min-h-screen flex flex-col relative">


    {{--flash messages--}}
    <div class="" x-data="{ flash: true }">

        @if(Session::has('flash_success'))
            <div class="absolute rounded-md px-4 py-2 right-10 bottom-32 bg-green-200 text-green-700 shadow-lg flex space-x-6 items-center" x-show="flash">
                <h3 class="">{{ Session::get('flash_success') }}</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-50 hover:opacity-100 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" x-on:click="flash = false">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
        @if(Session::has('flash_error'))
            <div class="absolute rounded-md px-4 py-2 right-10 bottom-32 bg-red-200 text-red-700 shadow-lg flex space-x-6 items-center" x-show="flash">
                <h3 class="">{{ Session::get('flash_error') }}</h3>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-50 hover:opacity-100 cursor-pointer" viewBox="0 0 20 20" fill="currentColor" x-on:click="flash = false">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
    </div>

    {{--top bar--}}
    <div class="bg-red-700 border-b border-gray-200 flex items-center justify-between">
        <a href="{{ route('index') }}" class="py-4">
            {{--logo--}}
            <svg xmlns="http://www.w3.org/2000/svg" class="w-auto h-8 text-white ml-2" x="0" y="0" fill="currentColor" enable-background="new 0 0 1807.5 562.9" version="1.1" viewBox="0 0 1807.5 562.9" xml:space="preserve"><path d="M264.5,5.6c-0.3,0.7-3.1,2.1-6.4,3.1c-82,25-127.1,48.6-165.5,86.7c-14.5,14.4-22.1,23.7-33.1,40.5	c-22.6,34.5-37.8,75.6-44,119c-1.7,11.9-1.7,49.4,0,61.5C20.9,354.7,33.2,388,53.6,419c35,53.5,87.1,90.9,148.1,106.4	c39.6,10.1,83.1,9.7,121.2-0.9c65.3-18.4,117.4-66.6,136.9-126.5c5.8-17.9,7.4-29,7.4-51.6c0-22-1.1-30.1-6.1-47	c-17.3-57.8-63-99.6-123.6-113.2c-8.9-2-13-2.3-30.8-2.3c-23.1,0-28.3,0.7-46.4,6.6c-47.8,15.6-82.4,55.7-89.2,103.4	c-1.5,10.2-1.6,13.5-0.6,22.5c2.9,26.2,13.2,47.1,32.4,65.5c15.2,14.8,31.4,24.1,50.6,29.2c8.4,2.3,11.8,2.6,25.2,2.7	c16.6,0.1,22.7-1,35.3-6.1c24.6-10,44.6-30.5,52.4-53.8c2.4-7.1,2.7-9.5,2.8-22c0-11.7-0.4-15.1-2.2-21	c-10.5-33.2-48.6-56.3-81.5-49.4c-22.9,4.8-42.2,24.5-45.9,46.9c-2.4,15.1,6.3,33.1,20.9,43.2c3,2.1,4.2,3.6,4.2,5.3	c0,3.3-1.6,3.1-7.7-1c-19.2-12.9-28.3-35-22.8-55.5c4.5-16.9,18.7-34.2,34.5-41.8c10.9-5.3,19.1-7.2,31-7.2	c31,0,60.2,18.5,74.8,47.5c20.9,41.5-1.9,97.1-49.3,120c-27.3,13.2-57.3,14.9-87.1,5c-20.4-6.8-36.8-16.8-51.5-31.4	c-14.8-14.9-25.7-32.9-31.8-52.7c-4.6-15.1-5.4-21.7-4.8-39.8c0.4-13.1,1-18,3.2-26.4c7-27,19.8-49.4,39.4-69	c28-28.1,62.2-43.6,104.2-47.3c31.4-2.9,66.8,4.3,97.8,19.7c21.6,10.7,36.8,22,53.7,39.6c49.1,51.5,63.6,123,38.9,191.3	c-26.4,73-91.6,127.1-171.5,142.4c-32.8,6.3-69.3,6-102.4-0.9C117.7,529.6,38.8,456.9,12.1,364c-23.3-80.9-5.6-170.4,48-242.1	c10.9-14.7,35.8-39.8,51-51.5c35.3-27.2,79-47.5,132.1-61.4C261.4,4.2,265.1,3.6,264.5,5.6z"/><path d="M264.5 90.6l-.3 64.1-3 1c-14.9 4.8-39.4 15.6-46.4 20.6-2.9 2.1-3.8 2.1-81.5 2.1-57.6 0-78.6-.3-78.6-1.1 0-1.9 9.7-19.1 16.4-29.2 10-14.9 20.2-27 34.7-41.2 32.4-31.6 71.6-54.4 121.4-70.9 13.1-4.3 32.1-9.4 35.3-9.5l2.2-.1L264.5 90.6zM730.7 182.4v4H587.1 443.4l-4.8-3.7c-2.7-2-4.9-3.8-4.9-4 0-.2 66.8-.3 148.5-.3h148.5V182.4zM194.7 190.2c-3 2.6-8.7 7.7-12.6 11.4l-7.1 6.8h-66.6H41.7l3.5-9.5c1.8-5.2 3.9-10.3 4.5-11.5 1.1-2 1.5-2 75.8-2l74.7.1L194.7 190.2z"/><path d="M730.7 212.4L730.7 216.4 602.9 216.4 475.1 216.4 471.2 212.4 467.3 208.4 599 208.4 730.7 208.4z"/><path d="M168.7 215.9c0 .3-2.2 3.8-4.9 7.8-2.6 3.9-6 9.1-7.5 11.4l-2.6 4.3H94.2c-33.6 0-59.6-.4-59.9-.9-.5-.8 4-20.5 5.1-22.4C39.9 215.3 168.7 215.1 168.7 215.9zM264.2 227.4v11.5l-29.2.3c-23.5.2-29.3 0-29.3-1.1 0-1.6 10.6-12 18.5-18.1l6-4.6 17 .2 17 .3V227.4zM730.7 242.4v4H612.8 494.9l-2.1-3.6c-1.2-1.9-2.1-3.7-2.1-4 0-.2 54-.4 120-.4h120V242.4zM150.1 248.1c-.4 1-2.3 6.4-4.3 12.1l-3.6 10.2-56.5-.2-56.5-.3.3-3c.1-1.7.8-6.9 1.4-11.8l1.1-8.7h59.4C147.7 246.4 150.9 246.5 150.1 248.1zM264.1 247.2c-.5.5-3.9 3-7.7 5.6-3.7 2.6-9.6 7.6-13.2 11.2l-6.5 6.4h-24.5c-19.2 0-24.5-.3-24.5-1.3 0-1.5 6.2-14.7 9.2-19.5l2-3.2H232C250.2 246.4 264.7 246.8 264.1 247.2zM730.7 274.4v4H619.3 507.9l-1.1-3.1c-.6-1.8-1.1-3.6-1.1-4 0-.5 50.6-.9 112.5-.9h112.5V274.4zM140.3 280.6c-.4 1.8-1 7-1.3 11.5l-.6 8.3H83.1 27.7V292c0-4.6.3-9.8.6-11.5l.7-3.1h56 56L140.3 280.6zM231.5 278.1c-3.1 6.1-6.2 13.8-7.1 17.5l-1.2 4.8H202c-17.5 0-21.3-.2-21.3-1.4 0-1.6 2.9-17.3 3.6-19.9.5-1.6 2.5-1.7 24.1-1.7C221.3 277.4 231.7 277.7 231.5 278.1zM730.7 304.4v4H622.3 513.9l-.4-3.5c-.2-2-.2-3.8.1-4 .2-.3 49.2-.5 108.8-.5h108.3V304.4zM138.8 316.6c.4 4.2.9 9.2 1.3 11.2l.7 3.6H86.3 31.9l-.6-2.8c-.8-3.8-2.6-16.3-2.6-18.5 0-1.6 3.1-1.7 54.8-1.5l54.7.3L138.8 316.6zM222.7 313.2c0 2.6.7 7.4 1.5 10.5.8 3.2 1.5 6.2 1.5 6.7 0 .6-8.3 1-20.9 1H184l-1.2-5.8c-.6-3.1-1.4-8.3-1.7-11.5l-.7-5.7h21.2 21.1V313.2z"/><path d="M730.7 335.4L730.7 339.4 624.2 339.4 517.7 339.4 517.7 335.4 517.7 331.4 624.2 331.4 730.7 331.4z"/><path d="M93.7 339.3l48.5.1 3.1 9.3c1.7 5 3.4 10 3.9 10.9.7 1.7-2.3 1.8-54.8 1.8H39l-2.8-10.6c-3.2-12-3.1-12.3 4.3-11.9C43.1 339 67 339.2 93.7 339.3zM227.2 339.4c2.5.1 3.6 1 6.5 5.6 1.9 3.1 6.1 8 9.2 11l5.7 5.4h-25.2-25.2l-2.7-4.3c-3.4-5.3-8.8-16.8-8.4-17.6C187.4 339 211.4 339 227.2 339.4zM730.7 365.4v4H623.2 515.7v-3.3c0-1.9.3-3.7.7-4 .3-.4 48.7-.7 107.5-.7h106.8V365.4zM156.7 375.1c1.8 3.2 5 8.1 7.1 11 2.2 2.9 3.9 5.5 3.9 5.8s-26.3.5-58.4.5H50.9l-3.2-7.7c-1.8-4.3-3.9-9.5-4.6-11.5l-1.3-3.8h55.8 55.9L156.7 375.1zM264.5 381.1l.3 11.3H251h-13.8l-7.5-4.1c-8.3-4.5-15.7-9.9-21-15.4l-3.4-3.5 29.4.2 29.5.3L264.5 381.1zM730.7 396.4v4h-111c-62.8 0-111-.4-111-.9s.3-2.3.6-4l.7-3.1h110.3 110.4V396.4zM178.3 403.5c3.6 3.8 15.3 13.5 21.4 17.6 15.4 10.4 36.8 18.7 57.8 22.4l7.2 1.2v40 40l-10.2-.7c-36.2-2.5-66.7-10.2-96.5-24.6-34-16.3-64.8-42-85.6-71.2-5.4-7.6-16.7-25.8-16.7-27 0-.4 26.9-.8 59.8-.8h59.8L178.3 403.5z"/><path d="M1806.2 9.4L1806.2 13.5 1315.4 13.5 824.7 13.5 824.7 9.4 824.7 5.4 1315.4 5.4 1806.2 5.4z"/><path d="M927.3 65.1c4.4 1.2 11.3 3.6 15.3 5.4 3.9 1.9 8.6 3.4 10.2 3.4 3.2 0 8.7-5.6 8.7-8.8 0-1.1 1.2-1.9 2.5-1.9 2.1 0 2.8 1.2 3.4 7 1.5 13.4 3.6 49.7 2.9 50.4-1.7 1.6-4.4-1.3-6-6.6-5-16.5-16.6-30.7-29.9-36.7-11-5.1-29.1-6.3-40.1-2.7-24.3 7.8-36.9 26.5-41.6 61.7-3.9 30 2.5 58.2 17 74.3 15.6 17.3 47.3 23.2 69.7 13 7.1-3.2 19-13.9 26.8-24.1 3.2-4.2 4.6-5 6.3-4 2 1.2 1.9 2-1.7 7.8-5.2 8.3-16.5 20.1-23.7 25.2-3.2 2.1-9.8 5.5-14.7 7.4-8.2 3.2-10.9 3.6-27.2 3.6-19.8.1-25.7-1.2-40.9-9.1-9.7-5-22.4-17.6-28.6-27.9-8-13.7-11.3-25.3-12.1-43.4-.4-12.5-.1-18.8 1.7-26.8 7.4-33.4 30-58.1 61-66.4C897.4 62.5 916.7 62.4 927.3 65.1zM1057.7 67c25.3.1 31.1.5 31.1 2 0 1.2-2.3 2.1-6.6 2.7-7.1.9-13.5 5.6-13.5 9.8 0 1.3 1.2 4.8 2.5 7.8 3.8 7.9 38.3 61.3 39.8 61.4.7 0 6.2-7.8 12.3-17.3 29.2-45.5 30.2-47.5 26.7-54.7-1.6-3.5-3.5-5-7.2-6-2.8-.8-5.9-1.5-6.8-1.5-1.1 0-1.6-.9-1.3-2.1.3-1.1.8-2 1.5-2 .5.1 13.7.1 29.1.1 24.1 0 28.2.3 28.2 2 0 1.1-1.1 2-2.3 2-4.6 0-15.8 6.3-20.9 11.5-2.8 2.8-16 22.3-29.1 43l-24.1 37.8V190c0 14.6.7 28.8 1.3 31.5 1.7 6.2 5.1 8.2 14.7 9.1 5.6.5 7.5 1.2 7.8 2.9.4 2.3-2 2.4-35.8 2.4-35.4 0-36.3 0-36.3-2.7 0-2.4.9-2.7 7.2-2.7 8.7 0 13.5-3.2 15.6-10.5.7-2.7 1.3-15.7 1.3-28.8v-23.7l-27.6-43c-29.1-45.1-32.3-48.9-43.7-52.4-7.5-2.3-7-6.6.7-5.8C1024.6 66.7 1040.6 67 1057.7 67zM1487.1 68.3c0 2-1.3 2.7-5.9 3.4-7.4 1.2-12.9 5.2-12.9 9.7 0 1.9 1.5 6.2 3.4 9.7 5.1 9.8 37.5 59.9 38.9 59.9 1.5 0 31.6-47.2 37-57.9 3.6-7.2 4-8.7 2.7-12.7-1.7-5.1-4.6-7.2-11.4-8.4-2.7-.5-4.8-1.7-4.8-2.7 0-2.3 9.5-2.8 37.8-2.3 15.8.3 21.2.8 21.2 2 0 .9-2.8 2.5-6.3 3.4-14.3 3.9-16.1 5.9-47.9 55.9l-22.3 34.9v27.6c0 16.8.5 29.4 1.5 31.9 1.9 5.4 5.4 7.2 14.6 8.2 5.6.5 7.5 1.2 7.8 2.9.4 2.3-2 2.4-35.8 2.4-35.4 0-36.3 0-36.3-2.7 0-2.4.9-2.7 7.2-2.7 5.8 0 8.2-.7 11-3.1 4.7-4 5.6-10.9 5.8-38.5l.1-20.9-26-40.4c-14.3-22.3-27.6-42.5-29.6-45.2-3.6-4.7-15.2-11.5-19.7-11.5-1.3 0-2.4-.9-2.4-2 0-1.7 5.2-2 35.9-2.4 19.7-.1 35.9-.4 36.2-.7C1486.9 65.9 1487.1 66.8 1487.1 68.3zM1706 67.1c5.6 0 4.6 3.8-1.3 4.8-10.2 1.7-13.5 5.8-11.3 13 .8 2.4 8 14.1 16.1 26.1l14.5 21.9 13.9-17.8c20.5-26.3 22.7-29.4 22.7-34.1 0-5.4-3.2-8.2-11-9.3-3.9-.7-6.4-1.6-6.4-2.7 0-2.5 1.6-2.7 32.4-2.3 22.9.3 27.9.7 27.9 2.3 0 1.1-2 2.3-5 2.8-13.1 2.3-20.1 8.6-44.2 39.7-11.1 14.2-20.9 27.1-21.9 28.7-1.6 2.5.3 5.9 21.3 37.1 30 44.8 35.8 51.1 48.4 53.1 2.9.5 4.8 1.7 5.1 3.2.4 2.1-2.1 2.3-35.8 2.3-35.4 0-36.3 0-36.3-2.7 0-2.1.9-2.7 4.7-2.7 5.8 0 11.4-5 11.4-9.9 0-3.2-34.5-57-36.5-57.1-1.5 0-40.4 50.4-41.8 54.2-2.7 7.1 2.3 12.9 11.3 12.9 3.1 0 4 .7 4 2.7 0 2.5-.9 2.7-30.3 2.7-27.4 0-30.2-.3-29.8-2.1.3-1.3 2.9-3.1 7-4.2 15.3-4.4 21.5-10.3 50.5-47.6l22.8-29.1-19-28.6c-27.6-41.7-34.5-48.8-50.3-52-5.2-1.1-7.2-2.1-7.2-3.8 0-2.1 2.9-2.3 35.1-2C1686.4 67 1703.9 67.1 1706 67.1z"/><path d="M1804.8 292.3L1804.8 296.4 1314.8 296.4 824.7 296.4 824.7 292.3 824.7 288.3 1314.8 288.3 1804.8 288.3z"/><path d="M901.8 348c12.3 2.5 23.7 8.3 32.6 16.4l7.1 6.4-8 7.9-8 7.9-7.1-5.5c-11.1-8.6-18.6-11.4-30.6-11.4-23.5 0-40.8 16.9-40.8 39.8-.1 18 7.4 30.8 21.7 37.9 6.7 3.2 9.1 3.8 19.7 3.8 13.8 0 20.5-2.5 30.6-11.4l5.9-5.2 7.5 7.6c4.3 4.3 7.6 8.3 7.6 9.1 0 2.1-14.6 13.3-22.4 17.2-9 4.6-16.5 6-29.9 6.2-25.9 0-46-11.3-56.7-31.8-5.5-10.7-7.6-19.8-7.6-33 0-25.9 12.2-45.3 35.5-56.6C873.9 346.1 885.9 344.6 901.8 348zM1631.2 348c12.2 2.5 22 7.5 30.3 15.2l6.7 6.3-8 7.9c-7.9 7.8-8 7.9-11.1 5.6-15.3-11.1-19.8-12.9-34.6-12.9-11.9 0-20.6 3.5-28.7 11.5-8 8-11.5 16.6-11.5 28.8 0 8.7.5 11.4 4 18.4 7.5 14.7 18.5 21.9 35.9 22.8 12.3.7 20.1-1.5 27.2-7.4 3.5-2.9 7.9-9.5 7.9-11.8 0-.4-7.5-.7-16.8-.7h-16.8v-11.4V409h30.2c26.3 0 30.3.3 31.1 2.1 1.5 4-2.3 21.3-7 30.8-4.4 9.1-13.1 19.2-21.5 24.7-15.7 10.5-45.1 10.7-65 .7-30.7-15.6-43-59.1-25.1-88.9C1573.7 353.3 1601.4 341.7 1631.2 348z"/><path d="M1212.5 399.2L1212.9 448.5 1230 448.9 1247.1 449.3 1247.1 460.6 1247.1 472 1218.2 472 1189.4 472 1189.4 411 1189.4 350 1200.8 350 1212.2 350z"/><path d="M1330.2 399.6L1330.2 449.2 1347 449.2 1363.7 449.2 1363.7 460.6 1363.7 472 1335.6 472 1307.4 472 1307.4 411 1307.4 350 1318.8 350 1330.2 350z"/><path d="M1491.1 361.4L1491.1 372.8 1469.6 372.8 1448.2 372.8 1448.2 383.5 1448.2 394.2 1469.6 394.2 1491.1 394.2 1491.1 405.6 1491.1 417 1469.6 417 1448.1 417 1448.5 432.7 1448.9 448.5 1470 448.9 1491.1 449.3 1491.1 460.6 1491.1 472 1458 471.7 1424.7 471.3 1424.3 410.6 1424.1 350 1457.6 350 1491.1 350z"/><path d="M1807.5 361.4L1807.5 372.8 1786.1 372.8 1764.6 372.8 1764.6 383.5 1764.6 394.2 1786.1 394.2 1807.5 394.2 1807.5 405.6 1807.5 417 1786.1 417 1764.6 417 1764.6 433.1 1764.6 449.2 1786.1 449.2 1807.5 449.2 1807.5 460.6 1807.5 472 1774 472 1740.5 472 1740.5 411 1740.5 350 1774 350 1807.5 350z"/><path d="M1804.8 539L1804.8 555.1 1314.8 555.1 824.7 555.1 824.7 539 824.7 523 1314.8 523 1804.8 523z"/><path d="M694.1,19.5c1.9-2.1,2.1-5.2,0.4-6.9c-0.7-0.7-3.6-1.2-6.5-1.2h-5.4l0.3,8.2c0.2,5.4,0.7,8.3,1.6,8.6 c0.8,0.2,1.2-0.8,1.2-3.2c0-4.9,3-4.9,6-0.1c1.2,1.9,2.8,3.5,3.6,3.5c2,0,1.8-1.3-0.7-4.4C692.6,21.5,692.6,21.2,694.1,19.5z"/><path d="M698.3 6.3c-4.2-2.6-12.1-2.5-16.4.1-9.6 5.9-9.6 19.2 0 26.4 3.7 2.6 11.2 2.7 15.9 0 3.7-2.1 7.9-9.2 7.9-13.3C705.7 15.5 701.7 8.4 698.3 6.3zM695 30.9c-4.8 2.3-9.8 1.2-14-3-2.9-2.9-3.3-4-3.3-8.3 0-6 3.2-10.6 8.3-12.1 4.6-1.3 4.6-1.3 9.3.9C705 13.1 704.9 26.2 695 30.9zM1399.6 233.7c-.3-1.6-2.3-2.7-6.4-3.4-9.7-1.6-19.6-7.4-26.1-15-3.4-3.9-12.7-16.4-20.9-27.8-8.3-11.4-17-23.5-19.6-26.9-4.2-5.8-4.4-6.6-2.1-7.2 19.3-6.2 31.6-16 35.9-28.6 3.4-10.5 2.4-25.9-2.4-33.9-7.2-12.3-18.8-19.8-34.9-22.5-8-1.3-66.5-2.4-83.7-1.6-6.3.3-8.4.9-8.4 2.3s1.6 2 5.1 2.1c8.4.1 14.1 2.7 16.6 7.9 2.1 4.3 2.4 10.6 2.4 72.1 0 58.7-.3 68.1-2.1 72-2.5 5.4-4.3 6.3-13.9 7.2-5.5.7-7.5 1.3-7.8 3.1-.4 2.3 2 2.4 35.8 2.4 35.4 0 36.3 0 36.3-2.7 0-2.4-.9-2.7-7.2-2.7-9.8 0-14.1-3.6-15.7-12.9-.5-3.6-1.1-18.8-1.1-33.8l-.1-27.1h8.6 8.7l26.3 36.5c14.5 20 27.4 37.8 28.6 39.6 2.3 2.9 2.9 2.9 25.5 3.1C1398.2 236 1400.1 235.9 1399.6 233.7zM1313.6 143.5c-7.1 3.5-10.6 4.3-21.5 5l-12.9.8.3-35.4.4-35.4 4.7-.9c2.5-.4 9.5-.7 15.6-.5 9 .3 11.9.9 17 3.9 18.4 10.7 22.7 36.9 8.8 53.6C1323.9 137.2 1318.3 141.2 1313.6 143.5zM1123.6 396.6c-4.4-20.8-21.9-40.4-42.1-47.2-8.4-2.8-23.5-3.8-32.2-2-21.3 4.3-40.4 21.1-47.5 41.6-9.7 28.2.7 59 25.5 75.9 18.5 12.6 47.1 13.1 67.3 1.3 7.5-4.4 19.4-17.3 23.3-25.2C1124.5 427.6 1126.7 411.3 1123.6 396.6zM1100.7 412.3c-.4 9-1.3 13.5-3.5 17.7-9.3 17.7-28.8 25.7-48 19.7-11.3-3.5-22.3-14.5-25.3-25.3-5.1-17.4.4-36.6 13.3-46.4 3.6-2.7 8.4-5.5 10.7-6.3 5.8-1.9 20.2-1.9 26.3-.1 8.8 2.7 17.6 10.5 22.5 20C1101.1 399.9 1101.2 400.8 1100.7 412.3z"/></svg>
        </a>
        <div class="flex space-x-2 items-center justify-start relative group mr-2" x-data="{userMenu:false}" x-on:click.away="userMenu = false" x-on:mouseenter="userMenu = true" x-on:mouseleave="userMenu = false">
            <a class="cursor-pointer flex space-x-2 items-center justify-start py-4 relative group-hover:bg-red-600 transition-all px-4">
                <img src="{{ strlen(Auth::user()->profile_photo_path) > 0 ? asset('images/avatar/'.Auth::user()->profile_photo_path) :asset('images/avatar.png') }}" alt="" class="w-8 h-8 rounded-full">
                <h4 class="font-medium text-sm text-white">
                    {{ Auth::user()->profile->first_name." ".Auth::user()->profile->last_name }}
                </h4>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>

            {{--drop down--}}
            <div class="absolute -left-2 top-16 flex flex-col divide-y divide-red-500 border-t border-red-500 rounded-br-lg rounded-bl-lg bg-red-600  shadow w-full overflow-hidden" x-show="userMenu" x-cloak>
                <a href="{{ route('admin.profile') }}" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 text-red-200 hover:text-white">Edit Profile</a>
                <a href="{{ route('admin.change-password') }}" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 text-red-200 hover:text-white">Change Password</a>
                <form method="POST" action="{{ route('logout') }}" class="px-4 py-2 hover:bg-white hover:bg-opacity-20 flex">
                    @csrf
                    <a href="{{ route('logout') }}" class="w-full text-red-200 hover:text-white" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            </div>
        </div>
    </div>

    <div class="flex">
        {{--sidebar--}}
        <div class="w-64 min-h-screen flex flex-col p-4 space-y-2 border-r bg-red-500 border-gray-200 bg-gradient-to-tr from-gray-100 to-white">
            {{--@if (Auth::user()->role == 'student')
                Student
            @elseif (Auth::user()->role == 'admin')
                Admin
            @elseif (Auth::user()->role == 'instructor')
                Instructor
            @endif--}}

            @include('layouts.admin-nav')
        </div>

        {{--content area--}}
        <div class="flex-grow flex flex-col shadow-2xl">
            {{--included content--}}
            <div class="flex flex-col flex-grow">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
{{--<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@livewireScripts
@livewire('livewire-ui-modal')
@yield('scripts')
</body>
</html>
