<?php

class IntQuery
{

    /**
     * Properties
     */
    public $initialAmount;
    public $percentInterest;
    public $interestFrequency;
    public $interestType;
    public $timePeriodNumber;
    public $totalBool;
    public $total;

    /**
     * Methods
     */
    public function __Construct(\DWA\Form $form)
    {
        $this->initialAmount = $form->get('initialAmount');
        $this->percentInterest = $form->get('percentInterest');
        $this->interestFrequency = $form->get('interestFrequency');
        $this->interestType = $form->get('interestType');
        $this->timePeriodNumber = $form->get('timePeriodNumber');
        $this->totalBool = $form->get('totalBool');
    }

    public function calculate()
    {
        switch ($this->interestType) {
            case 'compound':
                $this->total = $this->initialAmount * pow(1 + ($this->percentInterest / 100), $this->timePeriodNumber);
                break;
            case 'simple':
                $this->total = $this->initialAmount * (1 + ($this->percentInterest / 100) * $this->timePeriodNumber);
                break;
        }
        if ($this->totalBool) {
            $this->total = $this->total - $this->initialAmount;
        }

        return $this->total;
    }
}