<?php

namespace Psr\Form;

/**
 * Strategy pattern
 */
interface Rule{
    /**
     * Sanitize user input
     *
     * Example: turning 1 234 to 1234
     *
     * @param string $value
     * @return string
     */
    public sanitize($value);

    /**
     * Validate sanitized input
     *
     * @param string $value
     * @throw RuntimeException
     */
    public validate($value);

    /**
     * Takes a value to display to the user
     *
     * Example: turning 1234 to 1 234.00
     * encrypting emails
     *
     * @param string $value
     * @return string
     */
    public draw($value);
}
