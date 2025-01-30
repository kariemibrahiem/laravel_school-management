@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{trans('students.Student_details')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('students.Student_details')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="card-body">
                        <div class="tab nav-border">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active show" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('students.Student_details')}}</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" id="profile-02-tab" data-toggle="tab" href="#profile-02"--}}
{{--                                       role="tab" aria-controls="profile-02"--}}
{{--                                       aria-selected="false">{{trans('students.Attachments')}}</a>--}}
{{--                                </li>--}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('students.id')}}</th>
                                            <td>{{ $Student->id }}</td>
                                            <th scope="row">{{trans('students.name')}}</th>
                                            <td>{{ $Student->name }}</td>
                                            <th scope="row">{{trans('students.email')}}</th>
                                            <td>{{$Student->email}}</td>
                                            <th scope="row">{{trans('students.gender')}}</th>
                                            <td>{{$Student->gender}}</td>

                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students.Nationality')}}</th>
                                            <td>{{$Student->nationality->name}}</td>
                                            <th scope="row">{{trans('students.Grade')}}</th>
                                            <td>{{ $Student->grade->name }}</td>
                                            <th scope="row">{{trans('students.classrooms')}}</th>
                                            <td>{{$Student->classroom->className}}</td>
                                            <th scope="row">{{trans('students.section')}}</th>
                                            <td>{{$Student->section->Name_Section}}</td>

                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students.Date_of_Birth')}}</th>
                                            <td>{{ $Student->Date_Birth}}</td>
{{--                                            <th scope="row">{{trans('students.parent')}}</th>--}}
{{--                                            <td>{{ $Student->parent->F_phone}}</td>--}}
                                            <th scope="row">{{trans('students.academic_year')}}</th>
                                            <td>{{ $Student->academic_year }}</td>
                                            <th scope="row">{{trans('students.created_at')}}</th>
                                            <td>{{ $Student->created_at->format('Y-m-d') }}</td>
                                            <th scope="row">{{trans('students.blood_type')}}</th>
                                            <td>{{ $Student->blood->name }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
{{--                                        <div class="card-body">--}}
{{--                                            <form  action="{{route('Upload_attachment')}}" enctype="multipart/form-data">--}}
{{--                                                {{ csrf_field() }}--}}
{{--                                                @method("post")--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label--}}
{{--                                                            for="academic_year">{{trans('Students_trans.Attachments')}}--}}
{{--                                                            : <span class="text-danger">*</span></label>--}}
{{--                                                        <input type="file" accept="image/*" name="photos[]" multiple required>--}}
{{--                                                        <input type="hidden" name="student_name" value="{{$Student->name}}">--}}
{{--                                                        <input type="hidden" name="student_id" value="{{$Student->id}}">--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <br><br>--}}
{{--                                                <button type="submit" class="button button-border x-small">--}}
{{--                                                    {{trans('Students_trans.submit')}}--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
                                        <br>
                                        <a>upload attachment</a>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('students.filename')}}</th>
                                                <th scope="col">{{trans('students.created_at')}}</th>
                                                <th scope="col">{{trans('students.Processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($Student->images as $attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$attachment->filename}}</td>
                                                    <td>{{$attachment->created_at->diffForHumans()}}</td>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url('Download_attachment')}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                           role="button"><i class="fas fa-download"></i>&nbsp; {{trans('students.Download')}}</a>

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}">{{trans('students.delete')}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('pages.Students.Delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
