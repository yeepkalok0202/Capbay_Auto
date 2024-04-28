<x-app-layout>
    <style>
        .text{
            color:white;

        }
    </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sales agent updating center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-[-70px]">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-[270px] text-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    Search, select and update !
                </div>
            </div>
        </div>
    </div>
    {{-- route --}}
    <div class="flex justify-center mt-20">
        <form action="{{route('filter')}}" method="POST">
        @csrf
        <label class="form-control w-full max-w-xs">
            <input type="email" placeholder="Search applicant(s)' email here" class="input input-bordered w-72 mb-5" name="email" required/>
            <input type="submit" value="Search" class="btn btn-ghost text-lg mb-5"></input>

        </label>
        </form>
    </div>
    @if (count($list)>0)
        <div class="overflow-x-auto bg-gray-700 mx-[100px] mb-10 ">
                <table class="table table-lg">
                    <thead class="text-base">
                    <tr>
                        <th>Order (Click to View Details) </th>
                        <th>Application Time (GMT+8)</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Down Payment Amount (RM)</th>
                        <th>Loan Amount (RM)</th>
                        <th>Promotion Eligibility</th>
                        <th>Purchase Status</th>
                        <th>Last Update at (GMT+8)</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($list as $list)
                    <tr onclick="window.location.href = '{{ route('change', ['id' => $list->appointment_id]) }}';" style="cursor: pointer;">

                        <th>{{$loop->index+1}}</th>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->phone_number}}</td>
                        <td>{{$list->down_payment_amount}}</td>
                        <td>{{$list->loan_amount}}</td>
                        <td>{{$list->promotion_eligibility?'Yes':'No'}}</td>
                        <td>{{$list->purchase_status?'Ongoing':'Cancelled'}}</td>
                        <td>{{$list->updated_at}}</td>

                    </tr>
                    @endforeach

                    </tbody>
                </table>
        </div>

    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mb-[-70px] mt-[-50px]">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mx-[270px] text-xl">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center ">
                    No related applicant(s) is found.
                </div>
            </div>
        </div>
    </div>
    @endif


</x-app-layout>



