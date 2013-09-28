var totala = 0;
var ctrl_press = false;
var odcv = odc_value;
var balv = bal_value;
var boxv = box_value;
var all_payment = new Array();
$(document).ready(function() {
	$("#gr").selectable();
	$('#date').datepicker({dateFormat:'dd:mm:yy',minDate:'1',maxDate:'+6m'});//adding date picker
	$(".n_book").click(function() {
		var two = $(this).attr('id');
		//alert(two);
		if (two != undefined) {
			coun(two);
		}
	});
	$('#ammount').html('Your total is <br> Rs ' + totala + '.00');
});

function coun(idea) {
	var inn = all_payment.indexOf(idea);
	if (inn == -1) {
		if (ctrl_press == false) {
			all_payment = [];
			all_payment.push(idea);
			//counter();
		} else {
			all_payment.push(idea);
			//counter();
		}
	} else {
		if (ctrl_press == true) {
			all_payment.splice(inn, 1);
			//counter();
		} else {
			all_payment = [];
			all_payment.push(idea);
		}
		//counter();
	}
	counter();
}


$(window).keydown(function(evt) {
	if (evt.which == 17) {// crl key down
		ctrl_press = true;
	}
});

$(window).keyup(function(evt) {
	if (evt.which == 17) {// crl key up
		ctrl_press = false;
	}
});

function reply_click() {
	alert("Sorry This was Already booked ");
}


function counter() {
	totala = 0;
	for (var i = 0; i < all_payment.length; i++) {
		var check = all_payment[i].split("r");
		if (check[0] == 1) {
			totala += odcv;
		} else if (check[0] == 2) {
			totala += balv;
		} else if (check[0] == 3) {
			totala += boxv;
		}
	}
	$('#ammount').html('Your total is <br> Rs ' + totala + '.00');
}

/*seperating clicks */
function amIclicked(e, element) {
	e = e || event;
	var target = e.target || e.srcElement;
	if (target.id == element.id)
		return true;
	else
		return false;
}

function clear_click(event, element) {
	if (amIclicked(event, element)) {
		//alert('ground');
		totala = 0;
		$('#ammount').html('Your total is <br> Rs ' + totala + '.00');
	}
}

function set_data(){
	if(all_payment.length!=0){
		//alert(all_payment);
		all_payment =[];
	}
	
}

$(function() {
    $("#pay").click(function() {
    	if($("#date").val()== ""){
    		alert("Date is not define");
    	}else{
        $("#myform input[type=text]").val('');
    	//$(this).css('background', '#CFCFA6');
    	$('#cpid').html(" Rs "+ totala+".00"); 
    	$.blockUI({ message: $('#myform') });
       }
    });
    $("#btnOK").click(function() {
       // $("#myform").hide(400);
       $.unblockUI();
    });
});

