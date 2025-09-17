<!-- quiz.php -->
<?php
session_start();
include 'db.php';

// Fetch questions
$sql = "SELECT * FROM questions";
$result = $conn->query($sql);
$questions = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $questions[] = $row;
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Quiz</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #ecf0f1; color: #333; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 0 auto; padding: 40px 20px; }
        h1 { color: #34495e; text-align: center; margin-bottom: 40px; }
        .question { background: white; padding: 20px; margin-bottom: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .question p { font-size: 1.2em; font-weight: bold; margin-bottom: 15px; }
        label { display: block; margin-bottom: 10px; font-size: 1.1em; cursor: pointer; }
        input[type="radio"] { margin-right: 10px; }
        .submit-btn { background-color: #27ae60; color: white; padding: 15px 30px; font-size: 1.2em; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 40px auto 0; transition: background 0.3s; }
        .submit-btn:hover { background-color: #219a52; }
        .premium-img { width: 100%; max-width: 400px; display: block; margin: 20px auto; border-radius: 8px; }
        @media (max-width: 768px) { .container { padding: 20px 10px; } h1 { font-size: 1.8em; } .question p { font-size: 1em; } label { font-size: 1em; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>IQ Test Quiz</h1>
        <form action="results.php" method="POST">
            <?php foreach ($questions as $index => $q): ?>
                <div class="question">
                    <p><?php echo ($index + 1) . '. ' . htmlspecialchars($q['question_text']); ?></p>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="a" required> A: <?php echo htmlspecialchars($q['option_a']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="b"> B: <?php echo htmlspecialchars($q['option_b']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="c"> C: <?php echo htmlspecialchars($q['option_c']); ?></label>
                    <label><input type="radio" name="answer[<?php echo $q['id']; ?>]" value="d"> D: <?php echo htmlspecialchars($q['option_d']); ?></label>
                </div>
            <?php endforeach; ?>
            <button type="submit" class="submit-btn">Submit Answers</button>
        </form>
        <img src="https://www.hilton.com/im/en/NoHotel/15281883/shutterstock-1701340705.jpg?impolicy=fc_crop&w=1500&h=1000&q=medium" alt="Premium Hilton Image" class="premium-img">
    </div>
</body>
</html>
