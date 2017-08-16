@extends('layouts.master-sidebar')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <form class="form-inline centered" style="padding:35px 0px 35px 0px;">
                <div class="row">
                    <div style="padding-right:0px;" class="form-group large-group col-sm-10 col-xs-10">
                        <input type="text" class="form-control" id="client-search-string" style="width:100%" name="client-search-string" placeholder="Client Search">
                    </div>
                    <button type="submit" onclick="requestClientData(event)" class="btn btn-primary col-sm-2 col-xs-2 search-button"><i class="glyphicon glyphicon-search large-button-text"></i></button>
                </div>        
            </form>
        </div>
        <div style="padding-left:0px;" class="col-xs-12">
             <table hidden id="results-table" class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Location</th>
                    <th>Trainer</th>
                </tr>
                </thead>
                <tbody id="results-body">
                
                </tbody>
            </table>
        </div>
    </div>

    <script type="text/javascript">

        function requestClientData(event){
            event.preventDefault();

            $.ajax({
                type:"GET",
                url:"{{route('search-clients')}}",
                data: {
                    clientSearchString:$("#client-search-string").val(),
                    _token:"{{Session::token()}}"
                },
                success: function(data){
                    updateTable(data.clients);
                }
            });
        }

        function updateTable(clients){
            $(document).ready(function(){
                $(".client-row").click(function(){
                    window.location = $(this).data("href");
                });
            });
            
            $("#results-body").html("");
            if(clients.length === 0){
                $("#results-table").attr("hidden","hidden");
            }
            else{
                $("#results-table").removeAttr("hidden");
                
                clients.forEach(function(client){

                    if(client["trainer_first"] === null)
                        client["trainer_first"] = "";
                    if(client["trainer_last"] === null)
                        client["trainer_last"] = "";
                    if(client["location"] === null)
                        client["location"] = "";

                    $("#results-body").append(`
                        <tr class='client-row' data-href='/profile/`+client["id"]+`'>
                            <td>` + client["first_name"] + `</td>
                            <td>` + client["last_name"] + `</td>
                            <td>` + client["email"] + `</td>
                            <td>` + client["location"] + `</td>
                            <td>` + client["trainer_first"] + ' ' + client["trainer_last"] + `</td>
                        </tr>`
                    );
                })
            }
        }

    </script>

@endsection