$('.add-cart').click(function(e){
	e.preventDefault();
	// var parent = $(this).closest('.product-item');
	// Lấy thuôc tính href cảu thẻ a
	var href = $(this).attr('href');
	var title = $(this).attr('data-title');
	var img_url = $('.product-item img').attr('src');
	// alert(href);
	// alert(img_url);
	$.ajax({
		url:href,
		type:'GET',
		success:function(){
			$('#modal-message h4.modal-title span').html(title);
			$('#modal-message img').attr('src',img_url);
			$('#modal-message').modal('show');
			$('#cart-number').load(location.href + " #cart-number>*","");
		}
	});
	
});

$(document).on('click','.delete-cart',function(e){
	e.preventDefault();
	var id = $(this).attr('id');
	var href = $(this).attr('href');
	$('tr#item-'+id).remove();
	$.ajax({
		url:href,
		type:'GET',
		success:function(){
			$('#cart-number').load(location.href + " #cart-number>*","");
			$('#tong-tien').load(location.href + " #tong-tien>*","");
		}
	});
	// alert(id);
});

$(document).on('click','.update-cart',function(e){
	e.preventDefault();

	var id = $(this).data('id');
	var href = $(this).attr('href');
	var qtt  = $('input#qtt-'+id).val();
	// alert(qtt);
	$.ajax({
		url:href,
		type:'GET',
		data:{quantity:qtt},
		success:function(){
			$('#cart-number').load(location.href + " #cart-number>*","");
			$('#tong-tien').load(location.href + " #tong-tien>*","");
		}
	});
	// alert(id);
});

// document.getElementById()
// $('');