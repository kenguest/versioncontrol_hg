<?php

namespace Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method boolean getRemote()
 * @method void setRemote(boolean $flag)
 */
class SummaryCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array();

    /** @var mixed $options */
    protected $options = array(
        '--remote'  => false
    );

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "{$this->name}%s",
            $this->assembleOptionString()
        );
    }
}
