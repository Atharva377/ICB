<head>
    <link rel="stylesheet" href="style.css">
</head>
<button id="rzp-button1">
    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="svelte-ekc7fv">
        <path d="M7.077 6.476l-.988 3.569 5.65-3.589-3.695 13.54 3.752.004 5.457-20L7.077 6.476z" fill="#fff" class="svelte-ekc7fv"></path>
        <path d="M1.455 14.308L0 20h7.202L10.149 8.42l-8.694 5.887z" fill="#fff" class="svelte-ekc7fv"></path>
    </svg>
    <div class="button-contents">
        <span class="button-text">Pay Now</span> 
        <div class="button-securedBy">Secured by Razorpay</div>
    </div>
</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature" id="razorpay_signature">
</form>
<script>
    // Checkout details as a json
    var options = <?php echo $json ?>;

    options.handler = function(response) {
        document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
        document.getElementById('razorpay_signature').value = response.razorpay_signature;
        document.razorpayform.submit();
    };

    // Boolean whether to show image inside a white frame. (default: true)
    options.theme.image_padding = false;

    var rzp = new Razorpay(options);

    document.getElementById('rzp-button1').onclick = function(e) {
        rzp.open();
        e.preventDefault();
    }

    window.onload = function() {
        document.getElementById('rzp-button1').click();
    }
</script>