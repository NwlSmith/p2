<?php
require 'logic.php'
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <title>p2</title>
    <meta charset='utf-8' />
    <link href='https://fonts.googleapis.com/css?family=Raleway:200,200i' rel='stylesheet'>
    <link href='style/stylesheet.css' rel='stylesheet'>
</head>
<body>
<header>
    <a href='http://nwlsmith.com' alt='Portfolio Link'><img src='http://nwlsmith.com/images/general/Nate-logo-200.png' alt='Logo' id='logo'></a>
    <h1>Project 2</h1>
</header>
<main>
    <h1>Interest Calculator</h1>
    <form method='GET' action='calculate.php'>
        <p>Calculate the interest on a given payment<br></p>
        <fieldset>
            <legend>Initial amount of money:</legend>
            <label>$ <input type='number' name='initialAmount' value='0'></label>
        </fieldset>

        <fieldset>
            <legend>Interest Rate:</legend>
            <label>Percent:<br>
                <input type='number' name='percentInterest'>%<br>
            </label>
            <label>Per:<br>
                <select name='interestFrequency'>
                    <option value='year'>year</option>
                    <option value='half'>half-year</option>
                    <option value='quarter'>quarter-year</option>
                    <option value='month'>month</option>
                </select>
            </label>
        </fieldset>

        <fieldset>
            <legend>Type of interest:</legend>
            <label><input type='radio' name='interestType' value='compound' checked>Compound interest</label><br>
            <label><input type='radio' name='interestType' value='simple' checked>Simple interest</label><br>
        </fieldset>

        <fieldset>
            <legend>Time period:</legend>
            <label>After
                <input type='number' name='timePeriodNumber'>
            </label>
            <p>*enter time period here*<p>
        </fieldset>

        <fieldset>
            <legend>Misc:</legend>
            <label>Display only interest?
                <input type="checkbox" name="totalBool">
            </label>
        </fieldset>



        <p>Calculate the *interestType* interest off of $*initialAmount*
        at an interest rate of *percentInterest* per *interestFrequency*
        after timePeriodNumber *interestFrequency* *if timePeriodNumber > 1, add s* </p>
        <input type='submit' value='Calculate'>

    </form>
</main>
</body>

</html>