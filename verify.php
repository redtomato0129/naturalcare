<?php 


    if (isset($_POST['value'])) {

        $transaction_id = $_POST['value']; 
        $iduser = $_POST['user']; 
        $codf = $_POST['transaction'];      
     
        $appcode='KRISTY-EC-SERVER';
        $appkey='gFUy6QyZ6zfd31KsMPWgFPCRaKJOU5';

        $dev_reference=$_POST['value'];
        $variableTimestamp= (string)(time());
       

        $uniq_token_string = $appkey.$variableTimestamp;
        $uniq_token_hash = hash('sha256', $uniq_token_string);
        $auth_token = base64_encode($appcode.';'.$variableTimestamp.';'.$uniq_token_hash);

        $urlrefund ='https://ccapi.paymentez.com/v2/transaction/verify';

                      
                        $user = array(                          
                                   "id"=>  $iduser
                              );

                      $data = array(
                            
                            'id' => $codf

                            );

                
                        //url contra la que atacamos
                        $ch = curl_init($urlrefund);

                        //a true, obtendremos una respuesta de la url, en otro caso, 
                        //true si es correcto, false si no lo es
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        //establecemos el verbo http que queremos utilizar para la petición
                        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

                        //enviamos el array data
                        $payload = json_encode( array( "user"=> $user, "transaction"=> $data, "type" => "BY_OTP", "value"=>$transaction_id, "more_info" => true) );

                        curl_setopt($ch, CURLOPT_POSTFIELDS,($payload));

                        curl_setopt( $ch, CURLOPT_HTTPHEADER, array(
                          'Content-Type:application/json',
                          'Auth-Token:'.$auth_token));
                        

                        //obtenemos la respuesta
                        $response = curl_exec($ch);


                        //Descodificamos para leer
                        $getresponse = json_decode($response,true);
                      
                        $return_arr = array();

                        $return_arr[] = array("resp" => $getresponse
                                            );

                        // Encoding array in JSON format
                        echo json_encode($return_arr);



                        curl_close($ch);
                      

   
                      
    }

?>