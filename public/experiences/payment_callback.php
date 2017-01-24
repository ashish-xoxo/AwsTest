<!DOCTYPE hml>
<html lang="en">
<head>
	<title>Frogo</title>

	<link rel="icon" type="image/png" href="../frogo_icon.png">

	<script type="text/javascript">
		<?php

			if(!isset($_POST['txnid']))
				{ ?>
			 		location.href = 'http://'+location.host
		<?php } ?>
	</script>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
</head>

<body>
	<h4>We will redirect you in a moment.. Please do not press the refresh button..</h4>
	<script>
		var SERVER = ''
		var CLIENT = 'http://'+location.host
		if(location.href.indexOf('frogo.in')!==-1)
			SERVER = 'https://www.giftxoxo.com'
		else
			SERVER = 'http://52.74.236.98'
			
		$.ajax({
            method : "POST",
            url : SERVER+"/index.php?route=app/checkout/callbackFrogoWeb&key=12345",
            data : 
			{ 
				"mihpayid" : "<?php echo $_POST['mihpayid'];?>",
				"mode" : "<?php echo $_POST['mode'];?>",
				"status" : "<?php echo $_POST['status'];?>",
				"unmappedstatus" : "<?php echo $_POST['unmappedstatus'];?>",
				"key" : "<?php echo $_POST['key'];?>",
				"txnid" : "<?php echo $_POST['txnid'];?>",
				"amount" : "<?php echo $_POST['amount'];?>",
				"discount" : "<?php echo $_POST['discount'];?>",
				"net_amount_debit" : "<?php echo $_POST['net_amount_debit'];?>",
				"addedon" : "<?php echo $_POST['addedon'];?>",
				"productinfo" : "<?php echo $_POST['productinfo'];?>",
				"firstname" : "<?php echo $_POST['firstname'];?>",
				"lastname" : "<?php echo $_POST['lastname'];?>",
				"address1" : "<?php echo $_POST['address1'];?>",
				"address2" : "<?php echo $_POST['mihpayid'];?>",
				"city" : "<?php echo $_POST['city'];?>",
				"state" : "<?php echo $_POST['state'];?>",
				"country" : "<?php echo $_POST['country'];?>",
				"zipcode" : "<?php echo $_POST['zipcode'];?>",
				"email" : "<?php echo $_POST['email'];?>",
				"phone" : "<?php echo $_POST['phone'];?>",
				"udf1" : "<?php echo $_POST['udf1'];?>",
				"udf2" : "<?php echo $_POST['udf2'];?>",
				"udf3" : "<?php echo $_POST['udf3'];?>",
				"udf4" : "<?php echo $_POST['udf4'];?>",
				"udf5" : "<?php echo $_POST['udf5'];?>",
				"udf6" : "<?php echo $_POST['udf6'];?>",
				"udf7" : "<?php echo $_POST['udf7'];?>",
				"udf8" : "<?php echo $_POST['udf8'];?>",
				"udf9" : "<?php echo $_POST['udf9'];?>",
				"udf10" : "<?php echo $_POST['udf10'];?>",
				"hash" : "<?php echo $_POST['hash'];?>",
				"field1" : "<?php echo $_POST['field1'];?>",
				"field2" : "<?php echo $_POST['field2'];?>",
				"field3" : "<?php echo $_POST['field3'];?>",
				"field4" : "<?php echo $_POST['field4'];?>",
				"field5" : "<?php echo $_POST['field5'];?>",
				"field6" : "<?php echo $_POST['field6'];?>",
				"field7" : "<?php echo $_POST['field7'];?>",
				"field8" : "<?php echo $_POST['field8'];?>",
				"field9" : "<?php echo $_POST['field9'];?>",
				"payment_source" : "<?php echo $_POST['payment_source'];?>",
				"PG_TYPE" : "<?php echo $_POST['PG_TYPE'];?>",
				"bank_ref_num" : "<?php echo $_POST['bank_ref_num'];?>",
				"bankcode" : "<?php echo $_POST['bankcode'];?>",
				"error" : "<?php echo $_POST['error'];?>",
				"error_Message" : "<?php echo $_POST['error_Message'];?>"
			},
	        success : function(response)
	        {
	        	response = JSON.parse(response)
	        	// console.log(response)
				if(response.success==1)
				{
					response['successMessage'] = 'Success'
				}
				else
				{
					response['successMessage'] = "Failed"
				}

				localStorage.setItem('orderDetails',JSON.stringify(response))
				location.href = CLIENT+'/paymentsuccess'
			},
			error : function(xhr,status,error)
			{
				console.log(status+' : '+error.toString())
			}
		})

	</script>

</body>

</html>