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
				//console.log("RETRIEVE: SUCCESS");
				updateChat(data);
			},
			error: function () {
				//console.log("RETRIEVE: FAIL");
			}
		});
	}
}

function updateChat(data) {
	var mainMessagingBox = document.getElementById("chat-area");
	mainMessagingBox.innerHTML = "";
	//console.log(data);
	data.forEach(function(message) {
		//console.log(message);
		mainMessagingBox.innerHTML += "<b>" + message["User"] + "</b>: " + message["Message"] + "<br>";
	});

	document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
}

//send the message
function sendChat(message) {
	getStateOfChat();
	$.ajax({
		type: "POST",
		url: "messaging/sendMessage.php",
		data: {
			'chatroom': getParameterByName("chatroom"),
			'user': getParameterByName("user"),
			'message': message
		},
		success: function (data) {
			//console.log("SEND: SUCCESS");
			getStateOfChat();
		},
		error: function () {
			//console.log("SEND: FAIL");
		}
	});
}

function Chat() {
	this.update = updateChat;
	this.send = sendChat;
	this.getState = getStateOfChat;
}