<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章输入</title>
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
        textarea {
            width: 100%;
            height: 200px;
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



          <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            background-color: #fff;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: block;
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
        }
        .form-group input[type="submit"] {
            display: block;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
    </style>
</head>
<body>
    <div class="container">
        <h2>文章输入</h2>
        <form action="process_article.php" method="post">
            <div class="form-group">
                <label for="article">请输入文章内容：</label>
                <textarea id="article" name="article"></textarea>
            </div>
            <button type="submit">提交文章</button>
        </form>
    </div>


 <div class="form-container">
        <h2>上传 Word 文档</h2>
        <form action="upload_process.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="wordFile">选择文件</label>
                <input type="file" name="wordFile" id="wordFile" />
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="上传文件" />
            </div>
        </form>
    </div>

</body>
</html>
