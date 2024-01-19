<?php
$filePath = 'word_list.txt';
$words = '';

// 检测是否有 POST 请求
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 获取用户提交的违禁词列表并保存
    $words = $_POST['words'];
    file_put_contents($filePath, $words);
}

// 读取现有的违禁词列表
if (file_exists($filePath)) {
    $words = file_get_contents($filePath);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>违禁词管理</title>
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
            max-width: 600px;
            margin: 0 auto;
        }
        textarea {
            width: 100%;
            height: 300px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 10px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>违禁词管理</h2>
        <form action="" method="post">
            <label for="words">编辑违禁词（每个词独占一行）：</label>
            <textarea id="words" name="words"><?php echo htmlspecialchars($words); ?></textarea>
            <button type="submit">保存更改</button>
        </form>
    </div>
</body>
</html>
