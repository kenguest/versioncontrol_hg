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
 * @method boolean getLocal()
 * @method void setLocal(boolean $flag)
 * @method string getRev()
 * @method void setRev(string $revision)
 * @method boolean getRemove()
 * @method void setRemove(boolean $flag)
 * @method boolean getEdit()
 * @method void setEdit(boolean $flag)
 * @method string getMessage()
 * @method void setMessage(string $text)
 * @method string getDate()
 * @method void setDate(string $date)
 * @method string getUser()
 * @method void setUser(string $user)
 */
class TagCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = array(
        'name' => array()
    );

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = array(
        '--force'   => false,
        '--local'   => false,
        '--rev'     => '',
        '--remove'  => false,
        '--edit'    => false,
        '--message' => '',
        '--date'    => '',
        '--user'    => ''
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
        $this->arguments['name'][] = $name;
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
