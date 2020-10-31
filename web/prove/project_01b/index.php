<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/prove/project_01/page_head.php';
?>
   <title>Mileage Tracker</title>
</head>
<body>

<div class="row"><div class="large-6 large-offset-3 columns">

   <div class="row">
     <div class="column">
       <h1>Mileage Tracker</h1>
       <p>View previously recorded records or create a new one.</p>
     </div>
   </div>

   <div class="row">
      <div class="large-6 column">
         <button onclick="location.href = './filler.php';">View Fill-up Records</button>
      </div>
      <div class="large-6 column">
         <button onclick="location.href = './add_filler.php';">Add New Record</button>
      </div>
   </div>

</div></div>

</body>
</html>
