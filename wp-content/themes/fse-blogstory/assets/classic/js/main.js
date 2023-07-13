jQuery(document).ready(function () {
//    console.log(jQuery.fakeLoader())
	// const dataMovie = jQuery('#all-movie-pagination').attr('dataMovie')
	// console.log(jQuery('#all-movie-pagination').attr('dataMovie'));
	// jQuery('#all-movie-pagination').pagination({
	// 	dataSource: dataMovie, //string json
	//         pageSize: 6,
	//         className: 'paginationjs-theme-green justify-content-center paginationjs-big',
	//         callback: function(items, pagination) {

	//             console.log(items) // item on per page
	//             htmlContainer = jQuery('#all-tours-render');
	//             htmlContainer.empty();

	//             items.forEach(item => {
	//                 var html_test = '<div class="card mb-3" style="max-width: 540px;">'+
	//                     '<div class="row g-0">'+
	//                         '<div class="col-md-4">'+
	//                             '<img src="..." class="img-fluid rounded-start" alt="...">'+
	//                         '</div>'+
	//                         '<div class="col-md-8">'+
	//                         '<div class="card-body">'+
	//                             '<h5 class="card-title">Card title</h5>'+
	//                             '<p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>'+
	//                             '<p class="card-text"></p>'+
	//                         '</div>'+
	//                         '</div>'+
	//                     '</div>'+
	//                 '</div>';
	//                 htmlContainer.append(html_test);

	//             });

	//             var html_test = template(data);
	//             dataContainer.html(html_test);
	//         },
	// })

	// const url_current = window.location.href
	// if (url_current.includes('showtimes') || url_current.includes('historyorder')) {
	// 	jQuery.ajax({
	// 		type: "post", //Phương thức truyền post hoặc get
	// 		dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
	// 		url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
	// 		data: {
	// 			action: "test_session_login", //Tên action
	// 		},
	// 		context: this,
	// 		success: function (response) {
	// 			if (response.success) {
	// 				if (response.data == 'false') {
	// 					window.location.href = 'http://book_tickets_movie2.local/login/'
	// 				}
	// 			}
	// 		},
	// 		error: function (jqXHR, textStatus, errorThrown) {
	// 			console.log('The following error occured: ' + textStatus, errorThrown);
	// 		}
	// 	})
	// }

	// if (window.pageYOffset < 300) {
    //     $('.cover-arrow-up').addClass('d-none')
    // } else {
    //     $('.cover-arrow-up').removeClass('d-none')
    //     $('.cover-arrow-up').addClass('fadeToLeft1')
    // }
	jQuery(window).scroll(function () {
		if(window.pageYOffset > 300){
			jQuery('.cover-arrow-up').removeClass('d-none')
		}else{
			jQuery('.cover-arrow-up').addClass('d-none')
		}
	})

	if(window.pageYOffset <300){
		jQuery('.cover-arrow-up').removeClass('d-none')
	}

	jQuery('.cover-arrow-up').click(function () {
        jQuery("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    })

	jQuery('.btn_apply_event').click(function () {
		const event_id = jQuery(this).attr('id');
		jQuery.ajax({
			type: "post", //Phương thức truyền post hoặc get
			dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
			url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
			data: {
				action: "add_apply_discount", //Tên action
				event_id: event_id,
			},
			context: this,
			success: function (response) {
				if (response.success) {
					jQuery('.modal_apply_event').addClass('show')
					jQuery('.modal_apply_event').removeClass('d-none')
					jQuery('.modal_apply_event').css('display', 'block')
				}

			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('The following error occured: ' + textStatus, errorThrown);
			}
		})
	})

	const listEvent = jQuery('.event_item')
	// listEvent.forEach(event => {
	// 	console.log(event)
	// });



	jQuery('.choose_event').click(function () {

		const event_id = jQuery(this).attr('id');
		jQuery.ajax({
			type: "post", //Phương thức truyền post hoặc get
			dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
			url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
			data: {
				action: "choose_unchose_event", //Tên action
				event_id: event_id,
			},
			context: this,
			success: function (response) {
				// console.log(response.data);
				if (response.success) {
					//all event
					for (let i = 0; i < listEvent.length; i++) {
						//image
						jQuery(listEvent[i]).children("span").removeClass('choose_event_unchoose');
						jQuery(listEvent[i]).children("span").addClass('choose_event_choose');
						jQuery(listEvent[i]).children("span").html('Choose');
						//span
						jQuery(listEvent[i]).children("img").removeClass('custom_image_color');
					}
					if (response.data) { //true
						jQuery('.choose_event' + event_id).removeClass('choose_event_choose')
						jQuery('.choose_event' + event_id).addClass('choose_event_unchoose')
						jQuery('.choose_event' + event_id).html('Unchoose')

						//color img
						jQuery('.custom-event-image' + event_id).addClass('custom_image_color')
					} else {
						jQuery('.choose_event' + event_id).removeClass('choose_event_unchoose')
						jQuery('.choose_event' + event_id).addClass('choose_event_choose')
						jQuery('.choose_event' + event_id).html('Choose')

						//color img
						jQuery('.custom-event-image' + event_id).removeClass('custom_image_color')
					}
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('The following error occured: ' + textStatus, errorThrown);
			}
		})
	})

	jQuery('.modal_apply_event_close').click(function () {
		jQuery('.modal_apply_event').removeClass('show')
		jQuery('.modal_apply_event').addClass('d-none')
		jQuery('.modal_apply_event').css('display', 'none')
	})

	jQuery('.choose_chair').click(function () {
		if (jQuery(this).attr('class').includes('custom-chair-showtime-booking')) { //da choose
			jQuery(this).removeClass('custom-chair-showtime-booking')
			if (jQuery(this).attr('status') == 'vip') {
				jQuery(this).addClass('custom-chair-showtime-vip')
			} else {
				jQuery(this).addClass('custom-chair-showtime-normal')
			}
		} else { //chua choose
			jQuery(this).addClass('custom-chair-showtime-booking')
			if (jQuery(this).attr('status') == 'vip') {
				jQuery(this).removeClass('custom-chair-showtime-vip')
			} else {
				jQuery(this).removeClass('custom-chair-showtime-normal')
			}
		}
		//handler price choose
		const arrChairChoose = jQuery('.custom-chair-showtime-booking')
		let totalPrice = 0;
		for (let i = 0; i < arrChairChoose.length; i++) {
			if (jQuery(arrChairChoose[i]).attr('status') == 'vip') {
				totalPrice += 90;
			} else if (jQuery(arrChairChoose[i]).attr('status') == 'normal') {
				totalPrice += 70;
			}
		}
		totalPrice = totalPrice * 1000
		jQuery('#total_ticket').val(totalPrice)
		jQuery('.price-ticket').html('Giá vé: ' + new Intl.NumberFormat().format(totalPrice) + ' vnđ')

		const arrChooseChair = jQuery('.custom-chair-showtime-booking');
		if (arrChooseChair.length <= 1) {
			jQuery('.alert-danger-chair').removeClass('d-none')
		} else {
			jQuery('.alert-danger-chair').addClass('d-none')
		}
	})



	function validate() {
		let statusSubmit = true;
		//full name

		if (jQuery('#fullNameBook').val() == "") {
			jQuery('#fullNameBook').addClass('error-input')
			statusSubmit = false
		} else {
			jQuery('#fullNameBook').removeClass('error-input')
		}
		//phone

		function isValid(p) {
			var phoneRe = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			var digits = p.replace(/\D/g, "");
			return phoneRe.test(digits);
		}
		if (jQuery("#phoneBook").val() == "" || !isValid(jQuery("#phoneBook").val())) {
			jQuery('#phoneBook').addClass('error-input')
			statusSubmit = false
		} else {
			jQuery('#phoneBook').removeClass('error-input')
		}
		//email

		if (jQuery("#emailBook").val() == "" || !jQuery("#emailBook").val().includes('@')) {
			jQuery('#emailBook').addClass('error-input')
			statusSubmit = false
		} else {
			jQuery('#emailBook').removeClass('error-input')
		}
		return statusSubmit;
	}

	jQuery('.btn-submit-book-ticket').click(function () {
		let statusSubmit = validate();

		const arrChooseChair = jQuery('.custom-chair-showtime-booking');
		if (arrChooseChair.length <= 1) {
			jQuery('.alert-danger-chair').removeClass('d-none')
		} else {
			jQuery('.alert-danger-chair').addClass('d-none')
		}

		statusSubmit = statusSubmit && (arrChooseChair.length > 1)

		// statusSubmit = true




		const showtime_id = jQuery('#showtime_id').val() //showtime_id
		const arrIndexChair = [] //_chair_id
		for (let i = 0; i < arrChooseChair.length; i++) {
			if (jQuery(arrChooseChair[i]).attr('status') == "normal" || jQuery(arrChooseChair[i]).attr('status') == "vip") {
				arrIndexChair.push(Number(jQuery(arrChooseChair[i]).attr('value')))
			}
		}
		const fullName = jQuery('#fullNameBook').val() //_name_buyer
		const phone = jQuery("#phoneBook").val() //_phone
		const email = jQuery("#emailBook").val() //_email
		const total = jQuery('#total_ticket').val() //_price
		if (statusSubmit) {
			jQuery.ajax({
				type: "post", //Phương thức truyền post hoặc get
				dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
				url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
				data: {
					action: "ajax_book_ticket", //Tên action
					showtime_id: showtime_id,
					arrIndexChair: arrIndexChair,
					fullName: fullName,
					phone: phone,
					email: email,
					total: total
				},
				context: this,
				success: function (response) {
					// console.log(response.data)
					window.location.href = 'http://book_tickets_movie2.local/historyorder/';
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			})
		}
	})

	// jQuery('.custom-btn-showtime').click(function(){
	// 	alert("Hello ca nha yeu")
	// })

	jQuery("#fullNameBook").on('keyup blur', function (e) {
		if (jQuery(this).val() != "") {
			jQuery('.fullName-ticket').html('Họ tên: ' + jQuery(this).val())
			jQuery(this).removeClass('error-input')
		} else {
			jQuery('.fullName-ticket').html('')
		}
	});

	jQuery('#phoneBook').on('keyup blur', function () {

		function isValid(p) {
			var phoneRe = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			var digits = p.replace(/\D/g, "");
			return phoneRe.test(digits);
		}
		if (jQuery("#phoneBook").val() == "" || !isValid(jQuery("#phoneBook").val())) {
			jQuery('#phoneBook').addClass('error-input')
			jQuery('.phone-ticket').html('')
		} else {
			jQuery('.phone-ticket').html('Số điện thoại: ' + jQuery(this).val())
			jQuery('#phoneBook').removeClass('error-input')
		}

	})

	jQuery('#emailBook').on('keyup blur', function () {

		if (jQuery("#emailBook").val() == "" || !jQuery("#emailBook").val().includes('@')) {
			jQuery('#emailBook').addClass('error-input')
			jQuery('.email-ticket').html('')
		} else {
			jQuery('.email-ticket').html('Email: ' + jQuery(this).val())
			jQuery('#emailBook').removeClass('error-input')
		}
	})



	function validateContactForm() {
		let statusSubmit = true;
		//name
		let statusName = true;
		if (jQuery("input[name='name']").val() == "") {
			statusName = false
			jQuery('.message_error_name').html('Please enter your name')
		} else {
			statusName = true
			jQuery('.message_error_name').html('')
		}

		//email
		let statusEmail = true
		if (jQuery("input[name='email']").val() == "" || !jQuery("input[name='email']").val().includes('@')) {
			statusEmail = false
			if (jQuery("input[name='email']").val() == "") {
				jQuery('.message_error_email').html('Please enter your email')
			} else {
				jQuery('.message_error_email').html('Enter the wrong email format')
			}
		} else {
			statusEmail = true
			jQuery('.message_error_email').html('');
		}

		// //subject
		let statusSubject = true
		if (jQuery("input[name='subject']").val() == "") {
			statusSubject = false
			jQuery('.message_error_subject').html('Please enter your subject')
		} else {
			statusSubject = true
			jQuery('.message_error_subject').html('')
		}

		// //phone
		function isValid(p) {
			var phoneRe = /((09|03|07|08|05)+([0-9]{8})\b)/g;
			var digits = p.replace(/\D/g, "");
			return phoneRe.test(digits);
		}
		let statusPhone = true
		if (jQuery("input[name='phone']").val() == "" || !isValid(jQuery("input[name='phone']").val())) {
			statusPhone = false
			if (jQuery("input[name='phone']").val() == "") {
				jQuery('.message_error_phone').html('Please enter your phone')
			} else {
				jQuery('.message_error_phone').html('Enter the wrong email format')
			}
		} else {
			statusPhone = true
			jQuery('.message_error_phone').html('')
		}

		// //message
		let statusMessage = true
		if (jQuery("input[name='message']").val() == "") {
			statusMessage = false
			jQuery('.message_error_message').html('Please enter your message')
		} else {
			statusMessage = true
			jQuery('.message_error_message').html('')
		}

		if (statusName && statusEmail && statusSubject && statusPhone && statusMessage) {
			statusSubmit = true
		} else {
			statusSubmit = false
		}

		return statusSubject;
		// console.log(statusSubmit)
	}

	jQuery('.btn-contact-form').click(function () {
		if (validateContactForm()) {
			jQuery('.alert-contact-success').removeClass('d-none');
		}
	})

	jQuery('.btn_logout').click(function () {
		jQuery.ajax({
			type: "post", //Phương thức truyền post hoặc get
			dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
			url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
			data: {
				action: "sesstion_logout",
			},
			context: this,
			success: function (response) {
				if (response.success) {
					window.location.href = "http://book_tickets_movie2.local/login/"
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log('The following error occured: ' + textStatus, errorThrown);
			}
		})
	})

	jQuery('.btn-submit-register').click(function () {
		let statusSubmit = validateRegister()
		// statusSubmit = true
		const username = jQuery('#userNameRegister').val()
		const email = jQuery('#emailRegister').val()
		const password = jQuery('#passwordRegister').val()
		if (statusSubmit) {
			jQuery.ajax({
				type: "post", //Phương thức truyền post hoặc get
				dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
				url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
				data: {
					action: "handler_register",
					username: username,
					email: email,
					password: password
				},
				context: this,
				success: function (response) {
					if (response.success) {
						if (response.data == "true") {
							window.location.href = "http://book_tickets_movie2.local/login/"
						} else {
							jQuery('.alert_register_error').removeClass('d-none')
							jQuery('.alert_register_error').html(response.data)
						}
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			})
		}
	})

	function validateRegister() {
		//username
		let statusRegister = true;
		if (jQuery('#userNameRegister').val() == "") {
			jQuery('#userNameRegister_error').html('Please enter your name')
			statusRegister = false
		} else {
			jQuery('#userNameRegister_error').html('')
		}

		//email
		if (jQuery('#emailRegister').val() == "" || !jQuery('#emailRegister').val().includes('@')) {
			if (jQuery('#emailRegister').val() == "") {
				jQuery('#emailRegister_error').html('Please enter your email')
			} else {
				jQuery('#emailRegister_error').html('Enter the wrong email format')
			}
			statusRegister = false
		} else {
			jQuery('#emailRegister_error').html('')
		}
		//password
		if (jQuery('#passwordRegister').val() == "") {
			jQuery('#passwordRegister_error').html('Please enter your password')
			// console.log("hello ca nha yeu")
			statusRegister = false
		} else {
			jQuery('#passwordRegister_error').html('')
		}
		//password2
		if (jQuery('#password2Register').val() == "") {
			jQuery('#password2Register_error').html('Please enter your confirm password')
			statusRegister = false
		} else {
			jQuery('#password2Register_error').html('')
		}

		//compare password and confirm password
		if (jQuery('#passwordRegister').val() != '' && jQuery('#password2Register').val() != '') {
			if (jQuery('#passwordRegister').val() !== jQuery('#password2Register').val()) {
				jQuery('#passwordRegister_error').html('Password did not match')
				jQuery('#password2Register_error').html('Password did not match')
				statusRegister = false
			} else {
				jQuery('#passwordRegister_error').html('')
				jQuery('#password2Register_error').html('')
			}
		}
		return statusRegister
	}

	jQuery('.btn-submit-login').click(function () {
		const email = jQuery('#emailLogin').val()
		const password = jQuery('#passwordLogin').val()
		// let statusSubmit = validateFormLogin();
		statusSubmit = true;
		if (statusSubmit) {
			jQuery.ajax({
				type: "post", //Phương thức truyền post hoặc get
				dataType: "json", //Dạng dữ liệu trả về xml, json, script, or html
				url: "http://book_tickets_movie2.local/wp-admin/admin-ajax.php",
				data: {
					action: "handler_login",
					email: email,
					password: password,
				},
				context: this,
				beforeSend: function () {
					setTimeout(function () {
						console.log('ajax sending');
					})
				},
				success: function (response) {
					if (response.success) {
						if (response.data == "true") {
							window.location.href = "http://book_tickets_movie2.local"
						} else {
							jQuery('.alert_login').removeClass('d-none')
							jQuery('.alert_login').html(response.data)
						}
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					console.log('The following error occured: ' + textStatus, errorThrown);
				}
			})
		}
	})

	function validateFormLogin() {
		let statusSubmit = true
		//email
		if (jQuery('#emailLogin').val() == "" || !jQuery('#emailLogin').val().includes('@')) {
			if (jQuery('#emailLogin').val() == "") {
				jQuery('#emailLogin_error').html('Please enter your email')
				statusSubmit = false
			} else {
				jQuery('#emailLogin_error').html('Enter the wrong email format')
			}
		} else {
			jQuery('#emailLogin_error').html('')
		}

		//password
		if (jQuery('#passwordLogin').val() == "") {
			jQuery('#passwordLogin_error').html('Please enter your password')
			statusSubmit = false
		} else {
			jQuery('#passwordLogin_error').html('')
		}
		return statusSubmit;
	}

})
