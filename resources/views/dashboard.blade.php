<head>
    <title>Alkhabi Laundry - Dashboard</title>
</head>
<x-app-layout>
    <div class="bg-pink-50 font-sans -mt-20">
        @include('hero')
        @include('layanan')
        @include('pricing')
        @include('aboutus')
        @include('contact')
    </div>

    @if (session('status'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    title: 'Sukses!',
                    text: "{{ session('status') }}",
                    icon: 'success',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false,
                    toast: true,
                    position: 'top-end',
                    customClass: {
                        popup: 'mt-24 mr-4' 
                    }
                });
            });
        </script>
    @endif

    @push('scripts')
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetElement = document.querySelector(this.getAttribute('href'));
                if (targetElement) {
                    const offsetTop = targetElement.offsetTop - 100;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
    @endpush

</x-app-layout>
