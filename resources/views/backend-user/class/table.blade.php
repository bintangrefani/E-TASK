@extends('layouts.user')

@section('content')

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">

                    <h2>My Class</h2>
                    <div align="right">
                      <a href="{{url('form/class')}}">
                        <button align="right" type="button" class="btn btn-success">
                          <i class="glyphicon glyphicon-plus"></i>
                          Join Class
                        </button>
                      </a>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">


                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action" style="text-align: center;">
                        <thead>
                          <tr class="headings">
                            <th class="column-title" style="width: 40px">No. </th>
                            <th class="column-title" style="text-align: center">Class </th>
                            <th class="column-title" style="width: 340px; text-align: center">Mentor </th>
                            <th class="column-title no-link last" style="width: 380px; text-align: center"><span class="nobr">Action</span>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          @foreach($data as $num => $d)
                              <tr>
                                <td style="text-align: left;">{{ $num+1 }}</td>
                                <td>{{ $d->name}}</td>
                                  @foreach($resident as $r)
                                    @if($r->class_id==$d->id)
                                      @if($r->getUser->role == 1)
                                        <td>{{$r->getUser->name}}</td>
                                      @endif
                                    @endif
                                  @endforeach
                                <td class=" last">
                                  <a href="{{ route('userclass.show', $d->id) }}">
                                    <button class="btn btn-primary"> show task
                                    </button>
                                  </a>
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