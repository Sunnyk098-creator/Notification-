document.getElementById('notifyButton').addEventListener('click', () => {
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    } else if (Notification.permission === "granted") {
        sendNotification();
    } else if (Notification.permission !== "denied") {
        Notification.requestPermission().then(function (permission) {
            if (permission === "granted") {
                sendNotification();
            }
        });
    }
});

function sendNotification() {
    // This is where you would typically get a subscription token
    // and send it to your server. For this example, we'll directly
    // call the PHP script to send a generic notification.
    fetch('send_notification.php', {
        method: 'POST',
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch((error) => {
        console.error('Error:', error);
    });
}