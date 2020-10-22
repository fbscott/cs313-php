<?php

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

if (isset($_POST['book'])) {
   $book = $_POST["book"];
   $chapter = $_POST["chapter"];
   $verse = $_POST["verse"];
   $content = $_POST["content"];
   $topics = $_POST["topic"];
   $other_check = $_POST["check_other"];
   $other_input = $_POST["input_other"];

   $stmt = $db->prepare('INSERT INTO scriptures(book, chapter, verse, content) VALUES (:book, :chapter, :verse, :content);');
   $stmt->bindValue(':book', $book, PDO::PARAM_STR);
   $stmt->bindValue(':chapter', $chapter, PDO::PARAM_INT);
   $stmt->bindValue(':verse', $verse, PDO::PARAM_INT);
   $stmt->bindValue(':content', $content, PDO::PARAM_STR);
   $stmt->execute();

   $scripture_id = $db->lastInsertId('scriptures_id_seq');

   if ($other_check && $other_input) {
      $stmt = $db->prepare('INSERT INTO topic(name) VALUES (:other_input);');
      $stmt->bindValue(':other_input', $other_input, PDO::PARAM_STR);
      $stmt->execute();

      $topic_id = $db->lastInsertId('topic_id_seq');

      $stmt = $db->prepare('INSERT INTO scriptures_topic VALUES (DEFAULT, :scripture_id, :topic_id)');
      $stmt->bindValue(':scripture_id', $scripture_id, PDO::PARAM_INT);
      $stmt->bindValue(':topic_id', $topic_id, PDO::PARAM_INT);
      $stmt->execute();
   }

   foreach ($topics as $topic) {
     $stmt = $db->prepare('INSERT INTO scriptures_topic VALUES (DEFAULT, :scripture_id, :topic_id)');
     $stmt->bindValue(':scripture_id', $scripture_id, PDO::PARAM_INT);
     $stmt->bindValue(':topic_id', $topic['id'], PDO::PARAM_INT);
     $stmt->execute();
   }
}


?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Insert a Reference</h1>
    <form class="" action="" method="POST" onsubmit="return loadDoc(this);">
      <label for="book">Book:</label>
      <input id="book" type="text" name="book" value="">
      <label for="chapter">Chapter:</label>
      <input id="chapter" type="text" name="chapter" value="">
      <label for="verse">Verse:</label>
      <input id="verse" type="text" name="verse" value="">
      <label for="content">Content:</label>
      <textarea id="content" name="content"></textarea>
      <?php
        $stmt = $db->prepare('SELECT * FROM topic');
        $stmt->execute();
        $existingTopics = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($existingTopics as $existingTopic) {
          echo "<input id='topic{$existingTopic['id']}' type='checkbox' name='topic[]' value='{$existingTopic['id']}'>";
          echo "<label for='topic{$existingTopic['id']}'>{$existingTopic['name']}</label>";
        }
      ?>

      <input id="check_other" name="check_other" type="checkbox" value="check_other">
      <input id="input_other" name="input_other" type="text">

      <button type="submit" name="submit">Submit</button>
    </form>

    <div id="result">
    <ul>
    <?php
      $stmt = $db->prepare("SELECT scriptures.id, book, chapter, verse, content,
        array_to_string(array_agg(topic.name), ',') AS topics FROM scriptures LEFT JOIN scriptures_topic
        ON scriptures.id = scriptures_topic.scripture_id
        LEFT JOIN topic ON topic.id = scriptures_topic.topic_id
        GROUP BY scriptures.id;");
      $stmt->execute();
      $scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($scriptures as $scripture) {
        echo "<li>{$scripture['book']} {$scripture['chapter']}:
        {$scripture['verse']} - <br>{$scripture['content']}
        <br>{$scripture['topics']}</li>";
      }

     ?>
   </ul>
   </div>

   <script>
      function loadDoc(formData) {
        var xhttp = new XMLHttpRequest();

          var elements = formData.elements;
          var queryString = '';

          for(var i = 0 ; i < elements.length ; i++) {
              var item = elements.item(i);
              if (!!item) {
               queryString += item.name + '=' + item.value + '&';
              }
          }
         console.log(queryString);

        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
           document.getElementById("result").innerHTML = this.responseText;
          }
        };

        xhttp.open("GET", "06results.php?" + queryString, true);
        xhttp.send();
      }
   </script>   
  </body>
</html>
