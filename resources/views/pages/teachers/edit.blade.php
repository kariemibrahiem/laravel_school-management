@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('Teachers.Add_Teacher') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ trans('Teachers.Add_Teacher') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
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
                            <form action="{{route('teachers.updates' , $teacher->id)}}" >
                                @method('POST')
                                @csrf
                                <input type="hidden" name="id" value="{{$teacher->id}}"/>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('teachers.Email')}}</label>
                                        <input value="{{$teacher->email}}" type="email" name="email" class="form-control">
                                        @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label for="title">{{trans('teachers.Password')}}</label>
                                        <input value="{{$teacher->password}}" type="password" name="password" class="form-control">
                                        @error('Password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>


                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('teachers.Name')}}</label>
                                        <input value="{{$teacher->name}}" type="text" name="name" class="form-control">
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <br>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <label for="inputCity">{{trans('teachers.specialization')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                            <option selected disabled value="{{$teacher->specialization_id}}">{{$teacher->Specialization->name}}</option>
                                            @foreach($specializations as $specialization)
                                                <option value="{{$specialization->id}}">{{$specialization->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('Specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col">
                                        <label for="inputState">{{trans('teachers.Gender')}}</label>
                                        <select class="custom-select my-1 mr-sm-2" name="gander">
                                            <option selected disabled value="{{$teacher->gander}}">{{$teacher->gander}}</option>
                                            <option value="male">{{trans("teachers.males")}}</option>
                                            <option value="female">{{trans("teachers.females")}}</option>
                                        </select>
                                        @error('Gender_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{trans('teachers.Joining_Date')}}</label>
                                        <div class='input-group date'>
                                            <input value="{{$teacher->joining_date}}" class="form-control" type="text"  id="datepicker-action" name="joining_data" data-date-format="yyyy-mm-dd"  required>
                                        </div>
                                        @error('Joining_Date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <br>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">{{trans('Teachers.Address')}}</label>
                                    <input value="{{$teacher->address}}" class="form-control" name="address"
                                              id="exampleFormControlTextarea1" rows="4"></input>
                                    @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('parents.Next')}}</button>
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
