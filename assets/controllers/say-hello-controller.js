/* 
 * Copyright (C) 2009 - 2023
 * Author:   Sudhakar Krishnan <featuriz@gmail.com>
 * License:  http://www.featuriz.in/licenses/LICENSE-2.0
 * Created:  Wed, 31 May 2023 10:55:27 IST
 */

import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ['name', 'output']

    greet() {
        this.outputTarget.textContent = `Hello, ${this.nameTarget.value}!`;
    }
}
