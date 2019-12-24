<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="theme-color" content="#3949AB">
    <meta name="description" content="Автор: -, назначение: баловство">
    <link rel="shortcut icon" href="favicon.png">
    <link rel="manifest" href="manifest.json">
    <title>Captured on MDB</title>
    <link href="mdbcss/min/bootstrap.min.css" rel="stylesheet">
    <link href="mdbcss/min/mdb.min.css" rel="stylesheet">
    <link href="mdbcss/min/style.css" rel="stylesheet">
    <style>
        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            margin: -1px;
            border: 0;
            padding: 0;
            white-space: nowrap;
            -webkit-clip-path: inset(100%);
            clip-path: inset(100%);
            clip: rect(0 0 0 0);
            overflow: hidden;
        }
    </style>
</head>

<body>
<div style="display: none;">
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none">
        <symbol id="address-card" viewbox="0 0 576 512">
            <path
                d="M528 32H48C21.5 32 0 53.5 0 80v352c0 26.5 21.5 48 48 48h480c26.5 0 48-21.5 48-48V80c0-26.5-21.5-48-48-48zm0 400H48V80h480v352zM208 256c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm-89.6 128h179.2c12.4 0 22.4-8.6 22.4-19.2v-19.2c0-31.8-30.1-57.6-67.2-57.6-10.8 0-18.7 8-44.8 8-26.9 0-33.4-8-44.8-8-37.1 0-67.2 25.8-67.2 57.6v19.2c0 10.6 10 19.2 22.4 19.2zM360 320h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8zm0-64h112c4.4 0 8-3.6 8-8v-16c0-4.4-3.6-8-8-8H360c-4.4 0-8 3.6-8 8v16c0 4.4 3.6 8 8 8z"/>
        </symbol>
        <symbol id="align-justify" viewbox="0 0 448 512">
            <path
                d="M432 416H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16a16 16 0 0 0-16 16v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16v-32a16 16 0 0 0-16-16zm0-128H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16z"/>
        </symbol>
        <symbol id="bars" viewbox="0 0 448 512">
            <path
                d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"/>
        </symbol>
        <symbol id="camera" viewbox="0 0 512 512">
            <path
                d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"/>
        </symbol>
        <symbol id="comment" viewbox="0 0 512 512">
            <path
                d="M256 32C114.6 32 0 125.1 0 240c0 47.6 19.9 91.2 52.9 126.3C38 405.7 7 439.1 6.5 439.5c-6.6 7-8.4 17.2-4.6 26S14.4 480 24 480c61.5 0 110-25.7 139.1-46.3C192 442.8 223.2 448 256 448c141.4 0 256-93.1 256-208S397.4 32 256 32zm0 368c-26.7 0-53.1-4.1-78.4-12.1l-22.7-7.2-19.5 13.8c-14.3 10.1-33.9 21.4-57.5 29 7.3-12.1 14.4-25.7 19.9-40.2l10.6-28.1-20.6-21.8C69.7 314.1 48 282.2 48 240c0-88.2 93.3-160 208-160s208 71.8 208 160-93.3 160-208 160z"/>
        </symbol>
        <symbol id="comments" viewbox="0 0 576 512">
            <path
                d="M532 386.2c27.5-27.1 44-61.1 44-98.2 0-80-76.5-146.1-176.2-157.9C368.3 72.5 294.3 32 208 32 93.1 32 0 103.6 0 192c0 37 16.5 71 44 98.2-15.3 30.7-37.3 54.5-37.7 54.9-6.3 6.7-8.1 16.5-4.4 25 3.6 8.5 12 14 21.2 14 53.5 0 96.7-20.2 125.2-38.8 9.2 2.1 18.7 3.7 28.4 4.9C208.1 407.6 281.8 448 368 448c20.8 0 40.8-2.4 59.8-6.8C456.3 459.7 499.4 480 553 480c9.2 0 17.5-5.5 21.2-14 3.6-8.5 1.9-18.3-4.4-25-.4-.3-22.5-24.1-37.8-54.8zm-392.8-92.3L122.1 305c-14.1 9.1-28.5 16.3-43.1 21.4 2.7-4.7 5.4-9.7 8-14.8l15.5-31.1L77.7 256C64.2 242.6 48 220.7 48 192c0-60.7 73.3-112 160-112s160 51.3 160 112-73.3 112-160 112c-16.5 0-33-1.9-49-5.6l-19.8-4.5zM498.3 352l-24.7 24.4 15.5 31.1c2.6 5.1 5.3 10.1 8 14.8-14.6-5.1-29-12.3-43.1-21.4l-17.1-11.1-19.9 4.6c-16 3.7-32.5 5.6-49 5.6-54 0-102.2-20.1-131.3-49.7C338 339.5 416 272.9 416 192c0-3.4-.4-6.7-.7-10C479.7 196.5 528 238.8 528 288c0 28.7-16.2 50.6-29.7 64z"/>
        </symbol>
        <symbol id="eye" viewbox="0 0 576 512">
            <path
                d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"/>
        </symbol>
        <symbol id="file-signature" viewbox="0 0 576 512">
            <path
                d="M218.17 424.14c-2.95-5.92-8.09-6.52-10.17-6.52s-7.22.59-10.02 6.19l-7.67 15.34c-6.37 12.78-25.03 11.37-29.48-2.09L144 386.59l-10.61 31.88c-5.89 17.66-22.38 29.53-41 29.53H80c-8.84 0-16-7.16-16-16s7.16-16 16-16h12.39c4.83 0 9.11-3.08 10.64-7.66l18.19-54.64c3.3-9.81 12.44-16.41 22.78-16.41s19.48 6.59 22.77 16.41l13.88 41.64c19.75-16.19 54.06-9.7 66 14.16 1.89 3.78 5.49 5.95 9.36 6.26v-82.12l128-127.09V160H248c-13.2 0-24-10.8-24-24V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24v-40l-128-.11c-16.12-.31-30.58-9.28-37.83-23.75zM384 121.9c0-6.3-2.5-12.4-7-16.9L279.1 7c-4.5-4.5-10.6-7-17-7H256v128h128v-6.1zm-96 225.06V416h68.99l161.68-162.78-67.88-67.88L288 346.96zm280.54-179.63l-31.87-31.87c-9.94-9.94-26.07-9.94-36.01 0l-27.25 27.25 67.88 67.88 27.25-27.25c9.95-9.94 9.95-26.07 0-36.01z"/>
        </symbol>
        <symbol id="filter" viewbox="0 0 512 512">
            <path
                d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"/>
        </symbol>
        <symbol id="grin-tears" viewbox="0 0 640 512">
            <path
                d="M102.4 256.1c-22.6 3.2-73.5 12-88.3 26.8-19.1 19.1-18.8 50.6.8 70.2s51 19.9 70.2.7c14.8-14.8 23.5-65.7 26.8-88.3.8-5.5-3.9-10.2-9.5-9.4zm523.4 26.8c-14.8-14.8-65.7-23.5-88.3-26.8-5.5-.8-10.3 3.9-9.5 9.5 3.2 22.6 12 73.5 26.8 88.3 19.2 19.2 50.6 18.9 70.2-.7s20-51.2.8-70.3zm-129.4-12.8c-3.8-26.6 19.1-49.5 45.7-45.7 8.9 1.3 16.8 2.7 24.3 4.1C552.7 104.5 447.7 8 320 8S87.3 104.5 73.6 228.5c7.5-1.4 15.4-2.8 24.3-4.1 33.2-3.9 48.6 25.3 45.7 45.7-11.8 82.3-29.9 100.4-35.8 106.4-.9.9-2 1.6-3 2.5 42.7 74.6 123 125 215.2 125s172.5-50.4 215.2-125.1c-1-.9-2.1-1.5-3-2.5-5.9-5.9-24-24-35.8-106.3zM400 152c23.8 0 52.7 29.3 56 71.4.7 8.6-10.8 12-14.9 4.5l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.2 7.4-15.6 4-14.9-4.5 3.1-42.1 32-71.4 55.8-71.4zm-160 0c23.8 0 52.7 29.3 56 71.4.7 8.6-10.8 12-14.9 4.5l-9.5-17c-7.7-13.7-19.2-21.6-31.5-21.6s-23.8 7.9-31.5 21.6l-9.5 17c-4.2 7.4-15.6 4-14.9-4.5 3.1-42.1 32-71.4 55.8-71.4zm80 280c-60.6 0-134.5-38.3-143.8-93.3-2-11.7 9.2-21.6 20.7-17.9C227.1 330.5 272 336 320 336s92.9-5.5 123.1-15.2c11.4-3.7 22.6 6.1 20.7 17.9-9.3 55-83.2 93.3-143.8 93.3z"/>
        </symbol>
        <symbol id="heart" viewbox="0 0 512 512">
            <path
                d="M458.4 64.3C400.6 15.7 311.3 23 256 79.3 200.7 23 111.4 15.6 53.6 64.3-21.6 127.6-10.6 230.8 43 285.5l175.4 178.7c10 10.2 23.4 15.9 37.6 15.9 14.3 0 27.6-5.6 37.6-15.8L469 285.6c53.5-54.7 64.7-157.9-10.6-221.3zm-23.6 187.5L259.4 430.5c-2.4 2.4-4.4 2.4-6.8 0L77.2 251.8c-36.5-37.2-43.9-107.6 7.3-150.7 38.9-32.7 98.9-27.8 136.5 10.5l35 35.7 35-35.7c37.8-38.5 97.8-43.2 136.5-10.6 51.1 43.1 43.5 113.9 7.3 150.8z"/>
        </symbol>
        <symbol id="images" viewbox="0 0 576 512">
            <path
                d="M480 416v16c0 26.51-21.49 48-48 48H48c-26.51 0-48-21.49-48-48V176c0-26.51 21.49-48 48-48h16v208c0 44.112 35.888 80 80 80h336zm96-80V80c0-26.51-21.49-48-48-48H144c-26.51 0-48 21.49-48 48v256c0 26.51 21.49 48 48 48h384c26.51 0 48-21.49 48-48zM256 128c0 26.51-21.49 48-48 48s-48-21.49-48-48 21.49-48 48-48 48 21.49 48 48zm-96 144l55.515-55.515c4.686-4.686 12.284-4.686 16.971 0L272 256l135.515-135.515c4.686-4.686 12.284-4.686 16.971 0L512 208v112H160v-48z"/>
        </symbol>
        <symbol id="link" viewbox="0 0 512 512">
            <path
                d="M326.612 185.391c59.747 59.809 58.927 155.698.36 214.59-.11.12-.24.25-.36.37l-67.2 67.2c-59.27 59.27-155.699 59.262-214.96 0-59.27-59.26-59.27-155.7 0-214.96l37.106-37.106c9.84-9.84 26.786-3.3 27.294 10.606.648 17.722 3.826 35.527 9.69 52.721 1.986 5.822.567 12.262-3.783 16.612l-13.087 13.087c-28.026 28.026-28.905 73.66-1.155 101.96 28.024 28.579 74.086 28.749 102.325.51l67.2-67.19c28.191-28.191 28.073-73.757 0-101.83-3.701-3.694-7.429-6.564-10.341-8.569a16.037 16.037 0 0 1-6.947-12.606c-.396-10.567 3.348-21.456 11.698-29.806l21.054-21.055c5.521-5.521 14.182-6.199 20.584-1.731a152.482 152.482 0 0 1 20.522 17.197zM467.547 44.449c-59.261-59.262-155.69-59.27-214.96 0l-67.2 67.2c-.12.12-.25.25-.36.37-58.566 58.892-59.387 154.781.36 214.59a152.454 152.454 0 0 0 20.521 17.196c6.402 4.468 15.064 3.789 20.584-1.731l21.054-21.055c8.35-8.35 12.094-19.239 11.698-29.806a16.037 16.037 0 0 0-6.947-12.606c-2.912-2.005-6.64-4.875-10.341-8.569-28.073-28.073-28.191-73.639 0-101.83l67.2-67.19c28.239-28.239 74.3-28.069 102.325.51 27.75 28.3 26.872 73.934-1.155 101.96l-13.087 13.087c-4.35 4.35-5.769 10.79-3.783 16.612 5.864 17.194 9.042 34.999 9.69 52.721.509 13.906 17.454 20.446 27.294 10.606l37.106-37.106c59.271-59.259 59.271-155.699.001-214.959z"/>
        </symbol>
        <symbol id="paw" viewbox="0 0 512 512">
            <path
                d="M256 224c-79.41 0-192 122.76-192 200.25 0 34.9 26.81 55.75 71.74 55.75 48.84 0 81.09-25.08 120.26-25.08 39.51 0 71.85 25.08 120.26 25.08 44.93 0 71.74-20.85 71.74-55.75C448 346.76 335.41 224 256 224zm-147.28-12.61c-10.4-34.65-42.44-57.09-71.56-50.13-29.12 6.96-44.29 40.69-33.89 75.34 10.4 34.65 42.44 57.09 71.56 50.13 29.12-6.96 44.29-40.69 33.89-75.34zm84.72-20.78c30.94-8.14 46.42-49.94 34.58-93.36s-46.52-72.01-77.46-63.87-46.42 49.94-34.58 93.36c11.84 43.42 46.53 72.02 77.46 63.87zm281.39-29.34c-29.12-6.96-61.15 15.48-71.56 50.13-10.4 34.65 4.77 68.38 33.89 75.34 29.12 6.96 61.15-15.48 71.56-50.13 10.4-34.65-4.77-68.38-33.89-75.34zm-156.27 29.34c30.94 8.14 65.62-20.45 77.46-63.87 11.84-43.42-3.64-85.21-34.58-93.36s-65.62 20.45-77.46 63.87c-11.84 43.42 3.64 85.22 34.58 93.36z"/>
        </symbol>
        <symbol id="photo-video" viewbox="0 0 640 512">
            <path
                d="M608 0H160a32 32 0 0 0-32 32v96h160V64h192v320h128a32 32 0 0 0 32-32V32a32 32 0 0 0-32-32zM232 103a9 9 0 0 1-9 9h-30a9 9 0 0 1-9-9V73a9 9 0 0 1 9-9h30a9 9 0 0 1 9 9zm352 208a9 9 0 0 1-9 9h-30a9 9 0 0 1-9-9v-30a9 9 0 0 1 9-9h30a9 9 0 0 1 9 9zm0-104a9 9 0 0 1-9 9h-30a9 9 0 0 1-9-9v-30a9 9 0 0 1 9-9h30a9 9 0 0 1 9 9zm0-104a9 9 0 0 1-9 9h-30a9 9 0 0 1-9-9V73a9 9 0 0 1 9-9h30a9 9 0 0 1 9 9zm-168 57H32a32 32 0 0 0-32 32v288a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32zM96 224a32 32 0 1 1-32 32 32 32 0 0 1 32-32zm288 224H64v-32l64-64 32 32 128-128 96 96z"/>
        </symbol>
        <symbol id="plus" viewbox="0 0 448 512">
            <path
                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
        </symbol>
        <symbol id="quote-left" viewbox="0 0 512 512">
            <path
                d="M464 256h-80v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8c-88.4 0-160 71.6-160 160v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48zm-288 0H96v-64c0-35.3 28.7-64 64-64h8c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24h-8C71.6 32 0 103.6 0 192v240c0 26.5 21.5 48 48 48h128c26.5 0 48-21.5 48-48V304c0-26.5-21.5-48-48-48z"/>
        </symbol>
        <symbol id="quote-right" viewbox="0 0 512 512">
            <path
                d="M464 32H336c-26.5 0-48 21.5-48 48v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48zm-288 0H48C21.5 32 0 53.5 0 80v128c0 26.5 21.5 48 48 48h80v64c0 35.3-28.7 64-64 64h-8c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24h8c88.4 0 160-71.6 160-160V80c0-26.5-21.5-48-48-48z"/>
        </symbol>
        <symbol id="roger-white" viewbox="0 0 300 300">
            <g fill="white">
                <path
                    d="M4.3 55C2.5 56.1 1 57.2 1 57.4c0 .2 2.9 1.4 6.4 2.6 23.4 7.8 36.6 32.2 39.8 73.8 1.7 21.8-.6 42.2-6.8 61.7-4.3 13.3-17.4 34.3-27.3 44-2.3 2.1-4.1 4.2-4.1 4.6 0 .4 2.6-.1 5.7-1.1 12.1-3.7 19-4.4 28.6-2.7C59 243 64 240.1 68.5 226c1.8-5.7 4.5-9.9 4.5-7 0 .8-.7 4.2-1.5 7.5s-1.4 7.1-1.5 8.5v2.4l1.6-2.2c2.3-3.4 3.4-2.7 3.4 2.2 0 2.5.5 4.8 1 5.1 2.7 1.7 23.3 4.5 32.5 4.5 11.2 0 27.3-2.6 40.6-6.4 4.6-1.4 20.4-7.4 35.1-13.5 37.3-15.3 49.4-18.8 69.3-19.7 12.6-.6 23.3.8 29.7 4.1 4 2 4.3 1.9 5.6-.7.9-1.9 1.1-1.3 1.1 3.8.1 5.3-.3 6.5-2.4 8.6-1.4 1.4-4 3.3-5.8 4.2l-3.2 1.7 4-.6c6.8-1 12.8-4.6 14.8-8.7 3.9-8 3-22-2-27.8-4.2-5.1-7.6-6.2-21.5-7.2-7-.4-14-1.4-15.5-2-2.6-1.1-2.2-1.2 4.9-1.9 4.2-.3 9.3-1.5 11.5-2.5 3.3-1.6 3.8-2.4 4.1-5.7.2-2.1-.6-8.7-1.7-14.7-3-15.5-5.1-32.2-5.1-40.6 0-7.2 0-7.2-3.5-9.3-4.3-2.5-4.4-3.6-.2-5.1 2.9-1 3-1.2 1.5-2.4-2.6-1.9-2.2-2.6 1.6-2.6h3.4l-.1-18.3c0-10 .2-19.1.4-20.2 1.1-5.2-27.8-7.8-45.1-4.2-4.7 1-15 4.1-23 6.8-34.8 12-40.8 13.8-50.8 14.8-12.6 1.3-38.3-.1-63.6-3.5-10.4-1.3-19.4-2.3-20-2.1-.7.2-1.1 4.7-1.1 13.3 0 8.2-.5 13.6-1.2 14.9-1 1.6-1.2.2-1.3-8.2 0-11.2-1.4-19.5-3.5-21.3-1.1-.9-1.2-.4-.8 2.8.3 2.4.1 4.2-.6 4.6-.6.4-1.1.2-1.1-.4 0-2.6-5.4-9.1-9.6-11.6-6-3.5-19.5-8-31.3-10.5-11.7-2.4-13.8-2.4-17.8.1zM199 87.5c1.6.8 3.5 2.4 4.3 3.5 1.4 2 1.4 2 5.8-.5 9-5.1 19.6-2.5 22 5.4 1.1 3.6 1 4.5-1.2 8.7-3.4 6.7-7.5 8.7-16.2 8-6.6-.5-7-.4-11.8 3l-4.9 3.6 3.5 4.1c4.4 5.1 7.9 12.4 9.5 19.9 1.6 7.3.2 15.2-3.8 21.1-1.5 2.3-3.1 4.7-3.5 5.4-.5.8.9 1.9 3.9 3.2 2.6 1.2 4.8 2.1 4.9 2.1.2 0 .6-1.1.9-2.4.3-1.3 2.2-3.8 4.1-5.5 2.9-2.5 4.5-3.1 8.1-3.1 3.9 0 5.1.5 7.9 3.3 3.1 3.1 5.5 8.8 5.5 13 0 7.7-10.6 13.1-19.4 9.7-2.5-.9-2.6-.8-2.6 2.8 0 6.7-5 11.3-10 9.2-4.4-1.8-6.4-8.9-4-14.5.6-1.6-.1-2.9-3.3-6.3-2.3-2.3-4.4-4.2-4.8-4.2-.4 0-2.5 1-4.8 2.3l-4 2.3 2.9 4.5c1.7 2.4 3 4.7 3 5.2 0 .8-4.1 2.6-8.1 3.4-2.5.5-2.8.1-4.4-4.6-.9-2.8-2.1-5.1-2.6-5.1-1.3 0-1.2 1 1.1 7.5 1.1 3.2 1.9 5.9 1.8 6-.6.5-9.8 2.5-11.2 2.5-1.2 0-1.6-1.5-1.8-6.7-.2-4.4-.7-6.8-1.6-7.1-1.1-.3-1.2 1.2-.6 7.8l.7 8.1-6.4-.7c-3.5-.4-6.6-.8-6.7-1-.2-.1 0-3.4.5-7.3.7-5.4.6-7.1-.3-7.1-.7 0-1.5 2.3-1.9 6.1-.7 5.6-.9 6-2.9 5.5-1.1-.3-3.8-.9-5.8-1.2-2.1-.4-3.8-.8-3.8-1.1 0-.2.7-2 1.5-4 .8-1.9 1.5-4.1 1.5-4.8 0-.7-3.3-2.4-7.2-3.8l-7.3-2.6-4.1 4-4.1 4 3.5 3.5c3.1 3.1 3.4 3.9 2.9 7.2-.8 4.7-5.5 9.2-9.8 9.2-4 0-7.9-3.9-7.9-7.9v-3l-3.5 1.5c-5.1 2.1-11.7 1.8-14.9-.7-5.7-4.5-6.9-10.4-3.6-16.9 5.1-9.9 19.3-12.6 24.6-4.5l1.5 2.4 3.5-2.1 3.4-2-3.3-3.8c-8.1-8.8-8.9-20.8-2.4-34.4 2.1-4.4 3.4-8.2 3-8.6-.4-.4-2.6-1.9-4.7-3.3l-3.9-2.6-1.8 2.3c-4 5.1-16 5.5-20.4.6-4.4-4.9-2.4-15.9 3.7-20.4 3.1-2.2 11-2.6 14.6-.7 1.8.9 2.1.7 3.1-2.1 2.3-6.6 7-8.6 11.9-5.2 3 2.1 3.1 8.8.1 12l-2.1 2.2 3.2 4.7 3.2 4.6 6.6-6.3c7.9-7.6 11.8-10.1 19.1-12.2 6.4-1.9 12-2 19.3-.5 5.9 1.3 16.3 5.7 20.7 8.8 1.6 1.2 3.1 2.1 3.4 2.1.3 0 1.2-1.9 2-4.3 1.4-4.2 1.4-4.4-1.4-7.5-2.1-2.4-2.9-4.3-2.9-7 0-4.2.6-5.4 3.5-7 2.7-1.5 4.1-1.5 7.5.3z"/>
                <path
                    d="M132.8 118c-7 3.8-15.5 17-16.4 25.8-.7 5.9 2.4 12.2 7.9 16.6 2.9 2.4 5 3.1 9.7 3.4 8 .6 14.1-2.3 18.2-8.7 2.8-4.3 2.9-5.1 2.6-12.8-.4-6.8-1-9.2-3.9-15-3.5-7-8.2-11.3-12.3-11.3-1.2.1-3.8 1-5.8 2zm16.7 19.3c3.5 5.5 2.2 14.7-2.4 16.2-6.6 2.1-10.8-10.8-5.4-16.7 2.2-2.5 5.9-2.3 7.8.5zM168.8 123.3c-4.6 4.3-4.8 17.5-.5 25.2 5.7 10.1 23.3 11.5 29.9 2.5 2.4-3.2 3.2-8.6 2.4-14.5-.6-3.4-1.6-5.4-4.3-8-7.3-7.1-22.4-9.9-27.5-5.2zm6 14.9c1.9 1.9 1.4 7.3-.7 9.2-1.8 1.7-2 1.7-4-.3-2.3-2.3-2.7-5.2-1.1-8.2 1.2-2.1 4-2.5 5.8-.7zM162.2 159.2c-1.9 1.9-1.4 9.5.8 13.8 1.8 3.5 2.5 4 5.4 4 1.9 0 4.4-.8 5.6-1.8 3.3-2.6 2.1-8-2.9-13.2-3.9-4.1-6.7-5-8.9-2.8zM154.6 163.2c-3.5 5.3-3.9 12.2-.8 11.6 3.3-.6 5.5-9.2 3.3-12.7-.7-1.1-1.2-.8-2.5 1.1z"/>
            </g>
        </symbol>
        <symbol id="search" viewbox="0 0 512 512">
            <path
                d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"/>
        </symbol>
        <symbol id="smile" viewbox="0 0 496 512">
            <path
                d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm80 168c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm-160 0c17.7 0 32 14.3 32 32s-14.3 32-32 32-32-14.3-32-32 14.3-32 32-32zm194.8 170.2C334.3 380.4 292.5 400 248 400s-86.3-19.6-114.8-53.8c-13.6-16.3 11-36.7 24.6-20.5 22.4 26.9 55.2 42.2 90.2 42.2s67.8-15.4 90.2-42.2c13.4-16.2 38.1 4.2 24.6 20.5z"/>
        </symbol>
        <symbol id="star" viewbox="0 0 576 512">
            <path
                d="M528.1 171.5L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6zM388.6 312.3l23.7 138.4L288 385.4l-124.3 65.3 23.7-138.4-100.6-98 139-20.2 62.2-126 62.2 126 139 20.2-100.6 98z"/>
        </symbol>
        <symbol id="sync-alt" viewbox="0 0 512 512">
            <path
                d="M370.72 133.28C339.458 104.008 298.888 87.962 255.848 88c-77.458.068-144.328 53.178-162.791 126.85-1.344 5.363-6.122 9.15-11.651 9.15H24.103c-7.498 0-13.194-6.807-11.807-14.176C33.933 94.924 134.813 8 256 8c66.448 0 126.791 26.136 171.315 68.685L463.03 40.97C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.749zM32 296h134.059c21.382 0 32.09 25.851 16.971 40.971l-41.75 41.75c31.262 29.273 71.835 45.319 114.876 45.28 77.418-.07 144.315-53.144 162.787-126.849 1.344-5.363 6.122-9.15 11.651-9.15h57.304c7.498 0 13.194 6.807 11.807 14.176C478.067 417.076 377.187 504 256 504c-66.448 0-126.791-26.136-171.315-68.685L48.97 471.03C33.851 486.149 8 475.441 8 454.059V320c0-13.255 10.745-24 24-24z"/>
        </symbol>
        <symbol id="th" viewbox="0 0 512 512">
            <path
                d="M149.333 56v80c0 13.255-10.745 24-24 24H24c-13.255 0-24-10.745-24-24V56c0-13.255 10.745-24 24-24h101.333c13.255 0 24 10.745 24 24zm181.334 240v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm32-240v80c0 13.255 10.745 24 24 24H488c13.255 0 24-10.745 24-24V56c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24zm-32 80V56c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.256 0 24.001-10.745 24.001-24zm-205.334 56H24c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24zM0 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H24c-13.255 0-24 10.745-24 24zm386.667-56H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zm0 160H488c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H386.667c-13.255 0-24 10.745-24 24v80c0 13.255 10.745 24 24 24zM181.333 376v80c0 13.255 10.745 24 24 24h101.333c13.255 0 24-10.745 24-24v-80c0-13.255-10.745-24-24-24H205.333c-13.255 0-24 10.745-24 24z"/>
        </symbol>
        <symbol id="times-circle" viewbox="0 0 512 512">
            <path
                d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"/>
        </symbol>
        <symbol id="video" viewbox="0 0 576 512">
            <path
                d="M336.2 64H47.8C21.4 64 0 85.4 0 111.8v288.4C0 426.6 21.4 448 47.8 448h288.4c26.4 0 47.8-21.4 47.8-47.8V111.8c0-26.4-21.4-47.8-47.8-47.8zm189.4 37.7L416 177.3v157.4l109.6 75.5c21.2 14.6 50.4-.3 50.4-25.8V127.5c0-25.4-29.1-40.4-50.4-25.8z"/>
        </symbol>
    </svg>
