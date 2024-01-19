<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>违禁词检测系统</title>
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
            margin: 40px auto;
            text-align: center;
        }
        a {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0;
        }
        a:hover {
            background-color: #0056b3;
        }
        .description {
            text-align: left;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>违禁词检测系统</h1>
        <p class="description">
            欢迎使用违禁词检测系统。本系统提供两个主要功能：违禁词的管理和文章内容的违禁词检测。通过管理功能，您可以更新和维护违禁词库。而通过文章检测功能，可以检查提交的文本中是否包含这些违禁词，并获取相关的统计信息。
        </p>
        <a href="manage_words.php">管理违禁词</a>
        <a href="article_input.php">提交文章检测违禁词</a>
    </div>
</body>
</html>
