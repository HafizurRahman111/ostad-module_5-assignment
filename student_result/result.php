<?php

// Mark validation function to check if the mark is valid
function isValidMark($subject, $mark)
{
    // Validate if the mark is between 0 and 100
    if ($mark >= 0 && $mark <= 100) {
        return $mark;
    } else {
        echo "Invalid mark for the subject $subject! Please enter a valid mark between 0 and 100.<br>";
        return false;
    }
}

// Function to calculate the grade based on average marks
function grade($avgMarks)
{
    switch (true) {
        case ($avgMarks >= 80 && $avgMarks <= 100):
            return 'A+';
        case ($avgMarks >= 70 && $avgMarks < 80):
            return 'A';
        case ($avgMarks >= 60 && $avgMarks < 70):
            return 'A-';
        case ($avgMarks >= 50 && $avgMarks < 60):
            return 'B';
        case ($avgMarks >= 40 && $avgMarks < 50):
            return 'C';
        case ($avgMarks >= 33 && $avgMarks < 40):
            return 'D';
        case ($avgMarks < 33 && $avgMarks >= 0):
            return 'F';
        default:
            return 'Invalid mark';
    }
}

// Main function to calculate the result
function calculateResult()
{
    // Marks obtained in each subject
    $bengaliMark = 30;
    $computerMark = 88;
    $englishMark = 84;
    $mathMark = 75;
    $scienceMark = 76;

    // Validate marks for each subject
    $bengaliMark = isValidMark('Bengali', $bengaliMark);
    if ($bengaliMark === false)
        return;

    $computerMark = isValidMark('Computer', $computerMark);
    if ($computerMark === false)
        return;

    $englishMark = isValidMark('English', $englishMark);
    if ($englishMark === false)
        return;

    $mathMark = isValidMark('Math', $mathMark);
    if ($mathMark === false)
        return;

    $scienceMark = isValidMark('Science', $scienceMark);
    if ($scienceMark === false)
        return;

    // Check if any mark is below 33 (fail condition)
    if ($bengaliMark < 33 || $computerMark < 33 || $englishMark < 33 || $mathMark < 33 || $scienceMark < 33) {
        echo "Result: F (mark below 33 in one or more subjects)<br>";
        return;
    }

    // Calculate total and average marks
    $totalMarks = $bengaliMark + $computerMark + $englishMark + $mathMark + $scienceMark;
    $avgMarks = $totalMarks / 5;

    // Calculate the grade
    $gradeValue = grade($avgMarks);

    // Results
    echo "Total Marks: $totalMarks<br>";
    echo "Average Marks: $avgMarks<br>";
    echo "Grade: $gradeValue<br>";
}

calculateResult();

