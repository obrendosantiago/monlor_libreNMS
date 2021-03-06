<?php

/**
 * JPGraph v3.6.21
 */
require_once __DIR__ . '/../../src/config.inc.php';

require_once 'jpgraph/jpgraph_matrix.php';
require_once 'jpgraph/jpgraph_iconplot.php';

$data = [
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
    [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
    [10, 9, 8, 17, 6, 5, 4, 3, 2, 1, 0],
    [0, 1, 2, 3, 4, 4, 9, 7, 8, 9, 10],
    [8, 1, 2, 3, 4, 8, 3, 7, 8, 9, 10],
    [10, 3, 5, 7, 6, 5, 4, 3, 12, 1, 0],
    [10, 9, 8, 7, 6, 5, 4, 3, 2, 1, 0],
];

// Do the meshinterpolation once for the data
doMeshInterpolate($data, 4);
$r = count($data);
$c = count($data[0]);

$width  = 300;
$height = 300;
$graph  = new MatrixGraph($width, $height);
$graph->title->Set('Adding a background image');
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 14);
$graph->subtitle->Set('Alphablending = 0.2');

// Add a stretched background image
$graph->SetBackgroundImage(__DIR__ . '/../assets/ironrod.jpg', BGIMG_FILLFRAME);
$graph->SetBackgroundImageMix(50);

$mp = new MatrixPlot($data, 1);
$mp->SetSize(0.65);
$mp->SetCenterPos(0.5, 0.5);
$mp->SetLegendLayout(1);
$mp->SetAlpha(0.2);

$graph->Add($mp);
$graph->Stroke();
