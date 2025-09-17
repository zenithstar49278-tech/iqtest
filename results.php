<!-- results.php -->
<?php
session_start();
include 'db.php';

// Fetch questions to check answers
$sql = "SELECT id, correct_answer FROM questions";
$result = $conn->query($sql);
$correct_answers = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $correct_answers[$row['id']] = $row['correct_answer'];
    }
}
$conn->close();

$score = 0;
$total = count($correct_answers);
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['answer'])) {
    foreach ($_POST['answer'] as $id => $ans) {
        if (isset($correct_answers[$id]) && $ans == $correct_answers[$id]) {
            $score++;
        }
    }
}
$percentage = ($score / $total) * 100;
$iq_estimate = 70 + $percentage; // Simple fun estimate, real IQ is more complex
$feedback = $percentage > 80 ? "Excellent cognitive abilities! Strong in logic and patterns." :
            ($percentage > 50 ? "Good performance. Focus on patterns for improvement." : "Room for growth. Practice logical puzzles.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Results</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; margin: 0; padding: 0; }
        .container { max-width: 800px; margin: 0 auto; padding: 40px 20px; text-align: center; }
        h1 { color: #e74c3c; font-size: 2.5em; margin-bottom: 20px; }
        .score { font-size: 3em; color: #27ae60; margin-bottom: 20px; }
        p { font-size: 1.2em; line-height: 1.6; margin-bottom: 20px; }
        .btn { background-color: #3498db; color: white; padding: 15px 30px; font-size: 1.2em; border: none; border-radius: 5px; cursor: pointer; margin: 10px; transition: background 0.3s; }
        .btn:hover { background-color: #2980b9; }
        .premium-img { width: 100%; max-width: 400px; display: block; margin: 20px auto; border-radius: 8px; }
        @media (max-width: 768px) { h1 { font-size: 2em; } .score { font-size: 2em; } p { font-size: 1em; } .btn { font-size: 1em; padding: 10px 20px; } }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your IQ Test Results</h1>
        <div class="score"><?php echo $score . '/' . $total; ?> (<?php echo round($percentage); ?>%)</div>
        <p>Estimated IQ: <?php echo round($iq_estimate); ?></p>
        <p>Feedback: <?php echo $feedback; ?></p>
        <p>Recommendations: Practice daily puzzles to enhance your skills. Consider books on logic and reasoning.</p>
        <button class="btn" onclick="window.location.href='quiz.php';">Retake Test</button>
        <button class="btn" onclick="alert('Share your score: <?php echo $score; ?>/<?php echo $total; ?>');">Share Results</button>
        <img src="https://www.hilton.com/im/en/NoHotel/15281883/shutterstock-1701340705.jpg?impolicy=fc_crop&w=1500&h=1000&q=medium" alt="Premium Hilton Image" class="premium-img">
    </div>
</body>
</html>
