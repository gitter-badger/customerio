<?php

namespace Customerio\API\Normalizer;

use Joli\Jane\Normalizer\ReferenceNormalizer;
use Joli\Jane\Normalizer\NormalizerArray;

class NormalizerFactory
{
    public static function create()
    {
        $normalizers = [];
        $normalizers[] = new ReferenceNormalizer();
        $normalizers[] = new NormalizerArray();
        return $normalizers;
    }
}
