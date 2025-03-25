<?php

declare(strict_types=1);

namespace Lentex\BladeCountryFlags\Actions;

use DirectoryIterator;

final class CompileSvgsAction
{
    /**
     * @var array|string[]
     */
    private array $replacePatterns = [
        '/\s(id=\"[a-zA-Z0-9-_]+\")/' => '',
        '/\s(style=\"[a-z\s\-\\;:A-Z0-9_]+\")/' => '',
        '/\s(class=\"[a-zA-Z0-9]+\")/' => '',
        '/\<\?xml.*\?\>/' => '',
    ];

    public function __construct(
        private readonly string $svgStyle,
        private readonly string $svgDirectory,
        private readonly string $svgOutputDirectory,
    ) {
    }

    public function execute(): void
    {
        foreach (new DirectoryIterator($this->svgDirectory) as $svg) {
            if (! $svg->isFile() || $svg->getExtension() !== 'svg') {
                continue;
            }

            $svgContent = file_get_contents($svg->getPathname());

            if ($svgContent === false) {
                continue;
            }

            $svgContent = preg_replace(array_keys($this->replacePatterns), array_values($this->replacePatterns), $svgContent);

            file_put_contents("{$this->svgOutputDirectory}/{$this->svgStyle}-{$svg->getFilename()}", $svgContent);
        }
    }
}
