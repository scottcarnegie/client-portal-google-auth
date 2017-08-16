@extends('layouts.master-sidebar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <form id="new-contact-form" name="new-contact-form">
                <div class="form-group">
                    <label for="firstName">First Name</label>
                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                </div>
                <div class="form-group">
                    <label for="middleName">Middle Name</label>
                    <input type="text" class="form-control" id="middleName" name="middleName" placeholder="Middle Name">
                </div>
                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                </div>
                <div class="form-group">
                    <label for="emailAddress">Email Address</label>
                    <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="birthDate">Date of Birth</label>
                    <input type="text" class="form-control date-input" id="birthDate" name="birthDate" placeholder="Select Date">
                </div>
                
                <button type="submit" onclick="saveClient(event)" class="btn btn-success new-client-button" name="submit">Submit</button>
                <button type="button" onclick="redirectToHome()" class="btn new-client-button" name="cancel">Cancel</button>

                <input type="hidden" value="{{Session::token()}}" id="_token" name="_token">
             
            </form>
        </div>
    </div>

    <script type = "text/javascript">

        function redirectToHome(){
            window.location.href = "/";
        }

        function saveClient(event){
            event.preventDefault();

            $.ajax({
                type:"POST",
                url:"{{route('create-client')}}",
                data: {
                    firstName:$("#firstName").val(),
                    middleName:$("#middleName").val(),
                    lastName:$("#lastName").val(),
                    emailAddress:$("#emailAddress").val(),
                    birthDate:$("#birthDate").val(),
                    _token:"{{Session::token()}}"
                },
                success: function(data){
                    window.location.href = "/details/"+ data["id"];
                }
            });
            
        } 
    </script>

@endsection