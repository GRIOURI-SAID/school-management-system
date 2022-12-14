@extends('layouts.master')
@section('css')
    @toastr_css


@section('title')
    empty
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0"> {{ trans('trans.grads') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">Home</a></li>
                <li class="breadcrumb-item active">{{ trans('trans.grad-list') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('My_Classes_trans.add_class') }}
                </button>
                <br><br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered p-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('My_Classes_trans.Name_Grade') }}</th>
                                <th>{{ trans('My_Classes_trans.Name_class') }}</th>
                                <th>{{ trans('My_Classes_trans.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($Classroms as $classroom)
                                @php
                                    $i++;
                                @endphp

                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $classroom->Name_class }}</td>
                                    <td>{{ $classroom->Grades->Name }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $classroom->id }}"
                                            title="{{ trans('Classrom_trans.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $classroom->id }}"
                                            title="{{ trans('Classrom_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>


                                </tr>

                                <!-- delete --->
                                <div class="modal fade" id="delete{{ $classroom->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('My_Classes_trans.Delete') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('classrom.destroy', 'test') }}" method="POST">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">

                                                            {{ trans('My_Classes_trans.Warning_Grade') }}
                                                            <input type="hidden" name="id"
                                                                value="{{ $classroom->id }}">
                                                        </div>

                                                    </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-danger">{{ trans('My_Classes_trans.Delete') }}</button>
                                            </div>
                                            </form>

                                        </div>

                                    </div>

                                </div>

                                <!-- Edit --->
                                <div class="modal fade" id="edit{{ $classroom->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('Classrom_trans.Edit') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('classrom.update', 'test') }}" method="POST">
                                                    {{ method_field('put') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name"
                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                                :</label>
                                                            <input id="Name" type="text" name="Name"
                                                                class="form-control"
                                                                value="{{ $classroom->getTranslation('Name_class', 'ar') }}">

                                                            <input type="hidden" name="id"
                                                                value="{{ $classroom->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                name="Name_class_en"
                                                                value="{{ $classroom->getTranslation('Name_class', 'en') }}">
                                                        </div>
                                                    </div>

                                                    <label for="Name_en"
                                                        class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                        :</label>
                                                    <select class="form-control" name="Grade_id">
                                                        <option value="{{ $classroom->Grades->id }}">
                                                            {{ $classroom->Grades->Name }}</option>
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">
                                                                {{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>


                                            </div>



                                            <br><br>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">{{ trans('My_Classes_trans.Close') }}</button>
                                                <button type="submit"
                                                    class="btn btn-success">{{ trans('My_Classes_trans.submit') }}</button>
                                            </div>
                                            </form>

                                        </div>

                                    </div>

                                </div>
                            @endforeach






                    </table>
                </div>
            </div>
        </div>
    </div>


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

                    <form class=" row mb-30" action="{{ route('classrom.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name" />
                                            </div>


                                            <div class="col">
                                                <label for="Name"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('My_Classes_trans.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button"
                                                    value="{{ trans('My_Classes_trans.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('My_Classes_trans.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
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
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