</div>

<div class="d-flex flex-column" style="font-family: Arial, sans-serif;	min-height: 100vh;">

    <?= $header_content; ?>
    <?= $page_content; ?>

    <footer class="page-footer font-small mdb-color p-4 mt-auto text-center">

        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-auto">

            <!-- Grid row -->
            <div class="row align-items-center">

                <!-- Grid column -->
                <div class="col-12 col-md-10 mt-md-0 mt-3">

                    <!-- Content -->
                    <p><small>Идея проекта подсмотрена у <a class="font-italic" href="https://htmlacademy.ru">HTML
                                Academy</a></small></p>
                    <p class="p-0 m-0">
                        <small>Использована только идея и визуальный скелет проекта. Выполнено по принципу: "Что вижу -
                            то пою!"
                        </small>
                    </p>
                    <p class="p-0 m-0"><small>Контент изменен. Все совпадения с ТЗ случайны.</small></p>
                    <p>
                        <small>Оригинальная верстка заменена на верстку с использованием
                            <a class="font-italic"
                               href="https://mdbootstrap.com/previews/free-templates/blog/home-page.html">
                                Material Design Bootstrap
                            </a>
                        </small>
                    </p>
                </div>

                <div class="col-12 col-md-2 mt-md-0 mt-3">
                    <ul class="list-unstyled d-flex flex-row flex-md-column">
                        <li class="p-2">
                            <a href="popular.php" title="Популярные">
                                <?= get_inline_svg('star', 16, 16, "white", "white"); ?>
                                <span class="ml-2"><small>Популярные</small></span>
                            </a>
                        </li>
                        <li class="p-2">
                            <a href="feed.php" title="Моя лента">
                                <?= get_inline_svg('photo-video', 16, 16, "white", "white"); ?>
                                <span class="ml-2"><small>Моя лента</small></span>
                            </a>
                        </li>
                        <li class="p-2">
                            <a href="messages.php" title="Сообщения">
                                <?= get_inline_svg('comments', 16, 16, "white", "white"); ?>
                                <span class="ml-2"><small>Сообщения</small></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>

<?php if (!empty($js_scripts)): ?>
    <?php foreach ($js_scripts as $js_script): ?>
        <script src="../js/min/<?= $js_script; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>
<script src="../js/min/header.js"></script>
</body>

</html>
