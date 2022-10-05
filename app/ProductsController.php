<?php
session_start();
class ProductsController
{
    public function getProducts()
    {

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
                'Authorization: Bearer ' . $_SESSION['token'],

            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);
        if (isset($response->code) && $response->code > 0) {
            return $response->data;
        } else {
            return array();
        }
    }

    public function addProduct($name,  $description, $features, $brand, $file)
    {
        $curl = curl_init();
        $slug = preg_replace('/\s+/', '_', $name);

        curl_setopt_array(
            $curl,
            array(
                CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'name' => $name,
                    'slug' => $slug,
                    'description' => $description,
                    'features' => $features,
                    'brand_id' => $brand,
                    'cover' => new CURLFILE($file)
                ),
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer ' . $_SESSION["token"]
                ),
            ),
        );
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {

            header("location:../products/index.php");
        } else {
            echo "try again";
        }
    }
    public function getProductBySlug($product_slug)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://crud.jonathansoto.mx/api/products/slug/' . $product_slug,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $_SESSION["token"]
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $response = json_decode($response);

        if (isset($response->code) && $response->code > 0) {

            return $response->data;
        } else {
            header("location:../products/error.php");
        }
    }
}
if (isset($_POST["addProduct"])) {
    switch ($_POST["addProduct"]) {
        case 'done':
            $name = strip_tags($_POST['name']);
            $description = strip_tags($_POST['description']);
            $features = strip_tags($_POST['features']);
            $brand_id = strip_tags($_POST['brand_id']);

            if ($_FILES["addImage"]["error"] > 0) {
                echo "error to update image";
            } else {
                $allowed = array("image/gif", "image/jpg", "image/png");
                if (in_array($_FILES["addImage"]["type"], $allowed)) {
                    $route = "file/";
                    $file = $route . $_FILES["addImage"]["name"];
                    if (!file_exists($route)) {
                        mkdir($route);
                    }
                }
            }
            $newProduct = new ProductsController($name, $description, $features, $brand_id, $file);
            $newProduct->addProduct($name, $description, $features, $brand_id, $file);
            break;
    }
}
