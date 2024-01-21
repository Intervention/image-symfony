<?php

declare(strict_types=1);

namespace Intervention\Image\Symfony;

use Intervention\Image\Symfony\DependencyInjection\InterventionImageExtension;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class InterventionImageBundle extends AbstractBundle
{
    public function getContainerExtension(): ExtensionInterface
    {
        return new InterventionImageExtension();
    }
}
