<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDu0jvkx\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDu0jvkx/appProdProjectContainer.php') {
    touch(__DIR__.'/ContainerDu0jvkx.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\ContainerDu0jvkx\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \ContainerDu0jvkx\appProdProjectContainer(array(
    'container.build_hash' => 'Du0jvkx',
    'container.build_id' => 'af2e6fe0',
    'container.build_time' => 1542291400,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerDu0jvkx');
