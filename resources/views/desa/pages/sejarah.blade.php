<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./output.css" rel="stylesheet">
    <title>Desa Kedang murung | Website Profile</title>
    {{-- logo --}}
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>

    {{-- navbar --}}
    @include('layouts.navbar')
    <section>
        <div class="container mx-auto min-h-screen px-8 mt-7">
            <div>
                <div class="p-4 mb-3 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mt-2"
                    role="alert">
                    <span class="font-medium"><a href="/">Home</a> / </span> Artikel Terbaru
                </div>
                <h1 class="text-3xl font-bold">Sejarah Desa Kedang Murung</h1>
                <p class="my-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa omnis ducimus beatae
                    cum obcaecati
                    similique mollitia deserunt magnam architecto recusandae, nostrum non quo perspiciatis delectus
                    saepe consequatur, harum optio facere vitae possimus dicta reiciendis id incidunt voluptate. Laborum
                    animi eligendi dolore veniam doloribus quasi nisi sit, reiciendis obcaecati, non natus sed expedita!
                    Ut, error cupiditate velit tempora rerum reprehenderit adipisci dolorum quisquam earum totam
                    molestiae consectetur facilis tenetur quod impedit officia necessitatibus dolore in corrupti
                    perferendis non deserunt pariatur atque maiores? Maiores molestiae iure, perspiciatis quibusdam
                    obcaecati mollitia tempora iste veniam quisquam fugit nostrum sunt fugiat ullam ratione praesentium,
                    qui officiis atque facere sequi voluptatem, cum adipisci at vero. Sequi quasi praesentium iure eos?
                    Quasi quia harum nobis dolorem ea quisquam, nihil voluptatibus earum excepturi autem veritatis
                    obcaecati rem aperiam ipsam. Voluptatum quo nemo, sequi eum non minus quod illo optio nobis modi
                    quisquam cum voluptas iusto, explicabo, distinctio cupiditate!</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus pariatur sunt tempora architecto,
                    ipsum nam non blanditiis id animi, tempore quidem delectus expedita sapiente consequuntur ipsa dolor
                    incidunt eius, debitis minima odio. Natus excepturi, dolor nostrum error quia obcaecati recusandae,
                    magni quo id consectetur in reiciendis veniam iusto eligendi blanditiis.</p>
            </div>
        </div>
    </section>
    {{-- footer --}}
    @include('layouts.footer')



    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
</body>

</html>
