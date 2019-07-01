<script type="text/javascript">
        function validate()
      {
		var myForm = document.getElementById("myForm"); 
		
		var string_1 = myForm.elements.namedItem("password").value;
		var string_2 = myForm.elements.namedItem("confirm_password").value;
		
		if(string_1.length < 6 ){
		    alert( "Password Should be minimum 6 characters" );
            myForm.elements.namedItem("password").focus() ;
            return false;
		}
		
		if(string_1 != string_2){
		    alert( "Password Does Not Match!" );
            myForm.elements.namedItem("password").focus() ;
            return false;
		}
		 
		 return( true );
		
	  }
</script>