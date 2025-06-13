<?php
    $mysqli = new mysqli('MySQL-8.2', 'root', '', 'comment');
    $stmt = $mysqli->prepare("SELECT name, comment FROM comments");
    $stmt->execute();
    $result = $stmt->get_result();
    $comments = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
</head>
<body>
  <h1>Добавление комментариев</h1>

	<form name="comment" action="comment.php" method="post">
		<p>
			<label>Имя:</label>
			<input type="text" name="name"/>
		</p>
		<p>
			<label>Комментарий:</label><br/>
			<textarea name="comment" cols="30" rows="10"></textarea>
		</p>
		<p>
			<input type="hidden" name="page_id" value="150" />
			<input type="submit" value="Отправить" />
		</p>
	</form>


      <div>
          <h2>Комментарии</h2>
          <?php foreach ($comments as $comment): ?>
              <div>
                  <strong><?= htmlspecialchars($comment['name']) ?></strong>:
                  <p><?= htmlspecialchars($comment['comment']) ?></p>
              </div>
          <?php endforeach; ?>
      </div>
</body>
</html>
