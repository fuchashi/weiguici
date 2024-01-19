# weiguici
查询违规词程序
说明文件
index.php
首页负责介绍，以及维护违禁词，和检测文章是否违规的入口

manage_words管理违禁词页面

管理txt文本来控制违禁词列表

article_input文章录入页面

可以录入文本，也可以上传docx文档检测

process_article文本检测页面


upload_process 上传文件检测页面


本程序使用php5.6开发，没有使用数据库技术，读取docx文档部分使用了phpword插件需要去https://getcomposer.org/download/下载，并且在根目录安装。方法如下：

在 PHPStudy 集成环境中安装 PhpOffice\PhpWord 或其他 Composer 包，您可以按照以下步骤操作：

1. 安装 Composer（如果尚未安装）
如果您还没有安装 Composer，这是首先需要做的。Composer 是 PHP 的依赖管理工具，用于安装和管理 PHP 库和框架。

访问 Composer 官网 并下载安装程序。
安装 Composer。在安装过程中，确保它指向了 PHPStudy 中的 PHP 可执行文件。
2. 使用 Composer 安装 PhpOffice\PhpWord
一旦安装了 Composer，您可以使用它来安装 PhpOffice\PhpWord。在您的项目目录中执行以下步骤：

**打开命令
行界面**：

在 Windows 中，您可以使用“命令提示符”或“PowerShell”。
导航到您的 PHP 项目目录，例如：cd path\to\your\project。
执行 Composer 命令：
在项目目录中，运行以下命令来安装 PhpOffice\PhpWord：
bash
Copy code
composer require phpoffice/phpword
这个命令会下载并安装 PhpOffice\PhpWord 及其所有依赖。
