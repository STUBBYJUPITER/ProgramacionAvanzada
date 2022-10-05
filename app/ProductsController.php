<?php
session_start();
class ProductsController{
    public function getProducts(){
                
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$_SESSION['token'],
            
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response= json_decode($response);
        if (isset($response->code) && $response->code>0) {
            return $response->data;
        }else{
            return array();
        }
    }

    public function addProduct($name,$slug,$description,$features,$brand){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('name' => $name,
        'slug' => $slug,
        'description' => $description,
        'features' => $features,
        'brand_id' => $brand),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
        }
}
if(isset ($_POST["addProduct"])){
    switch($_POST["addProduct"]){
        case 'access':
            $email = strip_tags($_POST['email']);
            $password= strip_tags($_POST['password']);

            $authController= new AuthController();
            $authController->Loggin($email,$password);

        break;
    }
}
?>