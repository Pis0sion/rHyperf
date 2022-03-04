<?php

namespace App\Aspect;

use _PHPStan_76800bfb5\Nette\Schema\Elements\Base;
use App\Annotations\Validate;
use App\Validate\BaseValidate;
use Hyperf\Contract\ContainerInterface;
use Hyperf\Di\Annotation\AnnotationCollector;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;

#[Aspect]
class ValidateAspect extends AbstractAspect
{
    #[Inject]
    protected ContainerInterface $container;

    /**
     * @var string[]
     */
    public $annotations = [
        Validate::class,
    ];

    /**
     *
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return mixed|void
     */
    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        // TODO: Implement process() method.
        $_validateClass = AnnotationCollector::getClassMethodAnnotation($proceedingJoinPoint->className,
            $proceedingJoinPoint->methodName);

        /**
         * @var BaseValidate $_needValidateClass
         */
        if ($_needValidateClass = $this->container->get($_validateClass[Validate::class]?->value)) {
            $_needValidateClass->checkOrFails();
        }

        return $proceedingJoinPoint->process();
    }
}