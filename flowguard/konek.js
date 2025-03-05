fetch('https://34.30.45.20/flowguard/getquality.php')
    .then(response => response.json())
    .then(data => {
        // Handle data
    })
    .catch(error => console.error('Error fetching sensor data:', error));

// Repeat similarly for the other fetch requests.
