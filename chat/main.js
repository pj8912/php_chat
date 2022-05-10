document.getElementById('msg-btn').disabled = true; //Disable at first


document.getElementById('msg').addEventListener('keyup', e => {
    //Check for the input's value
    if (e.target.value === "") {
        document.getElementById('msg-btn').disabled = true;
    } else {
        document.getElementById('msg-btn').disabled = false;
    }
});


var input_f = document.getElementById('msg');

input_f.addEventListener("keyup", (event) => {
    if (event.key === "Enter") {
        event.preventDefault();
        // sendMessage();
        document.getElementById('msg-btn').click();
    }
})


async function sendMessage() {
    fetchMessages();
    var msgVal = document.getElementById('msg').value;
    var oid = document.getElementById('other_id').value;

    if (msgVal === '') {
        alert("Please Enter Something");
    }

    await fetch('upload.php', {
        method: "POST",
        body: JSON.stringify({
            message: msgVal,
            other_id: oid
        })
    })

    document.getElementById('msg').value = '';

}


async function fetchMessages() {
    const response = await fetch('fetchMessages.php')
    await response.json()
        .then(message => {
            let op = '';
            for (let i in message) {
                if (message[i].message == null || message[i].message == '') {
                    op += 'No messages!';
                } else {
                    if (message[i].sender_id == my_id) {

                        op += `
					<div class="sender"> 
					 ${message[i].message} 	
                    </div> 
				`;
                    } else {
                        op += `
						<div class="receiver">
						  ${message[i].message}
						</div>
					`
                    }
                }
            }

            document.querySelector('#messages').innerHTML = op;
            console.log(op);

        })

    fetchMessages();
}




window.onload = fetchMessages();