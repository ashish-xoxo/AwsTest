<!DOCTYPE hml>
<html lang="en">
<head>
	<title>Frogo</title>
	<script type="text/javascript">
		<?php

			if(!isset($_POST['txnid']))
				{ ?>
			 		window.location.href="http://52.74.166.88:8091/"
		<?php } ?>
	</script>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
</head>

<body>
	<script> 
		<?php if(isset($_POST)){ ?>
		$.ajax({
            method : "POST",
            url : "http://52.74.236.98/index.php?route=app/checkout/callbackFrogoWeb&key=12345",
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
	        	var orderDetails = {}
				if(response.success==1)
				{
					orderDetails['order_id'] = response.order_id
					orderDetails['successMessage'] = "Success"
					orderDetails['amount'] = response.amount
					orderDetails['productInfo'] = response.productInfo
					orderDetails['firstname'] = response.firstname
					orderDetails['txnid'] = response.txnid
				}
				else
				{
					orderDetails['order_id'] = response.order_id
					orderDetails['successMessage'] = "Failed"
					orderDetails['failed'] = true
					orderDetails['success'] = false
				}

				localStorage.setItem('orderDetails',JSON.stringify(orderDetails))
				location.href = 'http://52.74.166.88:8091/paymentsuccess'
			},
			error : function(xhr,status,error)
			{
				console.log(status+' : '+error.toString())
			}
		})
		
		<?php }else{  ?>
			$location.path('/experience-list');
		<?php } ?>

	</script>

</body>

</html>