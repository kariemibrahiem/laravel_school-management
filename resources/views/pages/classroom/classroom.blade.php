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
            <h4 class="mb-0"> {{ trans("classes.title_page") }}</h4>
        </div>
        
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                {{-- <li class="breadcrumb-item"><a href="#" class="default-color">{{ trans("grades.Name") }}</a></li> --}}
                {{-- <li class="breadcrumb-item active">{{ trans("classes.grades") }}</li> --}}
            </ol>
            @if ($errors->any())
                <ul class="form-control">
                    @foreach ($errors->all() as $error)
                            <li class="alert alert-danger">{{ $error }}</li>
                    @endforeach
                </ul>
                
            @endif
            {{-- add grade btn --}}
            {{-- <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('classes.add_class') }}
            </button> --}}
            <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                {{ trans('classes.add_class') }}
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
            <th scope="col">{{ trans("classes.Name_class") }}</th>
            <th scope="col">{{ trans("classes.Name_Grade") }}</th>
            <th scope="col">processes</th>

            
          </tr>
        </thead>
        {{ $i = 1 }}
        <tbody>
            @foreach ($classes as $class)
            {{ $i++ }}
                <tr>
                    <th>{{ $i }}</th>
                    <th>{{ $class->className }}</th>
                    <th>{{ $class->grade->name }}</th>
                    <th>
                        <button type="button" class="btn btn-success x-small" data-toggle="modal" data-target="#updateModel">
                            {{ trans('grades.update') }}
                        </button>
                        <button type="button" class=" btn btn-danger x-small" data-toggle="modal" data-target="#deleteModel">
                            {{ trans('grades.delete') }}
                        </button>
                    </th>
                </tr>


                    <!-- update_modal_Grade -->

                            <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                            {{ trans('classes.add_class') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route("class.update") }}" method="GET">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $class->id }}">
                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{ trans('classes.stage_name_ar') }}
                                                        :</label>
                                                    <input id="Name" value="{{ $class->className }}" type="text" name="className" class="form-control">
                                                </div>
                                               
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">{{ trans('classes.add_class') }}
                                                    :</label>
                                                    <select name="grade_id" class="form-control" id="">
                                                        @foreach ($grades as $grade)
                                                                <option class="form-control" value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
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

                            {{-- delete form  --}}

                            
                            <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                            {{ trans('Grades.delete') }}
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- add_form -->
                                        <form action="{{ route("class.delete") }}" method="GET">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $class->id }}">
                                            </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Grades.Close') }}</button>
                                        <button type="submit" class="btn btn-danger">{{ trans('Grades.delete') }}</button>
                                    </div>
                                    </form>

                                </div>
                            </div>
                            </div>

            
                            @endforeach
        </tbody>
      </table>



<!-- add_modal_class -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('My_Classes_trans.add_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class=" row mb-30" action="{{ route("classes.store") }}" method="GET">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="List_Classes">
                                <div data-repeater-item>
                                    <div class="row">

                                        <div class="col">
                                            <label for="Name"
                                                class="mr-sm-2">{{ trans('classes.stage_name') }}
                                                :</label>
                                            <input class="form-control" type="text" name="Name" />
                                        </div>



                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classes.grade') }}
                                                :</label>

                                            <div class="box">
                                                <select class="fancyselect form-control" name="Grade_id">
                                                    @foreach ($grades as $Grade)
                                                        <option value="{{ $Grade->id }}">{{ $Grade->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>

                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">{{ trans('classes.proccess') }}
                                                :</label>
                                            <input class="btn btn-danger btn-block" data-repeater-delete
                                                type="button" value="{{ trans('classes.delete_row') }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-20">
                                <div class="col-12">
                                    <input class="button" data-repeater-create type="button" value="{{ trans('classes.add_row') }}"/>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">{{ trans('classes.Close') }}</button>
                                <button type="submit"
                                    class="btn btn-success">{{ trans('classes.submit') }}</button>
                            </div>


                        </div>
                    </div>
                </form>
            </div>


        </div>

    </div>

</div>
</div>
</div>

</div>

      {{-- <!-- add_modal_Grade -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classes.Name_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- add_form -->
                <form action="{{ route("classes.store") }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="Name" class="mr-sm-2">{{ trans('classes.Name_class') }}
                                :</label>
                            <input id="Name" type="text" name="className" class="form-control">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades.add_Grade') }}
                            :</label>
                        <select name="grade_id" class="form-control" id="">
                            @foreach ($grades as $grade)
                                    <option class="form-control" value="{{ $grade->id }}">{{ $grade->name }}</option>
                            @endforeach
                        </select>
                            
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
    </div> --}}
<!-- row closed -->
@endsection
@section('js')

@endsection
