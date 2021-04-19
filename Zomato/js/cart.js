


$(document).ready(function(){
		var food_id,current,current_price,base_value,new_value,total;
		$('.sub').click(function(){
			total = Number($('#amount').text());
			food_id = $(this).data('id');
			current = Number($('#quantity' + food_id).text());
			current_price = Number($('#price' + food_id).text());


			base_value = current_price/current;
			new_value = current_price - base_value;

			total = total - base_value;

			if(current === 1){
				if(confirm("The food will be removed from your cart!!")){
					$('#item'+food_id).remove();
					$('#amount').text(total);

					$.ajax({
						url:"remove_cart_item.php?food_id=" + food_id,
					})

				}

				




			}else{
				
				$.ajax({
					url: "update_cart_quantity.php?food_id=" +food_id + "&quantity=" + (current - 1),
					success:function(data){
						
						$('#quantity' + food_id).text(current - 1);
						$('#price' + food_id).text(new_value);
						$('#amount').text(total);

					},
					error:function(){
						alert("Some error occured");
					}
				})

			}


			
			

			

		})
		$('.add').click(function(){
			food_id = $(this).data('id');
			total = Number($('#amount').text());

			current = Number($('#quantity' + food_id).text());
			current_price = Number($('#price' + food_id).text());


			base_value = current_price/current;
			new_value = current_price + base_value;
			total = total + base_value;

			$.ajax({
				url: "update_cart_quantity.php?food_id=" +food_id + "&quantity=" + (current + 1),
				success:function(data){
					$('#quantity' + food_id).text(current + 1);
					$('#price' + food_id).text(new_value);
					$('#amount').text(total);

				},
				error:function(){
					alert("Some error occured");
				}
			})







			
			
		})
	});