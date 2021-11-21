

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
                                    <form id="validate" method="POST" action="{{ route('form/save') }}">
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
                                                                <input type="text" name="description[]" class="form-control" value="{{ $item->description }}">
                                                                </td>
                                                                <td align="center">
                                                                <label class="form-label">
                                                                    <input type="checkbox" id="status_checkbox" class="{{ $item->no_id }}" name="status_checkbox[]" value="yes" required> <span class="label-text"> </span>
                                                                </label>
                                                                </td>
                                                                <td align="center">
                                                                <label class="form-label">
                                                                    <input type="checkbox" id="status_checkbox" class="{{ $item->no_id }}" name="status_checkbox[]" value="no" required> <span class="label-text"> </span>
                                                                </label>
                                                                </td>
                                                            </tr> 
                                                        @endforeach
                                                    </table>
                                                </div>
                                            </div>
                                        </div><!-- end col Daily Switch Check List -->
                                        <br>
                                        <button type="submit" class="btn waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i>Save</button>
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
@section('script')
    <!-- library js validate -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

    <script type="text/javascript">
		$("input:checkbox").on('click', function()
		{
			var $box = $(this);
			if ($box.is(":checked"))
			{
				var group = "input:checkbox[class='" + $box.attr("class") + "']";
				$(group).prop("checked", false);
				$box.prop("checked", true);
			}
			else
			{
				$box.prop("checked", false);
			}
		});

    </script>

    <!-- alert blink text -->
    <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
    </script>
    <!-- script validate form -->

    <!-- script validate form -->
    <script>
        $('#validate').validate({
            reles: {
                'status_checkbox[]': {
					required :true,
					minlength:5,
				}
               
            },
            messages: {
                'status_checkbox[]' : "Please check all file*",
            },
            errorPlacement: function (error, element)
            {
                if(element.attr("name") == "status_checkbox[]")
                {
                    $('#message_error').empty();error.appendTo('#message_error')
                }
                else
                {
                    error.insertAfter(element);
                }
            }

        });
    </script>

@endsection

