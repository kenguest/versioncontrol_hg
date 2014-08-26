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
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method boolean getSubrepos()
 * @method void setSubrepos(boolean $flag)
 * @method boolean getDryRun()
 * @method void setDryRun(boolean $flag)
 */
class AddCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'file' => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--include'  => array(),
        '--exclude'  => array(),
        '--subrepos' => false,
        '--dry-run'  => false
    );

    /**
     * Get the file argument.
     *
     * @return array
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
     * Add a file to the file argument.
     *
     * @param string $file
     *
     * @return void
     */
    public function addFile($file)
    {
        $this->arguments['file'][] = escapeshellarg($file);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s",
            $this->name,
            $this->assembleOptionString(),
            implode(' ', $this->arguments['file'])
        );
    }
}
