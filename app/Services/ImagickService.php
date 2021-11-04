<?php
namespace App\Services;

use App\Exceptions\ImagickException;
use \Imagick;

class ImagickService{
    protected $pdfFile;

    protected $resolution = 144;

    protected $outputFormat = 'jpg';

    protected $page = 1;

    public $imagick;

    protected $numberOfPages;

    protected $validOutputFormats = ['jpg', 'jpeg', 'png'];

    protected $layerMethod = Imagick::LAYERMETHOD_FLATTEN;

    protected $colorspace;

    protected $compressionQuality;

    public function __construct(string $pdfFile)
    {
        if (! file_exists($pdfFile)) {
//            throw new Exception("File does not exist");
            return;
        }
        $this->imagick = new Imagick();

        $this->imagick->setResolution(150,150);

        $this->imagick->pingImage($pdfFile);

        $this->imagick->setImageCompression(imagick::COMPRESSION_JPEG);

        $this->numberOfPages = $this->imagick->getNumberImages();

        $this->pdfFile = $pdfFile;
    }
    public function setResolution(int $resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    public function setOutputFormat(string $outputFormat)
    {
        if (! $this->isValidOutputFormat($outputFormat)) {
            throw new InvalidFormat("Format {$outputFormat} is not supported");
        }

        $this->outputFormat = $outputFormat;

        return $this;
    }

    public function getOutputFormat(): string
    {
        return $this->outputFormat;
    }
    public function setLayerMethod(?int $layerMethod)
    {
        $this->layerMethod = $layerMethod;

        return $this;
    }

    public function isValidOutputFormat(string $outputFormat): bool
    {
        return in_array($outputFormat, $this->validOutputFormats);
    }

    public function setPage(int $page)
    {
        if ($page > $this->getNumberOfPages() || $page < 1) {
            throw new PageDoesNotExist("Page {$page} does not exist");
        }

        $this->page = $page;

        return $this;
    }

    public function getNumberOfPages(): int
    {
        return $this->numberOfPages;
    }

    public function saveImage(string $pathToImage): bool
    {
        if (is_dir($pathToImage)) {
            $pathToImage = rtrim($pathToImage, '\/').DIRECTORY_SEPARATOR.$this->page.'.'.$this->outputFormat;
        }
        $imageData = $this->getImageData($pathToImage);

        return file_put_contents($pathToImage, $imageData) !== false;
    }

    public function saveAllPagesAsImages(string $directory, string $prefix = ''): array
    {
        $numberOfPages = $this->getNumberOfPages();

        if ($numberOfPages === 0) {
            return [];
        }

        return array_map(function ($pageNumber) use ($directory, $prefix) {
            $this->setPage($pageNumber);

            $destination = "{$directory}/{$prefix}{$pageNumber}.{$this->outputFormat}";

            $this->saveImage($destination);

            return $destination;
        }, range(1, $numberOfPages));
    }

    public function getImageData(?string $pathToImage=''): Imagick
    {
        /*
         * Reinitialize imagick because the target resolution must be set
         * before reading the actual image.
         */
        $this->imagick = new Imagick();

        $this->imagick->setResolution($this->resolution, $this->resolution);

        if ($this->colorspace !== null) {
            $this->imagick->setColorspace($this->colorspace);
        }

        if ($this->compressionQuality !== null) {
            $this->imagick->setCompressionQuality($this->compressionQuality);
        }

        if (filter_var($this->pdfFile, FILTER_VALIDATE_URL)) {
            return $this->getRemoteImageData($pathToImage);
        }
//        try {
        dd($this->pdfFile);
        $prueba = sprintf('%s[0]', $this->pdfFile);
            $this->imagick->readImage($prueba);
//        }catch (ImagickException $exception){
//            report($exception);
//        }

        if (is_int($this->layerMethod)) {
            $this->imagick = $this->imagick->mergeImageLayers($this->layerMethod);
        }

        $this->imagick->setFormat($this->determineOutputFormat($pathToImage));

        return $this->imagick;
    }

    public function setColorspace(int $colorspace)
    {
        $this->colorspace = $colorspace;

        return $this;
    }

    public function setCompressionQuality(int $compressionQuality)
    {
        $this->compressionQuality = $compressionQuality;

        return $this;
    }

    protected function getRemoteImageData(string $pathToImage): Imagick
    {
        $this->imagick->readImage($this->pdfFile);

        $this->imagick->setIteratorIndex($this->page - 1);

        if (is_int($this->layerMethod)) {
            $this->imagick = $this->imagick->mergeImageLayers($this->layerMethod);
        }

        $this->imagick->setFormat($this->determineOutputFormat($pathToImage));

        return $this->imagick;
    }

    protected function determineOutputFormat(string $pathToImage): string
    {
        $outputFormat = pathinfo($pathToImage, PATHINFO_EXTENSION);

        if ($this->outputFormat != '') {
            $outputFormat = $this->outputFormat;
        }

        $outputFormat = strtolower($outputFormat);

        if (! $this->isValidOutputFormat($outputFormat)) {
            $outputFormat = 'jpg';
        }

        return $outputFormat;
    }
}
