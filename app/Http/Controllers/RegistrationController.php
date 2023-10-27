<?php

namespace App\Http\Controllers;

use App\Models\UmrahRegistration;
use App\Models\VisaRegistration;
use App\Models\RegisterCustomer;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    public function regUmrah(Request $request){
        return view('admin.Registration.Umrah');
    }
    public function regVisa(Request $request){
        return view('admin.Registration.Visa');
    }
    public function storeUmrah(Request $request)
    {
        // Handle Umrah form submission
        $umrahRegistration = new UmrahRegistration();
        // Assign form input values to the Umrah registration properties
        $umrahRegistration->CustomerID = $request->input('CustomerID');
        $umrahRegistration->full_name = $request->input('Name');
        $umrahRegistration->email = $request->input('Email');
        $umrahRegistration->phone_number = $request->input('Phone');
        $umrahRegistration->departure_date = $request->input('DDate');
        $umrahRegistration->return_date = $request->input('RDate');
        $umrahRegistration->Amount = $request->input('Amount');
        $umrahRegistration->VisaPrice = $request->input('VisaPrice');
        $umrahRegistration->TiketPrice = $request->input('TiketPrice');
        $umrahRegistration->OtherExpenses = $request->input('OtherExpenses');
        // Set other Umrah registration properties as needed
        
        $umrahRegistration->save();
        return redirect()->route('registrations.umrah.get');
        
        // Optionally, you can redirect the user to a success page or perform other actions
    }

    public function storeVisa(Request $request)
    {
        // Handle Visa form submission
        $visaRegistration = new VisaRegistration();
        // Assign form input values to the Visa registration properties
        $visaRegistration->CustomerID = $request->input('CustomerID');
        $visaRegistration->full_name = $request->input('Name');
        $visaRegistration->email = $request->input('Email');
        $visaRegistration->phone_number = $request->input('Phone');
        $visaRegistration->departure_date = $request->input('DDate');
        $visaRegistration->return_date = $request->input('RDate');
        $visaRegistration->Amount = $request->input('Amount');
        $visaRegistration->Country = $request->input('Country');
        $visaRegistration->VisaPrice = $request->input('VisaPrice');
        $visaRegistration->TiketPrice = $request->input('TiketPrice');
        $visaRegistration->OtherExpenses = $request->input('OtherExpenses');
        // Set other Visa registration properties as needed
        
        $visaRegistration->save();
        return redirect()->route('registrations.visa.get');
        
        // Optionally, you can redirect the user to a success page or perform other actions
    }
    
    public function returnUmrahID(Request $request){
        
        $customerId = $request->query('CustomerIDs');
        // $customers = $customerId ? RegisterCustomer::where('id', $customerId)->get() : RegisterCustomer::all();
        $customer = RegisterCustomer::find($customerId);
        return view('admin.Registration.Umrah', ['customer' => $customer]);
    }
    public function returnVisaID(Request $request){
        $customerId = $request->query('CustomerIDs');
        $customer = RegisterCustomer::find($customerId);
        return view('admin.Registration.Visa', ['customer' => $customer]);
    }
}