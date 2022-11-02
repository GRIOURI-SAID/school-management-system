@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('main_trans.List_Teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('main_trans.List_Teachers') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('teacher.update' , "test") }}" method="post">
                             {{ method_field('put') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <input type="hidden" value="{{$Teacher->id}}" name="id">
                                    <label for="title">{{ trans('Teacher_trans.Email') }}</label>
                                    <input type="email" name="Email" class="form-control" value="{{ $Teacher->email }}">
                                    @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Password') }}</label>
                                    <input type="password" name="Password" class="form-control" value="{{ $Teacher->password }}">
                                    @error('Password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_ar') }}</label>
                                    <input type="text" name="Name_ar" class="form-control" value="{{ $Teacher->getTranslation('Name' , 'ar') }}">
                                    @error('Name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Name_en') }}</label>
                                    <input type="text" name="Name_en" class="form-control" value="{{ $Teacher->getTranslation('Name' , 'en') }}">
                                    @error('Name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('Teacher_trans.specialization') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">

                                        <option disabled value="{{ $Teacher->specializations->id}}">{{ $Teacher->specializations->Name}}</option>
                                        @foreach ($Specailistions as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">{{ trans('Teacher_trans.Gender') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option disabled value="{{ $Teacher->genders->id }}" >{{ $Teacher->genders->Name}}</option>
                                        @foreach ($Genders as $gender)
                                            <option value="{{ $gender->id }}">{{ $gender->Name }}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('Teacher_trans.Joining_Date') }}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" id="datepicker-action"
                                            name="Joining_Date" data-date-format="yyyy-mm-dd" value="{{ $Teacher->Joining_Date }}" required>
                                    </div>
                                    @error('Joining_Date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('Teacher_trans.Address') }}</label>
                                <textarea class="form-control" name="Address" id="exampleFormControlTextarea1" rows="4">{{ $Teacher->Address }}</textarea>
                                @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('My_Classes_trans.submit') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
