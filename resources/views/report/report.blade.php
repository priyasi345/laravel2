

@extends('layouts.master')
 
@section('content')
    <style>
        .my_table td{
            border: dotted 1px rgb(73, 98, 151);
            padding: 5px;          
            }
    .my_table th{
        padding: 10px;
        background-color: rgb(90, 123, 195); 
        color: white;         
    }
    .error{
        color: red;
        border-color:red;
        font-weight: 900;
    }
    </style>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="page-wrapper">
                <!-- Page body start -->
                <div class="page-body">
                    <div class="row">
                        <div class="col-sm-12">
                             <!-- Basic Form Inputs card start -->
                             <div class="card">
                                <div class="card-block">
                                    <h4 class="sub-title">Chexbox</h4>
                                    <form id="validate" method="POST" action="">
                                        @csrf
                                       <!-- col Check List -->
                                        <div class="col-md-12">
                                            <div class="box">
                                                    <div class="box-header">
                                                <h3 class="box-title">Form Check List</h3>
                                                <span id="message_error"></span>
                                                <span class="text-danger" style="color:red; font-weight: 700;" id="status_checkbox-error"></span>
                                            </div> 
                                            <div class="box-body">
                                                <table style="width: 100%;border:dotted 1px #365d9d;" border="1" id="my_table" class="my_table">
                                                        <tr>
                                                            <th style="width: 200px;">ID</th>
                                                            <th>Text Input</th>
                                                            <th class="text-center" style="width: 100px;">Yes</th>
                                                            <th class="text-center" style="width: 120px;">No</th>
                                                        </tr>
                                                        @foreach ($data as $item)
                                                            <tr>
                                                                <td>
                                                                {{ $item->no_id}}
                                                                <input type="hidden" name="no_id[]" value="{{ $item->no_id }}">
                                                                </td>
                                                                <td>
                                                                <input type="text" name="description[]" class="form-control" value="{{ $item->description }}" readonly>
                                                                </td>
                                                                <td align="center">
                                                                <label class="form-label">
                                                                    <input type="checkbox" id="status_checkbox" class="{{ $item->no_id }}" name="status_checkbox[]" value="{{$item->status}}" {{ ($item->status == 'yes' ? ' checked' : '') }}  onclick="return false;" > <span class="label-text"> </span>
                                                                </label>
                                                                </td>
                                                                <td align="center">
                                                                <label class="form-label">
                                                                    <input type="checkbox" id="status_checkbox" class="{{ $item->no_id }}" name="status_checkbox[]" value="{{$item->status}}" {{ ($item->status == 'no' ? ' checked' : '') }}  onclick="return false;"> <span class="label-text"> </span>
                                                                </label>
                                                                </td>
                                                            </tr> 
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div><!-- end col Daily Switch Check List -->
                                    </form>
                                </div>
                            </div>
                            <!-- Basic Form Inputs card end -->
                        </div>
                    </div>
                </div>
                <!-- Page body end -->
            </div>
        </div>
    </div>
@endsection

