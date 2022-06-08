	$( ".button_hide" ).click(function() {
		var data="type=hide&id="+this.parentElement.parentElement.id;
		var btn=this;
		$.ajax({
			type: "POST",
			url: "handler.php",
			data: data,
			beforeSend: function () { 
				btn.toggleAttribute('disabled', true);
			},
			success: function (response) {
				if(!isNaN(response)) {
					btn.parentElement.parentElement.style.display='none';
				}
				else {
					alert(response);
				}
			},
			error: function () {
				alert("ERROR")
			},
		});
	});
	
	$( ".button_minus" ).click(function() {
		var data="type=minus&id="+this.parentElement.parentElement.id;
		var btn=this;
		$.ajax({
			type: "POST",
			url: "handler.php",
			data: data,
			beforeSend: function () { 
				btn.toggleAttribute('disabled', true);
			},
			success: function (response) {
				if(!isNaN(response)) {
					if(response!=0) btn.toggleAttribute('disabled', false);				
					$("#qcell"+btn.parentElement.parentElement.id).html(response);
				}
				else {
					alert(response);
				}
			},
			error: function () {
				alert("ERROR")
			},
		});
		
		
	});
	
	$( ".button_plus" ).click(function() {
		var data="type=plus&id="+this.parentElement.parentElement.id;
		var btn=this;
		$.ajax({
			type: "POST",
			url: "handler.php",
			data: data,
			beforeSend: function () { 
				btn.toggleAttribute('disabled', true);
			},
			success: function (response) {
				if(!isNaN(response)) {
					btn.toggleAttribute('disabled', false);
					btn.parentElement.firstChild.nextSibling.nextSibling.toggleAttribute('disabled', false);
					$("#qcell"+btn.parentElement.parentElement.id).html(response);
				}
				else {
					alert(response);
				}
			},
			error: function () {
				alert("ERROR")
			},
		});
	});