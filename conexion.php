<?php

      $ZipCodeTo = $_POST['billing_postcode'];

      $data = array(
        "ZipCodeFrom"=> "05120",
        "ZipCodeTo"=>"06000",
        "Content"=> "Producto",
        
        "Parcel"=> array (
              "Weight"=> 350,
            "Width"=> 10,
            "Height"=> 10,
            "Length"=> 10
            ),
             
        "CouponCode"=> null,
        "InsuredAmount"=> 1000,
        
        "AddressFrom"=> array (
            "ZipCode"=> "05120",
            "State"=> "MX-CMX",
            "City"=> "Ciudad de México",
            "Neighborhood"=> "Bosques de las Lomas",
            "Address1"=> "D. Bosque de Tabachines  136",
            "Address2"=> " ",
            "Country"=> "MX",
            "UserState"=> "MX-CMX"
            ),
            
        "AddressTo"=> array (
            "ZipCode"=> "97206",
            "State"=> "MX-YUC",
            "City"=> "Yucatán",
            "Neighborhood"=> "El Rosario",
            "Address1"=> "Calle 29 A Exterior 302",
            "Address2"=> "por 26 A y 26 B",
            "CityId"=> null,
            "CityName"=> null,
            "Country"=> "MX",
            "International"=>false,
            "UserState"=> "MX-YUC"
            ),
            
        "Sender"=> array  (
            "Name"=> "Macani",
            "Phone1"=> "5532245879",
            "Phone2"=> "5532245879",
            "Email"=> "atencioncliente@macaniswimwear.com"
            ),
            
        "Recipient"=> array (
                "Name"=> "Benjamín Grijalva",
                "CompanyName"=> "Espinoza - Colunga",
                "Phone1"=> "5532938086",
                "Email"=> "Antonio.Sanabria54@nearbpo.com"
                ),
       
        );
        
        $data_string = json_encode($data); 

        
        curl_setopt_array($ch = curl_init(), array(
         CURLOPT_URL => "https://seller.pakke.mx/api/v1/Shipments",
         CURLOPT_SSL_VERIFYPEER => 0,
         CURLOPT_POST => 1,
         CURLOPT_HTTPHEADER => array(
            'Authorization: dHbCY46CvpiFTrKjriCSyrg5jRUSDLnCDb7TpONYxDqvMrXGjqFbDunMy3IhTUHF',
            'Content-Type: application/json',
            'Accept: application/json',
            
            ),
   
         CURLOPT_POSTFIELDS => $data_string,
        
        ));
        $response = curl_exec($ch);
        
        curl_close($ch);
       
        $respuesta = json_decode($response);
    

    echo $respuesta->TotalAmount;
?>
//*********************** */
/*wp-content/plugins/woocommerce/templates/checkout/payment-method.php*/

<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>" <?php if ( ! $gateway->chosen ) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;"<?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>