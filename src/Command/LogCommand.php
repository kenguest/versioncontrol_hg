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
 * @method boolean getFollow()
 * @method LogCommand setFollow(boolean $flag)
 * @method string getDate()
 * @method LogCommand setDate(string $date)
 * @method boolean getCopies()
 * @method LogCommand setCopies(boolean $flag)
 * @method array getKeyword()
 * @method LogCommand addKeyword(string $text)
 * @method array getRev()
 * @method LogCommand setRev(string $revision)
 * @method boolean getRemoved()
 * @method LogCommand setRemoved(boolean $flag)
 * @method array getUser()
 * @method LogCommand addUser(string $user)
 * @method array getBranch()
 * @method LogCommand addBranch(string $branch)
 * @method array getPrune()
 * @method LogCommand addPrune(string $revision)
 * @method boolean getPatch()
 * @method LogCommand setPatch(boolean $flag)
 * @method boolean getGit()
 * @method LogCommand setGit(boolean $flag)
 * @method array getLimit()
 * @method LogCommand setLimit(string $number)
 * @method boolean getNoMerges()
 * @method LogCommand setNoMerges(boolean $flag)
 * @method boolean getStat()
 * @method LogCommand setStat(boolean $flag)
 * @method boolean getGraph()
 * @method LogCommand setGraph(boolean $flag)
 * @method array getTemplate()
 * @method LogCommand setTemplate(string $template)
 * @method array getInclude()
 * @method LogCommand addInclude(string $pattern)
 * @method array getExclude()
 * @method LogCommand addExclude(string $pattern)
 */
class LogCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'file' => ''
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--follow' => false,
        '--date'      => '',
        '--copies'    => false,
        '--keyword'   => [],
        '--rev'       => [],
        '--removed'   => false,
        '--user'      => [],
        '--branch'    => [],
        '--prune'     => [],
        '--patch'     => false,
        '--git'       => false,
        '--limit'     => '',
        '--no-merges' => false,
        '--stat'      => false,
        '--graph'     => false,
        '--template'  => '',
        '--include'   => [],
        '--exclude'   => [],
    ];

    /**
     * Get the file argument.
     *
     * @return string
     */
    public function getFile()
    {
        return $this->arguments['file'];
    }

    /**
     * Set the file argument.
     *
     * @param string $file
     *
     * @return LogCommand
     */
    public function setFile($file)
    {
        $this->arguments['file'] = escapeshellarg($file);

        return $this;
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
            $this->arguments['file']
        );
    }
}
