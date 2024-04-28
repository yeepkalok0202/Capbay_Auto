<x-app-layout>
    <style>
        .text{
            color:white;

        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Applicant Details') }}
        </h2>

    </x-slot>
    @foreach ($list as $list)

    <div class="py-12 flex justify-center">
        <div class="max-w-7xl mx-7 sm:px-6 lg:px-8 mb-[-70px]">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-[270px] text-xl">
                <label class="input input-bordered flex items-center gap-2 ">
                    Name
                    <input type="text" class="grow border-none" disabled="disabled" placeholder={{$list->name}} />
                </label>
                <label class="input input-bordered flex items-center gap-2 ">
                    Email
                    <input type="text" class="grow border-none" disabled="disabled" placeholder={{$list->email}} />
                </label>
                <label class="input input-bordered flex items-center gap-2 ">
                    Appointment ID
                    <input type="text" class="grow border-none" disabled="disabled" placeholder={{$list->appointment_id}} />
                </label>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 mb-[-70px]">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-5">
            <div class="stats bg-primary text-primary-content flex justify-center ">

            <div class="stat">
            <div class="stat-title text-white">Down Payment Amount</div>
            <div class="stat-value">RM {{$list->down_payment_amount}}</div>
            <div class="stat-actions">
                <button class="btn btn-sm {{$list->promotion_eligibility?'bg-green-600':'bg-red-700'}} text-white border-none"  >{{$list->promotion_eligibility?'Eligible for promotion':'Not Eligible for promotion'}}</button>
                <button class="btn btn-sm">{{(($list->down_payment_amount)/200000)*100}}% down payment</button>
            </div>
            </div>

            <div class="stat">
            <div class="stat-title  text-white">Current loan balance</div>
            <div class="stat-value">RM {{$list->loan_amount}}</div>
            <div class="stat-actions">
                <button class="btn btn-sm {{$list->purchase_status?'bg-green-600':'bg-red-700'}} text-white border-none"  >{{$list->purchase_status?'Ongoing Purchase':'Purchase Cancelled'}}</button>
                <button class="btn btn-sm">{{((200000-$list->down_payment_amount)/200000)*100}}% loan amount</button>
            </div>
            </div>

        </div>
    </div>
    <p>- Discount shall be dealed with respective sales dealer -</p>

    @endforeach

                </div>
            </div>
        </div>
    </div>


</x-app-layout>

