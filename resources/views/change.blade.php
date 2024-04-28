<x-app-layout>
    <style>
        .text{
            color:white;

        }
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sales agent updating center') }}
        </h2>
    </x-slot>
    <div class="flex justify-start ms-10 ">
        <a href="{{route('update')}}"> <button class="btn btn-outline btn-error text-xl mt-5">Back</button></a>
</div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-[-40px]">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-[270px] text-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    Changing the renumeration(s) of applicant..
                </div>
            </div>
        </div>
    </div>
    @foreach ($list as $list)

    {{-- route --}}
    <div class="flex justify-center mt-16 ">
        <form action="{{route('updatedone')}}" method="POST">
        @csrf
        <label class="input input-bordered flex items-center gap-2 ">
                    Name
                    <input type="text" class="grow border-none" disabled="disabled" style="cursor:not-allowed" placeholder={{$list->name}} />
                </label>
                <label class="input input-bordered flex items-center gap-2 ">
                    Email
                    <input type="text" class="grow border-none" disabled="disabled" style="cursor:not-allowed" placeholder={{$list->email}} />
                </label>
                <label class="input input-bordered flex items-center gap-2 ">
                    Appointment ID
                    <input type="text" class="grow border-none text-gray-500" readonly="readongly" required style="cursor:not-allowed" value={{$list->appointment_id}} name="appointment_id" placeholder={{$list->appointment_id}} />
                </label>
        <label class="form-control w-full max-w-2xl">
            <div class="bg-white dark:bg-gray-800 overflow-clip shadow-sm sm:rounded-lg mx-auto text-xl">
            <label class="input input-bordered flex items-center gap-2 ">
                Down Payment (RM):
                <input type="number" class="grow border-none" required value={{$list->down_payment_amount}} placeholder="Current amount: {{$list->down_payment_amount}}" name="down_payment_amount" />
            </label>
            <label class="input input-bordered flex items-center gap-2 ">
                Purchase Status:
                <select type="text" class="grow border-none bg-inherit"  name="purchase_status" >
                    <option value="1">Ongoing</option>
                    <option value="0">Cancel</option>
                </select>
            </label>

            </div>

            <input type="submit" value="Change" class="btn btn-ghost text-lg mb-5 mt-5"></input>

        </label>
        </form>

    </div>
    @endforeach



</x-app-layout>



