@extends('layouts.user')

@section('content')

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>Task</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="table-responsive">
                      <table style="width: 100%">
                        <tr>
                          <th class="column-title" style="width: 60px">Class</th>
                          <th class="column-title" style="width: 20px">:</th>
                          <th class="column-title" style="width: 200px">{{$data->name}}</th>
                        </tr>
                        <tr>
                          @foreach($resident as $r)
                            @if($r->class_id==$data->id)
                              @if($r->getUser->role == 1)
                                <th class="column-title" style="width: 60px">Mentor</th>
                                <th class="column-title" style="width: 20px">:</th>
                                <th class="column-title" style="width: 200px">{{$r->getUser->name}}</th>
                                <th></th>
                              @endif
                            @endif
                          @endforeach
                        </tr>
                      </table>
                    </div>
                    <br>

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="width: 300px">No. </th>
                            <th class="column-title">Task </th>
                            <th class="column-title no-link last" style="width: 260px"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($task as $num => $t)
                            <tr>
                              <td>{{ $num+1 }}</td>
                              <td>{{$t->name}}</td>
                              <td class=" last">
                                <a href="{{ url('backend/detail', $t->id) }}">
                                  <button class="btn btn-primary"> show & submit
                                  </button>
                                </a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="{{ route('task.store') }}">
                      @csrf
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">file <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="deadline" name="file" required="required" class="form-control col-md-7 col-xs-12" value="">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
						
                  </div>
                </div>
              </div>
@endsection