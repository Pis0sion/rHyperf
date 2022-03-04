<?php

namespace App\Annotations;

use Attribute;
use Hyperf\Di\Annotation\AbstractAnnotation;
use Hyperf\Di\Annotation\AnnotationCollector;

/**
 * @Annotation
 * @Target({"ALL"})
 */
#[Attribute(Attribute::TARGET_ALL)]
class Validate extends AbstractAnnotation
{
    /**
     * @var string
     */
    public string $value = "13213213";

}