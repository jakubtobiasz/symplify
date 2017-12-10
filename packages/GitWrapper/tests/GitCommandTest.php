<?php declare(strict_types=1);

namespace Symplify\GitWrapper\Tests;

use Symplify\GitWrapper\GitCommand;

final class GitCommandTest extends AbstractGitWrapperTestCase
{
    public function testCommand(): void
    {
        $command = $this->randomString();
        $argument = $this->randomString();
        $flag = $this->randomString();
        $optionName = $this->randomString();
        $optionValue = $this->randomString();

        $git = GitCommand::getInstance($command)
            ->addArgument($argument)
            ->setFlag($flag)
            ->setOption($optionName, $optionValue);

        $expected = "$command --$flag --$optionName='$optionValue' '$argument'";
        $commandLine = $git->getCommandLine();

        $this->assertEquals($expected, $commandLine);
    }

    public function testOption(): void
    {
        $optionName = $this->randomString();
        $optionValue = $this->randomString();

        $git = GitCommand::getInstance()
            ->setOption($optionName, $optionValue);

        $this->assertEquals($optionValue, $git->getOption($optionName));

        $git->unsetOption($optionName);
        $this->assertNull($git->getOption($optionName));
    }

    /**
     * @see https://github.com/cpliakas/git-wrapper/issues/50
     */
    public function testMultiOption(): void
    {
        $git = GitCommand::getInstance('test-command')
            ->setOption('test-arg', [true, true]);

        $expected = 'test-command --test-arg --test-arg';
        $commandLine = $git->getCommandLine();

        $this->assertEquals($expected, $commandLine);
    }
}
