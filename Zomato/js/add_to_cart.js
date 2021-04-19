


$(document).ready(function(){
		$('.cart').click(function(){
			var food_id = $(this).data('id');
			$.ajax({
				url:"add_to_cart.php?food_id="+food_id,
				success:function(data){
					alert(data);
				}
			});
		});
	});