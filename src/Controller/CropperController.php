<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Asset\Packages;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Cropperjs\Factory\CropperInterface;
use Symfony\UX\Cropperjs\Form\CropperType;

class CropperController extends AbstractController {

    #[Route('/cropperjs', name: 'app_cropper')]
    public function cropper(CropperInterface $cropper, Packages $package, Request $request, string $rootDir, string $uploadDir): Response {
        $crop = $cropper->createCrop($rootDir . '/assets/images/galaxy.jpg');
        $crop->setCroppedMaxSize(1000, 750);

        $form = $this->createFormBuilder(['crop' => $crop])
                ->add('crop', CropperType::class, [
                    'public_url' => $package->getUrl('/images/galaxy.jpg'),
                    'cropper_options' => [
                        'aspectRatio' => 4 / 3,
                        'preview' => '#cropper-preview',
                        'scalable' => false,
                        'zoomable' => false,
                    ],
                ])
                ->getForm();

        $form->handleRequest($request);
        $croppedImage = null;
        $croppedThumbnail = null;
        if ($form->isSubmitted()) {
            // faking an error to let the page re-render with the cropped images
            $form->addError(new FormError('🤩*'));
            $croppedImage = sprintf('data:image/jpeg;base64,%s', base64_encode($crop->getCroppedImage()));
            $croppedThumbnail = sprintf('data:image/jpeg;base64,%s', base64_encode($crop->getCroppedThumbnail(200, 150)));

            file_put_contents($uploadDir . '/new.jpg', $crop->getCroppedThumbnail(200, 150));
        }

        return $this->render('cropper/index.html.twig', [
                    'form' => $form,
                    'croppedImage' => $croppedImage,
                    'croppedThumbnail' => $croppedThumbnail,
        ]);
    }

}
