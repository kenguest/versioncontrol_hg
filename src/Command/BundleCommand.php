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
 * @method boolean getForce()
 * @method void setForce(boolean $flag)
 * @method boolean getAll()
 * @method void setAll(boolean $flag)
 * @method string getType()
 * @method void setType(string $command)
 * @method string getSsh()
 * @method void setSsh(string $command)
 * @method string getRemotecmd()
 * @method void setRemotecmd(string $command)
 * @method boolean getInsecure()
 * @method void setInsecure(boolean $flag)
 * @method array getRev()
 * @method void addRev(string $revision)
 * @method array getBase()
 * @method void addBase(string $base)
 * @method array getBranch()
 * @method void addBranch(string $branch)
 */
class BundleCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'file'        => '',
        'destination' => '',
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--force'      => false,
        '--rev'        => [],
        '--branch'     => [],
        '--base'       => [],
        '--all'        => false,
        '--type'       => '',
        '--ssh'        => '',
        '--remotecmd'  => '',
        '--insecure'   => false
    ];

    /**
     * @return string
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
    public function setFile($file)
    {
        $this->arguments['file'] = escapeshellarg($file);
    }

    /**
     * Get the destination.
     *
     * @return string
     */
    public function getDestination()
    {
        return $this->arguments['destination'];
    }

    /**
     * Set the destination.
     *
     * @param string $destination
     *
     * @return void
     */
    public function setDestination($destination)
    {
        $this->arguments['destination'] = escapeshellarg($destination);
    }

    /**
     * {@inheritdoc}
     */
    public function __toString()
    {
        return sprintf(
            "%s%s %s%s",
            $this->name,
            $this->assembleOptionString(),
            $this->arguments['file'],
            ' ' . $this->arguments['destination']
        );
    }
}
