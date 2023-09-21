function updateDateTime() {
    const now = new Date();
    const hours = now.getHours().toString().padStart(2, '0');
    const minutes = now.getMinutes().toString().padStart(2, '0');
    const seconds = now.getSeconds().toString().padStart(2, '0');
    const timeString = `${hours}:${minutes}:${seconds}`;

    const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    const dayOfWeek = daysOfWeek[now.getDay()];

    const months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const month = months[now.getMonth()];
    const day = now.getDate();
    const year = now.getFullYear();

    const dateTimeString = `${dayOfWeek}, ${month} ${day}, ${year} ${timeString}`;

    document.getElementById('timestamp').textContent = dateTimeString;
}

// Update time every second
setInterval(updateDateTime, 1000);

// Initial update
updateDateTime();
