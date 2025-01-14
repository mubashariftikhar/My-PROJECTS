<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Scores Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 50%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Student Scores Analysis</h1>

    <?php
    $file = fopen('data.csv', 'r');
    $students = [];
    $header = fgetcsv($file);

    while (($row = fgetcsv($file)) !== false) {
        $students[] = [
            'name' => $row[0],
            'score' => (float)$row[1],
        ];
    }
    fclose($file);

    $totalScore = array_sum(array_column($students, 'score'));
    $numStudents = count($students);
    $averageScore = $numStudents ? $totalScore / $numStudents : 0;

    $highestScore = max(array_column($students, 'score'));
    $lowestScore = min(array_column($students, 'score'));

    $highestScorers = array_filter($students, fn($s) => $s['score'] == $highestScore);
    $lowestScorers = array_filter($students, fn($s) => $s['score'] == $lowestScore);
    ?>

    <h2>Average Score: <?= number_format($averageScore, 2) ?></h2>

    <h3>Highest Score(s):</h3>
    <ul>
        <?php foreach ($highestScorers as $student): ?>
            <li><?= $student['name'] ?> - <?= $student['score'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>Lowest Score(s):</h3>
    <ul>
        <?php foreach ($lowestScorers as $student): ?>
            <li><?= $student['name'] ?> - <?= $student['score'] ?></li>
        <?php endforeach; ?>
    </ul>

    <h3>All Students</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Score</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= $student['score'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
