#!/usr/bin/env bash

set -e

DIRECTORY=$(cd "$(dirname "$0")" && pwd)
ICONS_ROOT="${DIRECTORY}/../node_modules/flag-icons/flags"
RESOURCES_ROOT="${DIRECTORY}/../resources/svg"
STYLES=(1x1 4x3)

echo "Compiling Flag Icons..."

for STYLE in "${STYLES[@]}"; do
    ICONS_DIR="${ICONS_ROOT}/${STYLE}"

    php -r "require __DIR__ . '/src/Actions/CompileSvgsAction.php'; (new \Lentex\BladeCountryFlags\Actions\CompileSvgsAction('${STYLE}', '${ICONS_DIR}', '${RESOURCES_ROOT}'))->execute();"
done

echo "All done!"