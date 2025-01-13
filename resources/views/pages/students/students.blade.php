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
{{--                                                <th>{{$student->parent->F_name}}</th>--}}
                                                <td>
{{--                                                    <a href="{{route('student.edit',$student->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"></a>--}}
                                                    <form action="{{route("student.edit" , "test")}}" >
                                                        @method("GET")
                                                        @csrf
                                                        <input value="{{$student->id}}" name="id" type="hidden" />
                                                        <button  class="btn btn-info btn-sm" type="submit"><i class="fa fa-edit"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher" title="{{ trans('grades.delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>


{{--                                            the delteing modal--}}
                                            <div class="modal fade" id="delete_Teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('student.destroy')}}" method="post">
                                                        {{method_field('GET')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('Teachers.Delete_Teacher') }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p> {{ trans('classes.Warning_Grade') }}</p>
                                                                <input type="hidden" name="id"  value="{{$student->id}}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">{{ trans('classes.Close') }}</button>
                                                                    <button type="submit"
                                                                            class="btn btn-danger">{{ trans('classes.submit') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
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
