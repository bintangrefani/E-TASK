@extends('layouts.master')
@section('content')

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                    <br>
                    <br>
                    <br>
                        <div class="table-responsive">
                            <div class="ibox-content">

                                <div class="table-responsive">

                                    <form onsubmit="return false;" id="form-konten" class='form-horizontal' enctype="multipart/form-data">
                                        <table class="table table-striped table-hover">
                                            <input type='hidden' name='_token' value='{{ csrf_token() }}'>
                                            <tr>
                                                <td width="15%">Tinggi </td>
                                                <td><input type="text" name="hight" required=""></td>
                                            </tr>
                                            <tr>
                                                <td width="15%">Berat </td>
                                                <td><input type="text" name="weight" required=""></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="submit" class="btn btn-primary" value="Submit">
                                                </td>
                                            </tr>


                                        </table>


                                    </form>
                                    <br><br>
                                        <div id="result"></div>
                                    <br><br>




                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#form-konten').submit(function () {
                var data = getFormData('form-konten');
                ajaxTransfer('/backend/fuzzy/proses', data, '#result');
            })
        })
    </script>
@endsection

@endsection