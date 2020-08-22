<!DOCTYPE html>
<html lang="en">
<head>
<title>Løsningsforslag L1-1</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 20px;
  text-align: center;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 33.33%;
  padding: 15px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width:600px) {
  .column {
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <h1>Header</h1>
  <p>Endre nettleservinduets størrelse for å se css endre utseende på websiden (responsive design)</p>
</div>

<div class="topnav">
  <a href="#">Link</a>
  <a href="#">Link</a>
  <a href="#">Link</a>
</div>

<div class="row">
  <div class="column">
    <h2>Første dato</h2>
    <p>Dagens dato er 11. august 2020</p>
  </div>
  
  <div class="column">
    <h2>Andre dato</h2>
    <p>Dagens dato er 11. august 2020</p>
  </div>
  
  <div class="column">
    <h2>Tredje dato</h2>
    <p>Dagens dato er 11. august 2020</p>
  </div>
</div>

</body>
</html>