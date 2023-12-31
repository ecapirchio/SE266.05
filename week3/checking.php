<?php

require_once "account.php";

class CheckingAccount extends Account 
{
    const OVERDRAW_LIMIT = -200;

    public function withdrawal($amount) 
    {
        if ($amount > 0 && ($this->balance - $amount >= self::OVERDRAW_LIMIT)) {
            $this->balance -= $amount;
            return true;
        }
        return false;
    }

    public function getAccountDetails()
    {
        $accountDetails = "<h2>Checking Account</h2>";
        $accountDetails .= parent::getAccountDetails();
        return $accountDetails;
    }
}

// The code below runs every time this class loads and 
// should be commented out after testing.

?>