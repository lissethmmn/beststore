<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'cache.serializer' shared service.

return $this->services['cache.serializer'] = \Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('AYodTvVV8d', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ${($_ = isset($this->services['monolog.logger.cache']) ? $this->services['monolog.logger.cache'] : $this->load('getMonolog_Logger_CacheService.php')) && false ?: '_'});
