<?php
require 'logic.php'
?>

<!DOCTYPE html>
<html lang=en>
<head>
    <title>p2</title>
    <meta charset='utf-8'/>
    <link href='https://fonts.googleapis.com/css?family=Raleway:200,200i' rel='stylesheet'>
    <link href='style/stylesheet.css' rel='stylesheet'>
</head>
<body>
<header>
    <a href='http://nwlsmith.com' alt='Portfolio Link'><img src='http://nwlsmith.com/images/general/Nate-logo-200.png'
                                                            alt='Logo'
                                                            id='logo'></a>
    <h1>Project 2</h1>
</header>
<main>
    <h1>Interest Calculator</h1>
    <form method='GET' action='calculate.php'>
        <p>Calculate the interest on a given payment<br></p>
        <fieldset>
            <legend>Initial amount:</legend>
            <label>$ <input type='number'
                            step='.01'
                            name='initialAmount'
                            value='<?= $initialAmount ?? 0 ?>'></label>
        </fieldset>

        <fieldset>
            <legend>Interest Rate:</legend>
            <label>
                <input type='number'
                       step='any'
                       name='percentInterest'
                       value='<?= $percentInterest ?? 0 ?>'>%
            </label>
            <label> per
                <select name='interestFrequency'>
                    <option value='year' <?php if (isset($interestFrequency) && ($interestFrequency == 'year')): echo 'selected="selected"'; endif; ?>>year</option>
                    <option value='half' <?php if (isset($interestFrequency) && ($interestFrequency == 'half')): echo 'selected="selected"'; endif; ?>>half-year</option>
                    <option value='quarter' <?php if (isset($interestFrequency) && ($interestFrequency == 'quarter')): echo 'selected="selected"'; endif; ?>>quarter-year</option>
                    <option value='month' <?php if (isset($interestFrequency) && ($interestFrequency == 'month')): echo 'selected="selected"'; endif; ?>>month</option>
                </select>
            </label>
        </fieldset>

        <fieldset>
            <legend>Type of interest:</legend>
            <label><input type='radio'
                          name='interestType'
                          value='compound'
                    <?php if (isset($interestType) && ($interestType == 'compound')): echo 'checked'; endif; ?>>Compound interest</label><br>
            <label><input type='radio'
                          name='interestType'
                          value='simple'
                    <?php if (isset($interestType) && ($interestType == 'simple')): echo 'checked'; endif; ?>>Simple interest</label><br>
        </fieldset>

        <fieldset>
            <legend>Time period:</legend>
            <label>After
                <input type='number' name='timePeriodNumber' value='<?= $timePeriodNumber ?? '0' ?>'>
                   periods (Years / Half-Years / Quarters / Months)
            </label>
        </fieldset>

        <fieldset>
            <legend>Misc:</legend>
            <label>Display only interest?
                <input type="checkbox"
                       name="totalBool" <?php if (isset($totalBool) && $totalBool) echo 'checked'; ?>>
            </label>
        </fieldset>
        <?php if ($hasErrors): ?>
            <ul id='errors'>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <input type='submit' value='CALCULATE' id='submit'>

    </form>
    <?php if (!$hasErrors && isset($total)): ?>
        <br>
        <div id='results'>
            <p>Calculated the <?= $interestType ?> interest off of $<?= $initialAmount ?>
               at an interest rate of <?= $percentInterest ?>% per <?= $interestFrequency ?>
               after <?= $timePeriodNumber ?> month<?php if ($timePeriodNumber > 1 || $timePeriodNumber == 0): echo 's'; endif; ?>. </p>
            <h3>
                <?php if ($totalBool): ?>
                    Interest: $
                <?php else: ?>
                    Total: $
                <?php endif; ?>
                <?php if (isset($total)): echo round($total, 2); endif ?>
            </h3>
        </div>
    <? else: ?>

    <?php endif; ?>
    <br>
</main>
</body>

</html>