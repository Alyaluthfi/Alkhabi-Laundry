<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alkhabi Laundry - Layanan Laundry Terbaik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .pink-gradient {
            background: linear-gradient(135deg, #fbcfe8 0%, #db2777 100%);
        }

        .text-shadow {
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body class="bg-pink-50 font-sans">
    @include('navbar')
    @include('hero')
    @include('layanan')
    @include('pricing')
    @include('aboutus')
    @include('contact')
    @include('footer')

    <script>
        const mobileMenuButton = document.querySelector('.mobile-menu-button');
        const mobileMenu = document.querySelector('.mobile-menu');

        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');

            const icons = mobileMenuButton.querySelectorAll('svg');
            icons.forEach(icon => {
                icon.classList.toggle('hidden');
            });
        });

        const mobileLinks = document.querySelectorAll('.mobile-menu a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.add('hidden');

                const icons = mobileMenuButton.querySelectorAll('svg');
                icons[0].classList.remove('hidden');
                icons[1].classList.add('hidden');
            });
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>