
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: 'numeric' };

		function calendar(){
			var now = new Date();
			// now.setSeconds(now.getSeconds() + 1);
			var today = now.toLocaleDateString("en-US", options)
			document.getElementById("calendar").innerHTML = today;
		}
		calendar();
		setInterval(()=>{calendar()}, 1000);