<?php
require_once '../vendor/autoload.php';

use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Table;

function getTextFromElement($element) {
    $text = '';
    if (method_exists($element, 'getText')) {
        $text .= $element->getText();
    } elseif ($element instanceof Table) {
        foreach ($element->getRows() as $row) {
            foreach ($row->getCells() as $cell) {
                foreach ($cell->getElements() as $cellElement) {
                    $text .= getTextFromElement($cellElement);
                }
            }
        }
    } elseif ($element instanceof TextRun) {
        foreach ($element->getElements() as $textElement) {
            $text .= getTextFromElement($textElement);
        }
    }
    return $text;
}
if (isset($_FILES['wordFile'])) {
    if ($_FILES['wordFile']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['wordFile']['tmp_name'];

        try {
            $phpWord = IOFactory::load($file);
            $text = '';

            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    $text .= getTextFromElement($element);
                }
            }

            $filePath = 'word_list.txt'; 
            $words = file_exists($filePath) ? file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];

            // 违禁词统计和高亮
            $totalCount = 0;
            $highlightedText = htmlspecialchars($text);
            foreach ($words as $word) {
                $highlightedWord = "<strong style='color: red;'>" . htmlspecialchars($word) . "</strong>";
                $replacementCount = preg_match_all("/" . preg_quote($word, '/') . "/i", $text);
                $highlightedText = preg_replace("/" . preg_quote($word, '/') . "/i", $highlightedWord, $highlightedText);
                $totalCount += $replacementCount;
            }

            // 输出处理后的文本和违禁词统计
            echo "<style>
                    body { font-family: Arial, sans-serif; }
                    .content { margin: 20px; padding: 20px; border: 1px solid #ddd; background-color: #f9f9f9; }
                    .highlight { color: red; font-weight: bold; }
                    a { display: inline-block; margin-top: 20px; color: blue; text-decoration: none; }
                  </style>";

            echo "<div class='content'>";
            echo "<h3>提取的文本内容（违禁词高亮显示）：</h3>";
            echo "<div style='white-space: pre-wrap;'>" . $highlightedText . "</div>";
            echo "<p>总共检测到违禁词 <strong>$totalCount</strong> 次。</p>";
            echo "</div>";
            echo "<a href='index.php' class='back-button'>返回首页</a>";
        } catch (Exception $e) {
            echo "无法读取文件：" . $e->getMessage();
        }
    } else {
        echo "文件上传失败，错误代码: " . $_FILES['wordFile']['error'];
    }
} else {
    echo "没有文件被上传。";
}
?>
<style type="text/css">    .back-button {
            display: inline-block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 20px;
        }
        .back-button:hover {
            background-color: #45a049;
        }</style>