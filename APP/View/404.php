

<style>
    .rainbow_text_animated {
        background: linear-gradient(to right, #6666ff, #0099ff, #00ff00, #ff3399, #6666ff);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
        animation: rainbow_animation 6s ease-in-out infinite;
        background-size: 400% 100%;
    }

    @keyframes rainbow_animation {

        0%,
        100% {
            background-position: 0 0;
        }

        50% {
            background-position: 100% 0;
        }
    }
</style>

<div class="container w-full mx-auto">
    <h1 class="text-3xl">Error 404</h1>
    <h2 class="rainbow_text_animated text-2xl">Página não encontrada</h2>
</div>