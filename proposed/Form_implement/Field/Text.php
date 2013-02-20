<?php

namespace Psr\Form_implement\Field;

use Psr\Form\Field;

class Text implements Field{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var SplObjectStorage
     */
    protected $rules = null;

    /**
     * @var mixed
     */
    public $value = '';

    /**
     * Construct $rules as SplObjectStorage instance
     */
    public function __construct($name, $value = null)
    {
        $this->name = $name;
        $this->value = $value;
        $this->rules = new SplObjectStorage();
    }

    /**
     * Sanitizes $value
     */
    public function sanitize()
    {
        foreach ($rules as $rule) {
            $this->value = $rule->sanitize($this->value);
        }
        return $this;
    }

    /**
     * Validates $value
     */
    public function validate()
    {
        foreach ($rules as $rule) {
            try{
                $rule->sanitize($this->value);
            } catch(LogicException $e) {
                // error handling
            }
        }
        return $this;
    }

    /**
     * Draws HTML output
     *
     * @return string HTML format
     */
    public function draw()
    {
        foreach ($rules as $rule) {
            $this->value = $rule->draw($this->value);
        }

        return <<<HTML
<input type="text" value="{$this->value}"/>
HTML;
    }

    /**
     * Attach a rule to $rules.
     */
    public function attach(Rule $rule)
    {
        $this->rules->attach($rule);
        return $this;
    }

    /**
     * Dettach a rule to $rules
     */
    public function dettach(Rule $rule)
    {
        $this->rules->dettach($rule);
        return $this;
    }
}
