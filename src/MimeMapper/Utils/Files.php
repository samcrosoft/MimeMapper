<?php
namespace MimeMapper\Utils;
use MimeMapper\Exceptions as ExceptionHandler;

class Files extends \SplFileInfo
{
    /**
     * @var string
     * This method holds the filename passed to the constructor
     */
    private $sFileName = "";

    /**
     * @var string
     * This variable holds the extension derived from the filename passed
     */
    private $sFileExtension = "";

    /**
     * @var bool
     * This variable helps decide if to throw an exception if a valid name is not passed or not
     */
    private $bThrowException = false;

    const EXCEPTION_FILENAME_NOT_STRING = "Filename can only be string";

    const EXCEPTION_EMPTY_FILENAME      = "Filename cannot be empty";

    function __construct($sFileName = "", $bThrowException = false)
    {
        // set the throw exception handler
        $this->bThrowException = is_bool($bThrowException) ? $bThrowException : false;
        if($this->bThrowException)
        {
            $this->setVariables($sFileName);
        }
        else
        {
            // set the filename
            $this->sFileName    = is_string($sFileName) ? $sFileName : "";
        }

        // initiate the parent
        parent::__construct($this->sFileName);
    }

    /**
     * This method sets the filename and throws exceptions if name is malformed
     * @param string $sFilename
     * @throws \Samcrosoft\Exceptions\FilenameException
     */
    private function setVariables($sFilename = "")
    {
        if(!empty($sFileName))
        {
            if(!is_string($sFileName))
            {
                if($this->bThrowException)
                {
                    throw new ExceptionHandler\FilenameException(self::EXCEPTION_FILENAME_NOT_STRING);
                }
            }
            else
            {
                // set the variable to the object
                $this->sFileName = $sFilename;
            }
        }
        else
        {
            throw new ExceptionHandler\FilenameException(self::EXCEPTION_EMPTY_FILENAME);
        }
    }

    public function getExtension()
    {
        if(empty($this->sFileName) || !is_string($this->sFileName))
        {
            return null;
        }
        else
        {
            $sExt = parent::getExtension();
            return(empty($sExt) ? null : $sExt);
        }
    }

    public function getFilename()
    {
        $sFilename = parent::getFilename();
        return $sFilename;
    }
}
