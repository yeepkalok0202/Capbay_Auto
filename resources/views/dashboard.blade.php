<x-app-layout>

    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registration Slot for CapBay Vroom') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-[270px] text-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    {{ __("Fill in your registration detail(s)") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-7">
        <div class="max-w-7xl mx-96 mb-9 mt-[-20px] sm:px-6 lg:px-8" >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" >
            <form action="{{route('profile.store')}}" method="POST" style="display:flex;flex-direction: column;justify-content:space-evenly;margin-inline:100px;" >
                @csrf

                @if ($registered)
                <label class=" text-gray-900 dark:text-gray-100 mt-10" for="phone_number">Phone Number (+60)</label></br>
                <input type="number" id="phone_number" name="phone_number" required min="0" disabled="disabled" style="background-color: gray;cursor:not-allowed"></input></br>
                <label class=" text-gray-900 dark:text-gray-100 mt-3" for="down_payment">Down Payment Amount (RM)</label></br>
                <input type="number" id="down_payment" name="down_payment" required disabled="disabled" style="background-color: gray;cursor:not-allowed"></input></br>
                <input type="submit" disabled="disabled" value="You had registered ! " style="font-size:130%;color:white;cursor:not-allowed;background-color:green;padding-block:10px;margin-top:20px;margin-bottom:10px"></br>
                @else
                <label class=" text-gray-900 dark:text-gray-100 mt-10" for="phone_number">Phone Number (+60)</label></br>
                <input type="number" id="phone_number" name="phone_number" required min="0"></input></br>
                <label class=" text-gray-900 dark:text-gray-100 mt-3" for="down_payment">Down Payment Amount (RM)</label></br>
                <input type="number" id="down_payment" name="down_payment" required></input></br>
                <input type="submit" value="Register Now!" style="font-size:130%;color:white;cursor: pointer;padding-block:10px;margin-top:20px;margin-bottom:10px"></br>

                @endif
            </form>
            </div>
        </div>
    </div>
    <div>

    </div>
</x-app-layout>

