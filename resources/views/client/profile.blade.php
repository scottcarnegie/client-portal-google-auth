@extends('layouts.master-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
                <h3>Client Profile &nbsp;<a class="glyphicon glyphicon-pencil edit-link" href="/details/{{$client->id}}"></a></h3> 
                <br>
        </div>
        <div class="col-md-4">
       
            <form class="form-horizontal">
                <div class="group-readonly">
                    <label class="control-label col-xs-3">Name</label>
                    <div class="col-xs-9">
                        <div class="field-readonly">{{$client->first_name." ".$client->last_name}}</div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-3">Email</label>
                    <div class="col-xs-9"> 
                        <div class="field-readonly">{{$client->email}}</div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-3">Age</label>
                    <div class="col-xs-9"> 
                        <div class="field-readonly">{{$client->getAge()}}</div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-3">Location</label>
                    <div class="col-xs-9"> 
                        <div class="field-readonly">
                            @if($client->location_id !== 0)
                                {{$client->location->name}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-3">Trainer</label>
                    <div class="col-xs-9"> 
                        <div class="field-readonly">
                            @if($client->trainer_id !== 0)
                                {{$client->trainer->first_name.' '.$client->trainer->last_name}}
                            @endif
                        </div>
                    </div>
                </div>
                <div class="log-btn">
                    <button type="button" class="btn btn-warning" name="newLogBtn" data-toggle="modal" data-target="#newLogModal">Create Log</button>
                </div>
               
            </form>
        
        </div>
        <div class="col-md-8 activity-logs" style="padding-left:0px; padding-right:0px;">
            <h4>Activity Logs</h4>   
            <div class="well nice-scroll">
                @for ($i = 0; $i < count($logs); $i++)
                    @if($i%2 === 0)
                        <div class="log-bubble-left">
                    @else
                        <div class="log-bubble-right">
                    @endif
                    @if($logs[$i]->trainer_id !== 0)
                        <p><b>{{$logs[$i]->trainer->first_name.' '.$logs[$i]->trainer->last_name}}</b>&nbsp&nbsp&nbsp&nbsp{{$logs[$i]->getUploadDate()}}</p> 
                    @endif
                    <pre style="white-space: pre-wrap; word-wrap: normal; word-break: keep-all;">{{$logs[$i]->details}}</pre>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newLogModal" tabindex="-1" role="dialog" aria-labelledby="newLogModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">New Client Log</h4>
                </div>
                <div class="modal-body">
                    <form id="new-log-form" name="new-log-form">
                        <div class="form-group">
                            <textarea class="form-control" rows="4" id="logText" name="logText" placeholder="Write your log entry."></textarea>
                        </div>                       
                        <button type="submit" onclick="uploadNewLog(event)" class="btn btn-success" name="submit">Submit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="hidden" value="{{Session::token()}}" id="_token" name="_token">
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        
        function uploadNewLog(event){
            event.preventDefault();

            $.ajax({
                type:"POST",
                url:"{{route('create-log')}}",
                data: {
                    id:'{{$client->id}}',
                    logData:$('#logText').val(),
                    _token:"{{Session::token()}}"
                },
                success: function(data){
                    window.location.href = "/profile/{{$client->id}}";
                }
            });
        }

    </script>

@endsection