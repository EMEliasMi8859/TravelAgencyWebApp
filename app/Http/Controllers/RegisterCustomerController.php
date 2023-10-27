<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegisterCustomer;

class RegisterCustomerController extends Controller
{
    public function DeleteCus(Request $request){
        $id = $request->query('id');
        if($RCRD = RegisterCustomer::find($id)) $RCRD->delete();
        return redirect()->route('home');
    }
    public function UpdateCus(Request $request){
        $id = $request->query('id');
        if($RCRD = RegisterCustomer::find($id)) {
            return view('CustomerUpdate', ['id'=>$RCRD]);
        }
    }
    public function UpdateCusPost(Request $request){
        $id = $request->input('ID');
        if($RCRD = RegisterCustomer::find($id)){
        // Assign form input values to the Umrah registration properties
        $RCRD->Name = $request->input('Name');
        $RCRD->LastName = $request->input('LastName');
        $RCRD->FatherName = $request->input('FatherName');
        $RCRD->Phone = $request->input('Phone');
        $RCRD->Email = $request->input('Email');
        $RCRD->Province = $request->input('Province');
        $RCRD->District = $request->input('District');

        // Validate the uploaded file
        $request->validate([
            'IDCard' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('IDCard');
        $filename = time() . '_' . uniqid() .  '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;

        if (file_exists($RCRD->IDCard)) {unlink($RCRD->IDCard);}
        $RCRD->IDCard = $imageLink;

        // Validate the uploaded file
        $request->validate([
            'Passport' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('Passport');
        $filename = time() . '_' . uniqid() .  '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;


        if (file_exists($RCRD->Passport)) {unlink($RCRD->Passport);}
        $RCRD->Passport = $imageLink;

        // Validate the uploaded file
        $request->validate([
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('Picture');
        $filename = time() . '_' . uniqid() . '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;

        if (file_exists($RCRD->Picture)) {unlink($RCRD->Picture);}
        $RCRD->Picture = $imageLink;

        $RCRD->Date = $request->input('Date');
        // Set other Umrah registration properties as needed
        
        
        $RCRD->save();
    }
        return redirect()->route('home');
    }
    // Retrieve the current ID
    public function RegCusGet(Request $request){
        return view('RegisterCustomer');
    }
    public function StoreCustomer(Request $request)
    {
        // Handle Umrah form submission
        $RegisterCustomer = new RegisterCustomer();
        // Assign form input values to the Umrah registration properties
        $RegisterCustomer->Name = $request->input('Name');
        $RegisterCustomer->LastName = $request->input('LastName');
        $RegisterCustomer->FatherName = $request->input('FatherName');
        $RegisterCustomer->Phone = $request->input('Phone');
        $RegisterCustomer->Email = $request->input('Email');
        $RegisterCustomer->Province = $request->input('Province');
        $RegisterCustomer->District = $request->input('District');

        // Validate the uploaded file
        $request->validate([
            'IDCard' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('IDCard');
        $filename = time() . '_' . uniqid() .  '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;

        $RegisterCustomer->IDCard = $imageLink;

        // Validate the uploaded file
        $request->validate([
            'Passport' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('Passport');
        $filename = time() . '_' . uniqid() .  '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;


        $RegisterCustomer->Passport = $imageLink;

        // Validate the uploaded file
        $request->validate([
            'Picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('Picture');
        $filename = time() . '_' . uniqid() . '__'. (RegisterCustomer::max('id')+1) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('RawData/Customers'), $filename);
        $imageLink = '/RawData/Customers/' . $filename;

        $RegisterCustomer->Picture = $imageLink;

        $RegisterCustomer->Date = $request->input('Date');
        // Set other Umrah registration properties as needed
        
        $RegisterCustomer->save();
        return redirect()->route('RegisterCustomer');
        
        // Optionally, you can redirect the user to a success page or perform other actions
    }
}
