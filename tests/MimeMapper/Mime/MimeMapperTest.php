<?php

class MimeMapperTest extends PHPUnit_Framework_TestCase
{
    private $oMapper = null;

    public function setUp()
    {
        $this->oMapper = new \MimeMapper\Mime\MimeMapper();
    }

    /**
     * This test asserts that when a clone of the mapper class is created, the throw exception in the new object is set to false
     */
    public function testThrowExceptionIsFalseOnClone()
    {
        // get the current throw exception value
        $bCurrentThrowException = $this->oMapper->getThrowExceptionOnError();
        // set the throw exception to true , to test the clone
        $this->oMapper->setThrowExceptionOnError(true);
        $oMapperClone = clone $this->oMapper;
        // save the throw exception back to the original value
        $this->oMapper->setThrowExceptionOnError($bCurrentThrowException);
        $this->assertFalse($oMapperClone->getThrowExceptionOnError(), "Throw Exception On Error For Cloned Object Should Be False");
    }

    /**
     * This test asserts that when a clone of the mapper class is created, the throw exception in the old object remains the same
     */
    public function testThrowExceptionIsNotChangedOnClone()
    {
        // set the throw exception to true , to test the clone
        $this->oMapper->setThrowExceptionOnError(true);
        // get the current throw exception value
        $bCurrentThrowException = $this->oMapper->getThrowExceptionOnError();
        $oMapperClone = clone $this->oMapper;
        $this->assertEquals($bCurrentThrowException, $this->oMapper->getThrowExceptionOnError(), "Throw Exception On Error For Main Object Should Remain Unchanged After Clone");
        // revert throw exception to false
        $this->oMapper->setThrowExceptionOnError(false);
    }

    /**
     * This test confirms that if configure to do so, the class should throw an exception when the filename is empty
     * @expectedException \MimeMapper\Exceptions\FilenameException
     * @expectedExceptionMessage Filename cannot be empty
     */
    public function testReturnExceptionOnEmptyFilename()
    {
        $sFilename = null;
        $this->oMapper->setThrowExceptionOnError(true);
        $this->oMapper->getMimeFromFilename($sFilename);
        $this->oMapper->setThrowExceptionOnError(false);

    }

    /**
     *
     */
    public function testExtensionMustReturnNullOnEmpty()
    {
        $sFilename  = "test1";
        $nExtension = $this->oMapper->getMimeFromFilename($sFilename);
        $this->assertEquals(null, $nExtension, "If Filename Contains No Extension, Null Must Be");
    }

    /**
     * This test asserts that the returned mimetype must be string
     */
    public function testExtensionReturnsString()
    {
        $sFilename  = "test1.jpg";
        $sExtension = $this->oMapper->getMimeFromFilename($sFilename);
        $this->assertTrue(is_string($sExtension), "Extension Returned Must Be A String");
    }

    /**
     * This test asserts that an unknown extension should return null
     */
    public function testUnknownExtensionShouldReturnNull()
    {
        $sFilename  = "test1.samcrosoft";
        $nExtension = $this->oMapper->getMimeFromFilename($sFilename);
        $this->assertEquals(null, $nExtension, "If Filename Contains No Extension, Null Must Be");
    }

    /**
     */
    public function testSimulateIncompleteTest()
    {
        $this->markTestIncomplete('will finish dis up later');
    }

    public  function tearDown()
    {
        unset($this->oMapper);
    }
}
