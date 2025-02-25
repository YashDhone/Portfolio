document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let message = document.getElementById('message').value;
    

    let responseMessage = document.getElementById('responseMessage');

    emailjs.send('service_nr1qr7n', 'template_oy3qak7', {
        from_name: name,
        from_email: email,
        message: message
    }).then(function(response) {
        responseMessage.innerText = 'Message sent successfully!';
        responseMessage.style.color = 'green';
        document.getElementById('contactForm').reset();
    }, function(error) {
        responseMessage.innerText = 'Failed to send message. Please try again.';
        responseMessage.style.color = 'red';
    });
});