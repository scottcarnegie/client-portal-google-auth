<?php

    namespace App\Http\Controllers;

    use DateTime;
    use Input;    
    use App\Location;
    use App\Client;
    use App\Trainer;
    use App\ClientSessionLog;
    use \Illuminate\Http\Request;
    use \Illuminate\Support\Facades\DB;

    class ClientController extends Controller{
        
        public function newClientFormAction(){
            return View('client.new');
        }

        public function createClient(Request $request){
            if(isset($request['emailAddress'])){

                $client = new Client();
                $client->first_name = $request->firstName;
                $client->middle_name = $request->middleName;
                $client->last_name = $request->lastName;
                $client->email = $request->emailAddress;

                $date_of_birth = DateTime::createFromFormat('m/d/Y', $request->birthDate);
                $client->birth_date = $date_of_birth->format('Y-m-d');

                $isSaved = $client->save();

                if($request->ajax()){
                    return response()->json(['id' => $client->id]);
                }

                if(!$isSaved){
                    App::abort(500, 'Error');
                }
                else{
                    return redirect()->route('details', ['id' => $client->id]);
                }
            }

            return redirect('/search');
        }

        public function getClientDetails($id){

            $client = Client::where('id',(int)$id)->first();
            $locations = Location::all();
            $trainers = Trainer::all();

            return View('client.edit-details',['client' => $client,'trainers' => $trainers,'locations'=>$locations]);

        }

        public function getClientProfile($id){

            $client = Client::where('id',(int)$id)->first();
            $logs = ClientSessionLog::where('client_id',(int)$id)->get();

            return View('client.profile',['client' => $client, 'logs' => $logs]);

        }

        public function setClientDetails(Request $request){
            if(isset($request["id"])){
                $client = Client::where('id',$request['id'])->first();
                if(isset($request["location"])){
                    $location = Location::where('id',$request['location'])->first();
                    $location->locationMember()->save($client);
                }
                if(isset($request["trainer"])){
                    $trainer = Trainer::where('id',$request['trainer'])->first();
                    $trainer->hasClients()->save($client);
                }
            }

            if($request->ajax()){
                return response()->json([
                    'id' => $client->id,
                    'location' => $client->location->name,
                    'trainer' => $client->trainer->first_name.' '.$client->trainer->last_name
                ]);
            }

            return redirect('/search');
            
            
        }

        public function searchClients(Request $request){

            $clients = array();
            if(isset($request["clientSearchString"])){

                $searchString = $request["clientSearchString"];
                preg_match_all("/[a-zA-Z0-9@.'-]+/", $searchString, $match);
                $queryStrings = $match[0];

                if(count($queryStrings) > 0){
                    if(count($queryStrings)===1){
                        $clients = DB::table('clients')
                        ->leftJoin('locations', 'clients.location_id', '=', 'locations.id')
                        ->leftJoin('trainers', 'clients.trainer_id', '=', 'trainers.id')
                        ->select('clients.id','clients.first_name','clients.last_name','clients.email','locations.name as location','trainers.first_name as trainer_first','trainers.last_name as trainer_last')
                        ->where('clients.first_name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->orWhere('clients.middle_name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->orWhere('clients.last_name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->orWhere('clients.email', 'LIKE', '%'.$queryStrings[0].'%')
                        ->orWhere('locations.name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->get();
                    }
                    if(count($queryStrings)===2){
                        $clients = DB::table('clients')
                        ->leftJoin('locations', 'clients.location_id', '=', 'locations.id')
                        ->leftJoin('trainers', 'clients.trainer_id', '=', 'trainers.id')
                        ->select('clients.first_name','clients.last_name','clients.email','locations.name as location','trainers.first_name as trainer_first','trainers.last_name as trainer_last')
                        ->where('clients.first_name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->where('clients.last_name', 'LIKE', '%'.$queryStrings[1].'%')
                        ->get();
                    }
                    if(count($match)===3){
                        $clients = DB::table('clients')
                        ->leftJoin('locations', 'clients.location_id', '=', 'locations.id')
                        ->leftJoin('trainers', 'clients.trainer_id', '=', 'trainers.id')
                        ->select('clients.first_name','clients.last_name','clients.email','locations.name as location','trainers.first_name as trainer_first','trainers.last_name as trainer_last')
                        ->where('clients.first_name', 'LIKE', '%'.$queryStrings[0].'%')
                        ->where('clients.middle_name', 'LIKE', '%'.$queryStrings[1].'%')
                        ->where('clients.last_name', 'LIKE', '%'.$queryStrings[2].'%')
                        ->get();
                    }

                    return response()->json([
                        'message' => 'Valid search',
                        'clients' => $clients
                    ]);
                }
                else{
                    return response()->json([
                        'message' => 'Empty search',
                        'clients' => $clients
                    ]);
                }
            }
            return response()->json([
                    'message' => 'Invalid search',
                    'clients' => $clients
            ]);
        }

    }


?>