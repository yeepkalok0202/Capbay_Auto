<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use RealRashid\SweetAlert\SweetAlertServiceProvider;
use RealRashid\SweetAlert\ToSweetAlert;


class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('sucessful');
    }
    public function store(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'down_payment' => 'required|numeric|min:1|max:200000',
        ]);

        if ($validated->fails()) {
            $error = $validated->errors()->first();
            dd($error);
        }

        $registered = new Customer();
        $registered->name = Auth::user()->name;
        $registered->appointment_id = $request->phone_number;
        $registered->email = Auth::user()->email;
        $registered->phone_number = $request->phone_number;
        $registered->down_payment_amount = $request->down_payment;

        $eligibility = Customer::where('purchase_status', true)->where('down_payment_amount', '>=', 200000 * 0.1)->where('purchase_status', true)->count();

        //auto update algorithm when there is one who recall
        if ($eligibility < 10) {
            // Retrieve the oldest eligible customer
            $oldestEligibleCustomer = Customer::where('promotion_eligibility', false)->where('down_payment_amount', '>=', 200000 * 0.1)
                ->orderBy('created_at')
                ->first();

            // If there is an eligible customer, update their promotion eligibility to true
            if ($oldestEligibleCustomer) {
                $oldestEligibleCustomer->promotion_eligibility = true;
                $oldestEligibleCustomer->save();
                return;
            }
        }
        $registered->loan_amount = 200000 - $request->down_payment;

        $registered->promotion_eligibility = $eligibility < 10 && $request->down_payment >= 200000 * 0.1;

        $registered->save();


        return redirect(route('profile.sucessful'));
    }

    public function list()
    {
        $list = Customer::orderBy('created_at', 'asc')->get();

        return view('list')->with('list', $list);
    }

    public function registered()
    {
        $registered = Customer::where('email', Auth::user()->email)->exists();
        // dd($registered);

        return view('dashboard')->with(['registered' => $registered]);
    }


    public function filter(Request $request)
    {

        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validated->fails()) {
            $error = $validated->errors()->first();
            dd($error);
        }

        $list = Customer::where('email', $request->email)->exists();
        if ($list) {
            $lists = Customer::where('email', $request->email)->get();
            return view('list')->with(['list' => $lists]);
        }
        return view('list')->with(['list' => []]);
    }

    public function update()
    {
        $list = Customer::orderBy('created_at', 'asc')->get();

        return view('update')->with(['list' => $list]);
    }

    public function details($id)
    {
        $lists = Customer::where('appointment_id', $id)->get();
        return view('details')->with(['list' => $lists]);
    }

    public function change($id)
    {
        $lists = Customer::where('appointment_id', $id)->get();

        return view('change')->with(['list' => $lists]);
    }

    public function updatedone(Request $request)
    {


        $validated = Validator::make($request->all(), [
            'down_payment_amount' => 'required|numeric',
            'purchase_status' => 'required'
        ]);

        if ($validated->fails()) {
            $error = $validated->errors()->first();
            dd($error);
        }

        $registered = Customer::where('appointment_id', $request->appointment_id)->first();
        $registered->down_payment_amount = $request->down_payment_amount;
        $registered->purchase_status = $request->purchase_status;

        $registered->save();
        $list = Customer::all();
        return view('update')->with(['list' => $list]);
    }
}
