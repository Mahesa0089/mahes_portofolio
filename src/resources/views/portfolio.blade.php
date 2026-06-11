<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $profile->name ?? 'Portfolio' }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">

    <style>
        #cursor-glow{
            position: fixed;
            width: 300px;
            height: 300px;
            border-radius: 9999px;
            background: radial-gradient(
                circle,
                rgba(161, 186, 255, 0.8),
                rgba(138, 71, 255, 0.3)
            );
            filter: blur(100px);
            pointer-events: none;
            transform: translate(-50%, -50%);
            z-index: 9999;
            opacity: .8;
        }
    </style>

</head>
<body class="bg-gray-100 relative overflow-x-hidden">

    <!-- HERO -->
    <section class="bg-slate-900 text-white">
        <div class="max-w-6xl mx-auto px-6 py-20 text-center">

            @if($profile && $profile->photo)
                <img
                    src="{{ asset('storage/'.$profile->photo) }}"
                    alt=""
                    class="w-44 h-44 rounded-full object-cover border-4 border-white shadow-lg transition duration-300 hover:scale-110"
                >
            @endif

      <div class="flex flex-col md:flex-row md:justify-between md:items-start mt-6">

    <div class="max-w-xl">    
        <h1 class="text-4xl font-bold">
            {{ $profile->name }}
        </h1>

        <p class="text-xl text-gray-300 mt-3 text-left">
            {{ $profile->headline }}
        </p>
    </div>

    <div class="mt-4 md:mt-0 text-right">

        @if($profile->cv_file)
            <a
                href="{{ asset('storage/'.$profile->cv_file) }}"
                target="_blank"
                class="inline-block bg-blue-600 hover:bg-red-600 hover:shadow-[0_0_30px_rgba(34,211,238,0.8)] hover:scale-110 transition duration-300 px-8 py-4 rounded-xl text-xl font-semibold cursor-pointer"
            >
                Download CV
            </a>
        @endif

        <div class="flex flex-wrap gap-3 justify-end mt-4">

            <span class="bg-blue-600 px-8 py-4 rounded-full text-xl shadow-[0_0_20px_rgba(37,99,235,0.5)] hover:bg-red-600 hover:shadow-[0_0_30px_rgba(34,211,238,0.8)] hover:scale-110 transition duration-300 cursor-pointer">
                {{ $profile->email }}
            </span>

            <span class="bg-blue-600 px-8 py-4 rounded-full text-xl shadow-[0_0_20px_rgba(37,99,235,0.5)] hover:bg-red-600 hover:shadow-[0_0_30px_rgba(34,211,238,0.8)] hover:scale-110 transition duration-300 cursor-pointer">
                {{ $profile->phone }}
            </span>

            <span class="bg-blue-600 px-8 py-4 rounded-full text-xl shadow-[0_0_20px_rgba(37,99,235,0.5)] hover:bg-red-600 hover:shadow-[0_0_30px_rgba(34,211,238,0.8)] hover:scale-110 transition duration-300 cursor-pointer">
                {{ $profile->location }}
            </span>

        </div>

    </div>

