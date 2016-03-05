<?php
require 'vendor/autoload.php';

use Zara4\API\Client;
use Zara4\API\ImageProcessing\LocalImageRequest;
use Zara4\API\ImageProcessing\ProcessedImage;
use Zara4\API\ImageProcessing\OptimisationMode;
use Zara4\API\ImageProcessing\OutputFormat;
use Zara4\API\ImageProcessing\ColourEnhancement;
use Zara4\API\ImageProcessing\ResizeMode;


$apiClientId = "9WQcfHDyd8BIJc9tg2Yx6qSjHn8bvKyPbFs";
$apiClientSecret = "Ua25inHBHWWwExMb4Xymb9k7K9l8f2I2X4h";

$apiClient = new Client($apiClientId, $apiClientSecret);
$originalImage = new LocalImageRequest("test-images/001.jpg");

// Change request options
$originalImage->optimisationMode = OptimisationMode::HIGHEST;
$originalImage->outputFormat = OutputFormat::MATCH;
$originalImage->colourEnhancement = ColourEnhancement::IMPROVE_COLOUR;
$originalImage->resizeMode = ResizeMode::CROP;
$originalImage->width = 300;
$originalImage->height = 300;

$processedImage = $apiClient->processImage($originalImage);
$apiClient->downloadProcessedImage($processedImage, "output.jpg");

