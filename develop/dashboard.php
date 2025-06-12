<?php
require_once 'db.php';
require_once 'user.php';

$user = new User($pdo);
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';
$result = $user->search($keyword);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>mini System</title>
    <link rel="stylesheet" href="style_new.css">
</head>

<body>
    <div>
        <h1>mini System</h1>
    </div>
    <div>
        <h2>ダッシュボード</h2>
    </div>
    <?php if ($result) { ?>
        <table border="1" width="100%">
            <tr>
                <th></th>
                <th>お名前</th>
                <th>ふりがな</th>
                <th>メールアドレス</th>
                <th>電話番号</th>
                <th>性別</th>
            </tr>
            <?php foreach ($result as $val) { ?>
                <tr>
                    <td><a href="edit.php?id=<?php echo $val['id'] ?>">編集</a></td>
                    <td><?php echo ($val['name']); ?></td>
                    <td><?php echo ($val['kana']); ?></td>
                    <td><?php echo ($val['email']); ?></td>
                    <td><?php echo ($val['tel']); ?></td>
                    <td><?php if ($val['gender'] === "1") {
                            echo "男性";
                        } elseif ($val['gender'] === "2") {
                            echo "女性";
                        } else {
                            echo "性別の選択がされていません。";
                        } ?></td>
                </tr>
            <?php } ?>
        </table>
    <?php } ?>
    <a href="index.php">
        <button type="button">TOPに戻る</button>
    </a>
</body>

</html>