<?php
$css="service.css";
$title = "Khảo sát";                   // (1) Set the title
include "header.php";                 // (2) Include the header
?>
<body>

<form class="question">
<h3>input question here</h3>
  <div class="answer">
    <input type="radio" id="a1" name="gender" value="q1_true">
    <label for="q1_true">Answer1</label><br>
  </div>

  <div class="answer">
  <input type="radio" id="a2" name="gender" value="q2_true">
  <label for="q2_true">Answer2</label><br>
  </div>

  <div class="answer">
  <input type="radio" id="a3" name="gender" value="q3_true">
  <label for="q3_true">Answer3</label>
  </div>
</form> 

<?php
include "footer.php";                 // (3) Include the footer
?>