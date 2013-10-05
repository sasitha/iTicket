var totala = 0;
var ctrl_press = false;
var odcv = odc_value;
var balv = bal_value;
var boxv = box_value;
var post_c_url = fromc;
var post_c_book = bookc;

var all_payment = new Array();
var id_maker = new Array();
$(document).ready(function() {
	$("#gr").selectable();
	$('#date').datepicker({dateFormat:'yy-mm-dd',minDate:'1',maxDate:'+6m'});//adding date picker
	$(".n_book").click(function() {
		var two = $(this).attr('id');
		var cls = $(this).attr('class');
		if (two != undefined && $(this).attr("class") != 'book_b ui-selectee ui-selected') {
			coun(two);
		}
		else if($(this).attr("class") == 'book_b ui-selectee ui-selected'){
			set_data();
			//counter();
			alert("Sorry this was already booked");
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
		totala = 0;
		$('#ammount').html('Your total is <br> Rs ' + totala + '.00');
	}
}

function set_data(){
	if(all_payment.length!=0){
		//alert(all_payment);
		all_payment =[];
		counter();
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
       $.unblockUI();
       //check thigs have to implement
       ///
       // ajax
       var e_mail = $('#email').val();
       var nic = $('#name').val();
       //vaildate_mail(e_mail);
       var book_data = {
       		b_date : $('#date').val(),
       		b_time : $('#stime').val(),
       		cl_m : e_mail,
       		cl_nic : nic,
       		cl_nl : $('#cheknl').is(':checked'),
       		b_s_arr : all_payment.join("#"),
       		cl_price: $('#ammount').val()
       };
       if(vaildate_mail(e_mail) && vaildate_nic(nic)){
       $.ajax({
       		url: post_c_book,
       		type: 'POST',
       		data: book_data,
       		success:function(msg){
					window.location = msg;
			}
       });
       }
       //alert(book_data.toSource());
    });
});

$(function() {
	$("#cbk").click(function(){
		if($("#date").val()== ""){
    		alert("Date is not define");
    	}else{
    		if(id_maker.length != 0){
    			change_book_seats(id_maker,'n_book');
    			//alert("kk");
    			id_maker = [];
    		}
    		//alert($('#stime').val());
    		 var chk_data={
    		 	select_date: $('#date').val(),
    		 	select_time: $('#stime').val()
    		 };
    		 //var urlk = url_to;
    		 //alert(urlk);
			$.ajax({
				url: post_c_url,
				type: 'POST',
				data:chk_data,
				success:function(msg){
					//alert(msg);
					book_seats(msg);
				}
			});
    	}	
	});
});

function book_seats(msg){
	var ch_ids = msg.split("#");
	//var id_maker = new Array();
	for(var i =0 ; i <ch_ids.length; i+=2){
		id_maker.push((ch_ids[i]+ch_ids[i+1]));
	}
	change_book_seats(id_maker,'book_b');
};

function change_book_seats(id_array,type){
	for(var j =0; j< id_array.length;j++){
		//alert(id_array[j]);
		var s1 ='#';
		var s2 = s1+id_array[j];
		$(s2).attr('class',type);
	}	
}
//customervalidation from client side
function vaildate_mail(mail_address){
var atpos=mail_address.indexOf("@");
var dotpos=mail_address.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=mail_address.length)
	{
		alert("Not a valid e-mail address");
		return false;
	}
	else{
		return true;
	}		
}
///
function vaildate_nic(nic){
	if(nic.length==10){
		return true;
	}
	alert("not valid number");
	return false;
}
