async function verifyPhoneNumber(event) {
	event.preventDefault();
	const phoneNumber = document.getElementById('phone').value;

	if (!/^\d{11}$/.test(phoneNumber)) {
		alert('Please enter a valid 11-digit phone number. (format:09012345678)');
		return;
	}

	let users = [];

	async function fetchUsers() {
		return new Promise((resolve, reject) => {
			const xhr = new XMLHttpRequest();
			xhr.open('GET', 'fetch_users.php', true);
			xhr.onreadystatechange = function () {
				if (xhr.readyState == 4) {
					if (xhr.status == 200) {
						users = JSON.parse(xhr.responseText);
						resolve();
					} else {
						reject('Error fetching users');
					}
				}
			};
			xhr.send();
		});
	}

	try {
		await fetchUsers();
	} catch (error) {
		console.error('Failed to fetch users:', error);
		alert('Failed to fetch users. Please try again later.');
		return;
	}

	const presentUser = users.some(user => user.phone === phoneNumber);
	if (presentUser) {
		const otp = Math.floor(100000 + Math.random() * 900000);
		alert(otp);
		const userData = {
			phone: phoneNumber,
			otp_num: otp
		};

		fetch('handle_submission.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json'
			},
			body: JSON.stringify(userData)
		})
		.then(response => response.text())
		.then(result => {
			console.log(result);
			redirect();
		})
		.catch(error => {
			console.error('Error:', error);
			alert('An error occurred. Please try again.');
		});






		function redirect() {
			setTimeout(function () {
				window.location.href = 'otp.php';
			}, 500);
		}
	} else {
		alert("You don't have an account. Please create an account.");
		window.location.href = 'signup.php';
	}

	 
}
