<?php 

declare(strict_types=1);

namespace Nemanja\Ewa\Controllers;

class BookController {

    public function index(): string {

        return 'Hello';
    }

    public function create() {
        return "<form method='POST' action='/books/store'>
        <input name='name'>
        </form>";
    }

    public function store() {
   
    }
}