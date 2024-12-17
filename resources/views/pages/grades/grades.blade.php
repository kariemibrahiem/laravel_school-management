@extends('layouts.master')
@section('css')

@section('title')
    {{ trans("grades.List_Grade") }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans("main_side_tr.grades") }}</h4>
        </div>
        
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                {{-- <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans("grades.Name") }}</a></li> --}}
                <li class="breadcrumb-item active">{{ trans("main_side_tr.grades") }}</li>
            </ol>
            @if ($errors->any())
                <ul class="form-control">
                    @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                
            @endif
            {{-- add grade btn --}}
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('Grades.add_Grade') }}
            </button>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            {{-- <th scope="col">{{ trans("grades.List_Grade") }}</th> --}}
            <th scope="col">{{ trans("grades.Name") }}</th>
            <th scope="col">{{ trans("grades.Notes") }}</th>

            
          </tr>
        </thead>
        {{ $i = 1 }}
        <tbody>
            @foreach ($grades as $grade)
            {{ $i++ }}
                <tr>
                    <th>{{ $i }}</th>
                    <th>{{ $grade->name }}</th>
                    <th>{{ $grade->notes }}</th>
                </tr>
            @endforeach
        </tbody>
      </table>




      <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Grades.add_Grade') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route("grade.store") }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('Grades.stage_name_ar') }}
                                :</label>
                            <input id="Name" type="text" name="Name" class="form-control">
                        </div>
                        <div class="col">
                            <label for="Name_en" class="mr-sm-2">{{ trans('Grades.stage_name_en') }}
                                :</label>
                            <input type="text" class="form-control" name="Name_en">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                            :</label>
                        <textarea class="form-control" name="Notes" id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <br><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('Grades.submit') }}</button>
            </div>
            </form>

        </div>
    </div>
    </div>
<!-- row closed -->
@endsection
@section('js')

@endsection
