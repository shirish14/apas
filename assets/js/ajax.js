/*! jQuery v1.11.1 | (c) 2005, 2014 jQuery Foundation, Inc. | jquery.org/license */
     var page_number=0;
                         var total_page =null;
                         var sr =0;
                         var sr_no =0;
        
    
                        var getReport = function(page_number){
					alert('ajax call');
                            if(page_number==0){
                                $("#previous").prop('disabled', true);}
                                else{
                                    $("#previous").prop('disabled', false);}

                            if(page_number==(total_page-1)){
                                $("#next").prop('disabled', true);}
                                else{
                                    $("#next").prop('disabled', false);}

                             $("#page_number").text(page_number+1);
        	
                                 $.ajax({
									  
                                     url:codeigniter+'country/pagination',
									  
                                     type:"POST",
                                     dataType: 'json',
                                     data:'page_number='+page_number,
                                     success:function(data){
											
                                         window.mydata = data;
                                          total_page= mydata[0].TotalRows;
                                         $("#total_page").text(total_page);
                                         var record_par_page = mydata[0].Rows;
                                          $.each(record_par_page, function (key, data) {
                                               sr =(key+1);    
                                                $(".tb").append('<tr><td>'+data.code+'</td><td>'+data.name+'</td></tr>');
                                                
                                           });
                                      }
                                 });
                               };
                               
                               var search = function (str){
                               if(str!=''){
//                                   $.ajax({
//                                       url:"<?php echo base_url() ?>index.php/welcome/pagination",
//                                     type:"POST",
//                                     dataType: 'json',
//                                     data:'search='+str,
//                                     success:function(data){
//                                         window.mydata = data;
//                                          total_page= mydata[0].TotalRows;
//                                         $("#total_page").text(total_page);
//                                         var record_par_page = mydata[0].Rows;
//                                          $.each(record_par_page, function (key, data) {
//                                               sr =(key+1);    
//                                                $(".tb").append('<tr><td>'+sr+'</td><td>'+data.id+'</td><td>'+data.name+'</td></tr>');
//                                           });
//                                      }
//                                   });
                               }
                               };

                          
                       $(document).ready(function(e){
                       
                          getReport(page_number);
                          console.log(sr);
                           
                         $("#next").on("click", function(){
                               $(".tb").html("");
                               page_number = (page_number+1);
                               getReport(page_number);
                               console.log(sr);
                               
                         });
                            
                         $("#previous").on("click", function(){
                              $(".tb").html("");
                              page_number = (page_number-1);
                              getReport(page_number);
                         });
                         
                         
                         $("#search").on('keyup', function(){
                             var str = $.trim($(this).val());
                             
                                search(str);
                         });
                    });