</div>
    </section>

    <!-- ABOUT -->
    <section class="max-w-6xl mx-auto px-6 py-16" data-aos="fade-up">
    
        <h2 class="text-4xl font-bold mb-8">
            Tentang Saya
        </h2>

        <div class="bg-white rounded-xl p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
            <p class="text-lg leading-8 text-gray-700">
                {{ $profile->about }}
            </p>
        </div>

    </section>

    <!-- PENDIDIKAN -->
    <section class="max-w-6xl mx-auto px-6 py-10" data-aos="fade-up">

        <h2 class="text-4xl font-bold mb-8">
            Pendidikan
        </h2>

        <div class="grid md:grid-cols-2 gap-6">

            <div class="bg-white rounded-xl p-6 shadow transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <h3 class="font-bold text-xl mb-2">
                    SMK Desain Komunikasi Visual (DKV)
                </h3>

                <p class="text-gray-600">
                    Mempelajari desain grafis, editing foto,
                    editing video, branding, tipografi,
                    dan komunikasi visual.
                </p>
            </div>

            <div class="bg-white rounded-xl p-6 shadow transition duration-300 hover:-translate-y-2 hover:shadow-2xl">
                <h3 class="font-bold text-xl mb-2">
                    S1 Ilmu Komputer
                </h3>

                <p class="text-gray-600">
                    Fokus pada pengembangan website menggunakan
                    Laravel, Filament, Livewire, MariaDB,
                    Docker, dan teknologi web modern.
                </p>
            </div>

        </div>

    </section>

    <!-- SKILL -->
    <section class="max-w-6xl mx-auto px-6 py-16" data-aos="fade-right">

        <h2 class="text-4xl font-bold mb-8">
            Skills
        </h2>

        <div class="bg-white rounded-xl p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

            @foreach($skills as $skill)

                <div class="mb-6">

                    <div class="flex justify-between mb-2">
                        <span class="font-semibold">
                            {{ $skill->name }}
                        </span>

                        <span>
                            {{ $skill->level }}%
                        </span>
                    </div>

                    <div class="w-full bg-gray-200 rounded-full h-4">
                        <div
                            class="bg-blue-600 h-4 rounded-full"
                            style="width: {{ $skill->level }}%"
                        ></div>
                    </div>

                </div>

            @endforeach

        </div>

    </section>

    <!-- PROJECT -->
    <section class="max-w-6xl mx-auto px-6 py-16" data-aos="zoom-in-up">

        <h2 class="text-4xl font-bold mb-8">
            Projects
        </h2>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

            @foreach($projects as $project)

                <div class="bg-white rounded-xl overflow-hidden shadow-lg transition duration-300 hover:-translate-y-2 hover:shadow-2xl">

                    @if($project->image)
                        <img
                            src="{{ asset('storage/'.$project->image) }}"
                            class="w-full h-52 object-contain bg-gray-100 p-6"
                        >
                    @endif

                    <div class="p-6">

                        <h3 class="font-bold text-xl mb-3">
                            {{ $project->title }}
                        </h3>

                        <p class="text-gray-600 mb-4">
                            {{ $project->description }}
                        </p>

                        <div class="mb-4">
                            <span class="bg-gray-200 px-3 py-1 rounded-full text-sm">
                                {{ $project->technologies }}
                            </span>
                        </div>

                        <div class="flex gap-3">

                            @if($project->github_url)
                                <a
                                    href="{{ $project->github_url }}"
                                    target="_blank"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-red-600 hover:scale-110 hover:shadow-[0_0_30px_rgba(255,255,255,0.6)] transition duration-300"
                                >
                                    Github
                                </a>
                            @endif

                            @if($project->demo_url)
                                <a
                                    href="{{ $project->demo_url }}"
                                    target="_blank"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-red-600 hover:scale-110 hover:shadow-[0_0_30px_rgba(255,255,255,0.6)] transition duration-300"
                                >
                                    Demo
                                </a>
                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </section>

    <!-- CONTACT -->
    <section class="bg-slate-900 text-white mt-20" data-aos="fade-up">

        <div class="max-w-6xl mx-auto px-6 py-16 text-center">

            <h2 class="text-4xl font-bold mb-6">
                Contact
            </h2>

            <p class="mb-3">
                📧 {{ $profile->email }}
            </p>

            <p class="mb-3">
                📱 {{ $profile->phone }}
            </p>

            <p>
                📍 {{ $profile->location }}
            </p>

        </div>

    </section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

<script>
AOS.init({
    duration: 1200,
    once: false,
    mirror: true,
    easing: 'ease-in-out'
});
</script>

<div id="cursor-glow"></div>

<script>
const glow = document.getElementById('cursor-glow');

document.addEventListener('mousemove', (e) => {
    glow.style.left = e.clientX + 'px';
    glow.style.top = e.clientY + 'px';
});
</script>

</body>
</html>