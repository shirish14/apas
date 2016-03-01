 $(document).ready(function(){
	 
	 $('#date_of_birth').datepicker({
    startView: 2,
     format : "yyyy/mm/dd",
    autoclose: true,

});
 if($('#employee_id').val()=='')
 {
 $('#organization_id').remove();
 org_id_init();
 }
  $('#business_unit_id').change(function(){
    var BuTable = $(this).val(); // selected name from dropdown #table
  
   $.ajax({ 
    url:  base_url+"employee/get_org_id",  // or "resources/ajax_call" - url to fetch the next dropdown
   // async: false,
    type: "POST",     // post
    data: "bussiness_id="+BuTable,  // variable send
   // dataType: "html",    // return type
    success: function(data) {  // callback function
		  $('#organization_id').remove();
	    $('#org_div_id').html(data);
	    }
   })
   });
 });
  function org_id_init()
 {
   var BuTable = $('#business_unit_id').val(); // selected name from dropdown #table
 
   $.ajax({ 
    url: base_url+"employee/get_org_id",  // or "resources/ajax_call" - url to fetch the next dropdown
   // async: false,
    type: "POST",     // post
    data: "bussiness_id="+BuTable,  // variable send
   // dataType: "html",    // return type
    success: function(data) {  // callback function
     $('#org_div_id').html(data);
    }
   })
  }