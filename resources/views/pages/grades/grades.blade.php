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
            <th scope="col">processes</th>

            
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
                    <th>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-name="{{ $grade->name }}" data-whatever="{{ $grade->id }}">udpate</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-name="{{ $grade->name }}" data-whatever="{{ $grade->id }}" >delete</button>

                       
                    </th>
                </tr>


                    <!-- update_modal_Grade -->

                            <div class="modal fade" id="updateModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <form action="{{ route("grade.update") }}" method="GET">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" name="id" value="{{ $grade->id }}">
                                                <div class="col">
                                                    <label for="Name" class="mr-sm-2">{{ trans('Grades.stage_name_ar') }}
                                                        :</label>
                                                    <input id="Name" value="{{ $grade->name }}" type="text" name="name" class="form-control">
                                                </div>
                                                <div class="col">
                                                    <label for="Name_en" class="mr-sm-2">{{ trans('Grades.stage_name_en') }}
                                                        :</label>
                                                    <input type="text" value="{{ $grade->name }}" class="form-control" name="name_en">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                                                    :</label>
                                                <textarea class="form-control" name="notes" id="exampleFormControlTextarea1" rows="3">{{ $grade->notes }}</textarea>
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
                                        <form action="{{ route("grade.delete") }}" method="GET">
                                            @csrf
                                            <div class="row">
                                                <input type="text" name="id" value="{{ $grade->id }}">
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
                            <input id="Name" type="text" name="name" class="form-control">
                        </div>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ trans('Grades.Notes') }}
                            :</label>
                        <textarea class="form-control" name="notes" id="exampleFormControlTextarea1"
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




    
                {{-- update modal new  --}}
                
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">update the class</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            {{-- the form of updating --}}
                <form action="{{ route("grade.update") }}" method="GET">
                    <input type="hidden" class="form-control idInput" id="recipient-id" name="id">
                    <div class="form-group">
                    <label for="recipient-id" class="col-form-label">name of class:</label>
                    <input type="text" class="form-control nameInput" name="name" id="recipient-id">
                    </div>
              
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">update class</button>
                    </div>
                </form>
        </div>
      </div>
    </div>
  </div>



                {{-- delete modal new  --}}
                
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">delete the class</h5>
          
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route("grade.delete") }}" method="GET">
                <input type="hidden" class="form-control idInput" id="recipient-id" name="id">
                
                <div class="modal-footer">
                <h5 class="modal-title text-danger" >after deleting the grade the all classes related will deleted</h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">delete class</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

<!-- row closed -->
@endsection
@section('js')

<script>

    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever') // Extract info from data-* attributes
        var name = button.data('name') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text("update the class of name :" + name)
        modal.find('.modal-body .idInput').val(id)
        modal.find('.modal-body .nameInput').val(name)
    })
    </script>
<script>

    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('whatever') // Extract info from data-* attributes
        var name = button.data('name') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text("delete the class of name :" + name)
        modal.find('.modal-body .idInput').val(id)
        modal.find('.modal-body .nameInput').val(name)
    })
    </script>
@endsection
