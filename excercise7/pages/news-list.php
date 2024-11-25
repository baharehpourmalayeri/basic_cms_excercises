<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News Website</title>
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="stylesheet" href="../css/pages/news-list.css">
</head>
<body>
<?php include '../includes/header.php'; ?>
<?php
$availableNews = $newsArray;
if (isset($_GET['category'])){
    $availableNews = [];
    foreach ($newsArray as $newsItem) {
        if ($newsItem['category'] == $_GET['category']) {
            $availableNews[]= $newsItem;
        }
    }
}
?>
<main>
    <?php
    if(isset($_GET['category'])){ ?>
        <h1>All <?php echo $_GET['category']; ?> News</h1>
        <?php
    }else{ ?>
        <h1>All News</h1>
        <?php
    }
    ?>
    <section class="news-list">
        <?php foreach ($availableNews as $news) { ?>
        <article>
            <h2><a href="./single-news.php?id=<?php echo $news['id'] ?>"><?php echo $news['title'] ?></a></h2>
            <p><?php echo $news['description'] ?></p>
            <img class="image" src="../images/<?php echo $news['image']; ?>" alt="<?php echo $news['title']; ?>" />
            <p><strong>Published on:</strong><?php echo $news['publication_date']; ?> | <strong>Category:</strong><?php echo $news['category']; ?></p>
        </article>
        <?php } ?>
    </section>
</main>
<?php include '../includes/footer.php'; ?>
</body>
</html>
