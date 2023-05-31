<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Dropzone\Form\DropzoneType;
use Symfony\Component\String\Slugger\SluggerInterface;

class DropzoneController extends AbstractController {

    #[Route('/dropzone', name: 'app_dropzone')]
    public function index(\Symfony\Component\HttpFoundation\Request $request, SluggerInterface $slugger, string $uploadDir): Response {

        $form = $this->createFormBuilder()
                ->add('file', DropzoneType::class, [
                    'attr' => [
                        'placeholder' => 'Drag and drop a file or click to browse',
                    ],
                ])
                ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $file = $form->get('file')->getData();
            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $file->guessExtension();

                try {
                    $file->move(
                            $uploadDir,
                            $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }
        }

        return $this->render('dropzone/index.html.twig', [
                    'form' => $form->createView(),
        ]);
    }

}
