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
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method boolean getDelete()
 * @method void setDelete(boolean $flag)
 * @method string getRename()
 * @method void setRename(string $name)
 * @method boolean getInactive()
 * @method void setInactive(boolean $flag)
 */
class BookmarksCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'name'        => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--force'    => false,
        '--rev'      => '',
        '--delete'   => false,
        '--rename'   => '',
        '--inactive' => false
    );

    /**
     * @return array
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
    public function addName($name)
    {
        $this->arguments['name'][] = escapeshellarg($name);
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
            implode(' ', $this->arguments['name'])
        );
    }
}
