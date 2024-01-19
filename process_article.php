<?php
$filePath = 'word_list.txt';
$article = isset($_POST['article']) ? $_POST['article'] : '';

// 读取违禁词列表
$words = file_exists($filePath) ? file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

// 准备结果数组
$results = [];
$totalCount = 0; // 总违禁词计数
foreach ($words as $word) {
    $occurrences = substr_count(strtolower($article), strtolower($word));
    if ($occurrences > 0) {
        $results[$word] = $occurrences;
        $totalCount += $occurrences;
    }
}

// 高亮显示文章中的违禁词
$highlightedArticle = htmlspecialchars($article);
foreach ($words as $word) {
    $highlightedWord = "<strong style='color: red;'>" . htmlspecialchars($word) . "</strong>";
    $highlightedArticle = preg_replace("/" . preg_quote($word, '/') . "/i", $highlightedWord, $highlightedArticle);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>违禁词检测结果</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            max-width: 800px;
            margin: 0 auto;
        }
        .article-content {
            white-space: pre-wrap;
            text-align: left;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>违禁词检测结果</h2>
        <p>文章中总共检测到 <strong><?php echo $totalCount; ?></strong> 个违禁词。</p>
        <!-- 其他内容同前 -->
        <div class="article-content">
            <h3>文章内容：</h3>
            <p><?php echo $highlightedArticle; ?></p>
        </div>
        <a href="index.php" style="display: inline-block; margin-top: 20px;">返回首页</a>
    </div>
</body>
</html>
