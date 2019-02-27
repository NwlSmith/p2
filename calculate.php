<?php
require 'helpers.php';
require 'IntQuery.php';
require 'Form.php';
session_start();

# Get data from form request
$form = new \DWA\Form($_GET);

$errors = $form->validate([
    'initialAmount' => 'required|numeric|min:0',
    'percentInterest' => 'required|numeric',
    'interestFrequency' => 'required',
    'interestType' => 'required',
    'timePeriodNumber' => 'required|numeric|digit|min:0'
]);
$query = new IntQuery($form);

# Calculate resulting interest
if(!$form->hasErrors) {
    $total = $query->calculate();
}

# Store data in the session
$_SESSION['results'] = [
    'initialAmount' => $query->initialAmount,
    'percentInterest' => $query->percentInterest,
    'interestFrequency' => $query->interestFrequency,
    'interestType' => $query->interestType,
    'timePeriodNumber' => $query->timePeriodNumber,
    'totalBool' => $query->totalBool,
    'total' => $total,
    'errors' => $errors,
    'hasErrors' => $form->hasErrors
];

# Redirect back to the form
header('Location: index.php');