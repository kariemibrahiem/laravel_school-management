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


                                                        @if($student->deleted_at == null)

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
{{--                                                            <form id="delete_Teacher" action="{{route('student.destroy', "test")}}" class="m-1">--}}
{{--                                                                @method("GET")--}}
{{--                                                                @csrf--}}
{{--                                                                <input value="{{$student->id}}" name="id" type="hidden" />--}}
{{--                                                                <button  class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>--}}
{{--                                                            </form>--}}

                                                            {{--                                                            force delete the student--}}

                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy_{{$student->id}}">
                                                                <i class="fa  fa-trash"></i>
                                                            </button>

                                                            {{--                                                            restroe modal button--}}
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="destroy_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <h5 class="text-2xl bg-danger p-3 rounded mt-5 mb-5">y shure y wont to delete the student !!</h5>

                                                                        <form id="delete_Teacher" action="{{route('student.destroy', "test")}}" class="m-1">
                                                                            @method("GET")
                                                                            @csrf
                                                                            <input value="{{$student->id}}" name="id" type="hidden" />
                                                                            <button  class="btn btn-danger btn-sm" type="submit">force delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @else


{{--                                                            restroe modal button--}}
                                                            <button type="button" class="btn btn-sm mr-3 btn-primary" data-toggle="modal" data-target="#restore_{{$student->id}}">
                                                                degrade
                                                            </button>

{{--                                                            restroe modal button--}}
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="restore_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form id="" action="{{route('student.restore', "test")}}" class="m-1">
                                                                            @method("GET")
                                                                            @csrf
                                                                            <h4 class="text-2xl bg-warning p-3 rounded mt-5 mb-5">you shore u want to restore</h4>
                                                                            <input value="{{$student->id}}" name="student_id" type="hidden" />
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            <button  class="btn btn-success btn-sm" type="submit">degrade</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

{{--                                                            force delete the student--}}

                                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#destroy_{{$student->id}}">
                                                                <i class="fa  fa-trash"></i>
                                                            </button>

                                                            {{--                                                            restroe modal button--}}
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="destroy_{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>

                                                                        <h5 class="text-2xl bg-danger p-3 rounded mt-5 mb-5">y shure y wont to delete the student !!</h5>

                                                                        <form id="delete_Teacher" action="{{route('student.destroy', "test")}}" class="m-1">
                                                                            @method("GET")
                                                                            @csrf
                                                                            <input value="{{$student->id}}" name="id" type="hidden" />
                                                                            <button  class="btn btn-danger btn-sm" type="submit">force delete</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        @endif
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
