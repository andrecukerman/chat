$( document ).ready(function() {
	var lastData = "";

	function getUpdate(){
		$.ajax(
			{
				type: "HEAD",
				url: "chat.php",
				response:'text',
				success: function(data, status, xhr){
					var modefided = xhr.getResponseHeader('last-modified');
					if(modefided != lastData){
						getData();	
						lastData = modefided;
					}
				}
			}	
		);

	}

	function getData(){
		$.get('chat.php?msg='+lastData,function(data){
			var ms = $('#msg p:first-child');
			  	$.each(data, function(d){
			  		console.log(data[d].msg);
			  		ms.before("<p><b>"+data[d].name+"</b>: "+data[d].msg+"<span class='pull-right Khaki'>"+data[d].datetime+"</span></p>");
			  	});
		},'json');

	}

	function sendData (msgObject) {
	    $.ajax({
		  type: "POST",
		  data: msgObject,
		  url: "chat.php",
		  dataType: "json"
		});
	}

    $('#send').click(function () {

    	var name = $('#name').val();
    	var msg = $('#message').val();
		sendData({name:name, msg:msg});

    });

    setInterval(getUpdate,1000); 
    
});