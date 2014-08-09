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
 * @method string getUpdate()
 * @method void setUpdate(boolean $flag)
 * @method string getForce()
 * @method void setForce(boolean $flag)
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
 * @method array getRev()
 * @method void addRev(string $revision)
 * @method array getBookmark()
 * @method void addBookmark(string $bookmark)
 * @method array getBranch()
 * @method void addBranch(string $branch)
 */
class PullCommand extends AbstractCommand
{
    /** @var array $arguments */
    protected $arguments = array(
        'source' => ''
    );

    /** @var mixed $options */
    protected $options = array(
        '--update'    => false,
        '--force'     => false,
        '--rev'       => array(),
        '--bookmark'  => array(),
        '--branch'    => array(),
        '--ssh'       => '',
        '--remotecmd' => '',
        '--insecure'  => false
    );

    /**
     * @return string
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
    public function setSource($source)
    {
        $this->arguments['source'] = escapeshellarg($source);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['source']
        );
    }
}
