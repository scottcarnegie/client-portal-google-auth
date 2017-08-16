<?php

    namespace App\Http\Controllers;

    use App\GoogleUser;
    use \Illuminate\Http\Request;
    use \Illuminate\Support\Facades\App;
    use \Illuminate\Support\Facades\DB;

    class GoogleUserController extends Controller{
    
        public function loadSignIn(){
            return View('user.login');
        }

        public function userSignOut(){
            session()->flush();
            return redirect('/login');
        }

        public function createUserSession(Request $request){
            $gUser = new GoogleUser();
            $gUser->name = $request["name"];
            $gUser->imageUrl = $request["imageUrl"];
            $gUser->email = $request["email"];
            $gUser->token = $request["userToken"];
            $gUser->isValid = $this->verifyUser($gUser->token);

            session(['google-user' => $gUser]);
        }
       
        private function verifyUser($token){

            $userResponse = $this->validateToken($token);
            $domain = $this->getDomain();
            $clientId = $this->getClientId();

            if($userResponse){
                if(array_key_exists("aud",$userResponse) && array_key_exists("hd",$userResponse)){
                    if($userResponse["aud"] === $clientId && $userResponse["hd"] === $domain){
                        return true;
                    }
                    else if($userResponse["aud"] === $clientId && $userResponse["hd"] === "tidbytes.ca"){
                        return true;
                    }
                    else if($userResponse["aud"] === $clientId && $userResponse["hd"] === "betteritsystems.ca"){
                        return true;
                    }
                    else{
                        return false;
                    }       
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }

        private function validateToken($token){
        
            // Make GET Request
            $url = "https://www.googleapis.com/oauth2/v3/tokeninfo";
            $ch = curl_init();
            $headers = array(
                'Accept: application/json',
                'Content-Type: application/json'
            );
            curl_setopt($ch, CURLOPT_URL, $url.'?id_token='.$token);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 30);

            // If DEVELOPMENT disable certifate verification
            if (App::environment('local')) {
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            } 

            // Execute GET
            $response = curl_exec($ch);

            // ERROR CODES
            // if(!$response){
            //     die('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
            // }

            curl_close($ch);

            $userObj = json_decode($response, true);

            if(!$userObj["sub"]){
                return null;
            }
            else{
                return $userObj;
            }

        }

        private function getClientId(){
            $clientId = env('GOOGLE_CLIENT_ID');
            return "$clientId.apps.googleusercontent.com";
        }   

        private function getDomain(){
            $domain = env("GSUITE_DOMAIN");
            return $domain;
        }
    
    }

?>