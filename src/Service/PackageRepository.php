<?php

/*
 * Copyright (C) 2009 - 2023
 * Author:   Sudhakar Krishnan <featuriz@gmail.com>
 * License:  http://www.featuriz.in/licenses/LICENSE-2.0
 * Created:  Sat, 03 Jun 2023 10:50:08 IST
 */

namespace App\Service;

/**
 * Description of PackageRepository
 *
 * @author Sudhakar Krishnan <featuriz@gmail.com>
 */
class PackageRepository {

    public function count(): int {
        return random_int(10, 100);
    }

}
