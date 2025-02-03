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
                                                <td class="{{$promotion->student ? "bg-success" : "bg-danger"}}"> {{$promotion->student ? $promotion->student->name : "no students"}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->from_year}}</td>
                                                <td>{{$promotion->f_classroom->className}}</td>
                                                <td>{{$promotion->f_section->Name_Section}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->to_year}}</td>
                                                <td>{{$promotion->t_classroom->className}}</td>
                                                <td>{{$promotion->t_section->Name_Section}}</td>
                                                <td>
                                                    <div class="d-flex g-1">
                                                        <button type="button" class="btn btn-danger mr-3" data-toggle="modal" data-target="#single_student_{{$promotion->student_id}}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>

                                                        {{--    the modal of delete jsut one student --}}

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="single_student_{{$promotion->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                                                                        <input type="hidden" value="2" name="status_id">
                                                                        <input type="hidden" value="{{$promotion->student_id}}" name="student_id">
                                                                        <input type="hidden" value="{{$promotion->id}}" name="promotion_id">

                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <a href="{{route("promotions.graduate" , ["id"=>$promotion->id])}}"  class="btn btn-sm btn-outline-primary">
                                                            upgrade
                                                        </a>


{{--                                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#graduate_student_{{$promotion->student_id}}">--}}
{{--                                                            graduate--}}
{{--                                                        </button>--}}

{{--                                                        --}}{{--    the modal of graduate the student  --}}

{{--                                                        <!-- Modal -->--}}
{{--                                                        <div class="modal fade" id="graduate_student_{{$promotion->student_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                                            <div class="modal-dialog" role="document">--}}
{{--                                                                <div class="modal-content">--}}
{{--                                                                    <div class="modal-header">--}}
{{--                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>--}}
{{--                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                            <span aria-hidden="true">&times;</span>--}}
{{--                                                                        </button>--}}
{{--                                                                    </div>--}}
{{--                                                                    <form action="{{route("promotions.graduate" , "test")}}">--}}

{{--                                                                        <div class="modal-body">--}}
{{--                                                                            ...--}}
{{--                                                                        </div>--}}

{{--                                                                        <input type="hidden" value="2" name="status_id">--}}
{{--                                                                        <input type="hidden" value="{{$promotion->id}}" name="promotion_id">--}}

{{--                                                                        <div class="modal-footer">--}}
{{--                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                                                            <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>--}}
{{--                                                                        </div>--}}
{{--                                                                    </form>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}

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

                    <input type="hidden" value="1" name="status_id">
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
