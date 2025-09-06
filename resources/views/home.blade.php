<x-guest-layout>
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
</x-guest-layout>