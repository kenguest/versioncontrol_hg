<?php
/**
 * VersionControl_HG
 * Simple OO implementation for Mercurial.
 *
 * PHP Version 5.4
 *
 * @copyright 2014 Siad Ardroumli
 * @license http://www.opensource.org/licenses/mit-license.php MIT
 * @link http://siad007.github.io/versioncontrol_hg
 */

namespace Siad007\VersionControl\HG\Command;

use Siad007\VersionControl\HG\Command;

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 */
class PathsCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'name' => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [];

    /**
     * @return string
     */
    public function getName()
    {
        return $this->arguments['name'];
    }

    /**
     * @param string $name
     *
     * @return void
     */
    public function setName($name)
    {
        $this->arguments['name'] = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s%s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['name']
        );
    }
}
