@extends('layouts.master')

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
                          <td align="right">
                            <a href="{{url('task/add', $data->id)}}">
                              <button align="right" type="button" class="btn btn-success">
                                <i class="glyphicon glyphicon-plus"></i>
                                Add Task
                              </button>
                            </a>
                          </td>
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
                                <a href="{{ route('task.show', $t->id) }}">
                                  <button class="btn btn-primary"> show
                                  </button>
                                </a>
                                <form style="display:inline" method="POST" action="{{ route('task.destroy', $t->id) }}">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
						
                  </div>
                </div>
              </div>
@endsection