//THANKS STACK OVERFLOW!
function getParameterByName(name, url = false) {
	if (!url) url = window.location.href;
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
		results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
	return decodeURIComponent(results[2].replace(/\+/g, " "));
}

// //gets the state of the chat
function getStateOfChat() {
	var instance = false;
	if (!instance) {
		instance = true;
		$.ajax({
			type: "POST",
			url: "messaging/retrieveMessages.php",
			data: {
				'chatroom': getParameterByName("chatroom"),
				'user': getParameterByName("user")
			},
			dataType: "json",
			success: function (data) {
				console.log("STATE: SUCCESS");
				for (var i = 0; i < size(data); ++i) {
					console.log(data[i]);
				}
			},
			error: function () {
				console.log("STATE: FAIL");
			}
		});
	}
}

//send the message
function sendChat(message) {
	getStateOfChat();
	$.ajax({
		type: "POST",
		url: "../chatBOX/messaging/sendMessage.php",
		data: {
			'chatroom': getParameterByName("chatroom"),
			'user': getParameterByName("user"),
			'message': message
		},
		dataType: "json",
		success: function (data) {
			for (var i = 0; i < size(data); ++i) {
				console.log(data[i]);
			}
		},
		error: function () {
			console.log("STATE:FAIL");
		}
	});
}

function Chat() {
	this.send = sendChat;
	this.getState = getStateOfChat;
}