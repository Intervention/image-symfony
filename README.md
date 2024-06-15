# Intervention Image Symfony
## Symfony Integration for Intervention Image

[![Latest Version](https://img.shields.io/packagist/v/intervention/image-symfony.svg)](https://packagist.org/packages/intervention/image-symfony)
[![Monthly Downloads](https://img.shields.io/packagist/dm/intervention/image-symfony.svg)](https://packagist.org/packages/intervention/image-symfony/stats)

This package provides an integration to setup [Intervention
Image](https://image.intervention.io) easily to your [Symfony](https://symfony.com) framework
application. Although the use of this integration library is not absolutely
necessary, it offers a convenient way of central configuration in the Symfony
framework.

## Requirements

- Symfony >= 6.4

## Installation

In your existing Symfony application you can install this package using [Composer](https://getcomposer.org).

```bash
composer require intervention/image-symfony
```

After successful installation, you can activate the bundle in the file
`config/bundes.php` of your application by inserting the following line into
the array.

```php
return [
    // ...
    Intervention\Image\Symfony\InterventionImageBundle::class => ['all' => true],
];
```

## Configuration

By default, the bundle is configured to use the GD library with Intervention
Image. However, the package also offers other drivers. This and other options of the 
library can be easily configured by creating a file `config/packages/intervention_image.yaml` and
setting the driver class as follows. 

```yaml
intervention_image:
  driver: Intervention\Image\Drivers\Imagick\Driver
  options:
    autoOrientation: true
    decodeAnimation: true
    blendingColor: 'ffffff'
```

You can choose between the two supplied drivers `Intervention\Image\Drivers\Gd\Driver` and
`Intervention\Image\Drivers\Imagick\Driver` for example.

You can read more about the different options for
[auto orientation](https://image.intervention.io/v3/modifying/effects#image-orientation-according-to-exif-data), 
[decoding animations](https://image.intervention.io/v3/modifying/animations) and 
[blending color](https://image.intervention.io/v3/basics/colors#transparency).

## Getting Started

The integration is now complete and it is possible to access the [ImageManager](https://image.intervention.io/v3/basics/instantiation)
via dependency injection.

```php
namespace App\Controller;

use Intervention\Image\ImageManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExampleController extends AbstractController
{
    #[Route('/')]
    public function example(ImageManager $manager): Response
    {
        $image = $manager->read('images/example.jpg');
    }
}
```

Read the [official documentation of Intervention Image](https://image.intervention.io) for more information.

## Authors

This library is developed and maintained by [Oliver Vogel](https://intervention.io)

Thanks to the community of [contributors](https://github.com/Intervention/image-symfony/graphs/contributors) who have helped to improve this project.

## License

Intervention Image Symfony is licensed under the [MIT License](LICENSE).
