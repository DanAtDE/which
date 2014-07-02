<?php
namespace Nubs\Which\PathHelper;

use PHPUnit_Framework_TestCase;

/**
 * @coversDefaultClass \Nubs\Which\PathHelper\WindowsPathHelper
 */
class WindowsPathHelperTest extends PHPUnit_Framework_TestCase
{
    private $_windowsPathHelper;

    public function setUp()
    {
        $this->_windowsPathHelper = new WindowsPathHelper();
    }

    /**
     * Verify that join paths works.
     *
     * @test
     * @covers ::joinPaths
     */
    public function joinPaths()
    {
        $this->assertSame('\\foo\\bar', $this->_windowsPathHelper->joinPaths('\\foo', 'bar'));
    }

    /**
     * Verify that isAtom works with an atom.
     *
     * @test
     * @covers ::isAtom
     */
    public function isAtomWithAtom()
    {
        $this->assertTrue($this->_windowsPathHelper->isAtom('foo'));
    }

    /**
     * Verify that isAtom works with a sub directory.
     *
     * @test
     * @covers ::isAtom
     */
    public function isAtomWithSubdirectory()
    {
        $this->assertFalse($this->_windowsPathHelper->isAtom('foo\\bar'));
    }
}