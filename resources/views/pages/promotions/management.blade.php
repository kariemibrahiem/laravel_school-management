@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{trans('main_trans.list_students')}}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{trans('main_trans.list_students')}}
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

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    {{trans("students.delete_all")}}
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('students.name')}}</th>
                                            <th class="bg-success alert-danger alert-danger">{{trans('students.prev_grade')}}</th>
                                            <th class="bg-success alert-danger">{{trans('students.prev_year')}}</th>
                                            <th class="bg-success alert-danger">{{trans('students.prev_class')}}</th>
                                            <th class="bg-success alert-danger">{{trans('students.prev_section')}}</th>
                                            <th class="bg-danger alert-danger">{{trans('students.next_grade')}}</th>
                                            <th class="bg-danger alert-danger">{{trans('students.next_year')}}</th>
                                            <th class="bg-danger alert-danger">{{trans('students.next_class')}}</th>
                                            <th class="bg-danger alert-danger">{{trans('students.next_section')}}</th>

                                            <th>{{trans('students.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->to_year}}</td>
                                                <td>{{$promotion->f_classroom->className}}</td>
                                                <td>{{$promotion->f_section->Name_Section}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->to_year}}</td>
                                                <td>{{$promotion->t_classroom->className}}</td>
                                                <td>{{$promotion->t_section->Name_Section}}</td>
                                                <td>
                                                    <div class="d-flex g-1">
                                                        <a href="{{route('student.edit',$promotion->id)}}"
                                                           class="btn btn-info btn-sm m-1" role="button"
                                                           aria-pressed="true"><i
                                                                class="fa fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm m-1"
                                                                data-toggle="modal"
                                                                data-target="#Delete_Student{{ $promotion->id }}"
                                                                title="{{ trans('Grades_trans.Delete') }}"><i
                                                                class="fa fa-trash "></i></button>
                                                        <a href="{{route('student.show',$promotion->id)}}"
                                                           class="btn btn-warning btn-sm m-1" role="button"
                                                           aria-pressed="true"><i
                                                                class="far fa-eye"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        {{--                                        @include('pages.Students.promotion.Delete_all')--}}
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
{{--    the modal of rollback--}}

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route("promotions.destroy" , "test")}}">

                    <div class="modal-body">
                        ...
                    </div>

                    <input type="hidden" value="1" name="promotion_id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">{{trans("students.delete_all")}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
