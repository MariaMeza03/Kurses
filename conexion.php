<?php

      $ZipCodeTo = $_POST['billing_postcode'];

      $data = array(
        "ZipCodeFrom"=> "05120",
        "ZipCodeTo"=>"02100",
        "Content"=> "Producto",
        
        "Parcel"=> array (
              "Weight"=> 1,
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
            "ZipCode"=> "02100",
            "State"=> "MX-CMX",
            "City"=> "Ciudad de México",
            "Neighborhood"=> "Azcapotzalco",
            "Address1"=> " El Rosario",
            "Address2"=> "por 26 A y 26 B",
            "CityId"=> null,
            "CityName"=> null,
            "Country"=> "MX",
            "International"=>false,
            "UserState"=> "MX-CMX"
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

<?php
/**
 * Output a single payment method
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment-method.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<li class="wc_payment_method payment_method_<?php echo esc_attr( $gateway->id ); ?>">
	<input id="payment_method_<?php echo esc_attr( $gateway->id ); ?>" type="radio" class="input-radio" name="payment_method" value="<?php echo esc_attr( $gateway->id ); ?>" <?php checked( $gateway->chosen, true ); ?> data-order_button_text="<?php echo esc_attr( $gateway->order_button_text ); ?>" />

	<label for="payment_method_<?php echo esc_attr( $gateway->id ); ?>">
		<?php echo $gateway->get_title(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?> <?php echo $gateway->get_icon(); /* phpcs:ignore WordPress.XSS.EscapeOutput.OutputNotEscaped */ ?>
	</label>
	
	<?php if ( $gateway->has_fields() || $gateway->get_description() ) : ?>
		<div class="payment_box payment_method_<?php echo esc_attr( $gateway->id ); ?>" <?php if ( ! $gateway->chosen ) : /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>style="display:none;"<?php endif; /* phpcs:ignore Squiz.ControlStructures.ControlSignature.NewlineAfterOpenBrace */ ?>>
			<?php $gateway->payment_fields(); ?>
		</div>
	<?php endif; ?>
	
</li>



/****************************************************************** */


<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout" action="https://macaniswimwear.com/conexion.php" enctype="multipart/form-data">

	<?php if ( $checkout->get_checkout_fields() ) : ?>

		<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>

		<div class="col2-set" id="customer_details">
			<div class="col-1">
				<?php do_action( 'woocommerce_checkout_billing' ); ?>
			</div>

			<div class="col-2">
				<?php do_action( 'woocommerce_checkout_shipping' ); ?>
			</div>
		</div>

		<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

	<?php endif; ?>
	
	<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
	
	<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
	
	<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

	<div id="order_review" class="woocommerce-checkout-review-order">
		<?php do_action( 'woocommerce_checkout_order_review' ); ?>
	</div>

	<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
