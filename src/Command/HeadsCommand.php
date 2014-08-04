<?php

namespace Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method string getRev()
 * @method void setRev(string $startrev)
 * @method boolean getTopo()
 * @method void setTopo(boolean $flag)
 * @method boolean getClosed()
 * @method void setClosed(boolean $flag)
 * @method string getTemplate()
 * @method void setTemplate(string $template)
 */
class HeadsCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array();

    /** @var mixed $options */
    protected $options = array(
        '--rev'      => '',
        '--topo'     => false,
        '--closed'   => false,
        '--template' => ''
    );

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s%s",
            $this->name,
            $this->assembleOptionString()
        );
    }
}