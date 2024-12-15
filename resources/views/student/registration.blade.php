{{-- @extends('layouts.layout') --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('front/css/form.css') }}" />
</head>

<body>
    <div class="container">
        <div class="card " style="width: 85%">
            <h5 class="card-header">Student Registration Form</h5>
            <div class="card-body"
                style="background-image: url({{ asset('front/img/contact_bg_1.png') }}); background-size: cover; background-position: center;">
                <form method="POST" action="{{ route('student.store') }}">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf
                    <fieldset class="form-one form-step active">
                        <h5 class="stu-info">Personal Details</h5>

                        <div class="row col-md-12 stu-info1">
                            <div class="col-md-4">
                                <label for="" class="form-label">First Name</label>
                                <input placeholder="First" type="text" name="s_first" class="form-control"
                                    id="s_first" value="{{ old('s_first') }}" />
                                @error('s_first')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Middle</label>
                                <input placeholder="Middle" type="text" name="s_middle" class="form-control"
                                    id="s_middle" value="{{ old('s_middle') }}" />
                                @error('s_middle')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="" class="form-label">Last</label>
                                <input placeholder="Last" type="text" name="s_last" class="form-control"
                                    id="s_last" value="{{ old('s_last') }}" />
                                @error('s_last')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row col-12 stu-info1">
                            <div class="col-md-4">
                                <label class="form-label" for="">Birth Date <span>*</span></label>
                                <input placeholder="DOB" type="date" name="s_dob" class="form-control"
                                    id="s_dob" value="{{ old('s_dob') }}" />
                                @error('s_dob')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="">Phone <span>*</span></label>
                                <input placeholder="Phone" type="tel" name="s_phone" class="form-control"
                                    id="s_phone" value="{{ old('s_phone') }}" />
                                @error('s_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="">Email <span>*</span></label>
                                <input placeholder="Email" type="text" name="s_email" class="form-control"
                                    id="s_email" value="{{ old('s_email') }}" />
                                @error('s_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row col-12 stu-info">
                            <div class="col-md-5">
                                <label for="" class="text-center">Gender</label>
                                <fieldset class="row mb-3">
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_gender"
                                                id="gridRadios1" value="male"
                                                {{ old('s_gender') == 'male' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadios1">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_gender"
                                                id="gridRadios2" value="female"
                                                {{ old('s_gender') == 'female' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadios2">
                                                Female
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_gender"
                                                id="gridRadios3" value="other"
                                                {{ old('s_gender') == 'other' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadios3">
                                                Other
                                            </label>
                                        </div>
                                        @error('s_gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <h6 class="stu-info">Address Details</h6>
                        <div class="row col-12 stu-info1">
                            <div class="col-md-4">
                                <label for="" class="form-label">Country</label>
                                <input type="text" class="form-control" name="s_country" id="s_country"
                                    placeholder="Country" value="{{ old('s_country') }}" />
                                @error('s_country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="">Province</label>
                                <input placeholder="Province" type="text" name="s_province" class="form-control"
                                    id="s_province" value="{{ old('s_province') }}" />
                                @error('s_province')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="">District</label>
                                <input placeholder="District" type="text" name="s_district" class="form-control"
                                    id="s_district" value="{{ old('s_district') }}" />
                                @error('s_district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-12 stu-info">
                            <div class="col-md-3">
                                <label class="form-label" for="">City</label>
                                <input placeholder="City" type="text" name="s_city" class="form-control"
                                    id="s_city" value="{{ old('s_city') }}" />
                                @error('s_city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="">Ward</label>
                                <input placeholder="Ward" type="text" name="s_ward" class="form-control"
                                    id="s_ward" value="{{ old('s_ward') }}" />
                                @error('s_ward')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <fieldset class="form-two form-step">
                        <h5 class="stu-info">Guardian Information</h5>
                        <div class="row col-md-12 stu-info1">
                            <div class="col-md-4">
                                <label for="gfname" class="form-label">First Name</label>
                                <input placeholder="First" name="g_first" type="text" class="form-control"
                                    value="{{ old('g_first') }}" id="gfname" />
                                @error('g_first')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="gmname" class="form-label">Middle</label>
                                <input placeholder="Middle" name="g_middle" type="text" class="form-control"
                                    value="{{ old('g_middle') }}" id="gmname" />
                                @error('g_middle')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="glname" class="form-label">Last</label>
                                <input placeholder="Last" name="g_last" type="text" class="form-control"
                                    value="{{ old('g_last') }}" id="glname" />
                                @error('g_last')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12 stu-info">
                            <div class="col-md-3">
                                <label for="relation" class="form-label">Relationship</label>
                                <input placeholder="Relationship" type="text" name="relation"
                                    class="form-control" value="{{ old('relation') }}" id="relation" />
                                @error('relation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="gphone" class="form-label">Phone</label>
                                <input placeholder="Phone" name="g_phone" type="text" class="form-control"
                                    value="{{ old('g_phone') }}" id="gphone" />
                                @error('g_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="gemail" class="form-label">Email</label>
                                <input placeholder="Email" name="g_email" type="text" class="form-control"
                                    value="{{ old('g_email') }}" id="gemail" />
                                @error('g_email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="ephone" class="form-label">Emergency Contact</label>
                                <input placeholder="Emergency Contact" type="text" name="e_phone"
                                    class="form-control" value="{{ old('e_phone') }}" id="ephone" />
                                @error('e_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </fieldset>

                    <fieldset class="form-three form-step">
                        <h5 class="stu-info">Education Information</h5>
                        <div class="row col-md-12 stu-info1">
                            <div class="col-md-6">
                                <label for="college" class="form-label">College Name</label>
                                <input placeholder="Previous College Name" name="college" type="text"
                                    value="{{ old('college') }}" class="form-control" id="college" />
                                @error('college')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="faculty" class="form-label">Faculty</label>
                                <input placeholder="Study Faculty" name="faculty" type="text"
                                    value="{{ old('faculty') }}" class="form-control" id="faculty" />
                                @error('faculty')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="cgpa" class="form-label">Percentage/CGPA</label>
                                <input placeholder="Obtain Percentage/CGPA" name="c_gpa"
                                    value="{{ old('c_gpa') }}" type="number" class="form-control"
                                    id="cgpa" />
                                @error('c_gpa')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row col-md-12 stu-info1">
                            <div class="col-md-3">
                                <label for="ccountry" class="form-label">Country</label>
                                <input placeholder="Country" type="text" name="c_country"
                                    value="{{ old('c_country') }}" class="form-control" id="ccountry" />
                                @error('c_country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="c_province" class="form-label">Province</label>
                                <input placeholder="Province" type="text" name="c_province"
                                    value="{{ old('c_province') }}" class="form-control" id="c_province" />
                                @error('c_province')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="c_district" class="form-label">District</label>
                                <input placeholder="District" type="text" name="c_district"
                                    value="{{ old('c_district') }}" class="form-control" id="c_district" />
                                @error('c_district')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="c_city" class="form-label">City</label>
                                <input placeholder="City" type="text" name="c_city" value="{{ old('c_city') }}"
                                    class="form-control" id="c_city" />
                                @error('c_city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Uncomment if you want to add an image upload field --}}
                        {{--
                        <div class="row col-12 stu-info">
                            <div class="col-md-4">
                                <label for="image" class="form-label">Choose Image</label>
                                <input type="file" class="form-control" id="image" wire:model="image" />
                                @error('image') <div class="text-danger">{{ $message }}</div> @enderror
                                <img id="preview" src="#" alt="Preview" style="display: none; max-width: 100%; margin-top: 10px" />
                            </div>
                        </div>
                        --}}

                    </fieldset>

                    <fieldset class="form-four form-step">
                        <h5 class="stu-info">Other Information</h5>
                        <div class="row col-12 stu-info1">
                            <div class="col-md-4">
                                <label for="s_course" class="form-label">Which course are you interested in?</label>
                                <input type="text" class="form-control" name="s_course" id="s_course"
                                    value="{{ old('s_course') }}" />
                                @error('s_course')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-8 stu-info-1">
                                <label for="" class="stu-info1 text-center">How did you hear about us?</label>
                                <fieldset class="row mb-3">
                                    <div class="col-sm-10">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_about"
                                                id="gridRadio1" value="socialMedia"
                                                {{ old('s_about') == 'socialMedia' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadio1">Social Media</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_about"
                                                id="gridRadio2" value="friends"
                                                {{ old('s_about') == 'friends' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadio2">Friends</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_about"
                                                id="gridRadio3" value="relatives"
                                                {{ old('s_about') == 'relatives' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadio3">Relatives</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="s_about"
                                                id="gridRadio4" value="youtube"
                                                {{ old('s_about') == 'youtube' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="gridRadio4">YouTube</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row col-md-12 stu-info">
                            <div class="col-md-3">
                                <label for="referred" class="form-label">Referred by</label>
                                <input placeholder="Referred by" type="text" name="referred" class="form-control"
                                    id="referred" value="{{ old('referred') }}" />
                                @error('referred')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="r_others" class="form-label">Others</label>
                                <input placeholder="Other" type="text" name="r_others" class="form-control"
                                    id="r_others" value="{{ old('r_others') }}" />
                                @error('r_others')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </fieldset>

                    <div class="btn-group">
                        <button type="button" class="btn-prev " disabled>Back</button>
                        <button type="button" class="btn-next">Next Step</button>
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>



    </div>
    <script src="{{ asset('front/js/form.js') }}"></script>
</body>

</html>
{{-- @section('main-section')
@endsection --}}
