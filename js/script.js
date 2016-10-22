$(function() {

    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

$(document).ready(function () {
    
    $('#test_insert').click(function(event){
            
    event.preventDefault();
    
        amount= $("#profit").val();
        year= $("#year option:selected").text();
        month= $("#month option:selected").text();
        
    
    $.ajax({
        url: "core/process/test_insert.php",
        method: "post",
        data: {amount: amount,year: year,month: month},
        dataType: 'html',
        success: function(success)
        {
            $('#preview').text(success);
            $('#previewclass').addClass('alert alert-success');
        }
    });
    $("#form")[0].reset();
});

function fetch_data()
        {
           
            $.ajax(
                {
                   url: 'core/process/select.php',
                   method: 'POST',
                   success: function(data)
                   {
                    $('#inventory_data').html(data);
                   }
                }
            );
        };
        fetch_data();


        $('#search_inventory').keyup(function()
        {
            var txt = $(this).val();
            if(txt != '')
            {
                function view_inventory_search()
                    {
                        $.ajax({
                            url: 'core/process/inventory_search.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {txt:txt},
                            success: function(data)
                            {
                                $('#inventory_data').html(data);
                                
                            }
                        });
                    };
                    view_inventory_search()();
            }
            else
            {
                fetch_data();
            }
        });




        $('#add_new').click( function(event)
        
        {
            event.preventDefault();
            var name = $('#productName').val();
            var productType = $('#productType option:selected').text();
            var distributor = $('#distributor option:selected').text();
            var price = $('#price').val();
            var salePrice = $('#salePrice').val();
            var weight = $('#weight').val();
            var quantity = $('#quantity').val();
            
            $.ajax(
            {
                url: 'core/process/insert.php',
                method: 'POST',
                data: {name:name, productType:productType, distributor:distributor, price:price, salePrice:salePrice, weight:weight, quantity:quantity},
                datatype: 'html',
                success: function(data)
                {
                    alert(data);
                    fetch_data();
                }
            }
            );
            $("#addNewForm")[0].reset();
        });

        function edit_inventory(id,coloum_name,value)
        {
          $.ajax({
            url: 'core/process/edit_inventory.php',
            method: 'POST',
            dataType: 'html',
            data: {id:id, coloum_name:coloum_name, value:value},
            success: function(data)
            {
              
              fetch_data();
              $("#edit_form")[0].reset();    
            }
          });
        }
        
        $('#update_in').click(function (event) {
                event.preventDefault();
                    //first text box
                    var id = $('#id_up').val();
                    
                    if(id == '')
                    {
                        alert("Product ID field is empty");
                        return false;
                    }
                        
                    var name = $('#name_up').val();
                    var productType = $('#productType_up option:selected').text();
                    var distributor = $('#distributor_up option:selected').text();
                    var price = $('#price_up').val();
                    var salePrice = $('#sa_price_up').val();
                    var weight = $('#weight_up').val();
                    var quantity = $('#quantity_up').val();
                    if(name != '')
                    {
                      edit_inventory(id,'product_name',name);
                    }
                    
                    if(productType != '')
                    {
                      edit_inventory(id,'product_type',productType);
                    }
                    if(distributor != '')
                    {
                      edit_inventory(id,'distributor',distributor);
                    }
                    if(price != '')
                    {
                      edit_inventory(id,'price',price);
                    }
                    if(salePrice != '')
                    {
                      edit_inventory(id,'price',salePrice);
                    }
                    if(weight != '')
                    {
                      edit_inventory(id,'weight',weight);
                    }   
                    if(quantity != '')
                    {
                      edit_inventory(id,'quantity',quantity);
                    }
                      
                    
                    
                       

                       
                    //second text box
                    
                });


        $('#delete_pro').click( function(event)
        
        {
            event.preventDefault();
            var id=$('#de_id').val();
                       
           if(confirm("Are you sure you want to add this ti your wishlist?"))  
           {  
               $.ajax({
                        url: 'core/process/delete_pro.php',
                        method: 'POST',
                        dataType: 'html',
                        data: {id:id},
                        success: function(data)
                        {

                          fetch_data();
                          $("#delete_form")[0].reset();
                        }
                      });  
                
           }
            
        });




    var url = window.location;
    // Will only work if string in href matches with location

    $('ul.nav a[href="'+ url +'"]').parent().addClass('active');

    // Will also work for relative and absolute hrefs

    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');

    
    var d = new Date();
    var current_year = d.getFullYear();
    barchart(current_year);
    linechart();
    alltimebest();
    lastweekbest();
    $('#update_barchart').click(function(event)
    {
        event.preventDefault();
        var year = $('#year option:selected').text();
        barchart(year);
    });
    view_feed();
    view_customer_list();
    $('#search_text_customer').keyup(function()
        {
            var txt = $(this).val();
            if(txt != '')
            {
                function view_customer_search()
                    {
                        $.ajax({
                            url: 'core/process/customer_search.php',
                            method: 'POST',
                            dataType: 'html',
                            data: {txt:txt},
                            success: function(data)
                            {
                                $('#customer_list').html(data);
                                
                            }
                        });
                    };
                    view_customer_search();
            }
            else
            {
                view_customer_list();
            }
        });
    
$('#change_feed').click(function(event)
    {
        event.preventDefault();
        var name = $('#feed_id').val();
        $.ajax({
                url: 'core/process/change_feed.php',
                method: 'POST',
                dataType: 'html',
                data:{name:name},
                success: function(data)
                {

                    view_feed();
                    
                }
            });
        
    });


});

        function view_customer_list()
        {
            $.ajax({
                url: 'core/process/customer_list.php',
                method: 'POST',
                dataType: 'html',
                success: function(data)
                {
                    $('#customer_list').html(data);
                    
                }
            });
        };
function view_feed()
        {
            $.ajax({
                url: 'core/process/view_feed.php',
                method: 'POST',
                dataType: 'html',
                success: function(data)
                {
                    $('#feed').html(data);
                    
                }
            });
        };

function barchart(year)
{

    $.ajax({
		url: "core/process/barchart_by_year.php",
		method: "POST",
        data: {year:year},
		success: function(data) {
			
			var month = [];
			var netprofit = [];

			for(var i in data) {
				month.push("Month: " + data[i].month);
                
				netprofit.push(data[i].profit);
			}

			var chartdata = {
				labels: month,
				datasets : [
					{
						label: 'Monthly Net-Profit',
						backgroundColor: 'rgba(0,0,128, 0.8)',
                        borderColor: 'rgba(0,0,255, 1.0)',
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
						data: netprofit
					}
				]
			};

			var ctx = $("#mycanvas");

			var barGraph = new Chart(ctx, {
				type: 'bar',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
};



function linechart()
{
    $.ajax({
        url: "core/process/linechart_data.php",
        method: "POST",
        success: function(data) {
            
            var day = [];
            var profit = [];

            for(var i in data) {
                day.push("Day: " + data[i].day);
            
                profit.push(data[i].profit);
            }

            var chartdata = {
                labels: day,
                datasets : [
                    {
                        label: 'Daily Profit',
                        fill: true,
                        lineTension: 0.1,
                        backgroundColor: "rgba(75,192,192,0.4)",
                        borderColor: "rgba(75,192,192,1)",
                        borderCapStyle: 'butt',
                        borderDash: [],
                        borderDashOffset: 0.0,
                        borderJoinStyle: 'miter',
                        pointBorderColor: "rgba(75,192,192,1)",
                        pointBackgroundColor: "#fff",
                        pointBorderWidth: 1,
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(75,192,192,1)",
                        pointHoverBorderColor: "rgba(220,220,220,1)",
                        pointHoverBorderWidth: 2,
                        pointRadius: 1,
                        pointHitRadius: 10,
                        data: profit
                    }
                ]
            };

            var ctx = $("#linechart");

            var barGraph = new Chart(ctx, {
                type: 'line',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
    
	
};

function alltimebest()
{

    $.ajax({
        url: "core/process/alltimebest.php",
        method: "POST",
        
        success: function(data) {
            
            var username = [];
            var profit = [];
            
            for(var i in data) {
                username.push("ID: " + data[i].user_id);
                
                profit.push(data[i].total_profit);
            }

            var chartdata = {
                labels: username,
                datasets : [
                    {
                        label: 'Profit',
                        backgroundColor: 'rgba(255,0,0, 0.6)',
                        borderColor: 'rgba(255,0,0, 0.5)',
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: profit
                    }
                ]
            };

            var ctx = $("#alltime_best");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
};

function lastweekbest()
{

    $.ajax({
        url: "core/process/lastweek_best.php",
        method: "POST",
        
        success: function(data) {
            
            var username = [];
            var profit = [];
            
            for(var i in data) {
                username.push("ID: " + data[i].user_id);
                
                profit.push(data[i].total_profit);
            }

            var chartdata = {
                labels: username,
                datasets : [
                    {
                        label: 'Profit',
                        backgroundColor: 'rgba(128,0,128, 1.0)',
                        borderColor: 'rgba(128,0,128, 0.7)',
                        pointBackgroundColor: "rgba(179,181,198,1)",
                        pointBorderColor: "#fff",
                        pointHoverBackgroundColor: "#fff",
                        pointHoverBorderColor: "rgba(179,181,198,1)",
                        data: profit
                    }
                ]
            };

            var ctx = $("#lastweek_best");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
};
