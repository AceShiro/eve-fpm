<title>Friendly Production Manager</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
<link href="https://fonts.googleapis.com/css?family=Dosis|PT+Sans|Quicksand|Raleway:700" rel="stylesheet">
<script src="js/jquery.min.js"></script>

<script src="js/jquery.magnific-popup.min.js"></script>

<script src="js/simpleCart.js"></script>

<!-- Bootstrap Core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

<!-- Custom CSS -->
<link href="css/sb-admin-2.css" rel="stylesheet">

<!-- Morris Charts CSS -->
<link href="vendor/morrisjs/morris.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<script>
    simpleCart({
        checkout: { 
            type: "SendForm" , 
            url: "contracts",

            method: "POST" , 
        },
    });

    simpleCart.currency({
	    code: "ISK" ,
	    name: "ISK" ,
	    symbol: " ISK" ,
	    delimiter: " " , 
	    decimal: "," , 
	    after: true ,
	    accuracy: 2
	});

	simpleCart({
	    cartColumns: [
	        { attr: "name"} ,
	        { view: function(item, column){
			    return  "Quantity: " + item.quantity();
			  } , 
			  attr: "custom"
			},
	        { attr: "total" , view: 'currency' } ,
	        { view: "remove" , text: "Remove" , label: false }
	    ]
	});
</script>