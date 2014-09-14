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

namespace Siad007\VersionControl\HG;

/**
 * Factory class.
 *
 * @method \Siad007\VersionControl\HG\Command\AddCommand createAdd(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\AddremoveCommand createAddremove(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\AnnotateCommand createAnnotate(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\ArchiveCommand createArchive(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\BlameCommand createBlame(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\BookmarksCommand createBookmarks(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\BranchCommand createBranch(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\BranchesCommand createBranches(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\BundleCommand createBundle(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\CatCommand createCat(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\CloneCommand createClone(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\CommitCommand createCommit(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\HeadsCommand createHeads(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\InitCommand createInit(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\LocateCommand createLocate(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\ManifestCommand createManifest(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\PathsCommand createPaths(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\PullCommand createPull(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\PushCommand createPush(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\RecoverCommand createRecover(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\RemoveCommand createRemove(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\RenameCommand createRename(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\RootCommand createRoot(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\StatusCommand createStatus(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\SummaryCommand createSummary(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\TagCommand createTag(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\TagsCommand createTags(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\UnbundleCommand createUnbundle(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\UpdateCommand createUpdate(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\VerifyCommand createVerify(array $options = array)
 * @method \Siad007\VersionControl\HG\Command\VersionCommand createVersion(array $options = array)
 */
class Factory
{
    /**
     * Disabled constructor.
     */
    final private function __construct()
    {
    }

    /**
     * Factory method.
     *
     * @param string $command
     * @param array  $options
     *
     * @return \Siad007\VersionControl\HG\Command\AbstractCommand
     *
     * @throws \InvalidArgumentException
     */
    public static function getInstance($command, $options = array())
    {
        $commandClassName = sprintf(
            '\\Siad007\\VersionControl\\HG\\Command\\%sCommand',
            ucfirst($command)
        );

        if (!class_exists($commandClassName)) {
            throw new \InvalidArgumentException(
                "Command $commandClassName not supported."
            );
        }

        return new $commandClassName($options);
    }

    /**
     * Magic method to reduce the number of methods.
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return \Siad007\VersionControl\HG\Command\AbstractCommand
     *
     * @throws \InvalidArgumentException
     */
    public static function __callStatic($name, $arguments)
    {
        if (strpos($name, 'create') !== 0) {
            throw new \InvalidArgumentException(
                "Create command $name not supported."
            );
        } else {
            $command = strtolower(str_replace('create', '', $name));
        }

        $options = isset($arguments[0]) && is_array($arguments[0]) ? $arguments[0] : array();

        return self::getInstance($command, $options);
    }

    /**
     * Disabled clone behavior.
     */
    final private function __clone()
    {
    }
}
