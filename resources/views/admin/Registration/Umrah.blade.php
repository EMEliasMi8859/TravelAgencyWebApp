@extends('layouts.master')

@section('main')
    <main class="app-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="tile">
                    <h3 class="tile-title">Umrah Registration form</h3>
                    <div class="tile-body">
                        <form action="{{ route('registrations.umrah.id')}}" method="GET" id="idForm">
                            <div class="form-group">
                                <label for="CustomerIDs" class="col-sm-6 col-form-label">Customer ID</label>
                                <div class="row mx-0">
                                    <input type="text" name="CustomerIDs" class="form-control w-75" id="inputCustomerIDs" value="@if(isset($customer)){{$customer->id}}@endif">
                                    <input type="submit" name="submit" class=" form-control w-25 btn btn-outline-success fa fa-submit" />
                                </div>
                                @error('CustomerIDs')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                        <form action="{{ route('registrations.umrah.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group d-none">
                                <label for="CustomerID" class="col-sm-6 col-form-label">Customer ID</label>
                                <div class="row mx-0">
                                    <input type="text" name="CustomerID" class="form-control w-75" id="inputCustomerID" value="@if(isset($customer)){{$customer->id}}@endif">
                                    <input type="submit" name="submit" class=" form-control w-25 btn btn-outline-success fa fa-submit" />
                                </div>
                                @error('CustomerID')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Name" class="col-sm-6 col-form-label">Full name</label>
                                <input type="text" name="Name" class="form-control" id="inputName" value="@if(isset($customer)){{$customer->Name. ' '. $customer->LastName}}@endif">
                                @error('Name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-6 col-form-label">Email</label>
                                <input type="Email" name="Email" class="form-control" id="inputEmail" value="@if(isset($customer)){{$customer->Email}}@endif">
                                @error('Email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Phone" class="col-sm-6 col-form-label">Phone</label>
                                <input type="number" name="Phone" class="form-control" id="inputPhone" value="@if(isset($customer)){{$customer->Phone}}@endif">
                                @error('Phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="DDate" class="col-sm-6 col-form-label">Departure Date</label>
                                <input type="Date" name="DDate" class="form-control" id="inputDDate" >
                                @error('DDate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="RDate" class="col-sm-6 col-form-label">Return Date</label>
                                <input type="Date" name="RDate" class="form-control" id="inputRDate">
                                @error('RDate')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="Country" class="col-sm-6 col-form-label">Country</label>
                                <input type="text" name="Country" class="form-control" id="inputCountry">
                                @error('Country')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <label for="VisaPrice" class="col-sm-6 col-form-label">Visa Price</label>
                                <input type="number" name="VisaPrice" class="form-control" id="inputVisaPrice">
                                @error('VisaPrice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="TiketPrice" class="col-sm-6 col-form-label">Tiket Price</label>
                                <input type="number" name="TiketPrice" class="form-control" id="inputTiketPrice">
                                @error('TiketPrice')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="OtherExpenses" class="col-sm-6 col-form-label">OtherExpenses</label>
                                <input type="number" name="OtherExpenses" class="form-control" id="inputOtherExpenses">
                                @error('OtherExpenses')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Amount" class="col-sm-6 col-form-label">Amount</label>
                                <input type="number" name="Amount" class="form-control" id="inputAmount">
                                @error('Amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- <div class="form-group">

                                <label class="control-label">Upload Pic</label>
                                <input class="form-control form-control-lg" name="post_pic" id="formFileLg" type="file">
                                @error('post_pic')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div> --}}
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register for Umrah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>
@endsection

@section('pageJs')
    <script type="text/javascript">
        const visaP = document.getElementById('inputVisaPrice');
        const TiketP = document.getElementById('inputTiketPrice');
        const OtherP = document.getElementById('inputOtherExpenses');
        const inputAmount = document.getElementById('inputAmount');
        
        visaP.addEventListener('input', function(event) {
            inputAmount.value = (parseFloat(visaP.value)||0) + (parseFloat(TiketP.value)||0) + (parseFloat(OtherP.value)||0);
        });
        
        TiketP.addEventListener('input', function(event) {
            inputAmount.value = (parseFloat(visaP.value)||0) + (parseFloat(TiketP.value)||0) + (parseFloat(OtherP.value)||0);
        });
        
        OtherP.addEventListener('input', function(event) {
            inputAmount.value = (parseFloat(visaP.value)||0) + (parseFloat(TiketP.value)||0) + (parseFloat(OtherP.value)||0);
        });
    </script>
@endsection



