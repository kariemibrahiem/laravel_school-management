@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{trans('main_trans.List_Teachers')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('main_trans.List_Teachers')}}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('students.add_student') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('students.name')}}</th>
                                            <th>{{trans('students.email')}}</th>
                                            <th>{{trans('students.gender')}}</th>
                                            <th>{{trans('students.Grade')}}</th>
                                            <th>{{trans('students.classrooms')}}</th>
                                            <th>{{trans('students.section')}}</th>
{{--                                            <th>{{trans('students.parent')}}</th>--}}
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                         @foreach($students as $student)
                                            <tr>
{{--                                                    <?php $i++; ?>--}}
{{--                                                <td>{{ $i }}</td>--}}
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->gender}}</td>
                                                <th>{{$student->Grade->name}}</th>
                                                <th>{{$student->classroom->className}}</th>
                                                <th>{{$student->section->Name_Section}}</th>
                                                <td>
                                                    <div class="d-flex">


                                            {{-- the edit studen button--}}
                                                        <form action="{{route("student.edit" , "test")}}" class="m-1">
                                                            @method("GET")
                                                            @csrf
                                                            <input value="{{$student->id}}" name="id" type="hidden" />
                                                            <button  class="btn btn-info btn-sm" type="submit"><i class="fa fa-edit"></i></button>
                                                        </form>

                                            {{-- the show studen button--}}
                                                        <a href="{{route("student.show" , $student->id)}}" class="btn m-1 btn-primary btn-sm" role="button" aria-pressed="true"><i class="fa fa-eye"></i></a>

                                            {{-- the destroy studen button--}}
                                                        <form id="delete_Teacher" action="{{route('student.destroy', "test")}}" class="m-1">
                                                            @method("GET")
                                                            @csrf
                                                            <input value="{{$student->id}}" name="id" type="hidden" />
                                                            <button  class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>

                                         @endforeach
                                    </table>
                                </div>
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
