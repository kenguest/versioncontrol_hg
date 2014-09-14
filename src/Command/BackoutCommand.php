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
 * @method boolean getMerge()
 * @method void setMerge(boolean $flag)
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method string getTool()
 * @method void setTool(string $tool)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 * @method string getMessage()
 * @method void setMessage(string $text)
 * @method string getLogfile()
 * @method void setLogfile(string $file)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getUser()
 * @method void setUser(string $user)
 */
class BackoutCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'rev' => ''
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--merge'   => false,
        '--rev'     => '',
        '--tool'    => '',
        '--include' => array(),
        '--exclude' => array(),
        '--message' => '',
        '--logfile' => '',
        '--date'    => '',
        '--user'    => ''
    );

    /**
     * @return string
     */
    public function getRevision()
    {
        return $this->arguments['rev'];
    }

    /**
     * @param string $revision
     *
     * @return void
     */
    public function setRevision($revision)
    {
        $this->arguments['rev'] = escapeshellarg($revision);
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
            $this->arguments['rev']
        );
    }
}
