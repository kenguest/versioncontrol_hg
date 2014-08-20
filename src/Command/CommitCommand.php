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
 * @method string getSimilarity()
 * @method void setSimilarity(string $similarity)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method boolean getDryRun()
 * @method void setDryRun(boolean $flag)
 */
class CommitCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'file' => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--addremove'    => false,
        '--close-branch' => false,
        '--amend'        => false,
        '--secret'       => false,
        '--edit'         => false,
        '--include'      => array(),
        '--exclude'      => array(),
        '--message'      => '',
        '--logfile'      => '',
        '--date'         => '',
        '--user'         => '',
        '--subrepos'     => false
    );

    /**
     * @return array
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
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