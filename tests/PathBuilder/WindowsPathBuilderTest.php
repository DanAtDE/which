<?php
namespace Nubs\Which\PathBuilder;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Nubs\Which\PathBuilder\WindowsPathBuilder
 */
class WindowsPathBuilderTest extends PHPUnit_Framework_TestCase
{
    private $_windowsPathBuilder;

    public function setUp()
    {
        $this->_windowsPathBuilder = new WindowsPathBuilder(['C:\\foo', 'C:\\baz'], ['.exe', '.com']);
    }

    /**
     * Verify that getPermutations works.
     *
     * @test
     * @covers ::__construct
     * @covers ::getPermutations
     * @covers ::_joinPaths
     * @covers ::_addExtension
     * @covers ::_isAtom
     * @covers ::_hasExtension
     * @covers \Nubs\Which\PathBuilder\FileAppenderTrait
     * @covers \Nubs\Which\PathBuilder\WindowsExtensionAppenderTrait
     */
    public function getPermutations()
    {
        $this->assertSame(
            ['C:\\foo\\bar.exe', 'C:\\foo\\bar.com', 'C:\\baz\\bar.exe', 'C:\\baz\\bar.com'],
            $this->_windowsPathBuilder->getPermutations('bar')
        );
    }

    /**
     * Verify that getPermutations works with an absolute path.
     *
     * @test
     * @covers ::__construct
     * @covers ::getPermutations
     * @covers ::_joinPaths
     * @covers ::_addExtension
     * @covers ::_isAtom
     * @covers ::_hasExtension
     * @covers \Nubs\Which\PathBuilder\FileAppenderTrait
     * @covers \Nubs\Which\PathBuilder\WindowsExtensionAppenderTrait
     */
    public function getPermutationsForAbsolutePath()
    {
        $this->assertSame(['C:\\qux\\bar.exe', 'C:\\qux\\bar.com'], $this->_windowsPathBuilder->getPermutations('C:\\qux\\bar'));
    }

    /**
     * Verify that getPermutations works with a subdirectory.
     *
     * @test
     * @covers ::__construct
     * @covers ::getPermutations
     * @covers ::_joinPaths
     * @covers ::_addExtension
     * @covers ::_isAtom
     * @covers ::_hasExtension
     * @covers \Nubs\Which\PathBuilder\FileAppenderTrait
     * @covers \Nubs\Which\PathBuilder\WindowsExtensionAppenderTrait
     */
    public function getPermutationsForSubdirectory()
    {
        $this->assertSame(['qux\\bar.exe', 'qux\\bar.com'], $this->_windowsPathBuilder->getPermutations('qux\\bar'));
    }

    /**
     * Verify that getPermutations works with an extension specified.
     *
     * @test
     * @covers ::__construct
     * @covers ::getPermutations
     * @covers ::_joinPaths
     * @covers ::_isAtom
     * @covers ::_hasExtension
     * @covers \Nubs\Which\PathBuilder\FileAppenderTrait
     * @covers \Nubs\Which\PathBuilder\WindowsExtensionAppenderTrait
     */
    public function getPermutationsWithExtension()
    {
        $this->assertSame(['C:\\foo\\bar.qux', 'C:\\baz\\bar.qux'], $this->_windowsPathBuilder->getPermutations('bar.qux'));
    }
}
