$(document).ready(function(){

	getDiscounts();
	
	function getDiscounts(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : {GET_DISCOUNT:1},
			success : function(response){
				console.log(response);
				var resp = $.parseJSON(response);

				var discountHTML = '';

				$.each(resp.message, function(index, value){
					discountHTML += '<tr>'+
									'<td></td>'+
									'<td>'+ value.discount_title +'</td>'+
									'<td><a class="btn btn-sm btn-info edit-discount"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a did="'+value.discount_id+'" class="btn btn-sm btn-danger delete-discount"><i class="fas fa-trash-alt"></i></a></td>'+
								'</tr>';
				});

				$("#discount_list").html(discountHTML);

			}
		})
		
	}

	$(".add-discount").on("click", function(){

		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#add-discount-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getDiscounts();
					$("#add_discount_modal").modal('hide');
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				
			}
		})

	});

	$(document.body).on('click', '.delete-discount', function(){

		var did = $(this).attr('did');

		if (confirm("Biztosan törölni akarja ezt az akciót?")) {
			$.ajax({
				url : '../admin/classes/Products.php',
				method : 'POST',
				data : {DELETE_DISCOUNT:1, did:did},
				success : function(response){
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						alert(resp.message);
						getDiscounts();
					}else if(resp.status == 303){
						alert(resp.message);
					}
				}
			});
		}else{
			alert('Megszakítva');
		}

		

	});

	$(document.body).on("click", ".edit-discount", function(){

		var discount = $.parseJSON($.trim($(this).children("span").html()));
		console.log(discount);
		$("input[name='e_discount_title']").val(discount.discount_title);
		$("input[name='discount_id']").val(discount.discount_id);

		$("#edit_discount_modal").modal('show');

		

	});

	$(".edit-discount-btn").on("click", function(){
		$.ajax({
			url : '../admin/classes/Products.php',
			method : 'POST',
			data : $("#edit-discount-form").serialize(),
			success : function(response){
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					getDiscounts();
					$("#edit_discount_modal").modal('hide');
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				
			}
		});
	});

});