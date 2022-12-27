<?php

namespace App\DTO\CSVImporterController;

use FileHandler\Bundle\FileHandlerBundle\Model\UploadedBase64File;

class CSVUploadDTO
{
    public UploadedBase64File $csvFile;
}
