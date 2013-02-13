<?php

namespace Psr\Form;

interface Field{
    /**
     * @var string
     */
    public $name = '';

    /**
     * @var mixed
     */
    public $value = '';

    /**
     * @var SplObjectStorage
     */
    protected $rules = null;

    /**
     * Construct $rules as SplObjectStorage instance
     */
    public function __construct($name, $value);

    /**
     * Sanitizes $value
     */
    public function sanitize();

    /**
     * Validates $value
     */
    public function validate();

    /**
     * Draws HTML output
     *
     * @return string HTML format
     */
    public function draw();

    /**
     * Attach a rule to $rules.
     */
    public function attach(Rule $rule);

    /**
     * Dettach a rule to $rules
     */
		public function dettach(Rule $rule);
}
