<!DOCTYPE html>
<html>
<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  color: white;
}

</style>
</head>
<body style="background: linear-gradient(126.97deg, rgba(6, 11, 40, 0.74) 28.26%, rgba(10, 14, 35, 0.71) 91.2%);">
<table>
  <thead>
    <tr>
      <th>Product</th>
      <th>Name</th>
      <th>Pen Body</th>
      <th>Vision Failure Sum</th>
      <th>Vision Pass Sum</th>
      <th>Pen Pass</th>
      <th>Pen Fail</th>
    </tr>
  </thead>
  <tbody id="tableBody">
    <!-- Dynamic data will be inserted here -->
  </tbody>
</table>

<script>
// Function to populate the table with data
function populateTable(data) {
  const tableBody = document.getElementById('tableBody');

  // Clear existing table rows
  tableBody.innerHTML = '';

  // Loop through the API data and create table rows
  data.forEach(item => {
    const row = document.createElement('tr');

    // Create table cells for each property
    for (const key in item) {
      if (item.hasOwnProperty(key)) {
        const cell = document.createElement('td');
        cell.textContent = item[key];
        row.appendChild(cell);
      }
    }

    // Append the row to the table body
    tableBody.appendChild(row);
  });
}

// Function to fetch and update table data
function updateTable() {
  // Make an API request to retrieve data
  fetch('http://192.168.250.39:82/HP_Lab_v3/backend_table.php')
    .then(response => response.json())
    .then(data => {
      // Call the function to populate the table with data
      populateTable(data);
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
}

// Refresh the table every 30 seconds (30000 milliseconds)
setInterval(updateTable, 1000);
</script>

</body>
</html>
