<html>
<head></head>
<body>
<table border=1>
    <tr><td>Title</td><td>Author</td><td>Description</td></tr>
        <?php foreach ($books as $title => $book) { ?>
    <tr>
        <td>
            <a href="index.php?book=<?php echo $book->title ?>"><?php echo $book->title ?></a>
        </td>
        <td> <?php echo $book->author ?></td>
        <td> <?php echo $book->description ?> </td>
    </tr>
    <?php } ?>
</table>
<form method="POST"><button class="btn btn-primary btn-block" type="submit" name="insert">insertbook</button></form>
</body>
</html>