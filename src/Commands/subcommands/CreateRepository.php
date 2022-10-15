<?php

declare(strict_types=1);

namespace Scrumble\Csr\Commands;

use Illuminate\Support\Str;

class CreateRepository extends CsrGeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'csr:repository
                            {name : The name of the repository to be created}
                            {basename : The name of the repository to be created}
                            {namespace? : The namespace and folder to place the item in}
                            {model? : Whether to use model or not}';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Repository';
    
    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        if ($this->argument('model')) {
            return __DIR__ . '/../stubs/concrete/modelRepository.stub';
        } else {
            return __DIR__ . '/../stubs/concrete/repository.stub';
        }
    }
}
