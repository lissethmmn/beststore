<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerPxfglwd\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerPxfglwd/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerPxfglwd.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerPxfglwd\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerPxfglwd\appDevDebugProjectContainer(array(
    'container.build_hash' => 'Pxfglwd',
    'container.build_id' => '07997deb',
    'container.build_time' => 1539033857,
), __DIR__.\DIRECTORY_SEPARATOR.'ContainerPxfglwd');
