@extends('layouts.master_home')
<!-- ======= About Us Section ======= -->
@section('home_content')
    {{-- @include('layouts.body.slider') --}}
    <section id="about-us" class="about-us d-flex justify-content-center align-items-center pt-5">
        

        <div class="row w-75 d-flex mt-5">
            <div class="col">
                <div class="tile">
                    <h3 class="tile-title">Register New customer</h3>
                    <div class="tile-body">
                        <form action="{{ route('RegisterCustomer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="Name" class="col-sm-6 col-form-label">Name</label>
                                <input type="text" name="Name" class="form-control" id="inputName">
                                @error('Name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="LastName" class="col-sm-6 col-form-label">Last Name</label>
                                <input type="text" name="LastName" class="form-control" id="inputLName">
                                @error('LastName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="FatherName" class="col-sm-6 col-form-label">FatherName</label>
                                <input type="text" name="FatherName" class="form-control" id="inputFatherName">
                                @error('FatherName')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Email" class="col-sm-6 col-form-label">Email</label>
                                <input type="Email" name="Email" class="form-control" id="inputEmail">
                                @error('Email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Phone" class="col-sm-6 col-form-label">Phone</label>
                                <input type="number" name="Phone" class="form-control" id="inputPhone">
                                @error('Phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Province" class="col-sm-6 col-form-label">Province</label>
                                <input type="text" name="Province" class="form-control" id="inputProvince">
                                @error('Province')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="District" class="col-sm-6 col-form-label">District</label>
                                <input type="text" name="District" class="form-control" id="inputDistrict">
                                @error('District')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Date" class="col-sm-6 col-form-label">Date</label>
                                <input type="Date" name="Date" class="form-control" id="inputDate">
                                @error('Date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="IDCard" class="col-sm-6 col-form-label">IDCard</label>
                                <input type="file" name="IDCard" class="form-control" id="inputIDCard">
                                @error('IDCard')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Passport" class="col-sm-6 col-form-label">Passport</label>
                                <input type="file" name="Passport" class="form-control" id="inputPassport">
                                @error('Passport')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="Picture" class="col-sm-6 col-form-label">Picture</label>
                                <input type="file" name="Picture" class="form-control" id="inputPicture">
                                @error('Picture')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
