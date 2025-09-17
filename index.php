<!-- index.php -->
<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IQ Test - Homepage</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; margin: 0; padding: 0; }
        .container { max-width: 1200px; margin: 0 auto; padding: 20px; text-align: center; }
        h1 { color: #2c3e50; font-size: 3em; margin-bottom: 20px; }
        p { font-size: 1.2em; line-height: 1.6; margin-bottom: 30px; }
        .start-btn { background-color: #3498db; color: white; padding: 15px 30px; font-size: 1.5em; border: none; border-radius: 5px; cursor: pointer; transition: background 0.3s; }
        .start-btn:hover { background-color: #2980b9; }
        .premium-bg { background-image: url('https://www.hilton.com/im/en/NoHotel/15281883/shutterstock-1701340705.jpg?impolicy=fc_crop&w=1500&h=1000&q=medium'); background-size: cover; background-position: center; padding: 100px 0; color: white; text-shadow: 2px 2px 4px rgba(0,0,0,0.5); }
        @media (max-width: 768px) { h1 { font-size: 2em; } p { font-size: 1em; } .start-btn { font-size: 1.2em; padding: 10px 20px; } }
    </style>
</head>
<body>
    <div class="premium-bg">
        <div class="container">
            <h1>Welcome to the Premium IQ Test Platform</h1>
            <p>Discover your cognitive abilities through our scientifically inspired IQ test. Assess logical reasoning, pattern recognition, and problem-solving skills. This test is designed to provide insightful feedback on your strengths and areas for improvement.</p>
            <button class="start-btn" onclick="window.location.href='quiz.php';">Start Test</button>
        </div>
    </div>
</body>
</html>
