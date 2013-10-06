(function () {
	var input = document.getElementById("images"), 
		formdata = false;
		
	if (window.FormData) {
  		formdata = new FormData();
  		document.getElementById("btn").style.display = "none";
	}
	
 	input.addEventListener("change", function (evt) {
 		document.getElementById("reupload").innerHTML = "Uploading . . .";
 		var i = 0, len = this.files.length, img, reader, file;
	
		for ( ; i < len; i++ ) {
			file = this.files[i];
	
			if (!!file.type.match(/image.*/)) {
				if ( window.FileReader ) {
					reader = new FileReader();
					reader.onloadend = function (e) { 
						showUploadedItem(e.target.result, file.fileName);
					};
					reader.readAsDataURL(file);
				}
				if (formdata) {
					formdata.append("images[]", file);
				}
			}	
		}
	
		if (formdata) {
			$.ajax({
				url: image_up,
				type: "POST",
				data: formdata,
				processData: false,
				contentType: false,
				success: function (res) {
					document.getElementById("reupload").innerHTML = res; 
				}
			});
		}
	}, false);	
}());
function ddd(){
	var t = $('#images').val();
	alert(locations);
	qrcode.callback = function(data) { alert(data); };
	qrcode.decode(locations);
}
