<?php 

declare(strict_types=1);

namespace Nemanja\Ewa\Controllers;

use Nemanja\Ewa\Router\Attributes\Route;

class BookController {

    #[Route('/')]
    public function index(): string {

        return 'Hello';
    }

    #[Route('/books/create')]
    public function create() {
        return "<form method='POST' action='/books/store'>
        <input name='name'>
        </form>";
    }

    #[Route('/books/show')]
    public function show() {
   
    }

    public function store() {
   
    }
}