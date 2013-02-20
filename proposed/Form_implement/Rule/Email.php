<?php

namespace Psr\Form_implement\Rule;

use Psr\Form\Rule;

/**
 * Strategy pattern
 */
class Email implements Rule{
    /**
     * Sanitize user input
     *
     * @param mixed $value
     * @return mixed
     */
    public function sanitize($value)
    {
        return filter_var($value, FILTER_SANITIZE_EMAIL);
    }

    /**
     * Validate sanitized input
     *
     * @param string $value
     * @throw RuntimeException
     */
    public function validate($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new LogicException(
                "{fieldname} $value is not a valid email"
            );
        }
    }

    /**
     * Takes a value to display to the user
     *
     * Function edited from the nospambot function
     * from wordpress
     *
     * @param string $value
     * @return string
     */
    public function draw($value)
    {
        $emailNOSPAMaddy = '';
        srand ((float) microtime() * 1000000);
        for ($i = 0; $i < strlen($emailaddy); $i = $i + 1) {
            $j = floor(rand(0, 1));
            if ($j==0) {
               $emailNOSPAMaddy .= '&#'.ord(substr($emailaddy,$i,1)).';';
            } else {
                $emailNOSPAMaddy .= substr($emailaddy,$i,1);
            }
        }
        $emailNOSPAMaddy = str_replace('@','&#64;',$emailNOSPAMaddy);
        return $emailNOSPAMaddy;
    }
}
