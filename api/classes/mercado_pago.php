<?php


class MercadoPago{
    
    public $secret_token;
    public $notification_url;

    function __construct()
    {
        $config = new config();
        $config_info = $config->get();
        $this->secret_token = $config_info['mp_secret_token'];
        $this->notification_url = $config_info['Notication_URL'];
    }
    
    function CreatePix($id_gateway, $product_title, $customer_email, $value){
        
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.mercadopago.com/v1/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '
            {
                "notification_url": "'. $this->notification_url .'",
                    "description": "'. $product_title . '",
                    "external_reference": "'. $id_gateway.'",
                    "payer": {
                        "entity_type": "individual",
                        "type": "customer",
                        "email": "'. $customer_email .'",
                        "identification": {
                            "type": "CPF",
                            "number": "95749019047"
                        }
                    },
                    "payment_method_id": "pix",
                    "transaction_amount": 1.0
                }
                
                ',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '. $this->secret_token
                ),
            ));
            
            
            $response = curl_exec($curl);
            curl_close($curl);
            
            return json_decode($response, true);
            
        }
        
        
    }
    
    ?>