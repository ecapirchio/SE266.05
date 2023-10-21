<?php

require_once "account.php";
 
class SavingsAccount extends Account 
{
    public function withdrawal($amount) 
    {
        if ($amount > 0 && $this->balance >= $amount) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getAccountDetails() 
    {
        $accountDetails = "<h2>Savings Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        return $accountDetails;
    }
}

// The code below runs every time this class loads and 
// should be commented out after testing.

$savings = new SavingsAccount('S123', 0, '03-20-2020');

?>