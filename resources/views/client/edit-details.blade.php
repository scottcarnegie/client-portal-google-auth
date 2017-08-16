@extends('layouts.master-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
                <h3>Client Details</h3>
                <br>
        </div>
        <div class="col-md-4 col-xs-12" style="margin: 0 0 30px 0;">
       
            <form class="form-horizontal">
                <div class="group-readonly">
                    <label class="control-label col-xs-2">Name</label>
                    <div class="col-xs-10">
                        <div class="field-readonly">{{$client->first_name." ".$client->last_name}}</div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-2">Email</label>
                    <div class="col-xs-10"> 
                        <div class="field-readonly">{{$client->email}}</div>
                    </div>
                </div>
                <div class="group-readonly">
                    <label class="control-label col-xs-2">Age</label>
                    <div class="col-xs-10"> 
                        <div class="field-readonly">{{$client->getAge()}}</div>
                    </div>
                </div>
            </form>
        
        </div>
        <div class="col-md-8 col-xs-12">
            <form id="details-contact-form" name="details-contact-form">
                <div class="form-group">
                    <label for="location">Location</label>
                    <select class="form-control" id="location" name="location">
                        @if($client->location_id === 0)
                            <option selected disabled>Select Location</option>
                        @endif
                        
                        @foreach ($locations as $location)
                        <option value="{{$location->id}}">{{$location->name}}</option>
                        @endforeach 
                        
                        @foreach ($locations as $location)
                            @if($client->location_id === $location->id)
                                <option selected value="{{$location->id}}">{{$location->name}}</option>
                            @else
                                <option value="{{$location->id}}">{{$location->name}}</option>
                            @endif  
                        @endforeach                
                    </select>
                </div>
                <div class="form-group">
                    <label for="trainer">Trainer</label>
                    <select class="form-control" id="trainer" name="trainer">
                        @if($client->trainer_id === 0)
                            <option selected disabled>Select Trainer</option>
                        @endif
                        @foreach ($trainers as $trainer)
                            @if($client->trainer_id === $trainer->id)
                                <option class="trainer-opt" selected value="{{$trainer->id}}" location="{{$trainer->location_id}}">{{$trainer->first_name}} {{$trainer->last_name}}</option>
                            @else
                                <option class="trainer-opt" value="{{$trainer->id}}" location="{{$trainer->location_id}}">{{$trainer->first_name}} {{$trainer->last_name}}</option>
                            @endif  
                        @endforeach          
                    </select>
                </div>

                <button type="submit" onclick="updateClient(event)" class="btn btn-success new-client-button" name="submit">Submit</button>
                <button type="button" onclick="redirectToProfile()" class="btn new-client-button" name="cancel">Cancel</button>
                <input type="hidden" value="{{Session::token()}}" name="_token">
            
            </form> 
        </div>
    </div>
    
<script type="text/javascript">
        $(document).ready(function(){
            
            var clientLocation = {{$client -> location_id}};
            if(clientLocation !== 0){
                filterTrainers(clientLocation);
            }

            $("#location").change(function(){
                filterTrainers($("#location").val());
            });

        });

        function filterTrainers(locationId){

            $("option[class='trainer-opt'][location='" + locationId  + "']").removeAttr("hidden");
            $("option:not([location='" + locationId  + "'])[class='trainer-opt']").attr("hidden","hidden");
        
        }

        function redirectToProfile(){
            window.location.href = "/profile/{{$client->id}}";
        }

        function updateClient(event){
            event.preventDefault();

            $.ajax({
                type:"PUT",
                url:"{{route('update-client-details')}}",
                data: {
                    id:'{{$client->id}}',
                    location:$("#location").val(),
                    trainer:$("#trainer").val(),
                    _token:"{{Session::token()}}"
                },
                success: function(data){
                    window.location.href = "/profile/{{$client->id}}";
                }
            });
        }

    </script>

@endsection