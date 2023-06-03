<?php

/*
 * Copyright (C) 2009 - 2023
 * Author:   Sudhakar Krishnan <featuriz@gmail.com>
 * License:  http://www.featuriz.in/licenses/LICENSE-2.0
 * Created:  Sat, 03 Jun 2023 10:47:42 IST
 */

namespace App\Twig;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
use App\Service\PackageRepository;

/**
 * Description of Alert
 *
 * @author Sudhakar Krishnan <featuriz@gmail.com>
 */
#[AsTwigComponent()]
class Alert {

    public string $type = 'success';
    public string $message;

    public function __construct(private PackageRepository $packageRepository) {
        
    }

    public function getIconClass(): string {
        return match ($this->type) {
            'success' => 'fa-regular fa-circle-check',
            'danger' => 'fa-solid fa-circle-exclamation',
        };
    }

    public function getPackageCount(): int {
        return $this->packageRepository->count();
    }

}
