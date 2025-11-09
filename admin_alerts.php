<?php
$conn = new mysqli("localhost", "root", "", "login");
if ($conn->connect_error) die("Connection failed");

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $conn->query("INSERT INTO alerts_reports (title, author, date) VALUES ('$title', '$author', '$date')");
}
if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $conn->query("DELETE FROM alerts_reports WHERE id=$id");
}
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date = $_POST['date'];
    $conn->query("UPDATE alerts_reports SET title='$title', author='$author', date='$date' WHERE id=$id");
}
?>

<!-- Admin Form -->
<form method="POST">
  <input type="text" name="title" placeholder="Report Title" required />
  <input type="text" name="author" placeholder="Author" required />
  <input type="date" name="date" required />
  <button type="submit" name="add">Add Report</button>
</form>

<!-- Existing Reports -->
<table>
  <tr><th>Title</th><th>Author</th><th>Date</th><th>Actions</th></tr>
  <?php
  $result = $conn->query("SELECT * FROM alerts_reports ORDER BY id DESC");
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
      <form method='POST'>
        <input type='hidden' name='id' value='{$row['id']}'>
        <td><input name='title' value='{$row['title']}'/></td>
        <td><input name='author' value='{$row['author']}'/></td>
        <td><input name='date' type='date' value='{$row['date']}'/></td>
        <td>
          <button name='update'>Update</button>
          <button name='delete' value='{$row['id']}'>Delete</button>
        </td>
      </form>
    </tr>";
  }
  ?>
</table>
