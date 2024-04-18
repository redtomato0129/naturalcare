<?php 

//$transaction = $_POST['refund'];
//$tran= 'DF-13352';
$tran= $_POST['refund'];


 // $data = new stdClass();
        $fields = array();
        

        //APPLICATION-CODE;UNIXTIMESTAMP;UNIQ-TOKEN
        $applicationCode = 'NATURALCARE-EC-SERVER';
        
        // servidor de produccion
        $app_key = 'I5oBJZJBhW1xDbZGDm5HPpBd8uzWCh';
        

        $unixTimeStamp = time();
        $uniqToken = hash('sha256',$app_key . $unixTimeStamp,false);
        // $data->uniqToken = $uniqToken;
        // PARAMETROS
        $transaccionId = $tran;
        

        $transaction = array(
        
            "id" => $transaccionId
        );
        

        $fields = array(
            'transaction' => $transaction
        );
        

      //  $data->fields = $fields;
        

        $codigo = base64_encode($applicationCode.';'.$unixTimeStamp.';'.$uniqToken);
        $data->codigo = $codigo;
        //print("\nJSON sent:\n");
        //print($fields);
        $headers[] = 'Content-Type:application/json';
        $headers[] = 'Accept:application/json';
        $headers[] = 'Auth-Token: '.$codigo;
        

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://ccapi.paymentez.com/v2/transaction/refund/");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        

        $response = curl_exec($ch);
        if(curl_exec($ch) === false){
        	echo "error";
        	echo "<script>alert('Refund no procesado');
        	location.href='refund.php';
        	</script>";
          /*  $data->code = 3;
            $data->error = curl_error($ch);
            $data->message = 'No se ha registrado';
            $data->response = $response;*/
        }else{
        	echo "exito";
        	echo "<script>alert('Refund Exitoso');
        	location.href='reversar.php';
        	</script>";
         /*   $data->response = $response;
            $data->fields = $fields;
            $data->code = 0;
            $data->message = 'Sin problemas';*/
            //echo var_dump($response);
        }
        curl_close($ch);
     /*   if($data){
        echo    $this->response($data, 200); // 200 being the HTTP response code
        }else{
         echo   $this->response(NULL, 404);
        }
 */
?>