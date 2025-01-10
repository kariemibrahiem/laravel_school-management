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
                                <a href="{{route('teachers.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{ trans('Teachers.Add_Teacher') }}</a><br><br>
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{trans('Teachers.Name_Teacher')}}</th>
                                            <th>{{trans('Teachers.email')}}</th>
                                            <th>{{trans('Teachers.Gender')}}</th>
                                            <th>{{trans('Teachers.Joining_Date')}}</th>
                                            <th>{{trans('Teachers.specialization')}}</th>
                                            <th>العمليات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                        @foreach($teachers as $Teacher)
                                            <tr>
                                                    <?php $i++; ?>
                                                <td>{{ $i }}</td>
                                                <td>{{$Teacher->name}}</td>
                                                <td>{{$Teacher->email}}</td>
                                                <td>{{$Teacher->gander}}</td>
                                                <td>{{$Teacher->joining_date}}</td>
                                                <td>{{$Teacher->address}}</td>
                                                <td>{{$Teacher->specialization->name}}</td>
                                                <td>
{{--                                                    <a href="{{route('teachers.edit',$Teacher->id)}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"></a>--}}
                                                    <form action="{{route("teachers.edit" , "test")}}" >
                                                        @method("GET")
                                                        @csrf
                                                        <input value="{{$Teacher->id}}" name="id" type="hidden" />
                                                        <button  class="btn btn-info btn-sm" type="submit"><i class="fa fa-edit"></i></button>
                                                    </form>
                                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_Teacher" title="{{ trans('grades.delete') }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>


{{--                                            the delteing modal--}}
                                            <div class="modal fade" id="delete_Teacher" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <form action="{{route('teachers.destroy')}}" method="post">
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
                                                                <input type="hidden" name="id"  value="{{$Teacher->id}}">
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
