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
 * @method boolean getAll()
 * @method void setAll(boolean $flag)
 * @method boolean getList()
 * @method void setList(boolean $flag)
 * @method boolean getMark()
 * @method void setMark(boolean $flag)
 * @method boolean getUnmark()
 * @method void setUnmark(boolean $flag)
 * @method boolean getNoStatus()
 * @method void setNoStatus(boolean $flag)
 * @method string getTool()
 * @method void setTool(string $tool)
 * @method array getInclude()
 * @method void addInclude(string $pattern)
 * @method array getExclude()
 * @method void addExclude(string $pattern)
 */
class ResolveCommand extends AbstractCommand
{
    /**
     * Available arguments for this command.
     *
     * @var array $arguments
     */
    protected $arguments = [
        'file' => []
    ];

    /**
     * {@inheritdoc}
     *
     * @var mixed $options
     */
    protected $options = [
        '--all'       => false,
        '--list'      => false,
        '--mark'      => false,
        '--unmark'    => false,
        '--no-status' => false,
        '--tool'      => '',
        '--include'   => [],
        '--exclude'   => []
    ];

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
