<?php

include '../../config.php';
include '../../db.php';

$db = getPDO();
$stmt = $db->prepare('SELECT * FROM todos');
$stmt->execute();

?>

<table style="border-colapse: colapse;">
    <thead>
        <tr>
            <th>Todo</th><th>Done?</th><th>Mark</th>
        </tr>
    </thead>
    <tbody>
<?php while($r = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td style="border: 1px solid black;"><?= $r['todo'] ?></td>
            <td style="border: 1px solid black;"><?= $r['done'] != '0' ? 'YES' : 'NO' ?></td>
            <td style="border: 1px solid black;">
                <a href="done_todo.php?id=<?=$r['id']?>&done=<?=$r['done'] == '0' ? '1' : '0'?>">MARK</a>
            </td>
        </tr>
<?php } ?>
    </tbody>
</table>
