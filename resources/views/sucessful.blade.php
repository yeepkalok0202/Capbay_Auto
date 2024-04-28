<x-app-layout>
    <style>
        .text{
            color:white;

        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registration Succesful') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a style="font-size: 30px;">{{ __("Registration successful ! It will be process withing 3 working days...") }}<p>
                    <a id="countdown">Redirecting back to the registration page in <span id="countdown-number">3</span> seconds...</a>

                </div>
            </div>
        </div>
    </div>

    <script>
        let countdown = 3;
        let countdownElement = document.getElementById('countdown-number');
        function updateCountdown() {
            countdown--;
            countdownElement.textContent = countdown;

            if (countdown <= 0) {
                clearInterval(intervalId); // Stop the countdown
                window.location.href = "{{ route('register') }}"; // Redirect to the registration page
            }
        }

        // Update the countdown every second
        let intervalId = setInterval(updateCountdown, 1000);
    </script>
</x-app-layout>

