<?php /* Template Name: Demo Page Template */ get_header(); ?>

  <div id="paypal">
    <div id="paypal-button-container"></div>
    <div id="paypal-paymentComplete" style="display:block;">
      <div class="header">
        <div class="left">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/PayPal.png" />
        </div>
        <div class="right">
          <span>Thank You For Your Payment</span>
        </div>  
      </div>
      
      <div class="details">
        <div class="right">
          <span>Transaction Amount:</span>
          <span id="paypal-amount">$613.00</span>
        </div>
        <div class="left">
          <span id="paypal-name">Gary Biddle</span>
          <span id="paypal-email">gary.biddle@gmail.com</span>
          <span id="paypal-city">Philadelphia</span>
          <span id="paypal-country">USA</span>
          <span id="paypal-zip">19123</span>
          <span id="paypal-state">PA</span>
        </div>
      </div>
      
      <div class="continue-esign">
        <div class="left">
          <span class="next-step">Next Step:</span><span>Sign your documents.</span>
        </div>
        <div class="right">
          <a href="//www.google.com">Continue to esign</a>
        </div>
      </div>
    </div>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
      // Fires on papal success
      // Accepts data object from paypal api success callback
      function paypalComplete(data){
        var payerInfo = data && data.payer && data.payer.payer_info;
        var shippingInfo = payerInfo && payerInfo.shipping_address;
        var transaction = data && data.transactions && data.transactions.length && data.transactions[0];
        var sale = transaction && transaction.related_resources && transaction.related_resources.length && transaction.related_resources[0] && transaction.related_resources[0].sale;
        if(!payerInfo || !transaction || !shippingInfo || !sale) return;
        
        console.log(JSON.stringify(data));
        
        //Payer Info
        var firstName = payerInfo.first_name;
        var lastName = payerInfo.last_name;
        var payerId = payerInfo.payer_id;
        var email = payerInfo.email;
        
        //Shipping Info
        var shippingCity = shippingInfo.city;
        var shippingAddress1 = shippingInfo.line1;
        var shippingZip = shippingInfo.postal_code;
        var shippingState = shippingInfo.state;
  
        //Transaction Info
        var saleTotal = sale.amount.total;
        var saleFee = sale.transaction_fee.value || "0.00";
        var saleId = data.id;
        
        $("#paypal-name").text(firstName + " " + lastName);
        $("#paypal-email").text(email); 
        $("#paypal-amount").text("$" + saleTotal);
          
        $("#paypal-state").text(shippingState);
        $("#paypal-zip").text(shippingZip);
        $("#paypal-city").text(shippingCity);
        $("#paypal-country").text("USA");
        
        $("#paypal-paymentComplete").show(); 
      }
      
      // Initializes paypal button and widget
      // Accepts paymentAmount
      function initializePaypal(paymentAmount){
        
        //Configure Dynamic Payment Variables
        var environment = /quote1?\.good2go\.com/.test(location.hostname) ? "production" : "sandbox";
        var paymentAmount = paymentAmount || "0.00";
        
        // Initialize Paypal Widget
        paypal.Button.render({
          env: environment, // sandbox | production
          
          style: {
            label: 'checkout', // checkout || credit
            size: 'medium', // tiny | small | medium
            shape: 'rect', // pill | rect
            color: 'gold' // gold | blue | silver
          },
          
          client: {
            sandbox: 'AeZGeaFp1yNXkX8G8S84fQH7jD6VYQLo3VTWw2IsvMSryWZC4ikJ_6jfxN8U-oPeT3zDp9hoqJ3egGSF',
            production: ''
          },
          
          payment: function() {
            return paypal.rest.payment.create(this.props.env, this.props.client, {
              transactions: [{
                amount: {
                  total: paymentAmount,
                  currency: 'USD'
                }
              }]
            });
          },
          
          onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function(data) {
              if(data && data.state == "approved"){
                paypalComplete(data);
              }
            });
          },
          
          onError: function(data,actions){
            alert("Error processing payment");
          }
          
        }, '#paypal-button-container');
      }
      
      initializePaypal("613.00");
    </script>
  </div>
  

<?php get_footer(); ?>
