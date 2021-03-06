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

/**
 * Simple OO implementation for Mercurial.
 *
 * @author Siad Ardroumli <siad.ardroumli@gmail.com>
 *
 * @method boolean getAfter()
 * @method void setAfter(boolean $flag)
 * @method boolean getForce()
 * @method void setForce(boolean $flag)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method boolean getDryRun()
 * @method void setDryRun(boolean $flag)
 */
class RenameCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'source' => [],
        'dest'   => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--after'   => false,
        '--force'   => false,
        '--include' => [],
        '--exclude' => [],
        '--dry-run' => false
    ];

    /**
     * @return array
     */
    public function getSource()
    {
        return $this->arguments['source'];
    }

    /**
     * @param string $source
     *
     * @return void
     */
    public function addSource($source)
    {
        $this->arguments['source'][] = escapeshellarg($source);
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->arguments['dest'];
    }

    /**
     * @param string $destination
     *
     * @return void
     */
    public function setDestination($destination)
    {
        $this->arguments['dest'] = escapeshellarg($destination);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s %s",
            $this->name,
            $this->assembleOptionString(),
            implode(' ', $this->arguments['source']),
            $this->arguments['dest']
        );
    }
}
