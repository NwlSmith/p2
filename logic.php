<?php
require 'helpers.php';
session_start();

#store calculation variables and result for reloaded page if they exist
$hasErrors = false;

if(isset($_SESSION['results'])) {
    $results = $_SESSION['results'];
    $initialAmount = $results['initialAmount'];
    $percentInterest = $results['percentInterest'];
    $interestFrequency = $results['interestFrequency'];
    $interestType = $results['interestType'];
    $timePeriodNumber = $results['timePeriodNumber'];
    $totalBool = $results['totalBool'];
    $total = $results['total'];
    $errors = $results['errors'];
    $hasErrors = $results['hasErrors'];
}

$_SESSION['results'] = null;

session_unset();