const express = require('express');
const mysql = require('mysql2');
const app = express();
const port = 3000;

// Create a connection to Cloud SQL
const connection = mysql.createConnection({
  host: '34.30.45.205',
  user: 'flowguard',
  password: 'cpe12345>',
  database: 'flowguard',
});

// API endpoint to fetch data
app.get('/data', (req, res) => {
  connection.query('SELECT * FROM ph_null', (error, results) => {
    if (error) throw error;
    res.json(results);
  });
});

app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});