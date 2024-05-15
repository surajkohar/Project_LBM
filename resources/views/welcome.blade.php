<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LBM SOLUTIONS</title>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-500 text-white font-sans">

    <!-- Navbar -->
    <header class="flex justify-between items-center py-6 px-10">
        <div class="text-xl font-bold">Start</div>
        <nav class="space-x-8">

            @if (auth()->check())
                <a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="hover:underline text-white">Log Out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:underline">Log in</a>
                <a href="{{ route('register') }}" class="hover:underline ">Register</a>
            @endif
        </nav>
    </header>

    <!-- Main Section -->
    <section class="flex flex-col items-center text-center py-20 px-4">
        <h1 class="text-4xl font-extrabold mb-4">LBM SOLUTIONS</h1>
        <p class="max-w-xl text-lg mb-8">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias consectetur illum quo temporibus perferendis
            unde neque reprehenderit animi deleniti sunt. </p>
        <form class="flex items-center space-x-2">
            <input type="email" placeholder="Your email"
                class="px-4 py-2 text-gray-900 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-400">
            <button type="submit"
                class="px-6 py-2 bg-green-500 rounded-full text-white hover:bg-green-400">Send</button>
        </form>
        <p class="mt-4 text-sm">
            By signing up, you agree to the <a href="#" class="underline">Terms of Service</a>
        </p>
    </section>

</body>

</html>
